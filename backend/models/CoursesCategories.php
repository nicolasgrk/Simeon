<?php
class CoursesCategories {
    // Connexion à la base de données
    private $connexion;
    private $table_name = "CoursesCategories";

    // Propriétés de la table CoursesCategories
    public $course_id;
    public $category_id;

    // Constructeur avec connexion en paramètre
    public function __construct($db) {
        $this->connexion = $db;
    }

    // Ajout d'une relation course-category
    function create() {
        // Requête SQL pour ajouter une relation course-category
        $sql = "INSERT INTO " . $this->table_name . " SET Course_id = :course_id, Category_id = :category_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));

        // Association des valeurs
        $query->bindParam(":course_id", $this->course_id);
        $query->bindParam(":category_id", $this->category_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'une relation course-category en fonction de l'identifiant de la course
    function deleteByCourse() {
        // Requête SQL pour supprimer une relation course-category en fonction de l'identifiant de la course
        $sql = "DELETE FROM " . $this->table_name . " WHERE Course_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Association des valeurs
        $query->bindParam(1, $this->course_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
    // Récupération de toutes les courses pour une catégorie donnée
    function readAllCoursesByCategoryId($category_id) {
        // Requête SQL pour récupérer toutes les courses pour une catégorie donnée
        $sql = "SELECT c.Course_id, c.Course_name, c.Course_description, c.Course_distance, c.Course_note, c.Course_image, cat.Category_name
                FROM CoursesCategories cc
                INNER JOIN Courses c ON cc.Course_id = c.Course_id
                INNER JOIN Categories cat ON cc.Category_id = cat.Category_id
                WHERE cc.Category_id = :category_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $category_id = htmlspecialchars(strip_tags($category_id));

        // Association des valeurs
        $query->bindParam(":category_id", $category_id);

        // Exécution de la requête
        $query->execute();

        // Récupération des lignes
        $courses_arr = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            // Extraction de la ligne
            extract($row);

            $course_item = array(
                "course_id" => $Course_id,
                "course_name" => $Course_name,
                "course_description" => $Course_description,
                "course_distance" => $Course_distance,
                "course_note" => $Course_note,
                "course_image" => $Course_image,
                "category_name" => $Category_name
            );

            array_push($courses_arr, $course_item);
        }

        return $courses_arr;
    }

}
