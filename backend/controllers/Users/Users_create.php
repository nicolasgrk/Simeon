<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Users.php';

/// Vérification de la méthode
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Instanciation de la base de données et de l'utilisateur
    $database = new Database();
    $db = $database->getConnection();
    $user = new Users($db);

    // Récupération des données envoyées
    $data = json_decode(file_get_contents("php://input"));

    // Vérification des données requises
    if(!empty($data->user_firstName) && !empty($data->user_lastName) && !empty($data->user_email) && !empty($data->user_password)) {

        // Association des données à l'utilisateur
        $user->user_firstName = $data->user_firstName;
        $user->user_lastName = $data->user_lastName;
        $user->user_email = $data->user_email;
        $user->user_password = password_hash($data->user_password, PASSWORD_DEFAULT);
        $user->user_creationDate = date('Y-m-d H:i:s');
        $user->user_bio = $data->user_bio ?? '';
        $user->user_icon = $data->user_icon ?? '';

        // Création de l'utilisateur
        if($user->create()) {

            // Réponse - 201 created
            http_response_code(201);

            // Affichage du message de succès
            echo json_encode(array("message" => "L'utilisateur a été créé avec succès."));
        }
        else {
            // Réponse - 503 service unavailable
            http_response_code(503);

            // Affichage du message d'erreur
            echo json_encode(array("message" => "Impossible de créer l'utilisateur."));
        }
    }
    else {
        // Réponse - 400 bad request
        http_response_code(400);

        // Affichage du message d'erreur
        echo json_encode(array("message" => "Impossible de créer l'utilisateur. Des données sont manquantes."));
    }
}
?>