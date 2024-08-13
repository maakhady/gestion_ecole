<?php
session_start();
include 'db.php'; // Inclusion du fichier de connexion

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Préparation de la requête de sélection
$stmt = $conn->prepare('SELECT * FROM administrators WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$administrateur = $result->fetch_assoc();

if ($administrateur && password_verify($mot_de_passe, $administrateur['password_hash'])) {
    $_SESSION['user_id'] = $administrateur['id'];
    $_SESSION['role'] = $administrateur['role'];
    echo 'Connexion réussie.';
} else {
    echo 'Identifiants incorrects.';
}

$stmt->close();
$conn->close();
?>
