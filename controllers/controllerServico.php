<?php
include_once('../conect.php');
//var_dump($_POST);
if(isset($_REQUEST['acao'])){

$acao=$_REQUEST['acao'];

	switch ($acao) {
		case 'index':
			$listaCursos=$db->prepare("SELECT * FROM cursos ");
			$listaCursos->execute();
			session_start();

			if($listaCursos->rowCount()>0){	
				$_SESSION['data']=$listaCursos->fetchAll();
				header('location:../views/servico/cadServico.php');
			}else{
				$_SESSION['msg']="Nenhum Serviço encontrado!";
				header('location:../views/servico/cadServico.php');
			}


			break;
		case 'create':
			// cadastrar os dados no banco
			
			if(	$post=filter_input_array(INPUT_POST)){
				$servicos = $db->prepare("INSERT INTO servicos (nome_servico, descricao_servico, fk_cursos) VALUES (?,?,? )");
				$servicos->bindParam(1, $nome);
				$servicos->bindParam(2, $descricao);
				$servicos->bindParam(3, $curso);
				
				extract($post);


				if(strlen($nome)<3){
					$erro[]="O nome do serviço deve conter mais de 3 caracteres!";
				}

				//valida se a categoria ja existe no banco!
				$catBusca=$db->prepare("SELECT * FROM servicos WHERE nome_servico = '$nome'");
				$catBusca->execute();

				if($catBusca->rowCount()>0){
					$erro[]="Serviço já existente!";
				}
			


				session_start();
			if(isset($erro)){	
				$_SESSION['erro']=$erro;	
				$_SESSION['data']=$post;
				header('location:../views/servico/cadServico.php?cod=404');
			}else{
				$servicos->execute();
				if($servicos->rowCount()>=1){
					$_SESSION['msg']="Serviço cadastrado com sucesso!";
					header('location:../views/funcionarios/index.php');
				
				}else{
					$_SESSION['msg']="Falha ao gravar servicos no banco!";
					header('location:../views/funcionarios/index.php');
				}

			}
			}
			break;

		case 'delete':
			$id_servico=filter_input(INPUT_GET,'id_servico');

			$deleteServico=$db->prepare("DELETE FROM servicos WHERE id_servico=$id_servico");
			$deleteServico->execute();
			session_start();
			if($deleteServico->rowCount()>0){
				$_SESSION['msg']="Serviço excluido!";
				header('location:../views/funcionarios/index.php?cod=200');
			}else{
				$_SESSION['msg']="Nenhum Serviço excluido!";
				header('location:../views/funcionarios/index.php?cod=400');
			}
			break;

		case 'edit':
			$id_servico=filter_input(INPUT_GET,'id_servico');
			$editServico=$db->prepare("SELECT *FROM servicos WHERE id_servico=$id_servico");
			$editServico->execute();
			$listaCursos=$db->prepare("SELECT * FROM cursos ");
			$listaCursos->execute();
			if($editServico->rowCount()>0){
				session_start();
				$_SESSION['dataCurso']=$listaCursos->fetchAll();
				$_SESSION['data']=$editServico->fetchAll();
				header('location:../views/servico/editServico.php?cod=200');
			}else{
				session_start();
				$_SESSION['msg']="Código de Funcionário inválido!";
				header("location:../views/funcionarios/index.php?cod=404");
			}
			break;

		case 'update':
			if( $post=filter_input_array(INPUT_POST)){
				extract($post);
				$servicoUpdate = $db->prepare("UPDATE servicos SET nome_servico = '$nome', descricao_servico='$descricao', fk_cursos='$curso' WHERE id_servico='$id'");

				$servicoUpdate->execute();
				session_start();

				if($servicoUpdate->rowCount()>=1){
					$_SESSION['msg']="Serviço Alterado com sucesso!";
					header('location:../views/funcionarios/index.php?cod=200');
				}else{
					$_SESSION['msg']="Falha ao alterar Serviço no banco!";
					header('location:../views/funcionarios/index.php?cod=500');	
				}
			}
			break;
		default:
		header('location:../painel.php');
			break;
	}










}

