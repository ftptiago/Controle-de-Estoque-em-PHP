<?php
require_once '../auth.php';

$idProduto = $_GET['id'];

if (isset($_GET['remover']) && $_GET['remover'] == "carrinho") {

	$idProduto = $_GET['id'];

	unset($_SESSION['itens'][$idProduto]);

	echo "<meta http-equiv='refresh' content='0;URL=../../views/vendas/'>";
}
