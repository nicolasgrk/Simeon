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

// Lecture de toutes les catégories
$stmt = $category->read();
$num = $stmt->rowCount();

// Vérifier si des entrées ont été trouvées
if($num>0){

    // Catégories tableau
    $categories_arr=array();
    $categories_arr["categories"]=array();

    // Récupérer le contenu de la table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $category_item=array(
            "category_id" => $Category_id,
            "category_name" => $Category_name
        );

        array_push($categories_arr["categories"], $category_item);
    }

    // Définir la réponse - 200 OK
    http_response_code(200);

    // Afficher les catégories sous forme de json
    echo json_encode($categories_arr);
}

else{
    // Pas de catégories trouvées - 404 Not found
    http_response_code(404);

    // Message d'erreur
    echo json_encode(
        array("message" => "No categories found.")
    );
}
