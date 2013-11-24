<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias'); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_de_creación'); ?>
		<?php echo $form->textField($model,'fecha_de_creación'); ?>
		<?php echo $form->error($model,'fecha_de_creación'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_creación'); ?>
		<?php echo $form->textField($model,'usuario_creación',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'usuario_creación'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idplantilla'); ?>
		<?php echo $form->textField($model,'idplantilla'); ?>
		<?php echo $form->error($model,'idplantilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idContenidoRef'); ?>
		<?php echo $form->textField($model,'idContenidoRef'); ?>
		<?php echo $form->error($model,'idContenidoRef'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpadrecategoria'); ?>
		<?php echo $form->textField($model,'idpadrecategoria'); ?>
		<?php echo $form->error($model,'idpadrecategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->