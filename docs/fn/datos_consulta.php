<?PHP
include('conexion.php');
        $queryconsulta = "SELECT * FROM vista_consultas WHERE idConsulta = '$_REQUEST[idConsulta]' ";
        $rtsconsulta = mysqli_query($conexion, $queryconsulta);
        $consulta=mysqli_fetch_assoc($rtsconsulta);
?>