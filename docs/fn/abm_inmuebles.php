<?PHP session_start();
include('conexion.php'); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

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
	`informacionAdicionalInmueble`,	
	`valorInmueble`,
	`monedaInmueble`,
	`agenteInmueble`,
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
	'$_REQUEST[informacionAdicionalInmueble]',
	'$_REQUEST[valorInmueble]',
	'$_REQUEST[monedaInmueble]',
	'$_SESSION[idUsu]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ 
		
		$queryctrl="SELECT * FROM inmueble WHERE baja != '1' ORDER BY idInmueble DESC LIMIT 1";
		$rtsctrl = mysqli_query($conexion, $queryctrl);
		$ctrl=mysqli_fetch_assoc($rtsctrl);
		$idInmueble=$ctrl['idInmueble'];		
		?>
		<script>
			location.replace("../inmueble_abm_img.php?idInmueble=<?PHP echo $idInmueble;?>");
        //	location.replace("../inmuebles.php");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../inmuebles.php');" class="button"/>
<?PHP } 
} ?>

<?php 
if ($_REQUEST['abm']=='m') { //Funcion Modificar Inmueble

	$query="UPDATE inmueble  SET
	idPropiedad='$_REQUEST[idPropiedad]',
	idOperacion='$_REQUEST[idOperacion]',
	idLocalidad='$_REQUEST[idLocalidad]',
	tituloInmueble='$_REQUEST[tituloInmueble]',
	descripcionInmueble='$_REQUEST[descripcionInmueble]',
	domicilioCalleInmueble='$_REQUEST[domicilioCalleInmueble]',
	domicilioNumeroInmueble='$_REQUEST[domicilioNumeroInmueble]',
	domicilioOrientacionInmueble='$_REQUEST[domicilioOrientacionInmueble]',
	habitacionesInmueble='$_REQUEST[habitacionesInmueble]',
	banosInmueble='$_REQUEST[banosInmueble]',
	superficieCubiertaInmueble='$_REQUEST[superficieCubiertaInmueble]',
	superficieTotalInmueble='$_REQUEST[superficieTotalInmueble]',
	informacionAdicionalInmueble='$_REQUEST[informacionAdicionalInmueble]',
	valorInmueble='$_REQUEST[valorInmueble]',
	monedaInmueble='$_REQUEST[monedaInmueble]' WHERE idInmueble = '$_REQUEST[idInmueble]' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
		?>
		<script>
       		location.replace("../inmuebles.php");
        </script>		
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../inmuebles.php');" class="button"/>
	<?PHP } 
} ?>

<?PHP 
//echo '<br>idPropiedad: ' . $_REQUEST['idPropiedad']; 
//echo '<br>idOperacion: ' . $_REQUEST['idOperacion']; 
//echo '<br>idLocalidad: ' . $_REQUEST['idLocalidad']; 
//echo '<br>tituloInmueble: ' . $_REQUEST['tituloInmueble']; 
//echo '<br>descripcionInmueble: ' . $_REQUEST['descripcionInmueble']; 
//echo '<br>domicilioCalleInmueble: ' . $_REQUEST['domicilioCalleInmueble']; 
//echo '<br>domicilioNumeroInmueble: ' . $_REQUEST['domicilioNumeroInmueble']; 
//echo '<br>domicilioOrientacionInmueble: ' . $_REQUEST['domicilioOrientacionInmueble']; 
//echo '<br>habitacionesInmueble: ' . $_REQUEST['habitacionesInmueble']; 
//echo '<br>banosInmueble: ' . $_REQUEST['banosInmueble']; 
//echo '<br>superficieCubiertaInmueble: ' . $_REQUEST['superficieCubiertaInmueble']; 
//echo '<br>superficieTotalInmueble: ' . $_REQUEST['superficieTotalInmueble']; 
//echo '<br>informacionAdicionalInmueble: ' . $_REQUEST['informacionAdicionalInmueble']; 
//echo '<br>valorInmueble: ' . $_REQUEST['valorInmueble']; 
//echo '<br>monedaInmueble: ' . $_REQUEST['monedaInmueble'];
//echo '<br>agenteInmueble: ' . $_SESSION['idUsu'] .'<br>';

?>

