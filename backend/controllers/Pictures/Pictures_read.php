<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// On vérifie que la méthode utilisée est GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../../config/config.php';
    include_once '../../models/Pictures.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les photos
    $pictures = new Pictures($db);

    // On récupère l'id du cours demandé
    $pictures->course_id = isset($_GET['course_id']) ? $_GET['course_id'] : die();

    // On récupère les photos associées à ce cours
    $resultat = $pictures->readAll();

    // On vérifie si des photos ont été trouvées
    if ($resultat->rowCount() > 0) {

        // On initialise un tableau pour stocker les photos
        $tableauPhotos = array();
        $tableauPhotos['photos'] = array();

        // On parcourt les photos
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            // On crée une entrée dans le tableau pour chaque photo
            $photo = array(
                "id" => $Picture_id,
                "name" => $Picture_name,
                "description" => $Picture_description,
                "course_id" => $Course_id
            );

            // On ajoute la photo au tableau
            array_push($tableauPhotos['photos'], $photo);
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode le tableau en JSON et on l'affiche
        echo json_encode($tableauPhotos);
    } else {
        // On envoie le code réponse 404 Not Found
        http_response_code(404);

        // On affiche un message d'erreur
        echo json_encode(array("message" => "Aucune photo trouvée."));
    }
} else {
    // On gère l'erreur avec le code 405 Method Not Allowed
    http_response_code(405);

    // On affiche un message d'erreur
    echo json_encode(array("message" => "Méthode non autorisée."));
}
?>
