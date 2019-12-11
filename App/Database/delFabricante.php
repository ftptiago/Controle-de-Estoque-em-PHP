<?php
require_once '../auth.php';
require_once '../Models/fabricante.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

$idFabricante = $_POST['idFabricante'];

$fabricante->DelFabricante($idFabricante, $perm);

}else{
	header('Location: ../../views/fabricante/index.php');
}

?>
