<?php 
require('php/config.php');
include_once('partials/head.php');

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // Récupération de l'ID depuis l'URL

    try {
        // Requête pour récupérer l'élément avec l'ID dynamique
        $sql = "SELECT * FROM animal_species WHERE id = :id"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si des résultats sont retournés
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Aucun résultat trouvé pour l'ID $id.";
            exit; // Arrêter l'exécution si aucun résultat n'est trouvé
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        exit;
    }
} else {
    echo "ID non valide.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row["name"]); ?></title>
    <style>
        .card {
            width: 750px;
            height: auto;
            justify-content: center;
            margin: 200px auto;
        }
        .card-img-top {
            object-fit: cover;
            width: 100%;
            height: 400px;
            display: block;
            margin: 0 auto;
        }
        .card-body {
            padding: 10px;
            justify-content: center;
        }
        .card-title {
            font-size: 1.2em;
        }
        .card-text {
            font-size: 0.9em;
        }
    </style>
</head>
<body class="bg-light">
    <div id="db-wrapper">
        <?php include_once('partials/navbar.php'); ?>
        <div id="page-content">
            <div class="header @@classList">
                <nav class="navbar-classic navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
                    <div class="ms-lg-3 d-none d-md-none d-lg-block">
                        <form class="d-flex align-items-center">
                            <input type="search" class="form-control" placeholder="Search">
                        </form>
                    </div>
                </nav>
            </div>
            <div>
                <div class="card">
                <img src="assets/images/blog/<?php echo $row['id']; ?>.jpg" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row["name"]); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row["description"]); ?></p>
                        <ul class="card-text">
                            <li><strong>Nom scientifique:</strong> <?php echo htmlspecialchars($row["scientifical_name"]); ?></li>
                            <li><strong>Taille:</strong> <?php echo htmlspecialchars($row["size"]); ?> cm</li>
                            <li><strong>Poids:</strong> <?php echo htmlspecialchars($row["weight"]); ?> kg</li>
                            <li><strong>Statut:</strong> <?php echo htmlspecialchars($row["statut"]); ?></li>
                           
                        </ul>
                        <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($row["date"]); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('partials/scripts.php'); ?>
</body>
</html>

<?php 
// Fermer la connexion
$conn = null;
?>
