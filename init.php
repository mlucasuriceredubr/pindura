<?php
 session_name('uricer_cadastro_');
 session_start();
 session_regenerate_id();
 $link = mysqli_connect('localhost', 'usuarioDoMysql', 'm1sqlA!B@C#', 'dbPindura2');
 if (!$link) die("Erro ao conectar ao banco de dados, contate o suporte");

 function sanitizar($link, $str)
 {
  $str = trim($str);
  $str = htmlentities(mysqli_real_escape_string($link, $str));
  return nl2br(htmlentities(htmlspecialchars($str),ENT_QUOTES, "UTF-8"));
 }
