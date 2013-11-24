<?php
/* @var $this ExcusasController */
/* @var $model Excusas */

$this->breadcrumbs=array(
	'Excusases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Excusas', 'url'=>array('index')),
	array('label'=>'Create Excusas', 'url'=>array('create')),
	array('label'=>'Update Excusas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Excusas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Excusas', 'url'=>array('admin')),
);
?>

<h1>View Excusas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_usuario',
		'id_facebook',
		'email',
		'excusa',
		'activo',
	),
)); ?>
