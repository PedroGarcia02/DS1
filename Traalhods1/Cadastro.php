
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
  <link rel="stylesheet" href="Css\login.css">
</head>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <form action="Cadastrovalida.php" method="POST">
    <?php
    session_start();

    if(isset($_SESSION["usuario"])){
      header("Location: inicio.php?msg=JaLogado");
  }

if(isset($_SESSION["errocadastro"])) {
  if($_SESSION["errocadastro"] == 1) {
      echo "<span style='color:red;text-align:center;'>Email Já Cadastrado</span>";
      $_SESSION["errocadastro"] = 0;
  }  
}

if(isset($_SESSION["errosenha"])) {
  if($_SESSION["errosenha"] == 1) {
      echo "<span style='color:red;text-align:center;'>Senhas Diferentes</span>";
      $_SESSION["errosenha"] = 0;
  }  
}
?>
      <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Nome">
      <input type="text" id="email" class="fadeIn third" name="email" placeholder="E-mail">
      <input type="text" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
      <input type="text" id="senha2" class="fadeIn third" name="senha2" placeholder="Senha Novamente">
      <input type="submit" class="fadeIn fourth" value="Cadastrar">
    </form>

  </div>
</div>


<!-- md5 na senha