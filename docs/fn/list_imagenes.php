<?PHP
    include('conexion.php');
    $queryimagenes = "SELECT * FROM imagen WHERE idInmueble = '$_REQUEST[idInmueble]' AND baja != '1' ORDER BY idImagen ASC";
    $rtsimagenes = mysqli_query($conexion, $queryimagenes);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>Imagen</th>";
    $listado .= "<th>Detalle</th>";
    $listado .= "<th></th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($imagenes=mysqli_fetch_assoc($rtsimagenes)){
        if($imagenes["baja"]==0){
            $estado="Activo";
            $btn="success";
        }else{
            $estado="Baja";
            $btn="danger";
        }
        $imagen = "assets/images/inmuebles/" . str_pad($imagenes['idImagen'], 8, "0", STR_PAD_LEFT) . "." . $imagenes['tipoImagen'];
        
        $listado .= "<tr>";
        $listado .= "<td><a href='". $imagen . "' target='_blank'><img src='". $imagen . "' height='70px'></a></td>";
        $listado .= "<td>". $imagenes['detalleImagen'] . "</td>";
        $listado .= "<td><a href='fn/abm_img.php?idImagen=". $imagenes['idImagen'] . "&idInmueble=". $_REQUEST['idInmueble'] ."&abm=b' class='btn btn-danger me-1 mb-1'>Eliminar</a></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";

    $queryinmuebles = "SELECT * FROM vista_inmuebles WHERE idInmueble = '$_REQUEST[idInmueble]' ";
    $rtsinmuebles = mysqli_query($conexion, $queryinmuebles);
    $inmuebles=mysqli_fetch_assoc($rtsinmuebles);

?>