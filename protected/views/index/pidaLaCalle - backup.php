<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=211095398918730";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="main wrapper clearfix">
    <div class="contenedor-slide">
        <div class="box-slide">
            <div class="foto">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->imagen; ?>" width="960" height="244" alt="foto">
            </div>

            <div class="box-texto">
                <!--<div class="titulo">ME PIDO LA CALLE</div> -->                  
            </div>

            <div class="texto-top">
                Bienvenido a “Pida la Calle”. Aquí encontrará herramientas para que pueda pedir la calle que quiere, ya sea a través de mensajes en redes sociales, videos pedagógicos, PDFs descargables y mucho más. 


            </div>

            <div class="box-banner"> <a href="<?php echo Yii::app()->request->baseUrl;?>/dejeMensaje/form"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner-pc.png" width="254" height="233" alt="Únase, y empiece a usar su inteligencia vial."></a> </div>

        </div><!-- fin box-carrusel -->
    </div><!--fin contenedor slide -->

    <div class="box-tw-fb">
        <div class="titulo">
            Elija uno de estos mensajes, compártalo 
            <br>
            en Facebook o Twitter y pida la calle que quiere 
        </div>
        
        <!--- parte de mensajes de facebook -->
        <div class="left">
            <div class="fb">
                <div class="icono">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/fb-msn.png" width="58" height="78" alt="facebook"> </div>
                <div class="titulo">
                    Facebook
                </div>
                <div id="mensajes_face" style="margin-top: 90px;">
                    <ul>
                        <?php foreach ($mensajes_face as $mensaje_face):?>
                            <li>
                                <?php echo $mensaje_face->mensaje; ?>
                                <div class="compartir">
                                    <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true)?>/index/categoria/<?php echo $model->alias ?>?idm=<?php echo $mensaje_face->id; ?>" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                                </div>
                            </li>
                        <?php endforeach;?>                    
                    </ul>
                </div>
            </div>
            <div class="otras-paginador">
                <?php 
                    $this->widget('CLinkPager',array(
                    'pages'=>$pages_f,
                    'header'=>'',
                    'nextPageLabel'=>'',
                    'prevPageLabel'=>'',
                    'selectedPageCssClass'=>'activate',
                    'hiddenPageCssClass'=>'disabled',
                    'htmlOptions'=>array('class'=>''),
                    ));
                ?>
            </div>
        </div><!--fin left-->        
        <!-- fin de seccion facebook -->
        
        
        <!-- inicio de la seccion de twitter --->
        <div class="right">
            <div class="tw">
                <div class="icono">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/tw-msn.png" width="57" height="76" alt="twitter"> 
                </div>
                <div class="titulo">
                    Twitter
                </div>
                <div id="mensajes_tw" style="margin-top: 90px;">
                    <ul>                    
                        <?php foreach ($mensajes_tw as $mensaje_tw):?>
                            <li>
                                <?php echo $mensaje_tw->mensaje; ?>
                                <div class="compartir">
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $mensaje_tw->mensaje; ?>" data-via="InteligenteVial" data-lang="es" data-count="none" data-url="www.inteligenciavial.com">Twittear</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="otras-paginador">
                <?php 
                    $this->widget('CLinkPager',array(
                    'pages'=>$pages_t,
                    'header'=>'',
                    'nextPageLabel'=>'',
                    'prevPageLabel'=>'',
                    'selectedPageCssClass'=>'activate',
                    'hiddenPageCssClass'=>'disabled',
                    'htmlOptions'=>array('class'=>''),
                    ));
                ?>
                
            </div>
        </div>
    </div><!--fin right -->
    <!---fin de la seccion de twitter--->

    
    
    
    
    <article>
        <!-- obtener todos los multimedia asociados a al contenido-->
         <?php
            $galeriaPrincipal = Multimedia::model()->findAll('idContenidomul=:idContenidomul order By orden ASC', array(':idContenidomul' => $contenido[0]->idContenido));
            $flag = true;
        ?>
        
           
        <!-- inicio galeria-->
        <a name="#carruselvideos"></a>
      <div class="galeria" >
            
            <?php for($i=0;$i<count($galeriaPrincipal); $i++):?>
                <?php $value=$galeriaPrincipal[$i];?>
            
                <div class="uno" id="fotosPrincipal_<?php echo $i; ?>" style="
                    <?php 
                    if ($flag){
                        echo 'display: block;';
                    }
                    else {
                        echo 'display: none;';
                    } 
                    ?>">
                    
                    <!--div big, muestra el video seleccionado-->
                    <div class="big" >
                        <?php if ($value->tipo == "I"): ?>
                            <img src="<?php echo Yii::app()->request->baseUrl . "/" . $value->url; ?>" width="643" height="291" alt="foto">
                        <?php else: ?>
                            <iframe  style="z-index:1" width="643" height="390" frameborder="0" allowfullscreen="" src="<?php echo str_replace("watch?v=", "embed/", $value->resumen) ?>?wmode=opaque"></iframe>
                        <?php endif; ?>
                    </div> <!--end div big-->
                    
                   
                    
                    <div class="nav" >
                        <span class="left" style="<?php
                            if ($i != 0) {
                                $flag = false;
                                echo "display: block;";
                            } else {
                                echo "display: none;";
                            }
                            ?>">
                            <a onclick="mostarFoto(<?php echo $i - 1; ?>)" href="javascript:void(0)"><img width="54" height="53" alt="prev" src="<?php echo Yii::app()->request->baseUrl; ?>/img/arrow-left.png"></a>
                        </span> <!-- fin span left -->
                        
                        <span class="right" style="<?php
                            if ($i != count($galeriaPrincipal) - 1) {
                                $flag = false;
                                echo 'display: block;';
                            } else {
                                echo 'display: none;';
                            }
                            ?>">
                            <a onclick="mostarFoto(<?php echo $i + 1; ?>)" href="javascript:void(0)"><img width="54" height="53" alt="next" src="<?php echo Yii::app()->request->baseUrl; ?>/img/arrow-right.png"></a>
                        </span> <!-- fin span rigth -->
                    </div> <!-- fin div nav -->
                    
                </div> <!-- end div uno -->        
            
            <? endfor;?>
 <!--Compartir en redes sociales-->
                    <div class="compartir">
                       
                        <div  class="compartir-redes">
                            <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true)?>/index/categoria/<?php echo $model->alias ?>" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false">
                            </div> 
                        	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo Yii::app()->request->getBaseUrl(true)?>/index/categoria/<?php echo $model->alias ?>#carruselvideos" data-via="inteligentevial" data-lang="es" data-count="none">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
                  </div>
                    <!--fin compartir-->
            <!--desplazador de miniaturas-->
            
            <div class="thumbs" id="mycarousel">
                <a href="#"  id="mycarousel-prev" class="left" <?php
                    if (count($galeriaPrincipal) <= 5) {
                        echo "style=display:none";
                    }
                    ?>><img width="38" height="38" alt="prev" src="<?php echo Yii::app()->request->baseUrl; ?>/img/carleft.png"></a>
                <ul>
                    <?php
                    for ($i = 0; $i < count($galeriaPrincipal); $i++) {
                        $value = $galeriaPrincipal[$i];
                        ?>
                        <li><a onclick="mostarFoto(<?php echo $i; ?>)" href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl . "/" . $value->url; ?>" width="101" height="74" alt="t1"></a></li>
                    <?php } ?>
                </ul>
                <a href="#" id="mycarousel-next" class="right" <?php
                    if (count($galeriaPrincipal) <= 5) {
                        echo "style=display:none";
                    }
                    ?>><img width="38" height="38" alt="prev" src="<?php echo Yii::app()->request->baseUrl; ?>/img/carrigth.png"></a>
            </div> <!-- end  div thumbs -->
            
            <div class="texto-bottom">
                Hemos creado esta serie de videos para ayudarle a pedir la calle que quiere. Escoja el video que mejor exprese sus inquietudes y compártalo en sus redes sociales.
            </div>
        </div>
                
        <!-- fin galeria -->       
        
        <!--inicio del aside-->
        <aside>
            <div class="form-aliado">
                <div class="titulo">
                    <img width="256" height="74" alt="aliado" src="<?php echo Yii::app()->request->baseUrl; ?>/img/tit-kit.png">
                </div>

                <div class="form">
                    <div class="texto">
                        <span>
                            Por favor registre sus datos y le enviaremos a su dirección un kit 
                        </span>para que pueda pedir la calle que quiere  

                    </div>
                    <div class="bt">
                    <?php if($hayKits){?>
                        <a href="<?php echo Yii::app()->request->baseUrl;?>/kit/pedir">
                        <input type="button" value="Pedir kit aquí" name="Haga clic aquí">
                        </a> 
                       <?php }else{
						   $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#fancy-link',
        'config'=>array(),));  
					echo  CHtml::link('<input type="button" value="Pedir kit aquí" name="Haga clic aquí"">',Yii::app()->request->baseUrl."/img/alerta_kit2.png", array("id"=>"fancy-link", "style"=>"background: transparent;")); 
						  }?>        

                  </div>
                </div>
            </div>
            
            
            <!-- box descargables-->
            <div class="box-dw">
                <div class="box-descargables">
                    <div class="titulo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/tit-descargables.png" width="259" height="58" alt="descargables"> 
                    </div>
                    <ul>
                        <?php foreach($descargas as $descarga):?>
                            <li>
                                <div class="icono">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/ic-descargable.png" width="28" height="33" alt="descargar">
                                    <!--<a href="<?php //echo Yii::app()->request->baseUrl ."/".$descarga->enlace;?><?php //echo "http://www.inteligenciavial.com"."/".$descarga->enlace;?>"><?php //echo $descarga->nombre;?></a>-->
                                    <a href="<?php echo Yii::app()->request->baseUrl;?>/descargar_archivo.php?f=<?php echo str_replace('descargas/','',$descarga->enlace);?>"><?php echo $descarga->nombre;?></a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div><!-- fin box-descargables-->
                <!--paginacion de los descargables-->
                <div class="otras-paginador">
                    <?php 
                        $this->widget('CLinkPager',array(
                        'pages'=>$pages_d,
                        'header'=>'',
                        'nextPageLabel'=>'',
                        'prevPageLabel'=>'',
                        'selectedPageCssClass'=>'activate',
                        'hiddenPageCssClass'=>'disabled',
                        'htmlOptions'=>array('class'=>''),
                        ));
                    ?>
                </div>
                <!-- fin de la paginacion descargables -->
            </div>
        </aside> <!--fin aside-->

    </article>

    
    <!------------------------------------------->
    
</div> <!-- #main -->

<?php
Yii::app()->clientScript->registerScript('helloscript', "
        inicio();
    ", CClientScript::POS_READY);
?>

<script type="text/javascript">
    clickLink = function(id){
        $("#"+id).click();
    }
    mostarFoto=function(nele){
        $('.uno').hide();
        $('#fotosPrincipal_'+nele).show();
    };
    function mycarousel_initCallback(carousel) {
        $('.jcarousel-control a').bind('click', function() {
            carousel.scroll($.jcarousel.intval($(this).text()));
            return false;
        });

        $('.jcarousel-scroll select').bind('change', function() {
            carousel.options.scroll = $.jcarousel.intval(this.options[this.selectedIndex].value);
            return false;
        });

        $('#mycarousel-next').bind('click', function() {
            carousel.next();
            return false;
        });

        $('#mycarousel-prev').bind('click', function() {
            carousel.prev();
            return false;
        });
    };

    // Ride the carousel...
    inicio = function() {
        $("#mycarousel").jcarousel({
            scroll: 1,
            initCallback: mycarousel_initCallback,
		
            // This tells jCarousel NOT to autobuild prev/next buttons
            buttonNextHTML: null,
            buttonPrevHTML: "leftcar"
        });
    }
</script>

<script>
    $('#nohaykits').click(function(){
        alert("Lo sentimos, no hay mas kits por el momento");
    });
</script>
<h1 id="entrega3">TExto de prueba</h1>