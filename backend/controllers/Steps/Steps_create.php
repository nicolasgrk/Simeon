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

// Récupération des données soumises
$data = json_decode(file_get_contents("php://input"));

// Vérifier si les données sont valides
if (
    !empty($data->step_name) &&
    !empty($data->step_longitude) &&
    !empty($data->step_latitude) &&
    !empty($data->course_id)
) {
    // Affecter les valeurs de l'étape
    $step->step_name = $data->step_name;
    $step->step_longitude = $data->step_longitude;
    $step->step_latitude = $data->step_latitude;
    $step->course_id = $data->course_id;

    // Création de l'étape
    if ($step->create()) {
        // Code de réponse - 201 Created
        http_response_code(201);

        // Message de confirmation
        echo json_encode(array("message" => "L'étape a été créée avec succès."));
    } else {
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de créer l'étape."));
    }
} else {
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de créer l'étape. Les données sont incomplètes."));
}
?>
