<?PHP
    include('conexion.php');
    $queryInmuebles = "SELECT COUNT(`idInmueble`) AS totalInmuebles FROM inmueble WHERE baja != '1' GROUP BY baja";
    $rtsInmuebles = mysqli_query($conexion, $queryInmuebles);
    $Inmuebles=mysqli_fetch_assoc($rtsInmuebles);

    $queryConsultas = "SELECT COUNT(`idConsulta`) AS totalConsultas FROM consulta WHERE baja != '1' GROUP BY baja";
    $rtsInmuebles = mysqli_query($conexion, $queryConsultas);
    $Consulta=mysqli_fetch_assoc($rtsConsultas);

    $queryPedidos = "SELECT COUNT(`idPedido`) AS totalPedidos FROM pedido WHERE baja != '1' GROUP BY baja";
    $rtsPedidos = mysqli_query($conexion, $queryPedidos);
    $Pedidos=mysqli_fetch_assoc($rtsPedidos)
?>