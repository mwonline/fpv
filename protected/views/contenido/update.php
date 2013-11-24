<?php
/* @var $this ContenidoController */
/* @var $model Contenido */

$this->breadcrumbs=array(
	'Contenidos'=>array('index'),
	$model->idContenido=>array('view','id'=>$model->idContenido),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Contenidos', 'url'=>array('index')),
	array('label'=>'Crear Contenido', 'url'=>array('create')),
	array('label'=>'Ver Contenidos', 'url'=>array('view', 'id'=>$model->idContenido)),
	array('label'=>'Administrar Contenido', 'url'=>array('admin')),
);
?>

<h1>Actualizar Contenido <?php echo $model->idContenido; ?></h1>

<?php //echo $this->renderPartial('_form', array('modelConCat'=>$modelConCat,'model'=>$model)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>