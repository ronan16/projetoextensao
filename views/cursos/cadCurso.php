
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Cursos</title>

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
		<h1>Cadastro de Curso</h1>
		<a href="../funcionarios/index.php">Voltar</a>
	</div>

	<div class="cp_form">
		<form method="POST" action="../../controllers/controllerCurso.php?acao=create">
				<label class="rt">Nome:
		<input type="text" class="cp_text" name="nome" value="<?= (isset($nome))?$nome:'';   ?>">	
				</label>

				<label class="rt">Descrição:
		<input type="text" class="cp_text" name="descricao" value="<?= (isset($descricao))?$descricao:'';   ?>">	
				</label>

				<label class="rt">Carregar Foto:
		<input type="file" name="imagem" accept="image/png, image/jpeg" value="<?= (isset($imagem))?$imagem:'';   ?>">	
				</label>
				
				<input type="submit" name="enviar" value="Salvar" class="bt_save">	 
		</form>
	</div>

</div>
</body>
</html>