<?php
/* @var $this ContenidoMultimediaController */
/* @var $model ContenidoMultimedia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contenido-multimedia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idContenido'); ?>
		<?php echo $form->textField($model,'idContenido'); ?>
		<?php echo $form->error($model,'idContenido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idmultimedia'); ?>
		<?php echo $form->textField($model,'idmultimedia'); ?>
		<?php echo $form->error($model,'idmultimedia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
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