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
}