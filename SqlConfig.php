<?php 


public class SqlConfig extends PDO{

  private $conn;

public function __construct(){

    $this->$conn = new PDO("mysql:host=localhost;dbname=banco","root","123");
}


private function setParams($statement, $parameters){
    foreach ($parameters as $key => $value){
        $statement->bindparam($key, $value);
    }
}

private function setParam($statement, $key, $value){
      $statement->bindparam($key, $value);
  
}


public function query($rawQuery,$params = array()){
  $stmt = $this->$conn->prepare($rawQuery);

  

}


}
