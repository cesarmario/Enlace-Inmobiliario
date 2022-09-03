<?PHP
    include('conexion.php');
    $queryconsultas = "SELECT * FROM consulta ORDER BY fechaConsulta DESC";
    $rtsconsultas = mysqli_query($conexion, $queryconsultas);
    $listadoConsultas = "<table class='table table-striped' id='table1'>";
    $listadoConsultas .= "<thead>";
    $listadoConsultas .= "<tr>";
    $listadoConsultas .= "<th>Propiedad</th>";
    $listadoConsultas .= "<th>Operación</th>";
    $listadoConsultas .= "<th>Agente</th>";
    $listadoConsultas .= "<th>Nombre y Apellido</th>";
    $listadoConsultas .= "<th>Teléfono</th>";
    $listadoConsultas .= "<th>Fecha de Consulta</th>";
    $listadoConsultas .= "<th>Fecha de Respuesta</th>";   
    $listadoConsultas .= "<th></th>";
    $listadoConsultas .= "</tr>";
    $listadoConsultas .= "</thead>";
    $listadoConsultas .= "<tbody>";
    while($consultas=mysqli_fetch_assoc($rtsconsultas)){
        $listadoConsultas .= "<tr>";
        $listadoConsultas .= "<td>". $consultas['idInmueble'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['idOperacion'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['idAgenteInmueble'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['nombreConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['telefonoConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['fechaConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['fechaRespuestaConsulta'] . "</td>";
        $listadoConsultas .= "<td><a href='consulta_abm.php?idConsulta=". $consultas['idConsulta'] ."' class='btn btn-warning me-1 mb-1'>Editar</a></td>";
        $listadoConsultas .= "</tr>";
    }
    $listadoConsultas .= "</tbody>";
    $listadoConsultas .= "</table>";
?>
