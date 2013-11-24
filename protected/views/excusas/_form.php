<?php
/* @var $this ExcusasController */
/* @var $model Excusas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'excusas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_usuario'); ?>
		<?php echo $form->textField($model,'nombre_usuario',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nombre_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_facebook'); ?>
		<?php echo $form->textField($model,'id_facebook',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'id_facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'excusa'); ?>
		<?php echo $form->textArea($model,'excusa',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'excusa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->