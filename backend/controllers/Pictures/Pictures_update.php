<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// inclure les fichiers de configuration et d'objet de modèle
include_once '../config/database.php';
include_once '../models/pictures.php';

// instancier la base de données et l'objet de modèle
$database = new Database();
$db = $database->getConnection();
$picture = new Pictures($db);

// récupérer l'identifiant de la photo à mettre à jour à partir de la requête HTTP
$picture->picture_id = isset($_GET['id']) ? $_GET['id'] : die();

// lire les détails de la photo à partir de la base de données
$picture->readOne();

// vérifier si la photo existe avant de mettre à jour
if ($picture->picture_name != null) {
    // récupérer les données d'entrée de la requête HTTP
    $data = json_decode(file_get_contents("php://input"));

    // vérifier si les données d'entrée ne sont pas vides
    if (
        !empty($data->picture_name) &&
        !empty($data->picture_description) &&
        !empty($data->course_id)
    ) {
        // mettre à jour les propriétés de l'objet de modèle
        $picture->picture_name = $data->picture_name;
        $picture->picture_description = $data->picture_description;
        $picture->course_id = $data->course_id;

        // mettre à jour la photo dans la base de données
        if ($picture->update()) {
            // réponse HTTP 200 - OK
            http_response_code(200);

            // message de réussite
            echo json_encode(array("message" => "La photo a été mise à jour."));
        } else {
            // réponse HTTP 503 - Service indisponible
            http_response_code(503);

            // message d'erreur
            echo json_encode(array("message" => "Impossible de mettre à jour la photo."));
        }
    } else {
        // réponse HTTP 400 - Mauvaise demande
        http_response_code(400);

        // message d'erreur
        echo json_encode(array("message" => "Impossible de mettre à jour la photo. Données incomplètes."));
    }
} else {
    // réponse HTTP 404 - Non trouvé
    http_response_code(404);

    // message d'erreur
    echo json_encode(array("message" => "La photo n'existe pas."));
}
