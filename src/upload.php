<!DOCTYPE html>
<html lang="en">
<?php

// Define API endpoint and query parameters
$api_url = "http://127.0.0.1:8000/";
$params = [
    'videopath' => 'C:\wamp64\www\bluewatch\PolyHacks25\video\caraibes.webm',
    'outputpath' => 'C:\wamp64\www\bluewatch\PolyHacks25\video\output\caraibes.webm',
    'yolov5_repo_path' => 'C:\wamp64\www\bluewatch\PolyHacks25\Yolo weights\Yolo weights\yolov5',
    'model_weights_path' => 'C:\wamp64\www\bluewatch\PolyHacks25\Yolo weights\Yolo weights\yolov5\Caraibes_weight_2\best.pt'
];

$video_path = "../video/output/caraibes.webm"; 
include_once('partials/head.php'); 
?>

<body class="bg-light">
  <div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    <?php include_once('partials/navbar.php'); ?>
    <!-- Page content -->
    <div id="page-content">
      <div class="header @@classList">
        <!-- navbar -->
        <nav class="navbar-classic navbar navbar-expand-lg">
          <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
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
        <div style="text-align: center; margin-top: 20px;">
          <h2>Dernière détection</h2>
          <video width="1000px" height="auto" controls>
            <source src="<?php echo $video_path; ?>" type="video/webm">
            Votre navigateur ne supporte pas la lecture de vidéos.
          </video>
        </div>

        <!-- File Upload Form -->
        <form action="/upload" method="POST" enctype="multipart/form-data" style="text-align: center;">
          <input type="file" name="avatar">
          <button type="submit" class="btn btn-outline-white me-1">Change</button>
        </form>

        <!-- Trigger button to call the API -->
        <div style="text-align: center; margin-top: 20px;">
          <button id="apiCallButton" class="btn btn-primary">Call API</button>
        </div>
      </div>
    </div>

  </div>

  <!-- Scripts -->
  <?php include_once('partials/scripts.php'); ?>

  <script>
    // JavaScript to handle the button click
    document.getElementById('apiCallButton').addEventListener('click', function() {
      // Create the AJAX request
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'call_api.php', true);  // Adjust the endpoint to your PHP handler
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          alert('API call successful!');
          // Optionally handle the response here (update video, etc.)
          console.log(xhr.responseText);
        } else if (xhr.readyState == 4) {
          alert('API call failed!');
        }
      };
      xhr.send();
    });
  </script>

</body>

</html>
