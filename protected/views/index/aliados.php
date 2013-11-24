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
<div id="aliados">
        <div class="main wrapper clearfix">
            <div class="box-slide">
                <div class="foto">
                    <img width="960" height="244" alt="foto" src="<?php echo Yii::app()->request->baseUrl . '/' . $model->imagen; ?>">	
                </div>
            </div><!-- fin box-carrusel -->

            <article>

                <div class="texto-top">
                    <?php echo $model->descripcion; ?>
                </div><!-- fin tipos de alianzas -->

                <div class="box-logos"><form name="filtro" method="post" action="<?php echo Yii::app()->createUrl('index/categoria', array('alias'=>$model->alias)); ?>">
                    <div class="filtrar">Filtre empresas por: 
                        
                            <select id="aliados" name="datos[aliados]" onchange="cambio();">
                                <option value="0">Seleccione un nombre</option>
                                <option value="1" <?php if($filtro==1){ echo 'selected="selected"';}?>>A - D</option>
                                <option value="2" <?php if($filtro==2){ echo 'selected="selected"';}?>>E - H</option>
                                <option value="3" <?php if($filtro==3){ echo 'selected="selected"';}?>>I - L</option>
                                <option value="4" <?php if($filtro==4){ echo 'selected="selected"';}?>>M - O</option>
                                <option value="5" <?php if($filtro==5){ echo 'selected="selected"';}?>>P - S</option>
                                <option value="6" <?php if($filtro==6){ echo 'selected="selected"';}?>>T - W</option>
                                <option value="7" <?php if($filtro==7){ echo 'selected="selected"';}?>>X - Z</option>
                                <option value="8" <?php if($filtro==8){ echo 'selected="selected"';}?>>0 - 9</option>
                            </select>
                            <input type="hidden" name="datos[idCategoria]" value="<?php echo $model->idcategoria; ?>"/>
                            <input id="filtrar" type="submit" style="display: none" />
                       
                    </div>
 </form>
                    <ul>
                        <?php 
						$i=1;
						$renglon=1;
						$script="$(function($){";
						foreach ($contenido as $value) { ?>
                            <li>
                                <div class="nombre renglon<?php echo $renglon?>">

                                    <?php echo $value->titulo; ?>
                                </div>
                                

                                <div class="foto">
                                    <img src="<?php echo Yii::app()->request->baseUrl . "/" . $value->imagen; ?>" width="175" height="115" alt="3m">
                                </div>

                                <!--div class="fecha">
                                <?php 
								//print_r($value->fecha_creacion);
								/*if($value->fecha_creacion!=""){?>
                                    Incluido el <?php echo $value->fecha_creacion;*/ ?>
                                <?php //}?>
                                </div-->
                                <?php 
								
                                /*$galeria = Multimedia::model()->findAll('idContenidomul=:idContenidomul', array(':idContenidomul' => $value->idContenido)); 
                                $flag = true;
                                 foreach ($galeria as $foto) {*/ ?>
                                    <!--a <?php /*if($flag){ echo "id='link".$value->idContenido."'"; $flag=false;} ?> class="galeria" title="<?php echo $foto->resumen; ?>" href="<?php echo Yii::app()->request->baseUrl . "/" . $foto->url; ?>" rel="<?php echo $value->idContenido;*/ ?>"></a>
                                <?php /*} 
								 if(!$flag){*/?>
                                <div class="ver"> 
                                    <a href="javascript:void(0)" onclick="clickLink('<?php //echo "link".$value->idContenido ?>')"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/img/mas.png" width="17" height="17" alt="mas"></a>
                                    <a href="javascript:void(0)" onclick="clickLink('<?php //echo "link".$value->idContenido ?>')">VER FOTOS</a>
                                </div-->
                               <?php //}?>
                            </li>
						
                        <?php 
							if($i%3==0){
								$script=$script."$('.renglon".$renglon."').equalCols();";	
							$renglon++;
							}
							$i++;
						}
						$script=$script."$('.renglon".$renglon."').equalCols();";
						$script=$script."});";
						//echo $script;
						Yii::app()->clientScript->registerScript($renglon, $script, CClientScript::POS_READY);	
						 ?>
                    </ul>
                    <div class="otras-paginador">
                        <?php
                        /* $this->widget('CLinkPager', array(
                          'currentPage' => $pages->getCurrentPage(),
                          'itemCount' => $item_count,
                          'pageSize' => $page_size,
                          'maxButtonCount' => 3,
                          'nextPageLabel' => 'next',
                          'lastPageLabel' => "",
                          'firstPageLabel' => "",
                          'selectedPageCssClass' => 'activate',
                          'prevPageLabel' => 'prev',
                          'header' => "",
                          'htmlOptions' => array('class' => 'otras-paginador'),
                          )); */
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
                            )
                                )
                        );
                        
                        $this->widget('application.extensions.fancybox.EFancyBox', array(
                            'target' => 'a#clickSendConfirm',
                            'config' => array(
                                'titleShow' => true,
                            )
                                )
                        );
                        
                        ?>
                    </div>
                </div>

            </article>

            <aside>
                <div class="box-banner"> <a href="<?php echo Yii::app()->createUrl('form/create'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.png" width="254" height="227" alt="Únase, y empiece a usar su inteligencia vial."></a> </div>

                <div class="form-aliado">
                    <div class="titulo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/tit-aliado.png" width="256" height="49" alt="aliado">
                    </div>

                    <div class="form">
                        <div class="texto">
                            Convierta a su empresa en pionera 
                            de la movilidad inteligente.
                        </div>
                        <div class="bt" id="btnMostrar">
                            <input name="Haga clic aquí" type="button" value="Haga clic aquí" onclick="mostrarFormulario()">
                        </div>

                        <div id="formulario" style="display: none">
                            <form name="excusas" action="<?php echo Yii::app()->createUrl('index/save',array('alias'=>$model->alias)); ?>" method="post">
                                <label class="required" for="Excusas_nombre_usuario">Nombre <span class="required">*</span></label>                   <input type="text" name="Excusas[nombre]" id="nombre" maxlength="250" size="60"> 
                                <label class="required" for="Excusas_email">Correo electrónico <span class="required">*</span></label>                      					  <input type="text" name="Excusas[correo]" id="correo" maxlength="200" size="60">		<label class="required" for="Excusas_excusa">Escriba su comentario <span class="required">*</span></label>		<textarea id="Excusas_excusa" name="Excusas[excusa]" cols="50" rows="6"></textarea>	
                                <div class="bt">
                                    <input name="click" type="button" onclick="validar()" value="Enviar">
                                    <input name="enviar" id="enviar" type="submit" value="Enviar" style="display: none">
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- fin form aliado -->

                <div class="box-enterate">
                    <?php echo $this->renderPartial('blog_enterate',array('model'=>$model)); ?>
                </div><!--fin box-enterate -->

                <!--version anterior de twitter
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

                            Siguenos: <span class="user"><a href="https://twitter.com/InteligenteVial" target="_blank">@InteligenteVial</a></span>
                        </div>
                    </div><!-- fin content  -->
                <!--
                </div><!-- fin twitter  -->

                
                <div class="box-twitter" style="margin-top: 40px;">
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
<div class="form-aliado-movil">
                    <div class="titulo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/tit-aliado.png" width="256" height="49" alt="aliado">
                    </div>

                    <div class="form">
                        <div class="texto">
                            Convierta a su empresa en pionera 
                            de la movilidad inteligente.
                        </div>                       
                        <div id="formulario">
                            <form name="form-movil" action="<?php echo Yii::app()->createUrl('index/save',array('alias'=>$model->alias)); ?>" method="post" id="form-movil">
                                <label class="required" for="Excusas_nombre_usuario">Nombre <span class="required">*</span></label>                   <input type="text" name="Excusas[nombre]" id="nombre-movil" maxlength="250" size="60"> 
                                <label class="required" for="Excusas_email">Correo electrónico <span class="required">*</span></label>                      					  <input type="text" name="Excusas[correo]" id="correo-movil" maxlength="200" size="60">		<label class="required" for="Excusas_excusa">Escriba su comentario <span class="required">*</span></label>		<textarea id="Excusas_excusa-movil" name="Excusas[excusa]" cols="50" rows="6"></textarea>	
                                <div class="bt">
                                    <input name="click" type="button" onclick="validarMovil()" value="Enviar">
                                    <input name="enviar" id="enviar" type="submit" value="Enviar" style="display: none">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="box-enterate-movil">
                    <?php echo $this->renderPartial('blog_enterate',array('model'=>$model)); ?>
                </div><!--fin box-enterate -->
</div>
<a href="<?php echo Yii::app()->createUrl('index/confirm',array('msg'=>'Sus datos se han guardado correctamente')); ?>" id="clickSendConfirm"></a>
<?php
    Yii::app()->clientScript->registerScript('helloscript',"
        confirma();
    ",CClientScript::POS_READY);
?>
<script type="text/javascript">
$.fn.equalCols = function(){
	
//Array Sorter
var sortNumber = function(a,b){return b - a;};
var heights = [];
//Push each height into an array
$(this).each(function(){
heights.push($(this).height());
});
heights.sort(sortNumber);
var maxHeight = heights[0];
return this.each(function(){
//Set each column to the max height

$(this).css({'height': maxHeight});
});
};
    $(function(){
        $('.condiciones_pck').equalCols();
        $('.recomendar').click(function() {
            cargaCompartir('{#$datos.idPaquete#}');
        });
    });
    confirma = function(){
        <?php if($confirma=="true"){ ?>
                $("#clickSendConfirm").click();
				_gaq.push(['_trackPageview', '/aliado-registrado/']);
        <?php } ?>
    }
    mostrarFormulario = function(){
        $("#btnMostrar").hide(500, function(){
            $("#formulario").show();
        });
    }
    validar = function(){
        if(trim($("#nombre").val()) == ""){
            alert("Por favor ingrese su nombre")
        }else{
            if(trim($("#correo").val()) == ""){
                alert("Por favor ingrese su correo");
            }else{
                if(trim($("#Excusas_excusa").val())==""){
                    alert("Por favor ingrese su mensaje");
                }else{
                    $("#enviar").click();
                }
            }
        }
    }
	validarMovil = function(){
        if(trim($("#nombre-movil").val()) == ""){
            alert("Por favor ingrese su nombre")
        }else{
            if(trim($("#correo-movil").val()) == ""){
                alert("Por favor ingrese su correo");
            }else{
                if(trim($("#Excusas_excusa-movil").val())==""){
                    alert("Por favor ingrese su mensaje");
                }else{
                    $("#enviar").click();
                }
            }
        }
    }
	
    function trim (myString)
    {
        return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
    }
    cambio = function(){
        $("#filtrar").click();
    }
    clickLink = function(id){
        $("#"+id).click();
    }
</script>