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

		  data: { page: inicial,tag:'<?php echo $name_tag ?>'},
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
                 	<h2><?php echo $name_tag ?></h2>
                 </div>
                
                <article>
                   
                    <section>
                        <div class="col1">

						
                        
                        <div class="otros-post">
                        <div  id="id_otros">
                        <?php 
						$cls = ""; 	
						$i=0;
						foreach($contenido as $ki=>$conten) { 
							
						 	if(($ki+1) % 3 ==0)
						 		$cls="last";
							else
								$cls=""	;		
							$conten['tags'] = str_replace(', ',',',$conten['tags']);	
							$tags=explode(',',$conten['tags']);
						
						?>
                        <div class="post_destacado <?php echo $cls?>" id="destacado_<?php echo $i?>" <?php if ($i>2)
						echo "style='display:none;'";?>>
                        	<div class="foto">
                   	      <img src="<?php echo Yii::app()->request->baseUrl . "/" . $conten->imagen; ?>" width="178" height="120" alt="blog"></div>
                            <div class="left">
                             	   	<div class="fecha">
                                   		<span class="mes"><?php echo getMes($conten['fecha_creacion']);?></span>
	                                   	<span class="dia"><?php echo getDia($conten['fecha_creacion']);?></span>                                	</div>
                          </div>
							<div class="right">
                                    <div class="titulo"><?php echo $conten['titulo'];?></div>
                                    <div class="texto"><?php echo $conten['resumen'];?> <span class="mas"><a href="blog_interna?idBlog=<?php echo $conten['idContenido'];?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mas-red.png" width="17" height="13" alt="mas"></a></span></div>
                            </div>
                        </div><!--fin post_destacado -->
                        <?php 
							$i++;
							} ?>
                        
                        </div>
                        <?php if($item_count >3){ ?>
                        <div class="cargar-mas" id="id_cargar"><a href="javascript:void(0);" onclick="mostrarMas();">Cargar más</a></div>
                         <?php }?>
                        </div><!--fin otros post -->
                    </div>
                      <!--fin col1 -->
                    
                  
                    
                    
                    </section>
                    
                    
                </article>

                <aside>
                    <div class="box-banner"> <a href="FPV_Deja_tu_excusa_Fase2.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner.png" width="254" height="227" alt="Únase, y empiece a usar su inteligencia vial."></a> </div>
                    
              <div class="box-enterate">
                    	<?php include 'blog_enterate.php'?>
                    </div><!--fin box-enterate -->
                    
                    <div class="box-twitter">
                    	<div class="content">
	                    	<h3>Tweets recientes</h3>
                            <ul>
                            	<li><span class="user">@InteligenteVial</span> En este plan retorno recuerde la frase del día: Es más inteligente el que tolera que el que grita. </li>
                                <li><span class="user">@InteligenteVial</span> Es mejor caminar hasta la esquina y pasar la calle cuando el semáforo de peatones está en verde. ¿No le parece? </li>
                                <li><span class="user">@InteligenteVial</span> En este plan retorno recuerde la frase del día: Es más inteligente el que tolera que el que grita. </li>
                            </ul>
                            
                            
                            
                      
                        
                        <div class="autor">
                            	Siguenos: <span class="user"><a href="#">@InteligenteVial</a></span>                                </div>
                            </div><!-- fin content  -->
                    </div>
                  <!-- fin twitter  -->
                    
                </aside>

            </div>