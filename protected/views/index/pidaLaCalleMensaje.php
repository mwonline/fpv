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
    <div class="contenedor-banner">
        <div class="box-banner2">
            <div class="mensaje">
                <span>
                    <img width="21" height="18" src="<?php echo Yii::app()->request->baseUrl;?>/img/comillas1.png">
                </span>
                    <?php echo $mensajeC[0]->mensaje; ?>
                <span>
                    <img width="21" height="18" src="<?php echo Yii::app()->request->baseUrl;?>/img/comillas2.png">
                </span>
            </div>
        </div>


        <div class="box-banner"> <a href="Z-2-deje-su-mensaje.html"><img width="254" height="233" alt="Únase, y empiece a usar su inteligencia vial." src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner-pc.png"></a> 
        </div>        

    </div><!--fin contenedor banner -->

    <div class="box-tw-fb">
        <div class="titulo"> OTROS MENSAJES PARA COMPARTIR</div>

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
                        <?php foreach ($mensajes_face as $mensaje_face): ?>
                            <li>
                                <?php echo $mensaje_face->mensaje; ?>
                                <div class="compartir">
                                    <a href="#" style="text-decoration: none; cursor:context-menu;;">Compartir</a>
                                    <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true) ?>/index/categoria/<?php echo $model->alias ?>?idm=<?php echo $mensaje_face->id; ?>" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                                </div>
                            </li>
                        <?php endforeach; ?>                    
                    </ul>
                </div>
            </div>
            <div class="otras-paginador">
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages_f,
                    'header' => '',
                    'nextPageLabel' => '',
                    'prevPageLabel' => '',
                    'selectedPageCssClass' => 'activate',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array('class' => ''),
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
                        <?php foreach ($mensajes_tw as $mensaje_tw): ?>
                            <li>
                                <?php echo $mensaje_tw->mensaje; ?>
                                <div class="compartir">
                                    <a href="#" style="text-decoration: none; cursor:context-menu;;">Compartir</a> 
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $mensaje_tw->mensaje; ?>" data-via="InteligenteVial" data-lang="es" data-count="none" data-url="www.inteligenciavial.com">Twittear</a>
                                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="otras-paginador">
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages_t,
                    'header' => '',
                    'nextPageLabel' => '',
                    'prevPageLabel' => '',
                    'selectedPageCssClass' => 'activate',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array('class' => ''),
                ));
                ?>

            </div>
        </div>
    </div><!--fin right -->
    <!---fin de la seccion de twitter--->





</div>