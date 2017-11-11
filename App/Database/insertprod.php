<?php
require_once '../auth.php';
require_once '../Models/produtos.class.php';

	if(isset($_POST['update']) == 'Cadastrar'){

		$nomeProduto = $_POST['nomeProduto'];

		$iduser = $_POST['iduser'];

		if($nomeProduto != NULL){

			if(isset($_POST['id']) != NULL && $idUsuario != NULL){
				$id = $_POST['id'];
				$produtos->UpdateProd($id, $nomeProduto, $idUsuario);
			}elseif($iduser == $idUsuario){
				$produtos->InsertProd($nomeProduto, $idUsuario);
			}
			


		}else{
			header('Location: ../../views/prod/index.php?alert=0');
		}

	}else{
		header('Location: ../../views/prod/index.php');
	}
