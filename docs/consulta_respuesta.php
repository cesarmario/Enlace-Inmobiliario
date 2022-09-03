<?PHP
    session_start();
    include('fn/login_ctrl.php');
    include('fn/list_opciones.php');
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
                                <li class="submenu-item ">
                                    <a href="inmuebles.php">Inmuebles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="consulta_abm.php">Consultas</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="pedido_abm.php"><i class="fa-solid fa-circle-chevron-right"></i>&nbsp;Pedidos</a>
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
                <h3>ABM Consulta</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!--div-- class="card-header">
                                        <h4>ABM Inmueble</h4>
                                    </!--div-->
                                    <div class="card-body">
                                        <div class="row">
                                            <form class="form form-vertical" action="fn/abm_consultas.php" method="GET">
                                                <div class="col-md-8">

                                                    <div class="form-group">
                                                        <label for="basicInput">Tipo de Propiedad</label>
                                                        <select class="choices form-select" id='idPropiedad' name='idPropiedad' require>
                                                            <option value=""></option>
                                                            <?PHP while($propiedad=mysqli_fetch_assoc($rtspropiedad)){?>
                                                            <option value="<?PHP echo $propiedad['idPropiedad']; ?>"> <?PHP echo $propiedad['nombrePropiedad'];?></option>
                                                            <?PHP } ?> 
                                                        </select>                                    
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Tipo de Operacion</label>
                                                        <select class="choices form-select" id='idOperacion' name='idOperacion'require>
                                                            <option selected value=""></option>
                                                            <?PHP while($operacion=mysqli_fetch_assoc($rtsoperacion)){?>
                                                            <option value="<?PHP echo $operacion['idOperacion']; ?>"> <?PHP echo $operacion['nombreOperacion'];?></option>
                                                            <?PHP } ?> 
                                                        </select>                                    
                                                    </div>                                                  

                                                    <div class="form-group">
                                                        <label for="basicInput">Agente</label>
                                                        <input type="text" class="form-control" id='idAgenteInmueble' name='idAgenteInmueble'
                                                            placeholder="Nombre del Agente">                                   
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Nombre y Apellido</label>
                                                        <input type="text" class="form-control" id='nombreConsulta' name='nombreConsulta'
                                                            placeholder="Nombre y Apellido">                                   
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Teléfono</label>
                                                        <input type="text" class="form-control" id='telefonoConsulta' name='telefonoConsulta'
                                                            placeholder="Teléfono sin el 0 y sin el 15">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Fecha de Consulta</label>
                                                        <input type="datetime" class="form-control" id='fechaConsulta' name='fechaConsulta'
                                                            placeholder="Fecha de Consulta">                                   
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="basicInput">Fecha de Respuesta</label>
                                                        <input type="datetima" class="form-control" id='fechaRespuestaConsulta' name='fechaRespuestaConsulta'
                                                            placeholder="Fecha de Respuesta">
                                                    </div>
                                                    

                                                <!--    <div class="form-group">
                                                        <label for="basicInput">Fecha</label>
                                                        <input type="text" class="form-control" id='banosInmueble' name='banosInmueble'
                                                            placeholder="Baños">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Superficie Cubierta</label>
                                                        <input type="text" class="form-control" id='superficieCubiertaInmueble' name='superficieCubiertaInmueble'
                                                            placeholder="Superficie Cubierta">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Superficie Total</label>
                                                        <input type="text" class="form-control" id='superficieTotalInmueble' name='superficieTotalInmueble'
                                                            placeholder="Superficie Total">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Informacion Adicional</label>
                                                        <textarea class="form-control" id='InformacionAdicionalInmueble' name='InformacionAdicionalInmueble' rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Valor Inmueble</label>
                                                        <input type="text" class="form-control" id='valorInmueble' name='valorInmueble'
                                                            placeholder="Valor">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Moneda</label>
                                                    <select class="choices form-select" id='monedaInmueble' name='monedaInmueble'>
                                                            <option value=""></option>
                                                            <option value="$">Pesos</option>
                                                            <option value="USD">Dolares</option>
                                                        </select>                                    
                                                    </div>
                                                </div> -->

                                                <div class="buttons">
                                                    <input type="hidden" id="abm" name="abm" value="a"/>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Guardar</button>
                                                    <button type="reset" class="btn btn-secondary me-1 mb-1">Reset</button>
                                                    <a href="inmuebles.php" class="btn btn-warning me-1 mb-1">Cancelar</a>
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