<?php
class Partners {
    // Connexion à la base de données et nom de la table
    private $connexion;
    private $table_name = "Partners";

    // Propriétés de l'objet
    public $partner_id;
    public $partner_name;
    public $partner_description;
    public $partner_date;
    public $partner_longitude;
    public $partner_latitude;

    // Constructeur avec la connexion à la base de données en paramètre
    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Création d'un nouveau partenaire
    function create() {
        // Requête SQL pour créer un nouveau partenaire
        $sql = "INSERT INTO " . $this->table_name . " SET Partner_name = :partner_name, Partner_description = :partner_description, Partner_date = :partner_date, Partner_longitude = :partner_longitude, Partner_latitude = :partner_latitude";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->partner_name=htmlspecialchars(strip_tags($this->partner_name));
        $this->partner_description=htmlspecialchars(strip_tags($this->partner_description));
        $this->partner_date=htmlspecialchars(strip_tags($this->partner_date));
        $this->partner_longitude=htmlspecialchars(strip_tags($this->partner_longitude));
        $this->partner_latitude=htmlspecialchars(strip_tags($this->partner_latitude));

        // Association des valeurs
        $query->bindParam(":partner_name", $this->partner_name);
        $query->bindParam(":partner_description", $this->partner_description);
        $query->bindParam(":partner_date", $this->partner_date);
        $query->bindParam(":partner_longitude", $this->partner_longitude);
        $query->bindParam(":partner_latitude", $this->partner_latitude);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Récupération de la liste des partenaires
    function read() {
        // Requête SQL pour récupérer la liste des partenaires
        $sql = "SELECT * FROM " . $this->table_name;

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Exécution de la requête
        $query->execute();

        // Retourne les résultats
        return $query;
    }

    // Récupération d'un partenaire en fonction de son identifiant
    function readOne() {
        // Requête SQL pour récupérer un partenaire en fonction de son identifiant
        $sql = "SELECT * FROM " . $this->table_name . " WHERE Partner_id = ? LIMIT 0,1";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->partner_id=htmlspecialchars(strip_tags($this->partner_id));

        // Association des valeurs
        $query->bindParam(1, $this->partner_id);

        // Exécution de la requête
        $query->execute();

        // Récupération du résultat
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // Hydratation de l'objet
        $this->partner_id = $row['Partner_id'];
        $this->partner_name = $row['Partner_name'];
        $this->partner_description = $row['partner_description'];
        $this->partner_date = $row['Partner_date'];
        $this->partner_longitude = $row['Partner_longitude'];
        $this->partner_latitude = $row['Partner_latitude'];
    }

    // Mise à jour d'un partenaire
    function update() {
        // Requête SQL pour mettre à jour un partenaire
        $sql = "UPDATE " . $this->table_name . " SET Partner_name = :partner_name, Partner_description = :partner_description, Partner_date = :partner_date, Partner_longitude = :partner_longitude, Partner_latitude = :partner_latitude WHERE Partner_id = :partner_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->partner_name=htmlspecialchars(strip_tags($this->partner_name));
        $this->partner_description=htmlspecialchars(strip_tags($this->partner_description));
        $this->partner_date=htmlspecialchars(strip_tags($this->partner_date));
        $this->partner_longitude=htmlspecialchars(strip_tags($this->partner_longitude));
        $this->partner_latitude=htmlspecialchars(strip_tags($this->partner_latitude));
        $this->partner_id=htmlspecialchars(strip_tags($this->partner_id));

        // Association des valeurs
        $query->bindParam(":partner_name", $this->partner_name);
        $query->bindParam(":partner_description", $this->partner_description);
        $query->bindParam(":partner_date", $this->partner_date);
        $query->bindParam(":partner_longitude", $this->partner_longitude);
        $query->bindParam(":partner_latitude", $this->partner_latitude);
        $query->bindParam(":partner_id", $this->partner_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }

    // Suppression d'un partenaire
    function delete() {
        // Requête SQL pour supprimer un partenaire
        $sql = "DELETE FROM " . $this->table_name . " WHERE Partner_id = ?";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Nettoyage des données d'entrée
        $this->partner_id=htmlspecialchars(strip_tags($this->partner_id));

        // Association des valeurs
        $query->bindParam(1, $this->partner_id);

        // Exécution de la requête
        if($query->execute()) {
            return true;
        }

        return false;
    }
}
