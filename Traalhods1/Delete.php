<?php
session_start();
$codigo = $_GET["codigo"];
$id = $_SESSION["id"];

$Banco = mysqli_connect("localhost","root","","Banco");

$delete = "delete from usuariolivro where usuario = $id and livro = $codigo";

$resultado = mysqli_query($Banco, $delete);




$select = "select stock from livros where codigo = $codigo";

$resultado2 = mysqli_query($Banco, $select);

$b = mysqli_fetch_array($resultado2);

$bfinal = $b["stock"] + 1;

$update = "update livros set stock = $bfinal where codigo = $codigo";

$resultado3 = mysqli_query($Banco, $update);

header("Location: inicio.php?msg=ApagadoDaExistencia");
?>