import serial
import mysql.connector as mariadb
import random

gamestate = False # track memory game state
answered = True # see if the last number was answered in the memory game

# set up db connection
conn = mariadb.connect(user="pi", password="YEETers", database="test")
cursor = conn.cursor(buffered=True)

# set up serial comms
try:
    port = serial.Serial('/dev/ttyACM0', 57600)
    print("connected to arduino")
except:
    print("could not connect to arduino");

# smart fan functionality
def SmartFan():
    global conn
    global cursor
    global port

    # update sensor temp
    while port.in_waiting:
        current = port.readline().rstrip('\r\n\0')

    try:
        query = "UPDATE smartfan SET sensor = " + str(current)
        cursor.execute(query)
        conn.commit()

        # this is so hacky but i'm beyond the point of caring
        query = "SELECT * FROM smartfan"
        cursor.execute(query)
        conn.commit()
        current = cursor.fetchall()[0][0]

        # check if fan should be on or off
        query = "SELECT * FROM smartfan"
        cursor.execute(query)
        conn.commit()
        threshold = cursor.fetchall()[0][1]
        if current > threshold: # check if we are above threshold
            port.write(b"1")
        else:
            port.write(b"0")
    except:
        pass

# memory game functionality
def MemoryGame():
    global conn
    global cursor
    global port
    global gamestate
    global answered

    # check if we are going to start the game
    query = "SELECT * FROM memorygame"
    cursor.execute(query)
    conn.commit()
    result = cursor.fetchall()[0][2]

    if result == 0: # if the game is not ready then we just reset the information in the db
        query="UPDATE memorygame SET level = 1, progress = 1, answer = 0, guess = 0"
        cursor.execute(query)
        conn.commit()
        gamestate = False
        answered = True
        #print("not started")
        return

    # now it's gamer time
    if not gamestate:
        port.write(b"0") # tell the arduino that we are ready to go
        gamestate = True
        #print("started")

    if answered:
        # set number of beeps
        num = str(random.randint(1, 9))
        print(num)
        query = "UPDATE memorygame SET answer = " + num
        cursor.execute(query)
        conn.commit()

        # set difficulty
        query = "SELECT * FROM memorygame"
        cursor.execute(query)
        conn.commit()
        level = cursor.fetchall()[0][0]
        if level < 3:
            difficulty = b"<a"
        elif level < 5:
            difficulty = b"<b"
        else:
            difficulty = b"<c"

        # write the difficulty and beep count to serial
        port.write(difficulty)
        port.write(str.encode(num + ">"))
        answered = False

    while True:
        while port.in_waiting:
            guess = port.readline().rstrip('\r\n\0')

        try:
            query = "UPDATE memorygame SET guess = " + guess
            cursor.execute(query)
            conn.commit()
            break
        except:
            pass
        
    query = "SELECT * FROM memorygame"
    cursor.execute(query)
    conn.commit()
    qresult = cursor.fetchall()
    guess = qresult[0][5]
    answer = qresult[0][4]

    # answer is incorrect
    if guess != answer:
        score = qresult[0][0]
        name = qresult[0][3]
        query = "INSERT INTO highscores (name, score) VALUES ('" + name + "', " + str(score) + ")"
        cursor.execute(query)
        conn.commit()

        query = "UPDATE memorygame SET started = 0"
        cursor.execute(query)
        conn.commit()
    else: # answer is correct
        answered = True
        progress = qresult[0][1]
        level = qresult[0][0]
        progress += 1
        if progress == 4:
            progress = 1
            level += 1
        query = "UPDATE memorygame SET level = " + str(level) + ", progress = " + str(progress)
        cursor.execute(query)
        conn.commit()

# read from serial
while True:
    query = "SELECT * FROM state"
    cursor.execute(query)
    conn.commit()

    result = cursor.fetchall()[0][0]
    if result == 1: # using smart fan
        SmartFan()
    elif result == 0: # using memory game
        MemoryGame()
