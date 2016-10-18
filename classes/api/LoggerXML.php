<?php


	class LoggerXML extends Logger{ 


		public function write($message){ 

			data_default_timezone_set('America/Sao_Paulo');
			$time = date('Y-m-d H:i:s');

			$text = "<log>\n";
			$text.= "	<time>$time</time>\n";
			$text.= "	<message>$message</message>\n";
			$text.=	"</log>\n";

			$handler = fopen($this->filename,'a');
			fwite($handler,$text);
			fclose($handler);
		}


	}