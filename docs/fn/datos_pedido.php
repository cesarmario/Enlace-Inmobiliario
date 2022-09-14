<?PHP
    //Si la Operacion que estoy haciendo NO es alta osea es "m" o "b" busco los datos del Pedidos  para mostrarlos en el Formulario
    if($_REQUEST['abm']!='a'){ 
        include('conexion.php');
        $querypedidos = "SELECT * FROM vista_pedidos WHERE idPedido = '$_REQUEST[idPedido]' ";
        $rtspedidos = mysqli_query($conexion, $querypedidos);
        $pedido=mysqli_fetch_assoc($rtspedidos);
        $idPropiedad = $pedido['idPropiedad'];
        $nombrePropiedad = $pedido['nombrePropiedad'];
        $idOperacion = $pedido['idOperacion'];
        $nombreOperacion = $pedido['nombreOperacion'];
        $localidadesPedido = $pedido['localidadesPedido'];
        $importeMonedaPedido = $pedido['importeMonedaPedido'];
        $importeDesdePedido = $pedido['importeDesdePedido'];
        $importeHastaPedido = $pedido['importeHastaPedido'];
        $caracteristicasPedido = $pedido['caracteristicasPedido'];
    } else {
        //En caso de que la Operacin sea "a" inicializo todos los campos.    
        $idPropiedad = '';
        $nombrePropiedad = ''; 
        $idOperacion = ''; 
        $nombreOperacion = ''; 
        $localidadesPedido = '';
        $importeMonedaPedido = '';
        $importeDesdePedido = '';
        $importeHastaPedido = '';
        $caracteristicasPedido = '';
        $comentariosPedido = ''; 
    }

?>