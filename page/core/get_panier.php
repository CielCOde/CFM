<?php
session_start();

// Check if the panier exists in the session
$panier = $_SESSION['panier'] ?? [];

// Count the number of items in the panier
$panierCount = count($panier);

// Return the count as a JSON response
header('Content-Type: application/json');
echo json_encode([
    'count' => $panierCount,
    'panier' => $panier, 
]);
?>