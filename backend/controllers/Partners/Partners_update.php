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

// Récupération des données d'entrée
$data = json_decode(file_get_contents("php://input"));

// Vérification que les données requises sont bien présentes
if (!empty($data->partner_id) && !empty($data->partner_name) && !empty($data->partner_description) && !empty($data->partner_date) && !empty($data->partner_longitude) && !empty($data->partner_latitude)) {
    // Association des valeurs du partenaire à mettre à jour
    $partner->partner_id = $data->partner_id;
    $partner->partner_name = $data->partner_name;
    $partner->partner_description = $data->partner_description;
    $partner->partner_date = $data->partner_date;
    $partner->partner_longitude = $data->partner_longitude;
    $partner->partner_latitude = $data->partner_latitude;

    // Mise à jour du partenaire
    if ($partner->update()) {
        // Envoi d'une réponse 200 - OK
        http_response_code(200);

        // Envoi d'un message de confirmation
        echo json_encode(array("message" => "Partner was updated."));
    } else {
        // Envoi d'une réponse 503 - Service Unavailable
        http_response_code(503);

        // Envoi d'un message d'erreur
        echo json_encode(array("message" => "Unable to update partner."));
    }
} else {
    // Envoi d'une réponse 400 - Bad Request
    http_response_code(400);

    // Envoi d'un message d'erreur
    echo json_encode(array("message" => "Unable to update partner. Data is incomplete."));
}
