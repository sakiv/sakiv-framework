<?php

namespace sakiv\web;

// Namespaces referred
use sakiv\framework\core\Activator;
use sakiv\framework\sf;

print('Start<br/>');

define('sakiv.framework', 1);
require_once 'framework.php';
sf::loadFramework();

print('Get context<br/>');
$context = Activator::getInstance()->context;

print('Print context<br/>');
print(gettype($context)."<br/>");

print('Finish');

?>