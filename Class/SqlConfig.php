<?php 


class Sqlconfig extends PDO{
  private $conn;

  public function __construct(){
    $this->conn = new PDO("mysql:host=localhost;dbname=banco","root","123");
  }


    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();

          return  $stmt;
    }



    public function setParams($statment, $parameters = array()){
       foreach ($parameters as $key => $value){
          $this->setParam($statment, $key, $value);

      }

    }

    public function setParam($statment, $key, $param){
         $statment->bindparam($key, $param);
      }

   public function select($rawQuery, $params = array()):array
   {
     $stmt = $this->query($rawQuery, $params);
     return $stmt->fetchAll(PDO::FETCH_ASSOC);

   }

}

