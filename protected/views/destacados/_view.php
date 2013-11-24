<?php
/* @var $this DestacadosController */
/* @var $data Destacados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_destacado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_destacado), array('view', 'id'=>$data->id_destacado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />


</div>