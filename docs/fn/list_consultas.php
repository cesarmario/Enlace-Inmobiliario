<?PHP
    include('conexion.php');
    $queryconsultas = "SELECT * FROM vista_consulta ORDER BY fechaConsulta DESC";
    $rtsconsultas = mysqli_query($conexion, $queryconsultas);
    $listadoConsultas = "<table class='table table-striped' id='table1'>";
    $listadoConsultas .= "<thead>";
    $listadoConsultas .= "<tr>";
    $listadoConsultas .= "<th>Fecha</th>";
    $listadoConsultas .= "<th>Inmueble</th>";
    $listadoConsultas .= "<th>Agente</th>";
    $listadoConsultas .= "<th>Nombre y Apellido</th>";
    $listadoConsultas .= "<th>Respuesta</th>";
    $listadoConsultas .= "<th></th>";
    $listadoConsultas .= "</tr>";
    $listadoConsultas .= "</thead>";
    $listadoConsultas .= "<tbody>";
    while($consultas=mysqli_fetch_assoc($rtsconsultas)){
        $listadoConsultas .= "<tr>";
        $listadoConsultas .= "<td>". $consultas['fechaConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['tituloInmueble'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['nombreAgente'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['nombreConsulta'] . "</td>";
        $listadoConsultas .= "<td>". $consultas['fechaRespuestaConsulta'] . "</td>";
        $listadoConsultas .= "<td><a href='consulta_abm.php?idConsulta=". $consultas['idConsulta'] ."' class='btn btn-warning me-1 mb-1'>Editar</a></td>";
        $listadoConsultas .= "</tr>";
    }
    $listadoConsultas .= "</tbody>";
    $listadoConsultas .= "</table>";
?>