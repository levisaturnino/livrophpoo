<?php

	abstract class Logger{ 

		protected $filename; // local do arquiv de LOG

		public function __constrct($filename){ 
			$this->filename = $filename;
			file_put_contents($filename,'');
		}

		$abstract function write($message);
	}