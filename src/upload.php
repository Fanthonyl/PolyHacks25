<!DOCTYPE html>
<html lang="en">
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

// Extract detected objects from headers (if needed)
preg_match('/X-Detected-Objects: (.*)/', $headers, $matches);
if (!empty($matches)) {
    $detected_objects = $matches[1];
    echo "Detected Objects: $detected_objects\n";
}

// Close cURL
curl_close($ch);

echo "Video downloaded successfully as 'downloaded_video.mp4'.\n";

$video_path = "assets/video/caraibes.webm"; include_once('partials/head.php'); ?>

  <body class="bg-light">
    <div id="db-wrapper">
      <!-- navbar vertical -->
       <!-- Sidebar -->
       <?php	    include_once('partials/navbar.php'); ?>
       <!-- Page content -->
      <div id="page-content">
        <div class="header @@classList">
  <!-- navbar -->
  <nav class="navbar-classic navbar navbar-expand-lg">
    <a id="nav-toggle" href="#"><i
        data-feather="menu"

        class="nav-icon me-2 icon-xs"></i></a>
    <div class="ms-lg-3 d-none d-md-none d-lg-block">
      <!-- Form -->
      <form class="d-flex align-items-center">
        <input type="search" class="form-control" placeholder="Search" />
      </form>
    </div>
   
  </nav>
</div>
        <!-- Container fluid -->
        <div>
    <div style="text-align: center;">
      <h2>Dernière détection</h2>
      <video width="640" height="360" controls>
        <source src="<?php echo $video_path; ?>" type="video/webm">
        Votre navigateur ne supporte pas la lecture de vidéos.
      </video>
    </div>

    <form action="/upload" method="POST" enctype="multipart/form-data" style="text-align: center;">
        <input type="file" name="avatar">
        <button type="submit" class="btn btn-outline-white me-1">Change</button>
    </form>
</div>




    <!-- Scripts -->
    <?php	    include_once('partials/scripts.php'); ?>
   

  </body>


<!-- Mirrored from codescandy.com/dashui/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 16:43:10 GMT -->
</html>