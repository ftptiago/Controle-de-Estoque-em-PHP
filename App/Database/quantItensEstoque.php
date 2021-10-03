<?php
require_once '../../App/auth.php';
require_once '../../App/Models/relatorios.class.php';

if(isset($_POST['produto']) != NULL){
	$idProduto = $_POST['produto'];

	$relatorio = new Relatorio();

	return $relatorio->qtdeItensEstoque($perm, $idProdutos);
}
?>
