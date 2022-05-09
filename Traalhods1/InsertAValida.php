<?php
session_start();
echo("a");
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
            $Inserir = "INSERT INTO usuario (nome,email,senha,adm) VALUES ('$nome', '$email', '$senha', '1')";
            if (mysqli_query($Banco, $Inserir)){
                $_SESSION["cadastrado"] = 1;
                header("Location: InsertA.php?msg=Cadastrado");
            } else {
                header("Location: InsertA.php?msg=ErroNaFoz");
            }
        }else{
            $_SESSION["errocadastro"] = 1;
            header("Location: InsertA.php");
        }
    }
}else{
    $_SESSION["errosenha"] = 1;
    header("Location: InsertA.php");
}
?>



<!-- Ajustar o css, mudar o usuario não pode ver essa pagina redirecionar e mandar mensagem;