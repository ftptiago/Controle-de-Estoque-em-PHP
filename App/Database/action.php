<?php
require_once '../../App/auth.php';
var_dump($_POST);

if(isset($_POST['status'])!=null){

	$tabela = $_POST['tabela'];

require_once '../../App/Models/'.$tabela.'.class.php';

		$id = $_POST['id'];
		
		$value = $_POST['status'];		
				
		$ob = new $tabela;
		$ob->Ativo($value, $id);
				
	}else{
		echo 'error no status';
		
	}