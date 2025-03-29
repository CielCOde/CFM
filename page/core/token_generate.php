<?php
if (!isset($_SESSION['token'][$code])) {
    // Génération d'un token aléatoire
    $token = bin2hex(random_bytes(32));
    $specialChar = '!#$%&()*\+,-./:;<=>?@[\\]^_`{|}~';
    $chaine_melange = $token . $specialChar;
    $code_token = substr(str_shuffle($chaine_melange), 0, 64);
    $_SESSION['token'][$code] = $code_token;
} else {
    $code_token = $_SESSION['token'][$code];
}
?>