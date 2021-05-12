<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/usuario.class.php';

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

if($perm == 1 || $_GET['q'] == $idUsuario){

  $idUser = $_GET['q'];

  $resp = $usuario->editUsuario($idUser);

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
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário" value="'.$resp['Usuario'].'">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail do usuário" value="'.$resp['E-mail'].'">
                </div>

                                 
              <!-- /.box-body -->

             
                <div class="form-group">
                <img src="../'.$resp['Imagem'].'" width="50" class="img img-responsive" />
                  <label for="exampleInputEmail1">Foto Perfil</label>
               <input id="arquivo" name="arquivo" type="file" class="form-control" id="exampleInputEmail1" placeholder="Imagem">
                </div>';

                if($perm == 1 ){

                if($resp['Permissao'] == 1){
                  $selected1 = 'selected';
                  $selected2 = '';
                }else{
                  $selected1 = '';
                  $selected2 = 'selected';
                }
               
            echo '<div class="form-group">
                    <select name="permissao" class="form-control">
                    <option value="1" '.$selected1.'>Administrador</option>
                    <option value="2" '.$selected2.'>Vendedor</option>
                    </select>
                  </div>';
                }

               echo '<div class="box-footer">
                                <input type="hidden" id="valor" name="valor" value="./'.$resp['Imagem'].'">
                 <input type="hidden" id="idUser" name="idUser" value="'.$idUser.'">
                                 <button type="submit" id="atualizar" name="update" class="btn btn-primary" value="Atualizar">Atualizar</button>
                <a class="btn btn-danger" href="../../views/usuarios/">Cancelar</a>
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
