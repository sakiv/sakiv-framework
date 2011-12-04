<?php

require_once 'Constants.php';
require_once 'loadConfig.php';

//include_once './test/regex.php';
//die;


$qs = $_SERVER['QUERY_STRING'];

echo "Loading Tester...<br>";
echo "Querystring: $qs<br>";
echo "{$_GET['a']}<br>";
echo "{$_GET['p']}<br>";

    
if($_GET['a']) {
    $file = __DIR__ . "/{$_GET['a']}.php";   
} else {
    $file = __DIR__ . "/{$_SERVER[QUERY_STRING]}.php";
}

//    $file = __DIR__ . "/{$_GET[a]}.php?{$_GET[p]}";        

//    $a = str_split($file);
//    $i = 0;
//    foreach ($a as $v) {
//        $i += 1;
//        echo "[$i] => $v<br>";
//    }

echo "$file<br>";
if (file_exists($file)) {
    include_once $file;
}

$t = getRequestedTester($qs);

?>