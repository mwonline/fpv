<?php
/* @var $this MultimediaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Multimedias',
);

$this->menu=array(
	array('label'=>'Create Multimedia', 'url'=>array('create')),
	array('label'=>'Manage Multimedia', 'url'=>array('admin')),
);
?>

<h1>Multimedias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
