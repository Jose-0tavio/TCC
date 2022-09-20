<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$data = mysqli_real_escape_string($conexao, trim ($_POST['data']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$confirma_senha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirma_senha'])));

$sql = "select count (*) as total from Tb_aluno where Tb_aluno_nome = '$nome';";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1)  {
  $_SESSION['usuario_existe'] = true;
  exit;
}
$sql ="INSERT INTO Tb_aluno (nome, data, email, senha, confirma_senha) VALUES ('$nome', '$data', '$email', '$senha', '$confirma_senha', NOW())";

if ($conexao->query($sql) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();
exit;
?>