
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Funcionários</title>

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
</head>
<body>

<div class="cp_cont">

	<?php
	session_start();

		if(isset($_SESSION['erro'])){
			foreach ($_SESSION['erro'] as $value) {
				echo "<p>".$value."</p>";
			}
			extract($_SESSION['data']);

			unset($_SESSION['erro'],$_SESSION['data']);

		}

		if(isset($_SESSION['msg'])){
			echo "<p>".	$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
		}

	?>
	<div class="cp_top">
		<h1>Cadastro de Funcionários</h1>
		<a href="index.php">Voltar</a>
	</div>

	<div class="cp_form">
		<form method="POST" action="../../controllers/controllerFuncionario.php?acao=create">
				<label class="rt">Nome:
		<input type="text" class="cp_text" name="nome" value="<?= (isset($nome))?$nome:'';   ?>">	
				</label>
				<label class="rt">CPF:
					<input type="text" class="cp_text" name="cpf" maxlength="11" value="<?= (isset($cpf))?$cpf:'';   ?>">	
				</label class="rt">
				<label class="rt">Senha:
					<input type="password" class="cp_text" name="senha">
				</label>
				<label class="rt">Confirmar Senha:
					<input type="password" class="cp_text" name="cfsenha">
				</label>
				<input type="submit" name="enviar" value="Salvar" class="bt_save">	 
		</form>
	</div>

</div>
</body>
</html>