<?php
require_once '../../App/auth.php';
if (isset($_GET['clean']) != null && $_GET['clean'] === "cancelar") {

  unset($_SESSION['itens'], $_SESSION['CPF'], $_SESSION['Cliente'], $_SESSION['Email'], $_SESSION['cart']);
  "<meta http-equiv='refresh' content='0;URL=../../views/vendas/'>";
  header('Location: ../../views/vendas/');
}
