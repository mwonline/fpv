<?php
/* @var $this ContenidoMultimediaController */
/* @var $data ContenidoMultimedia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcontenidomultimedia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcontenidomultimedia), array('view', 'id'=>$data->idcontenidomultimedia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContenido')); ?>:</b>
	<?php echo CHtml::encode($data->idContenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmultimedia')); ?>:</b>
	<?php echo CHtml::encode($data->idmultimedia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_de_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_de_creacion); ?>
	<br />


</div>