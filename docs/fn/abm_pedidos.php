<?PHP session_start();
include('conexion.php');
include('process.php'); 
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
<?PHP } else { ?>
		<script>
			alert("Ocurrio un Error a guardar en la Base de Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../pedidos.php');" class="button"/>
<?PHP } 
} ?>


