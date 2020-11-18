<a href="index.php" class="btn btn-success">&lt;- Voltar</a>
<?php
  if (!(isset($Usuario))) die();

  if (isset($_POST)) if (isset($_POST['btnCadastrar'])) {
   $nome = sanitizar($link, $_POST['nome']);
   $descr = sanitizar($link, $_POST['descr']);
   $sql = "INSERT INTO Pessoa VALUES (0, '$nome', '$descr')";
   $qry = mysqli_query($link, $sql);
   if ($qry) {
	?>
	   Cadastro realizado com sucesso!

	<script type="text/JavaScript">
		setTimeout("location = 'index.php'",1000);
	</script>
	<a href="index.php">Clique aqui para voltar ao inicio</a>
   <?php

   } else echo "houve um erro";
  }
?>

  <h2>Cadastrando nova pessoa</h2>

  <form action="?a=cadastrar" method="POST">
   Nome da pessoa: <input type="text" id="nome" name="nome" />
   <br />
   Descri&ccedil;&atilde;o: <input type="text" id="descr" name="descr" />
   <br />
   <input type="submit" value="Cadastrar" name='btnCadastrar' />
  </form>
 </body>
</html>
