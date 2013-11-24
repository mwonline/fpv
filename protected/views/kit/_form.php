<div style="display:none">
<div id="data" class="titulo2">
<div class="titulo2">El formulario tiene algunos errores, por favor verifique los campos en rojo</div>
</div>
</div>
<?php
/* @var $this SolicitudeskitController */
/* @var $model Solicitudeskit */
/* @var $form CActiveForm */
?>

<div class="formulario">
    <div class="top">
        <span class="titulo">Pida su kit de inteligencia vial</span>

        <div class="texto2">Complete este formulario y pronto le
            haremos llegar su kit de Inteligencia Vial</div>


    </div><!-- fin top -->

    <div class="bottom">

        <?php
		$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#fancy-link',
        'config'=>array(),));  
					echo  CHtml::link('',"#data", array("id"=>"fancy-link")); 
        $form = $this->beginWidget('CActiveForm', array(
            'id' => "mensaje",
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
                ));
				if($form->errorSummary($model))
   			{
				Yii::app()->clientScript->registerScript('errorScript',"$('#fancy-link').click();",CClientScript::POS_READY); }
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'nombre'); ?>
            <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 100,'id'=>'nombre')); ?>
        </div>

        <div class="row">
            <label class="required" for="apellidos">Apellidos</label>
            <?php echo $form->textField($model, 'apellidos', array('size' => 60, 'maxlength' => 100, 'id'=>'apellidos')); ?>
        </div>

        <div class="row">
            <label class="required" for="ciudad">Ciudad</label>
            <?php echo $form->textField($model, 'ciudad', array('size' => 60, 'maxlength' => 100, 'id'=>'ciudad')); ?>
        </div>

        <div class="row">
            <label class="required" for="direccion">Dirección</label>
            <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 100, 'id'=>'direccion')); ?>
        </div>

        <div class="row">
            <label class="required" for="cedula">Número de cédula</label> 
            <?php echo $form->textField($model, 'cedula', array('size' => 20, 'maxlength' => 20,'id'=>'cedula')); ?>
        </div>

        <div class="row">
            <label class="required" for="correo">Correo electrónico</label>
            <?php echo $form->textField($model, 'correo', array('size' => 60, 'maxlength' => 100, 'id'=>'correo')); ?>
        </div>

        <!--terminos y condiciones-->
        <div class="terminos">
            <?php echo $form->checkBox($model,'acepto',array('id'=>"tyc","value"=>"true")); ?>
            Acepto términos y condiciones | <a href="<?php echo Yii::app()->request->baseUrl;?>/index/terminos" target="_blank">ver términos y condiciones</a> <?php echo $form->error($model,'acepto'); ?>
        </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('value'=>'Enviar','class'=>'button')); ?>
        </div>

<?php $this->endWidget(); ?>

    </div><!-- fin bottom -->

</div><!-- fin formulario -->
