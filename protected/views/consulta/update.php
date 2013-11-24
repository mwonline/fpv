<?php
/* @var $this ConsultaController */
/* @var $model Consulta */

$this->breadcrumbs=array(
	'Consultas'=>array('index'),
	$model->idcapacitacion=>array('view','id'=>$model->idcapacitacion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Consulta', 'url'=>array('index')),
	array('label'=>'Create Consulta', 'url'=>array('create')),
	array('label'=>'View Consulta', 'url'=>array('view', 'id'=>$model->idcapacitacion)),
	array('label'=>'Manage Consulta', 'url'=>array('admin')),
);
?>

<h1>Update Consulta <?php echo $model->idcapacitacion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>