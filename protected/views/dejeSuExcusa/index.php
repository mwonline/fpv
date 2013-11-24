<?php
/* @var $this DejeSuExcusaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deje Su Excusas',
);

$this->menu=array(
	array('label'=>'Create DejeSuExcusa', 'url'=>array('create')),
	array('label'=>'Manage DejeSuExcusa', 'url'=>array('admin')),
);
?>

<h1>Deje Su Excusas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
