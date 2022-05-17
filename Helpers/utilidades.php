<?php

	function dataUs($data){
		//    17/11/2021    2021-11-17
		$dt=explode('/',$data);
		$data=$dt[2]."-".$dt[1]."-".$dt[0];
		return $data;

	}

	function dataBr($data){
	//  2021-11-17   17/11/2021    
	$dt=explode('-',$data);
	$data=$dt[2]."/".$dt[1]."/".$dt[0];
	return $data;

	}

	function validaAcesso($nivel=0){

		if($nivel==0){
			if(!isset($_SESSION['usuario'])){
				$_SESSION['msg']="Acesso não autorizado!";
				return false;
				
			}
		}
		
		if($nivel >0){
			if( $_SESSION['nivel']< $nivel ){
				$_SESSION['msg']="Acesso não autorizado!";
				return true;
			}
			

		}

		return false;

	}