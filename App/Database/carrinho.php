<?php
require_once '../auth.php';
require_once '../../App/Models/vendas.class.php';

if(!isset($_SESSION['itens']))
{
	$_SESSION['itens'] = array();
}


if(isset($_POST['prodSubmit']) && $_POST['prodSubmit'] == "carrinho"){

	$qtd    = $_POST['qtd'];
	$idProduto = $_POST['idItem'];

	if(!isset($_SESSION['itens'][$idProduto])){
		$_SESSION['itens'][$idProduto] = $qtd;
	}else{
		$_SESSION['itens'][$idProduto] = $qtd;
	}
}	

if(count($_SESSION['itens']) == 0){
	echo ' Carrinho Vazios</br> ';

}else{

	$vendas = new Vendas;
	$cont = 1;
	foreach ($_SESSION['itens'] as $produtos => $quantidade) {


		$nomeProduto = $vendas->itemNome($produtos);

		if( $nomeProduto != NULL){
			echo '<tr>
			<td>'.$cont.'</td>
			<td>'.$produtos.'</td>
			<td>'. $nomeProduto .'</td>
			<td>'.$quantidade.'</td>
			<td><input type="hidden" id="idItem" name="idItem['.$produtos.']" value="'.$produtos.'" />
			<input type="hidden" id="qtd" name="qtd['.$produtos.']" value="'.$quantidade.'" />
			<a href="../../App/Database/remover.php?remover=carrinho&id='.$produtos.'"><i class="fa fa-trash text-danger"></i></a></td>
			</tr>';	
			$cont = $cont + 1;
		}else{
			unset($_SESSION['itens'][$produtos]);
		}
	}
}
?>
