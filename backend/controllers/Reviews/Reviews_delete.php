<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Reviews.php';

// Instancier la base de données et l'objet Reviews
$database = new Database();
$db = $database->getConnection();
$review = new Reviews($db);

// Récupération de l'id de la critique à supprimer
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'id est valide
if (!empty($data->id)) {
    // Affecter l'id de la critique à supprimer
    $review->review_id = $data->id;

    // Suppression de la critique
    if ($review->delete()) {
        // Code de réponse - 200 OK
        http_response_code(200);

        // Message de confirmation
        echo json_encode(array("message" => "La critique a été supprimée avec succès."));
    } else {
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de supprimer la critique."));
    }
} else {
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de supprimer la critique. L'ID est manquant."));
}
?>
