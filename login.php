<?php
	if ( isset( $_POST['btnAutenticar'] ) ) {
		
		$nmUsuario = $_POST['nmUsuario'];
		$pwUsuario = md5($_POST['pwUsuario']);
		
		$sql = "SELECT idUsuario, nmUsuario, pwUsuario FROM Usuario WHERE nmUsuario = '$nmUsuario' AND pwUsuario = '$pwUsuario' LIMIT 1";
		$qry = mysqli_query($link, $sql);
		$rUsuario = mysqli_fetch_array($qry);
		
		if ($rUsuario['nmUsuario']==$nmUsuario) {
			$_SESSION['UsuarioLogado'] = $nmUsuario;
			$_SESSION['idUsuario'] = $rUsuario['idUsuario'];
			$_SESSION['nmUsuario'] = $rUsuario['nmUsuario'];
			
			$Usuario = $rUsuario;
			
		} else {
			?>
			<div class="alert alert-danger" role="alert">Usu&aacute;rio e/ou senha inv&aacute;lido(s)!</div>
			<?php
		}
		
	}

	if ( isset( $_SESSION ) ) if ( isset( $_SESSION['UsuarioLogado'] ) ) if ( ! isset( $Usuario ) ) {
		$idUsuario = ""; if ( isset($_SESSION['idUsuario']) ) $idUsuario = $_SESSION['idUsuario'];
		$nmUsuario = ""; if ( isset($_SESSION['nmUsuario']) ) $nmUsuario = $_SESSION['nmUsuario'];
		$sql = "SELECT idUsuario, nmUsuario, pwUsuario FROM Usuario ".
			"WHERE nmUsuario = '$nmUsuario' AND idUsuario = '$idUsuario'";
		$qry = mysqli_query($link, $sql);
		$Usuario = mysqli_fetch_array($qry);
	}
	
	if ( ! isset( $Usuario ) ) {
?>

<div class="container">

	<form class="form-signin" role="form" action="?" method="post" enctype="multipart/form-data">
	
		<h2 class="form-signin-heading">Por favor, entre com suas credenciais de acesso</h2>
		
		<input type="text"
			id="nmUsuario" name="nmUsuario"
			class="form-control" placeholder="usuario"
			required="required" autofocus="autofocus"
		/>
		<input type="password"
			id="pwUsuario" name="pwUsuario"
			class="form-control" placeholder="senha"
			required="required"
		/>
		
		<input type="submit"
			id="btnAutenticar" name="btnAutenticar"
			class="btn btn-lg btn-primary btn-block" value="Autenticar"
		/>

	</form>
</div>

<?php
	}

