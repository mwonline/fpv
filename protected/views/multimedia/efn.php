 <?php
        echo CHtml::link('Buscar', "#dataFinder", array("id" => "fancy-link"));
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => 'a#fancy-link',
            'config' => array(),));
        $this->widget('widgets.elfinder.FinderWidget', array(
            'path' => realpath("") . "/multimediafiles", // path to your uploads directory, must be writeable 
            'url' => 'http://www.inteligenciavial.com/multimediafiles', // url to uploads directory
            'action' => $this->createUrl('contenido/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
			 'selector' => "elfinderDiv",
            'inputid' => "url",
        ));
        ?>