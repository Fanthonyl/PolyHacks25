<?php
$host = 'localhost'; // ou l'adresse IP du serveur de base de données
$user = 'root'; // ton nom d'utilisateur
$password = ''; // ton mot de passe
$dbname = 'bluewatch'; // le nom de la base de données

try {
    // Créer la connexion PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Définir le mode d'erreur PDO à Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to the database 'bluewatch'.";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
