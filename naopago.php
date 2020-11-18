<?php
  require 'conexao.php';

  $id = $_GET['id'];
  $sql = "UPDATE Consumo set pago = 'N' WHERE id = '$id'";
  $qry = mysqli_query($link, $sql);
  if ($qry) echo "realizado com sucesso";
  else echo "houve um erro";
