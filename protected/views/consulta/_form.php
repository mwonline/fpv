<?php
/* @var $this ConsultaController */
/* @var $model Consulta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consulta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombres_y_Apellidos'); ?>
		<?php echo $form->textField($model,'Nombres_y_Apellidos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Nombres_y_Apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Empresa'); ?>
		<?php echo $form->textField($model,'Empresa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Telefono'); ?>
		<?php echo $form->textField($model,'Telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Celular'); ?>
		<?php echo $form->textField($model,'Celular',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'E_mail'); ?>
		<?php echo $form->textField($model,'E_mail',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'E_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Capacitacion'); ?>
		<?php echo $form->textField($model,'Capacitacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Capacitacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mensaje'); ?>
		<?php echo $form->textField($model,'Mensaje',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Mensaje'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'tipo'); ?>
		<?php //echo $form->textField($model,'tipo',array('size'=>12,'maxlength'=>12)); ?>
		<?php //echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->