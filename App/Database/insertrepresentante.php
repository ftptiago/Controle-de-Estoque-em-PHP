<?php
require_once '../auth.php';
require_once '../Models/representante.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

//--Representante--//
$NomeRepresentante = $_POST['NomeRepresentante'];
$TelefoneRepresentante = $_POST['TelefoneRepresentante'];
$EmailRepresentante = $_POST['EmailRepresentante'];
$idFabricante = $_POST['idFabricante'];



if($idUsuario != NULL && $idFabricante != NULL && $NomeRepresentante != NULL && $TelefoneRepresentante != NULL && $EmailRepresentante != NULL){

		if (isset($_POST['idRepresentante'])){

			$idRepresentante = $_POST['idRepresentante'];

						$representante->UpdateRepresentante($idRepresentante, $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idUsuario);		
			
		}elseif($_POST['iduser'] == $idUsuario){
			
			$representante->InsertRepresentante($NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idFabricante, $idUsuario);
		}

	}else{
		header('Location: ../../views/representante/index.php?alert=3');
	}


 }else{
	header('Location: ../../views/representante/index.php');
}