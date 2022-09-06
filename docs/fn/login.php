<?PHP
session_start();
error_reporting(E_ALL);
include('conexion.php');
$actual = date("Y-m-d H:i:s");
//Ejecucion de la sentencia SQL

$qlogin="SELECT * FROM usuario WHERE uidUsuario = '$_REQUEST[usu]' AND pswUsuario = md5('$_REQUEST[psw]')";
$result=mysqli_query($conexion,$qlogin);
if (mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
	$_SESSION['idUsu']	= $row['idUsuario'];
	$_SESSION['uidUsu'] = $row['uidUsuario'];
	$_SESSION['nomUsu'] = $row['nombreUsuario'];
	$_SESSION['rolUsu'] = $row['rolUsuario'];
	$_SESSION['matUsu'] = $row['matriculaUsuario'];
	
	$_SESSION['filtroInmuebleUsu'] = "";
    $_SESSION['filtroConsultaUsu'] = "";
    $_SESSION['filtroPedidoUsu'] = "";
    if ($_SESSION['rolUsu']!='1') { 
		 $_SESSION['filtroInmuebleUsu'] = " AND agenteInmueble=" . $_SESSION['idUsu'];
         $_SESSION['filtroConsultaUsu'] = " AND idAgenteInmueble=" . $_SESSION['idUsu'];
         $_SESSION['filtroPedidoUsu']   = " AND idUsuario=" . $_SESSION['idUsu'];
    }

	if ($row['baja']==0) { ?>
		<script>	
			location.replace("../index.php");
		</script>
	<?PHP } else { ?>
		<script>
			alert("El Usuario se encuentra inhabilitado!");
			location.replace("../login.html");
		</script>
	<?PHP } ?>		
<?PHP } else { ?>
	<script>
		alert("El Usuario o la Clave son incorrectas,\n \n Vuelva a intentarlo");
		location.replace("../login.html");
	</script>
<?PHP } ?>