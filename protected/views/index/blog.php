<?php
	function getMes($fecha)
	{
		$datos_fecha = explode("-",$fecha);
		$mes = $datos_fecha[1];
		$meses=array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
		
		
		$mes = (int)($mes);
		
			
		return $meses[$mes-1];
	}
	function getDia($fecha){
		$datos_fecha = explode("-",$fecha);
		return $datos_fecha[2];
		
	}
?>
<script type="text/javascript" language="javascript">
	var inicial=2;
	mostrarMas=function(){
	
		$.ajax({
		  url: "../getblogpag",
		  type: "GET",

		  data: { page: inicial},
		  context: document.body
		}).done(function(msg ) {
		 // $(this).addClass("done");
			//alert(msg);
			if(msg !='-1')
				$('#id_otros').append(msg);
			else{
				
				$('#id_cargar').hide();
			}	
			
		});	
	
		
		inicial=inicial+1;
		//alert($('#destacado_5').show());
	}
	//mostrarMas();
	
</script>
<div class="main wrapper clearfix">

                 <div class="titulo-principal">
                 	<h2>Blog</h2>
                 </div>
                
                <article>
                   
                    <section>
                        <div class="col1">
						<?php 
						$cls = ""; 	
						$i=0;
						//print_r($contenido);
						foreach($contenido as $ki=>$conten) { 
							if($i>1)
								break;
						 	if($ki % 2 ==1)
						 		$cls="";
							else
								$cls="left"	;
								 		
							$tags=explode(',',$conten->tags);
						//echo "T:".$conten->tags;
						?>
                        
						<div class="post_destacado <?php echo $cls?>">
                        	<!--<div class="foto"><a href="blog_interna?idBlog=<?php echo $conten['idContenido'];?>"><img src="<?php echo Yii::app()->request->baseUrl . "/" . $conten->imagen; ?>" width="282" height="214" alt="blog" /></a></div>-->
                        	<div class="foto"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/timthumb.php?src=<?php echo $conten->imagen;?>&h=214&w=282" alt="blog" /></a></div>
<div class="left">
                             	   	<div class="fecha">
                                   		<span class="mes"><?php echo getMes($conten['fecha_creacion']);?></span>
	                                   	<span class="dia"><?php echo getDia($conten['fecha_creacion']);?></span>
                                	</div>
                            </div>
							<div class="right">
                                    <div class="titulo"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><?php echo $conten['titulo'];?></a></div>
                                    <div class="texto"><?php echo $conten['resumen'];?><span class="mas"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mas-red.png" width="17" height="13" alt="mas"></a></span></div>
                            </div>
                            
                            <div class="tags">
                            	<span>Tags</span>
                                <ul>
                                	<?php foreach($tags as $tag) { ?>
                               		<li><a href="?tag=<?php echo $tag;?>"><?php echo $tag?></a></li>
									<?php } ?>
                                    
                                </ul>
                            </div>
                        </div><!--fin post_destacado -->
                        <?php 
							$i++;
							} ?>
                        <!--fin post_destacado -->
                        
                        <div class="otros-post">
                        <div  id="id_otros">
                        <?php 
							$i=0;
							foreach($contenido as $ki=>$conten) { 
								if($i >1)
								{
									if(($ki-1) % 3 ==0)
										$cls="last";
									else
										$cls=""	;
									$tags=explode(',',$conten['tags']);		
						?>
                         
                        <div class="post_destacado <?php echo $cls;?>" id="destacado_<?php echo $i;?>" <?php if ($i>4)
						echo "style='display:none;'";?>>
                        	<div class="foto"> <a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><img src="<?php echo Yii::app()->request->baseUrl . "/" . $conten->imagen; ?>" width="178" height="120" alt="blog"></a></div>
                            <div class="left">
                             	   	<div class="fecha">
                                   		<span class="mes"><?php echo getMes($conten['fecha_creacion']);?></span>
	                                   	<span class="dia"><?php echo getDia($conten['fecha_creacion']);?></span>
                                	</div>
                          </div>
							<div class="right">
                                    <div class="titulo"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><?php echo $conten['titulo'];?></a></div>
                                    <div class="texto"><?php echo $conten['resumen'];?> <span class="mas"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mas-red.png" width="17" height="13" alt="mas"></a></span></div>
                            </div>
                            
                            <div class="tags">
                            <span>Tags</span>
                            	<ul>
                               	  <?php foreach($tags as $tag) { ?>
                               		<li><a href="?tag=<?php echo $tag;?>"><?php echo $tag?></a></li>
									<?php } ?>
                                </ul>
                            </div>
                        </div><!--fin post_destacado -->
                        <?php 
								}
								$i++;
								
							} 
						?>
                       
                        
                        </div>
                        <?php if($item_count >5){ ?>
                        <div class="cargar-mas" id="id_cargar"><a href="javascript:void(0);" onclick="mostrarMas();">Cargar más</a></div>
                        <?php }?>
                        </div><!--fin otros post -->
                        
                        
                    </div><!--fin col1 -->
                    
                  
                    
                    
                    </section>
                    
                    
                </article>

                <aside>
                    <div class="box-banner"> <a href="<?php echo Yii::app()->createUrl('form/create'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.png" width="254" height="227" alt="Únase, y empiece a usar su inteligencia vial."></a> </div>
                    
                    <div class="box-enterate">
                    	<?php echo $this->renderPartial('blog_enterate'); ?>
                    </div><!--fin box-enterate -->
                    
                    <!--box de descrgables-->
                    <div class="box-descargar" style="margin-top: 40px;"> 
                    	<div class="titulo">
                    		<?php $ruta=Yii::app()->request->baseUrl.'/index/categoria/descargables'; ?>
                       		<a href="<?php echo $ruta;?>">Haga clic aquí</a> </div>
                        <div class="descripcion">
                        	Para conocer y descargar diferentes<br>
							 herramientas que le ayudarán a<br>
							 promover en su entorno<br>
							 
							la inteligencia vial

                        </div>
                    
                    </div>
                    <!--fin box descargables-->

                    <!--nueva version de tiwtter-->
                    
			        <div class="box-twitter" style="margin-top:40px;">
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

            </div>