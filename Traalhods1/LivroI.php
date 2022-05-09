<?php
session_start();
$codigo = $_GET["codigo"];
$id = $_SESSION["id"];

$Banco = mysqli_connect("localhost","root","","Banco");

$select = "select * from usuariolivro where livro = $codigo and usuario =$id";

$resultado = mysqli_query($Banco, $select);

$b = mysqli_fetch_array($resultado);
if(!empty($b)) {
$_SESSION["jatem"] = 1;
header("Location: Catalogo.php");
}else{

$select2 = "select stock from livros where codigo = $codigo";

$resultado2 = mysqli_query($Banco, $select2);

$ba = mysqli_fetch_array($resultado2);

$bfinal = $ba["stock"] - 1;


$insert = "INSERT INTO usuariolivro (usuario, livro) VALUES ('$id','$codigo')";

$resultado4 = mysqli_query($Banco, $insert);

$update = "update livros set stock = $bfinal where codigo = $codigo";

$resultado3 = mysqli_query($Banco, $update);

header("Location: inicio.php");
}
?>