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
	if($final==1){
?>
	<script type="text/javascript" language="javascript">
	$('#id_cargar').hide();
	</script>
<?php 
					}		$i=0;
							foreach($contenido as $ki=>$conten) { 
								
									if(($ki) % 3 ==2)
										$cls="last";
									else
										$cls=""	;
									$tags=explode(',',$conten['tags']);		
						?>
                         
                        <div class="post_destacado <?php echo $cls;?>" id="destacado_<?php echo $i;?>" <?php if ($i>4)
						echo "style='display:none;'";?>>
                        	<div class="foto">
                        		<a href="blog_interna?idBlog=<?php echo $conten['idContenido'];?>">
                        			<img src="<?php echo Yii::app()->request->baseUrl . "/" . $conten->imagen; ?>" width="178" height="120" alt="blog">
                        		</a>                   	      		
                   	      	</div>
                            <div class="left">
                             	   	<div class="fecha">
                                   		<span class="mes"><?php echo getMes($conten['fecha_creacion']);?></span>
	                                   	<span class="dia"><?php echo getDia($conten['fecha_creacion']);?></span>
                                	</div>
                          </div>
							<div class="right">
                                    <div class="titulo">
                                    	<a href="blog_interna?idBlog=<?php echo $conten['idContenido'];?>"><?php echo $conten['titulo'];?></div></a>                                    	
                                    <div class="texto"><?php echo $conten['resumen'];?> <span class="mas"><a href="blog_interna?idBlog=<?php echo $conten['idContenido'];?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mas-red.png" width="17" height="13" alt="mas"></a></span></div>
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
								
							} 
						?>
