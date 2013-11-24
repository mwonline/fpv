<div style="display:none">
<div id="data" class="titulo2">
<div class="titulo2">El formulario tiene algunos errores, por favor verifique los campos en rojo</div>
</div>
</div>
<?php
/* @var $this ExcusasController */
/* @var $model Excusas */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'excusa',
	'enableAjaxValidation'=>false,
)); ?>	
<?
//create a link
echo  CHtml::link('',"#data", array("id"=>"fancy-link")); 
 
//put fancybox on page
$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#fancy-link',
        'config'=>array(),));  
?> 
<div class="titulo2">ó RegístreSE aquí</div>
 <div class="texto">Si usted no tiene cuenta en Facebook ,por favor regístrese con su nombre y correo electrónico para dejar su excusa.</div>
   <?php if($form->errorSummary($model))
   			{
				Yii::app()->clientScript->registerScript('errorScript',"$('#fancy-link').click();",CClientScript::POS_READY); }
    ?>
                   <?php echo $form->labelEx($model,'nombre_usuario'); ?>
                   <?php echo $form->textField($model,'nombre_usuario',array('size'=>60,'maxlength'=>250,'id'=>'nombre')); ?><?php //echo $form->error($model,'nombre_usuario'); ?> 
                      <?php echo $form->labelEx($model,'email'); ?>
                      <?php //echo $form->error($model,'email'); ?>
					  <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200,'id'=>'correo')); ?>
		<?php echo $form->labelEx($model,'excusa'); ?>
		<?php echo $form->textArea($model,'excusa',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'excusa'); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar excusa' : 'Save',array("class"=>"button")); ?>
		<?php //echo $form->textField($model,'id_facebook',array('size'=>50,'maxlength'=>50));  echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); 
$this->endWidget(); ?>
