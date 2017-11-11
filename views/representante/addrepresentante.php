<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/fabricante.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Representante</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Representante</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo '
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Representante</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertrepresentante.php" method="POST">
              <div class="box-body">
              <div class="box-header with-border">
              <h3 class="box-title">Representante</h3>
            </div>

            <div class="form-group">
                  <label for="exampleInputEmail1">Empresa Representanda</label>

            <select class="form-control" name="idFabricante">
            ';
            $fabricante->listfabricante();
            echo '</select>
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
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="./">Cancelar</a>
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