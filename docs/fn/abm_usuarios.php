<?PHP session_start();
include('conexion.php'); 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
$fecha = date("Y-m-d H:i:s");

if ($_SESSION['rolUsu'] =='1'){$return="usuarios.php";}else{$return="index.php";}

if ($_REQUEST['abm']=='a') { //Funcion Alta Inmueble
	$query="INSERT INTO usuario (
	`uidUsuario`,
	`pswUsuario`,
	`nombreUsuario`,
	`matriculaUsuario`,
	`mailUsuario`,
	`telefonoUsuario`,
	`rolUsuario`,
	`baja`
	)VALUES(
	'$_REQUEST[uidUsuario]',
	md5('$_REQUEST[pswUsuario]'),
	'$_REQUEST[nombreUsuario]',
	'$_REQUEST[matriculaUsuario]',
	'$_REQUEST[mailUsuario]',
	'$_REQUEST[telefonoUsuario]',
	'2',
    '0')";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
        	location.replace("../<?PHP echo $return;?>");
        </script>		
<?PHP } else { 
		?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../<?PHP echo $return;?>');" class="button"/>
<?PHP } 
} ?>

<?php 
if ($_REQUEST['abm']=='m') { //Funcion Modificar Inmueble

	$query="UPDATE usuario SET
	uidUsuario='$_REQUEST[uidUsuario]',
	nombreUsuario='$_REQUEST[nombreUsuario]',
	matriculaUsuario='$_REQUEST[matriculaUsuario]',
	mailUsuario='$_REQUEST[mailUsuario]',
	telefonoUsuario='$_REQUEST[telefonoUsuario]'WHERE idUsuario = '$_REQUEST[idUsuario]' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
       		location.replace("../<?PHP echo $return;?>");
        </script>		
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../<?PHP echo $return;?>');" class="button"/>
	<?PHP } 
} ?>

<?php 
if ($_REQUEST['abm']=='p') { //Funcion Modificar Inmueble

	$query="UPDATE usuario SET pswUsuario = md5('$_REQUEST[pswUsuario]') WHERE idUsuario = '$_REQUEST[idUsuario]' ";
	$result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
		<script>
       		location.replace("../<?PHP echo $return;?>");
        </script>		
	<?PHP } else { 	?>
		<script>
			alert("Ocurrio un Error al guardar en los Datos!!");
		</script>
		<input type ='button' value = 'Volver' onClick="location.replace('../<?PHP echo $return;?>');" class="button"/>
	<?PHP } 
} ?>