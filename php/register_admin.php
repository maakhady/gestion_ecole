<?php
include 'db.php'; // Inclusion du fichier de connexion

// Récupération des données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Préparation de la requête d'insertion
$stmt = $conn->prepare('INSERT INTO administrators (first_name, last_name, email, password_hash, role) VALUES (?, ?, ?, ?, ?)');
$stmt->bind_param('sssss', $prenom, $nom, $email, $mot_de_passe, $role);

if ($stmt->execute()) {
    echo 'Administrateur enregistré avec succès.';
} else {
    echo 'Erreur : ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
