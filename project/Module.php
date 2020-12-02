<?php    // Module.php
class Module {
   // private variables
    private $id;
    private $name;
    private $description;
    private $lecturerID;
 
    public function __construct($id, $name, $description, $lecturerID) {
        $this->$id = $id;
        $this->$name = $name;
        $this->$description = $description;
        $this->$lecturerID = $lecturerID;

        echo 'Created a ', __CLASS__, ' with name=', $this->name, ".\n";
   }

   public function __destruct() {
      echo 'Destructed instance ', $this, ' of ', __CLASS__, ".\n";
   }
 
   //getters
   public function getID() { return $this->id; }
   public function getName() { return $this->name; }
   public function getDescription() { return $this->description; }
   public function getLecturer() { return $this->lecturer; }
 
   //setters
   public function setID($id) { $this->id = $id; }
   public function setName($name) { $this->name = $name; }
   public function setDescription($description) { $this->description = $description; }
   public function setLecturer($lecturerID) { $this->lecturerID = $lecturerID; }
 
   //specific methods
   //none
}