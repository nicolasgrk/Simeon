<?php
// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // La bonne méthode est utilisée

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../../config/config.php';
    include_once '../../models/Courses.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les courses
    $course = new Courses($db);

    // On récupère les données
    $stmt = $course->read();

    // On vérifie si on a au moins 1 course
    if($stmt->rowCount() > 0){
        // On initialise un tableau associatif
        $tableauCourses = [];
        $tableauCourses['courses'] = [];

        // On parcourt les courses
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $prod = [
                "Course_id" => $Course_id,
                "Course_name" => $Course_name,
                "Course_description" => $Course_description,
                "Course_distance" => $Course_distance,
                "Course_note" => $Course_note,
                "Course_image" => $Course_image

            ];

            $tableauCourses['courses'][] = $prod;
        }
        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauCourses);
    }
    else{
        // Pas de produit
        // On envoie le code réponse 404 Not found
        http_response_code(404);

        // On informe l'utilisateur
        echo json_encode(["message" => "Aucune course trouvée"]);
    }
}
else{
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
