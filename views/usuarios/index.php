<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/usuario.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuários
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuários</li>
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
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista de Usuários</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                
              <thead>
              <tr role="row">
                <th>#</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome" style="width: 182px;">Nome</th>
                
                <th>Permissão</th>
                <th>Edit</th>
              </tr>
              </thead>
              <tbody>
              ';

               $resp = $usuario->index($perm);
               $resps = json_decode($resp, true);
               
               foreach ($resps as $row) {
                 
                if(isset($row['idUser']) != NULL){
                echo '<tr>';
                echo '<td>'.$row['idUser'].'</td>';
                echo '<td>'.$row['Username'].'</td>';
                echo '<td>';
                if($row['Permissao'] == 1){ echo 'Administrador'; }else{ echo 'Vendedor';}
                echo'</td>';
                echo '<td>';
                
                echo'<a href="editusuario.php?q='.$row['idUser'].'"><button>Edit</button></a>';

                echo '</td>';
                echo '</tr>';
              }

               }

        echo '</tbody>
        </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
             <a href="addusuarios.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Usuários</a>
            </div>
          </div>
   
';
echo '</div>';
echo '</section>';
      
       
    

echo '</div>';

echo  $footer;
echo $javascript;
?>