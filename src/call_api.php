<?php

// Define API endpoint and query parameters
$api_url = "http://127.0.0.1:8000/";
$params = [
    'videopath' => 'C:\wamp64\www\bluewatch\PolyHacks25\video\caraibes.mp4',
    'outputpath' => 'C:\wamp64\www\bluewatch\PolyHacks25\video\output\caraibes.mp4',
    'yolov5_repo_path' => 'C:\wamp64\www\bluewatch\PolyHacks25\Yolo weights\Yolo weights\yolov5',
    'model_weights_path' => 'C:\wamp64\www\bluewatch\PolyHacks25\Yolo weights\Yolo weights\yolov5\Caraibes_weight_2\best.pt'
];

// Build query string
$query_string = http_build_query($params);

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url . "?" . $query_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true); // To fetch headers

// Execute the request
$response = curl_exec($ch);

// Get headers and body
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($response, 0, $header_size);
$body = substr($response, $header_size);

// Save the video to a file
file_put_contents('downloaded_video.mp4', $body);

// Close cURL
curl_close($ch);

// Output response
echo "API call was successful!";
?>
