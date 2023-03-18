<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Steps.php';

// Instancier la base de données et l'objet Step
$database = new Database();
$db = $database->getConnection();
$step = new Steps($db);

// Obtenir l'id de l'étape à supprimer
$data = json_decode(file_get_contents("php://input"));

// Vérifier si l'id est présent
if(!empty($data->id)){

    // Affecter l'id de l'étape à supprimer
    $step->step_id = $data->id;

    // Supprimer l'étape
    if($step->delete()){
        // Code de réponse - 200 OK
        http_response_code(200);

        // Message de confirmation
        echo json_encode(array("message" => "L'étape a été supprimée."));
    }
    else{
        // Code de réponse - 503 Service Unavailable
        http_response_code(503);

        // Message d'erreur
        echo json_encode(array("message" => "Impossible de supprimer l'étape."));
    }
}
else{
    // Code de réponse - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(array("message" => "Impossible de supprimer l'étape. L'id est manquant."));
}
?>
