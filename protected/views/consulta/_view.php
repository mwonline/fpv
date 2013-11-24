<?php
/* @var $this ConsultaController */
/* @var $data Consulta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcapacitacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcapacitacion), array('view', 'id'=>$data->idcapacitacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombres_y_Apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->Nombres_y_Apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Empresa')); ?>:</b>
	<?php echo CHtml::encode($data->Empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Celular')); ?>:</b>
	<?php echo CHtml::encode($data->Celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('E_mail')); ?>:</b>
	<?php echo CHtml::encode($data->E_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacitacion')); ?>:</b>
	<?php echo CHtml::encode($data->Capacitacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->Mensaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	*/ ?>

</div>