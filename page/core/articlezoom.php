<?php
$code = $_GET['product'] ?? null;

$sql_request = "SELECT * FROM article WHERE CODE = :code";
$statement = $pdo->prepare($sql_request);
$statement->execute(['code' => $code]);

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($results == null) {
    echo "<h1> Le code :" . $code . "  n'existe pas</h1>";
    echo '<a href="./article.php">Cliquez ici pour revenir à la page article</a>';
}
$result = $results[0];
$image = $result['IMG'];
$title = $result['TITLE'];
$content = $result['CONTENT'];
$prix = $result['PRICE'];
$code_article = $result['CODE'];
//chiffrement du code article
//verificqtion de l'existance du token
if (!isset($_SESSION['token'][$code_article])) {

    $token = bin2hex(random_bytes(64));
    $specialChar = '!#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~';
    $code_token = str_shuffle($token . $specialChar);

    $_SESSION['token'][$code_article] = $code_token;
} else {
    $code_token = $_SESSION['token'][$code_article];
}
?>
<h1>Information article : </h1>
<div class="container-artInfo">
    <div class="image-container">
        <img src="<?php echo $image; ?>" width="300px" height="300px">
    </div>
    <div class="container-des">
        <h1><?php echo $title; ?></h1>
        <div>
            <h3>Description :</h3>
            <div>
                <p>
                    <?php echo $content; ?>
                </p>
                <strong>
                    Prix : <?php echo $prix; ?>
                </strong>
            </div>
        </div>
    </div>
    <div class="button-container">
        <button class="send_panier" data-code="<?php echo $code_token; ?>">
            Ajouter au panier
        </button>
    </div>
</div>
<a href="./article.php">Retour au article</a>