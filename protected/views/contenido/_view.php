<?php
/* @var $this ContenidoController */
/* @var $data Contenido */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContenido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idContenido), array('view', 'id'=>$data->idContenido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('título')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripción')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />





	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creación')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />




	<?php /*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion2')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion2); ?>
	<br />
	 * 
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creación')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_creación); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Metadescripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Metadescripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Meta_tags')); ?>:</b>
	<?php echo CHtml::encode($data->Meta_tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('destacado')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />
	*/ ?>

</div>