<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Usuário</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuário</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo ' 
      <div class="row">
        <!-- left column -->
        
';

if($perm == 1){
  echo '
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuário</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" action="../../App/Database/insertuser.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail do usuário">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">digite uma senha</label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                </div>
                 
              <!-- /.box-body -->

             
                <div class="form-group">
                  <label for="exampleInputEmail1">Foto Perfil</label>
               <input id="arquivo" name="arquivo" type="file" class="form-control" id="exampleInputEmail1" placeholder="Imagem">
                </div>
                <div class="form-group">
                <select name="permissao" class="form-control">
                <option value="1">Administrador</option>
                <option value= "2">Vendedor</option>
                </select>
                </div>

                 <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/prod">Cancelar</a>
              </div>
            </form>
            
';}else{

  echo ' <div class="col-md-12">  
          <div class="box box-primary">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Você não possui acesso!</h3>
            </div> 
            ';
}
echo '
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
