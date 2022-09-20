<?php
ini_set('display_errors', 1);
require_once 'config/Database.php';
require_once 'model/Aluno.class.php';


class AlunoResource{

    private $conn;
    private $table_name = "Tb_Aluno";

    function setConn($db){
        $this->conn = $db;
    }

    function create(Aluno $aluno){
 
        //write query
        $query = "INSERT INTO " . $this->table_name . "
        SET  Tb_Aluno_nome=:nome,Tb_Aluno_email=:email,Tb_Aluno_senha=:senha,Tb_Aluno_datanasc=:dataNascimento, tb_responsavel_id=:responsavel, tb_classe_id=:classe, tb_aluno_rg=:rg";
  
        $stmt = $this->conn->prepare($query);
        // bind values 
        $stmt->bindParam(":nome", $aluno->nome,PDO::PARAM_STR);
        $stmt->bindParam(":email", $aluno->email);
        $stmt->bindParam(":senha", $aluno->senha);
        $stmt->bindParam(":dataNascimento", $aluno->dataNascimento);
        $stmt->bindParam(":responsavel", $aluno->responsavel);
        $stmt->bindParam(":classe", $aluno->classe);
        $stmt->bindParam(":rg", $aluno->rg);

        
        $stmt->execute();
  
    }

    function findByEmail($email){
  
        $query = "SELECT * FROM " . $this->table_name . " WHERE Tb_Aluno_email = " .$email;
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
      }

    function findAll(){

      $resultado = array();
        $sql = "SELECT * FROM " . $this->table_name;
      
        foreach ($this->conn->query($sql, PDO::FETCH_CLASS, 'Aluno') as $row) {
          array_push($resultado, $row);
          echo $row->nome;
      }
      return $resultado;
      echo $resultado;
    }

}
?>