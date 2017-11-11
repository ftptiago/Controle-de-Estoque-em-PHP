<?php
require_once '../auth.php';
require_once '../Models/produtos.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

$id = $_POST['id'];

$produtos->DelProdutos($id);

}else{
	header('Location: ../../views/prod/');
}

?>