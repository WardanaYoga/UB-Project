import RPi.GPIO as io
from mfrc522 import SimpleMFRC522

#Membuat SimpleMFRC522 sebagai objek
membaca = SimpleMFRC522()



try:
    text = input('New Data: ')
    print("Sekarang tempatkan kartu RFID anda untuk di daftarkan")
    membaca.write(text)
    print("Terdaftar")
    
finally:
    io.cleanup()