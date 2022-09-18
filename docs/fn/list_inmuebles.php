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
    $listado .= "<th>Corredor</th>";
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

        if($inmuebles['plantasInmueble']>0){$plantasInmueble = $inmuebles['plantasInmueble'];}else{$plantasInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['cloacaInmueble'])){$cloacaInmueble = $inmuebles['cloacaInmueble'];}else{$cloacaInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['gasNaturalInmueble'])){$gasNaturalInmueble=$inmuebles['gasNaturalInmueble'];}else{$gasNaturalInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['pavimentoInmueble'])){$pavimentoInmueble=$inmuebles['pavimentoInmueble'];}else{$pavimentoInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['tipoAguaCalienteInmueble'])){$tipoAguaCalienteInmueble=$inmuebles['tipoAguaCalienteInmueble'];}else{$tipoAguaCalienteInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['aguaCorrienteInmueble'])){$aguaCorrienteInmueble=$inmuebles['aguaCorrienteInmueble'];}else{$aguaCorrienteInmueble="&nbsp;-&nbsp;";}
        if($inmuebles['frenteTerrenoInmueble']>0){$frenteTerrenoInmueble=$inmuebles['frenteTerrenoInmueble'];}else{$frenteTerrenoInmueble="&nbsp;-&nbsp;";}
        if($inmuebles['largoTerrenoInmueble']>0){$largoTerrenoInmueble=$inmuebles['largoTerrenoInmueble'];}else{$largoTerrenoInmueble="&nbsp;-&nbsp;";}
        if($inmuebles['antiguedadInmueble']>0){$antiguedadInmueble=$inmuebles['antiguedadInmueble'];}else{$antiguedadInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['estadoInmueble'])){$estadoInmueble=$inmuebles['estadoInmueble'];}else{$estadoInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['mejorasInmueble'])){$mejorasInmueble=$inmuebles['mejorasInmueble'];}else{$mejorasInmueble="&nbsp;-&nbsp;";}
        if(!empty($inmuebles['cocheraInmueble'])){$cocheraInmueble=$inmuebles['cocheraInmueble'];}else{$cocheraInmueble="&nbsp;-&nbsp;";}

        if($inmuebles['superficieCubiertaInmueble']>0){$superficieCubiertaInmueble=$inmuebles['superficieCubiertaInmueble'];}else{$superficieCubiertaInmueble="-";}
        if($inmuebles['superficieTotalInmueble']>0){$superficieTotalInmueble=$inmuebles['superficieTotalInmueble'];}else{$superficieTotalInmueble="-";}
        if($inmuebles['valorInmueble']>0){$valorInmueble=$inmuebles['monedaInmueble'] . "</b>&nbsp;". $inmuebles['valorInmueble'];}else{$valorInmueble="Consultar";}

        $datosmodal = "<button type='button' class='btn btn-primary block' data-bs-toggle='modal' data-bs-target='#DatosModal". $inmuebles['idInmueble'] ."'><i class='bi bi-list-ul'></i></button>";
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
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Plantas:</b>&nbsp;" .  $plantasInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Cloacas:</b>&nbsp;" .  $cloacaInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Gas Natural:</b>&nbsp;" .  $gasNaturalInmuebles;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Pavimento:</b>&nbsp;" .  $pavimentoInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Tipo Agua Caliente:</b>&nbsp;" .  $tipoAguaCalienteInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Agua Corriente:</b>&nbsp;" .  $aguaCorrienteInmueble;

        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Cochera:</b>&nbsp;" .  $cocheraInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Tipo Cochera:</b>&nbsp;" .  $tipoCocheraInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Vehiculos Cochera:</b>&nbsp;" .  $vehiculosCocheraInmueble;

        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Antiguedad:</b>&nbsp;" .  $antiguedadInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Estado:</b>&nbsp;" .  $estadoInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Mejoras:</b>&nbsp;" .  $mejorasInmueble;

        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Frente del Terreno:</b>&nbsp;" .  $frenteTerrenoInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Lardo del Terreno:</b>&nbsp;" .  $largoTerrenoInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Superficie Cubierta:</b>&nbsp;" .  $superficieCubiertaInmueble;
        $datosmodal .= "<br><i class='bi bi-bookmark-check'></i>&nbsp;<b>Superficie Total:</b>&nbsp;" .  $superficieTotalInmueble;
        $datosmodal .= "<br><i class='bi bi-card-text'></i>&nbsp;<b>Descripci&oacute;n:</b>&nbsp;" .  $inmuebles['descripcionInmueble'];        
        $datosmodal .= "<br><i class='bi bi-card-text'></i>&nbsp;<b>Informacion Adicional:</b>&nbsp;" .  $inmuebles['informacionAdicionalInmueble'];
        $datosmodal .= "<br><i class='bi bi-info-square-fill'></i>&nbsp;<b>Informacion Extra:</b>&nbsp;" .  $inmuebles['informacionPrivadaInmueble'];       
        $datosmodal .= "</p>";
        $datosmodal .= "</div>";
        $datosmodal .= "<div class='modal-footer'>";
        $datosmodal .= "<button type='button' class='btn btn-light-secondary'";
        $datosmodal .= "data-bs-dismiss='modal'>";
        $datosmodal .= "<i class='bx bx-x d-block d-sm-none'></i>";
        $datosmodal .= "<span class='d-none d-sm-block'>X Cerrar</span>";
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
        $listado .= "<td><a href='inmueble_abm.php?idInmueble=". $inmuebles['idInmueble'] . "&abm=m' class='btn btn-info me-1 mb-1'>Editar</a></td>";
        $listado .= "</tr>";
    }
    $listado .= "</tbody>";
    $listado .= "</table>";



?>


