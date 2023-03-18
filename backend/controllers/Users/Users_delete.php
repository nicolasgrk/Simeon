<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Vérification de la méthode de la requête
if($_SERVER['REQUEST_METHOD'] != 'DELETE'){
    http_response_code(405);
    echo json_encode(array('message' => 'Méthode non autorisée'));
    exit();
}

// Inclusion des fichiers requis
include_once '../../config/config.php';
include_once '../../models/Users.php';

// Instanciation de la base de données et connexion
$database = new Database();
$db = $database->getConnection();

// Instanciation de l'objet Utilisateurs
$user = new Users($db);

// Récupération des données d'entrée
$data = json_decode(file_get_contents("php://input"));

// Vérification de l'existence de l'ID utilisateur
if(!empty($data->id)){
    // Association de l'ID utilisateur à l'objet
    $user->user_id = $data->id;

    // Suppression de l'utilisateur
    if($user->delete()){
        http_response_code(200);
        echo json_encode(array('message' => 'Utilisateur supprimé avec succès'));
    } else {
        http_response_code(503);
        echo json_encode(array('message' => 'Impossible de supprimer l\'utilisateur'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('message' => 'ID utilisateur manquant'));
}
