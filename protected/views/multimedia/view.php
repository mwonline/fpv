<?php
/* @var $this MultimediaController */
/* @var $model Multimedia */

$this->breadcrumbs=array(
	'Multimedias'=>array('index'),
	$model->idmultimedia,
);

$this->menu=array(
	array('label'=>'List Multimedia', 'url'=>array('index')),
	array('label'=>'Create Multimedia', 'url'=>array('create')),
	array('label'=>'Update Multimedia', 'url'=>array('update', 'id'=>$model->idmultimedia)),
	array('label'=>'Delete Multimedia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmultimedia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Multimedia', 'url'=>array('admin')),
);
?>

<h1>View Multimedia #<?php echo $model->idmultimedia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmultimedia',
		'url',
		'resumen',
		'fecha_creacion',
		'idContenidomul',
	),
)); ?>

<?php  /*
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>'cocowidget1',
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            'allowedExtensions'=>array('jpeg','jpg','gif','png'),
            'sizeLimit'=>2000000,
            'uploadDir' => 'C:\Users\Diego\Documents\OETL\php',
            // para recibir el archivo subido:
            'receptorClassName'=>'application.models.MyModel',
            'methodName'=>'onFileUploaded',
            'userdata'=>$model->primaryKey,
        ));
 */   ?>
<div style="display:none">
<div id="dataFinder" style="width:760px;height:480px">
<div id="elfinderDiv"></div>
</div>
<?php
//echo  CHtml::link('Buscar',"#dataFinder", array("id"=>""));
/*$this->widget('ext.tinymce.TinyMce', array(
    'model' => $model,
    'attribute' => 'idContenido',
	//'attribute' => 'url',
	//'attribute' => 'resumen',
    // Optional config
    'compressorRoute' => 'tinyMce/compressor',
    'spellcheckerUrl' => array('tinyMce/spellchecker'),
    // or use yandex spell: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
    'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
    'fileManager' => array(
    'class' => 'ext.elfinder.TinyMceElFinder',
    'connectorRoute'=>'multimedia/elfinder.connector',),
    'htmlOptions' => array('rows' => 2,'cols' => 2,),
));
//echo "path:".realpath("../");
*/?>




<div style="display:none">
<div id="dataFinder" style="width:760px;height:480px">
<div id="elfinderDiv"></div>
</div>
</div>
<?php 
echo  CHtml::link('Buscar',"#dataFinder", array("id"=>"fancy-link"));
$this->widget('application.extensions.fancybox.EFancyBox', array(
        'target'=>'a#fancy-link',
        'config'=>array(),));  
 $this->widget('widgets.elfinder.FinderWidget', array(
                        'path' => realpath("../").'/site/multimediafiles', // path to your uploads directory, must be writeable 
                        'url' => 'http://www.insigniajuridica.com/site/multimediafiles', // url to uploads directory
                        'action' => $this->createUrl('multimedia/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
						'inputid' => "urlFinder2",
)); ?>
<input type="text" id="urlFinder2" />