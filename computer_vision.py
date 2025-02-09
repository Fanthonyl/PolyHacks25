import cv2 as cv
import torch
from collections import defaultdict
import pathlib
from PIL import Image

def process_video(video_path, output_path, yolov5_repo_path, model_weights_path):
    # Temporary fix for PosixPath on Windows
    temp = pathlib.PosixPath
    pathlib.PosixPath = pathlib.WindowsPath

    # Load YOLOv5 model
    model = torch.hub.load(yolov5_repo_path, 'custom', path=model_weights_path, source='local')

    # Open the video file
    cap = cv.VideoCapture(video_path)

    # Get video properties
    fps = int(cap.get(cv.CAP_PROP_FPS))
    width = int(cap.get(cv.CAP_PROP_FRAME_WIDTH))
    height = int(cap.get(cv.CAP_PROP_FRAME_HEIGHT))

    # Define the codec and create VideoWriter object
    fourcc = cv.VideoWriter_fourcc(*'mp4v')  # Codec for MP4
    out = cv.VideoWriter(output_path, fourcc, fps, (width, height))

    # Initialize trackers and initialize KCF tracker for each object
    trackers = []  # List to store tracker instances
    tracking_objects = []  # List to store tracking objects with ID and class
    class_counts = defaultdict(set)  # A dictionary to track unique IDs for each class
    detected_objects = []  # List to store detected objects with their details

    # Process the video frame by frame
    frame_idx = 0
    confidence_threshold = 0.7  # Set a confidence threshold
    min_box_area = 300  # Minimum area for a valid bounding box

    while cap.isOpened():
        ret, frame = cap.read()
        if not ret:
            break

        # Convert frame to RGB (YOLOv5 expects RGB format)
        frame_rgb = cv.cvtColor(frame, cv.COLOR_BGR2RGB)

        # Perform inference
        results = model(frame_rgb)

        # Extract detections (bounding boxes, confidence scores, and class labels)
        detections = results.xyxy[0].cpu().numpy()  # [x1, y1, x2, y2, confidence, class_id]

        # Prepare list of bounding boxes and class IDs
        boxes = []
        class_ids = []
        for det in detections:
            x1, y1, x2, y2, confidence, class_id = det
            if confidence > confidence_threshold:
                # Check if the bounding box area is reasonable
                if (x2 - x1) * (y2 - y1) > min_box_area:
                    boxes.append([x1, y1, x2, y2])
                    class_ids.append(class_id)

        # Initialize trackers for new objects
        if frame_idx == 0 or len(boxes) != len(trackers):  # Initialize trackers on the first frame or when the number of objects changes
            trackers.clear()  # Clear previous trackers if any
            tracking_objects.clear()  # Clear previous tracking objects

            for i, bbox in enumerate(boxes):
                # Initialize a new tracker for each detected object
                x1, y1, x2, y2 = map(int, bbox)
                tracker = cv.TrackerKCF_create()  # Create a new KCF tracker
                trackers.append(tracker)
                tracking_objects.append({'track_id': i, 'class_id': int(class_ids[i])})
                success = tracker.init(frame, (x1, y1, x2 - x1, y2 - y1))  # Initialize the tracker
                if not success:
                    print(f"Failed to initialize tracker for object {i}")

        # Update trackers for existing objects
        for obj, tracker in zip(tracking_objects, trackers):
            success, bbox = tracker.update(frame)  # Update each tracker

            if success:
                x, y, w, h = map(int, bbox)
                class_id = obj['class_id']

                # Count unique objects
                class_counts[class_id].add(obj['track_id'])

                # Draw bounding box on frame
                cv.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)
                label = f"{model.names[class_id]} {obj['track_id']}"
                cv.putText(frame, label, (x, y - 10), cv.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)

                # Extract timestamp, latitude, and longitude (dummy values for now)
                timestamp = frame_idx / fps
                latitude = 0.0  # Replace with actual latitude extraction
                longitude = 0.0  # Replace with actual longitude extraction

                detected_objects.append((model.names[class_id], latitude, longitude, timestamp))
            else:
                print(f"Tracker failed for object {obj['track_id']}")

        # Write the frame to the output video
        out.write(frame)

        frame_idx += 1
        print(f"Processed frame {frame_idx}", end="\r")

    # Release video objects
    cap.release()
    out.release()

    # Print the results
    print("\nTracking complete. Unique objects detected:")
    for class_id, ids in class_counts.items():
        print(f"{model.names[class_id]}: {len(ids)} unique objects")

    print(f"Video saved at: {output_path}")

    return detected_objects

# Example usage
video_path = r'C:/Users/basti/Dossiers en local/Codes locaux/PolyHacks25/Data/Videos/turtle_plastic.mp4'
output_path = r'C:/Users/basti/Dossiers en local/Codes locaux/PolyHacks25/Results/test_tard_turtle_plastic.mp4'
yolov5_repo_path = r'C:/Users/basti/Dossiers en local/Codes locaux/PolyHacks25/Yolo weights/yolov5'
model_weights_path = r'C://Users//basti//Dossiers en local//Codes locaux//PolyHacks25//Yolo weights//yolov5//Caraibes_weight_2//best.pt'

detected_objects = process_video(video_path, output_path, yolov5_repo_path, model_weights_path)
print(detected_objects)
