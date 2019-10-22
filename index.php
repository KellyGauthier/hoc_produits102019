<?php
session_start();
require_once 'data/produits.php';
require_once 'layout/header.php';
?>

<header>
    <?php require_once 'templates/navbar.php'; ?>

    <?php require_once 'templates/notifications.php' ?>

    <?php
    foreach ($produits as $produit) {
        if ($produit["homepage"]) {
            require_once 'templates/jumbotron.php';
        }
    }
    ?>
</header>


<?php require_once 'templates/newsletter.php' ?>

<?php require_once 'layout/footer.php'; ?>