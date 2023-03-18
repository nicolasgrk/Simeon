<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Reviews.php';

// Instancier la base de données et l'objet Review
$database = new Database();
$db = $database->getConnection();
$review = new Reviews($db);

// Récupération des données soumises
$data = json_decode(file_get_contents("php://input"));

// Vérifier si les données sont valides
if (
    !empty($data->review_date) &&
    !empty($data->review_message) &&
    !empty($data->course_id)
) {
    // Affecter les valeurs de la critique
    $review->review_date = $data->review_date;
    $review->review_message = $data->review_message;
    $review->course_id = $data->course_id;

    // Création de la critique
    if ($review->create()) {
        // Code de réponse - 201 Created
        http_response_code(201);

        // Message de confirmation
        echo json_encode(array("message" => "La critique a été créée avec succès."));
    } else {
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de créer la critique."));
    }
} else {
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de créer la critique. Les données sont incomplètes."));
}
?>
