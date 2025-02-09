from fastapi import FastAPI
from computer_vision import process_video

app = FastAPI()

@app.get("/")
def read_root(videopath: str, outputpath: str, yolov5_repo_path: str, model_weights_path: str):
    return process_video(videopath, outputpath, yolov5_repo_path, model_weights_path)

