import serial
import mysql.connector as mariadb

# set up db connection
conn = mariadb.connect(user="pi", password="YEETers", database="test")
cursor = conn.cursor()

# set up serial comms
port = serial.Serial('/dev/ttyACM0', 9600)

# read from serial
while True:
    serialOutput = port.readline()
    serialOutput.rstrip()
    query = "UPDATE onoroff SET state = " + serialOutput

    print(query)
    cursor.execute(query)
    conn.commit()
