
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alteração de Serviços</title>

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

	if(isset($_SESSION['data']) && isset($_SESSION['dataCurso'])){
		$data=$_SESSION['data'];
		unset($_SESSION['data']);

		$data2=$_SESSION['dataCurso'];
		unset($_SESSION['dataCurso']);
	}




	?>

	<div class="cp_top">
		<h1>Alteração de Serviço</h1>
		<a href="../funcionarios/index.php">Voltar</a>
	</div>

	<?php foreach($data as $value){
		extract($value);
		?>

	<div class="cp_form">
			<form method="POST" action="../../controllers/controllerServico.php?acao=update">
			<input type="hidden" name="id" value="<?= $id_servico;?>">
					<label class="rt">Nome:
			<input type="text" class="cp_text" name="nome" value="<?= (isset($nome_servico))?$nome_servico:'';   ?>">	
					</label>

					<label class="rt">Descrição:
			<input type="text" class="cp_text" name="descricao" value="<?= (isset($descricao_servico))?$descricao_servico:'';   ?>">	
					</label>

					<label class="rt">Curso:
						<select class="cp_select" name="curso" id="curso">
						
							<?php foreach ($data2 as $value2) {
								extract($value2); 
							?>	
						<option value="<?= $id_curso; ?>"> <?= $nome_curso; ?></option>	
						<?php  }  ?>

	<?php
		}
	?>

				</select>
			</label>
			
			<input type="submit" name="enviar" value="Salvar" class="bt_save">	 
		</form>
	<div class="cp_form">

</div>
</body>
</html>