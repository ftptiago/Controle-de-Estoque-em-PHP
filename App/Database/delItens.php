<?php
require_once '../auth.php';
require_once '../Models/itens.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

$idItens = $_POST['id'];

$itens->DelItens($idItens);

}else{
	header('Location: ../../views/itens/');
}

?>