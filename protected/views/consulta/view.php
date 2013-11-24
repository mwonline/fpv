<?php
/* @var $this ConsultaController */
/* @var $model Consulta */

$this->breadcrumbs=array(
	'Consultas'=>array('index'),
	$model->idcapacitacion,
);

$this->menu=array(
	array('label'=>'List Consulta', 'url'=>array('index')),
	array('label'=>'Create Consulta', 'url'=>array('create')),
	array('label'=>'Update Consulta', 'url'=>array('update', 'id'=>$model->idcapacitacion)),
	array('label'=>'Delete Consulta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcapacitacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Consulta', 'url'=>array('admin')),
);
?>

<h1>View Consulta #<?php echo $model->idcapacitacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcapacitacion',
		'Nombres_y_Apellidos',
		'Empresa',
		'Telefono',
		'Celular',
		'E_mail',
		'Capacitacion',
		'Mensaje',
		//'tipo',
	),
)); ?>
