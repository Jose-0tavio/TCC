<?php
require_once 'config/Database.php';

class Aluno{ 


  //propriedades do objeto
  private $id;
  private $nome;
  private $email;
  private $senha;
  private $dataNascimento;
  private $classe;
  private $responsavel;
  private $rg;
  
    public function __construct($attributes = Array()){

        foreach($attributes as $field=>$value){
          $this->$field = $value;
        }
    }
    
    

    function __set($name,$value){
        if(method_exists($this, $name)){
          $this->$name($value);
        }
        else{
          // Getter/Setter not defined so set as property of object
          $this->$name = $value;
        }
    }
    
    function &__get($name){
        if(method_exists($this, $name)){
          return $this->$name();
        }
        elseif(property_exists($this,$name)){
          // Getter/Setter not defined so return property if it exists
          return $this->$name;
        }
        $resposta = null;
        return $resposta;
    }
    
    function validatePassword($senhaA, $senhaB){
        return $senhaA === $senhaB ? true : false;
    }
    
}
?>