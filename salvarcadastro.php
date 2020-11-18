<?php
  require 'conexao.php';

  $nome = $_GET['nome'];
  $descr = $_GET['descr'];
  $sql = "INSERT INTO Pessoa VALUES (0, '$nome', '$descr')";
  $qry = mysqli_query($link, $sql);
  if ($qry) echo "realizado com sucesso";
  else echo "houve um erro";
