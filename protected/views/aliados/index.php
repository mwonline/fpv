<?php
/* @var $this AliadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aliadoses',
);

$this->menu=array(
	array('label'=>'Create Aliados', 'url'=>array('create')),
	array('label'=>'Manage Aliados', 'url'=>array('admin')),
);
?>

<h1>Aliadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
