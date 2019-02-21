<?php
require_once '../auth.php';
require_once '../Models/cliente.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$NomeCliente = $_POST['NomeCliente'];

//---Fabricante---//
$cpfCliente = $_POST['cpfCliente'];
$EmailCliente = $_POST['EmailCliente'];

//--Representante--//

$cliente = new Cliente;

if($NomeCliente != NULL && $cpfCliente != NULL && $EmailCliente != NULL){

		if (!isset($_POST['idCliente'])){

			$result = $cliente->InsertCliente($NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm);
		

	}else{
			$idCliente = $_POST['idCliente'];
			$result = $cliente->UpdateCliente($idCliente, $NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm);		
			
		}
			$_SESSION['alert'] = $result;
			header('Location: ../../views/cliente/index.php');

	}else{
			header('Location: ../../views/cliente/index.php?alert=3');
		}
		
	
 }else{
	header('Location: ../../views/cliente/index.php');
}