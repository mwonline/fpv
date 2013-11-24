<?php
/* @var $this KitsController */
/* @var $model Kits */

$this->breadcrumbs=array(
	'Kits'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Kits', 'url'=>array('index')),
	//array('label'=>'Create Kits', 'url'=>array('create')),
	array('label'=>'Update Kits', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Kits', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Kits', 'url'=>array('admin')),
);
?>

<h1>View Kits #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
	),
)); ?>
