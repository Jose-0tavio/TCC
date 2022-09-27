<?php
ini_set('display_errors', 0);

include_once 'model/Aluno.class.php';
include_once 'config/Database.php';
include_once 'resources/alunoResource.php';

$page_title = "Login";
$validacao = false;

 $database = new Database();
 $db = $database->getConnection();
 
 $dtoAluno = new alunoResource();
 $dtoAluno->setConn($db);
 $alunos = $dtoAluno;//->findAll();
 


 $aluno = new Aluno;
if($aluno != null){
   if($_POST['email']== $email){
      $email = $_GET['email'];
   }else{
      echo "Email incorreto";
   }
   if($_POST['senha']== $senha){
      $senha = $_GET['senha'];
   }else{
      echo "Senha Incorreta";
   }
}else{
   echo "login incorreto";
}


?>