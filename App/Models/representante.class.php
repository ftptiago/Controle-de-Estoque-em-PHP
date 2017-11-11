  <?php

  /*
   Class produtos
  */

   require_once 'connect.php';

    class Representante extends Connect
   {
   	
   	public function index($value = NULL)
      {
        if($value == NULL){
          $value = 1;
        }
   		$this->query = "SELECT * FROM `representante`, `fabricante` WHERE `Fabricante_idFabricante` = `idFabricante` AND (`repPublic` = '$value')";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   		if($this->result){
   		
   			while ($row = mysqli_fetch_array($this->result)) {
   				
          if($row['repAtivo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
            echo '<li '.$c.'>

          <!-- drag handle -->
          <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
          </span>
          <!-- checkbox -->
          <form class="label" name="ativ'.$row['idRepresentante'].'" action="../../App/Database/action.php" method="post">
                    <input type="hidden" name="id" id="id" value="'.$row['idRepresentante'].'">
                    <input type="hidden" name="status" id="status" value="'.$row['repAtivo'].'">
                    <input type="hidden" name="tabela" id="tabela" value="representante">                  
                    <input type="checkbox" id="status" name="status" ';
                     if($row['repAtivo'] == 1){ echo 'checked'; } 
                    echo ' value="'.$row['repAtivo'].'" onclick="this.form.submit();" /></form>

                    <!-- todo text -->
                    <span class="text"><span class="badge left">'.$row['NomeFabricante'].' </span> '.$row['NomeRepresentante'].'</span>
                    <!-- Emphasis label -->
                    <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
                    <!-- General tools such as edit or delete-->
                     <div class="tools right">

                      <a href="" data-toggle="modal" data-target="#myModalup'.$row['idRepresentante'].'"><i class="fa fa-edit"></i></a> 
                    
                      <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idRepresentante'].'">';

                    if($row['repPublic'] == 0){echo '<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                    echo '</a> </div>

    <!-- Modal -->

  <div class="modal fade" id="myModal'.$row['idRepresentante'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delRep'.$row['idRepresentante'].'" name="delRep'.$row['idRepresentante'].'" action="../../App/Database/delRepresentante.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Nome: '.$row['NomeRepresentante'].'
          </div>
          <input type="hidden" id="idRepresentante" name="idRepresentante" value="'.$row['idRepresentante'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      
    </form>
    </div>

    <!-- Modal UPDATE -->
  <div class="modal fade" id="myModalup'.$row['idRepresentante'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="Up'.$row['idRepresentante'].'" name="Up'.$row['idRepresentante'].'" action="../../App/Database/insertrepresentante.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualização de dados.</h4>
          </div>
          <div class="modal-body">
            Nome Atual:
            <input type="text" id="NomeRepresentante" name="NomeRepresentante" value="'.$row['NomeRepresentante'].'">
          </div>
          <div class="modal-body">
            Nome Atual:
            <input type="text" id="TelefoneRepresentante" name="TelefoneRepresentante" value="'.$row['TelefoneRepresentante'].'">
          </div>
          <div class="modal-body">
            Nome Atual:
            <input type="text" id="EmailRepresentante" name="EmailRepresentante" value="'.$row['EmailRepresentante'].'">
          </div>        
          <input type="hidden" id="idFabricante" name="idFabricante" value="'.$row['Fabricante_idFabricante'].'">

          <input type="hidden" id="idRepresentante" name="idRepresentante" value="'.$row['idRepresentante'].'">
                   
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

   	public function listRepresentantes(){

   		$this->query = "SELECT *FROM `representante`";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   		if($this->result){
   		
   			while ($row = mysqli_fetch_array($this->result)) {
   				echo '<option value="'.$row['idRepresentante'].'">'.$row['NomeRepresentante'].'</option>';
   			}

   	}
   }

   	public function InsertRepresentante($NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $Fabricante_idFabricante, $idUsuario){

   		$this->query = "INSERT INTO `representante`(`idRepresentante`, `NomeRepresentante`, `TelefoneRepresentante`, `EmailRepresentante`,`repAtivo`,`repPublic`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES (NULL, '$NomeRepresentante', '$TelefoneRepresentante', '$EmailRepresentante', 1, 1, '$Fabricante_idFabricante', '$idUsuario')";
   		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

   			header('Location: ../../views/representante/index.php?alert=1');
   		}else{
   			header('Location: ../../views/representante/index.php?alert=0');
   		}


   	}

    public function UpdateRepresentante($idRepresentante, $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idUsuario)
    {
      $this->query = "UPDATE `representante` SET `NomeRepresentante`='$NomeRepresentante',`TelefoneRepresentante`='$TelefoneRepresentante',`EmailRepresentante`='$EmailRepresentante',`Usuario_idUser`='$idUsuario' WHERE `idRepresentante` = '$idRepresentante'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

        header('Location: ../../views/representante/index.php?alert=1');
      }else{
        header('Location: ../../views/representante/index.php?alert=0');
      }

    }

    public function DelRepresentante($id)
    {
        $this->query = "SELECT * FROM `representante` WHERE `idRepresentante` = '$id'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['idRepresentante'];
                $public = $row['repPublic'];

                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }

                mysqli_query($this->SQL, "UPDATE `representante` SET `repPublic` = '$p' WHERE `idRepresentante` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../views/representante/index.php?alert=1');
        }else{
                header('Location: ../../views/representante/index.php?alert=0');
              } 

    }

    public function Ativo($value, $id)
  {

    if($value == 0){ $v = 1; }else{ $v = 0; }

    $this->query = "UPDATE `representante` SET `repAtivo` = '$v' WHERE `idRepresentante` = '$id'";
    $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

    header('Location: ../../views/representante/');


    }//Ativo
    
   }

   $representante = new Representante;