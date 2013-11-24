<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_de_creación'); ?>
		<?php echo $form->textField($model,'fecha_de_creación'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_creación'); ?>
		<?php echo $form->textField($model,'usuario_creación',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idplantilla'); ?>
		<?php echo $form->textField($model,'idplantilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcategoria'); ?>
		<?php echo $form->textField($model,'idcategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idContenidoRef'); ?>
		<?php echo $form->textField($model,'idContenidoRef'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpadrecategoria'); ?>
		<?php echo $form->textField($model,'idpadrecategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->