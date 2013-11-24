<?php
/* @var $this CategoriaContenidoController */
/* @var $model CategoriaContenido */

$this->breadcrumbs=array(
	'Categoria Contenidos'=>array('index'),
	$model->idcategoriacontenido=>array('view','id'=>$model->idcategoriacontenido),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriaContenido', 'url'=>array('index')),
	array('label'=>'Create CategoriaContenido', 'url'=>array('create')),
	array('label'=>'View CategoriaContenido', 'url'=>array('view', 'id'=>$model->idcategoriacontenido)),
	array('label'=>'Manage CategoriaContenido', 'url'=>array('admin')),
);
?>

<h1>Update CategoriaContenido <?php echo $model->idcategoriacontenido; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>