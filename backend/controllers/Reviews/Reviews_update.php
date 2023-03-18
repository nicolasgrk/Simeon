<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Reviews.php';

// Instancier la base de données et l'objet Review
$database = new Database();
$db = $database->getConnection();
$review = new Reviews($db);

// Récupération de l'id de la critique à mettre à jour
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'id est présent
if (!empty($data->review_id)) {

    // Assigner les nouvelles valeurs de la critique
    $review->review_id = $data->review_id;
    $review->review_date = $data->review_date;
    $review->review_message = $data->review_message;
    $review->course_id = $data->course_id;

    // Mettre à jour la critique
    if ($review->update()) {

        // Code de réponse - 200 OK
        http_response_code(200);

        // Message de confirmation
        echo json_encode(array("message" => "La critique a été mise à jour avec succès."));
    } else {

        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de mettre à jour la critique."));
    }
} else {

    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de mettre à jour la critique. Les données sont incomplètes."));
}
?>
