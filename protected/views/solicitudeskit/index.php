<?php
/* @var $this SolicitudeskitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solicitudeskits',
);

$this->menu=array(
	//array('label'=>'Create Solicitudeskit', 'url'=>array('create')),
	array('label'=>'Manage Solicitudeskit', 'url'=>array('admin')),
);
?>

<h1>Solicitudeskits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
