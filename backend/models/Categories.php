<?php
class Categories {
    // Connexion à la base de données
    private $connexion;
    private $table_name = "Categories";

    // Propriétés de la table Categories
    public $category_id;
    public $category_name;

    // Constructeur avec connexion en paramètre
    public function __construct($db) {
        $this->connexion = $db;
    }

    // Lecture de toutes les catégories
    function read() {
        // Requête SQL pour lire toutes les catégories
        $sql = "SELECT Category_id, Category_name FROM " . $this->table_name;

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Exécution de la requête
        $query->execute();

        // Renvoi du résultat
        return $query;
    }

    // Lecture d'une seule catégorie en fonction de son identifiant
    function readOne() {
        // Requête SQL pour lire une seule catégorie
        $sql = "SELECT Category_id, Category_name FROM " . $this->table_name . " WHERE Category_id = ?";
    
        // Préparation de la requête
        $query = $this->connexion->prepare($sql);
    
        // Nettoyage des données d'entrée
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    
        // Association des valeurs
        $query->bindParam(1, $this->category_id);
    
        // Exécution de la requête
        $query->execute();
    
        // Récupération des données de la catégorie en tant que tableau associatif
        $category = $query->fetch(PDO::FETCH_ASSOC);
    
        // Attribution des données de la catégorie à l'objet Category
        $this->category_id = $category['Category_id'];
        $this->category_name = $category['Category_name'];
    }
    

    // Création d'une nouvelle catégorie
    function create() {
        // Requête SQL pour créer une nouvelle catégorie
        $sql = "INSERT INTO " . $this->table_name . " SET Category_name = :name";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->category_name=htmlspecialchars(strip_tags($this->category_name));

        // Association des valeurs
        $query->bindParam(":name", $this->category_name);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Mise à jour d'une catégorie en fonction de son identifiant
    function update() {
        // Requête SQL pour mettre à jour une catégorie
        $sql = "UPDATE " . $this->table_name . " SET Category_name = :name WHERE Category_id = :category_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->category_name=htmlspecialchars(strip_tags($this->category_name));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));

        // Association des valeurs
        $query->bindParam(":name", $this->category_name);
        $query->bindParam(":category_id", $this->category_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'une catégorie en fonction de son identifiant
    function delete() {
        // Requête SQL pour supprimer une catégorie
        $sql = "DELETE FROM " . $this->table_name . " WHERE Category_id = ?";

        //
        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));

        // Association des valeurs
        $query->bindParam(1, $this->category_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
}
