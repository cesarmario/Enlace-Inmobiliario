<?PHP
    session_start();
    include('fn/opciones.php');
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
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
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
                            <a href="index.html" class='sidebar-link'>
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
                                    <a href="#">Inmuebles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Localidades</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Operaciones</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Propiedades</a>
                                </li>                                  
                            </ul>
                        </li>                        

                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>File Uploader</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="auth-login.html">Login</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-register.html">Register</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-forgot-password.html">Forgot Password</a>
                                </li>
                            </ul>
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
                <h3>ABM Inmueble</h3>
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
                                            <form action="fn/login.php" method="GET">
                                                <div class="col-md-8">
                                            
                                                    <div class="form-group">
                                                        <label for="basicInput">Titulo Inmueble</label>
                                                        <input type="text" class="form-control" id='tituloInmueble'	name='tituloInmueble'
                                                            placeholder="Titulo">
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion Inmueble</label>
                                                        <textarea class="form-control" id='descripcionInmueble' name='descripcionInmueble'
                                                            rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Calle</label>
                                                        <input type="text" class="form-control" id='domicilioCalleInmueble' name='domicilioCalleInmueble'
                                                            placeholder="Domicilio">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">N&uacute;mero</label>
                                                        <input type="text" class="form-control" id='domicilioNumeroInmueble' name='domicilioNumeroInmueble'
                                                            placeholder="N&uacute;mero">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Orientacion</label>
                                                        <select class="choices form-select">
                                                            <option value=""></option>
                                                            <option value="Este">Este</option>
                                                            <option value="Oeste">Oeste</option>
                                                            <option value="Norte">Norte</option>
                                                            <option value="Sur">Sur</option>
                                                        </select>                                    
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="basicInput">Localidad</label>
                                                        <select class="choices form-select" id='idLocalidad' name='idLocalidad'>
                                                            <option value="">Localidad</option>
                                                            <?PHP while($localidad=mysqli_fetch_assoc($rtslocalidad)){?>
                                                            <option value="<?PHP echo $localidad['idLocalidad']; ?>"> <?PHP echo $localidad['nombreLocalidad'];?></option>
                                                            <?PHP } ?> 
                                                        </select>                                    
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="basicInput">Habitaciones</label>
                                                        <input type="text" class="form-control" id='habitacionesInmueble' name='habitacionesInmueble'
                                                            placeholder="Habitaciones">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">banosInmueble</label>
                                                        <input type="text" class="form-control" id='banosInmueble' name='banosInmueble'
                                                            placeholder="banosInmueble">
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
                                                        <textarea class="form-control" id='InformacionAdicionalInmueble' name='InformacionAdicionalInmueble' rows="3">

                                                        </textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Valor Inmueble</label>
                                                        <input type="text" class="form-control" id='valorInmueble' name='valorInmueble'
                                                            placeholder="Valor">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="basicInput">Moneda</label>
                                                        <select class="choices form-select">
                                                            <option value=""></option>
                                                            <option value="Este">Este</option>
                                                            <option value="Oeste">Oeste</option>
                                                            <option value="Norte">Norte</option>
                                                            <option value="Sur">Sur</option>
                                                        </select>                                    
                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-success btn-lg shadow-lg mt-5">Guardar</button>
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

    <script src="assets/js/main.js"></script>
</body>

</html>