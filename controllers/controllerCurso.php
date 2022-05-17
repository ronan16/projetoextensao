<?php
include_once('../conect.php');
//var_dump($_POST);

if(isset($_REQUEST['acao'])){

	$acao=$_REQUEST['acao'];

	switch($acao){
		case 'create':

			if(	$post=filter_input_array(INPUT_POST)){
				$categorias = $db->prepare("INSERT INTO cursos (nome_curso, descricao_curso, imagem) VALUES (?,?,?)");
				$categorias->bindParam(1, $nome);
				$categorias->bindParam(2, $descricao);
				$categorias->bindParam(3, $imagem);

				
				extract($post);


				if(strlen($nome)<3){
					$erro[]="O nome do curso deve conter mais de 3 caracteres!";
				}

				//valida se a categoria ja existe no banco!
				$catBusca=$db->prepare("SELECT *FROM cursos WHERE nome_curso = '$nome'");
				$catBusca->execute();

				if($catBusca->rowCount()>0){
					$erro[]="Curso já existente!";
				}


				session_start();
			if(isset($erro)){	
				$_SESSION['erro']=$erro;	
				$_SESSION['data']=$post;
				header('location:../views/cursos/cadCurso.php?cod=404');
			}else{
				$categorias->execute();
				if($categorias->rowCount()>=1){
					$_SESSION['msg']="Categoria cadastrado com sucesso!";
					header('location:../views/cursos/cadCurso.php?cod=200');
				
				}else{
					$_SESSION['msg']="Falha ao gravar categorias no banco!";
					header('location:../views/cursos/cadCurso.php?cod=500');
					}

				}

			}
			break;
	
		case 'delete':
			$id_curso=filter_input(INPUT_GET, 'id_curso');

			$deleteCurso=$db->prepare("DELETE FROM cursos WHERE id_curso=$id_curso");
			$deleteCurso->execute();
			session_start();
			if($deleteCurso->rowCount()>0){
				$_SESSION['msg']="Curso excluido!";
				header('location:../views/funcionarios/index.php?cod=200');
			}else{
				$_SESSION['msg']="Nenhum Curso excluido!";
				header('location:../views/funcionarios/index.php?cod=400');
			}
			break;
		
		case 'edit':
			$id_curso=filter_input(INPUT_GET,'id_curso');
			$editCurso=$db->prepare("SELECT * FROM cursos WHERE id_curso=$id_curso");
			$editCurso->execute();
			if($editCurso->rowCount()>0){
				session_start();
				$_SESSION['data']=$editCurso->fetchAll();
				header('location:../views/cursos/editCurso.php?cod=200');
			}else{
				session_start();
				$_SESSION['msg']="Código de Funcionário inválido!";
				header("location:../views/funcionarios/index.php?cod=404");
			}


			break;

			case 'update':
				// Atualizar os dados no banco
					if(	$post=filter_input_array(INPUT_POST)){
						extract($post);
						$updateCurso = $db->prepare("UPDATE cursos SET 
								nome_curso='$nome', descricao_curso='$descricao', imagem='$imagem' WHERE id_curso=$id;");
		
						$updateCurso->execute();
						session_start();
						if($updateCurso->rowCount()>=1){
								
								$_SESSION['msg']="Funcionário Alterado com sucesso!";
								header('location:../views/funcionarios/index.php?cod=200');
							
						}else{
							$_SESSION['msg']="Falha ao alterar funcionário no banco!";
							header('location:../views/funcionarios/index.php?cod=500');	
						}
						
					}
					break;



	}
}