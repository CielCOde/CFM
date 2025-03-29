<?php
$racine_site = "http://" . $_SERVER['HTTP_HOST'] . "/"; // Chemin vers le dossier racine du site
?>
<link rel="stylesheet" href="../css/banniere.css">
<div class="banner">
    <div class="logo-container">
        <img src="../img/logo/CFM.webp" alt="Logo CFM" class="logo">
        <h1 class="site-title">CFM</h1>
    </div>
    <div class="nav-container">
        <nav>
            <ul class="nav-list">
                <li><a href="<?php echo $racine_site; ?>index.php">Accueil</a></li>
                <li><a href="<?php echo $racine_site; ?>page/article.php">Articles</a></li>
                <li><a href="<?php echo $racine_site; ?>page/contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="panier-container">
            <img src="../img/panier.jpeg" alt="Panier" class="panier-icon">
            <span class="panier-count" id="panier-count">0</span>
        </div>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const updatePanierCount = () => {
        fetch("<?php echo $racine_site;?>page/core/get_panier.php")
            .then(response => response.json())
            .then(data => {
                const panierCountElement = document.getElementById("panier-count");
                if (panierCountElement && data.count !== undefined) {
                    panierCountElement.textContent = data.count;
                }
            })
            .catch(error => console.error("Error fetching panier count:", error));
    };

    // Initial update
    updatePanierCount();

    // Update every 10 seconds
    setInterval(updatePanierCount, 10000);
});

</script>