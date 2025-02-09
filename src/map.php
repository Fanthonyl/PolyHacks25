<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from codescandy.com/dashui/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 16:42:58 GMT -->
<?php	    include_once('partials/head.php'); ?>

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
    <!--Navbar nav -->
   
  </nav>
</div>
<!-- Titre principal -->
<h1 style="text-align: center; margin-top: 20px; font-size: 3em; color: #333;">Carte Interactive des Océans</h1>

        <!-- Container fluid -->
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: lightblue;">
        <div id="map" style="width: 50%; height: 500px;"></div>
        <script>
          // Initialiser la carte
var map = L.map('map').setView([22.5, -89.5], 3); // Paris avec un zoom initial de 13

// Ajouter le Tile Layer ArcGIS World Imagery
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy; <a href="https://www.esri.com/">Esri</a> contributors',
    maxZoom: 18, // Zoom maximum autorisé
    minZoom: 2   // Zoom minimum autorisé
}).addTo(map);

// Ajouter un marqueur à Paris (ou à toute autre localisation de ton choix)
//L.marker([22.5, -89.5]).addTo(map)
    //.bindPopup('Golfe du Mexique!')
    //.openPopup();

  // Définir des icônes personnalisées
var lionfishIcon = L.icon({
    iconUrl: 'http://localhost/bluewatch/PolyHacks25/src/assets/images/minilogo/lionfish.png', // Exemple d'icône pour poisson-lion
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -40]
});

var turtleIcon = L.icon({
    iconUrl: 'http://localhost/bluewatch/PolyHacks25/src/assets/images/minilogo/turtle.png', // Exemple d'icône pour tortue
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -40]
});

var wasteIcon = L.icon({
    iconUrl: 'http://localhost/bluewatch/PolyHacks25/src/assets/images/minilogo/waste.png', // Exemple d'icône pour déchet
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -40]
});

// Ajouter plusieurs icônes autour du marqueur principal
var markers = [
  { lat: 22.55, lon: -89.45, icon: lionfishIcon, text: '50 Lionfish', id: 1 },
            { lat: 22.50, lon: -89.50, icon: turtleIcon, text: '60 Turtles', id: 2 },
            { lat: 22.60, lon: -89.55, icon: wasteIcon, text: '30 Waste', id: 3 },
            { lat: 22.65, lon: -89.60, icon: turtleIcon, text: '6 Turtles', id: 2 },
            { lat: 22.70, lon: -89.65, icon: lionfishIcon, text: '10 Lionfish', id: 1 },

    { lat: 24.55, lon: -87.45, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 24.50, lon: -87.50, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 24.60, lon: -87.55, icon: wasteIcon, text: '2 Waste', id: 1 },

    { lat: 24.55, lon: -92.45, icon: lionfishIcon, text: '8 Lionfish', id: 1 },
    { lat: 24.50, lon: -92.50, icon: turtleIcon, text: '9 Turtles', id: 1 },
    { lat: 24.60, lon: -92.55, icon: wasteIcon, text: '30 Waste', id: 1 },

    { lat: 10.55, lon: -82.45, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 10.50, lon: -82.50, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 10.60, lon: -82.55, icon: wasteIcon, text: '30 Waste', id: 1 },




    { lat: 40.720, lon: -74.010, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 40.725, lon: -74.015, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 40.730, lon: -74.020, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: 40.735, lon: -74.025, icon: turtleIcon, text: '4 Turtles', id: 1 },
    { lat: 40.740, lon: -74.030, icon: lionfishIcon, text: '7 Lionfish', id: 1 },

    { lat: -33.88, lon: 151.22, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: -33.89, lon: 151.23, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: -33.90, lon: 151.24, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: -33.91, lon: 151.25, icon: turtleIcon, text: '4 Turtles', id: 1 },
    { lat: -33.92, lon: 151.26, icon: lionfishIcon, text: '7 Lionfish', id: 1 },

    { lat: 36.79, lon: -119.42, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 36.80, lon: -119.43, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 36.81, lon: -119.44, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: 36.82, lon: -119.45, icon: turtleIcon, text: '4 Turtles', id: 1 },
    { lat: 36.83, lon: -119.46, icon: lionfishIcon, text: '7 Lionfish', id: 1 },

    { lat: -22.92, lon: 149.10, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: -22.93, lon: 149.11, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: -22.94, lon: 149.12, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: -22.95, lon: 149.13, icon: turtleIcon, text: '4 Turtles', id: 1 },
    { lat: -22.96, lon: 149.14, icon: lionfishIcon, text: '7 Lionfish', id: 1 },

    { lat: 20.60, lon: 78.97, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 20.61, lon: 78.98, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 20.62, lon: 78.99, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: 20.63, lon: 79.00, icon: turtleIcon, text: '4 Turtles', id: 1 },
    { lat: 20.64, lon: 79.01, icon: lionfishIcon, text: '7 Lionfish', id: 1 },

    { lat: 51.51, lon: -0.13, icon: lionfishIcon, text: '5 Lionfish', id: 1 },
    { lat: 51.52, lon: -0.14, icon: turtleIcon, text: '6 Turtles', id: 1 },
    { lat: 51.53, lon: -0.15, icon: wasteIcon, text: '30 Waste', id: 1 },
    { lat: 51.54, lon: -0.16, icon: turtleIcon, text: '4 Turtles' , id: 1},
    { lat: 51.55, lon: -0.17, icon: lionfishIcon, text: '7 Lionfish', id: 1 }
];


        // Ajouter chaque marqueur sur la carte
        markers.forEach(function(marker) {
            // Construire l'URL pour species.php en fonction de l'ID de l'espèce
            var popupContent = '<h3>' + marker.text + '</h3>' +
                               '<p><a href="species.php?id=' + marker.id + '" target="_blank">Voir les détails</a></p>';

            var createdMarker = L.marker([marker.lat, marker.lon], {icon: marker.icon}).addTo(map);
            createdMarker.bindPopup(popupContent);
        });

   
    // Liste des cercles avec leurs coordonnées et rayons
var circleData = [
  {lat: 22.5, lon: -89.5, radius: 500000, color: 'blue', popup: "Golfe du Mexique"},
    {lat: 40.7128, lon: -74.0060, radius: 500000, color: 'green', popup: "Océan Atlantique - New York"},
    {lat: -33.8688, lon: 151.2093, radius: 500000, color: 'aqua', popup: "Océan Pacifique - Sydney"},
    {lat: 36.7783, lon: -119.4179, radius: 500000, color: 'cyan', popup: "Océan Pacifique - Californie"},
    {lat: -22.9133, lon: 149.0820, radius: 500000, color: 'lightblue', popup: "Grande Barrière de Corail"},
    {lat: 20.5937, lon: 78.9629, radius: 500000, color: 'darkblue', popup: "Mer d'Arabie - Inde"},
    {lat: 51.5074, lon: -0.1278, radius: 500000, color: 'royalblue', popup: "Mer du Nord - Londres"},
    {lat: 10.0, lon: -83.0, radius: 500000, color: 'blueviolet', popup: "Mer des Caraïbes"},
    {lat: -8.4095, lon: 115.1889, radius: 500000, color: 'deepskyblue', popup: "Océan Indien - Indonésie"},
    {lat: 7.0, lon: 80.0, radius: 500000, color: 'mediumblue', popup: "Océan Indien - Sri Lanka"}
];

// Ajouter chaque cercle à la carte
circleData.forEach(function(data) {
    var circle = L.circle([data.lat, data.lon], {
        color: data.color, 
        fillColor: data.color, 
        fillOpacity: 0.2, 
        radius: data.radius
    }).addTo(map);
    
    // Ajouter un popup pour chaque cercle
    circle.bindPopup(data.popup);
});

    </script>
     </div>
    </div>



    <!-- Scripts -->
    <?php	    include_once('partials/scripts.php'); ?>
   

  </body>


<!-- Mirrored from codescandy.com/dashui/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 16:43:10 GMT -->
</html>