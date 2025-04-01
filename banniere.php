<?php
$racine_site = "http://" . $_SERVER['HTTP_HOST'] . "/"; // Chemin vers le dossier racine du site
?>
<link rel="stylesheet" href="../css/banniere.css">
<div class="banner">
    <div class="login-container">
        <?php
        if (isset($_SESSION['user']['valid']) && $_SESSION['user']['valid'] == true) { ?>
            <a href="<?php echo $racine_site; ?>page/deconnect.php" class="login-link">
                Déconnexion
            </a>
        <?php } else { ?>

            <a href="<?php echo $racine_site; ?>page/login.php" class="login-link">
                Connexion
            </a>
        <?php } ?>
        <strong style="color: white;">/</strong>
        <a href="<?php echo $racine_site; ?>page/register.php" class="login-link">
            Inscription
        </a>
    </div>

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

            <div id="panier" class="panier">

            </div>
        </div>
        <div class="search-container">
            <form action="<?php echo $racine_site; ?>page/article.php?shearch=" method="get" class="search-form">
                <input type="text" name="shearch" placeholder="Rechercher un article" class="search-input" id="search-input">
                <button type="submit" class="search-button">
                    <img src="<?php echo $racine_site; ?>/img/loupe.png" alt="Rechercher" class="search-icon" width="20" height="20">
                </button>
            </form>
        </div>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const updatePanierCount = () => {
            fetch("<?php echo $racine_site; ?>page/core/get_panier.php")
                .then(response => response.json())
                .then(data => {
                    const panierCountElement = document.getElementById("panier-count");
                    if (panierCountElement && data.count !== undefined) {
                        panierCountElement.textContent = data.count;
                        const panier = document.getElementById("panier");
                        panier.innerHTML = `<p id="countPanier">Nombre d'articles dans le panier : ${data.count}</p>`;
                        let totalprice = 0;

                        let Tabpanier = data.panier;
                        for (const ArticleId in Tabpanier) {
                            const article = Tabpanier[ArticleId];
                            totalprice += article.price * article.quantity;
                            let articleDiv = document.createElement("div");
                            articleDiv.style.display = "grid";
                            articleDiv.style.gridTemplateColumns = "50px auto 50px 80px"; // Ajustez les largeurs selon vos besoins
                            articleDiv.style.alignItems = "center";
                            articleDiv.style.gap = "10px"; // Espace entre les éléments
                            articleDiv.style.borderBottom = "1px solid #ccc";
                            articleDiv.style.padding = "10px 0"; // Ajoute un peu d'espace en haut et en bas

                            let img = document.createElement("img");
                            img.src = article.img;
                            img.alt = "Image de l'article";
                            img.width = 50;
                            img.height = 50;
                            articleDiv.appendChild(img);

                            let nomArticle = document.createElement("p");
                            nomArticle.textContent = article.title;
                            articleDiv.appendChild(nomArticle);

                            let quantiteArticle = document.createElement("p");
                            quantiteArticle.textContent = "x" + article.quantity;
                            quantiteArticle.style.fontWeight = "bold";
                            articleDiv.appendChild(quantiteArticle);

                            let prixArticle = document.createElement("p");
                            prixArticle.textContent = article.price + " €";
                            prixArticle.style.fontWeight = "bold";
                            articleDiv.appendChild(prixArticle);

                            panier.appendChild(articleDiv);
                        }
                        const prixTotalElement = document.createElement("p");
                        prixTotalElement.textContent = `Prix total : ${totalprice} €`;

                        const countPanierElement = document.getElementById("countPanier");
                        if (countPanierElement) {
                            countPanierElement.insertAdjacentElement('afterend', prixTotalElement);
                        }
                    }
                })
                .catch(error => console.error("Error fetching panier count:", error));
        };

        // Initial update
        updatePanierCount();

        // Update every 10 seconds
        setInterval(updatePanierCount, 10000);
    });

    //animation de recherche
    const searchInput = document.getElementById("search-input");

    searchInput.addEventListener("focus", () => {
        searchInput.classList.add("expanded");
    })

    searchInput.addEventListener("blur", () => {
        searchInput.classList.remove("expanded");
    })
</script>