<?PHP
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include('conexion.php'); 
include('process.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
?>

<!-- Cargar Imagen -->
<?PHP
if ($_REQUEST['abm']=='a' or $_REQUEST['abm']=='m'){

	if (!isset($_FILES['video'])){ ?>

		<script>
            alert("Debe seleccionar una Video!");
			window.history.back();
        </script>

	<?PHP } else {

        // Recibo los datos de la imagen 
        $inombre = $_FILES['video']['name'];
        $tipo    = $_FILES['video']['type'];
        $tamano  = $_FILES['video']['size'];
        $tmp_nn  = $_FILES['video']['tmp_name'];
        $error   = $_FILES['video']['error'];

        $id_new=$_REQUEST['idInmueble'];
        $nombre=str_pad($id_new, 8, "0", STR_PAD_LEFT) . "." . $tipo;
        // Ruta donde se guardaran las imagenes cuando se ejecuta Local
        //$directorio = $_SERVER['DOCUMENT_ROOT'].$_SESSION['sesionc_Path'].'/enlaceinmobiliario/docs/assets/images/inmuebles/';
        // Ruta donde se guardaran las imagenes cuando se ejecuta en al web
        $directorio = $_SERVER['DOCUMENT_ROOT'].$_SESSION['sesionc_Path'].'/gestion/assets/videos/';
        
        $fullpath=$directorio.$nombre;
        //echo "Nombre: " . $nombre;
        //echo "<BR> tipo: " . $qtipo;
        //echo "<BR> ID: " . $id_new;
        //echo "<BR> URL: " . $directorio;
        //echo "<BR> URL FULL: ". $fullpath;
        //echo "<BR> IMAGEN: ". $inombre;
        //echo "<BR> TMP: ". $tmp_nn;
        //echo "<BR> Error: ". $error;	
        
        if (move_uploaded_file($_FILES['video']['tmp_name'],$fullpath)) {
        //if (copy($_FILES['imagen']['tmp_name'],$fullpath)) { ?>
        <script>
            //alert("Datos cargados correctamente"); 
        </script>
        <?PHP } else {
        echo "<BR>Error en la subida de ficheros!\n"; ?>
        <script>
                alert("Ocurrio un Error!!");
        </script>		
        <?PHP }

	} ?>	
		
<?PHP } ?>

<!-- Baja de Imagen -->
<?PHP
if ($_REQUEST['abm']=='bm' or $_REQUEST['abm']=='ba'){ 
	$query="UPDATE imagen SET baja='1' WHERE idImagen='$_REQUEST[idImagen]'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_affected_rows($conexion)>0){ ?>
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
    location.replace("../inmueble_abm.php?idInmueble=<?PHP echo $_REQUEST['idInmueble'];?>&abm=m");
</script>