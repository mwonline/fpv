<?php
/* @var $this ContenidoMultimediaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contenido Multimedias',
);

$this->menu=array(
	array('label'=>'Create ContenidoMultimedia', 'url'=>array('create')),
	array('label'=>'Manage ContenidoMultimedia', 'url'=>array('admin')),
);
?>

<h1>Contenido Multimedias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
