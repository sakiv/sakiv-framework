<?php

namespace sakiv\web;

use sakiv\framework\sf;

print('Start<br/>');

define('sakiv.framework', 1);
require_once 'framework.php';
sf::loadFramework();

print('Finish');

?>