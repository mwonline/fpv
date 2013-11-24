<?php
/* @var $this SolicitudeskitController */
/* @var $model Solicitudeskit */

$this->breadcrumbs=array(
	'Solicitudeskits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solicitudeskit', 'url'=>array('index')),
	//array('label'=>'Create Solicitudeskit', 'url'=>array('create')),
	array('label'=>'View Solicitudeskit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Solicitudeskit', 'url'=>array('admin')),
);
?>

<h1>Update Solicitudeskit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>