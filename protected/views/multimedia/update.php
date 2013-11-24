<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */

$this->breadcrumbs=array(
	'Multimedias'=>array('index'),
	$model->idmultimedia=>array('view','id'=>$model->idmultimedia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Multimedia', 'url'=>array('index')),
	array('label'=>'Create Multimedia', 'url'=>array('create')),
	array('label'=>'View Multimedia', 'url'=>array('view', 'id'=>$model->idmultimedia)),
	array('label'=>'Manage Multimedia', 'url'=>array('admin')),
);
?>

<h1>Update Multimedia <?php echo $model->idmultimedia; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>