<?php
/* @var $this AliadosController */
/* @var $model Aliados */

$this->breadcrumbs=array(
	'Aliadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aliados', 'url'=>array('index')),
	array('label'=>'Manage Aliados', 'url'=>array('admin')),
);
?>

<h1>Create Aliados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>