<?PHP
    include('conexion.php');
    $querypedidos = "SELECT * FROM vista_pedidos ORDER BY fecha DESC";
    $rtspedidos = mysqli_query($conexion, $querypedidos);
    $listadoPedidos = "<table class='table table-striped' id='table1'>";
    $listadoPedidos .= "<thead>";
    $listadoPedidos .= "<tr>";
    $listadoPedidos .= "<th>Agente</th>";
    $listadoPedidos .= "<th>Propiedad</th>";
    $listadoPedidos .= "<th>Operación</th>";
    $listadoPedidos .= "<th>Localidades</th>";
    $listadoPedidos .= "<th>Importe desde</th>";
    $listadoPedidos .= "<th>Importe hasta</th>";
    $listadoPedidos .= "<th>Características</th>";
    $listadoPedidos .= "<th>Comentarios</th>";
    $listadoPedidos .= "<th></th>";
    $listadoPedidos .= "</tr>";
    $listadoPedidos .= "</thead>";
    $listadoPedidos .= "<tbody>";
    while($pedidos=mysqli_fetch_assoc($rtspedidos)){
        $listadoPedidos .= "<tr>";
        $listadoPedidos .= "<td>". $pedidos['nombreAgente'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['nombrePropiedad'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['nombreOperacion'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['localidadesPedido'] . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['importeMonedaPedido'] . "</b>&nbsp;". $pedidos['importeDesdePedido'] . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['importeMonedaPedido'] . "</b>&nbsp;". $pedidos['importeHastaPedido'] . "</td>";
        $listadoPedidos .= "<td>". $pedidos['caracteristicasPedido'] . "</td>";
        $listadoPedidos .= "<td><b>". $pedidos['comentariosPedido'] . "</td>";
        $listadoPedidos .= "<td><a href='pedido_abm.php?idPedido=". $pedido['idPedido'] ."' class='btn btn-warning me-1 mb-1'>Editar</a></td>";
        $listadoPedidos .= "</tr>";
    }
    $listadoPedidos .= "</tbody>";
    $listadoPedidos .= "</table>";
?>
