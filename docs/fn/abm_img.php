<?PHP
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include('conexion.php'); ?>
<!-- Cargar Imagen -->
<?PHP
if ($_REQUEST['abm']=='a'){
	// Recibo los datos de la imagen 
	$inombre = $_FILES['imagen']['name'];
	$tipo    = $_FILES['imagen']['type'];
	$tamano  = $_FILES['imagen']['size'];
	$tmp_nn  = $_FILES['imagen']['tmp_name'];
	$error   = $_FILES['imagen']['error'];
	
	switch ($tipo) 
	{ 	case 'application/pdf':
			$qtipo = "pdf";
			break;
		case 'image/jpeg':
			$qtipo = "jpeg";
			break;
		case 'image/jpg':
			$qtipo = "jpg";
			break;
		case 'image/png':
			$qtipo = "png";
			break;
		case 'image/gif':
			$qtipo = "gif";
			break; };

$query="INSERT INTO imagen (
	`tipoImagen`,
	`idInmueble`,
	`detalleImagen`,
	`ordenImagen`,
	`baja`
	)VALUES(
	'$qtipo',	
	'$_REQUEST[idInmueble]',
	'$_REQUEST[detalleImagen]',
	'0',
	'0')";
	$result = mysqli_query($conexion, $query);
	if (mysqli_affected_rows($conexion)>0){
		$queryimagen="SELECT * FROM imagen WHERE idInmueble = '$_REQUEST[idInmueble]' AND baja != '1' ORDER BY idImagen DESC LIMIT 1";
		$rtsimagen = mysqli_query($conexion, $queryimagen);
		$img=mysqli_fetch_assoc($rtsimagen);
		$id_new=$img['idImagen'];
		$nombre=str_pad($id_new, 8, "0", STR_PAD_LEFT) . "." . $qtipo;
	
		// Ruta donde se guardaran las imagenes cuando se ejecuta Local
    	//$directorio = $_SERVER['DOCUMENT_ROOT'].$_SESSION['sesionc_Path'].'/enlaceinmobiliario/docs/assets/images/inmuebles/';
		// Ruta donde se guardaran las imagenes cuando se ejecuta en al web
    	$directorio = $_SERVER['DOCUMENT_ROOT'].$_SESSION['sesionc_Path'].'/gestion/assets/images/inmuebles/';
		
		$fullpath=$directorio.$nombre;
		//echo "Nombre: " . $nombre;
		//echo "<BR> tipo: " . $qtipo;
		//echo "<BR> ID: " . $id_new;
		//echo "<BR> URL: " . $directorio;
		//echo "<BR> URL FULL: ". $fullpath;
		//echo "<BR> IMAGEN: ". $inombre;
		//echo "<BR> TMP: ". $tmp_nn;
		//echo "<BR> Error: ". $error;	
		
		if (move_uploaded_file($_FILES['imagen']['tmp_name'],$fullpath)) {
		//if (copy($_FILES['imagen']['tmp_name'],$fullpath)) { ?>
        <script>
        	//alert("Datos cargados correctamente"); 
        </script>
        <?PHP } else {
		echo "<BR>Error en la subida de ficheros!\n"; ?>
		<script>
				alert("Ocurrio un Error!!");
		</script>		
		<?PHP } ?>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error al guardar en DB!!");
        </script>
	<?PHP }; ?> 
	

<?PHP }; ?>

<!-- Actualizar Imagen -->
<?PHP
if ($_REQUEST['abm']=='m'){ //Funcion Modificar Pacientes
	$fecha = str_replace("/", "-", $_GET[fecha]);
	$fecha = date("Y-m-d",strtotime($fecha));
	$query="UPDATE consultas SET
	fecha='$fecha',
	matricula='$_GET[matricula]',
	motivo='$_GET[motivo]',
	medicacion='$_GET[medicacion]',
	estudios='$_GET[estudios]',
	WHERE id='$_GET[id_mod]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
           // alert("Datos cargados correctamente");
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
        </script>
	<?PHP }; ?>
<?PHP }; ?>

<!-- Baja de Imagen -->
<?PHP
if ($_REQUEST['abm']=='b'){ 
	$query="UPDATE imagen SET baja='1' WHERE idImagen='$_REQUEST[idImagen]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){
	?>
		<script>
           // alert("Imagen Eliminada correctamente"); 
        </script>
    <?PHP } else {?>
		<script>
            alert("Ocurrio un Error!!");
        </script>
	<?PHP }; ?>    
<?PHP }; ?>

<script>
    location.replace("../inmueble_abm_img.php?idImagen=<?PHP echo $_REQUEST['idInmueble'];?>&idInmueble=<?PHP echo $_REQUEST['idInmueble'];?>");
</script>