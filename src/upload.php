<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from codescandy.com/dashui/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 16:42:58 GMT -->
<?php	$video_path = "<assets.mp4"; include_once('partials/head.php'); ?>

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
        <source src="<?php echo $video_path; ?>" type="video/mp4">
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