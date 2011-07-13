<?php

namespace sakiv\web;

use sakiv\web\another as another;

class TestMain {
	public static function invoke() {
		another\Test::invoke();
	}
}

namespace sakiv\web\another;

require_once '/sakiv.framework/core/internal.php';
use sakiv\framework\core\Internal;

class Test {
	public static function invoke() {
		Internal::isInternal();
	}
}

namespace sakiv\web;

print('Start<br/>');

TestMain::invoke();

print ('Finish<br/>');

?>