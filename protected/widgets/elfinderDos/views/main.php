<?php 
//echo "Cargador Dos";
Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js');
Yii::app()->clientScript->registerCSSFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('widgets.elfinderDos.assets'));
Yii::app()->clientScript->registerCSSFile($publish .  '/css/elfinderDos.full.css');
Yii::app()->clientScript->registerCSSFile($publish .  '/css/theme.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('widgets.elfinderDos.assets.js') . '/elfinderDos.min.js');
Yii::app()->clientScript->registerScriptFile($publish);
if($this->selector==""){
	$this->selector="elfinderDosDiv";
}
$script = "var elf".$this->selector." = $('#".$this->selector."').elfinderDos({
					url : '".$this->action."',  // connector URL (REQUIRED)
					resizable:false,
					onlyMimes: ['image'],
					commands: ['upload','delete'],
					lang: 'es',
					getfile : {
                        onlyURL : true,
                        multiple : false,
                        folders : false
                    },
                    getFileCallback : function(url) {
                        path = url.path;
                        $('#".$this->inputid."').val(path);
						 $.fancybox.close();
                    }  
				}).elfinderDos('instance');
				";


Yii::app()->clientScript->registerScript($this->selector, $script, CClientScript::POS_READY);
?>