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
      Relatorio de vendas - Clientes
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
          <div class="col-md-12">
            <section class="row">
              <?php
              if ($perm == 1) {
              ?>
                <form action="" method="POST" class="col-md-10 well">
                  <div class="col-md-5">
                    <select id="produto" name="produto" class="form-control">
                      <option value="">Selecione um Produto</option>
                      <?php
                      $relatorio = new Relatorio();
                      $resps = $relatorio->selectProduto($perm);
                      $resps = json_decode($resps, true);
                      foreach ($resps as $resp) {
                        echo '<option value="' . $resp['CodRefProduto'] . '">' . $resp['NomeProduto'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <select id="cliente" name="cliente" class="form-control">
                      <option value="">Selecione um cliente</option>
                      <?php
                      $relatorio = new Relatorio();
                      $resps = $relatorio->selectCliente($perm);
                      $resps = json_decode($resps, true);
                      foreach ($resps as $resp) {
                        echo '<option value="' . $resp['idCliente'] . '">' . $resp['NomeCliente'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Ver</button>
                  </div>
                </form>
            </section>

            <section>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="overflow: auto;">

                <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th>Cód.:</th>
                      <th>Nome Cliente</th>
                      <th>Nome Produto</th>
                      <th>Qtde Comprada</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if (isset($_POST['produto']) != null) {
                      $idProduto = $_POST['produto'];
                      $idCliente = $_POST['cliente'];


                      $rows = $relatorio->vendascliente($perm, $idProduto, $idCliente);
                    } else {
                      $rows = (new Relatorio)->vendascliente($perm, $idProduto, $idCliente);
                    }

                    $rows = json_decode($rows, true);
                    foreach ($rows as $row) {
                      if (isset($row['QuantItens']) != null) {

                        $qi = $row['quantitens'];
                        $qiv = $row['QuantItensVend'];
                        $r = $qi - $qiv;
                        echo '<tr> 
                       <td>' . $row['Produto_CodRefProduto'] . '</td>
                       <td>' . $row['NomeCliente'] . '</td>
                       <td>' . $row['NomeProduto'] . '</td>
                                <td>' . $qi . '</td>
                                <td>' . $row['datareg'] . '</td>
                                
                              </tr>';
                      }
                      unset($_POST);
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </section>
            <!--result -->
          <?php } else {
                echo "<p>Você não tem permissão para visualizar este conteúdo!</p>";
              } ?>
          </div><!-- col-md-12 -->
        </div> <!-- box-body -->
      </div><!--box-->
    </div><!--row -->
  </section> <!--content -->

</div><!-- content-wrapper -->

<?php
echo  $footer;
echo $javascript;
?>