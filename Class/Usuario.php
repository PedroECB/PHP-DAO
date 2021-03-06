<?php 


class Usuario{
  private $id;
  private $nome;
  private $sexo;
  private $nacionalidade;

  public function __construct(){}


  public function getId(){
    return $this->id;
  }
  public function setId($i){
    $this->id = $i;
  }
                              
  public function getNome(){
    return $this->nome;
  }
  public function setNome($n){
    $this->nome = $n;
  }
  public function getSexo(){
    return $this->sexo;
  }
  public function setSexo($s){
    $this->sexo = $s;
  }
  public function getNacionalidade(){
    return $this->nacionalidade;
  }
  public function setNacionalidade($nac){
    $this->nacionalidade = $nac;
  }

      public function loadById($id){
        $query = new SqlConfig();
        $result = $query->select("SELECT * FROM pessoas WHERE id= :ID ", array(":ID"=>$id));

        if(count($result) > 0){
          $row = $result[0];
          $this->setId($row['id']);
          $this->setNome($row['nome']);
          $this->setNacionalidade($row['nacionalidade']);
          $this->setSexo($row['sexo']);

        }
      }

     public function __toString(){
      

      return "Nome: ".$this->getNome()." Sexo: ".$this->getSexo()." Nacionalidade: ".$this->getNacionalidade();

       /*json_encode(array(
        "id"=>$this->getId(),
        "nome"=>$this->getNome(),
        "nacionalidade"=>$this->getNacionalidade() 
      )); */
     } 


public static function getList(){
  $obj = new SqlConfig();
  $stmt = $obj->select("SELECT * FROM usuarios");

 return $stmt;

}


public static function search($nome){
  $sql = new SqlConfig();
 $stmt = $sql->select("SELECT * FROM usuarios where nome like :SEARCH;", array(":SEARCH"=>"%".$nome."%"));

 return $stmt;
}

public function login($login, $senha){
  $loger = new SqlConfig();
  $result = $loger->select("SELECT * FROM usuarios WHERE nome =:NOME and senha = :SENHA", array(
    ":NOME"=>$login,
    ":SENHA"=>$senha));

   if(count($result)>0){
    $row = $result[0];
    $this->nome = $row['nome'];
    $this->nacionalidade = $row['dtcadastro'];

    echo "Usuário Logado com sucesso";
   }else{
    echo "Falha na autenticação";
   } 


}



}
