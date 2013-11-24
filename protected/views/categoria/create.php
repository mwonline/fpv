<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Categoria', 'url'=>array('index')),
	array('label'=>'Administrar Categoria', 'url'=>array('admin')),
);
?>

<h1>Crear Categor&iacute;a</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>