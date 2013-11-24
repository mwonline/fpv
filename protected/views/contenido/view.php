<?php
/* @var $this ContenidoController */
/* @var $model Contenido */

$this->breadcrumbs=array(
	'Contenidos'=>array('index'),
	$model->idContenido,
);

$this->menu=array(
	array('label'=>'Listar Contenidos', 'url'=>array('index')),
	array('label'=>'Crear Contenido', 'url'=>array('create')),
	array('label'=>'Editar Contenido', 'url'=>array('update', 'id'=>$model->idContenido)),
	array('label'=>'Eliminar Contenido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idContenido),'confirm'=>'Esta usted seguro de eliminar este item?')),
	array('label'=>'Administrar Contenidos', 'url'=>array('admin')),
);
?>

<h1>Ver Contenido # <?php echo $model->idContenido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idContenido',
		'titulo',
		'resumen',
		'descripcion',
		'fecha_creacion',
		'activo',
		'usuario_creacion',
		'imagen',	
		'Metadescripcion',
		'Meta_tags',
		'alias',
		'destacado',
	),
)); ?>

<?php //tinymce ?>
   <?php  /*
   //echo  CHtml::link('Escribir',"#dataFinder", array("id"=>"fancy-link"));

		//$this->widget('application.extensions.tinymce.TinyMce', array(
        //'target'=>'a#fancy-link',
        //'config'=>array(),));   
    $this->widget('application.extensions.tinymce.TinyMce', array(
    'model' => $model,
    'attribute' => 'idContenido',
	//'attribute' => 'tinyMceArea',

	
    // Optional config
    'compressorRoute' => 'tinyMce/compressor',
    //'spellcheckerUrl' => array('tinyMce/spellchecker'),
    // or use yandex spell: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
    'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
    'fileManager' => array(
    'class' => 'ext.elfinder.TinyMceElFinder','connectorRoute'=>'admin/elfinder/connector',),
    'htmlOptions' => array('rows' => 2,'cols' => 2,),
    ));*/
    ?>   
    <?php //f_tinymce ?>