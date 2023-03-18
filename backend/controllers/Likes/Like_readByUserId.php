<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// inclusion des fichiers requis
include_once '../../config/config.php';
include_once '../../models/Likes.php';


try {
    // instanciation de la base de données et de l'objet like
    $database = new Database();
    $db = $database->getConnection();
    $like = new Likes($db);



    // récupération de l'identifiant de l'utilisateur
    $like->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

    // récupération des likes associés à l'utilisateur
    $result = $like->readByUserId();

    // vérification si des likes ont été trouvés
    if($result->rowCount() > 0) {
        // likes array
        $likes_arr=array();
        $likes_arr["likes"]=array();

        // récupération des lignes
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            // extraction de la ligne
            extract($row);

            $like_item=array(
                "like_id" => $Like_id,
                "like_date" => $Like_date,
                "course_id" => $Course_id,
                "course_name" => $Course_name,
                "course_distance" => $Course_distance,
                "course_image" => $Course_image

            );

            array_push($likes_arr["likes"], $like_item);
        }

        // réponse HTTP 200 OK
        http_response_code(200);

        // affichage des données des likes sous forme de JSON
        echo json_encode($likes_arr);
    }
    else {
        // réponse HTTP 404 Not Found
        http_response_code(404);

        // message de réponse
        echo json_encode(
            array("message" => "Aucun like trouvé.")
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





