<?php
/* @var $this ContenidoMultimediaController */
/* @var $model ContenidoMultimedia */

$this->breadcrumbs=array(
	'Contenido Multimedias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContenidoMultimedia', 'url'=>array('index')),
	array('label'=>'Manage ContenidoMultimedia', 'url'=>array('admin')),
);
?>

<h1>Create ContenidoMultimedia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>