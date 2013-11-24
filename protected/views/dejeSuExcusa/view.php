<?php
/* @var $this DejeSuExcusaController */
/* @var $model DejeSuExcusa */

$this->breadcrumbs=array(
	'Deje Su Excusas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DejeSuExcusa', 'url'=>array('index')),
	array('label'=>'Create DejeSuExcusa', 'url'=>array('create')),
	array('label'=>'Update DejeSuExcusa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DejeSuExcusa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DejeSuExcusa', 'url'=>array('admin')),
);
?>

<h1>View DejeSuExcusa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'correo',
		'excusa',
	),
)); ?>
