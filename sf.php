<?php

namespace sakiv\web;

print('Start<br/>');

// Namespaces referred
use sakiv\framework\core\Accessor;
//

// Piece of code required to load sakiv.framework
// ==============================================
use sakiv\framework\sf;
define('sakiv.framework', 1);
require_once 'framework.php';
sf::loadFramework();
// ==============================================

$qs = $_SERVER['QUERY_STRING'];
echo "Query String: $qs";
echo "<br>";
// die;

// error handler function
function error_handler($code, $msg, $file, $line, $context)
{
    if (!(error_reporting() & $code)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($code) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$code] $msg<br />\n";
        echo "  Fatal error on line $line in file $file";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$code] $msg<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$code] $msg<br />\n";
        break;

    default:
        echo "Unknown error type: [$code] $msg<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

set_error_handler('error_handler');

// trigger_error('Test', E_USER_ERROR);

print('Get context<br/>');

$context = Accessor::getContext();

$context->user = 'sakiv';

print('Print context<br/>');
print(gettype($context)."<br/>");
print($context->user);

print('Finish');


?>