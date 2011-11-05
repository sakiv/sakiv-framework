<?php

namespace sakiv\framework\web\url;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}


class UrlParser {

	function parseUrl() {
		return null;
	}

}

?>