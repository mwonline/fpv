<?php
/* @var $this CategoriaContenidoController */
/* @var $data CategoriaContenido */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcategoriacontenido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcategoriacontenido), array('view', 'id'=>$data->idcategoriacontenido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContenido')); ?>:</b>
	<?php echo CHtml::encode($data->idContenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_creacion); ?>
	<br />


</div>