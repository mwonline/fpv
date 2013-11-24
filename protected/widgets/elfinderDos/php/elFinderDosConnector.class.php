<?php

// mb_internal_encoding("UTF-8");

/**
 * Default elfinderDos connector
 *
 * @author Dmitry (dio) Levashov
 **/
class elfinderDosConnector {
	/**
	 * elfinderDos instance
	 *
	 * @var elfinderDos
	 **/
	protected $elfinderDos;
	
	/**
	 * Options
	 *
	 * @var aray
	 **/
	protected $options = array();
	
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $header = 'Content-Type: text/html' /*'Content-Type: application/json'*/;
	
	/**
	 * Constructor
	 *
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	public function __construct($elfinderDos) {
		$this->elfinderDos = $elfinderDos;
	}
	
	/**
	 * Execute elfinderDos command and output result
	 *
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	public function run() {
		$isPost = $_SERVER["REQUEST_METHOD"] == 'POST';
		$src    = $_SERVER["REQUEST_METHOD"] == 'POST' ? $_POST : $_GET;
		$cmd    = isset($src['cmd']) ? $src['cmd'] : '';
		$args   = array();
		
		if (!function_exists('json_encode')) {
			$error = $this->elfinderDos->error(elfinderDos::ERROR_CONF, elfinderDos::ERROR_CONF_NO_JSON);
			$this->output(array('error' => '{"error":["'.implode('","', $error).'"]}', 'raw' => true));
		}
		
		if (!$this->elfinderDos->loaded()) {
			$this->output(array('error' => $this->elfinderDos->error(elfinderDos::ERROR_CONF, elfinderDos::ERROR_CONF_NO_VOL)));
		}
		
		// telepat_mode: on
		if (!$cmd && $isPost) {
			$this->output(array('error' => $this->elfinderDos->error(elfinderDos::ERROR_UPLOAD_COMMON, elfinderDos::ERROR_UPLOAD_FILES_SIZE), 'header' => 'Content-Type: text/html'));
		}
		// telepat_mode: off
		
		if (!$this->elfinderDos->commandExists($cmd)) {
			$this->output(array('error' => $this->elfinderDos->error(elfinderDos::ERROR_UNKNOWN_CMD)));
		}
		
		// collect required arguments to exec command
		foreach ($this->elfinderDos->commandArgsList($cmd) as $name => $req) {
			$arg = $name == 'FILES' 
				? $_FILES 
				: (isset($src[$name]) ? $src[$name] : '');
				
			if (!is_array($arg)) {
				$arg = trim($arg);
			}
			if ($req && empty($arg)) {
				$this->output(array('error' => $this->elfinderDos->error(elfinderDos::ERROR_INV_PARAMS, $cmd)));
			}
			$args[$name] = $arg;
		}
		
		$args['debug'] = isset($src['debug']) ? !!$src['debug'] : false;
		
		$this->output($this->elfinderDos->exec($cmd, $args));
	}
	
	/**
	 * Output json
	 *
	 * @param  array  data to output
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	protected function output(array $data) {
		$header = isset($data['header']) ? $data['header'] : 'Content-Type: text/html; charset=utf-8' /*'Content-Type: application/json'*/;
		unset($data['header']);
		// debug($header);
		// exit();
		if ($header) {
			if (is_array($header)) {
				foreach ($header as $h) {
					header($h);
				}
			} else {
				header($header);
			}
		}
		
		if (isset($data['pointer'])) {
			rewind($data['pointer']);
			fpassthru($data['pointer']);
			if (!empty($data['volume'])) {
				$data['volume']->close($data['pointer'], $data['info']['hash']);
			}
			exit();
		} else {
			if (!empty($data['raw']) && !empty($data['error'])) {
				exit($data['error']);
			} else {
				exit(json_encode($data));
			}
		}
		
	}
	
}// END class 

?>