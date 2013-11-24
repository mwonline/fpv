<?php
/* @var $this CategoriaContenidoController */
/* @var $model CategoriaContenido */

$this->breadcrumbs=array(
	'Categoria Contenidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CategoriaContenido', 'url'=>array('index')),
	array('label'=>'Create CategoriaContenido', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categoria-contenido-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categoria Contenidos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categoria-contenido-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCategoria',
		'idContenido',
		'orden',
		'fecha_de_creacion',
		'idcategoriacontenido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
