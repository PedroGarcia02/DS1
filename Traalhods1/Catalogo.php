<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();

if(isset($_SESSION["jatem"])) {
    if($_SESSION["jatem"] == 1) {
        echo "<span style='color:red;text-align:center;'>Voce Ja tem esse livro</span>";
        $_SESSION["jatem"] = 0;
    }  
}
?>
<form action="Catalogo.php" method = "GET">

<input type="text" name = "abc" placeholder="Parametro">
<input type="submit" value="Filtrar">
<br><br>
<a href="Inicio.php">Ir para seus livros</a>
<br><br>
</form>


<?php
if(isset($_GET["abc"])) {
    echo("<a href=\"Catalogo.php\">Remover Filtros</a>");
    $para = $_GET["abc"]; 
}


if(isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"] == true) {
        $id = $_SESSION["id"];
    $Banco = mysqli_connect("localhost","root","","Banco");

if(isset($para)) {
    $select = "select * from livros where nome like '%$para%'";
}else{
    $select = "select * from livros";
}
    $resultado = mysqli_query($Banco, $select); 
    echo ("<table class = 'table'> <th scope = 'col'>#</th>
    <th scope = 'col'>Nome</th>
    <th scope = 'col'>Ano</th>
    <th scope = 'col'>Autor</th>
    <th scope = 'col'>Stock</th>
    <th scope = 'col'>Pegar</th>
           ");
        while($linha = mysqli_fetch_array($resultado)) {
            echo "<tr> <td>".$linha['codigo']."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['anoDePublicacao']."</td>";
            echo "<td>".$linha['autor']."</td>";
            echo "<td>".$linha['stock']."</td>";
            if($linha['stock'] !== "0") {
                echo "<td>"."<a href=\"LivroI.php?codigo=".$linha['codigo']."\">Pegar</a>"."</td>"; //a 
            }else{
                echo "<td>Esgotado</td>";
            }
            

            echo("</tr>");
        } 
        echo("</table>");


}else{
    header("Location: login.php?msg=PreicaLogar");
}
}

?>