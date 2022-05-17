<?php
include_once('../conect.php');
//var_dump($_POST);
if(isset($_REQUEST['acao'])){

$acao=$_REQUEST['acao'];

	switch ($acao) {
		case 'index':
			$listaCursos=$db->prepare("SELECT * FROM cursos ");
			$listaCursos->execute();
			$listaServicos=$db->prepare("SELECT * FROM servicos ");
			$listaServicos->execute();
			session_start();

			if($listaCursos->rowCount()>0){	
				$_SESSION['dataCurso']=$listaCursos->fetchAll();
				$_SESSION['data2']=$listaServicos->fetchAll();
				header('location:../servicos.php');
			}
			break;
			case 'principal':
				$listaCursos=$db->prepare("SELECT * FROM cursos ");
				$listaCursos->execute();
				
				session_start();
	
				if($listaCursos->rowCount()>0){	
					$_SESSION['dataCurso']=$listaCursos->fetchAll();
					header('location:../index.php');
				}
				break;
			case 'nossa_empresa':
				$listaCursos=$db->prepare("SELECT * FROM cursos ");
				$listaCursos->execute();
				
				session_start();
	
				if($listaCursos->rowCount()>0){	
					$_SESSION['dataCurso']=$listaCursos->fetchAll();
					header('location:../nossa_empresa.php');
				}
				break;
			case 'agendamentos':
				$listaCursos=$db->prepare("SELECT * FROM cursos ");
				$listaCursos->execute();
				
				session_start();
	
				if($listaCursos->rowCount()>0){	
					$_SESSION['dataCurso']=$listaCursos->fetchAll();
					header('location:../agendamento.php');
				}
				break;
			case 'contatos':
				$listaCursos=$db->prepare("SELECT * FROM cursos ");
				$listaCursos->execute();
				
				session_start();
	
				if($listaCursos->rowCount()>0){	
					$_SESSION['dataCurso']=$listaCursos->fetchAll();
					header('location:../contatos.php');
				}
				break;
			

		default:
		//header('location:../index.php');
		break;
	}

}
