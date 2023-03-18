<?php
// En-tête requis
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Inclure les fichiers requis
include_once '../../config/config.php';
include_once '../../models/Steps.php';

// Instancier la base de données et l'objet Step
$database = new Database();
$db = $database->getConnection();

// Récupération de l'id de l'étape à lire
// Vérifier si l'id du cours a été fourni
if(isset($_GET['course_id'])){
    // Instancier le modèle Steps
    $steps = new Steps($db);

    // Récupérer l'id du cours à partir de la requête GET
    $steps->course_id = $_GET['course_id'];

    // Récupérer toutes les étapes du cours
    $result = $steps->readByCourseId();

    // Vérifier s'il y a des résultats
    $num = $result->rowCount();

    if($num > 0){
        // Tableau des étapes
        $steps_arr = array();
        $steps_arr['data'] = array();

        // Parcourir les résultats
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            // Créer un tableau pour chaque étape
            $step_item = array(
                'id' => $Step_id,
                'name' => $Step_name,
                'longitude' => $Step_longitude,
                'latitude' => $Step_latitude,
                'course_id' => $Course_id
            );

            // Ajouter l'étape au tableau des étapes
            array_push($steps_arr['data'], $step_item);
        }

        // Envoyer une réponse JSON contenant les étapes
        echo json_encode($steps_arr);
    }
    else {
        // Aucune étape trouvée
        echo json_encode(
            array('message' => 'Aucune étape trouvée.')
        );
    }
}
else {
    // L'id du cours n'a pas été fourni
    echo json_encode(
        array('message' => 'L\'id du cours doit être fourni.')
    );
}
