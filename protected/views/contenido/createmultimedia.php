<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */

$this->breadcrumbs=array(
	'Multimedias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Multimedia', 'url'=>array('index')),
	array('label'=>'Administrar Multimedia', 'url'=>array('admin')),
);
?>

<h1>Crear Multimedia</h1>

<?php echo $this->renderPartial('_formmultimedia', array('model'=>$model)); ?>