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

// Récupération de l'id de l'étape à lire
$step->step_id = isset($_GET['id']) ? $_GET['id'] : die();

// Lire l'étape
$step->readOne();

// Si l'étape existe
if ($step->step_name != null) {
    // Créer un tableau associatif pour la réponse
    $step_arr = array(
        "step_id" => $step->step_id,
        "step_name" => $step->step_name,
        "step_longitude" => $step->step_longitude,
        "step_latitude" => $step->step_latitude,
        "course_id" => $step->course_id
    );

    // Code de réponse - 200 OK
    http_response_code(200);

    // Renvoyer les données de l'étape en format JSON
    echo json_encode($step_arr);
} else {
    // Code de réponse - 404 Not found
    http_response_code(404);

    // Message d'erreur
    echo json_encode(array("message" => "L'étape n'existe pas."));
}
?>
