<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Autres en-têtes requis pour le format de réponse JSON
header("Content-Type: application/json; charset=UTF-8");
// On vérifie que la méthode utilisée est GET
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
    exit();
}

// On inclut les fichiers de configuration et d'accès aux données
include_once '../../config/config.php';
include_once '../../models/Users.php';

// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

// On instancie un utilisateur
$user = new Users($db);

// On récupère l'id de l'utilisateur à lire dans l'URL
$user->user_id = isset($_GET['id']) ? $_GET['id'] : die();

// On lit l'utilisateur
$user->readOne();

// On vérifie si l'utilisateur existe
if ($user->user_firstName != null) {
    // On crée un tableau associatif
    $user_arr = array(
        "user_id" => $user->user_id,
        "user_firstName" => $user->user_firstName,
        "user_lastName" => $user->user_lastName,
        "user_email" => $user->user_email,
        "user_password" => $user->user_password,
        "user_creationDate" => $user->user_creationDate,
        "user_bio" => $user->user_bio,
        "user_icon" => $user->user_icon
    );

    // On envoie le code réponse 200 OK
    http_response_code(200);

    // On encode en JSON et on envoie
    echo json_encode($user_arr);
} else {
    // On envoie le code réponse 404 Not Found
    http_response_code(404);

    // On crée un tableau associatif d'erreur
    $error_arr = array(
        "message" => "L'utilisateur n'existe pas."
    );

    // On encode en JSON et on envoie
    echo json_encode($error_arr);
}
