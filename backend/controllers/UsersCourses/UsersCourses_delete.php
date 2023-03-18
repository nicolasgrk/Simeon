<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/UsersCourses.php';

// Vérification de la méthode HTTP
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    // Instanciation de la base de données et de l'utilisateur
    $database = new Database();
    $db = $database->getConnection();
    $usersCourses = new UsersCourses($db);

    // Récupération des données envoyées
    $data = json_decode(file_get_contents("php://input"));

    // Vérification des données requises
    if (!empty($data->course_id) && !empty($data->user_id)) {

        // Association des données à l'utilisateur
        $usersCourses->course_id = $data->course_id;
        $usersCourses->user_id = $data->user_id;

        // Suppression de la relation entre l'utilisateur et le cours
        if ($usersCourses->delete()) {

            // Réponse - 200 OK
            http_response_code(200);

            // Affichage du message de succès
            echo json_encode(array("message" => "La relation a été supprimée avec succès."));

        } else {
            // Réponse - 503 Service Unavailable
            http_response_code(503);

            // Affichage du message d'erreur
            echo json_encode(array("message" => "Impossible de supprimer la relation."));
        }

    } else {
        // Réponse - 400 Bad Request
        http_response_code(400);

        // Affichage du message d'erreur
        echo json_encode(array("message" => "Impossible de supprimer la relation. Des données sont manquantes."));
    }
}
?>
