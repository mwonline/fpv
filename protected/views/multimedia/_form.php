e<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */
/* @var $form CActiveForm */
?>
<script type="text/javascript" language="javascript">
$(function()
{
	$('#Multimedia_tipo').change(function(){
		var tipo=$(this).val();
		ruta=location.href;
		pos = ruta.indexOf("?");
		if(pos>=0){
			location.href = location.href+"&tipo="+tipo;
		}else{
			location.href = location.href+"?tipo="+tipo;
		}
		
		/*delete elfinderDiv2;
		delete elfinderDiv;
		$.ajax({
		  url: "getelfinder",
		  type: "POST",

		  data: { val: tipo},
		  context: document.body
		}).done(function(msg ) {
		 // $(this).addClass("done");
			//alert(msg);
			$('#id_finder').html(msg);
			
		});*/	
	
	;});	
});	
</script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'multimedia-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo'); ?>
        <?php
			if($_REQUEST['tipo'] != "")
				$model->tipo =  $_REQUEST['tipo'];
			echo $form->dropDownList($model,'tipo',array('I'=>'Imagen','V'=>'Video','A'=>'Archivo')); ?>
        <?php echo $form->error($model, 'tipo'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('id' => 'url', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'url'); ?>
        <div style="display:none">
            <div id="dataFinder" style="width:760px;height:480px">
                <div id="elfinderDiv"></div>
            </div>
        </div>   
        <div style="display:none">    
            <div id="dataFinder2" style="width:760px;height:480px">
                <div id="elfinderDiv2"></div>
            </div>
        </div>
        <div id="id_finder">
         <?php if($model->tipo=='A')
		 		include 'efa.php';
			   else
				include 'efn.php';		
		 ?>
		</div>

		

    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'resumen'); ?>
        <?php echo $form->textField($model, 'resumen', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'resumen'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
        <?php
        //echo $form->textField($model,'fecha_creacion'); 
        $model->fecha_creacion = ($model->fecha_creacion != '') ? $model->fecha_creacion : date('Y-m-d');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Multimedia[fecha_creacion]',
            'language' => 'es',
            'value' => $model->fecha_creacion,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;',
                'language' => 'es',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'fecha_creacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'idContenidomul'); ?> 
        <?php echo $form->dropDownList($model, 'idContenidomul', CHtml::listData(Contenido::model()->findAll(array('order' => 'titulo')), 'idContenido', 'titulo'), array('empty' => 'Seleccionar..', 'options' => array($_GET['idContenido'] => array('selected' => 'selected')))); ?>   
        <?php echo $form->error($model, 'idContenidomul'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'orden'); ?>
        <?php echo $form->textField($model, 'orden'); ?>
        <?php echo $form->error($model, 'orden'); ?>
    </div>	
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->