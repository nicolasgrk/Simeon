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

// Instanciation de l'objet Users
$user = new Users($db);

// Lecture des utilisateurs
$stmt = $user->read();
$num = $stmt->rowCount();

// Vérification si des enregistrements ont été trouvés
if($num > 0){

    // Utilisateurs array
    $users_arr=array();
    $users_arr["users"]=array();

    // Récupération du contenu de notre tableau
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $user_item=array(
            "user_id" => $User_id,
            "user_firstName" => $User_firstName,
            "user_lastName" => $User_lastName,
            "user_email" => $User_email,
            "user_password" => $User_password,
            "user_creationDate" => $User_creationDate,
            "user_bio" => $User_bio,
            "user_icon" => $User_icon
        );

        array_push($users_arr["users"], $user_item);
    }

    // Envoi du code réponse - 200 OK
    http_response_code(200);

    // Affichage des données en format JSON
    echo json_encode($users_arr);
} else {
    // Envoi du code réponse - 404 Not found
    http_response_code(404);

    // Message d'erreur
    echo json_encode(
        array("message" => "Aucun utilisateur trouvé.")
    );
}
