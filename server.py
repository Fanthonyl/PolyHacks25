from fastapi import FastAPI
from fastapi.responses import FileResponse
from computer_vision import process_video

app = FastAPI()

@app.get("/")
def read_root(videopath: str, outputpath: str, yolov5_repo_path: str, model_weights_path: str):
    # Process the video
    detected_objects = process_video(videopath, outputpath, yolov5_repo_path, model_weights_path)
    
    # Return the video file along with the detected objects as headers
    return FileResponse(
        outputpath, 
        media_type="video/webm", 
        headers={"X-Detected-Objects": str(detected_objects)}
    )