<?php require 'init.php'; ?>
<!doctype html>
<html lang="pt_BR">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Software de controle informal de consumo | URI Erechim</title>
 </head>
 <body>
  <h1>Sistema simples para controle informal de consumo</h1>

    <?php
    require 'login.php';
	if (isset($Usuario)) {
	    $a = "";
	    if (isset($_GET)) if (isset($_GET['a'])) $a = $_GET['a'];
	    if ($a=="listar") include 'listar.php';
	    if ($a=="cadastrar") include 'cadastrar.php';
	    if ($a=="") {
	      ?>
	      <h2><a href="?a=listar" class="btn btn-light">Listar contas</a></h2>
	      <h2><a href="?a=cadastrar" class="btn btn-light">Cadastrar uma nova pessoa</a></h2>
	      <h2><a href="logoff.php" class="btn btn-light">Sair do sistema</a></h2>
	      <?php
	    }
	}
    ?>
 
 </body>
</html>
