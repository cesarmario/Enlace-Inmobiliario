<?PHP
    include('conexion.php');
    $queryimagenes = "SELECT * FROM imagen WHERE idInmueble = '$_REQUEST[idInmueble]' AND baja != '1' ORDER BY idImagen ASC";
    $rtsimagenes = mysqli_query($conexion, $queryimagenes);
    $listado = "<table class='table table-lg'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>Imagen</th>";
    $listado .= "<th>Detalles de la Imagen</th>";
    $listado .= "<th>Eliminar</th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($imagenes=mysqli_fetch_assoc($rtsimagenes)){

        $imagen = "assets/images/inmuebles/" . str_pad($imagenes['idImagen'], 8, "0", STR_PAD_LEFT) . "." . $imagenes['tipoImagen'];
        
        $listado .= "<tr>";
        $listado .= "<td><a href='". $imagen . "' target='_blank'><img src='". $imagen . "' height='70px'></a></td>";
        $listado .= "<td>". $imagenes['detalleImagen'] . "</td>";
        $listado .= "<td><a href='fn/abm_img.php?idImagen=". $imagenes['idImagen'] . "&idInmueble=". $_REQUEST['idInmueble'] ."&abm=b' class='btn btn-danger me-1 mb-1'><i class='fa-solid fa-trash-can'></i></i></a></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";

    $queryinmuebles = "SELECT * FROM vista_inmuebles WHERE idInmueble = '$_REQUEST[idInmueble]' ";
    $rtsinmuebles = mysqli_query($conexion, $queryinmuebles);
    $inmuebles=mysqli_fetch_assoc($rtsinmuebles);

?>