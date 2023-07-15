<?php
require_once '../auth.php';
require_once '../../App/Models/vendas.class.php';

if (isset($_POST['prodSubmit']) != null && $_POST['prodSubmit'] == "carrinho") {

	$idProduto = $_POST['idItem'];
	$qtde = $_POST['qtde'];
	$nameprod = $_POST['nameprod'];

	if (!empty($idProduto) && !empty($qtde)) {

		$var = array('idItem' => $idProduto, 'qtde' => $qtde, 'nameproduto' => $nameprod);

		if (!isset($_SESSION['itens'][$idProduto])) {
			$_SESSION['itens'][$idProduto] = $var;
		} else {
			$_SESSION['itens'][$idProduto] = $var;
		}
	}
	$pkCount = (is_array($_SESSION['itens']) ? count($_SESSION['itens']) : 0);

	if ($pkCount == 0) {
		echo ' Carrinho Vazios</br> ';
	} else {

		$cont = 1;

		foreach ($_SESSION['itens'] as $produtos) {

			$idItem = $produtos['idItem'];
			$qtde = $produtos['qtde'];
			$nameproduto = $produtos['nameproduto'];

			echo '<tr>
					<td>' . $cont . '</td>
					<td>' . $idItem . '</td>
					<td>' . $nameproduto . '</td>
					<td><input type="hidden" id="idItem" name="idItem[' . $idItem . ']" value="' . $idItem . '" />
					<input type="hidden" id="qtd" name="qtd[' . $idItem . ']" value="' . $qtde . '" />' . $qtde . '
					<a href="../../App/Database/remover.php?remover=carrinho&id=' . $idItem . '"><i class="fa fa-trash text-danger"></i></a></td>
					</tr>';
			$cont = $cont + 1;
		}
	}
}
