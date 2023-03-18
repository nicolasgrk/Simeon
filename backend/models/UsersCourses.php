<?php
class UsersCourses {
    // Connexion à la base de données et nom de la table
    private $connexion;
    private $table_name = "UsersCourses";

    // Propriétés de l'objet
    public $course_id;
    public $user_id;
    public $userscourses_date;

    // Constructeur avec la connexion à la base de données en paramètre
    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Création d'une relation entre un utilisateur et un cours
    function create() {
        // Requête SQL pour créer une relation entre un utilisateur et un cours
        $sql = "INSERT INTO " . $this->table_name . " SET Course_id = :course_id, User_id = :user_id, UsersCourses_date = :userscourses_date";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->userscourses_date=htmlspecialchars(strip_tags($this->userscourses_date));

        // Association des valeurs
        $query->bindParam(":course_id", $this->course_id);
        $query->bindParam(":user_id", $this->user_id);
        $query->bindParam(":userscourses_date", $this->userscourses_date);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Récupération de la liste des utilisateurs inscrits à un cours
    function read() {
        // Requête SQL pour récupérer la liste des utilisateurs inscrits à un cours
        $sql = "SELECT * FROM " . $this->table_name . " WHERE Course_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Association des valeurs
        $query->bindParam(1, $this->course_id);

        // Exécution de la requête
        $query->execute();

        // Retourne les résultats
        return $query;
    }

    // Suppression d'une relation entre un utilisateur et un cours
    function delete() {
        // Requête SQL pour supprimer une relation entre un utilisateur et un cours
        $sql = "DELETE FROM " . $this->table_name . " WHERE Course_id = ? AND User_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(1, $this->course_id);
        $query->bindParam(2, $this->user_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
}
