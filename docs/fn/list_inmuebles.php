<?PHP
    include('conexion.php');
    if ($_SESSION['rolUsu']!='1') { $filtro = " AND idUsuario =" . $_SESSION['idUsu']; }else{ $filtro = ""; };
    $queryinmuebles = "SELECT * FROM vista_inmuebles WHERE baja = 0 $filtro ORDER BY fecha DESC";
    $rtsinmuebles = mysqli_query($conexion, $queryinmuebles);
    $listado = "<table class='table table-striped' id='table1'>";
    $listado .= "<thead>";
    $listado .= "<tr>";
    $listado .= "<th></th>";
    $listado .= "<th>Operacion</th>";
    $listado .= "<th>Propiedad</th>";
    $listado .= "<th>Titulo</th>";
    $listado .= "<th>Domicilio</th>";
    $listado .= "<th>Localidad</th>";
    $listado .= "<th>Valor</th>";
    $listado .= "<th>Agente</th>";
    $listado .= "<th></th>";
    $listado .= "<th></th>";
    $listado .= "</tr>";
    $listado .= "</thead>";
    $listado .= "<tbody>";
    while($inmuebles=mysqli_fetch_assoc($rtsinmuebles)){

        $domicilio = "";
        if(!empty($inmuebles['domicilioNumeroInmueble'])){$domicilio .= " " . $inmuebles['domicilioNumeroInmueble'];}
        if(!empty($inmuebles['domicilioOrientacionInmueble'])){$domicilio .= " " . $inmuebles['domicilioOrientacionInmueble'];}
        if($inmuebles['habitacionesInmueble']>0){$habitacionesInmueble=$inmuebles['habitacionesInmueble'] . "<sup>+</sup>";}else{$habitacionesInmueble="-";}
        if($inmuebles['banosInmueble']>0){$banosInmueble=$inmuebles['banosInmueble'];}else{$banosInmueble="&nbsp;-&nbsp;";}
        if($inmuebles['superficieCubiertaInmueble']>0){$superficieCubiertaInmueble=$inmuebles['superficieCubiertaInmueble'];}else{$superficieCubiertaInmueble="-";}
        if($inmuebles['valorInmueble']>0){$valorInmueble=$inmuebles['monedaInmueble'] . "</b>&nbsp;". $inmuebles['valorInmueble'];}else{$valorInmueble="Consultar";}

        $datosmodal = "<button type='button' class='btn btn-primary block' data-bs-toggle='modal' data-bs-target='#DatosModal". $inmuebles['idInmueble'] ."'> Detalle</button>";
        $datosmodal .= "<div class='modal fade' id='DatosModal". $inmuebles['idInmueble'] ."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
        $datosmodal .= "<div class='modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable' role='document'>";
        $datosmodal .= "<div class='modal-content'>";
        $datosmodal .= "<div class='modal-header'>";
        $datosmodal .= "<h5 class='modal-title' id='exampleModalCenterTitle'><i class='bi bi-caret-down-square-fill'></i>&nbsp;". $inmuebles['tituloInmueble'] . "</h5>";
        $datosmodal .= "<button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>";
        $datosmodal .= "<i data-feather='x'></i>";
        $datosmodal .= "</button>";
        $datosmodal .= "</div>";
        $datosmodal .= "<div class='modal-body'>";
        $datosmodal .= "<span class='badge bg-light-success'><i class='bi bi-house'></i>&nbsp;" . $inmuebles['nombrePropiedad']  ."</span>";
        $datosmodal .= "&nbsp;<span class='badge bg-light-secondary'><i class='bi bi-bookmark-check'></i>&nbsp;" . $inmuebles['nombreOperacion'] . "</span>";
        $datosmodal .= "&nbsp;<span class='badge bg-light-primary'><i class='bi bi-bookmark-check'></i>&nbsp;" . $valorInmueble . "</span></p>";
        $datosmodal .= "<p>";
        $datosmodal .= "<i class='bi bi-geo-alt-fill'></i>&nbsp;" . $inmuebles['domicilioCalleInmueble'] . $domicilio;
        $datosmodal .= "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" .  $inmuebles['nombreLocalidad'] . "</b>";
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Habitacion:</b>&nbsp;" .  $habitacionesInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Ba&ntilde;os:</b>&nbsp;" .  $banosInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Superficie Cubierta:</b>&nbsp;" .  $superficieCubiertaInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Superficie Total:</b>&nbsp;" .  $inmuebles['superficieTotalInmueble'];
        $datosmodal .= "<br><i class='bi bi-card-text'></i>&nbsp;<b>Descripci&oacute;n:</b>&nbsp;" .  $inmuebles['descripcionInmueble'];        
        $datosmodal .= "<br><i class='bi bi-card-text'></i>&nbsp;<b>Informacion Adicional:</b>&nbsp;" .  $inmuebles['informacionAdicionalInmueble'];
        $datosmodal .= "<br><i class='bi bi-info-square-fill'></i>&nbsp;<b>Informacion Extra:</b>&nbsp;" .  $inmuebles['informacionPrivadaInmueble'];       
        $datosmodal .= "</p>";
        $datosmodal .= "</div>";
        $datosmodal .= "<div class='modal-footer'>";
        $datosmodal .= "<button type='button' class='btn btn-light-secondary'";
        $datosmodal .= "data-bs-dismiss='modal'>";
        $datosmodal .= "<i class='bx bx-x d-block d-sm-none'></i>";
        $datosmodal .= "<span class='d-none d-sm-block'>Cerrar</span>";
        $datosmodal .= "</button>";
        $datosmodal .= "</div>";
        $datosmodal .= "</div>";
        $datosmodal .= "</div>";
        $datosmodal .= "</div>";

        $listado .= "<tr>";        
        $listado .= "<td>". $datosmodal . "</td>";
        $listado .= "<td>". $inmuebles['nombreOperacion'] . "</td>";
        $listado .= "<td>". $inmuebles['nombrePropiedad'] . "</td>";
        $listado .= "<td>". $inmuebles['tituloInmueble'] . "</td>";
        $listado .= "<td>". $inmuebles['domicilioCalleInmueble'] . $domicilio . "</td>";
        $listado .= "<td>". $inmuebles['nombreLocalidad'] . "</td>";
        $listado .= "<td><b>". $inmuebles['monedaInmueble'] . "</b>&nbsp;". $inmuebles['valorInmueble'] . "</td>";
        $listado .= "<td><b>". $inmuebles['nombreAgente'] . "</td>";
        $listado .= "<td><a href='inmueble_abm_img.php?idInmueble=". $inmuebles['idInmueble'] ."' class='btn btn-warning me-1 mb-1'>Imagenes</a></td>";
        $listado .= "<td><a href='inmueble_abm.php?idInmueble=". $inmuebles['idInmueble'] . "&abm=m' class='btn btn-info me-1 mb-1'>Editar</a></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";



?>


