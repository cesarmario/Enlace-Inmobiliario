<?PHP
    include('conexion.php');
    $querypropiedades = "SELECT * FROM propiedad ORDER BY nombrePropiedad ASC";
    $rtspropiedades = mysqli_query($conexion, $querypropiedades);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th>#</th>";
    $listado .= "<th>Nombre</th>";
    $listado .= "<th>Estado</th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($propiedades=mysqli_fetch_assoc($rtspropiedades)){
        if($propiedades["baja"]==0){
            $estado="Activo";
            $btn="success";
        }else{
            $estado="Baja";
            $btn="danger";
        }
        
        $listado .= "<tr>";
        $listado .= "<td>". $propiedades['idPropiedad'] . "</td>";
        $listado .= "<td>". $propiedades['nombrePropiedad'] . "</td>";
        $listado .= "<td><span class='badge bg-success'>" . $estado . "</span></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";
?>