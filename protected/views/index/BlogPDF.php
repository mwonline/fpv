<?php

function getMes($fecha) {
    $datos_fecha = explode("-", $fecha);
    $mes = $datos_fecha[1];
    $meses = array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');


    $mes = (int) ($mes);


    return $meses[$mes - 1];
}

function getDia($fecha) {
    $datos_fecha = explode("-", $fecha);
    return $datos_fecha[2];
}
?>
<div class="main wrapper clearfix">

    <?php
    foreach ($contenido as $ki => $conten) {

        $conten['tags'] = str_replace(' ', '', $conten['tags']);
        $tags = explode(',', $conten['tags']);
        ?>   
        <table width="600" align="center">
            <tr><td><img src="http://inteligenciavial.com/img/logo.png"/></td><td width="365"><h2 style="float: left; text-align: right;"><?php echo $conten['titulo']; ?></h2></td></tr>
            <tr><td colspan="2" align="justify"><?php echo $conten['descripcion']; ?></td></tr>
        </table>


    <?php } ?>   

</div>