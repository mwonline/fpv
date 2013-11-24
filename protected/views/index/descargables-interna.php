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
<div class="main wrapper clearfix">


    <div class="contenedor-slide">
        <div class="box-slide">
            <div class="foto">
                <img src="../img/descargables/slide.jpg" width="965" height="247" alt="foto">	
            </div>


        </div>


    </div><!--fin contenedor slide -->


    <div class="content-left">             

        <div class="box_menu" id="acordeon">
            <ul>
                <?php $indice=0; ?>
                <?php foreach($categ_desc_padres as $cp): ?>

                  <?php  
                    if($cp->id==$padre_activo){
                        $indice_activo=$indice;
                    }
                    $indice++;
                  ?>
                  <li class="accord-header<?php echo $clase;?>"><span><a href="#"><?php echo $cp->titulo;?></a></span></li>
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
                        <?php 
                        if($ch->id==$hijo_activo){
                            $estilo="color: #005094;";
                        }else{
                            $estilo="";
                        }
                        ?>
                        <?php $ruta=Yii::app()->createAbsoluteUrl('index/DescargarInterna',array('id_hijo'=>$ch->id));?>
                        <li class="accord-content" style="list-style:none;"><span><a href="<?php echo $ruta;?>" style="<?php echo $estilo;?>"><?php echo $ch->titulo;?></a></span></li>
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
            $( "#acordeon" ).accordion({icons: false, header:".accord-header", heightStyle: "content", collapsible: true, active: <?php echo $indice_activo;?>});
        </script>

        <!--fin menu categorias-->
    </div><!-- fin content left -->



    <div class="content-right">
        <div class="texto-top">
            <!--Bienvenido a "Descargables". Aquí encontrará mensualmente nuevas herramientas que le ayudarán a pedir la calle que quiere en diferentes entornos, las cuales podrá descargar y compartir con otros para ayudarnos promover la inteligencia vial.   -->
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


        <div class="item">
            <div class="titulo1">
                <!--titulo de la categoria hijo-->
                <?php echo $titulo_interna; ?>
            </div>
            <div class="otros-post">
                <?php foreach ($descargas as $descarga) { ?>
                    <div class="post_destacado">
                        <div class="foto">
                            <?php 
                              if($descarga->imagen==''){
                                $descarga->imagen='FPV-F1_TC.png';
                              } 
                            ?>
                            <!--<img width="178" height="120" alt="blog" src="<?php echo Yii::app()->getBaseUrl() . '/descargas/' . $descarga->imagen; ?>">-->
                            <img src="<?php echo Yii::app()->request->baseUrl;?>/timthumb.php?src=<?php echo Yii::app()->request->baseUrl.'/descargas/'.$descarga->imagen;?>&h=120&w=178&zc=0" alt="blog"/>
                        </div>
                        <div class="left">
                            <div class="fecha">
                                <span class="mes"><?php echo getMes($descarga->fecha); ?></span>
                                <span class="dia"><?php echo getDia($descarga->fecha); ?></span>
                            </div>
                        </div>
                        <div class="right">
                            <span>
                                <div class="titulo"><?php echo $descarga->titulo; ?></div></span></div><!-- fin right -->


                        <div class="texto"><?php echo $descarga->descripcion; ?></div>


                        <div class="descargar">
                            <a href="<?php echo Yii::app()->getBaseUrl() . '/descargar_archivo.php?f=' . $descarga->archivo ?>">Descarga</a>

                        </div>
                    </div><!--fin post_destacado -->
                <?php } ?>
            </div><!-- fin otros post -->
        </div><!-- fin item -->
        <!--
        <div class="otras-paginador">
            <?php if($item_count>1){ ?>
            <ul>

                <li><?php if ($_REQUEST['page'] > 1) { ?><a href="&page=<?php echo $_REQUEST['page'] - 1; ?>">prev</a><?php } ?></li>

                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li <?php if (($i) == $_REQUEST['page']) { ?>class="activate"<?php } ?>><a href="&page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                <?php } ?>
                <?php if ($_REQUEST['page'] < $total_pages) { ?>
                    <li class="last"><a href="&page=<?php echo $_REQUEST['page'] + 1; ?>">Next</a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        -->

        <div class="otras-paginador">
            <?php $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header'=>'',
                'nextPageLabel'=>'',
                'prevPageLabel'=>'',
                'selectedPageCssClass'=>'activate',
                'hiddenPageCssClass'=>'disabled',
                'htmlOptions'=>array('class'=>'algo'),
            )) ?>
        </div>

    </div><!-- fin content right -->

</div>

<!--Para el menu de móviles-->
<script type="text/javascript">
    $(".box-menu-descargas-movil").change(function(){
        //var ruta=$(".box-menu-descargas-movil").val();
        var ruta = $(this).find('option:selected').val();
        window.location=ruta;
    });
</script>
