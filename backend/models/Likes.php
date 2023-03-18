<?php
class Likes {
    // Connexion à la base de données
    private $connexion;
    private $table_name = "Likes";

    // Propriétés de la table Likes
    public $like_id;
    public $like_date;
    public $course_id;
    public $user_id;

    // Constructeur avec connexion en paramètre
    public function __construct($db) {
        $this->connexion = $db;
    }

    // Ajout d'un like
    function create() {
        // Requête SQL pour ajouter un like
        $sql = "INSERT INTO " . $this->table_name . " SET Like_date = :like_date, Course_id = :course_id, User_id = :user_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->like_date=htmlspecialchars(strip_tags($this->like_date));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(":like_date", $this->like_date);
        $query->bindParam(":course_id", $this->course_id);
        $query->bindParam(":user_id", $this->user_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'un like en fonction de l'identifiant du like
    function delete() {
        // Requête SQL pour supprimer un like en fonction de son identifiant
        $sql = "DELETE FROM " . $this->table_name . " WHERE Like_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->like_id=htmlspecialchars(strip_tags($this->like_id));

        // Association des valeurs
        $query->bindParam(1, $this->like_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Récupération de tous les likes
    function read() {
        // Requête SQL pour récupérer tous les likes
        $sql = "SELECT * FROM " . $this->table_name;

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Exécution de la requête
        $query->execute();

        return $query;
    }

    // Récupération d'un like en fonction de son identifiant
    function readOne() {
        // Requête SQL pour récupérer un like en fonction de son identifiant
        $sql = "SELECT * FROM " . $this->table_name . " WHERE Like_id = ? LIMIT 0,1";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->like_id=htmlspecialchars(strip_tags($this->like_id));

        // Association des valeurs
        $query->bindParam(1, $this->like_id);

        // Exécution de la requête
        $query->execute();

        return $query;
    }
    // Récupération de tous les likes associés à un utilisateur en fonction de son identifiant
    function readByUserId() {
        // Requête SQL pour récupérer tous les likes associés à un utilisateur en fonction de son identifiant
        $sql = " SELECT * FROM " . $this->table_name . " inner join Courses on Courses.Course_id = Likes.Course_id WHERE User_id = ?";
    
        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(1, $this->user_id);

        // Exécution de la requête
        $query->execute();

        return $query;
    }
}
