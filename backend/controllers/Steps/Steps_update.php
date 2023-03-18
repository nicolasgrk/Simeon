<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Steps.php';

// Instancier la base de données et l'objet Step
$database = new Database();
$db = $database->getConnection();
$step = new Steps($db);

// Récupération de l'identifiant de l'étape à mettre à jour
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'identifiant est présent
if (!empty($data->step_id)) {

    // Récupération des données de l'étape
    $step->step_id = $data->step_id;
    $step->step_name = $data->step_name;
    $step->step_longitude = $data->step_longitude;
    $step->step_latitude = $data->step_latitude;

    // Mettre à jour l'étape
    if ($step->update()) {
        // Code de réponse - 200 OK
        http_response_code(200);

        // Message de confirmation
        echo json_encode(array("message" => "L'étape a été mise à jour avec succès."));
    } else {
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de mettre à jour l'étape."));
    }
} else {
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de mettre à jour l'étape. L'identifiant de l'étape est manquant."));
}
