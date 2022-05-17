<?php
 
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">


    <title>Junior Consultoria</title>
  </head>
  <body>
    

<div class="container body">

  <div  >
      <h3>
        <?php
          session_start();
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
          }
          unset($_SESSION['msg']);
        ?>
      </h3>
  </div>
  <div class="row justify-content-center ">
    <div class="col-6 form-login ">
      <div class="row">
        <h1 >Junior Consultoria Login</h1>
      </div>
      <form class="row form" action="../../controllers/controllerLogin.php" method="post" >
        <div class="col">
          <div class="mb-3">
            <label for="login" class="form-label">Login CPF:</label>
            <input type="text" class="form-control" maxlength="11" id="login" name="login">
            <div id="login" class="form-text">Preencha seu CPF sem pontos.</div>
          </div>  
          <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
            <div id="senha" class="form-text">Preencha sua senha.</div>
          </div>
          <div class="row">
            <div class="d-grid col-6 mx-auto">
              <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
            </div>
          </div>  
        </div>  
      </form>
    </div>
  </div>  
  
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>