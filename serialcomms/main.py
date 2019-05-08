import serial
import mysql.connector as mariadb

def SmartFan():
    print("smart fan")

def MemoryGame():
    print("memory game")

# set up db connection
conn = mariadb.connect(user="pi", password="YEETers", database="test")
cursor = conn.cursor(buffered=True)

# set up serial comms
try:
    port = serial.Serial('/dev/ttyACM0', 57600)
except:
    print("could not connect to arduino");

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
