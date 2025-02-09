<!DOCTYPE html>
<html lang="en">

<?php include_once('partials/head.php'); ?>
<style>
            .card {
                width: 750px; /* Ajuste la largeur selon la taille souhaitée */
                height: auto; /* Hauteur automatique pour s'adapter au contenu */
                justify-content: center; /* Centre le contenu */
                margin: 200px;
            }

            .card-img-top {
                object-fit: cover;  /* L'image couvre la zone sans déborder */
                width: 100%;         /* Largeur de l'image égale à la largeur du conteneur */
                height: 400px;       /* Réduit la hauteur de l'image */
                display: block;      /* Permet de centrer l'image */
                margin-left: auto;   /* Centre horizontalement l'image */
                margin-right: auto; /* Centre le contenu */  /* Réduit la hauteur de l'image */
            }

            .card-body {
                padding: 10px; /* Réduit l'espacement autour du texte */
                justify-content: center; /* Centre le contenu */
            }

            .card-title {
                font-size: 1.2em; /* Réduit la taille du titre */
            }

            .card-text {
                font-size: 0.9em; /* Réduit la taille du texte */
            }
        </style>
<body class="bg-light">
    <div id="db-wrapper">
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
            <div>

            <div ></div>
        <div>
                      <!-- Container fluid -->
           
    <!-- Image on Top -->
    <div class="card">
        <img src="assets/images/blog/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Lionfish</h5>
            <p class="card-text">
                Lionfish are venomous marine fish native to the Indo-Pacific but invasive in the Atlantic and Caribbean.
                Recognizable by their red, white, and brown striped bodies and long, fan-like pectoral fins, they are skilled ambush predators.
            </p>
            <ul class="card-text">
                <li><strong>Scientific Name:</strong> Pterois</li>
                <li><strong>Average Size:</strong> 30-40 cm (12-15 inches)</li>
                <li><strong>Habitat:</strong> Coral reefs, rocky crevices, and seagrass beds</li>
                <li><strong>Diet:</strong> Small fish, shrimp, and crustaceans</li>
                <li><strong>Temperature Range:</strong> 22-28°C (72-82°F)</li>
                <li><strong>Venomous Spines:</strong> Dorsal, pelvic, and anal spines</li>
                <li><strong>Invasive Threat:</strong> Rapid reproduction and lack of natural predators</li>
            </ul>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
        
      </div>
            
</div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include_once('partials/scripts.php'); ?>
</body>

</html>
