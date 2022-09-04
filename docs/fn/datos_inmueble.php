<?PHP
    //Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Inmuebles  para mostrarlos en el Formulario
    if($_REQUEST['abm']!='a'){ 
        include('conexion.php');
        $queryinmueble = "SELECT * FROM vista_inmuebles WHERE idInmueble = '$_REQUEST[idInmueble]' ";
        $rtsinmueble = mysqli_query($conexion, $queryinmueble);
        $inmueble=mysqli_fetch_assoc($rtsinmueble);
        $idPropiedad = $inmueble['idPropiedad'];
        $nombrePropiedad = $inmueble['nombrePropiedad'];
        $idOperacion = $inmueble['idOperacion'];
        $nombreOperacion = $inmueble['nombreOperacion'];
        $idLocalidad = $inmueble['idLocalidad'];
        $nombreLocalidad = $inmueble['nombreLocalidad'];
        $tituloInmueble = $inmueble['tituloInmueble'];
        $descripcionInmueble = $inmueble['descripcionInmueble'];
        $domicilioCalleInmueble = $inmueble['domicilioCalleInmueble'];
        $domicilioNumeroInmueble = $inmueble['domicilioNumeroInmueble'];
        $domicilioOrientacionInmueble = $inmueble['domicilioOrientacionInmueble'];
        $habitacionesInmueble = $inmueble['habitacionesInmueble'];
        $banosInmueble = $inmueble['banosInmueble'];
        $superficieCubiertaInmueble = $inmueble['superficieCubiertaInmueble'];
        $superficieTotalInmueble = $inmueble['superficieTotalInmueble'];
        $informacionAdicionalInmueble = $inmueble['informacionAdicionalInmueble'];
        $valorInmueble = $inmueble['valorInmueble'];
        $monedaInmueble = $inmueble['monedaInmueble'];
    
    } else {
        //En caso de que la Operacin sea "a" inicializo todos los campos.    
        $idPropiedad = '';
        $nombrePropiedad = ''; 
        $idOperacion = ''; 
        $nombreOperacion = ''; 
        $idLocalidad = ''; 
        $nombreLocalidad = ''; 
        $tituloInmueble = ''; 
        $descripcionInmueble = ''; 
        $domicilioCalleInmueble = ''; 
        $domicilioNumeroInmueble = ''; 
        $domicilioOrientacionInmueble = ''; 
        $habitacionesInmueble = ''; 
        $banosInmueble = ''; 
        $superficieCubiertaInmueble = ''; 
        $superficieTotalInmueble = ''; 
        $informacionAdicionalInmueble = ''; 
        $valorInmueble = ''; 
        $monedaInmueble = '';
    }

?>