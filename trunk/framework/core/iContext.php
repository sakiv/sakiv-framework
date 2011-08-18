<?php

namespace sakiv\framework\core;

// Should be included on top of each framewrok file.
if(!defined('sakiv.framework')){
	Trace::write("External Access to File Denied", TraceMessageTypes::error, TRUE);
}

/**
 * Root interface for implementing the context.
 *
 * @category sakiv\framework\core
 * @filesource /framework/core/iContext.php
 *
 * @author sakiv
 * @copyright Copyright (C) 2005-2009, Sakiv Inc., India
 * @license Licensed under the GNU GPL v3
*/
interface iContext {
	// TODO: Need to finalize on list of methods.
	public static function getCurrent();
// 	function getCurrent($type);
}