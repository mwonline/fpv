<?php
/* @var $this CategoriaControllerController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->idcategoria,
);

$this->menu=array(
	array('label'=>'Listar Categoria', 'url'=>array('index')),
	array('label'=>'Crear Categoria', 'url'=>array('create')),
	array('label'=>'Actualizar Categoria', 'url'=>array('update', 'id'=>$model->idcategoria)),
	array('label'=>'Eliminar Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcategoria),'confirm'=>'Esta usted seguro de eliminar este item?')),
	array('label'=>'Administrar Categoria', 'url'=>array('admin')),
);
?>

<h1>Ver Categor&iacutea # <?php echo $model->idcategoria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'titulo',
		'orden',
		'activo',
		'alias',
		'fecha_de_creacion',
		'idplantilla',
		'idcategoria',
		'idContenidoRef',
		'idpadrecategoria',
	),
)); ?>
