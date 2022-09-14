<?php

include("conexao.php")

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$data = mysqli_real_escape_string($conexao, trim ($_POST['data']));
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$confirma_senha = mysqli_real_escape_string($conexao, $_POST['confirma_senha']);

$sql = "select count () as total from Tb_integrante_nome where Tb_integrante_nome = 'nome';";
$result = mysqli_query($sql);
$row = mysqli_fetch_assoc($result);

if($row{'total'} == 1)  {
  $_SESSION['usuario_existe'] = true;
  header('Location: cadastro.php');
  exit;
}

?>