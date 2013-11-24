<?php
/* @var $this CategoriaContenidoController */
/* @var $model CategoriaContenido */

$this->breadcrumbs=array(
	'Categoria Contenidos'=>array('index'),
	$model->idcategoriacontenido,
);

$this->menu=array(
	array('label'=>'List CategoriaContenido', 'url'=>array('index')),
	array('label'=>'Create CategoriaContenido', 'url'=>array('create')),
	array('label'=>'Update CategoriaContenido', 'url'=>array('update', 'id'=>$model->idcategoriacontenido)),
	array('label'=>'Delete CategoriaContenido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcategoriacontenido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaContenido', 'url'=>array('admin')),
);
?>

<h1>View CategoriaContenido #<?php echo $model->idcategoriacontenido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCategoria',
		'idContenido',
		'orden',
		'fecha_de_creacion',
		'idcategoriacontenido',
	),
)); ?>
