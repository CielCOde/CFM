<?php
session_start();
include("../../config/db_config.php");
header("content-type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$product_token = $data['product_token'];
$quantite = $data['quantity'];

$token_session = $_SESSION['token'];

foreach ($token_session as $code => $token) {
    if ($token == $product_token) {

        $sql_request = "SELECT * FROM article WHERE CODE = :code";
        $statement = $pdo->prepare($sql_request);
        $statement->execute(['code' => $code]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $result = $results[0];
        $title = $result['TITLE'];

        $_SESSION['panier'][$code] = [
            'title' => $title,
            'price' => $result['PRICE'],
            'img' => $result['IMG']
        ];

        echo json_encode(['status' => 'success', 'message' => 'L\'Article ' . $title . ' à été ajouté au panier ✅']);
        error_log("Token de session : " . $token . "et token envoyée = " . $product_token);
        error_log("Code article retrouvé : " . $code . ", Token : " . $token);
    }
}
