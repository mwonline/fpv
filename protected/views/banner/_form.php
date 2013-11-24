<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Titulo'); ?>
		<?php echo $form->textField($model,'Titulo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('id'=>'imagen')); ?>
		<?php echo $form->error($model,'imagen'); ?>
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
                'action' => $this->createUrl('contenido/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
				 'selector' => "elfinderDiv",
                'inputid' => "imagen",
            ));
            ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_de_creacion'); ?>
		<?php echo $form->textField($model,'fecha_de_creacion'); ?>
		<?php echo $form->error($model,'fecha_de_creacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->