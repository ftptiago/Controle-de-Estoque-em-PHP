<?php

/**
* Vendas
*/

require_once 'connect.php';

class Vendas extends Connect
{
	public function itensVendidos($iditem, $quant, $idUsuario, $perm)
	{
		
        if($perm != 2){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `itens` WHERE `idItens`= '$iditem'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

        if($this->result){

        		//------Verificação da Venda-----------

        		if($row = mysqli_fetch_array($this->result)){

        			$q = $row['QuantItens'];
        			$v = $row['QuantItensVend'];

        			$quantotal = $v + $quant;

        			if($q >= $quantotal){

                        $valor = ($row['ValVendItens'] * $quant);

                        $this->query = "INSERT INTO `vendas` (`quantitens`, `valor`, `iditem`, `idusuario`) VALUES ('$quant', '$valor', '$iditem', '$idUsuario')";
                        if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){


        				$this->query = "UPDATE `itens` SET `QuantItensVend` = '$quantotal' WHERE `idItens`= '$iditem'";
        				if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){

        					echo 'Venda efetuada!';
                        }

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