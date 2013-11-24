<?php
/* @var $this AliadosController */
/* @var $model Aliados */

$this->breadcrumbs=array(
	'Aliadoses'=>array('index'),
	$model->idExcusa,
);

$this->menu=array(
	array('label'=>'List Aliados', 'url'=>array('index')),
	array('label'=>'Create Aliados', 'url'=>array('create')),
	array('label'=>'Update Aliados', 'url'=>array('update', 'id'=>$model->idExcusa)),
	array('label'=>'Delete Aliados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idExcusa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aliados', 'url'=>array('admin')),
);
?>

<h1>View Aliados #<?php echo $model->idExcusa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idExcusa',
		'nombre',
		'correo',
		'excusa',
	),
)); ?>
