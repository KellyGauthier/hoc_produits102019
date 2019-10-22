<?php
require_once 'src/Utils.php';
session_start();

$util = new Utils;

var_dump ($_POST);

// TODO: Insérer l'email en BDD
echo $_POST["email"];

// enregistrer message dans la session
// TODO : vérifier que la clé notification est bien vide
// sinon on écrase toutes les notifications précédentes
// Donc, on voudra ajouter une nouvelle notification au tableau
// Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer
$_SESSION["notifications"] = [
    'success' => [
        'Merci, votre email a bien été enregistré'
    ],
    'info' => [
        'RGPD : Votre email ne sera pas utilisé pour de la publicité.'
    ]
];

// rediriger vers la page d'accueil
$util->redirect('index.php');