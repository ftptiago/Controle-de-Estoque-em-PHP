<?php
require_once '../auth.php';

if (isset($_GET['clean']) && $_GET['clean'] == "cancelar") {

  unset(
    $_SESSION['itens'],
    $_SESSION['CPF'],
    $_SESSION['Cliente'],
    $_SESSION['Email'],
    $_SESSION['cart']
  );
  echo "<meta http-equiv='refresh' content='0;URL=../../views/vendas/'>";
}
