<?php
	include_once('../../Helpers/utilidades.php');

	session_start();
	if(isset($_SESSION['data']) && isset($_SESSION['dataCurso']) && isset($_SESSION['dataServico'])){

		$data3=$_SESSION['dataServico'];
		unset($_SESSION['dataServico']);
		$data2=$_SESSION['dataCurso'];
		unset($_SESSION['dataCurso']);
		$data=$_SESSION['data'];
		unset($_SESSION['data']);
	}else{
		header('location:../../controllers/controllerFuncionario.php?acao=index');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home de Funcionários </title>

	<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

</head>
<body>
	<div class="cp_cont">
		<?php
			if(isset($_SESSION['msg'])){
				$msg=$_SESSION['msg'];
				unset($_SESSION['msg']);
		?>


		<div style="background: green; color:#fff ;">
			<p>
				<span>Atenção:</span>
				<?= $msg ?>
			</p>	
		</div>
		<?php
			}
		?>	

		<div class="cp_top">
			<h1>Home Funcionarios</h1>
			<a href="../../index.php">Painel</a> |
			<a href="cadFuncionarios.php">Novo Funcionário</a> |
			<a href="../cursos/cadCurso.php">Novo Curso</a> |
			<a href="../servico/cadServico.php">Novo Serviço</a>
		</div>

		
	
	<form action="../../controllers/controllerFuncionario.php" method="GET">
		<div class="cp_busca">
			<input type="hidden" name="acao" value="select">
			<label for="busca" class="rt">Buscar: </label>
				<input type="text" name="busca" placeholder="O que deseja buscar?" class="cp_text" id="busca">
				<input type="submit" value="Buscar" class="bt_busca">
			
		</div>
	</form>

	<div class="cp_tabela">
		<h2>Funcionarios</h2>
			<table border="2" class="tabela">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>Alterar</th>
						<th>Excluir</th>
					</tr>
				<thead>
			<?php foreach ($data as $value) {
				extract($value); 
			?>		
				<tr>
					<td> <?= $id; ?> </td>
					<td><?= $nome; ?></td>
					<td><?= $cpf; ?></td>

					<td><a href="../../controllers/controllerFuncionario.php?acao=edit&id=<?= $id;?>">Alterar</a></td>
					<td><a href="../../controllers/controllerFuncionario.php?acao=delete&id=<?= $id;?>">Excluir</a></td>
				</tr>

			<?php  }  ?>

			</table>
	</div>

	<div class="cp_tabela">
		<h2>Cursos</h2>

		<table border="2" class="tabela">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome do Curso</th>
				<th>Descrição</th>
				<th>Nome Imagem</th>
				<th>Alterar</th>
				<th>Excluir</th>
			</tr>
		</thead>
			<?php  
				foreach ($data2 as $value2) {
				extract($value2); 
			?>		
			<tr>
				<td> <?= $id_curso; ?> </td>
				<td><?= $nome_curso; ?></td>
				<td><?= $descricao_curso; ?></td>
				<td><?= $imagem; ?></td>
				<td><a href="../../controllers/controllerCurso.php?acao=edit&id_curso=<?= $id_curso;?>">Alterar</a></td>
				<td><a href="../../controllers/controllerCurso.php?acao=delete&id_curso=<?= $id_curso;?>">Excluir</a></td>
			</tr>

			<?php  }  ?>

		</table>

		</table>
	</div>

	<div class="cp_tabela">
		<h2>Serviços</h2>

		<table border="2" class="tabela">
		<thead>
			<tr>
				<th>Curso</th>
				<th>Nome Serviço</th>
				<th>Descrição</th>
				<th>Alterar</th>
				<th>Excluir</th>
			</tr>
		</thead>

			<?php  
				foreach ($data2 as $value2) {
				extract($value2); 
			?>
					<?php  
						foreach ($data3 as $value3) {
						extract($value3); 
						if($fk_cursos == $id_curso ){
					?>		
					<tr>
						<td> <?= $nome_curso; ?> </td>
						<td><?= $nome_servico; ?></td>
						<td><?= $descricao_servico; ?></td>
						<td><a href="../../controllers/controllerServico.php?acao=edit&id_servico=<?= $id_servico;?>">Alterar</a></td>
						<td><a href="../../controllers/controllerServico.php?acao=delete&id_servico=<?= $id_servico;?>">Excluir</a></td>
					</tr>
							<?php } ?>
					<?php  }  ?>
			
			<?php  }  ?>
		</table>
	
	</div>


</body>
</html>