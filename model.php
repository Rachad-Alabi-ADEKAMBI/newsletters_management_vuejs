<?php

/*voici le fichier de traitement du formulaire,
le formulaire doit etre traite depuis le front end
en vuejs/php sans rechargement de la page,
c'est de ce traitement j'ai besoin*/

//on détermine l'action de la page
$error = array('error' => false);

$action = '';

if (isset($_GET['action'])) {

    $action = $_GET['action'];

}

//controle des input
function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars(
        $inputContent
    );

    $inputContent = trim($inputContent);

    return $inputContent;
}

//ici le code de connexion à la base de données
function dbConnect()
{

    try

    {

        $pdo = new PDO('mysql:host=localhost;

dbname=solidarity

charset=utf8',

            'root',

            '');

        return $pdo;

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }
}

//ici le code pour traiter la requete*/
if ($action == 'subscribeToNewsletters') {

    //  $pdo = dbConnect();

    $sql = $pdo->prepare("INSERT INTO newsletters_subscribers
      SET date_of_insertion = NOW(),
     first_name = ?, last_name = ?, country = ?, email = ?");

    $first_name = verifyInput($_POST['first_name']);
    $last_name = verifyInput($_POST['last_name']);
    $email = verifyInput($_POST['email']);
    $country = verifyInput($_POST['country']);

    return $first_name;

}