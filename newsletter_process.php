<?php
require_once 'vendor/autoload.php';
session_start();


use App\Utils;

try {

    if (!file_exists('config/db.ini') || !$dbConfig = parse_ini_file('config/db.ini')) {
        throw new Exception("Une erreur est survenue lors du chargement du fichier de configuration");
    }

    $dsn = 'mysql:host=' . $dbConfig['host'] .
        ';dbname=' . $dbConfig['name'] .
        ';charset=' . $dbConfig['charset'];

    $pdo = new PDO($dns, $dbConfig['user'], $dbConfig['password']);
} catch (Exception $ex) {
    // TODO : générer une nouvelle notification d'erreur avant de rediriger vers la page d'accueil
    Utils::redirect('index.php');
}

if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    // TODO : générer une notification d'erreur sur le format de l'adresse email
    Utils::redirect('index.php');
}

$stmt = $pdo->prepare('INSERT INTO newsletter (email) VALUES (:email)');

$res = $stmt->execute([
    'email' => $_POST["email"]
]);

//TODO : générer notification selon réussite ou échec de la requete


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
Utils::redirect('index.php');
