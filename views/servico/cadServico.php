
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Serviços</title>

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
</head>
<body>
<div class="cp_cont">

	<?php
	session_start();
	if(isset($_SESSION['data'])){

		$data=$_SESSION['data'];
		unset($_SESSION['data']);
	}else{
		if(!isset($_SESSION['msg'])){
			header('location:../../controllers/controllerServico.php?acao=index');
			exit;
		}	
	}
	?>

	<div class="cp_top">
		<h1>Cadastro de Serviço</h1>
		<a href="../funcionarios/index.php">Voltar</a>
	</div>

	<div class="cp_form">
		<form method="POST" action="../../controllers/controllerServico.php?acao=create">
				<label class="rt">Nome:
		<input type="text" class="cp_text" name="nome" value="<?= (isset($nome))?$nome:'';   ?>">	
				</label>

				<label class="rt">Descrição:
		<input type="text" class="cp_text" name="descricao" value="<?= (isset($descricao))?$descricao:'';   ?>">	
				</label>

				<label class="rt">Curso:
					<select class="cp_select" name="curso" id="curso">
						<?php foreach ($data as $value) {
							extract($value); 
						?>	
						<option value="<?= $id_curso; ?>"> <?= $nome_curso; ?></option>	
						<?php  }  ?>

					</select>
				</label>
				
				<input type="submit" name="enviar" value="Salvar" class="bt_save">	 
		</form>
	</div>
</div>
</body>
</html>