<?php
class Pictures {
    // Connexion à la base de données et nom de la table
    private $connexion;
    private $table_name = "Pictures";

    // Propriétés de l'objet Picture
    public $picture_id;
    public $picture_name;
    public $picture_description;
    public $course_id;

    // Constructeur avec $db pour la connexion à la base de données
    public function __construct($db) {
        $this->connexion = $db;
    }

    // Création d'une nouvelle photo
    function create() {
        // Requête SQL pour insérer une nouvelle photo dans la table
        $sql = "INSERT INTO " . $this->table_name . " SET Picture_name=:name, Picture_description=:description, Course_id=:course_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->picture_name=htmlspecialchars(strip_tags($this->picture_name));
        $this->picture_description=htmlspecialchars(strip_tags($this->picture_description));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Association des valeurs
        $query->bindParam(":name", $this->picture_name);
        $query->bindParam(":description", $this->picture_description);
        $query->bindParam(":course_id", $this->course_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Lecture de toutes les photos associées à un cours
    function readAll() {
        // Requête SQL pour lire toutes les photos associées à un cours
        $sql = "SELECT * FROM " . $this->table_name . " WHERE Course_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Association des valeurs
        $query->bindParam(1, $this->course_id);

        // Exécution de la requête
        $query->execute();

        return $query;
    }

    // Lecture d'une photo en particulier en fonction de son identifiant
    function readOne() {
        // Requête SQL pour lire une photo en particulier
        $sql = "SELECT * FROM " . $this->table_name . " WHERE Picture_id = ? LIMIT 0,1";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->picture_id=htmlspecialchars(strip_tags($this->picture_id));

        // Association des valeurs
        $query->bindParam(1, $this->picture_id);

        // Exécution de la requête
        $query->execute();

        // Récupération de la ligne de résultat
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Attribution des propriétés de la photo
        $this->picture_id = $row['Picture_id'];
        $this->picture_name = $row['Picture_name'];
        $this->picture_description = $row['Picture_description'];
        $this->course_id = $row['Course_id'];
    }
    // Mise à jour d'une photo en fonction de son identifiant
    function update() {
        // Requête SQL pour mettre à jour une photo
        $sql = "UPDATE " . $this->table_name . " SET Picture_name = :name, Picture_description = :description, Course_id = :course_id WHERE Picture_id = :picture_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->picture_name=htmlspecialchars(strip_tags($this->picture_name));
        $this->picture_description=htmlspecialchars(strip_tags($this->picture_description));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->picture_id=htmlspecialchars(strip_tags($this->picture_id));

        // Association des valeurs
        $query->bindParam(":name", $this->picture_name);
        $query->bindParam(":description", $this->picture_description);
        $query->bindParam(":course_id", $this->course_id);
        $query->bindParam(":picture_id", $this->picture_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'une photo en fonction de son identifiant
    function delete() {
        // Requête SQL pour supprimer une photo
        $sql = "DELETE FROM " . $this->table_name . " WHERE Picture_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->picture_id=htmlspecialchars(strip_tags($this->picture_id));

        // Association des valeurs
        $query->bindParam(1, $this->picture_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
}
