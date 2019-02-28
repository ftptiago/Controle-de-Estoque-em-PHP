<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/vendas.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
		<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Itens cadastrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Itens</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    ';
    require '../../layout/alert.php';
    echo '
      <!-- Small boxes (Stat box) -->
      <div class="row">
      	<div class="box box-primary">
            
            <!-- /.box-header -->
            <div class="box-body">';
?>
            <form id="form2" action="../../App/Database/insertVendas.php" method="POST">
              <div class="box-body">

              <div class="form-group">
                <label>ID Item</label>
                <input type="text" class="form-control" name="id">
              </div>
              <div class="form-group">
                <label>Quantidade Item</label>
                <input type="text" class="form-control" name="quant">
              </div>

               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome Cliente</label>
                    <input type="text" name="nomeCliente" class="form-control" id="exampleInputEmail1" placeholder="Nome Cliente">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="emailCliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input type="number" name="cpfcliente" class="form-control" id="exampleInputEmail1" placeholder="CPF">
                  </div>
                  
                  
                  
                   <input type="hidden" name="iduser" value="'.$idUsuario.'">
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="comprar" class="btn btn-primary" value="Cadastrar">Comprar</button>
                  <a class="btn btn-danger" href="../../views/prod">Cancelar</a>
                </div>
              </form>

<?php
          if(!empty($_SESSION['msg'])){
            echo ' <div class="col-xs-12 col-md-12 text-success">'. $_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
          }

        echo'
          </div>
	 
';
echo '</div>';
echo '</section>';
      
       
	  

echo '</div>';

echo  $footer;
echo $javascript;
?>

