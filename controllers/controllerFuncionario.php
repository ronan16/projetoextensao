<?php
include_once('../conect.php');
//var_dump($_POST);
if(isset($_REQUEST['acao'])){

$acao=$_REQUEST['acao'];

	switch ($acao) {
		case 'index':
			$listaFunc=$db->prepare("SELECT * FROM funcionarios ");
			$listaFunc->execute();
			$listaCurso=$db->prepare("SELECT * FROM cursos");
			$listaCurso->execute();
			$listaServicos=$db->prepare("SELECT * FROM servicos ");
			$listaServicos->execute();
			session_start();

			if($listaFunc->rowCount()>0){	
				$_SESSION['data']=$listaFunc->fetchAll();
				$_SESSION['dataCurso']=$listaCurso->fetchAll();
				$_SESSION['dataServico']=$listaServicos->fetchAll();
				header('location:../views/funcionarios/index.php');
			}else{
				$_SESSION['msg']="Nenhum Funcionário encontrado!";
				header('location:../views/funcionarios/index.php');
			}

			break;
		case 'create':
			// cadastrar os dados no banco
			
			if(	$post=filter_input_array(INPUT_POST)){


				$funcionarios = $db->prepare("INSERT INTO funcionarios 
						(nome, cpf, senha ) 
						VALUES (?,?,? )");

				$funcionarios->bindParam(1, $nome);
				$funcionarios->bindParam(2, $cpf);
				$funcionarios->bindParam(3, $senha);
				
				extract($post);

				if($senha<>$cfsenha){
					//senhas são diferentes
					$erro[]="A senha e a confirmação são diferentes!";
					
				}else{
					$senha=sha1($senha);
				}
				
				if(strlen($cpf)<>11){
					$erro[]="CPF Inválido!";
				}


				session_start();

				if(isset($erro)){
					unset($post['senha'],$post['cfsenha']);
					$_SESSION['erro']=$erro;	
					$_SESSION['data']=$post;
					header('location:../views/funcionarios/cadFuncionarios.php?cod=404');
				
				}else{

					
					$funcionarios->execute();
					if($funcionarios->rowCount()>=1){

						$_SESSION['msg']="Funcionário cadastrado com sucesso!";
						header('location:../views/funcionarios/cadFuncionarios.php?cod=200');
					
					}else{
						$_SESSION['msg']="Falha ao gravar funcionário no banco!";
						header('location:../views/funcionarios/cadFuncionarios.php?cod=500');	
					}
				}
			}

			break;
		case 'delete':
			
			$id=filter_input(INPUT_GET,'id');	

			$deleteFunc=$db->prepare("DELETE FROM funcionarios WHERE id=$id");
			$deleteFunc->execute();
			session_start();
			if($deleteFunc->rowCount()>0){
				$_SESSION['msg']="Funcionário excluido!";
				header('location:../views/funcionarios/index.php?cod=200');
			}else{
				$_SESSION['msg']="Nenhum Funcionário excluido!";
				header('location:../views/funcionarios/index.php?cod=400');
			}
			break;	
		case 'select':

			$busca=filter_input(INPUT_GET,'busca');
			$selectFunc=$db->prepare("SELECT *FROM funcionarios WHERE nome LIKE '%$busca%' LIMIT 10 ");
			$selectFunc->execute();
			if($selectFunc->rowCount()>0){
				session_start();
				$_SESSION['data']=$selectFunc->fetchAll();
				header('location:../views/funcionarios/index.php');
			}else{
				session_start();
				$_SESSION['msg']="Não foram encontrados registros para a busca \" $busca \" ";
				header('location:../views/funcionarios/index.php?erro=404');
			}
			
			break;
		case 'edit':
			$id=filter_input(INPUT_GET,'id');
			$editFunc=$db->prepare("SELECT *FROM funcionarios WHERE id=$id");
			$editFunc->execute();
			if($editFunc->rowCount()>0){
				session_start();
				$_SESSION['data']=$editFunc->fetchAll();
				header('location:../views/funcionarios/editFuncionarios.php?cod=200');
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
				$funcUpdate = $db->prepare("UPDATE funcionarios SET 
						nome='$nome', cpf='$cpf' WHERE id=$id;");

				$funcUpdate->execute();
				session_start();
				if($funcUpdate->rowCount()>=1){
						
						$_SESSION['msg']="Funcionário Alterado com sucesso!";
						header('location:../views/funcionarios/index.php?cod=200');
					
				}else{
					$_SESSION['msg']="Falha ao alterar funcionário no banco!";
					header('location:../views/funcionarios/index.php?cod=500');	
				}
				
			}
			break;


		default:
		header('location:../painel.php');
			break;
	}

}else{
	header('location:../painel.php');
}



