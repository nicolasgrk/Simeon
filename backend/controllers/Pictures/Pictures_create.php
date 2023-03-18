<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Inclure les fichiers requis

include_once '../../config/config.php';
include_once '../../models/Pictures.php';

// Instancier la base de données et l'objet Picture
$database = new Database();
$db = $database->getConnection();
$picture = new Pictures($db);

// Récupération des données soumises
$data = json_decode(file_get_contents("php://input"));

// Vérifier si les données sont valides
if (
    !empty($data->picture_name) &&
    !empty($data->picture_description) &&
    !empty($data->course_id)
) {
    // Affecter les valeurs de la photo
    $picture->picture_name = $data->picture_name;
    $picture->picture_description = $data->picture_description;
    $picture->course_id = $data->course_id;

    // Création de la photo
    if ($picture->create()) {
        // Code de réponse - 201 Created
        http_response_code(201);

        // Message de confirmation
        echo json_encode(array("message" => "La photo a été créée avec succès."));
    } else {
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de créer la photo."));
    }
} else {
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de créer la photo. Les données sont incomplètes."));
}
?>
