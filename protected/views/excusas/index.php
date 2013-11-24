<?php
/* @var $this ExcusasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Excusases',
);

$this->menu=array(
	array('label'=>'Create Excusas', 'url'=>array('create')),
	array('label'=>'Manage Excusas', 'url'=>array('admin')),
);
?>

<h1>Excusases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
