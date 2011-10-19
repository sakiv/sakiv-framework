<?php

namespace sakiv\web;

print('Start<br/>');

// Namespaces referred
use sakiv\framework\core\Accessor;

// Piece of code required to load sakiv.framework
use sakiv\framework\sf;
define('sakiv.framework', 1);
require_once 'framework.php';
sf::loadFramework();

print('Get context<br/>');

$context = Accessor::getContext();

$context->user = 'sakiv';

print('Print context<br/>');
print(gettype($context)."<br/>");

print('Finish');

?>