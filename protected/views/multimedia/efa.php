<?php
        echo CHtml::link('Buscar2', "#dataFinder2", array("id" => "fancy-link2"));
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => 'a#fancy-link2',
            'config' => array(),));
        $this->widget('widgets.elfinder.FinderWidget', array(
            'path' => realpath("") . "/docfiles", // path to your uploads directory, must be writeable 
            'url' => 'http://www.inteligenciavial.com/docfiles', // url to uploads directory
            'action' => $this->createUrl('multimedia/elfinder.connector'), // the connector action (we assume we are pasting this code in the sitecontroller view file)
			'selector' => "elfinderDiv2",
            'inputid' => "url",
        ));
        ?>