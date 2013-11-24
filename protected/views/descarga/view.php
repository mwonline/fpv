<?php
/* @var $this DescargaController */
/* @var $model Descarga */

$this->breadcrumbs=array(
	'Descargas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Administrar descargas', 'url'=>Yii::app()->request->baseUrl."/descarga/admin"),
	array('label'=>'Crear descarga', 'url'=>Yii::app()->request->baseUrl."/descarga/create"),
	array('label'=>'Administrar categorias', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/admin"),
	array('label'=>'Crear categoria', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/create"),
);
?>

<h1>Ver Descarga #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'categoria',
		array(
			'label'=>'categoria',
			'type'=>'raw',
			'value'=>$model->categ->titulo,
		),
		'titulo',
		'descripcion',
		'imagen',
		'fecha',
		'activo',
		//'orden',
		'archivo',
	),
)); ?>
