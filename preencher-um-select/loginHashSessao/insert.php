<?php 
$nome = $_POST['nome'];
$email = $_POST['e-mail'];
$senha = $_POST['senha'];


//echo $nome."-".$email."-".$idade;

include_once("conect.php");

include_once("Crud.php");

include_once("classes/Cad.php");

$obj = new Crud($conect);
$cad = new Cad($conect);

$obj->setDados($nome,$email,$senha);

$cad->setDadosCad($email, $senha);

$cad->insertCad();

$obj->insertDados();

