<?php
/* @var $this ContenidoMultimediaController */
/* @var $model ContenidoMultimedia */

$this->breadcrumbs=array(
	'Contenido Multimedias'=>array('index'),
	$model->idcontenidomultimedia,
);

$this->menu=array(
	array('label'=>'List ContenidoMultimedia', 'url'=>array('index')),
	array('label'=>'Create ContenidoMultimedia', 'url'=>array('create')),
	array('label'=>'Update ContenidoMultimedia', 'url'=>array('update', 'id'=>$model->idcontenidomultimedia)),
	array('label'=>'Delete ContenidoMultimedia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcontenidomultimedia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContenidoMultimedia', 'url'=>array('admin')),
);
?>

<h1>View ContenidoMultimedia #<?php echo $model->idcontenidomultimedia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idContenido',
		'idmultimedia',
		'orden',
		'fecha_de_creacion',
		'idcontenidomultimedia',
	),
)); ?>
