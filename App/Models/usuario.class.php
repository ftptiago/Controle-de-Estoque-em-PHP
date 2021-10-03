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

   			while($row[] = mysqli_fetch_array($this->result));
        return json_encode($row);
              

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

      public function editUsuario($id){

      $query = "SELECT * FROM `usuario` WHERE `idUser` = '$id'";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($result)){

        return array('Usuario' => $row['Username'], 'E-mail' => $row['Email'], 'Permissao' => $row['Permissao'], 'Imagem' => $row['imagem']);

      }


    }
    public function UpdateUser($idUser, $username, $email, $nomeimagem, $permissao = NULL){

      if($permissao != NULL){
          $Permissao = ", Permissao = '$permissao'";
      }else{
        $Permissao = '';
      }
      $username = mysqli_real_escape_string($this->SQL, $username);
      $email = mysqli_real_escape_string($this->SQL, $email);

      $this->query = "UPDATE `usuario` SET `Username`='$username',`Email`='$email',`imagem`='$nomeimagem' $Permissao WHERE `idUser`= '$idUser'";
      
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        mysqli_insert_id($this->result);
        if($this->result){
           header('Location: ../../views/usuarios/index.php?alert=1');
        
      }else{
                header('Location: ../../views/usuarios/index.php?alert=0');
      }

    }   

    public function trocaSenha($passAtual, $password, $idUsuario){

      $query = "SELECT * FROM `usuario` WHERE `idUser` = '$idUsuario'";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($result)){
        $passAtual = md5($passAtual);

        if(!strcmp($passAtual, $row['Password'])){

          $id = $row['idUser'];

          $password = md5($password);

          $up = "UPDATE `usuario` SET `Password` = '$password' WHERE `idUser` = '$id'";
          mysqli_query($this->SQL, $up) or die(mysqli_error($this->SQL));

          return 1;

        }
        return 0;

      }
      return 0;

    }

   }

   $usuario = new Usuario;