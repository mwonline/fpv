<?php
/* @var $this SolicitudeskitController */
/* @var $model Solicitudeskit */

$this->breadcrumbs=array(
	'Solicitudeskits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solicitudeskit', 'url'=>array('index')),
	array('label'=>'Manage Solicitudeskit', 'url'=>array('admin')),
);
?>

<h1>Create Solicitudeskit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>