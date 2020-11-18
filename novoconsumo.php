<?php
  require 'conexao.php';

  $descritivo = $_GET['descritivo'];
  $valor = $_GET['valor'];
  $idPessoa = $_GET['idPessoa'];
  $sql = "INSERT INTO Consumo VALUES (0, '$descritivo', '$valor', 'N', '$idPessoa')";
  $qry = mysqli_query($link, $sql);
  if ($qry) echo "realizado com sucesso";
  else echo "houve um erro";
