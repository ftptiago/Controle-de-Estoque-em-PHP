<?php
require_once '../auth.php';
require_once('../Models/itens.class.php');

if (isset($_POST["idItem"]) != null) {

  $resp = (new Itens)->search($_POST["idItem"]);
  // $users = json_decode($resp , true);
  //print_r($resp);
  echo '<ul id="pesqitens" class="list-unstyled ulitens">';
  if ($resp == 0) {
    echo '<li class="liitens">Nenhum resultado encontrado!</li>';
  } else {

    foreach ($resp['data'] as $user) {
      echo  '<li id="li[' . $user['idItens'] . ']" class="liitens">' . $user['idItens'] . ' - ' . $user['NomeProduto'] . '</li>';
    }
    echo '</ul>';
  }
}
