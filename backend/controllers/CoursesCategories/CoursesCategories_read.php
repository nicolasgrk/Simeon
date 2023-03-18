<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// inclusion des fichiers requis
include_once '../../config/config.php';
include_once '../../models/CoursesCategories.php';

try {
    // instanciation de la base de données et de l'objet CoursesCategories
    $database = new Database();
    $db = $database->getConnection();
    $cc = new CoursesCategories($db);

    // récupération de l'identifiant de la catégorie
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : die();

    // récupération des courses associées à la catégorie
    $result = $cc->readAllCoursesByCategoryId($category_id);

    // vérification si des courses ont été trouvées
    if(count($result) > 0) {
        // courses array
        $courses_arr = array();
        $courses_arr["courses"] = $result;

        // réponse HTTP 200 OK
        http_response_code(200);

        // affichage des données des courses sous forme de JSON
        echo json_encode($courses_arr);
    }
    else {
        // réponse HTTP 404 Not Found
        http_response_code(404);

        // message de réponse
        echo json_encode(
            array("message" => "Aucune course trouvée pour cette catégorie.")
        );
    }
} catch (PDOException $e) {
    // réponse HTTP 500 Internal Server Error
    http_response_code(500);

    // message de réponse
    echo json_encode(
        array("message" => "Erreur lors de la connexion à la base de données : " . $e->getMessage())
    );
}