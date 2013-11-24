<?php
/* @var $this CategoriadescController */
/* @var $model Categoriadesc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoriadesc-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<!--<?php echo $form->labelEx($model,'padre'); ?>-->
		<label>Categoría Padre<span class="required">*</span></label>
		<label style="color:#ccaacc;">(Dejar en blanco si es una categoría padre)</label>
		<!--obtener las categorias padre-->
		<?php
			$list=CHtml::listData(Categoriadesc::model()->findAllByAttributes(array('padre'=>null)), 'id', 'titulo');
			echo $form->dropDownList($model,'padre',$list, array('prompt'=>'')); 
		?>
		<!--<?php echo $form->textField($model,'padre'); ?>-->
		<?php echo $form->error($model,'padre'); ?>
	</div>

	<div class="row">
		<label>Título</label><span class="required">*</span>
		<!--<?php echo $form->labelEx($model,'titulo'); ?>-->
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<label>Órden</label><span class="required">*</span>
		<!--<?php echo $form->labelEx($model,'orden'); ?>-->
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row">
		<label>Activo</label><span class="required">*</span>
		<!--<?php echo $form->labelEx($model,'activo'); ?>-->
		<!--<?php echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); ?>-->
		<?php
			$list=array('s'=>'Sí', 'n'=>'No');
			echo $form->dropDownList($model,'activo',$list); 
		?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear categoría' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->