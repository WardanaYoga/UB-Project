import RPi.GPIO as io
from mfrc522 import SimpleMFRC522
import time
from datetime import datetime
io.setwarnings(False)

membaca = SimpleMFRC522()

try:
    while True:
        print("Scanning...")
        
        id, text = membaca.read()
        waktu_scanning = datetime.now().strftime("%Y-%m-%d %H:%M:%S") #mendapatkan waktu saat ini
        
        print(f"ID pengguna\t\t\t: {id}")
        print(f"Nama pengguna\t\t\t: {text}")
        print(f"Melakukan scan pada waktu\t: {waktu_scanning}\n")
        time.sleep(1)

finally:
    io.cleanup()