<?php 
//echo "cargador uno";
Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js');
Yii::app()->clientScript->registerCSSFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('widgets.elfinder.assets'));
Yii::app()->clientScript->registerCSSFile($publish .  '/css/elfinder.full.css');
Yii::app()->clientScript->registerCSSFile($publish .  '/css/theme.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('widgets.elfinder.assets.js') . '/elfinder.min.js');
Yii::app()->clientScript->registerScriptFile($publish);
if($this->selector==""){
	$this->selector="elfinderDiv";
}

$script = "var elf".$this->selector." = $('#".$this->selector."').elfinder({
					url : '".$this->action."',  // connector URL (REQUIRED)
					resizable:false,
					onlyMimes: [],
					commands: ['upload','delete'],
					lang: 'es',
					getfile : {
                        onlyURL : true,
                        multiple : true,
                        folders : true
                    },
                    getFileCallback : function(url) {
                        path = url.path;
                        $('#".$this->inputid."').val(path);
						 $.fancybox.close();
                    }  
				}).elfinder('instance');
				
				";


Yii::app()->clientScript->registerScript($this->selector, $script, CClientScript::POS_READY);
?>