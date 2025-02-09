<!DOCTYPE html>
<html lang="en">


<style>
  
  
.background-clip{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
    background-color: black; /* Fond noir */
            overflow: hidden;
}

.hero-section {
            position: relative;
            color: white;
            text-align: center;
            font-size: 24px;
            z-index: 1;
        }

@media (min-aspect-ratio:16/9) {
    .background-clip{
        width: 100%;
        height: auto;
    }
}

@media (max-aspect-ratio:16/9) {
    .background-clip{
        width: auto;
        height: 100%;
    }
}
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blue Watch</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
   
<div class="video-container">
  <video autoplay loop muted plays-inline class="background-clip">
            <source src="assets/video/video.mp4" type="video/mp4">
        </video>
        
</div>
<section class="hero-section">
  <div class="container">
    <div class="content">
      <h1 class="gradient-text">
      Surveillez les Écosystèmes Marins.
        <span class="block"> Protégez la biodiversité.</span>
      </h1>

      <p class="description">
      Une plateforme interactive permettant de suivre l&apos;état des océans, d&apos;analyser les données 
      environnementales et de contribuer à la préservation des milieux marins grâce à une carte en temps réel.
      </p>

      <div class="buttons">
        <a class="btn primary" href="map.php">Explorez Notre Carte</a>
        <a class="btn secondary" href="#">En Savoir Plus</a>
      </div>
    </div>
  </div>
</section>
</body>
</html>
