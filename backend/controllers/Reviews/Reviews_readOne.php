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

// Récupération de l'identifiant de la critique à lire
$review->review_id = isset($_GET['id']) ? $_GET['id'] : die();

// Lecture de la critique
$review->readOne();

// Vérification de l'existence de la critique
if ($review->review_id != null) {
    // Création d'un tableau associatif
    $review_arr = array(
        "review_id" => $review->review_id,
        "review_date" => $review->review_date,
        "review_message" => $review->review_message,
        "course_id" => $review->course_id
    );

    // Code de réponse - 200 OK
    http_response_code(200);

    // Affichage de la critique au format JSON
    echo json_encode($review_arr);
} else {
    // Code de réponse - 404 Not found
    http_response_code(404);

    // Message d'erreur
    echo json_encode(array("message" => "La critique n'existe pas."));
}
?>
