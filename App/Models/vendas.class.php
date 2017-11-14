<?php

/**
* Vendas
*/

require_once 'connect.php';

class Vendas extends Connect
{
	public function itensVendidos($id, $quant, $perm)
	{
		
        if($perm != 2){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `itens` WHERE `idItens`= '$id'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

        if($this->result){

        		//------Verificação da Venda-----------

        		if($row = mysqli_fetch_array($this->result)){

        			$q = $row['QuantItens'];
        			$v = $row['QuantItensVend'];

        			$quantotal = $v + $quant;

        			if($q >= $quantotal){

        				$this->query = "UPDATE `itens` SET `QuantItensVend` = '$quantotal' WHERE `idItens`= '$id'";
        				if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){

        					echo 'Venda efetuada!';
        				}else{
        					echo 'Não foi possivel efetuar a venda!';
        				}

        			}else{

        				$estoque = $row['QuantItens'] - $row['QuantItensVend'];
        				echo 'Quantidade maior do que em estoque! </br> Quantidade em estoque disponivel: '.$estoque;
        			}


        		}


        		//------------------

        }else{
        	header('Location: ../../views/vendas/index.php?alert=0');
        }


	}
}