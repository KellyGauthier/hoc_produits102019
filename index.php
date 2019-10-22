<?php
session_start();

require_once 'data/produits.php';

require_once 'templates/header.php';

foreach ($produits as $produit) {
    if ($produit["homepage"]) {
        require 'templates/produit/item_jumbotron.php';
    }
}

require_once 'templates/newsletter/subscription_section.php';

require_once 'templates/footer.php';
