<?php
session_start(); //Iniciando a sessão

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])){

 			header('Location: ../');
}else{

	$idUsuario = $_SESSION["idUsuario"]; 
	$usuario   = $_SESSION["usuario"];
	$perm	   = $_SESSION["perm"];
	$foto      = $_SESSION["foto"];

}

?>