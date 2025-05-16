import os

# Ordnerpfad zu deinen Bildern (Windows-Notation mit Rohstring)
ordner = r"C:\Users\micha\PhpstormProjects\CarloGyatto\images"

# Hole alle Dateien mit "WhatsApp Bild" im Namen
dateien = [f for f in os.listdir(ordner) if f.startswith("WhatsApp Bild")]

# Sortiere (optional: nach Änderungsdatum oder alphabetisch)
dateien.sort()

# Umbenennen
for index, datei in enumerate(dateien, start=1):
    alt_pfad = os.path.join(ordner, datei)
    neu_name = f"carlo{index}.jpg"
    neu_pfad = os.path.join(ordner, neu_name)

    os.rename(alt_pfad, neu_pfad)
    print(f"✅ {datei} ➜ {neu_name}")
