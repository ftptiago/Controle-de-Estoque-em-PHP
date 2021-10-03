<?php

require_once '../auth.php';
require_once '../Models/usuario.class.php';

if(isset($_POST['passAtual']) != NULL && isset($_POST['password']) != NULL && isset($_POST['rpassword']) !=NULL){

$passAtual  = $_POST['passAtual'];
$password   = $_POST['password'];
$rpassword  = $_POST['rpassword'];

if(!strcmp($password, $rpassword)){

$resp = $usuario->trocaSenha($passAtual, $password, $idUsuario);

}else{
	$resp = 0;
}

}else{
	$resp = 0;
}

$_SESSION['alert'] = $resp;
	header('Location: ../../views/usuarios/profile.php');
