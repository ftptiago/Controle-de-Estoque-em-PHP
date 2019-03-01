<?php
require_once '../../App/auth.php';
require_once '../../App/Models/vendas.class.php';

          if(isset($_POST['id']) > 0 &&
		    !empty($_POST['quant']) &&
			!empty($_POST['nomeCliente']) &&
			!empty($_POST['emailCliente']) &&
			!empty($_POST['cpfcliente'])){
            $id = $_POST['id'];
			$quant = $_POST['quant'];
            $cliente = $_POST['nomeCliente'];
            $email = $_POST['emailCliente'];
            $cpfcliente = $_POST['cpfcliente'];
            $vendas = new Vendas;
            $vendas->itensVendidos($id, $quant, $cliente, $email, $cpfcliente, $idUsuario, $perm);
          }else{
			  $_SESSION['msg'] = 'Falta preencher alguns campos obrigatorios!';
			  header('Location: ../../views/vendas/');
		  }
?>
