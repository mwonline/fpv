<?php
/* @var $this CategoriadescController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoriadescs',
);

$this->menu=array(
	array('label'=>'Administrar descargas', 'url'=>Yii::app()->request->baseUrl."/descarga/admin"),
	array('label'=>'Crear descarga', 'url'=>Yii::app()->request->baseUrl."/descarga/create"),
	array('label'=>'Administrar categorias', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/admin"),
	array('label'=>'Crear categoria', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/create"),
);
?>

<h1>Categorias de descargas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
