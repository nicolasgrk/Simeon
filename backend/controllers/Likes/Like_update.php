<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers de base de données et de classes
include_once '../../config/config.php';
include_once '../../models/Categories.php';

// Instanciation de la base de données et connexion
$database = new Database();
$db = $database->getConnection();

// Instanciation de la classe Categories
$category = new Categories($db);

// Récupération des données d'entrée
$data = json_decode(file_get_contents("php://input"));

// Vérification que les données requises sont bien présentes
if (!empty($data->category_id) && !empty($data->category_name)) {
    // Association des valeurs de la catégorie à mettre à jour
    $category->category_id = $data->category_id;
    $category->category_name = $data->category_name;

    // Mise à jour de la catégorie
    if ($category->update()) {
        // Envoi d'une réponse 200 - OK
        http_response_code(200);

        // Envoi d'un message de confirmation
        echo json_encode(array("message" => "Category was updated."));
    } else {
        // Envoi d'une réponse 503 - Service Unavailable
        http_response_code(503);

        // Envoi d'un message d'erreur
        echo json_encode(array("message" => "Unable to update category."));
    }
} else {
    // Envoi d'une réponse 400 - Bad Request
    http_response_code(400);

    // Envoi d'un message d'erreur
    echo json_encode(array("message" => "Unable to update category. Data is incomplete."));
}
