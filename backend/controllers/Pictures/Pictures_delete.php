<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// inclusion des fichiers de configuration et des classes
include_once 'config/database.php';
include_once 'models/Pictures.php';

// création de l'objet Database et connexion à la base de données
$database = new Database();
$db = $database->getConnection();

// création de l'objet Pictures et envoi de la connexion à la base de données
$pictures = new Pictures($db);

// récupération de l'identifiant de la photo à supprimer
$data = json_decode(file_get_contents("php://input"));

// vérification que l'identifiant n'est pas vide
if(!empty($data->picture_id)) {
    // attribution de l'identifiant de la photo à supprimer dans l'objet Pictures
    $pictures->picture_id = $data->picture_id;

    // suppression de la photo
    if($pictures->delete()) {
        // envoi d'une réponse 200 - OK
        http_response_code(200);
        echo json_encode(array("message" => "La photo a été supprimée."));
    }
    else {
        // envoi d'une réponse 503 - Service Unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Impossible de supprimer la photo."));
    }
}
else {
    // envoi d'une réponse 400 - Bad Request
    http_response_code(400);
    echo json_encode(array("message" => "Impossible de supprimer la photo. Identifiant manquant."));
}
