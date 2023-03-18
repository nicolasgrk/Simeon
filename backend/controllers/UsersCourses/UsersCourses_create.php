<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/UsersCourses.php';

// Vérification de la méthode
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Instanciation de la base de données et de la relation entre l'utilisateur et le cours
    $database = new Database();
    $db = $database->getConnection();
    $userscourses = new UsersCourses($db);

    // Récupération des données envoyées
    $data = json_decode(file_get_contents("php://input"));

    // Vérification des données requises
    if(!empty($data->course_id) && !empty($data->user_id)) {

        // Association des données à la relation entre l'utilisateur et le cours
        $userscourses->course_id = $data->course_id;
        $userscourses->user_id = $data->user_id;
        $userscourses->userscourses_date = date('Y-m-d H:i:s');

        // Création de la relation
        if($userscourses->create()) {

            // Réponse - 201 created
            http_response_code(201);

            // Affichage du message de succès
            echo json_encode(array("message" => "La relation a été créée avec succès."));
        }
        else {
            // Réponse - 503 service unavailable
            http_response_code(503);

            // Affichage du message d'erreur
            echo json_encode(array("message" => "Impossible de créer la relation."));
        }
    }
    else {
        // Réponse - 400 bad request
        http_response_code(400);

        // Affichage du message d'erreur
        echo json_encode(array("message" => "Impossible de créer la relation. Des données sont manquantes."));
    }
}
?>
