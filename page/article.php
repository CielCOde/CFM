<link rel="stylesheet" href="../css/article.css">
<?php

use BcMath\Number;

include("../config/db_config.php");

$code = $_GET['product'] ?? null;
if(is_string($code) && !empty($code) && !preg_match('/\d/', $code)) {
    echo "<h1>L'article : " . $code . " n'existe pas</h1>";  
    echo '<a href="./article.php">Cliquez ici pour revenir à la page article</a>';
}
if (is_numeric($code)) {
    $sql_request = "SELECT * FROM article WHERE CODE = :code";
    $statement = $pdo->prepare($sql_request);
    $statement->execute(['code' => $code]);

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($results == null) {
        echo "<h1> Le code :" . $code . "  n'existe pas</h1>";
        echo '<a href="./article.php">Cliquez ici pour revenir à la page article</a>';
    }
    foreach ($results as $result) {
        print_r($result);
    }
} else if ($code == null) {
    echo "afficher les articles";
    $sql_request = "SELECT * FROM article";
    $result = $pdo->query($sql_request);

    $articles = $result->fetchAll(PDO::FETCH_ASSOC);

    //paramètres local
    function str_time($time)
    {
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::SHORT,
            'Europe/Paris',
            IntlDateFormatter::GREGORIAN
        );
        $date = new DateTime($time);
        return $formatter->format($date);
    }
?>
    <div class="container-article">
        <?php foreach ($articles as $article) { ?>
            <div class="box-container">
                <div>
                    <img src="<?php echo $article['IMG']; ?>" width="130px" height="130px">
                </div>
                <div style="margin-right: 15px;">
                    <div class="ref-article">
                        <h3><?php echo $article['TITLE']; ?></h3>
                        <p style="color:#3d3d329c; ">Code : <?php echo $article['CODE']; ?></p>
                        <p class="price">Prix : <?php echo $article['PRICE']; ?>€</p>
                    </div>
                    <p>Description : <?php echo $article['CONTENT']; ?></p>
                    <p>Ajouté le : <?php echo str_time($article['PUBLISHED']); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
} ?>