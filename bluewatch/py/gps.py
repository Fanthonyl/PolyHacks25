import subprocess
import re

# 🔹 Chemin complet de ExifTool
EXIFTOOL_PATH = r"C:\Users\antho\Downloads\exiftool-13.18_64\exiftool-13.18_64\exiftool.exe"

def convert_gps_to_decimal(degrees, minutes, seconds, direction):
    """ Convertit une coordonnée GPS en format décimal. """
    decimal = degrees + (minutes / 60.0) + (seconds / 3600.0)
    if direction in ['S', 'W']:  # Si Sud ou Ouest, rendre la valeur négative
        decimal = -decimal
    return decimal

def get_gps_coordinates(video_path):
    try:
        # 🔹 Récupérer uniquement les informations GPS
        result = subprocess.run(
            [EXIFTOOL_PATH, "-GPSLatitude", "-GPSLongitude", "-GPSLatitudeRef", "-GPSLongitudeRef", video_path],
            stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True
        )
        
        if result.stderr:
            print("❌ Erreur ExifTool :", result.stderr)
            return None

        gps_data = {}

        for line in result.stdout.split("\n"):
            lat_match = re.search(r"GPS Latitude\s+:\s+(\d+) deg (\d+)' (\d+\.\d+)\" ([NS])", line)
            lon_match = re.search(r"GPS Longitude\s+:\s+(\d+) deg (\d+)' (\d+\.\d+)\" ([EW])", line)

            if lat_match:
                degrees, minutes, seconds, direction = lat_match.groups()
                gps_data["latitude"] = convert_gps_to_decimal(
                    float(degrees), float(minutes), float(seconds), direction
                )

            if lon_match:
                degrees, minutes, seconds, direction = lon_match.groups()
                gps_data["longitude"] = convert_gps_to_decimal(
                    float(degrees), float(minutes), float(seconds), direction
                )

        if "latitude" in gps_data and "longitude" in gps_data:
            return [gps_data["latitude"], gps_data["longitude"]]
        else:
            return None

    except Exception as e:
        print("❌ Erreur :", e)
        return None

# 🔹 Remplace par le chemin de ta vidéo
video_path = r"C:\Users\antho\Videos\hackathon\test.mp4"
gps_coords = get_gps_coordinates(video_path)

if gps_coords:
    print(f"📍 Coordonnées GPS : Latitude {gps_coords[0]}, Longitude {gps_coords[1]}")
else:
    print("❌ Aucune donnée GPS trouvée.")
