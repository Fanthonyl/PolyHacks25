import subprocess
import re

def get_gps_coordinates(video_path):
    """ Récupère les coordonnées GPS et le timestamp d'une vidéo. """
    EXIFTOOL_PATH = r"C:\wamp64\www\bluewatch\PolyHacks25\exiftool.exe"

    def convert_gps_to_decimal(degrees, minutes, seconds, direction):
        """ Convertit une coordonnée GPS en format décimal. """
        decimal = degrees + (minutes / 60.0) + (seconds / 3600.0)
        if direction in ['S', 'W']:  # Si Sud ou Ouest, rendre la valeur négative
            decimal = -decimal
        return decimal

    try:
        # 🔹 Récupérer les informations GPS et le timestamp
        result = subprocess.run(
            [EXIFTOOL_PATH, "-GPSLatitude", "-GPSLongitude", "-GPSLatitudeRef", "-GPSLongitudeRef", "-CreateDate", video_path],
            stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True
        )
        
        if result.stderr:
            print("❌ Erreur ExifTool :", result.stderr)
            return None

        gps_data = {}

        for line in result.stdout.split("\n"):
            lat_match = re.search(r"GPS Latitude\s+:\s+(\d+) deg (\d+)' (\d+\.\d+)\" ([NS])", line)
            lon_match = re.search(r"GPS Longitude\s+:\s+(\d+) deg (\d+)' (\d+\.\d+)\" ([EW])", line)
            timestamp_match = re.search(r"Create Date\s+:\s+(.+)", line)

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

            if timestamp_match:
                gps_data["timestamp"] = timestamp_match.group(1)

        if "latitude" in gps_data and "longitude" in gps_data and "timestamp" in gps_data:
            return [gps_data["latitude"], gps_data["longitude"], gps_data["timestamp"]]
        else:
            return None

    except Exception as e:
        print("❌ Erreur :", e)
        return None

# Exemple d'utilisation
#video_path = r"C:\Users\antho\Videos\hackathon\test.mp4"
#gps_coords = get_gps_coordinates(video_path)
#print(gps_coords)
#[20.65, -83.19, '2025:02:08 19:37:02-05:00']