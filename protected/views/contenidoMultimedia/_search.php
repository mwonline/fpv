<?php
/* @var $this ContenidoMultimediaController */
/* @var $model ContenidoMultimedia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idContenido'); ?>
		<?php echo $form->textField($model,'idContenido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idmultimedia'); ?>
		<?php echo $form->textField($model,'idmultimedia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_de_creacion'); ?>
		<?php echo $form->textField($model,'fecha_de_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcontenidomultimedia'); ?>
		<?php echo $form->textField($model,'idcontenidomultimedia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->