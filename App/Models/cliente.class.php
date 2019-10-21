<?php

/**
 * Class Cliente
 */

require_once 'connect.php';

class Cliente extends Connect
{
	
	function index($value, $perm)
	{
		if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        if($value == NULL){
          $value = 1;
        }

     		$this->query = "SELECT * FROM `cliente` WHERE `statusCliente` = '$value'";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($this->result){
     		
     			while ($row = mysqli_fetch_array($this->result)) {


     				echo '<br />Cliente: '. $row['NomeCliente'];

     			}
     		}
   	}//fim -- index

    function insertCliente($NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm)
    {
       if($perm == 1){

        $cpfCliente = connect::limpaCPF_CNPJ($cpfCliente);

        $idCliente = Cliente::idCliente($cpfCliente);

        if($idCliente > 0){
          return 2;
        }else{

        $NomeCliente = mysqli_real_escape_string($this->SQL, $NomeCliente);
        $EmailCliente = mysqli_real_escape_string($this->SQL, $EmailCliente);
        $cpfCliente = mysqli_real_escape_string($this->SQL, $cpfCliente);

        $query = "INSERT INTO `cliente`(`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `statusCliente`, `Usuario_idUsuario`) VALUES (NULL,'$NomeCliente','$EmailCliente','$cpfCliente',1,'$idUsuario')";
        $result = mysqli_query($this->SQL, $query) or die ( mysqli_error($this->SQL));

        if($result){

            return 1;
          }else{
            return 0;
          }
        }

          mysqli_close($this->SQL);


      }
    }//Insert Cliente

	function updateCliente($idCliente, $NomeCliente, $EmailCliente, $cpfCliente, $idUsuario, $perm){

        if($perm == 1){

          $cpfCliente = connect::limpaCPF_CNPJ($cpfCliente);

          $NomeCliente = mysqli_real_escape_string($this->SQL, $NomeCliente);
          $EmailCliente = mysqli_real_escape_string($this->SQL, $EmailCliente);
          $cpfCliente = mysqli_real_escape_string($this->SQL, $cpfCliente);

          $this->query = "UPDATE `cliente` SET `NomeCliente`='$NomeCliente',`EmailCliente`='$EmailCliente',`cpfCliente`='$cpfCliente', `Usuario_idUsuario`= '$idUsuario' WHERE `idCliente`= '$idCliente'";
          $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

          if($this->result){
            return 1;
          }else{
            return 0;
          }

          mysqli_close($this->SQL);

        }
      }

      function statusCliente($status, $idCliente){

        $this->query = "UPDATE `cliente` SET `statusCliente`= '$status' WHERE `idCliente`= '$idCliente'";

        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        if($this->result){
          return 1;
        }else{
          return 0;
        }

        mysqli_close($this->SQL);

      }

      function deleteCliente($idCliente){

        $this->query = "DELETE FROM `cliente` WHERE `idCliente`= '$idCliente'";
        
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        if($this->result){
          return 1;
        }else{
          return 0;
        }

        mysqli_close($this->SQL);

      }

      public function idcliente($cpfCliente){

        $this->client = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$cpfCliente'";

            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){

                $row = mysqli_fetch_array($this->resultcliente);
                return $idCliente = $row['idCliente'];
            }
    }

	function search($value){

        if(isset($value))  
        {  
          //$output = '';  
          $query = "SELECT * FROM `cliente` WHERE `cpfCliente` LIKE '".$value."%' OR `NomeCliente` LIKE '".$value."%' LIMIT 5";  
          $result = mysqli_query($this->SQL, $query); 

          if(mysqli_num_rows($result) > 0)  
          {  

           while($row = mysqli_fetch_array($result))  
           {  
              
            $output[] = $row; 
          } 

          return array('data' => $output);

        }else{

          return 0;
        }  

      }

    }//------

    function searchdata($value){
      
      $value = explode(' ', $value);
      $valor = str_replace("." , "" , $value[0] ); // Primeiro tira os pontos
      $valor = str_replace("-" , "" , $valor); // Depois tira o taço
      $value = $valor;

      if(isset($value))  
      {  
        //$output = '';  
        $query = "SELECT * FROM `cliente` WHERE `cpfCliente` = '$value'";  
        $result = mysqli_query($this->SQL, $query);  
        if(mysqli_num_rows($result) > 0)  
        {  

          if($row = mysqli_fetch_array($result))  
          {  
            $output[] = $row; 
          }  
          return array('data' => $output); 
        }else{
          return $value;
        } 
      }  
    }//----searchdata------
    
    public function dadoscliente($idCliente){

        $this->client = "SELECT * FROM `cliente` WHERE `idCliente` = '$idCliente'";

            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){

                $row = mysqli_fetch_array($this->resultcliente);
                return $row;
            }
    }

}
