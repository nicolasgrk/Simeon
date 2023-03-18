<?php
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
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

 // On instancie les courses
 $course = new Courses($db);

// On récupère les données reçues
$id = $_GET['id'];
// On vérifie qu'on a bien un id

    // On hydrate l'objet avec l'id
    $course->id = $id;
    // On récupère le produit
    $course->readOne();

    // On vérifie si le produit existe
    if($course->name != null){
        // On crée un tableau contenant le produit
        $prod = [
            "Course_name" => $course->name,
            "Course_description" => $course->description,
            "Course_distance" => $course->distance,
            "Course_note" => $course->note
        ];
        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($prod);
    }else{
        // 404 Not found
        http_response_code(404);
        echo json_encode(array("message" => "Le produit n'existe pas."));
    }


