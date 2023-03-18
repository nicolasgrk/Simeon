<?php
class Steps {
    // Connexion
    private $connexion;
    private $table = "Steps"; // Nom de la table dans la base de données

    // Propriétés
    public $step_id;
    public $step_name;
    public $step_longitude;
    public $step_latitude;
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
     * Créer une étape
     *
     * @return void
     */
    public function create(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Step_name=:name, Step_longitude=:longitude, Step_latitude=:latitude, Course_id=:course_id";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->step_name=htmlspecialchars(strip_tags($this->step_name));
        $this->step_longitude=htmlspecialchars(strip_tags($this->step_longitude));
        $this->step_latitude=htmlspecialchars(strip_tags($this->step_latitude));
        $this->course_id=htmlspecialchars(strip_tags($this->course_id));

        // Ajout des données protégées
        $query->bindParam(":name", $this->step_name);
        $query->bindParam(":longitude", $this->step_longitude);
        $query->bindParam(":latitude", $this->step_latitude);
        $query->bindParam(":course_id", $this->course_id);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }

    /**
     * Lire les étapes d'un cours
     *
     * @return void
     */
    public function readByCourseId(){
        // On écrit la requête
        $sql = "SELECT s.Step_id, s.Step_name, s.Step_longitude, s.Step_latitude, s.Course_id FROM " . $this->table . " s WHERE s.Course_id = ?";

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
     * Lire une étape
     *
     * @return void
     */
    public function readOne(){
        // On écrit la requête
        $sql = "SELECT s.Step_id, s.Step_name, s.Step_longitude, s.Step_latitude, s.Course_id FROM " . $this->table . " s WHERE s.Step_id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->step_id);

        // On exécute la requête
        $query->execute();

        // On récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->step_id = $row['Step_id'];
        $this->step_name = $row['Step_name'];
        $this->step_longitude =$row['Step_longitude'];
        $this->step_latitude = $row['Step_latitude'];
        $this->course_id = $row['Course_id'];
    }

    /**
     * Mettre à jour une étape
     *
     * @return void
     */
    public function update(){
        // On écrit la requête
        $sql = "UPDATE " . $this->table . " SET Step_name=:name, Step_longitude=:longitude, Step_latitude=:latitude WHERE Step_id=:id";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->step_name=htmlspecialchars(strip_tags($this->step_name));
        $this->step_longitude=htmlspecialchars(strip_tags($this->step_longitude));
        $this->step_latitude=htmlspecialchars(strip_tags($this->step_latitude));
        $this->step_id=htmlspecialchars(strip_tags($this->step_id));

        // On attache les variables
        $query->bindParam(':name', $this->step_name);
        $query->bindParam(':longitude', $this->step_longitude);
        $query->bindParam(':latitude', $this->step_latitude);
        $query->bindParam(':id', $this->step_id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }

        return false;
    }

    /**
     * Supprimer une étape
     *
     * @return void
     */
    public function delete(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE Step_id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->step_id=htmlspecialchars(strip_tags($this->step_id));

        // On attache l'id
        $query->bindParam(1, $this->step_id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }

        return false;
    }
}
