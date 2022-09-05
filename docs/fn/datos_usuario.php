<?PHP
include('conexion.php');
        $queryusuario = "SELECT * FROM usuario WHERE idUsuario = '$_REQUEST[idUsuario]' ";
        $rtsusuario = mysqli_query($conexion, $queryusuario);
        $usuario=mysqli_fetch_assoc($rtsusuario);
?>