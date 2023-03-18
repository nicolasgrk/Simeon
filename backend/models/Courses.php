<?php
class Courses{
    // Connexion
    private $connexion;
    private $table = "Courses"; // Table dans la base de données

    // Propriétés
    public $id;
    public $name;
    public $description;
    public $distance;
    public $note;
    public $image;


    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }
    /**
 * Créer un produit
 *
 * @return void
 */
    public function create(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET Course_name=:name, Course_description=:description, Course_distance=:distance, Course_note=:note, Course_image=:image";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->distance=htmlspecialchars(strip_tags($this->distance));
        $this->note=htmlspecialchars(strip_tags($this->note));
        $this->image=htmlspecialchars(strip_tags($this->image));

        // Ajout des données protégées
        $query->bindParam(":name", $this->name);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":distance", $this->distance);
        $query->bindParam(":note", $this->note);
        $query->bindParam(":image", $this->image);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }
    /**
     * Lecture des produits
     *
     * @return void
     */
    public function read(){
        // On écrit la requête
        $sql = "SELECT c.Course_id, c.Course_name, c.Course_description, c.Course_distance, c.Course_note, c.Course_image FROM " . $this->table . " c";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }
    /**
     * Lire un produit
     *
     * @return void
     */
    public function readOne(){
        // On écrit la requête
        $sql = "SELECT c.Course_id, c.Course_name, c.Course_description, c.Course_distance, c.Course_note, c.Course_image FROM " . $this->table . " c  WHERE c.Course_id = ? LIMIT 0,1";
    
        // On prépare la requête
        $query = $this->connexion->prepare( $sql );
    
        // On attache l'id
        $query->bindParam(1, $this->id);
    
        // On exécute la requête
        $query->execute();
    
        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);
    
        // On hydrate l'objet
        $this->id = $row['Course_id'];
        $this->name = $row['Course_name'];
        $this->description = $row['Course_description'];
        $this->distance = $row['Course_distance'];
        $this->note = $row['Course_note'];
        $this->image = $row['Course_image'];

    }
    
    
    /**
     * Mettre à jour un produit
     *
     * @return void
     */
    public function update(){
        // On écrit la requête
        $sql = "UPDATE " . $this->table . " SET Course_name=:name, Course_description=:description, Course_distance=:distance, Course_note=:note, Course_image=:image WHERE id = :id";
        
        // On prépare la requête
        $query = $this->connexion->prepare($sql);
        
        // On sécurise les données
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->distance=htmlspecialchars(strip_tags($this->distance));
        $this->note=htmlspecialchars(strip_tags($this->note));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->id=htmlspecialchars(strip_tags($this->id));
        
        // On attache les variables
        $query->bindParam(':name', $this->name);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':distance', $this->distance);
        $query->bindParam(':note', $this->note);
        $query->bindParam(':image', $this->image);
        $query->bindParam(':id', $this->id);
        
        // On exécute
        if($query->execute()){
            return true;
        }
        
        return false;
    }
    
    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function delete(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE Course_id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->id=htmlspecialchars(strip_tags($this->id));

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }
        
        return false;
    }
}