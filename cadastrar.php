<?php

include_once("conexao.php");
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$fone = $_POST['fone'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$imagem = $_FILES['imagem'];
$pesquisa = mysqli_query($conexao,"SELECT * FROM `tb_usuario` 
WHERE `email` = '$email' AND `cpf`= '$cpf'");

if(empty($nome) || empty($endereco) || empty($cep)|| empty($fone)|| empty($data_nasc)|| empty($rg)|| empty($cpf)|| empty($sexo)|| empty($email)|| empty($senha)){
    echo("<script type='text/javascript'>
    alert(Preencha todos os campos!');
    </script>");
}
else if(mysqli_num_rows($pesquisa) > 0){
    echo("<script type='text/javascript'>
    alert('Há um cadastro igual ao seu!');
    </script>");
}
else{
    $result_usuario = "INSERT INTO tb_usuario (nome,endereco,cep,fone,data_nasc,cpf,rg,sexo,email,senha) VALUES ('$nome','$endereco','$cep','$fone','$data_nasc','$cpf','$rg','$sexo','$email','$senha')";
}
$resultado_usuario = mysqli_query($conexao,$result_usuario);

if(mysqli_insert_id($conexao))
{
  echo("<script type='text/javascript'>
           alert('Usuário cadastrado com sucesso!');
        </script>");
}
else{
    die("Falha na conexão: ". mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Salão de Cabelereiro</title>
    </head>
    <body>
        <div class="container">
            <div class="card-panel panel">
                <h1>Seja Bem-Vindo(a)!</h1>
                <a href="index.html"><center><input type="button" value="Fazer login" class="submit"></center></a>
            </div>
        </div>
    </body>
</html>