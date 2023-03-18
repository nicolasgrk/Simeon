<?php

// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers de base de données et de classes
include_once '../../config/config.php';
include_once '../../models/Categories.php';

// Instanciation de la base de données et de l'objet Catégories
$database = new Database();
$db = $database->getConnection();
$category = new Categories($db);

// Vérifier si l'identifiant de catégorie est défini
if(isset($_GET['category_id'])) {
    // Obtenir l'identifiant de la catégorie
    $category->category_id = $_GET['category_id'];

    // Lecture d'une seule catégorie
    $category->readOne();

    // Vérifier si la catégorie existe
    if($category->category_name!=null){

        // Tableau de catégories
        $category_arr = array(
            "category_id" =>  $category->category_id,
            "category_name" => $category->category_name
        );

        // Définir la réponse - 200 OK
        http_response_code(200);

        // Afficher les catégories sous forme de json
        echo json_encode($category_arr);
    }

    else{
        // La catégorie n'existe pas - 404 Not found
        http_response_code(404);

        // Message d'erreur
        echo json_encode(
            array("message" => "Category does not exist.")
        );
    }
} else {
    // L'identifiant de catégorie n'est pas défini - 400 Bad Request
    http_response_code(400);

    // Message d'erreur
    echo json_encode(
        array("message" => "Category ID is not defined.")
    );
}
