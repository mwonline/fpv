<?php
/* @var $this AliadosController */
/* @var $model Aliados */

$this->breadcrumbs=array(
	'Aliadoses'=>array('index'),
	$model->idExcusa=>array('view','id'=>$model->idExcusa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aliados', 'url'=>array('index')),
	array('label'=>'Create Aliados', 'url'=>array('create')),
	array('label'=>'View Aliados', 'url'=>array('view', 'id'=>$model->idExcusa)),
	array('label'=>'Manage Aliados', 'url'=>array('admin')),
);
?>

<h1>Update Aliados <?php echo $model->idExcusa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>