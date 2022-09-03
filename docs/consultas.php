<?PHP
    session_start();
    include('fn/login_ctrl.php');
    include('fn/list_opciones.php');
    include('fn/list_consultas.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - Inmuebles</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

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
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
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

                        <li class="sidebar-item active has-sub ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Datos</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="pedidos.php"><i class="fa-solid fa-circle-chevron-right"></i>&nbsp;Pedidos</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="localidades.php">Localidades</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="operaciones.php">Operaciones</a>
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
                <h3>Pedidos</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">                                    
                                    <div class="card-body">
                                        <div class="buttons">
                                            <a href="pedido_abm.php" class="btn btn-sm btn-outline-success">Nuevo Pedido</a>
                                        </div>
                                        <?PHP echo $listadoConsultas; ?>                                     
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

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="https://kit.fontawesome.com/1ffc2bde27.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>