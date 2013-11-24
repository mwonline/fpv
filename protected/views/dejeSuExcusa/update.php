<?php
/* @var $this DejeSuExcusaController */
/* @var $model DejeSuExcusa */

$this->breadcrumbs=array(
	'Deje Su Excusas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DejeSuExcusa', 'url'=>array('index')),
	array('label'=>'Create DejeSuExcusa', 'url'=>array('create')),
	array('label'=>'View DejeSuExcusa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DejeSuExcusa', 'url'=>array('admin')),
);
?>

<h1>Update DejeSuExcusa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>