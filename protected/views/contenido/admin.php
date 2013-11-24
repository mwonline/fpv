<?php
/* @var $this ContenidoController */
/* @var $model Contenido */

$this->breadcrumbs=array(
	'Contenidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Contenido', 'url'=>array('create')),
	array('label'=>'Listar Contenidos', 'url'=>array('index')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contenido-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Contenidos</h1>

<p>
Puede usar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de la busquedad para especificar un valor.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contenido-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idContenido',
		array(
			'name'=>'idCategoria',
			'filter'=>CHtml::dropDownList("Contenido[idCategoria]", '', Categoria::model()->getCategoriaMenu(), array('prompt' => 'Seleccione...'), array()),
		),
		//'idCategoria',
		'titulo',
		'resumen',
		'activo',
		'orden',
		
		/*
		
		'fecha_fin',
		'usuario_creación',
		'imagen',
		'Metadescripcion',
		'Meta_tags',
		'alias',
		'destacado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
