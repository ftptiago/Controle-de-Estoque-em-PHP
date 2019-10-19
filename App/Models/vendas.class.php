<?php

/**
* Vendas
*/

require_once 'connect.php';

class Vendas extends Connect
{
	public function itensVerify($iditem, $quant, $perm){

    if($perm < 1 || $perm > 2){
      $_SESSION['msg'] =  'Erro - Você não tem permissão!'; 
      header('Location: ../../views/vendas/index.php');
      exit();
    }

    $this->query = "SELECT * FROM `itens`, `produtos` WHERE `idItens` = '$iditem' AND `Produto_CodRefProduto` = `CodRefProduto`";
    $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
    $total = mysqli_num_rows($this->result);

    if($total > 0){

      if($row = mysqli_fetch_array($this->result)){

        $q = $row['QuantItens'];
        $v = $row['QuantItensVend'];
        $quantotal = $v + $quant;

        if($q >= $quantotal){

          return array('status' => '1', 'NomeProduto' => $row['NomeProduto'], );
        }else{
          $estoque = $q - $v;
          return array('status' => '0', 'NomeProduto' => $row['NomeProduto'], 'estoque'=> $estoque);
        }
      }
    }else{

      $_SESSION['msg'] =  '<div class="alert alert-warning">
      <strong>Ops!</strong> Produto ('.$iditem.') não encontrado!</div>';
      
      header('Location: ../../views/vendas/index.php');
      exit;
    }
  }

	public function itensVendidos($iditem, $quant, $cliente, $email, $cpfcliente, $idUsuario, $perm)
	{

    	$cpfcliente = Connect::limpaCPF_CNPJ($cpfcliente);

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
                         
                        $id = Vendas::idCliente($cpfcliente); // Verifica se o cliente existe no DB.


                        if($id > 0){ // Se o cliente existir, Retorne o ID do cliente
                            $idCliente = $id; // ID do cliente
                        }else{

                            $this->novoclient = "INSERT INTO `cliente`(`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `statusCliente`, `Usuario_idUsuario`) VALUES (NULL,'$cliente','$email','$cpfcliente',1,'$idUsuario')";

                               if(mysqli_query($this->SQL, $this->novoclient) or die (mysqli_error($this->SQL))){
                                $idCliente = mysqli_insert_id($this->SQL);
                             }                            
                        }
                        
                        
                        $this->query = "INSERT INTO `vendas`(`idvendas`, `quantitens`, `valor`, `iditem`, `cliente_idCliente`, `idusuario`) VALUES (NULL, '$quant', '$valor', '$iditem', '$idCliente', '$idUsuario')";
                        if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){


        				$this->query = "UPDATE `itens` SET `QuantItensVend` = '$quantotal' WHERE `idItens`= '$iditem'";
        				if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){
	unset($_SESSION['itens']); //limpa itens da lista
        					$_SESSION['msg'] = 'Venda efetuada!'; 
                            header('Location: ../../views/vendas/');
                        }

        				}else{
        					$_SESSION['msg'] = 'Erro - Venda não efetuada!';
                            header('Location: ../../views/vendas/'); 
        				}

        			}else{

        				$estoque = $row['QuantItens'] - $row['QuantItensVend'];
        				$retorno = 'Quantidade maior do que em estoque! </br> Quantidade em estoque disponivel: '.$estoque;

                        $_SESSION['msg'] = $retorno;
                        header('Location: ../../views/vendas/');

        			}


        		}


        		//------------------

        }else{
        	header('Location: ../../views/vendas/index.php?alert=0');
        }


	}// itensVendidos

    public function idcliente($cpfCliente){

        $this->client = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$cpfCliente'";

            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){

                $row = mysqli_fetch_array($this->resultcliente);
                return $idCliente = $row['idCliente'];
            }
    }
	
    //----------itemNome

    public function itemNome($idItens){

    $query = "SELECT * FROM `produtos` WHERE `CodRefProduto` IN (SELECT `Produto_CodRefProduto` FROM `itens` WHERE `idItens` = '$idItens')";

    $result = mysqli_query($this->SQL, $query)  or die (mysqli_error($this->SQL));
                
        $row = mysqli_fetch_array($result);
        
        if($row['NomeProduto'] != NULL){    
            $resp = $row['NomeProduto'];
        
    }else{
      $resp = NULL;
    }
    
    return $resp;
  }//--itemNome
    
}//Class
