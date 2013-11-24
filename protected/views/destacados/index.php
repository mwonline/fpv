<?php
/* @var $this DestacadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Destacadoses',
);

$this->menu=array(
	array('label'=>'Create Destacados', 'url'=>array('create')),
	array('label'=>'Manage Destacados', 'url'=>array('admin')),
);
?>

<h1>Destacadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
