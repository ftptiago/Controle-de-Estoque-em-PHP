<?php
require_once '../auth.php';
require_once('../Models/cliente.class.php');

$index = new Cliente;
 
if($_POST["query"]){

	$resp = $index->search($_POST["query"]);
			//$users = json_decode($resp , true);
			//print_r($resp);
	echo '<ul id="pesqcpf" class="list-unstyled ulcpf">';
	if($resp == 0){
		echo '<li class="licpf">Nenhum resultado encontrado!</li>';
	}else{

		foreach ($resp['data'] as $user){
			echo  '<li id="li['. $user['idCliente'] .']" class="licpf">'. $user['cpfCliente'] .' - '. $user['NomeCliente'] . '</li>';
		}
		echo '</ul>';
	}
}

?>