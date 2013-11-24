<?php
/* @var $this ContenidoMultimediaController */
/* @var $model ContenidoMultimedia */

$this->breadcrumbs=array(
	'Contenido Multimedias'=>array('index'),
	$model->idcontenidomultimedia=>array('view','id'=>$model->idcontenidomultimedia),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContenidoMultimedia', 'url'=>array('index')),
	array('label'=>'Create ContenidoMultimedia', 'url'=>array('create')),
	array('label'=>'View ContenidoMultimedia', 'url'=>array('view', 'id'=>$model->idcontenidomultimedia)),
	array('label'=>'Manage ContenidoMultimedia', 'url'=>array('admin')),
);
?>

<h1>Update ContenidoMultimedia <?php echo $model->idcontenidomultimedia; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>