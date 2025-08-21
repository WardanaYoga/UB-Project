import RPi.GPIO as io
from mfrc522 import SimpleMFRC522
import csv
import time

io.setwarnings(False)

membaca = SimpleMFRC522()

try:
    while True:
        print("Scanning...")
        id, text = membaca.read()
        print(f"ID pengguna: {id}")
        print(f"Nama pengguna: {text}")
        
        #menyimpan data ke dalam file text
        with open ("/home/trash2cash/Documents/RFID/DataPengguna/rfid_data_csv.txt", "a", newline='') as file:
            writer = csv.writer(file)
            writer.writerow([id, text])
        print("Data telah disimpan")
        time.sleep(1)

finally:
    io.cleanup()
