<?php
require_once 'App/auth.php';

if($usuario && $perm){

	header('Location: views/');
}else{

header('Location: login.php');
}

?>