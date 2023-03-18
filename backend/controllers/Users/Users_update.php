<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclusion de la base de données et des classes
include_once '../../config/config.php';
include_once '../../models/Users.php';
// Instanciation de la base de données et connexion
$database = new Database();
$db = $database->getConnection();

/// Vérification de la méthode HTTP utilisée
if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Récupération des données envoyées
    $data = json_decode(file_get_contents("php://input"));

    // Vérification que toutes les données nécessaires sont présentes
    if(
        !empty($data->user_id) &&
        !empty($data->user_firstName) &&
        !empty($data->user_lastName) &&
        !empty($data->user_email) &&
        !empty($data->user_password) &&
        !empty($data->user_creationDate) &&
        !empty($data->user_bio) &&
        !empty($data->user_icon)
    ){
        // Instanciation de la classe Users
        $user = new Users($db);

        // Association des valeurs
        $user->user_id = $data->user_id;
        $user->user_firstName = $data->user_firstName;
        $user->user_lastName = $data->user_lastName;
        $user->user_email = $data->user_email;
        $user->user_password = $data->user_password;
        $user->user_creationDate = $data->user_creationDate;
        $user->user_bio = $data->user_bio;
        $user->user_icon = $data->user_icon;

        // Mise à jour de l'utilisateur
        if($user->update()) {
            // Code de réponse - 200 OK
            http_response_code(200);

            // Message à afficher à l'utilisateur
            echo json_encode(array("message" => "L'utilisateur a été mis à jour."));
        } else {
            // Code de réponse - 503 Service Unavailable
            http_response_code(503);

            // Message à afficher à l'utilisateur
            echo json_encode(array("message" => "Impossible de mettre à jour l'utilisateur."));
        }
    } else {
        // Code de réponse - 400 Bad Request
        http_response_code(400);

        // Message à afficher à l'utilisateur
        echo json_encode(array("message" => "Impossible de mettre à jour l'utilisateur. Les données sont incomplètes."));
    }
} else {
    // Code de réponse - 405 Method Not Allowed
    http_response_code(405);

    // Message à afficher à l'utilisateur
    echo json_encode(array("message" => "La méthode utilisée n'est pas autorisée."));
}