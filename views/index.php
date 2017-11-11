<?php
require_once '../App/auth.php';
require_once '../layout/script.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';

echo 'Usuário: '.$usuario.'</br>Perfil: ';
echo $perm;

echo '</div>';

echo  $footer;
echo $javascript;
?>