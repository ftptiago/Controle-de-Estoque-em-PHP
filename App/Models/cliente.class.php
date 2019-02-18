<?php

/**
 * 
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

	function updateCliente($idCliente, $NomeCliente, $emailCliente, $cpfCliente, $idUsuario, $perm){

        if($perm == 1){

          $NomeCliente = mysqli_real_escape_string($this->SQL, $NomeCliente);
          $emailCliente = mysqli_real_escape_string($this->SQL, $emailCliente);
          $cpfCliente = mysqli_real_escape_string($this->SQL, $cpfCliente);

          $this->query = "UPDATE `cliente` SET `NomeCliente`='$NomeCliente',`EmailCliente`='$emailCliente',`cpfCliente`='$cpfCliente', `Usuario_idUsuario`= '$idUsuario' WHERE `idCliente`= '$idCliente'";
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
}
