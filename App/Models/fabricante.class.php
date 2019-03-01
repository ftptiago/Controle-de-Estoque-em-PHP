    <?php

    /*
     Class produtos
    */

     require_once 'connect.php';

      class Fabricante extends Connect
     {
     	
     	public function index($value = NULL, $perm)
     	{

        if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        if($value == NULL){
          $value = 1;
        }

     		$this->query = "SELECT * FROM `fabricante` WHERE `Public` = '$value'";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($this->result){
     		
     			while ($row = mysqli_fetch_array($this->result)) {

            if($row['Ativo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
     				echo '<li '.$c.'>
           
                      <!-- drag handle -->
                          <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                      <!-- checkbox -->
                   
                    <form class="label" name="ativ'.$row['idFabricante'].'" action="../../App/Database/action.php" method="post">
                    <input type="hidden" name="id" id="id" value="'.$row['idFabricante'].'">
                    <input type="hidden" name="status" id="status" value="'.$row['Ativo'].'">
                    <input type="hidden" name="tabela" id="tabela" value="fabricante">                  
                    <input type="checkbox" id="status" name="status" ';
                     if($row['Ativo'] == 1){ echo 'checked'; } 
                    echo ' value="'.$row['Ativo'].'" onclick="this.form.submit();" /></form>
                      
                      <!-- todo text -->
  <span class="text"> '.$row['NomeFabricante'].' </span>
                     
                      <div class="tools right">

                      <a href="editfabricante.php?id='.$row['idFabricante'].'"><i class="fa fa-edit"></i></a> 
                    
                      <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idFabricante'].'">';

                    if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                    echo '</a> </div>

    <!-- Modal -->

  <div class="modal fade" id="myModal'.$row['idFabricante'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delFab'.$row['idFabricante'].'" name="delFab'.$row['idFabricante'].'" action="../../App/Database/delFabricante.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Nome: '.$row['NomeFabricante'].'
          </div>
          <input type="hidden" id="idFabricante" name="idFabricante" value="'.$row['idFabricante'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      
    </form>
    </div>
  </li>';
                     				
     			}     			
     		}

     	}

     	public function listfabricante(){

        
     		$this->query = "SELECT * FROM `fabricante` WHERE (`Public` = 1) AND (`Ativo` = 1)";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($this->result){
     		
     			while ($row = mysqli_fetch_array($this->result)) {
            if($value == $row['idFabricante']){
              $selected = "selected";
            }else{
              $selected = "";
            }
     				echo '<option value="'.$row['idFabricante'].'" '.$selected.' >'.$row['NomeFabricante'].'</option>';
     			}

     	}

     }

     	public function InsertFabricante($NomeFabricante, $CNPJFabricante, $EmailFabricante, $EnderecoFabricante, $TelefoneFabricante, $idUsuario, $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $status , $perm)
      {

        if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `fabricante` WHERE `NomeFabricante` = '$NomeFabricante'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        /*--Alteração de codigo para corriguir erro de verificação 
        se fabricante existe ou não no DB. */

        $total = mysqli_num_rows($this->result); 

        if($total > 0){       
          $row = mysqli_fetch_array($this->result);

          $idFabricante = $row['idFabricante'];

        }else{

         $query = "INSERT INTO `fabricante`(`NomeFabricante`, `CNPJFabricante`, `EmailFabricante`, `EnderecoFabricante`, `TelefoneFabricante`, `Public`, `Ativo`, `Usuario_idUser`) VALUES ('$NomeFabricante', '$CNPJFabricante', '$EmailFabricante', '$EnderecoFabricante', '$TelefoneFabricante', 1 , 1 , '$idUsuario')";
        
          $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
          $idFabricante = mysqli_insert_id($this->SQL);
        
        }
        
          if($idFabricante > 0){

          $this->representante = "INSERT INTO `representante`(`idRepresentante`, `NomeRepresentante`, `TelefoneRepresentante`, `EmailRepresentante`,`repAtivo`,`repPublic`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES (NULL, '$NomeRepresentante', '$TelefoneRepresentante', '$EmailRepresentante',1 , 1,'$idFabricante', '$idUsuario')";
             
              if($this->rep = mysqli_query($this->SQL, $this->representante) or die(mysqli_error($this->SQL))){
                  header('Location: ../../views/fabricante/index.php?alert=1'); 
              }else{
                  header('Location: ../../views/fabricante/index.php?alert=0');
              } 

            }else{
             header("Location: ../../views/fabricante/index.php?alert=0");
            }
            
     	}//Insert

      

      public function EditFabricante($idFabricante){

        $this->query = "SELECT *FROM `fabricante` WHERE `idFabricante` = '$idFabricante'";
        if($this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL))){

          if($row = mysqli_fetch_array($this->result)){

            $NomeFabricante = $row['NomeFabricante'];
            $CNPJFabricante = $row['CNPJFabricante'];
            $EmailFabricante = $row['EmailFabricante'];
            $EnderecoFabricante = $row['EnderecoFabricante'];
            $TelefoneFabricante = $row['TelefoneFabricante'];
            $Ativo = $row['Ativo'];
            $Usuario_idUser  = $row['Usuario_idUser'];

              $array = array('Fabricante' => array('Nome' => $NomeFabricante, 'CNPJ' => $CNPJFabricante, 'Email'=> $EmailFabricante, 'Endereco'=>$EnderecoFabricante, 'Telefone' => $TelefoneFabricante, 'Ativo' => $Ativo, 'Usuario' => $Usuario_idUser ),);
              return $array;
          }

        }else{
          return 0;
        }



      }

      public function UpdateFabricante($idFabricante, $NomeFabricante, $CNPJFabricante, $EmailFabricante, $EnderecoFabricante, $TelefoneFabricante, $Ativo, $idUsuario, $perm)
      {

        if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        $this->representante = "UPDATE `fabricante` SET `NomeFabricante`= '$NomeFabricante', `CNPJFabricante`='$CNPJFabricante',`EmailFabricante`='$EmailFabricante',`EnderecoFabricante`='$EnderecoFabricante',`TelefoneFabricante`='$TelefoneFabricante', `Ativo` = '$Ativo' ,`Usuario_idUser`='$idUsuario' WHERE `idFabricante` = '$idFabricante'";

        if($this->rep = mysqli_query($this->SQL, $this->representante) or die(mysqli_error($this->SQL))){

                  header('Location: ../../views/fabricante/index.php?alert=5'); 
              }else{
                  header('Location: ../../views/fabricante/index.php?alert=0');
              } 


      }//update

      public function DelFabricante($idFabricante, $perm)
      {

        if($perm != 1){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `Fabricante` WHERE `idFabricante` = '$idFabricante'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['idFabricante'];
                $public = $row['Public'];

                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }

                mysqli_query($this->SQL, "UPDATE `fabricante` SET `Public` = '$p' WHERE `idFabricante` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../views/fabricante/index.php?alert=1');
        }else{
                header('Location: ../../views/fabricante/index.php?alert=0');
        } 
        
  }
    
    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }

      $this->query = "UPDATE `fabricante` SET `Ativo` = '$v' WHERE `idFabricante` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
         
      header('Location: ../../views/fabricante/');
      
    }

  }

     $fabricante = new Fabricante;
