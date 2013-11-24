<?php
/* @var $this CategoriaControllerController */
/* @var $data Categoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcategoria), array('view', 'id'=>$data->idcategoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('subTitulo')); ?>:</b>
	<?php echo CHtml::encode($data->subTitulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_creacion); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('idplantilla')); ?>:</b>
	<?php echo CHtml::encode($data->idplantilla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContenidoRef')); ?>:</b>
	<?php echo CHtml::encode($data->idContenidoRef); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpadrecategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idpadrecategoria); ?>
	<br />
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->idpadrecategoria); ?>
	<br />
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->idpadrecategoria); ?>
	<br />


</div>