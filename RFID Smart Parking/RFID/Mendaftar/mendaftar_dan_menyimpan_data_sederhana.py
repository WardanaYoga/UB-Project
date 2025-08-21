import RPi.GPIO as io
from mfrc522 import SimpleMFRC522
import time
from datetime import datetime

#Membuat SimpleMFRC522 sebagai objek
membaca = SimpleMFRC522()



try:
    while True:
        text = input('Masukkan Nama Pengguna Baru: ')
        print("Sekarang tempatkan kartu RFID anda untuk di daftarkan")
        
        membaca.write(text)
        id, text = membaca.read()
        waktu_mendaftar = datetime.now().strftime("%Y-%m-%d %H:%M:%S")# waktu mendaftar saat ini
        
        print(f"ID Pengguna\t: {id}")
        print(f"Nama Pengguna\t: {text}")
        print(f"Waktu\t\t: {waktu_mendaftar}")
    
    #menyimpan data ke dalam file text
    with open ("/home/trash2cash/Documents/RFID/DataPendaftar/daftarpengguna_data.txt", "a") as file:
        file.write(f"\nID pengguna\t\t\t: {id}\nNama pengguna\t\t\t: {text}\nMelakukan scan pada waktu\t: {waktu_mendaftar}\n")
    print("Terdaftar")
    
finally:
    io.cleanup()
