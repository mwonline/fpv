<script type="text/javascript">
function agregarPalabra() {
	var palabra= $('#tags').val();
	var tags =$('#Contenido_tags').val();
	if(palabra!='')
	{
	if(tags=='')
		$('#Contenido_tags').val(palabra);
	else
		$('#Contenido_tags').val(tags+','+palabra);
	$.ajax({
		  url: "verificarTag",
		  type: "POST",

		  data: { term: palabra},
		  context: document.body
		}).done(function() {
		 // $(this).addClass("done");
		
		});	
   }
   $('#tags').val('');
}
</script>
<?php
/* @var $this ContenidoController */
/* @var $model Contenido */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contenido-form',
        'enableAjaxValidation' => false,
            ));
    /* if ($model->isNewRecord==false) {
      $modelConCat=CategoriaContenido::model()->findAll('idContenido=:idContenido', array(':idContenido' => $model->idContenido)); }
      if(isset($modelConCat[0])){
      $modelConCat= $modelConCat[0];
      } */
    ?>


    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <?php
    //print_r($modelConCat);
    //echo $form->errorSummary($modelConCat,$model); 
    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php //echo $form->labelEx($modelConCat,'idCategoria'); ?>
        <?php echo $form->labelEx($model, 'idCategoria'); ?>
        <?php echo $form->dropDownList($model, 'idCategoria', Categoria::model()->getCategoriaMenu(), array('prompt' => 'Seleccione...'), array()); ?>
        <?php echo $form->error($model, 'idCategoria'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 't&iacutetulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'resumen'); ?>
        <?php echo $form->textArea($model, 'resumen', array('size' => 60, 'rows' => 8, 'cols' => 40)); ?>
        <?php echo $form->error($model, 'resumen'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'descripci&oacuten'); ?>
        <?php
        //echo $form->textArea($model,'descripcion',array('size'=>60,'rows'=>8, 'cols'=>40)); 
        //$model->descripcion;

        $this->widget('application.extensions.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'descripcion',
            'compressorRoute' => 'tinyMce/compressor',
            'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
            'fileManager' => array(
                'class' => 'ext.elfinder.TinyMceElFinder', 'connectorRoute' => 'admin/elfinder/connector',),
            'htmlOptions' => array('rows' => 2, 'cols' => 2,),
        ));
        ?>
<?php echo $form->error($model, 'descripcion'); ?>
    </div>


    <!--div class="row">
    <?php //echo $form->labelEx($model,'descripcion2'); ?>
    <?php //echo $form->textArea($model,'descripcion2',array('size'=>60,'rows'=>8, 'cols'=>40)); ?>
<?php //echo $form->error($model,'descripcion2');  ?>
    </div-->


    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_creaci&oacuten'); ?>
        <?php
        //echo $form->textField($model,'fecha_creacion'); 
        $model->fecha_creacion = ($model->fecha_creacion != '') ? $model->fecha_creacion : date('Y-m-d');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Contenido[fecha_creacion]',
            'language' => 'es',
            'value' => $model->fecha_creacion,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;',
                'language' => 'es',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'fecha_creacion'); ?>
    </div>





    <div class="row">
<?php echo $form->labelEx($model, 'activo'); ?>

<?php
echo $form->dropDownList(Contenido::model(), 'activo', array('0' => 'NO', '1' => 'SI'), array('options' => array($model->activo => array('selected' => true))));
?>
        <?php echo $form->error($model, 'activo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'orden'); ?>
        <?php echo $form->textField($model, 'orden'); ?>
        <?php echo $form->error($model, 'orden'); ?>
    </div>
    <!--div class="row">
        <?php //echo $form->labelEx($model,'usuario_creacion');  ?>
        <?php //echo $form->textField($model,'usuario_creacion',array('size'=>60,'maxlength'=>255)); ?>
        <?php //echo $form->error($model,'usuario_creacion'); ?>
    </div-->

    <div class="row">
    <?php echo $form->labelEx($model, 'imagen'); ?>
    <?php echo $form->textField($model, 'imagen', array('id' => 'imagen')); ?>
    <?php echo $form->error($model, 'imagen'); ?>


        <div style="display:none">
            <div id="dataFinder" style="width:760px;height:480px">
                <div id="elfinderDiv"></div>
            </div>
        </div>
<?php
echo CHtml::link('Buscar', "#dataFinder", array("id" => "fancy-link1"));
//echo realpath("")."/multimediafiles";

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link1',
    'config' => array(),));
$this->widget('widgets.elfinder.FinderWidget', array(
    'path' => realpath("") . "/multimediafiles", // path to your uploads directory, must be writeable 
    'url' => 'http://www.inteligenciavial.com/multimediafiles', // url to uploads directory
    'action' => $this->createUrl('contenido/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
		'selector' => "elfinderDiv",
    'inputid' => "imagen",
));
?>



    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'Metadescripci&oacuten'); ?>
<?php echo $form->textArea($model, 'Metadescripcion', array('size' => 60, 'rows' => 8, 'cols' => 40)); ?>
<?php echo $form->error($model, 'Metadescripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Meta_tags'); ?>
        <?php echo $form->textField($model, 'Meta_tags', array('size' => 60)); ?>
<?php echo $form->error($model, 'Meta_tags'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'alias'); ?>
        <?php echo $form->textField($model, 'alias', array('size' => 60)); ?>
<?php echo $form->error($model, 'alias'); ?>
    </div>

    <!--div class="row">
        <?php //echo $form->labelEx($model, 'destacado'); ?>
        <?php //echo $form->textField($model, 'destacado', array('size' => 60, 'maxlength' => 255)); ?>
<?php //echo $form->error($model, 'destacado'); ?>
    </div-->

    <div class="row">
        <?php echo $form->labelEx($model, 'Agreagar tags'); ?>

<?php
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name' => 'Contenido[tags]',
    'value' =>'',
//	'source'=>$people, // <- use this for pre-set array of values
    'source' => $this->createUrl('contenido/getNames'), // <- path to controller which returns dynamic data
    // additional javascript options for the autocomplete plugin
    'options' => array(
        'minLength' => '1', // min chars to start search
        'select' => 'js:function(event, ui) { console.log(ui.item.id +":"+ui.item.value); }'
    ),
    'htmlOptions' => array(
        'id' => 'tags',
        'rel' => 'val',
    ),
));
?>



        <?php //echo $form->error($model, 'tags'); 
			echo CHtml::button("(+)",array('title'=>"Agregar Tag",'onclick'=>'agregarPalabra()'));
		?>
        
    </div>
    
       <div class="row">
        <?php echo $form->labelEx($model, 'tags'); ?>
        <?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'tags'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'imagen2'); ?>
<?php echo $form->textField($model, 'imagen2', array('id' => 'imagen2')); ?>
        <?php echo $form->error($model, 'imagen2'); ?>


        <div style="display:none">
            <div id="dataFinder2" style="width:760px;height:480px">
                <div id="elfinderDiv2"></div>
            </div>
        </div>
<?php
echo CHtml::link('Buscar', "#dataFinder2", array("id" => "fancy-link2"));
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link2',
    'config' => array(),));
$this->widget('widgets.elfinderDos.FinderWidgetDos', array(
    'path' => realpath("") . '/multimediafiles', // path to your uploads directory, must be writeable 
    'url' => 'http://www.inteligenciavial.com/multimediafiles', // url to uploads directory
    'action' => $this->createUrl('contenido/elfinderDos.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
    'selector' => "elfinderDiv2",
	'inputid' => "imagen2",
));
?>



    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'altImage2'); ?>
        <?php echo $form->textField($model, 'altImage2', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'altImage2'); ?>
    </div>

    <div class="row">
<?php //echo $form->labelEx($model, 'imagen3'); ?>
        <?php //echo $form->textField($model, 'imagen3', array('id' => 'Contenido_imagen3')); ?>
        <?php //echo $form->error($model, 'imagen3'); ?>

<?php
/*echo CHtml::link('Buscar', "#dataFinder3", array("id" => "fancy-link3"));
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => 'a#fancy-link3',
    'config' => array(),));
$this->widget('widgets.elfinder.FinderWidget', array(
    'path' => realpath("../") . "/web/multimediafiles", // path to your uploads directory, must be writeable 
    'url' => 'http://www.inteligenciavial.com/web/multimediafiles', // url to uploads directory
    'action' => $this->createUrl('contenido/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
	'selector' => "elfinderDiv3",
    'inputid' => "Contenido_imagen3",
));*/
?>



    </div>


    <div class="row">
        <?php //echo $form->labelEx($model, 'altImage3'); ?>
        <?php //echo $form->textField($model, 'altImage3', array('size' => 60, 'maxlength' => 255)); ?>
        <?php //echo $form->error($model, 'altImage3'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->