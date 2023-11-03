<?php
//incluindo a conexão e as classes no arquivo
include_once("conect.php");
include_once("classes/sessao.php");

//extraindo as variaveis
extract($_POST);

//chama a função da sessao
$obj = new Sessao($conect);

//está lendo os usuarios do banco de dados e pegando esses dados em uma array
$dados = $obj->readUsers();

//uso foreach para percorrer a array *$dados*
foreach($dados as $Empresa => $valores){
    //verifica o hash comparando com o nome de usuario e senha
    if($email == $valores->email && $senha == $valores->senha){
        //se em algum momento for verdadeiro ele pega o hash do usuario e manda para a função autorizado la no sessao.php
        $emp = $valores->email;
        //link para a próxima pagina
        $link = "../ControleCaixa/index.php";
        Sessao::autorizado($link,$emp); 
        break;
    }else{
        //se não achar usuario e senha, não irá efetuar o login
        $loginNot = true; 
    }   
}
if($loginNot){
    //caso não efetue o login
    echo '<script language="javascript">alert("Usuário não encontrado, tente novamente!")</script>';
    echo '<script language="javascript">window.location="../forms/form-loginCliente.php"</script>';
}

?>