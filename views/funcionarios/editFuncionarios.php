
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alteração de Funcionários</title>

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
</head>
<body>
<div class="cp_cont">

	<?php
	session_start();

		if(!isset($_SESSION['data'])){
			header("location:../../index.php");
			$_SESSION['msg']="Erro ao acessar o formulário!";
		}

		if(isset($_SESSION['erro'])){
			foreach ($_SESSION['erro'] as $value) {
				echo "<p>".$value."</p>";
			}

			unset($_SESSION['erro']);

		}

		if(isset($_SESSION['msg'])){
			echo "<p>".	$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
		}

		foreach ($_SESSION['data'] as  $value) {
			extract($value);
		}
		
		unset($_SESSION['data']);

	?>
	
	<div class="cp_top">
		<h1>Alterar Funcionário</h1>
		<a href="./index.php">Voltar</a>
	</div>

	<div class="cp_form">
		<form method="POST" action="../../controllers/controllerFuncionario.php?acao=update">
			<input type="hidden" name="id" value="<?= $id;?>">
				<label class="rt">Nome:
		<input type="text" class="cp_text" name="nome" value="<?= $nome;   ?>">	
				</label>

				<label class="rt">CPF:
					<input type="text" class="cp_text" name="cpf" value="<?= $cpf;   ?>">	
				</label>

				
				<input type="submit" name="enviar" value="Salvar" class="bt_save">	 
		</form>
	</div>

</div>
</body>
</html>