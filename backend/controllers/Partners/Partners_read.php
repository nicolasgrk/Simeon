<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers de base de données et de classes
include_once '../../config/config.php';
include_once '../../models/Partners.php';

// Instanciation de la base de données et connexion
$database = new Database();
$db = $database->getConnection();

// Instanciation de la classe Partners
$partner = new Partners($db);

// Récupération de la liste des partenaires
$stmt = $partner->read();
$count = $stmt->rowCount();

// Vérification que des partenaires ont été trouvés
if ($count > 0) {
    // Tableau des partenaires
    $partners_arr = array();
    $partners_arr["partners"] = array();

    // Récupération de chaque ligne de résultat
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Extraction des valeurs
        extract($row);

        // Tableau associatif représentant un partenaire
        $partner_item = array(
            "partner_id" => $Partner_id,
            "partner_name" => $Partner_name,
            "partner_description" => $Partner_description,
            "partner_date" => $Partner_date,
            "partner_longitude" => $Partner_longitude,
            "partner_latitude" => $Partner_latitude
        );

        // Ajout du partenaire au tableau des partenaires
        array_push($partners_arr["partners"], $partner_item);
    }

    // Envoi de la réponse 200 - OK
    http_response_code(200);

    // Envoi des partenaires sous forme de JSON
    echo json_encode($partners_arr);
} else {
    // Envoi de la réponse 404 - Not Found
    http_response_code(404);

    // Envoi du message d'erreur
    echo json_encode(
        array("message" => "No partners found.")
    );
}
