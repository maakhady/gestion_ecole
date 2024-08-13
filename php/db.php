<?php
$hote = 'localhost'; // ou l'adresse de ton serveur
$utilisateur = 'admin';  // ton nom d'utilisateur MySQL
$mot_de_passe = 'YM1917@j';  // ton mot de passe MySQL
$nom_base_de_donnees = 'management_ecole'; // le nom de ta base de données

// Création de la connexion
$conn = new mysqli($hote, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
