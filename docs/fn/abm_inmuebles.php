<?PHP session_start();
include('conexion.php'); 
//error_reporting(E_ALL ^ E_NOTICE); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$actual = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='a') { //Funcion Alta Inmueble
	$query="INSERT INTO inmueble (
	`idPropiedad`,
	`idOperacion`,
	`idLocalidad`,
	`tituloInmueble`,
	`descripcionInmueble`,
	`domicilioCalleInmueble`,
	`domicilioNumeroInmueble`,
	`domicilioOrientacionInmueble`,
	`habitacionesInmueble`,
	`banosInmueble`,
	`superficieCubiertaInmueble`,
	`superficieTotalInmueble`,
	`InformacionAdicionalInmueble`,
	`agenteInmueble`,
	`valorInmueble`,
	`monedaInmueble`,
	`fecha`,
	`baja`
	)VALUES(
	'$_REQUEST[idPropiedad]',
	'$_REQUEST[idOperacion]',
	'$_REQUEST[idLocalidad]',
	'$_REQUEST[tituloInmueble]',
	'$_REQUEST[descripcionInmueble]',
	'$_REQUEST[domicilioCalleInmueble]',
	'$_REQUEST[domicilioNumeroInmueble]',
	'$_REQUEST[domicilioOrientacionInmueble]',
	'$_REQUEST[habitacionesInmueble]',
	'$_REQUEST[banosInmueble]',
	'$_REQUEST[superficieCubiertaInmueble]',
	'$_REQUEST[superficieTotalInmueble]',
	'$_REQUEST[InformacionAdicionalInmueble]',
	'$_SESSION['idUsu'],
	'$_REQUEST[valorInmueble]',
	'$_REQUEST[monedaInmueble]',
	'$actual',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../inmueble_abm.php");
        </script>		
<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../index.php');" class="button"/>
<?PHP } 
} ?>


