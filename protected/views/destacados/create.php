<?php
/* @var $this DestacadosController */
/* @var $model Destacados */

$this->breadcrumbs=array(
	'Destacadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Destacados', 'url'=>array('index')),
	array('label'=>'Manage Destacados', 'url'=>array('admin')),
);
?>

<h1>Create Destacados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>