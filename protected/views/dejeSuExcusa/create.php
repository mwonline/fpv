<?php
/* @var $this DejeSuExcusaController */
/* @var $model DejeSuExcusa */

$this->breadcrumbs=array(
	'Deje Su Excusas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DejeSuExcusa', 'url'=>array('index')),
	array('label'=>'Manage DejeSuExcusa', 'url'=>array('admin')),
);
?>

<h1>Create DejeSuExcusa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>