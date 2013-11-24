<?php
/* @var $this KitsController */
/* @var $model Kits */

$this->breadcrumbs=array(
	'Kits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Kits', 'url'=>array('index')),
	//array('label'=>'Create Kits', 'url'=>array('create')),
	array('label'=>'View Kits', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Kits', 'url'=>array('admin')),
);
?>

<h1>Update Kits <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>