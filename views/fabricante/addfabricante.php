  <?php
  require_once '../../App/auth.php';
  require_once '../../layout/script.php';

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
          Adicionar <small>Fabricante</small>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Fabricante</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="../../App/Database/insertfabricante.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome da Empresa</label>
                    <input type="text" name="NomeFabricante" class="form-control" id="exampleInputEmail1" placeholder="Nome Fabricante">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input type="text" name="CNPJFabricante" class="form-control" id="exampleInputEmail1" placeholder="CNPJ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="EmailFabricante" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereco</label>
                    <input type="text" name="EnderecoFabricante" class="form-control" id="exampleInputEmail1" placeholder="Endereço">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" name="TelefoneFabricante" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                  </div>
                  <hr />
                  <div class="form-group"><label for="exampleInputEmail1">Publicar</label>
                  <label class="radio-inline">
                    <input type="radio" name="Public" value="1">Sim
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="Public" value="0">Não
                  </label>
                  </div>

                  <div class="box-header with-border">
                <h3 class="box-title">Representante</h3>
              </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="NomeRepresentante" class="form-control" id="exampleInputEmail1" placeholder="Nome do Representante">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" name="TelefoneRepresentante" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="EmailRepresentante" class="form-control" id="exampleInputEmail1" placeholder="E-mail ">
                  </div>

                  
                   <input type="hidden" name="iduser" value="'.$idUsuario.'">
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                  <a class="btn btn-danger" href="../../views/prod">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.box -->
            </div>
  </div>';

  echo '</div>';
  echo '</div>';
  echo '</section>';
  echo '</div>';
  echo  $footer;
  echo $javascript;
  ?>