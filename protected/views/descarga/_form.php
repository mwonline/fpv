<?php
/* @var $this DescargaController */
/* @var $model Descarga */
/* @var $form CActiveForm */
?>
<!--incluir script del menu-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.slicknav.min.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'descarga-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<label style="float:left;">Categoria: &nbsp;</label><label id="labelCategoria" style="color: #0097EF; float:left;"></label><br>
		<div id="categorias"></div>
		<?php echo $form->hiddenField($model,'categoria',array('size'=>60,'maxlength'=>100, 'id'=>"categoria")); ?>
		<?php echo $form->error($model,'categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<label style="color:#ccaacc;">(Debe ser máximo de 100 caracteres)</label>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<label style="color:#ccaacc;">(Debe ser máximo de 255 caracteres)</label>
		<?php echo $form->textArea($model,'descripcion',array('size'=>60,'maxlength'=>255, 'cols'=>50, 'rows'=>5)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<!--imagen de la descarga-->
	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<label>Se recomienda un tamaño de imágen de 178x120px</label>
		<?php echo CHtml::activeFileField($model,'imagen'); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>


	<!--fecha de creacion-->
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<!--<?php echo $form->textField($model,'fecha'); ?>-->
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'attribute' => 'fecha',
			    'options'=>array(
			    	'dateFormat' => 'yy-mm-dd',
			    ),
			    'htmlOptions' => array(
			        'size' => '10',         // textField size
			        'maxlength' => '10',    // textField maxlength
			    ),
			));
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php
			$list=array('s'=>'Sí', 'n'=>'No');
			echo $form->dropDownList($model,'activo',$list); 
		?>
		<!--<?php echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); ?>-->
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden', array('size'=>2)); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>
	-->

	
	<div class="row">
		<?php echo $form->labelEx($model,'archivo'); ?>
		<label style="color:#ccaaff;">(doc, xls, ppt, pdf, zip, jpg, png, gif)</label>
		<?php echo CHtml::activeFileField($model,'archivo'); ?>
		<?php echo $form->error($model,'archivo'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear descarga' : 'Guardar'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<ul id="menu" style="display:none;">
	<?php $categoriasPadre = Categoriadesc::model()->findAll('padre IS NULL'); ?>
	<?php foreach($categoriasPadre as $cp): ?>
		<li><?php echo $cp->titulo;?>

			<ul>
				<?php $categoriasHijo= Categoriadesc::model()->findAllByAttributes(array('padre'=>$cp->id)); ?>
				<?php foreach($categoriasHijo as $ch): ?>
					<li onclick="mostrar(<?php echo $ch->id;?>, '<?php echo $ch->titulo?>')"><a class="hijo" style="text-decoration:none;" href="#"><?php echo $ch->titulo;?></a></li>
				<?php endforeach; ?>
			</ul>

		</li>

	<?php endforeach; ?>
</ul>

<script type="text/javascript">
	$('#menu').slicknav({
	label: 'Seleccionar',
	duration: 300,
	prependTo:'#categorias'
	});
</script>

<script type="text/javascript">
	function mostrar(id, titulo){
		$('#categoria').val(id);
		$('#labelCategoria').text(titulo);
	}
</script>