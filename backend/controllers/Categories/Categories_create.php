<?php
// Headers requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../../config/config.php';
    include_once '../../models/Categories.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie une nouvelle catégorie
    $categorie = new Categories($db);

    // On récupère les données envoyées
    $donnees = json_decode(file_get_contents("php://input"));

    // On vérifie que les champs requis sont présents
    if(!empty($donnees->name)){

        // On hydrate notre objet
        $categorie->category_name = $donnees->name;

        // On crée la catégorie
        if($categorie->create()){
            // Ici la création a fonctionné
            // On envoie un code 201
            http_response_code(201);
            echo json_encode(["message" => "La catégorie a été créée."]);
        } else {
            // Ici la création n'a pas fonctionné
            // On envoie un code 503
            http_response_code(503);
            echo json_encode(["message" => "La création de la catégorie a échoué."]);
        }
    } else {
        // On gère l'erreur si des champs sont manquants
        // On envoie un code 400
        http_response_code(400);
        echo json_encode(["message" => "Impossible de créer la catégorie. Les données sont incomplètes."]);
    }
} else {
    // On gère l'erreur si la méthode HTTP utilisée n'est pas POST
    // On envoie un code 405
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}
