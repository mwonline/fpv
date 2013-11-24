<?php
/* @var $this CategoriaContenidoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoria Contenidos',
);

$this->menu=array(
	array('label'=>'Create CategoriaContenido', 'url'=>array('create')),
	array('label'=>'Manage CategoriaContenido', 'url'=>array('admin')),
);
?>

<h1>Categoria Contenidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
