<!doctype html>
<html lang="pt_BR">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Software de controle informal de consumo | URI Erechim</title>

  <style type="text/css">
   .rounded-lg { border-radius: 1em !important; }
  </style>

 </head>
 <body style=" padding: 5%; ">

  <h1>Sistema simples para controle informal de consumo</h1>

  <h2>Listagem de contas</h2>

<?php
  require 'conexao.php';

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
	 <td><a class="btn btn-default" href="pago.php?id=<?php echo $Consumo['id']; ?>">Marcar como pago</a>
	 <a class="btn btn-default" href="naopago.php?id=<?php echo $Consumo['id']; ?>">Marcar como n&atilde;o pago</a></td>
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
 </body>
</html>
