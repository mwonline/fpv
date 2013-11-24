<?php
/* @var $this SolicitudeskitController */
/* @var $model Solicitudeskit */

$this->breadcrumbs=array(
	'Solicitudeskits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Solicitudeskit', 'url'=>array('index')),
	//array('label'=>'Create Solicitudeskit', 'url'=>array('create')),
	array('label'=>'Update Solicitudeskit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Solicitudeskit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitudeskit', 'url'=>array('admin')),
);
?>

<h1>View Solicitudeskit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellidos',
		'ciudad',
		'direccion',
		'cedula',
		'correo',
	),
)); ?>
