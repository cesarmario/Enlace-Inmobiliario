<?PHP session_start();
include('conexion.php'); 
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_REQUEST['abm']=='ap') { //Funcion Alta Propiedad
	$query="INSERT INTO propiedad (
	`nombrePropiedad`,
	`baja`
	)VALUES(
	'$_REQUEST[nombrePropiedad]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../propiedades.php");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../propiedades.php');" class="button"/>
<?PHP } 
} 

if ($_REQUEST['abm']=='ao') { //Funcion Alta Operacion
	$query="INSERT INTO operacion (
	`nombreOperacion`,
	`baja`
	)VALUES(
	'$_REQUEST[nombreOperacion]',
	'0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../operaciones.php");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../operaciones.php');" class="button"/>
<?PHP } 
} ?>

