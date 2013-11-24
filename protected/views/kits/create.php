<?php
/* @var $this KitsController */
/* @var $model Kits */

$this->breadcrumbs=array(
	'Kits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kits', 'url'=>array('index')),
	array('label'=>'Manage Kits', 'url'=>array('admin')),
);
?>

<h1>Create Kits</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>