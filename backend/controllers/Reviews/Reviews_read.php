<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Reviews.php';

// Instancier la base de données et l'objet Review
$database = new Database();
$db = $database->getConnection();
$review = new Reviews($db);

// Récupération de l'ID du cours à partir de la requête URL
$review->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

// Lecture des critiques associées au cours
$stmt = $review->readByCourseId();
$count = $stmt->rowCount();

// Vérification si des critiques ont été trouvées
if($count > 0){
    // Tableau de critiques
    $reviews_arr = array();
    $reviews_arr["reviews"] = array();

    // Récupération des lignes de la table Reviews
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // Extraction des clés de $row pour les utiliser comme variables
        extract($row);

        // Construction de chaque critique
        $review_item = array(
            "review_id" => $Review_id,
            "review_date" => $Review_date,
            "review_message" => $Review_Message,
            "course_id" => $Course_id
        );

        // Ajout de chaque critique au tableau des critiques
        array_push($reviews_arr["reviews"], $review_item);
    }

    // Code de réponse - 200 OK
    http_response_code(200);

    // Encodage du tableau en JSON
    echo json_encode($reviews_arr);
} else {
    // Code de réponse - 404 Not found
    http_response_code(404);

    // Message pour l'utilisateur
    echo json_encode(
        array("message" => "Aucune critique trouvée.")
    );
}
?>
