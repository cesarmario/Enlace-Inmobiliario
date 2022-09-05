<?PHP
    include('conexion.php');
    $queryusuarios = "SELECT * FROM usuario ORDER BY nombreUsuario DESC";
    $rtsusuarios = mysqli_query($conexion, $queryusuarios);

    $listadoUsuarios = "<table class='table table-striped' id='table1'>";
    $listadoUsuarios .= "<thead>";
    $listadoUsuarios .= "<tr>";
    $listadoUsuarios .= "<th>Usuario</th>";
    $listadoUsuarios .= "<th>Contraseña</th>";
    $listadoUsuarios .= "<th>Nombre y Apellido</th>";
    $listadoUsuarios .= "<th>Matrícula</th>";
    $listadoUsuarios .= "<th>Mail</th>";
    $listadoUsuarios .= "<th>Teléfono</th>";
    $listadoUsuarios .= "<th>Rol</th>";
    $listadoUsuarios .= "<th></th>";
    $listadoUsuarios .= "<th></th>";
    $listadoUsuarios .= "</tr>";
    $listadoUsuarios .= "</thead>";
    $listadoUsuarios .= "<tbody>";
    while($usuarios=mysqli_fetch_assoc($rtsusuarios)){
        $listadoUsuarios .= "<tr>";
        $listadoUsuarios .= "<td>". $usuarios['uidUsuario'] . "</td>";
        $listadoUsuarios .= "<td>". $usuarios['pswUsuario'] . "</td>";
        $listadoUsuarios .= "<td>". $usuarios['nombreUsuario'] . "</td>";
        $listadoUsuarios .= "<td>". $usuarios['matriculaUsuario'] . "</td>";
        $listadoUsuarios .= "<td>". $usuarios['mailUsuario'] . "</td>";
        $listadoUsuarios .= "<td><b>". $usuarios['telefonoUsuario'] . "</td>";
        $listadoUsuarios .= "<td><b>". $usuarios['rolUsuario'] . "</td>";        
        $listadoUsuarios .= "<td><a href='usuario_abm.php?idUsuario=". $usuarios['idUsuario'] . "&abm=m' class='btn btn-info me-1 mb-1'>Editar</a></td>";
        $listadoUsuarios .= "</tr>";
    }
    $listadoUsuarios .= "</tbody>";
    $listadoUsuarios .= "</table>";
?>