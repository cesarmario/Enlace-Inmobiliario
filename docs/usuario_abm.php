<?PHP
    session_start();
    include('fn/login_ctrl.php');
    include('fn/datos_usuario.php')
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - EnlaceInmobiliario</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Inicio</span>
                            </a>
                        </li>

                        <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-house"></i>
                                <span>Inmuebles</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="inmuebles.php"><i class="fa-solid fa-circle-chevron-right"></i>&nbsp;Inmuebles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="consultas.php">Consultas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="pedidos.php">Pedidos</a>
                                </li>                              
                            </ul>
                        </li>
                        
                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Datos</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item ">
                                    <a href="localidades.php">Localidades</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="operciones.php">Operaciones</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="propiedades.php">Propiedades</a>
                                </li>                                  
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="fn/logout.php" class='sidebar-link'>
                                <i class="bi bi-x-square"></i>
                                <span>Cerrar Sesi&oacute;n</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>ABM Usuarios</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="fn/abm_usuarios.php" method="GET">
                                                <div class="col-md-8">
                                            
                                                    <div class="form-group">
                                                        <label for="basicInput">Usuario</label>
                                                        <input type="text" class="form-control" id='uidUsuario'	name='uidUsuario'
                                                            placeholder="Usuario" value='<?PHP echo $uidUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Contraseña</label>
                                                        <input type="text" class="form-control" id='pswUsuario'	name='pswUsuario'
                                                            placeholder="Contraseña" value='<?PHP echo $pswUsuario; ?>' require>                                  
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Nombre y Apellido</label>
                                                        <input type="text" class="form-control" id='nombreUsuario' name='nombreUsuario'
                                                            placeholder="Nombre y Apellido" value='<?PHP echo $nombreUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Matrícula</label>
                                                        <input type="text" class="form-control" id='matriculaUsuario' name='matriculaUsuario'
                                                            placeholder="Mail" value='<?PHP echo $matriculaUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Mail</label>
                                                        <input type="text" class="form-control" id='mailUsuario' name='mailUsuario'
                                                            placeholder="Mail" value='<?PHP echo $mailUsuario; ?>' require>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Teléfono</label>
                                                        <input type="text" class="form-control" id='telefonoUsuario' name='telefonoUsuario'
                                                            placeholder="teléfono" value='<?PHP echo $telefonoUsuario; ?>'>
                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?PHP echo $_REQUEST['idUsuario']; ?>"/>
                                                    <input type="hidden" id="abm" name="abm" value="<?PHP echo $_REQUEST['abm']; ?>"/>
                                                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                                                    <a href="usuarios.php" class="btn btn-warning me-1 mb-1">Cancelar</a>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>                    
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Enlace Inmobiliario</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/1ffc2bde27.js" crossorigin="anonymous"></script>                                                            
    <script src="assets/js/main.js"></script>
</body>

</html>