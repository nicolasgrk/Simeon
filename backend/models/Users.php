<?php
class Users {
    // Connexion à la base de données
    private $connexion;
    private $table_name = "Users";

    // Propriétés de la table Users
    public $user_id;
    public $user_firstName;
    public $user_lastName;
    public $user_email;
    public $user_password;
    public $user_creationDate;
    public $user_bio;
    public $user_icon;

    // Constructeur avec connexion en paramètre
    public function __construct($db) {
        $this->connexion = $db;
    }

    // Création d'un utilisateur
    function create() {
        // Requête SQL pour ajouter un utilisateur
        $sql = "INSERT INTO " . $this->table_name . " SET User_firstName = :user_firstName, User_lastName = :user_lastName, User_email = :user_email, User_password = :user_password, User_creationDate = :user_creationDate, User_bio = :user_bio, User_icon = :user_icon";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->user_firstName=htmlspecialchars(strip_tags($this->user_firstName));
        $this->user_lastName=htmlspecialchars(strip_tags($this->user_lastName));
        $this->user_email=htmlspecialchars(strip_tags($this->user_email));
        $this->user_password=htmlspecialchars(strip_tags($this->user_password));
        $this->user_creationDate=htmlspecialchars(strip_tags($this->user_creationDate));
        $this->user_bio=htmlspecialchars(strip_tags($this->user_bio));
        $this->user_icon=htmlspecialchars(strip_tags($this->user_icon));

        // Association des valeurs
        $query->bindParam(":user_firstName", $this->user_firstName);
        $query->bindParam(":user_lastName", $this->user_lastName);
        $query->bindParam(":user_email", $this->user_email);
        $query->bindParam(":user_password", $this->user_password);
        $query->bindParam(":user_creationDate", $this->user_creationDate);
        $query->bindParam(":user_bio", $this->user_bio);
        $query->bindParam(":user_icon", $this->user_icon);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Lecture de tous les utilisateurs
    function read() {
        // Requête SQL pour récupérer tous les utilisateurs
        $sql = "SELECT * FROM " . $this->table_name;

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Exécution de la requête
        $query->execute();

        return $query;
    }

    // Lecture d'un utilisateur en fonction de son identifiant
    function readOne() {
        // Requête SQL pour récupérer un utilisateur en fonction de son identifiant
        $sql = "SELECT * FROM " . $this->table_name . " WHERE User_id = ? LIMIT 0,1";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(1, $this->user_id);

        $query->execute();

        // Récupération de la ligne correspondante
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Association des valeurs à l'objet
        $this->user_id = $row['User_id'];
        $this->user_firstName = $row['User_firstName'];
        $this->user_lastName = $row['User_lastName'];
        $this->user_email = $row['User_email'];
        $this->user_password = $row['User_password'];
        $this->user_creationDate = $row['User_creationDate'];
        $this->user_bio = $row['User_bio'];
        $this->user_icon = $row['User_icon'];
    }

    // Mise à jour des informations d'un utilisateur
    function update() {
        // Requête SQL pour mettre à jour un utilisateur
        $sql = "UPDATE " . $this->table_name . " SET User_firstName = :user_firstName, User_lastName = :user_lastName, User_email = :user_email, User_password = :user_password, User_creationDate = :user_creationDate, User_bio = :user_bio, User_icon = :user_icon WHERE User_id = :user_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->user_firstName=htmlspecialchars(strip_tags($this->user_firstName));
        $this->user_lastName=htmlspecialchars(strip_tags($this->user_lastName));
        $this->user_email=htmlspecialchars(strip_tags($this->user_email));
        $this->user_password=htmlspecialchars(strip_tags($this->user_password));
        $this->user_creationDate=htmlspecialchars(strip_tags($this->user_creationDate));
        $this->user_bio=htmlspecialchars(strip_tags($this->user_bio));
        $this->user_icon=htmlspecialchars(strip_tags($this->user_icon));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(":user_firstName", $this->user_firstName);
        $query->bindParam(":user_lastName", $this->user_lastName);
        $query->bindParam(":user_email", $this->user_email);
        $query->bindParam(":user_password", $this->user_password);
        $query->bindParam(":user_creationDate", $this->user_creationDate);
        $query->bindParam(":user_bio", $this->user_bio);
        $query->bindParam(":user_icon", $this->user_icon);
        $query->bindParam(":user_id", $this->user_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'un utilisateur en fonction de son identifiant
    function delete() {
        // Requête SQL pour supprimer un utilisateur en fonction de son identifiant
        $sql = "DELETE FROM " . $this->table_name . " WHERE User_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // Association des valeurs
        $query->bindParam(1, $this->user_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
}
