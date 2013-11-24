<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categoria-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Campos con  <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'idplantilla'); ?>
        <?php echo $form->dropDownList($model, 'idplantilla', $model->getTipos(), array()); ?>
        <?php echo $form->error($model, 'idplantilla'); ?>
    </div>

    <!--div class="row">
        <?php //echo $form->labelEx($model, 'idpadrecategoria'); ?>
        <?php 
       // echo $form->dropDownList(Categoria::model(),'idpadrecategoria', Categoria::model()->getCategoriasPadre(),			
		//array('options' => array($model->idpadrecategoria=>array('selected'=>true)),   'empty'=>array(NULL=>'Seleccione') )); 
		?>
        <?php //echo $form->error($model, 'idpadrecategoria'); ?>
    </div-->
    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'alias'); ?>
        <?php echo $form->textField($model, 'alias'); ?>
        <?php echo $form->error($model, 'alias'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'subTitulo'); ?>
		<?php echo $form->textArea($model,'subTitulo',array('size'=>60,'rows'=>8, 'cols'=>40)); ?>
        <?php echo $form->error($model, 'subTitulo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'descripcion'); ?>       
		<?php //echo $form->textArea($model,'descripcion',array('size'=>60,'rows'=>8, 'cols'=>40));
		$this->widget('application.extensions.tinymce.TinyMce', array(
        'model' => $model,
        'attribute' => 'descripcion',
        'compressorRoute' => 'tinyMce/compressor',
        'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
        'fileManager' => array(
        'class' => 'ext.elfinder.TinyMceElFinder','connectorRoute'=>'admin/elfinder/connector',),
        'htmlOptions' => array('rows' => 2,'cols' => 2,),
        ));
		
		?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'orden'); ?>
        <?php echo $form->textField($model, 'orden'); ?>
        <?php echo $form->error($model, 'orden'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activo'); ?>
        <?php
			 echo $form->dropDownList(Categoria::model(),'activo', array('0'=>'NO','1'=>'SI'),			
		array('options' => array($model->activo=>array('selected'=>true)))); 
		
		?>
        
        <?php echo $form->error($model, 'activo'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_de_creacion'); ?>
        <?php //echo $form->textField($model, 'fecha_de_creacion'); 
			  $model->fecha_de_creacion = ($model->fecha_de_creacion!='')? $model->fecha_de_creacion:date('Y-m-d');
			  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name'=>'Categoria[fecha_de_creacion]',
				'language' => 'es',
				
				'value'=>$model->fecha_de_creacion,
				
				
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>'yy-mm-dd',
					'language' => 'es',
					 
				),

				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			));	
		
		?>
        
        <?php echo $form->error($model, 'fecha_de_creacion'); ?>
    </div>

    <!--div class="row">
        <?php //echo $form->labelEx($model, 'usuario_creacion'); ?>
        <?php //echo $form->textField($model, 'usuario_creacion', array('size' => 60, 'maxlength' => 255)); ?>
        <?php //echo $form->error($model, 'usuario_creacion'); ?>
    </div-->


    <!--div class="row">
        <?php //echo $form->labelEx($model, 'idContenidoRef'); ?>
        <?php //echo $form->textField($model, 'idContenidoRef'); ?>
        <?php //echo $form->error($model, 'idContenidoRef'); ?>
    </div-->


    <div class="row">
        <?php echo $form->labelEx($model, 'imagen'); ?>
        <?php echo $form->textField($model, 'imagen',array('id'=>'imagen')); ?>
        <?php echo $form->error($model, 'imagen'); ?>
        <div style="display:none">
            <div id="dataFinder" style="width:760px;height:480px">
                <div id="elfinderDiv"></div>
            </div>
        </div>
        <?php
        echo CHtml::link('Buscar', "#dataFinder", array("id" => "fancy-link"));
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => 'a#fancy-link',
            'config' => array(),));
        $this->widget('widgets.elfinder.FinderWidget', array(
            'path' => realpath("") . '/multimediafiles', // path to your uploads directory, must be writeable 
            'url' => 'http://www.inteligenciavial.com/multimediafiles', // url to uploads directory
            'action' => $this->createUrl('multimedia/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
            'selector' => "elfinderDiv",
			'inputid' => "imagen",
        ));
        ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'altImage'); ?>       
		<?php echo $form->textField($model,'altImage');?>
        <?php echo $form->error($model, 'altImage'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'palabrasClave'); ?>       
		<?php echo $form->textArea($model,'palabrasClave',array('size'=>60,'rows'=>8, 'cols'=>40)); ?>
        <?php echo $form->error($model, 'palabrasClave'); ?>
    </div>
        <div class="row">
        <?php echo $form->labelEx($model, 'metaDescripcion'); ?>       
		<?php echo $form->textArea($model,'metaDescripcion',array('size'=>60,'rows'=>8, 'cols'=>40)); ?>
        <?php echo $form->error($model, 'metaDescripcion'); ?>
    </div>
        <div class="row">
        <?php //echo $form->labelEx($model, 'textoComplementario'); ?>       
		<?php //echo $form->textArea($model,'textoComplementario',array('size'=>60,'rows'=>8, 'cols'=>40)); ?>
        <?php //echo $form->error($model, 'textoComplementario'); ?>
    </div>
        <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->