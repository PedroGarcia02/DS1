<?php
session_start();
?>
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
<?php
if(isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"] == true) {
    echo("Logado como: ");
    echo "<span style='color:green;text-align:center;'>".$_SESSION["nome"]."</span>";
    echo("<br><br>");
    echo("<a href=\"Catalogo.php\">Alugar Livros</a>");
    echo("<br><br>");
    echo("<a href=\"logout.php\">Sair da Conta</a>");


    if(isset($_SESSION["adm"])) {
        if ($_SESSION["adm"] == true) {
        echo("<br><br>");
        echo "<span style='color:green;text-align:center;'>ADMINISTRADOR </span>";
        echo("<br><br>");
        echo("<a href=\"InsertA.php\">Inserir Outro Admin</a>");
        }
    }
}
}else {
    echo("<h4>Fazer Login!</h4>");
    echo("<br><br>");
    echo("<a href=\"login.php\">Login</a>");
}


// tabela daqui pra baixo
if(isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"] == true) {
        $id = $_SESSION["id"];
    $Banco = mysqli_connect("localhost","root","","Banco");

    $select = "select *, livros.codigo as codigosagrado from livros join usuariolivro on usuariolivro.livro = livros.codigo where usuariolivro.usuario = $id";
    $resultado = mysqli_query($Banco, $select);
    
    $resultadoteste = mysqli_query($Banco, $select);
    $bc = mysqli_fetch_array($resultadoteste);
    if(empty($bc)){
        echo ("<br><br>");
        echo "<span style='color:red;text-align:center;'>Nenhum Livro em posse </span>";
    }
    echo ("<table class = 'table'> <th scope = 'col'>#</th>
    <th scope = 'col'>Nome</th>
    <th scope = 'col'>Ano</th>
    <th scope = 'col'>Autor</th>
    <th scope = 'col'>Remover</th>
           ");
        while($linha = mysqli_fetch_array($resultado)) {
            echo "<tr> <td>".$linha['codigosagrado']."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['anoDePublicacao']."</td>";
            echo "<td>".$linha['autor']."</td>";
            echo "<td>"."<a href=\"Delete.php?codigo=".$linha['codigosagrado']."\">Remover</a>"."</td>"; //a
            

            echo("</tr>");
        }
        echo("</table>");

}
}
?>
</body>
</html>