<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/relatorios.class.php';

echo $head;
echo $header;
echo $aside;
?>
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Relatorios
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Relatorios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <?php
    require '../../layout/alert.php';
    ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
      	<div class="box">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Produtos</h3>
            </div>  
             

          <!-- /.box-header -->
            
            <div class="box-body">
               
              <div>
                <form action="" method="POST">
                  <select name="produto">

                  <option value="">Nenhum</option>
                  <?php 
                  $relatorio = new Relatorio();
                  $resps = $relatorio->selectProduto($perm);
                  $resps = json_decode($resps, true);
                  foreach($resps as $resp){
                    echo '<option value="'.$resp['CodRefProduto'].'">'. utf8_decode($resp['NomeProduto']).'</option>';
                  } 
                  ?>
                   </select>
                  <div>                   
                    <select name="status">
                      <option value="1">Ativo</option>
                      <option value="0">Inativo</option>
                    </select>
                </div>
                  <button type="submit">Ver</button>
                </form>
              </div>

              <div id="ul-result">
                <?php
                  if(isset($_POST['produto']) != null){
                        $idProduto = $_POST['produto'];
                  ?>
                        <form id="produtos_selecionados" action="gerarcsv.php" method="post">
                          <input type="hidden" name="idproduto" value="<?php echo $idProduto; ?>">
                          <button type="submit">Imprimir CSV</button>
                        </form>

                <?php    
                    }else{

                     echo' <form id="todos_produtos" action="gerarcsv.php" method="post">
                          <input type="hidden" name="idproduto">
                          <button type="submit">Imprimir CSV</button>
                        </form>';
                    }
                ?>                

                <table class="table">
                  <thead>
                    <tr>
                      <th>Cód.:</th>
                      <th>Nome</th>
                      <th>Qtde</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    if(isset($_POST['produto']) != null){
                        $idProduto = $_POST['produto'];
                        $rows = $relatorio->qtdeItensEstoque($perm, $idProduto);
                    }else{
                      $rows = $relatorio->qtdeItensEstoque($perm);
                    }
                        
                        $rows = json_decode($rows, true);
                        foreach($rows as $row){ 
                          if(isset($row['QuantItens'])!= null){

                              $qi = $row['QuantItens'];
                              $qiv = $row['QuantItensVend'];
                              $r = $qi - $qiv;
                        echo '<tr> 
                                <td>'.$row['Produto_CodRefProduto'].'</td>
                                <td>'.$row['NomeProduto'].'</td>
                                <td>'.$r.'</td>
                              </tr>';
                        }
                        unset($_POST);
      }
      ?>
                 
                
                </tbody>
              </table>
              </div> <!-- ul-result -->
            </div> <!-- box-body -->
      </div><!--box-->
    </div><!--row -->
    </section> <!--content -->             

</div><!-- content-wrapper -->

<?php
echo  $footer;
echo $javascript;
?>