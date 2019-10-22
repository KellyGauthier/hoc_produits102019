<?php
session_start();
var_dump ($_POST);

// TODO: Insérer l'email en BDD
echo $_POST["email"];

// enregistrer message dans la session
// TODO : vérifier que la clé notification est bien vide
// sinon on écrase toutes les notifications précédentes
// Donc, on voudra ajouter une nouvelle notification au tableau
// Maos vérifier qu'il est défini, et s'il ne l'eat pas, le créer
$_SESSION["notifications"] = [
    'success' => [
        'Merci, votre email a bien été enregistré'
    ],
    'info' => [
        'RGPD : Votre email ne sera pas utilisé pour de la publicité.'
    ]
    
];

// rediriger vers la page d'accueil
// TODO : factoriser cette méthode dans une classe utilitaire
header('Location: index.php');
exit;