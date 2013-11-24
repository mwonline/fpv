<?php
/**
 * elfinderDos widget
 * @author Vincent Gabriel (vadimg88@gmail.com)
 *
 */
class FinderWidgetDos extends CWidget {
	/**
	 * @var string elfinderDos selector
	 */
	public $selector = '#elfinderDos';
	/**
	 * @var string action url
	 */
	public $action = '';
	/**
	 * @var string path to the files
	 */
	public static $_path = '';
	/**
	 * @var string url to files
	 */
	public static $_url = '';
	/**
	 * @var string path to files
	 */
	public $path = '';
	/**
	 * @var string url to files
	 */
	public $url = '';
	/**
	 * Widget Init
	 */
	 public $inputid = '';
	/**
	 * Widget Init
	 */
	public function init() {
		//echo "Funcio Dos";
		// Set path
		if($this->path) {
			self::$_path = $this->path;
		}
		
		// Set URL
		if($this->url) {
			self::$_url = $this->url;
		}
		
		// Build action
		$extra = sprintf("/elfinder_path/%s/elfinder_url/%s", base64_encode(self::$_path), base64_encode(self::$_url));
		$this->action .= $extra;
		$inputid=$this->inputid;
	}
	
	/**
	 * Widget Actions
	 *
	 */
	public static function actions() {
        return array(
           'connector'=>array(
           	'class' => 'widgets.elfinderDos.actions.connector',
           ),
        );
    }
	
	public function run() {
		$this->render('main');
	}
}