<?PHP session_start();
include('conexion.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='a') { //Funcion Alta Inmueble
	$query="INSERT INTO pedido (	
	`idPropiedad`,
	`idOperacion`,
	`localidadesPedido`,
	`importeMonedaPedido`,
	`importeDesdePedido`,
	`importeHastaPedido`,
	`caracteristicasPedido`,
	`comentariosPedido`,
	`idUsuario`,
	`baja`
	)VALUES(
	'$_REQUEST[idPropiedad]',
	'$_REQUEST[idOperacion]',
	'$_REQUEST[localidadesPedido]',
	'$_REQUEST[importeMonedaPedido]',
	'$_REQUEST[importeDesdePedido]',
	'$_REQUEST[importeHastaPedido]',
	'$_REQUEST[caracteristicasPedido]',
	'$_REQUEST[comentariosPedido]',
	'$_SESSION[idUsu]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../pedidos.php");
        </script>		
<?PHP } else { 
	//	echo '<br>idPropiedad: ' . $_REQUEST['idPropiedad']; 
	//	echo '<br>idOperacion: ' . $_REQUEST['idOperacion']; 
	//	echo '<br>idLocalidad: ' . $_REQUEST['idLocalidad']; 
	//	echo '<br>tituloInmueble: ' . $_REQUEST['tituloInmueble']; 
	//	echo '<br>descripcionInmueble: ' . $_REQUEST['descripcionInmueble']; 
	//	echo '<br>domicilioCalleInmueble: ' . $_REQUEST['domicilioCalleInmueble']; 
	//	echo '<br>domicilioNumeroInmueble: ' . $_REQUEST['domicilioNumeroInmueble']; 
	//	echo '<br>domicilioOrientacionInmueble: ' . $_REQUEST['domicilioOrientacionInmueble']; 
	//	echo '<br>habitacionesInmueble: ' . $_REQUEST['habitacionesInmueble']; 
	//	echo '<br>banosInmueble: ' . $_REQUEST['banosInmueble']; 
	//	echo '<br>superficieCubiertaInmueble: ' . $_REQUEST['superficieCubiertaInmueble']; 
	//	echo '<br>superficieTotalInmueble: ' . $_REQUEST['superficieTotalInmueble']; 
	//	echo '<br>informacionAdicionalInmueble: ' . $_REQUEST['informacionAdicionalInmueble']; 
	//	echo '<br>valorInmueble: ' . $_REQUEST['valorInmueble']; 
	//	echo '<br>monedaInmueble: ' . $_REQUEST['monedaInmueble'];
	//	echo '<br>agenteInmueble: ' . $_SESSION['idUsu'] .'<br>';
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../pedidos.php');" class="button"/>
<?PHP } 
} ?>


