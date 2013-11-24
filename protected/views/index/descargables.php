    <div class="main wrapper clearfix">
     
         
         <div class="contenedor-slide">
            <div class="box-slide">
                <div class="foto">
                    <img src="<?php echo Yii::app()->request->baseUrl;?>/img/descargables/slide.jpg" width="965" height="247" alt="foto">	
               </div>
                
                    
            </div>


            </div><!--fin contenedor slide -->
            
            <!--menu izquierdo de categorias--> 
            <!--original-->
            <div class="content-left">             

              <div class="box_menu" id="acordeon">
                <ul>
                    <?php foreach($categ_desc_padres as $cp): ?>

                      <li class="accord-header"><span><a href="#"><?php echo $cp->titulo;?></a></span></li>
                      <?php 
                        $criteria=new CDbCriteria;
                        $criteria->select='id, titulo, orden';
                        $criteria->condition="padre=".$cp->id." "."and activo='s'";
                        $criteria->order="orden ASC";
                        $categ_desc_hijos2=Categoriadesc::model()->findAll($criteria);
                      ?>
                      <!--<?php $categ_desc_hijos=Categoriadesc::model()->findAllByAttributes(array('padre'=>$cp->id)); ?>-->
                      <div class="sub" style="height: auto !important;">
                        <ul>
                          <?php foreach($categ_desc_hijos2 as $ch): ?>
                            <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$ch->id));?>
                            <li class="accord-content"><span><a href="<?php echo $ruta;?>"><?php echo $ch->titulo;?></a></span></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endforeach; ?>
                </ul>
              </div>  

              <!--incluir script del menu-->
              <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
              <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

              <script>
              $( "#acordeon" ).accordion({icons: false, header:".accord-header", heightStyle: "content"});
              </script>

              <!--fin menu categorias-->
            </div><!-- fin content left -->
            
            
            
           <div class="content-right">
           <div class="texto-top">
            Bienvenido a “Descargables”. Aquí encontrará mensualmente nuevas herramientas que le ayudarán a pedir la calle que quiere en diferentes entornos, las cuales podrá descargar y compartir con otros para ayudarnos promover la inteligencia vial.   
          </div>



          <!--menu movil-->
          <div class="box-menu-descargas-movil">
              <label>
              <select name="categorias">
                <option disbaled="disabled"> - SELECCIONAR - </option>
                  <?php foreach($categ_desc_padres as $cp): ?>
                      <option value="0" disabled="disabled"><?php echo strtoupper($cp->titulo);?></option>
                      <?php 
                        $criteria=new CDbCriteria;
                        $criteria->select='id, titulo, orden';
                        $criteria->condition="padre=".$cp->id." "."and activo='s'";
                        $criteria->order="orden ASC";
                        $categ_desc_hijos2=Categoriadesc::model()->findAll($criteria);
                      ?>
                      <?php foreach($categ_desc_hijos2 as $ch): ?>
                            <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$ch->id));?>
                            <option value="<?php echo $ruta;?>"><?php echo '>'.$ch->titulo;?></option>                            
                      <?php endforeach; ?>
                  <?php endforeach; ?>
              </select>
              </label>
          </div><!-- fin menu descargas movil movil -->
           



          <?php 
            //variable para enumeracion de las filas
            $fila=0;
           ?>
          <!--mostrar item a item en una fila de 3 descargas-->
          <?php foreach($categ_desc_padres as $cp): ?>
              <!--Obtener todos los datos de las tres ultimas descargas de esta categoria que esten activas-->
              <?php 
                $id_padre=$cp->id;
                $descargas=Yii::app()->db->createCommand()
                ->select('ch.titulo as titulo_hijo, ch.id as id_hijo, cp.titulo as titulo_padre, d.fecha, d.descripcion, d.imagen, d.archivo, cp.id as id_padre, d.titulo as titulo_descarga')
                ->from('descarga d')
                ->join('categoriadesc ch', 'd.categoria=ch.id')
                ->join('categoriadesc cp', 'cp.id=ch.padre')
                ->where('d.activo="s" and cp.id='.$id_padre.' and d.activo="s"')       
                ->order('fecha desc')
                ->limit(3)
                ->queryAll();
              ?>

              <!--la categoria padre tiene hijos activos?-->
              <?php if($descargas[0] || $descargas[1] || $descargas[2]): ?>
                  <!--inicio fila de tres descargas-->
                  <?php $fila++; ?>
                  <div class="item">

                      <div class="otros-post">

                          <!--titulo del grupo de 3 descargas-->
                          <div class="titulo1">
                              <?php echo $cp->titulo;?>
                          </div>

                          

                          <!--mostrar los cuadros de las tres utimas descargas-->

                          <!--primera descarga-->
                          <?php if($descargas[0]): ?>
                            <div class="post_destacado post<?php echo $fila;?>">
                              
                                <div class="left">
                                    <div class="fecha">
                                      <?php 
                                          $mesnumero=date("m", strtotime($descargas[0]['fecha']));
                                          switch($mesnumero){
                                            case 1: $me="Ene";break;
                                            case 2: $me="Feb";break;
                                            case 3: $me="Mar";break;
                                            case 4: $me="Abr";break;
                                            case 5: $me="May";break;
                                            case 6: $me="Jun";break;
                                            case 7: $me="Jul";break;
                                            case 8: $me="Ago";break;
                                            case 9: $me="Sep";break;
                                            case 10: $me="Oct";break;
                                            case 11: $me="Nov";break;
                                            case 12: $me="Dic";break;
                                          }
                                      ?>
                                      <span class="mes"><?php echo $me;?></span>
                                      <span class="dia"><?php echo date("d", strtotime($descargas[0]['fecha']));?></span>
                                    </div>
                                </div>
                                <div class="right titulo_post<?php echo $fila;?>">
                                    <div class="titulo"><?php echo $descargas[0]['titulo_descarga'];?></div>
                                </div><!-- fin right -->
                                <div class="foto">
                                    <?php 
                                      if($descargas[0]['imagen']==null){
                                        $descargas[0]['imagen']='FPV-F1_TC.png';
                                      } 
                                    ?>
                                    <!--<img width="178" height="120" alt="blog" src="<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[0]['imagen'];?>">-->
                                    <img src="<?php echo Yii::app()->request->baseUrl;?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[0]['imagen'];?>&h=120&w=178&zc=0" alt="blog"/>
                                </div>
                                <div class="sub-cat">
                                    <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$descargas[0]['id_hijo']));?>
                                    <a href="<?php echo $ruta;?>"><?php echo $descargas[0]['titulo_hijo']?></a> 
                                </div>
                                <div class="texto"><?php echo $descargas[0]['descripcion'];?></div>

                                <div class="descargar">
                                    <?php $link=Yii::app()->request->baseUrl.'/descargar_archivo.php?f='.$descargas[0]['archivo'];?>
                                    <a href="<?php echo $link;?>">Descargar</a>                          
                                </div>

                            </div><!--fin post_destacado -->
                          <?php endif; ?>

                          <!--segunda descarga-->
                          <?php if($descargas[1]): ?>
                            <div class="post_destacado post<?php echo $fila;?>">
                                <div class="left">
                                  <?php 
                                      $mesnumero=date("m", strtotime($descargas[1]['fecha']));
                                      switch($mesnumero){
                                        case 1: $me="Ene";break;
                                        case 2: $me="Feb";break;
                                        case 3: $me="Mar";break;
                                        case 4: $me="Abr";break;
                                        case 5: $me="May";break;
                                        case 6: $me="Jun";break;
                                        case 7: $me="Jul";break;
                                        case 8: $me="Ago";break;
                                        case 9: $me="Sep";break;
                                        case 10: $me="Oct";break;
                                        case 11: $me="Nov";break;
                                        case 12: $me="Dic";break;
                                      }
                                  ?>
                                  <div class="fecha"> <span class="mes"><?php echo $me?></span> 
                                      <span class="dia"><?php echo date("d", strtotime($descargas[1]['fecha']));?></span> 
                                  </div>
                                </div>
                                <div class="right titulo_post<?php echo $fila;?>">
                                  <div class="titulo"><?php echo $descargas[1]['titulo_descarga'];?></div>
                                </div>
                                <!-- fin right -->
                                <div class="foto">
                                  <?php 
                                    if($descargas[1]['imagen']==null){
                                      $descargas[1]['imagen']='FPV-F1_TC.png';
                                    } 
                                  ?>
                                  <!--<div class="foto"> <img width="178" height="120" alt="blog" src="<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[1]['imagen'];?>"></div>-->
                                  <img src="<?php echo Yii::app()->request->baseUrl;?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[1]['imagen'];?>&h=120&w=178&zc=0" alt="blog"/>
                                </div>
                                <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$descargas[1]['id_hijo']));?>
                                <div class="sub-cat"> <a href="<?php echo $ruta;?>"><?php echo $descargas[1]['titulo_hijo'];?></a></div>
                                <div class="texto"><?php echo $descargas[1]['descripcion'];?></div>
                                <div class="descargar">
                                    <?php $link=Yii::app()->request->baseUrl.'/descargar_archivo.php?f='.$descargas[1]['archivo'];?>
                                    <a href="<?php echo $link;?>">Descargar</a> 
                                </div>
                            </div>
                          <?php endif; ?>

                          <!---tercera descarga-->
                          <?php if($descargas[2]): ?>
                            <div class="post_destacado last post<?php echo $fila;?>">
                              <div class="left">
                                <?php 
                                    $mesnumero=date("m", strtotime($descargas[2]['fecha']));
                                    switch($mesnumero){
                                      case 1: $me="Ene";break;
                                      case 2: $me="Feb";break;
                                      case 3: $me="Mar";break;
                                      case 4: $me="Abr";break;
                                      case 5: $me="May";break;
                                      case 6: $me="Jun";break;
                                      case 7: $me="Jul";break;
                                      case 8: $me="Ago";break;
                                      case 9: $me="Sep";break;
                                      case 10: $me="Oct";break;
                                      case 11: $me="Nov";break;
                                      case 12: $me="Dic";break;
                                    }
                                ?>
                                <div class="fecha"> <span class="mes"><?php echo $me;?></span> 
                                    <span class="dia"><?php echo date("d", strtotime($descargas[2]['fecha']));?></span> 
                                </div>
                              </div>
                              <div class="right titulo_post<?php echo $fila;?>">
                                <div class="titulo"><?php echo $descargas[2]['titulo_descarga'];?></div>
                              </div>
                              <!-- fin right -->
                              <div class="foto">
                                <?php 
                                  if($descargas[2]['imagen']==null){
                                    $descargas[2]['imagen']='FPV-F1_TC.png';
                                  } 
                                ?>
                                <!--<div class="foto"> <img width="178" height="120" alt="blog" src="<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[2]['imagen'];?>"></div>-->
                                <img src="<?php echo Yii::app()->request->baseUrl;?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descargas[2]['imagen'];?>&h=120&w=178&zc=0" alt="blog"/>
                              </div>
                              <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$descargas[2]['id_hijo']));?>
                              <div class="sub-cat"> <a href="<?php echo $ruta;?>>"><?php echo $descargas[2]['titulo_hijo'];?></a></div>
                              <div class="texto"><?php echo $descargas[2]['descripcion'];?></div>
                              <div class="descargar">
                                  <?php $link=Yii::app()->request->baseUrl.'/descargar_archivo.php?f='.$descargas[2]['archivo'];?>
                                  <a href="<?php echo $link;?>">Descargar</a>
                              </div>
                            </div>
                          <?php endif; ?>

                      </div><!-- fin otros post -->

                      <!--mostrar todas las descargas de la categoria padre-->
                      <div class="ver-todos">
                          <?php $ruta=Yii::app()->request->baseUrl."/index/DescargarInterna?id_padre=".$cp->id; ?>
                          <a href="<?php echo $ruta;?>">
                              Ver todos los descargables
                          </a>
                      </div>
                  </div><!-- fin item -->


              <?php endif; ?><!--fin si no hay hijos activos-->

              

          <?php endforeach; ?>
          <!--fin ciclo de item--> 
            
            
            </div><!-- fin content right -->
            
        </div>       

    </div> <!-- #main -->

    <script type="text/javascript">
        function equalHeight(group) {
          var tallest = 0;
          group.each(function() {
            var thisHeight = $(this).height();
            if(thisHeight > tallest) {
              tallest = thisHeight;
            }
          });
          group.height(tallest);
        }
    </script> 

    <script type="text/javascript">
      //$(document).ready(function() {
      window.onload=function(){
        setTimeout(ajustar, 500);
        function ajustar() {
            var i;
            for(i=1; i<<?php echo $fila;?>+1; i++){
              equalHeight($(".titulo_post"+i));
              equalHeight($(".post"+i)); 
            }
        }
        
      };
    </script>

    <!--Para el menu de móviles-->
    <script type="text/javascript">
        $(".box-menu-descargas-movil").change(function(){
            //var ruta=$(".box-menu-descargas-movil").val();
            var ruta = $(this).find('option:selected').val();
            window.location=ruta;
        });
    </script>

  

   






