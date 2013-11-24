<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */

$this->breadcrumbs=array(
	'Multimedias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Multimedia', 'url'=>array('index')),
	array('label'=>'Create Multimedia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('multimedia-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Multimedias</h1>

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
<br />
<?php echo CHtml::link('Crear otro multimedia', '../multimedia/create?idContenido='.$idContenido, array('class'=>'')); ?>
<br />
<?php echo CHtml::link('Editar contenido','../contenido/update/'.$idContenido, array('class'=>'')); ?>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'multimedia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	//'rowHtmlOptionsExpression'=>array("url"),
	'columns'=>array(
		'idmultimedia',
		array(            // display 'author.username' using an expression
            'name'=>'url',
			"type" => "raw",
            'value'=>'"<img src='."'../".'".$data->url."'."'".' style='."'max-height:90px;max-width:90px'".'>"',
        ),
		//'url',
		'resumen',
		'orden',
		'fecha_creacion',
		array(
			'name'=>'idContenidomul',
			'filter'=>CHtml::dropDownList("Multimedia[idContenidomul]", '', CHtml::listData(Contenido::model()->findAll(array('order' => 'titulo')), 'idContenido', 'titulo'), array('prompt' => 'Seleccione...'), array()),
		),
		//'idContenidomul',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
