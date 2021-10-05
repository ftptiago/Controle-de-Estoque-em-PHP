<?php
require_once '../App/auth.php';
require_once '../layout/script.php';
require_once '../App/Models/relatorios.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';

echo '<section class="content" style="height: auto !important; min-height: 0px !important;">
';

if($perm == 1){
  echo'
      <!-- Small boxes (Stat box) -->     

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>';   
              $relatorio = new Relatorio();
              $r = $relatorio->qtdeItensEstoqueTotal($perm);
              echo $r;

              echo'</h3>

              <p>Qtde. em Estoque</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->';

}
echo '
      <!-- Main row -->
       <!-- Image and text center -->
      <div class="row">

        <div class="col-md-12 text-center">
          <img class="rounded" style="max-width:60%;" src="dist/img/logo.png" alt="logo" /> 
        </div>
        <div class="col-md-12 text-center">  
        <h1 style="text-align:center" > Olá <b>'.$username.'</b>, seja bem vindo <br> ao seu Controle de estoque em PHP!</h1>
        <h3><a href="https://www.youtube.com/watch?v=5P9djMO2Soo&list=PLBiFBs8xc7Wk7GJu_GmJQNtY4FebJ6H8x" target="_blank">Link para a playlist do projeto</a></h3>
        <p>Aproveite para se inscrever no canal</p>       

        <div class="g-ytsubscribe" data-channel="ftptiago" data-layout="default" data-count="hidden"></div>
        
        </div>
      </div>

      <!-- Image and text center -->

    </section>

</div>
';
echo  $footer;
echo $javascript;
?>