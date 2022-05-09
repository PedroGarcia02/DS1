<?php
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
  <link rel="stylesheet" href="Css\login.css">
</head>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <form action="loginValida.php" method="POST">
    <?php
    if(isset($_SESSION["usuario"])){
        header("Location: inicio.php?msg=JaLogado");
    }

    if(isset($_SESSION["errologin"])) {
        if($_SESSION["errologin"] == 1) {
            echo "<span style='color:red;text-align:center;'>Login Incorreto</span>";
            $_SESSION["errologin"] = 0;
        }  
    }

    if(isset($_SESSION["cadastrado"])) {
      if($_SESSION["cadastrado"] == 1) {
          echo "<span style='color:green;text-align:center;'>Cadastro Feito com Sucesso</span>";
          $_SESSION["cadastrado"] = 0;
      }  
  }
    ?>
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="E-mail">
      <input type="text" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="Cadastro.php">Criar Conta</a>
    </div>

  </div>
</div>