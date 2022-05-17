<!doctype html>
<?php

	session_start();
	if(isset($_SESSION['dataCurso']) && isset($_SESSION['data2']) ){

		$data=$_SESSION['dataCurso'];
		unset($_SESSION['dataCurso']);
        $data2=$_SESSION['data2'];
		unset($_SESSION['data2']);
	}else{
		header('location:./controllers/controllerIndex.php?acao=index');
		exit;
	}
?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Univale Junior</title>
  </head>
  <body style="height: 100vh; font-weight: bold;">

    <header class="d-flex flex-row align-items-center" style="background-color:  #002B7B; color: white;">
        <a href="index.php"><img src="img/logo.png" class="img-fluid" style="width: 150px;"/></a>   
        <h1>Junior<br>Consultoria</h1>
        <div class="w-100 d-flex justify-content-end">
            <button class="btn btn-light me-3" style="border-radius: 25px;"><i class="bi bi-person-fill"></i><a href="views/funcionarios/loginFuncionario.php"> Administrativo </a></button>
        </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-light bg-light mb-5" style="background-color:  #002B7B; border-bottom:solid; border-color:#002B7B;">
        <div class="container-fluid ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"   aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container px-5 d-flex flex-column align-items-end text-end">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="nossa_empresa.php">Nossa Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="servicos.php">Serviços Realizados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="agendamento.php">Agendamento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container ">
        
	<?php foreach ($data as $value) {
		extract($value); 
	?>
        <div class="row container"style="border-width: medium; border-style: solid; border-radius: 25px; border-color:#002B7B ;">
            <div class="col-6 mt-3 px-5 d-flex flex-column align-items-center text-end">
                <img src="img/<?= $imagem; ?>" class="img-fluid" style="width: 200px;"/>
            </div>
            <div class="col-6 ">
                <div class="px-5 mt-3 d-flex flex-column">
                    <div class="text-center" id="<?= $nome_curso; ?>"><h5> <?= $nome_curso; ?></h5></div>
                    <ul>
                    <?php foreach ($data2 as $value2) {
                        extract($value2); 
                        if($fk_cursos == $id_curso ){
                    ?>

                        <li><?= $nome_servico; ?></li>
                    <?php  
                        }
                    }  
                    ?>
                    </ul>       
                </div>
            </div>
            <div class="row container px-5 mb-2 d-flex flex-column align-items-center text-end">
                <div class="d-grid gap-2 col-6 mx-auto">
                  <a class="btn btn-warning" href="./agendamento.php">Realize seu agendamento já!</a>
                </div>
            </div>
        </div>
        <br>
        <?php  
        }
        ?>
        
        

    <footer style="background-color:  #002B7B; color: white;">
        <div class="row mt-5">
            <div class="col-3 px-5">
                <h5> Cursos Afiliados</h5>
                
               
                <ul style="list-style: none;">

                <?php foreach ($data as $value) {
		          extract($value); 
	             ?>
                
                    <a href="#"style="text-decoration: none; color: white;"><li> <?= $nome_curso; ?> </li></a>
                    <!-- <a href="#"style="text-decoration: none; color: white;"><li>Análise de Sistemas</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li>Contabilidade</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li>Curso X</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li>Curso X</li></a> -->
                    
                </ul> 

                <?php  
                 }
                 ?> 
                     
            </div>

           
        
            <div class="col-3 px-5">
                <h5> Entre em contato</h5>
                <ul style="list-style: none;" >
                    <li>Fone: (00) 0000-0000</li>
                    <li>E-mail: teste@univale.com</li>
                </ul>       
            </div>
            <div class="col-3 px-5">
                <h5> Redes sociais</h5>
                <ul style="list-style:none;">
                    <a href="#"style="text-decoration: none; color: white;"><li><i class="bi bi-facebook"></i>  Facebook</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li><i class="bi bi-instagram"></i> Instagram</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li><i class="bi bi-twitter"></i> Twitter</li></a>
                    <a href="#"style="text-decoration: none; color: white;"><li><i class="bi bi-linkedin"></i> Linkedin</li></a>
                </ul>       
            </div>
            <div class="col-3 px-5 d-flex flex-column align-items-center text-end">
                <img src="img/logo.png" class="img-fluid"style="width: 150px;">
                <p style="font-size: 12px;">Av. Qualquer, 000. Ivaiporã-PR<br>Fone: (00) 0000-0000</p>                   
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
  </body>
</html>