<?php
session_start();
include("./db_config.php");

header('Content-Type: application/json; charset=utf-8');
$data = json_decode(file_get_contents('php://input'), true);
error_log("Received data: " . json_encode($data), 0);

$token = $_SESSION['token'];

foreach ($token as $user_id => $token_value) {
    error_log("Token for user $user_id: " . json_encode($token_value), 0);
    if ($data['token'] === $token_value) {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql_request = "UPDATE admin SET password = :password WHERE id = :id";
        $stmt = $pdo->prepare($sql_request);

        if ($stmt->execute([':password' => $password, ':id' => $user_id])) {
            echo json_encode(['success' => true, 'message' => 'Mot de passe créé avec succès.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du mot de passe.']);
        }
        break;
    } else {
        echo json_encode(['success' => false, 'message' => 'Token invalide.']);
    }

    unset($_SESSION['token']);
}
?>
