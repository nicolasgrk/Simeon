<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On inclut les fichiers de configuration et d'accès aux données
include_once '../../config/config.php';
include_once '../../models/Courses.php';

// On instancie la base de données
$database = new Database();
$db = $database->getConnection();

// On instancie les courses
$course = new Courses($db);

// On récupère l'identifiant de la course à modifier
$id = $_GET['id'];

// On vérifie que l'id de la course à modifier est bien présent
if(isset($id)) {

    // On hydrate l'objet course avec l'id de la course à modifier
    $course->id = $id;

    // On récupère la course à modifier
    $course->readOne();

    // On vérifie si la course existe
    if($course->name != null){

        // On récupère les nouvelles données de la course
        $donnees = json_decode(file_get_contents("php://input"));

        // On hydrate l'objet course avec les nouvelles données
        $course->name = !empty($donnees->name) ? $donnees->name : $course->name;
        $course->description = !empty($donnees->description) ? $donnees->description : $course->description;
        $course->distance = !empty($donnees->distance) ? $donnees->distance : $course->distance;
        $course->note = !empty($donnees->note) ? $donnees->note : $course->note;

        // On met à jour la course
        if($course->update()){
            // On envoie une réponse 200 OK
            http_response_code(200);
            echo json_encode(array("message" => "La course a été mise à jour."));
        }
        else{
            // On envoie une réponse 503 Service Unavailable si la mise à jour n'a pas fonctionné
            http_response_code(503);
            echo json_encode(array("message" => "La mise à jour de la course a échoué."));
        }
    }
    else{
        // On envoie une réponse 404 Not Found si la course n'existe pas
        http_response_code(404);
        echo json_encode(array("message" => "La course n'existe pas."));
    }
}
else {
    // On envoie une réponse 400 Bad Request si l'identifiant de la course n'a pas été fourni
    http_response_code(400);
    echo json_encode(array("message" => "L'identifiant de la course à modifier est manquant."));
}
