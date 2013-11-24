<?php
/* @var $this ExcusasController */
/* @var $model Excusas */

$this->breadcrumbs=array(
	'Excusases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Excusas', 'url'=>array('index')),
	array('label'=>'Manage Excusas', 'url'=>array('admin')),
);
?>

<h1>Create Excusas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>