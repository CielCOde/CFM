<?php
session_start();
//inclure la bannière
 include("./banniere.php");
//partie de LOU pour le visuel

?>
<html>
<head>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <!-- En-tête -->
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Créez l'ordinateur de vos rêves</h1>
            <p>Des ordinateurs sur mesure conçus selon vos besoins spécifiques, assemblés par des experts et livrés avec une garantie premium.</p>
            <button class="cta-button">Configurer votre PC</button>
        </div>
    </section>
    
    <!-- Catégories de produits -->
    <section class="categories">
        <h2 class="section-title">Nos gammes de produits</h2>
        <div class="category-grid">
            <div class="category-card">
                <div class="category-image">
                    <img src="/api/placeholder/250/180" alt="PC Gaming">
                </div>
                <div class="category-content">
                    <h3>PC Gaming</h3>
                    <p>Des performances extrêmes pour tous les jeux modernes</p>
                    <button class="category-button">Découvrir</button>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/api/placeholder/250/180" alt="PC Bureautique">
                </div>
                <div class="category-content">
                    <h3>PC Bureautique</h3>
                    <p>Fiabilité et performance pour vos tâches quotidiennes</p>
                    <button class="category-button">Découvrir</button>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/api/placeholder/250/180" alt="Portables">
                </div>
                <div class="category-content">
                    <h3>Portables</h3>
                    <p>Puissance et mobilité sans compromis</p>
                    <button class="category-button">Découvrir</button>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="/api/placeholder/250/180" alt="Stations de travail">
                </div>
                <div class="category-content">
                    <h3>Stations de travail</h3>
                    <p>Des solutions professionnelles hautes performances</p>
                    <button class="category-button">Découvrir</button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pourquoi nous choisir -->
    <section class="features">
        <div class="features-container">
            <h2 class="features-title">Pourquoi choisir ConfigMaster</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">★</div>
                    <h3>Personnalisation complète</h3>
                    <p>Choisissez parmi des milliers de configurations possibles pour créer l'ordinateur qui vous convient.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🛠️</div>
                    <h3>Assemblage par des experts</h3>
                    <p>Chaque ordinateur est monté et testé par nos techniciens qualifiés.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Garantie premium</h3>
                    <p>Jusqu'à 5 ans de garantie sur tous nos ordinateurs avec support technique dédié.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h3>Livraison rapide</h3>
                    <p>Expédition soignée et livraison suivie partout en France et en Europe.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Témoignages -->
    <section class="testimonials">
        <h2 class="section-title">Ce que disent nos clients</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p class="testimonial-text">"Mon PC gaming sur mesure dépasse toutes mes attentes. Le processus de personnalisation était simple et l'assistance a été excellente."</p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div class="author-info">
                        <h4>Thomas D.</h4>
                        <p>PC Gaming Enthusiast</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p class="testimonial-text">"Je cherchais une station de travail pour mon studio de design. PCSpecialist m'a fourni exactement ce dont j'avais besoin avec un excellent rapport qualité-prix."</p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div class="author-info">
                        <h4>Julie M.</h4>
                        <p>Designer Graphique</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <p class="testimonial-text">"Service client exceptionnel ! J'avais des questions techniques et l'équipe a pris le temps de m'expliquer en détail toutes les options."</p>
                <div class="testimonial-author">
                    <div class="author-avatar"></div>
                    <div class="author-info">
                        <h4>Marc L.</h4>
                        <p>Développeur</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>À propos</h3>
                <ul>
                    <li><a href="#">Notre histoire</a></li>
                    <li><a href="#">Notre équipe</a></li>
                    <li><a href="#">Nos valeurs</a></li>
                    <li><a href="#">Recrutement</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Assistance</h3>
                <ul>
                    <li><a href="#">Centre d'aide</a></li>
                    <li><a href="#">Suivi de commande</a></li>
                    <li><a href="#">Retours & garanties</a></li>
                    <li><a href="#">Contactez-nous</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Information</h3>
                <ul>
                    <li><a href="#">Conditions générales</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Moyens de paiement</a></li>
                    <li><a href="#">Livraison</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Suivez-nous</h3>
                <p>Restez informés de nos dernières offres et nouveautés</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">FB</a>
                    <a href="#" class="social-icon">TW</a>
                    <a href="#" class="social-icon">IN</a>
                    <a href="#" class="social-icon">YT</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 ConfigMaster. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
