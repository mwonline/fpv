<?php
/* @var $this DestacadosController */
/* @var $model Destacados */

$this->breadcrumbs=array(
	'Destacadoses'=>array('index'),
	$model->id_destacado,
);

$this->menu=array(
	array('label'=>'List Destacados', 'url'=>array('index')),
	array('label'=>'Create Destacados', 'url'=>array('create')),
	array('label'=>'Update Destacados', 'url'=>array('update', 'id'=>$model->id_destacado)),
	array('label'=>'Delete Destacados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_destacado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Destacados', 'url'=>array('admin')),
);
?>

<h1>View Destacados #<?php echo $model->id_destacado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_destacado',
		'orden',
	),
)); ?>
