<?php

  /*
   Class produtos
  */

   require_once 'connect.php';

   class Usuario extends Connect
   {

   	public function index($perm)
   	{
   		if($perm == 1){
   			$this->query = "SELECT * FROM `usuario`";
   			$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

   			while($this->row = mysqli_fetch_array($this->result)){
   				echo '<li>';
   				echo $this->row['Username'];
   				echo ' | Tipo de permissão:  ';
   				if($this->row['Permissao'] == 1){ echo 'Administrador'; }else{ echo 'Vendedor';}
   				
   				echo '</li>';

   			}


   		}else{
   			echo "Você não tem Permissao de acesso a este conteúdo!";
   		}   		
   	}

   	public function InsertUser($username, $email, $password, $pt_file, $perm)
   	{
   		$this->query = "INSERT INTO `usuario`(`idUser`,`Username`,`Email`,`Password`,`imagem`,`Dataregistro`,`Permissao`)VALUES (NULL, '$username', '$email', '$password', '$pt_file' , CURRENT_TIMESTAMP , '$perm' )";
   		
   		$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        mysqli_insert_id($this->result);
        if($this->result){
           header('Location: ../../views/usuarios/index.php?alert=1');
        
      }else{
                header('Location: ../../views/usuarios/index.php?alert=0');
              }

   	}

   }

   $usuario = new Usuario;