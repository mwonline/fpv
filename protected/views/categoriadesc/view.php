<?php
/* @var $this CategoriadescController */
/* @var $model Categoriadesc */

$this->breadcrumbs=array(
	'Categoriadescs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Administrar descargas', 'url'=>Yii::app()->request->baseUrl."/descarga/admin"),
	array('label'=>'Crear descarga', 'url'=>Yii::app()->request->baseUrl."/descarga/create"),
	array('label'=>'Administrar categorias', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/admin"),
	array('label'=>'Crear categoria', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/create"),
);
?>

<h1>Resumen de Categoria de descargas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'padre',
		array(
			'label'=>'padre',
			'type'=>'raw',
			'value'=>$model->cpadre->titulo,
		),
		'titulo',
		'orden',
		'activo',
	),
)); ?>
