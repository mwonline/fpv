<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'multimedia-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->dropDownList(ContenidoMultimedia::model(),'idContenido', Contenido::model()->getContenido(),array()); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textField($model,'resumen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'idContenidomul'); ?>
		<?php echo $form->hiddenField($model,'idContenidomul',array('size'=>60,'maxlength'=>255,'value'=>$model->idContenidomul)); ?>
		<?php echo $form->error($model,'idContenidomul'); ?>
	</div>
    
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->