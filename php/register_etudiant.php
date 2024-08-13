<?php
include 'db.php'; // Inclusion du fichier de connexion

// Récupération des données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$niveau = $_POST['niveau'];

// Génération d'un matricule unique
$matricule = 'STU' . strtoupper(uniqid());

// Préparation de la requête d'insertion
$stmt = $conn->prepare('INSERT INTO students (first_name, last_name, dob, email, phone, level, matricule) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('sssssss', $prenom, $nom, $dob, $email, $telephone, $niveau, $matricule);

if ($stmt->execute()) {
    echo 'Étudiant enregistré avec succès.';
} else {
    echo 'Erreur : ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
