<div class="main-container">

    <div class="main wrapper clearfix">



        <div class="box-slide">
            <div class="foto">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->imagen; ?>" width="960" height="244" alt="foto">	
            </div>
        </div><!-- fin box-carrusel -->

        <article>

            <div class="video">
                <iframe width="650" height="390" frameborder="0" allowfullscreen="" src="<?php echo str_replace("watch?v=", "embed/", $contenido[0]->resumen) ?>"></iframe>
            </div>
            
            
            <!-- Se reciben todos los contenidos en la variable $contenido -->
            <!-- Con este contenido se recibe todo multimedia -->
            <?php
            $galeriaPrincipal = Multimedia::model()->findAll('idContenidomul=:idContenidomul order By orden ASC', array(':idContenidomul' => $contenido[0]->idContenido));
            $flag = true;
            ?>
            <!--            <div id="galeriaSobre" class="galeria">
            <?php
//                $images = array();
//                foreach ($galeriaPrincipal as $fotos) {
//                    array_push($images, array('src' => Yii::app()->request->baseUrl . "/" . $fotos->url, 'caption' => $fotos->resumen ));
//                }
//                $this->widget('application.extensions.nivosliderSobreInteligencia.CNivoSliderSobreInteligencia', array(
//                    'images' => $images,
//                    'htmlOptions' => array("style" => 'width:658px;height:291px;'),
//                        )
//                );
            ?>	-->

            <!--</div>-->
            
            <!-- inicio de la galeria -->
            
            <div class="galeria" >
                <?php
                for ($i = 0; $i < count($galeriaPrincipal); $i++) {
                    $value = $galeriaPrincipal[$i];
                    ?>
                    <div class="uno" id="fotosPrincipal_<?php echo $i; ?>" style="<?php
                if ($flag) {
                    echo'display: block;';
                } else {
                    echo "display: none;";
                }
                    ?>"> 
                        <div class="big" >
                            <?php if ($value->tipo == "I") { ?>
                                <img src="<?php echo Yii::app()->request->baseUrl . "/" . $value->url; ?>" width="643" height="291" alt="foto">
                            <?php } else { ?>
                                <iframe width="643" height="390" frameborder="0" allowfullscreen="" src="<?php echo str_replace("watch?v=", "embed/", $value->resumen) ?>"></iframe>
                            <?php } ?>
                        </div>
                        <div class="nav" >
                            <span class="left" style="<?php
                        if ($i != 0) {
                            $flag = false;
                            echo'display: block;';
                        } else {
                            echo "display: none;";
                        }
                            ?>">
                                <a onclick="mostarFoto(<?php echo $i - 1; ?>)" href="javascript:void(0)"><img width="54" height="53" alt="prev" src="<?php echo Yii::app()->request->baseUrl; ?>/img/arrow-left.png"></a>
                            </span>
                            <span class="right" style="<?php
                              if ($i != count($galeriaPrincipal) - 1) {
                                  $flag = false;
                                  echo'display: block;';
                              } else {
                                  echo "display: none;";
                              }
                            ?>">
                                <a onclick="mostarFoto(<?php echo $i + 1; ?>)" href="javascript:void(0)"><img width="54" height="53" alt="next" src="<?php echo Yii::app()->request->baseUrl; ?>/img/arrow-right.png"></a>
                            </span>
                        </div> <!-- fin div class nav -->
                        
                    </div> <!-- fin div uno -->     
                <?php } ?> <!-- en for-->
                
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
                    <a href="#"  id="mycarousel-next" class="right" <?php
                        if (count($galeriaPrincipal) <= 5) {
                            echo "style=display:none";
                        }
                        ?>><img width="38" height="38" alt="prev" src="<?php echo Yii::app()->request->baseUrl; ?>/img/carrigth.png"></a>
                </div> <!-- end  div thumbs -->
            </div><!-- fin de la galeria -->
            
            
            <div class="text-galeria">
                <?php echo $contenido[0]->descripcion; ?>
            </div><!-- fin text galeria -->

            <div class="box-otras">
                <h3><?php echo $subCategoria->titulo; ?></h3>

                <ul>
                    <?php foreach ($contenidoSubcat as $value) { ?>
                        <li>
                            <div class="foto"><img width="191" height="127" alt="inteligencia" src="<?php echo Yii::app()->request->baseUrl . "/" . $value->imagen; ?>"></div>

                            <div class="right">
                                <div class="titulo"><?php echo $value->titulo; ?></div>
                                <div class="texto">
                                    <?php echo $value->resumen; ?>
                                </div>
                                <br />
                                <?php
                                $galeria = Multimedia::model()->findAll('idContenidomul=:idContenidomul', array(':idContenidomul' => $value->idContenido));
                                $flag = true;
                                ?>
                                <div class="bts">
                                    <a href="javascript:void(0)" onclick="clickLink('<?php echo "link" . $value->idContenido ?>')">Ver más</a>
                                </div>
                                <div style="display: none">
                                    <?php foreach ($galeria as $foto) { ?>
                                        <?php if ($foto->tipo == "I") { ?>
                                            <a <?php
                                if ($flag) {
                                    echo "id='link" . $value->idContenido . "'";
                                    $flag = false;
                                }
                                            ?> class="galeria" title="<?php echo $foto->resumen; ?>" href="<?php echo Yii::app()->request->baseUrl . "/" . $foto->url; ?>" rel="<?php echo $value->idContenido; ?>"></a>
                                            <?php } else { ?>
                                            <a <?php
                                    if ($flag) {
                                        echo "id='link" . $value->idContenido . "'";
                                        $flag = false;
                                    }
                                                ?> class="galeria" title="<?php echo $foto->resumen; ?>" href="#video<?php echo $foto->idmultimedia; ?>" rel="<?php echo $value->idContenido; ?>"></a>
                                            <iframe width="650" height="390" frameborder="0" allowfullscreen="" src="<?php echo str_replace("watch?v=", "embed/", $foto->url) ?>" id="video<?php echo $foto->idmultimedia; ?>"></iframe>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div><!--fin right-->
                        </li>
                    <?php } ?>
                </ul>

            </div><!-- fin box-otras -->

            <div class="otras-paginador">
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'firstPageLabel' => '',
                    'firstPageCssClass' => '',
                    'lastPageLabel' => '',
                    'lastPageCssClass' => '',
                    'header' => '',
                    'nextPageCssClass' => 'last',
                    'nextPageLabel' => '',
                    'previousPageCssClass' => 'first',
                    'selectedPageCssClass' => 'activate',
                    'prevPageLabel' => '',
                    'htmlOptions' => array('class' => 'otras-paginador'),
                ));
                $this->widget('application.extensions.fancybox.EFancyBox', array(
                    'target' => 'a.galeria',
                    'config' => array(
                        'titleShow' => true,
                        'showNavArrows' => true,
                    )
                        )
                );
                ?>
            </div>                

        </article>

        <aside>
            <div class="box-banner"> <a href="<?php echo Yii::app()->createUrl('form/create'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.png" width="254" height="227" alt="Únase, y empiece a usar su inteligencia vial."></a> </div>


            <!-- cersion anterior de twitter
            <div class="box-twitter">
                <div class="content">
                    <h3>Tweets recientes</h3>
                    <?php
                    $this->widget('ext.echirp.EChirp', array('options' => array('user' => 'InteligenteVial', 'max' => 4, 'target' => 'feed_tweets', "templates" => array("base" => '<ul>{{tweets}}</ul>',
                                "tweet" => '<li><span class="user">@{{user.name}}&nbsp;</span>{{html}}</li>'
                        ))));
                    ?>
                    <div id="feed_tweets" class="divTweets">

                    </div>





                    <div class="autor">
                        Siguenos: <span class="user"><a href="#">@InteligenteVial</a></span>
                    </div>
                </div><!-- fin content  -->
            <!--
            </div><!-- fin twitter  -->


            <div class="box-twitter" >
                <div class="content">
                    <!-- Widget para la version de tweeter 1.1-->
                    <h3>Tweets recientes</h3>
                    <!--Aqui pone el widget los ultimos tweets-->
                    <div id="feed_tweets" class="divTweets">                    
                    </div>
                    <div id="tweets" class="tweets" style="height: 250px; overflow-y:scroll;">
                    </div>    
                    
                    <!--Script del widget par ala nueva version de tweeter-->
                    <script type="text/javascript">
                        // #### Twitter Post Fetcher v7.0 ####
                        // Coded by Jason Mayes 2013 www.jasonmayes.com
                        var twitterFetcher=function(){function t(d){return d.replace(/<b[^>]*>(.*?)<\/b>/gi,function(c,d){return d}).replace(/class=".*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,"")}function m(d,c){for(var f=[],e=RegExp("(^| )"+c+"( |$)"),g=d.getElementsByTagName("*"),b=0,a=g.length;b<a;b++)e.test(g[b].className)&&f.push(g[b]);return f}var u="",j=20,n=!0,h=[],p=!1,k=!0,l=!0,q=null,r=!0;return{fetch:function(d,c,f,e,g,b,a){void 0===f&&(f=20);void 0===e&&(n=!0);void 0===g&&(g=!0);void 0===b&&(b=!0); void 0===a&&(a="default");p?h.push({id:d,domId:c,maxTweets:f,enableLinks:e,showUser:g,showTime:b,dateFunction:a}):(p=!0,u=c,j=f,n=e,l=g,k=b,q=a,c=document.createElement("script"),c.type="text/javascript",c.src="//cdn.syndication.twimg.com/widgets/timelines/"+d+"?&lang=en&callback=twitterFetcher.callback&suppress_response_codes=true&rnd="+Math.random(),document.getElementsByTagName("head")[0].appendChild(c))},callback:function(d){var c=document.createElement("div");c.innerHTML=d.body;"undefined"===typeof c.getElementsByClassName&&(r=!1);var f=d=null,e=null;r?(d=c.getElementsByClassName("e-entry-title"),f=c.getElementsByClassName("p-author"),e=c.getElementsByClassName("dt-updated")):(d=m(c,"e-entry-title"),f=m(c,"p-author"),e=m(c,"dt-updated"));for(var c=[],g=d.length,b=0;b<g;){if("string"!==typeof q){var a=new Date(e[b].getAttribute("datetime").replace(/-/g,"/").replace("T"," ").split("+")[0]),a=q(a);e[b].setAttribute("aria-label",a);if(d[b].innerText)if(r)e[b].innerText=a;else{var s=document.createElement("p"), v=document.createTextNode(a);s.appendChild(v);s.setAttribute("aria-label",a);e[b]=s}else e[b].textContent=a}n?(a="",l&&(a+='<div class="user">'+t(f[b].innerHTML)+"</div>"),a+='<p class="tweet">'+t(d[b].innerHTML)+"</p>",k&&(a+='<p class="timePosted">'+e[b].getAttribute("aria-label")+"</p>")):d[b].innerText?(a="",l&&(a+='<span class="user">'+f[b].innerText+"</span>"),a+='<p class="tweet">'+d[b].innerText+"</p>",k&&(a+='<p class="timePosted">'+e[b].innerText+"</p>")):(a="",l&&(a+='<span class="user">'+f[b].textContent.replace('Inteligencia Vial','')+ "</span>"),a+='<span class="tweet">'+d[b].textContent+"</span>",k&&(a+='<p class="timePosted">'+e[b].textContent+"</p>"));c.push(a);b++}c.length>j&&c.splice(j,c.length-j);d=c.length;f=0;e=document.getElementById(u);for(g="<ul>";f<d;)g+="<li>"+c[f]+"</li>",f++;e.innerHTML=g+"</ul>";p=!1;0<h.length&&(twitterFetcher.fetch(h[0].id,h[0].domId,h[0].maxTweets,h[0].enableLinks,h[0].showUser,h[0].showTime,h[0].dateFunction),h.splice(0,1))}}}();
                        function dateFormatter(date) {return date.toTimeString();}
                        // Parametros de configuracion:
                        // con 3 ultimos tweets
                        //sin enlaces
                        //sin avatar
                        //sin fecha y hora
                        twitterFetcher.fetch('380022510441349120', 'tweets', 3, false,true,false,'funcion');
                    </script>
                    <!-- fin del script del widget tweets-->

                    <div class="autor">
                        Siguenos: <span class="user"><a href="https://twitter.com/InteligenteVial" target="_blank">@InteligenteVial</a></span>
                    </div>
                </div><!-- fin content  -->
            </div><!-- fin twitter  -->

        </aside>

    </div> <!-- #main -->
</div> <!-- #main-container -->
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