<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/UsersCourses.php';

// Vérification de la méthode
if($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Instanciation de la base de données et de l'utilisateur
    $database = new Database();
    $db = $database->getConnection();
    $userscourses = new UsersCourses($db);

    // Récupération de l'ID du cours
    $userscourses->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    // Récupération des utilisateurs inscrits au cours
    $result = $userscourses->read();

    // Vérification si des utilisateurs ont été trouvés
    if($result->rowCount() > 0) {

        // Tableau d'utilisateurs inscrits
        $userscourses_arr = array();
        $userscourses_arr['userscourses'] = array();

        // Parcours des résultats de la requête
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $userscourses_item = array(
                "user_id" => $User_id,
                "course_id" => $Course_id,
                "userscourses_date" => $UsersCourses_date
            );

            array_push($userscourses_arr['userscourses'], $userscourses_item);
        }

        // Réponse - 200 OK
        http_response_code(200);

        // Affichage des utilisateurs inscrits au cours au format JSON
        echo json_encode($userscourses_arr);
    }
    else {
        // Réponse - 404 not found
        http_response_code(404);

        // Affichage du message d'erreur
        echo json_encode(array("message" => "Aucun utilisateur inscrit au cours n'a été trouvé."));
    }
}
?>
