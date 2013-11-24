<h3><a href="<?php echo Yii::app()->createUrl('index/categoria', array('alias' => $this->BlogAlias))?>">ENTéRESE DE LO QUE PASA</a></h3>
						<?php 
							$i=0;
							foreach($this->ultimosBlog as $ki=>$conten) { 
									
						?>			
                        <div class="nota">
                        	<div class="left">
                             	   	<div class="fecha">
                                   		<span class="mes"><?php echo getMes($conten['fecha_creacion']);?></span>
	                                   	<span class="dia"><?php echo getDia($conten['fecha_creacion']);?></span>
                                	</div>
                          </div>
                          
                          <div class="right">
                              <div class="texto"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><?php echo $conten['resumen'];?></a><span class="mas"><a href="<?php echo Yii::app()->createUrl("index/categoria",array("alias"=>"blog",'interna'=>$conten['alias']));?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mas-red.png" width="17" height="13" alt="mas"></a></span></div>
                            </div>
                         </div><!-- fin nota -->
                         <?php } ?>
                         <div class="bts"><a href="<?php echo Yii::app()->createUrl('index/categoria', array('alias' => $this->BlogAlias))?>">Ver todas las actualizaciones
                    </a></div>
 