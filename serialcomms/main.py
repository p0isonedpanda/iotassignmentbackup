import serial
import mysql.connector as mariadb

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
    print("memory game")

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
