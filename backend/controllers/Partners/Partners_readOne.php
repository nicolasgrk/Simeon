<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers de base de données et de classes
include_once '../../config/config.php';
include_once '../../models/Partners.php';

// Instanciation de la base de données et connexion
$database = new Database();
$db = $database->getConnection();

// Instanciation de la classe Partners
$partner = new Partners($db);

// Récupération de l'identifiant du partenaire à afficher
$partner->partner_id = isset($_GET['partner_id']) ? $_GET['partner_id'] : die();

// Récupération des informations du partenaire
$partner->readOne();

// Vérification de l'existence du partenaire
if ($partner->partner_name != null) {
    // Création d'un tableau associatif
    $partner_arr = array(
        "partner_id" => $partner->partner_id,
        "partner_name" => $partner->partner_name,
        "partner_description" => $partner->partner_description,
        "partner_date" => $partner->partner_date,
        "partner_longitude" => $partner->partner_longitude,
        "partner_latitude" => $partner->partner_latitude
    );

    // Envoi de la réponse 200 - OK
    http_response_code(200);

    // Envoi du résultat en format JSON
    echo json_encode($partner_arr);
} else {
    // Envoi de la réponse 404 - Not Found
    http_response_code(404);

    // Envoi d'un message d'erreur
    echo json_encode(array("message" => "Partner does not exist."));
}
