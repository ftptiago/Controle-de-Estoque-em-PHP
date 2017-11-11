<?php
require_once '../auth.php';
require_once '../Models/representante.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

$id = $_POST['idRepresentante'];

$representante->DelRepresentante($id);

}else{
	header('Location: ../../views/representante/index.php');
}

?>