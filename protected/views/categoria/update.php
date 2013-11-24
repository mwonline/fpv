<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->idcategoria=>array('view','id'=>$model->idcategoria),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Categoria', 'url'=>array('index')),
	array('label'=>'Crear Categoria', 'url'=>array('create')),
	array('label'=>'Ver Categoria', 'url'=>array('view', 'id'=>$model->idcategoria)),
	array('label'=>'Administrar Categoria', 'url'=>array('admin')),
);
?>

<h1>Actualizar Categoría <?php echo $model->idcategoria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>