<?php
/* @var $this CategoriaContenidoController */
/* @var $model CategoriaContenido */

$this->breadcrumbs=array(
	'Categoria Contenidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoriaContenido', 'url'=>array('index')),
	array('label'=>'Manage CategoriaContenido', 'url'=>array('admin')),
);
?>

<h1>Create CategoriaContenido</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>