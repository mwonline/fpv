<?php
/* @var $this ContenidoController */
/* @var $model Contenido */

$this->breadcrumbs=array(
	'Contenidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Contenidos', 'url'=>array('index')),
	array('label'=>'Administrar Contenidos', 'url'=>array('admin')),
);
?>

<h1>Crear Contenido</h1>

<?php 
//echo $this->renderPartial('_form', array('modelConCat'=>$modelConCat,'model'=>$model)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
?>
