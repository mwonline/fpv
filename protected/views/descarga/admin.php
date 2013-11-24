<?php
/* @var $this DescargaController */
/* @var $model Descarga */

$this->breadcrumbs=array(
	'Descargas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Administrar descargas', 'url'=>Yii::app()->request->baseUrl."/descarga/admin"),
	array('label'=>'Crear descarga', 'url'=>Yii::app()->request->baseUrl."/descarga/create"),
	array('label'=>'Administrar categorias', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/admin"),
	array('label'=>'Crear categoria', 'url'=>Yii::app()->request->baseUrl."/categoriadesc/create"),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#descarga-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Descargas</h1>

<p>
Se pueden usar opcionalmente signos de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada uno de los valores de busqueda.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'descarga-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'categoria',
		array(
			'name'=>'categoria',
			'type'=>'raw',
			'value'=>'$data->categ->titulo',
		),
		'titulo',
		//'descripcion',
		array('name'=>'descripcion',
			'htmlOptions'=>array('width'=>'200px')
			),
		array(            // mostrar imagen
            'name'=>'imagen',
			"type" => "raw",
            //'value'=>'"<img src='."'descargas/".'".$->archivo."'."'".' style='."'max-height:90px;max-width:90px'".'>"',
            'value'=>'"<img src='."'../descargas/".'".$data->imagen."'."'".' style='."'max-height:90px;max-width:90px'".'>"',
        ),
		'fecha',
		'activo',		
		//'orden',
		'archivo',	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
