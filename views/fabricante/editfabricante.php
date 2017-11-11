<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/fabricante.class.php';

echo $head;
echo $header;
echo $aside;



echo '<div class="content-wrapper">';

if($perm != 1){
          echo "Você não tem permissão! </div>";

          exit();
        }
        
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fabricante
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fabricante</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo ' <a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <!-- left column -->
';
        if(isset($_GET['id'])){

          $idFabricante = $_GET['id'];
  
       $resp = $fabricante->EditFabricante($idFabricante);


  echo '<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Fabricante</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertfabricante.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome da Empresa</label>
                  <input type="text" name="NomeFabricante" class="form-control" id="exampleInputEmail1" placeholder="Nome Fabricante" value="'.$resp['Fabricante']['Nome'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CNPJ</label>
                  <input type="text" name="CNPJFabricante" class="form-control" id="exampleInputEmail1" placeholder="CNPJ" value="'.$resp['Fabricante']['CNPJ'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="EmailFabricante" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="'.$resp['Fabricante']['Email'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Endereco</label>
                  <input type="text" name="EnderecoFabricante" class="form-control" id="exampleInputEmail1" placeholder="Endereço" value="'.$resp['Fabricante']['Endereco'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefone</label>
                  <input type="text" name="TelefoneFabricante" class="form-control" id="exampleInputEmail1" placeholder="Telefone" value="'.$resp['Fabricante']['Telefone'].'">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Publicar</label>
                  
                  <select name="Ativo">
                  ';
                    $Ativo = $resp['Fabricante']['Ativo'];
                  if($Ativo == 1){
                    $selected1 = "selected";
                    $selected0 = " ";
                  }else{
                    $selected1 = " ";
                    $selected0 = "selected";
                  }

                  echo '
                  <option value="1" '.$selected1.' >SIM</option>
                  <option value="0" '.$selected0.' >NÃO</option>
                  </select>
                  
                </div>
                                
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idFabricante" value="'.$idFabricante.'">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/fabricante">Cancelar</a>
              </div>
            </form>
          </div>
        <!-- /.box -->
          </div>
</div>';
 }//if

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>