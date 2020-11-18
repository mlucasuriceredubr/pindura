<a href="index.php" class="btn btn-success">&lt;- Voltar</a>
<?php
  if (!(isset($Usuario))) die();


  if (isset($_GET['pago'])) {
    $id = sanitizar($link, $_GET['id']);
    $stmt = mysqli_prepare($link, "UPDATE Consumo set pago = 'S' WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "d", $id);
    mysqli_stmt_execute($stmt);
  }
  if (isset($_GET['naopago'])) {
    $id = sanitizar($link, $_GET['id']);
    $stmt = mysqli_prepare($link, "UPDATE Consumo set pago = 'N' WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "d", $id);
    mysqli_stmt_execute($stmt);
  }

  $sql = "SELECT * FROM Pessoa ORDER BY nmPessoa";
  $qry = mysqli_query($link, $sql);
  while($Pessoa = mysqli_fetch_array($qry)) {
?>
   <div class="mx-auto border border-primary rounded-lg" style=" padding: 2%; margin: 1%; ">
    <h3><?php echo $Pessoa['nmPessoa']; ?></h3>
    <div class="row">
     <div class="col-sm-3">
      <strong>C&oacute;digo:</strong> <?php echo $Pessoa['idPessoa']; ?>
     </div>
     <div class="col-sm-9">
      <strong>Descri&ccedil;&atilde;o:</strong> <?php echo $Pessoa['dsPessoa']; ?>
     </div>
    </div>
    <hr />
    <table class="table table-striped">
     <thead>
      <th>#</th>
      <th>Consumo registrado</th>
      <th>Valor</th>
      <th>Pago</th>
      <th>&nbsp;</th>
     </thead>
     <tbody>
      <?php
       $idPessoa = $Pessoa['idPessoa'];
       $sql2 = "SELECT * FROM Consumo WHERE idPessoa = '$idPessoa'";
       $qry2 = mysqli_query($link, $sql2);
       while($Consumo = mysqli_fetch_array($qry2)) {
        ?>
	<tr>
         <td><?php echo $Consumo['id']; ?></td>
	 <td><?php echo $Consumo['descritivo']; ?></td>
         <td><?php echo $Consumo['valor']; ?></td>
         <td><?php echo $Consumo['pago']; ?></td>
	 <td><a class="btn btn-default" href="?a=listar&pago=true&id=<?php echo $Consumo['id']; ?>">Marcar como pago</a>
	 <a class="btn btn-default" href="?a=listar&naopago=true&id=<?php echo $Consumo['id']; ?>">Marcar como n&atilde;o pago</a></td>
        </tr>
        <?php
       }
      ?>
     </tbody>
     <tfoot>
       <form action="novoconsumo.php" method="GET">
         <input type="hidden" name="idPessoa" value="<?php echo $idPessoa; ?>" />
         Cadastrar novo consumo: <input type="text" name="descritivo" /> Valor: <input type="text" name="valor" /> <input type="submit" class="btn btn-info" value="Inserir" />
       </form>
     </tfoot>
    </table>
   </div>
<?php
  }
?>
