<?php
/* @var $this CategoriadescController */
/* @var $model Categoriadesc */

$this->breadcrumbs=array(
	'Categoriadescs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar descargas', 'url'=>Yii::app()->request->baseUrl."/descarga/admin"),
	array('label'=>'Crear descarga', 'url'=>Yii::app()->request->baseUrl."/descarga/create"),
	array('label'=>'Administrar categorias', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/admin"),
	array('label'=>'Crear categoria', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/create"),
);
?>

<h1>Actualizar Categoria de descargas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>