<?php
ini_set('display_errors', 0);

include_once 'model/Aluno.class.php';
include_once 'config/Database.php';
include_once 'resources/alunoResource.php';

$page_title = "Cadastro Aluno";
$validacao = false;

 $database = new Database();
 $db = $database->getConnection();
 
 $dtoAluno = new alunoResource();
 $dtoAluno->setConn($db);
 $alunos = $dtoAluno->findAll();
 

 if ($_POST['nome'] != null){
    $nome = $_POST['nome'];

 }else{
    echo "<div class='alert alert-info'>NOME NAO PODE SER VAZIO</div>";
 }
 if ($_POST['data']!= null){
    $data = $_POST['data'];
 }else{
    echo "<div class='alert alert-info'>DATA NAO PODE SER VAZIO/div>";
 }
 if ($_POST['email']!= null){
    $email = $_POST['email'];
 }else{
    echo "<div class='alert alert-info'>EMAIL NAO PODE SER VAZIO</div>";
 }
 if ($_POST['senha']!= null){
    $senha = $_POST['senha'];
 }else{
    echo "<div class='alert alert-info'>SENHA NAO PODE SER VAZIO</div>";
 }
 if (($_POST['senha'] && $_POST['confirma_senha'])){
    $senha = $_POST['senha'];
    $senha2 = $_POST['confirma_senha'];
}else{
    echo "<div class='alert alert-info'>COFIRMACAO E SENHA PRECISAM SER IGUAIS</div>";
}

 $aluno = new Aluno();
 $aluno->nome = $nome;
 $aluno->email = $email;
 $aluno->dataNascimento = $data;
 $aluno->responsavel = 1;
 $aluno->classe = 1;
 $aluno->rg = "1234567890";
 if ($aluno->validatePassword($senha,$senha2)){
    $aluno->senha = $senha;
 }else{
    echo "<div class='alert alert-info'>SENHA NAO CONFERE</div>";
 }

 $dtoAluno->create($aluno);

 echo "ALUNO CADASTRADO COM SUCESSO";


?>