<div style="display:none">
<div id="data" class="titulo2">
<div class="titulo2">El formulario tiene algunos errores, por favor verifique los campos en rojo</div>
</div>
</div>
<div class="main wrapper clearfix">
    <article>

        <section>

            <div class="formulario">
                <div class="top">
                    <span class="titulo">Pida la calle que quiere</span>
                    <div class="texto2">Envíe su mensaje aquí</div>


                </div><!-- fin top -->


                <div class="bottom">
                    <div style="display:none">
                        <div class="titulo2" id="data">
                            <div class="titulo2">El formulario tiene algunos errores, por favor verifique los campos en rojo</div>
                        </div>
                    </div>
                    <?php 
					$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#fancy-link',
        'config'=>array(),));  
					echo  CHtml::link('',"#data", array("id"=>"fancy-link")); 
					$form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensaje',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
if($form->errorSummary($model))
   			{
				Yii::app()->clientScript->registerScript('errorScript',"$('#fancy-link').click();",CClientScript::POS_READY); }
    ?>
                        <a href="#data" id="fancy-link"></a> 

                      <?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100,"id"=>"nombre")); ?>
                       <?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>100,"id"=>"apellidos")); ?>		
                        <?php echo $form->labelEx($model,'mensaje'); ?><?php echo $form->error($model,'mensaje'); ?>
		<?php echo $form->textArea($model,'mensaje',array('rows'=>6, 'cols'=>50)); ?>
                        <div class="terminos">
                        
		<?php echo $form->checkBox($model,'acepto',array('id'=>"tyc","value"=>"true")); ?>
       
                            
                            Acepto términos y condiciones | <a href="<?php echo Yii::app()->request->baseUrl;?>/index/terminos" target="_blank">ver términos y condiciones</a> <?php echo $form->error($model,'acepto'); ?>
                        </div>
                        	<?php echo $form->hiddenField($model,'tipo',array('value'=>"c")); ?>
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar',array("class"=>"button")); ?>
                        		
                   <?php $this->endWidget(); ?>                      
                </div>   <!-- fin bottom --> 
            </div><!-- fin formulario -->

        </section>


    </article>



</div> <!-- #main -->
