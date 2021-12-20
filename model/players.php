<?php

// magic constant
require_once ("DbAbstractClass.php");//modificar

class players extends DbAbstractClass {
  
  private $id;
  private $username;
  private $passwd;
  private $email;

 // public $message;
  
  function __construct() {
    $this->db_name = "a20marsolluc_moviequiz";
    }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->id . ", " . $this->username . ", " . $this->passwd . ", " .  
      $this->email . ")";
  }
  
  function __destruct() {
  }
  
  //select dels camps passats de tots els registres
  //stored in $rows property
  public function selectAll($fields=array()) {
    
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM usuario";
    // $this->query = "SELECT * FROM usuario";
    $this->get_results_from_query();
    return $this->rows;
    
  }
  
  public function select($username=""){
   
      $this->query = "SELECT username, passwd, email
                    FROM usuario
                    WHERE username='$username'";
      $this->get_results_from_query();
  
    if (count($this->rows)==1) {
      foreach ($this->rows[0] as $property => $value)
        $this->$property = $value;
     $this->message = "Persona trobada";
       
    } else  $this->message = "Persona no trobada";
    
    return $this->rows;
  }
  public function login($username="", $passwd=""){

    $this->query = "SELECT username, passwd
                    FROM usuario
                    WHERE username='$username' AND passwd='$passwd'";
    $this->get_results_from_query();

    if (count($this->rows) == 1) {
      $correcto = 1;

    } else{
        $correcto = 0;
      }
    return $correcto;
  }
  

  public function insert($user_data = array()) {

    if (array_key_exists("nom", $user_data)) {
      $this->select($user_data["nom"]);
      if ($user_data["nom"]!= $this->nom) {
        foreach ($user_data as $field => $value)
          $$field = $value;
        $this->query="INSERT INTO persones (username, email, passwd)
                      VALUES ($this->username,$this->passwd,$this->email)";
        $this->execute_single_query();
        $this->message = "Usuari inserit amb èxit";
      } else $this->message = "Usuari ja existent";
    } else $this->message = "Usuari no inserit";
  }

  public function update ($userData = array()) {
   
  }
 
  public function delete ($nom="") {
  
  }

    
}

?>
