<?php
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: POST");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // La bonne méthode est utilisée

}else{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

// On inclut les fichiers de configuration et d'accès aux données
include_once '../../config/config.php';
include_once '../../models/Courses.php';

// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

// On instancie la course
$course = new Courses($db);

// On récupère les données reçues
$donnees = json_decode(file_get_contents("php://input"));

// On vérifie qu'on a bien toutes les données
if(!empty($donnees->name) && !empty($donnees->description) && !empty($donnees->distance) && !empty($donnees->note)){

    // On hydrate notre objet
    $course->name = $donnees->name;
    $course->description = $donnees->description;
    $course->distance = $donnees->distance;
    $course->note = $donnees->note;

    // On crée la course
    if($course->create()){
        // Ici la création a fonctionné
        // On envoie un code 201
        http_response_code(201);
        echo json_encode(["message" => "La course a été ajoutée"]);
    }else{
        // Ici la création n'a pas fonctionné
        // On envoie un code 503
        http_response_code(503);
        echo json_encode(["message" => "La course n'a pas pu être ajoutée"]);
    }
}else{
    // Mauvaise requête
    http_response_code(400);
    echo json_encode(["message" => "Données incomplètes"]);
}
