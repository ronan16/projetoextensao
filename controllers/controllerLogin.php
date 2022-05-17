<?php
include_once('../conect.php');



if ( $post= filter_input_array(INPUT_POST) ) {
		extract($post);
		$senha=sha1($senha);

       $sql = $db->prepare("SELECT *FROM funcionarios WHERE 
       						cpf='$login' and senha='$senha' ");
       $sql->execute();

       if($sql->rowCount()==1){
       		session_start();
       		$resultado=$sql->fetch();

       		$_SESSION['usuario']=$resultado['nome'];
       		$_SESSION['id']=$resultado['id'];
			   $_SESSION['nivel']=$resultado['nivel'];
       		header('location:../views/funcionarios/index.php?cod=200');

       }else{
       		session_start();
       		$_SESSION['msg']="Usuário ou senha não conferem!";

       		header('location:../views/funcionarios/loginFuncionario.php?cod=400');
       }



}else if(isset($_GET['acao'])){
		session_start();
		if($_GET['acao']=='sair'){
			session_destroy();
			header('location:..//views/funcionarios/loginFuncionario.php?cod=202');
		}

}else{
			session_start();
       		$_SESSION['msg']="Acesso não autorizado!";
			header('location:../views/funcionarios/loginFuncionario.php?cod=404');
}


?>

