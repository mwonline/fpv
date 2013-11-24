<?php
/* @var $this DestacadosController */
/* @var $model Destacados */

$this->breadcrumbs=array(
	'Destacadoses'=>array('index'),
	$model->id_destacado=>array('view','id'=>$model->id_destacado),
	'Update',
);

$this->menu=array(
	array('label'=>'List Destacados', 'url'=>array('index')),
	array('label'=>'Create Destacados', 'url'=>array('create')),
	array('label'=>'View Destacados', 'url'=>array('view', 'id'=>$model->id_destacado)),
	array('label'=>'Manage Destacados', 'url'=>array('admin')),
);
?>

<h1>Update Destacados <?php echo $model->id_destacado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>