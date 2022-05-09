<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$Banco = mysqli_connect("localhost","root","","Banco");

$select = "select * from usuario where email ='$email' and senha ='$senha'";

if($a = mysqli_query($Banco, $select)) {
    $b = mysqli_fetch_array($a);
    if(!empty($b)) {
        $_SESSION["usuario"] = $b["email"];
        $_SESSION["id"] = $b["id"];
        $_SESSION["nome"] = $b["nome"];
        $_SESSION["adm"] = $b["adm"];
        header("Location: inicio.php");
    }else{
    header("Location: Login.php");
    $_SESSION["errologin"] = 1;
    }
}


?>
