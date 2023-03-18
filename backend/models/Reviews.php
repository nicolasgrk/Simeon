<?php
class Reviews {
    // Connexion
    private $connexion;
    private $table = "Reviews"; // Nom de la table dans la base de données

    // Propriétés
    public $review_id;
    public $review_date;
    public $review_message;
    public $course_id;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Créer une critique
     *
     * @return void
     */
    public function create(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Review_date=:date, Review_Message=:message, Course_id=:course_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->review_date=htmlspecialchars(strip_tags($this->review_date));
        $this->review_message=htmlspecialchars(strip_tags($this->review_message));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Ajout des données protégées
        $query->bindParam(":date", $this->review_date);
        $query->bindParam(":message", $this->review_message);
        $query->bindParam(":course_id", $this->course_id);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }

    /**
     * Lire les critiques d'un cours
     *
     * @return void
     */
    public function readByCourseId(){
        // On écrit la requête
        $sql = "SELECT r.Review_id, r.Review_date, r.Review_Message, r.Course_id FROM " . $this->table . " r WHERE r.Course_id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id du cours
        $query->bindParam(1, $this->course_id);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Lire une critique
     *
     * @return void
     */
    public function readOne(){
        // On écrit la requête
        $sql = "SELECT r.Review_id, r.Review_date, r.Review_Message, r.Course_id FROM " . $this->table . " r WHERE r.Review_id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->review_id);

        // On exécute la requête
        $query->execute();

        // On récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->review_id = $row['Review_id'];
        $this->review_date = $row['Review_date'];
        $this->review_message = $row['Review_Message'];
        $this->course_id = $row['Course_id'];
    }
        /**
     * Mettre à jour une critique
     *
     * @return void
     */
    public function update(){
        // On écrit la requête
        $sql = "UPDATE " . $this->table . " SET Review_date=:date, Review_Message=:message, Course_id=:course_id WHERE Review_id=:id";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->review_date=htmlspecialchars(strip_tags($this->review_date));
        $this->review_message=htmlspecialchars(strip_tags($this->review_message));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));
        $this->review_id=htmlspecialchars(strip_tags($this->review_id));

        // On attache les variables
        $query->bindParam(':date', $this->review_date);
        $query->bindParam(':message', $this->review_message);
        $query->bindParam(':course_id', $this->course_id);
        $query->bindParam(':id', $this->review_id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }

        return false;
    }

    /**
     * Supprimer une critique
     *
     * @return void
     */
    public function delete(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE Review_id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->review_id=htmlspecialchars(strip_tags($this->review_id));

        // On attache l'id
        $query->bindParam(1, $this->review_id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }

        return false;
    }
}
