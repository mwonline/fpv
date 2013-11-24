<?php
/* @var $this ExcusasController */
/* @var $model Excusas */

$this->breadcrumbs=array(
	'Excusases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Excusas', 'url'=>array('index')),
	array('label'=>'Create Excusas', 'url'=>array('create')),
	array('label'=>'View Excusas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Excusas', 'url'=>array('admin')),
);
?>

<h1>Update Excusas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>