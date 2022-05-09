<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];

if($senha == $senha2) {
  
    
    $Banco = mysqli_connect("localhost","root","","Banco");

    $select = "select email from usuario where email ='$email'";

    if($a = mysqli_query($Banco, $select)) {
        $b = mysqli_fetch_array($a);
        if(empty($b)) {
            $Inserir = "INSERT INTO usuario (nome,email,senha) VALUES ('$nome','$email', '$senha')";
            if (mysqli_query($Banco, $Inserir)){
                $_SESSION["cadastrado"] = 1;
                header("Location: Login.php?msg=Cadastrado");
            } else {
                header("Location: Login.php?msg=ErroNaFoz");
            }
        }else{
            $_SESSION["errocadastro"] = 1;
            header("Location: Cadastro.php");
        }
    }
}else{
    $_SESSION["errosenha"] = 1;
    header("Location: Cadastro.php");
}
?>