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

// Vérification que l'identifiant du partenaire est bien présent
if (!empty($data->partner_id)) {
    // Association de l'identifiant du partenaire à supprimer
    $partner->partner_id = $data->partner_id;

    // Suppression du partenaire
    if ($partner->delete()) {
        // Envoi d'une réponse 200 - OK
        http_response_code(200);

        // Envoi d'un message de confirmation
        echo json_encode(array("message" => "Partner was deleted."));
    } else {
        // Envoi d'une réponse 503 - Service Unavailable
        http_response_code(503);

        // Envoi d'un message d'erreur
        echo json_encode(array("message" => "Unable to delete partner."));
    }
} else {
    // Envoi d'une réponse 400 - Bad Request
    http_response_code(400);

    // Envoi d'un message d'erreur
    echo json_encode(array("message" => "Unable to delete partner. Partner ID is missing."));
}
