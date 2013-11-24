<?php
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Inteligencia Vial <?php echo $this->titulo ?></title>
        <meta name="description" content="<?php echo $this->Metadescripcion ?>">
        <meta name="viewport" content="width=device-width">

		<link href="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" rel="image_src" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <meta property="og:title" content="Inteligencia Vial <?php echo $this->titulo ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:description" content="<?php echo $this->Metadescripcion ?>" />
        <meta property="og:site_name" content="www.inteligenciavial.com"/>      
         <meta property="og:image" content="http://www.inteligenciavial.com/img/logo.png" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site/normalize.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site/main.css">
        <script> document.cookie='resolution=' + Math.max(screen.width,screen.height) + '; path=/'; </script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
        <script>
        var userAgent = navigator.userAgent.toLowerCase();
        jQuery.browser = {
            version: (userAgent.match( /.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/ ) || [])[1],
            chrome: /chrome/.test( userAgent ),
            safari: /webkit/.test( userAgent ) && !/chrome/.test( userAgent ),
            opera: /opera/.test( userAgent ),
            msie: /msie/.test( userAgent ) && !/opera/.test( userAgent ),
            mozilla: /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent )
        };
        //alert($.browser.version);
        if ($.browser.msie){
                if ($.browser.version<=7){
              alert("Usted esta utilizando una version de navegador antigua y está pagina no se visualizara correctamente");
                }
        }
        </script>
        <style type="text/css">
   span#fancybox-left-ico {left: 20px;}
   span#fancybox-right-ico {right: 20px;left:auto}
</style> 
    </head>
    <body id="<?php echo $this->body ?>" class="<?php echo $this->bodyClass ?>">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1>
                    <?php echo CHtml::link('<img border="0" alt="Inteligencia Vial - Úsala" src="' . Yii::app()->request->baseUrl . '/img/logo.png " rel=”image_src”>', array('index/index')); ?>     			
                    <span style="display:none">Inteligencia Vial - Úsala</span>
                </h1>

                <div class="redes" >
                    <span>Síganos en</span>
                    <ul>
                        <li><a href="http://twitter.com/InteligenteVial " target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/tw.png" width="34" height="33" alt="Twitter"></a></li>
                        <li><a href="https://www.facebook.com/InteligenciaVial?skip_nax_wizard=true" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/fb.png" width="33" height="33" alt="Twitter"></a></li>
                        <li class="last-child"><a href="http://www.youtube.com/fondodeprevencion " target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/yt.png" width="34" height="33" alt="Twitter"></a></li>
                    </ul>
                </div><!-- fin redes -->

                <div class="counter">
                    <?php
                    $basePaginaAnterior = 15438;
                    $totalE = $this->totalExcusas + $basePaginaAnterior;
                    $totalE = ($totalE > 99999) ? 99999 : $totalE;
                    $stringExcusas = $totalE;
                    //echo $totalE;
                    if ($totalE < 100000 && $totalE >= 10000)
                        $stringExcusas = "" . $totalE;
                    if ($totalE < 10000 && $totalE >= 1000)
                        $stringExcusas = "0" . $totalE;
                    if ($totalE < 1000 && $totalE >= 100)
                        $stringExcusas = "00" . $totalE;
                    if ($totalE < 100 && $totalE >= 10)
                        $stringExcusas = "000" . $totalE;
                    if ($totalE < 10)
                        $stringExcusas = "0000" . $totalE;
                    ?>

                    <div class="number">
                        <ul>
                            <li class="n"><? echo $stringExcusas[0] ?></li>
                            <li class="n"><? echo $stringExcusas[1] ?></li>
                            <li class="n"><? echo $stringExcusas[2] ?></li>
                            <li class="n"><? echo $stringExcusas[3] ?></li>
                            <li class="n"><? echo $stringExcusas[4] ?></li>
                        </ul>
                    </div>
                    <div class="tit"><span class="excusas">Excusas</span> <span class="recibidas">recibidas</span></div>
                </div><!-- fin counter -->
            </header>
<!-- menu movil -->
<div class="contendor-menu-movil">
	<div id="titulo-menu-movil"> <?php echo CHtml::link('INICIO', array('index/index')); ?><a href="javascript:void(0)" onClick="accionMenu()">SECCIONES</a> </div>
    <div class="box-unase">
                    <?php echo CHtml::link('<span class="text">Únase</span>', array('form/create')); ?>
                </div>
    	<div id="menu-movil">
                <ul>
                    <li><?php echo CHtml::link('Inicio', array('index/index')); ?></li>

                    <?php
                    foreach ($this->datosMenu as $value) {
                        if ($this->idCategoriaActual == $value->idcategoria || $this->idPadreActual == $value->idcategoria) {
                            $claseMenu = ' class="selected" ';
                        } else {
                            $claseMenu = "";
                        }
                        echo '<li' . $claseMenu . '><a href="' . Yii::app()->createUrl('index/categoria', array('alias' => $value->alias)) . '">' . $value->titulo . '</a>';
                        
                        echo '</li>';
                        ?>
                        <?php
                    }
                    ?>

                </ul>
    </div>  
          </div>
<!-- fin menu movil-->
            <nav>
                <ul>
                    <li><?php echo CHtml::link('Inicio', array('index/index')); ?></li>

                    <?php
                    foreach ($this->datosMenu as $value) {
                        if ($this->idCategoriaActual == $value->idcategoria || $this->idPadreActual == $value->idcategoria) {
                            $claseMenu = ' class="selected" ';
                        } else {
                            $claseMenu = "";
                        }
                        echo '<li' . $claseMenu . '><a href="' . Yii::app()->createUrl('index/categoria', array('alias' => $value->alias)) . '">' . $value->titulo . '</a>';
                        
                        echo '</li>';
                        ?>
                        <?php
                    }
                    ?>

                </ul>
                <div class="box-unase">
                    <?php echo CHtml::link('<span class="text">Únase</span>', array('form/create')); ?>
                </div>
            </nav><!-- fin nav -->
        </div><!-- fin header-container -->



        <!-- #main-container -->
        <div class="main-container">
            <?php echo $content; ?>
            <!-- #main -->
        <div class="call-mobile">
        <a href="<?php echo Yii::app()->createUrl('form/create'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/call-to-action-color.jpg" width="350" height="109" alt="Logo"></a>
       </div>
        </div>

        <div class="footer-container">
            <footer class="wrapper">
                <div class="logo">
                    <a href="http://www.fpv.org.co/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo-ft.png" width="145" height="141" alt="Logo"></a>

                    <div class="texto">Corporación Fondo de Prevención Vial</div>
                </div><!--fin logo -->

                <!--  <div class="contacto">
                                <ul>
                                <li>
                                        <span class="titulo">Contacto</span>
                                        Teléfono: 210.6636</br>
                                                                Dirección: Cra 7 Nº 26.20 </br>
                                                                Piso 8
                                                        </li>
                                <li>
                                        <span class="titulo">Escríbanos</span>
                                        <a href="mailto:Información@fpv.org.co" target="_blank" class="titulo" style="color:#FFF">Información@fpv.org.co</br></a>
                                                                <a href="mailto:dramirez@fvp.org.co" target="_blank" class="titulo" style="color:#FFF">dramirez@fvp.org.co</a></br>
                                                        </li>
                            </ul>
                        </div>--><!-- fin contacto -->

                <div class="redes">
                    <ul class="menu">
                        <li><?php echo CHtml::link('Inicio', array('index/index')); ?></li>
                        <?php
                        foreach ($this->datosMenu as $value) {
                            echo '<li><a href="' . Yii::app()->createUrl('index/categoria', array('alias' => $value->alias)) . '">' . $value->titulo . '</a>';
                        }
                        ?>
                    </ul>
                    <ul class="redes">
                        <li><a href="http://twitter.com/InteligenteVial " target="_blank"><img width="32" height="32" alt="Twitter" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tw2.png"></a></li>
                        <li><a href="https://www.facebook.com/InteligenciaVial?skip_nax_wizard=true" target="_blank"><img width="32" height="32" alt="Facebook" src="<?php echo Yii::app()->request->baseUrl; ?>/img/fb2.png"></a></li>
                        <li class="last-child"><a href="http://www.youtube.com/fondodeprevencion " target="_blank"><img width="32" height="32" alt="YouTube" src="<?php echo Yii::app()->request->baseUrl; ?>/img/yt2.png"></a></li>
                    </ul>
                </div><!--fin redes -->


            </footer>          
        </div><!-- fin footer-container -->

        <div class="text-footer">
            <div class="content">
                <ul>
                    <li>Todos los derechos reservados @ 2012</li>
                    <li class="last-child"><?php echo CHtml::link('Terminos y condiciones', array('index/terminos')); ?></li>
                    <li class="last-child"><a href="#">Mapa del Sitio</a></li>           
                </ul>
            </div>
        </div><!-- fin text-footer -->
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17336062-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

        </script>
    </body>
</html>