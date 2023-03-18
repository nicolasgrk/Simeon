<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Vérifie que la méthode de requête HTTP est GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Vérifie si l'identifiant de la photo est passé en paramètre d'URL
    if (isset($_GET['id'])) {

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../../config/config.php';
    include_once '../../models/Pictures.php';


        // Instancie la base de données et se connecte
        $database = new Database();
        $db = $database->getConnection();

        // Instancie l'objet Photo
        $picture = new Pictures($db);

        // Récupère l'identifiant de la photo à lire depuis les paramètres d'URL
        $picture->picture_id = htmlspecialchars(strip_tags($_GET['id']));

        // Lit la photo depuis la base de données
        $picture->readOne();

        // Vérifie si la photo existe
        if ($picture->picture_name != null) {

            // Crée un tableau associatif avec les données de la photo
            $picture_arr = array(
                "id" => $picture->picture_id,
                "name" => $picture->picture_name,
                "description" => $picture->picture_description,
                "course_id" => $picture->course_id
            );

            // Définit le code de réponse HTTP à 200 OK
            http_response_code(200);

            // Renvoie les données de la photo au format JSON
            echo json_encode($picture_arr);
        } else {
            // Définit le code de réponse HTTP à 404 Not Found
            http_response_code(404);

            // Renvoie un message d'erreur au format JSON
            echo json_encode(array("message" => "La photo n'existe pas."));
        }
    } else {
        // Définit le code de réponse HTTP à 400 Bad Request
        http_response_code(400);

        // Renvoie un message d'erreur au format JSON
        echo json_encode(array("message" => "L'identifiant de la photo est manquant."));
    }
} else {
    // Définit le code de réponse HTTP à 405 Method Not Allowed
    http_response_code(405);

    // Renvoie un message d'erreur au format JSON
    echo json_encode(array("message" => "La méthode de requête HTTP n'est pas autorisée."));
}
