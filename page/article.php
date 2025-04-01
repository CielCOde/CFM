<link rel="stylesheet" href="../css/article.css">
<?php
session_start();

use BcMath\Number;


include("../config/db_config.php");
include("../banniere.php");

$shearch = $_GET['shearch'] ?? null;


$code = $_GET['product'] ?? null;
if (is_string($code) && !empty($code) && !preg_match('/\d/', $code)) {
    echo "<h1>L'article : " . $code . " n'existe pas</h1>";
    echo '<a href="./article.php">Cliquez ici pour revenir à la page article</a>';
}
if (is_numeric($code)) {

    include("../page/core/articlezoom.php");
} else if ($code == null) {
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
    <div class="container-principal">
        <div class="filter-container" id="filter-container">

        </div>
        <div class="container-article">
            <?php foreach ($articles as $article) {
                $code = $article['CODE'];
                //intégration du token
                include("../page/core/token_generate.php");
                if (isset($shearch)) {
                    if (stripos($article['TITLE'], $shearch) === false && stripos($article['CONTENT'], $shearch) === false) {
                        continue; // Ignore cet article s'il ne correspond pas à la recherche
                    }
                }
            ?>
                <div class="box-container">
                    <div>
                        <img src="<?php echo $article['IMG']; ?>" width="130px" height="130px">
                    </div>
                    <div style="margin-right: 15px;">
                        <div class="ref-article">
                            <a href="<?php echo "./article.php?product=" . $article['CODE']; ?>">
                                <h3><?php echo $article['TITLE']; ?></h3>
                            </a>
                            <p style="color:#3d3d329c; ">Code : <?php echo $article['CODE']; ?></p>
                            <p class="price">Prix : <?php echo $article['PRICE']; ?>€</p>
                        </div>
                        <p>Description : <?php echo $article['CONTENT']; ?></p>
                        <p>Ajouté le : <?php echo str_time($article['PUBLISHED']); ?></p>
                    </div>
                    <div class="button-container">
                        <button class="send_panier" data-code="<?php echo $code_token; ?>">
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php
}
?>

<script src="../page/core/add_panier.js"></script>