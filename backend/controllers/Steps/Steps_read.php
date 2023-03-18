<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Inclure les fichiers requis

include_once '../../config/config.php';
include_once '../../models/Steps.php';

// Instancier la base de données et l'objet Step
$database = new Database();
$db = $database->getConnection();
$step = new Steps($db);

// Récupération de l'id du cours
$step->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

// Récupération des étapes d'un cours
$stmt = $step->readByCourseId();
$num = $stmt->rowCount();

// Vérification si des étapes ont été trouvées
if ($num > 0) {

    // Tableau des étapes
    $steps_arr = array();
    $steps_arr["steps"] = array();

    // Récupération des données
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $step_item = array(
            "step_id" => $Step_id,
            "step_name" => $Step_name,
            "step_longitude" => $Step_longitude,
            "step_latitude" => $Step_latitude,
            "course_id" => $Course_id
        );

        array_push($steps_arr["steps"], $step_item);
    }

    // Code de réponse - 200 OK
    http_response_code(200);

    // Afficher les données des étapes sous forme de JSON
    echo json_encode($steps_arr);
} else {
    // Code de réponse - 404 Not found
    http_response_code(404);

    // Message d'erreur
    echo json_encode(
        array("message" => "Aucune étape trouvée.")
    );
}
?>
