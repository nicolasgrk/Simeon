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

// Récupération de l'identifiant de la catégorie à supprimer
$category->category_id = isset($_GET['id']) ? $_GET['id'] : die();

// Suppression de la catégorie
if ($category->delete()) {
    // Envoi d'une réponse 200 - OK
    http_response_code(200);

    // Envoi d'un message de confirmation
    echo json_encode(array("message" => "Category was deleted."));
} else {
    // Envoi d'une réponse 503 - Service Unavailable
    http_response_code(503);

    // Envoi d'un message d'erreur
    echo json_encode(array("message" => "Unable to delete category."));
}
