<?PHP
    include('conexion.php');
    $queryinmuebles = "SELECT * FROM inmueble ORDER BY fecha DESC";
    $rtsinmuebles = mysqli_query($conexion, $queryinmuebles);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>Titulo</th>";
    $listado .= "<th>Domicilio</th>";
    $listado .= "<th>Localidad</th>";
    $listado .= "<th>Valor</th>";
    $listado .= "<th>Operacion</th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($inmuebles=mysqli_fetch_assoc($rtsinmuebles)){
        $listado .= "<tr>";
        $listado .= "<td>". $inmuebles['tituloInmueble'] . "</td>";
        $listado .= "<td>". $inmuebles['domicilioCalleInmueble'] . "</td>";
        $listado .= "<td>". $inmuebles['idLocalidad'] . "</td>";
        $listado .= "<td>". $inmuebles['valorInmueble'] . "</td>";
        $listado .= "<td><span class='badge bg-success'>" . $inmuebles['idOperacion'] . "</span></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";
?>