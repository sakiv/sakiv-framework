<?php

//include_once './test/regex.php';
//die;


$qs = $_SERVER['QUERY_STRING'];

echo "Loading Tester...<br>";
echo "Querystring: $qs<br>";
echo "{$_GET[a]}<br>";
echo "{$_GET[p]}<br>";

// $s = array(
// 	"regex",
// 	"regex/",
// 	"regex/abcd",
// 	"regex/abcd/",
// 	"regex/abcd/efgh",
// 	"regex/abcd/efgh/",

// 	"/regex",
// 	"/regex/",
// 	"/regex/abcd",
// 	"/regex/abcd/",
// 	"/regex/abcd/efgh",
// 	"/regex/abcd/efgh/"
// 	);

// $t = "regex";

// foreach ($s as $v) {
// 	$t = getRequestedTester($v);
// }

//preg_match_all("#^/\#(.*?)/(.*)#", "/#t/search/vaggarwa", $matches);
//print_r($matches);
//die;


$t = getRequestedTester($qs);

if (isset($t)) {
    
    if($_GET[a]) {
        $file = __DIR__ . "/{$_GET[a]}.php";        
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
}


function getRequestedTester($queryString) {
	echo "==================================<br>";
	echo "Input: $queryString : ";
        echo strlen($queryString) . "<br>";
        
	$s = $queryString;        
	$s = preg_replace("#^([/]?)#", " ", $s);
	echo "Replace result: $s : " . strlen($s) . "<br>";
	$s = trim($s) . "/";
	echo "Concat result: $s : " . strlen($s) . "<br>";
        
	$r = preg_match_all("#^([^/].*?)/#", $s, $m);

	// $r = preg_match_all("#^([/]?)#", $s, $m);
	// $m = preg_split("/", $s);
	// echo "Match Found: $r<br>";
	print_r($m);
	// echo "<br>";
	echo $m[1] . ", " . $m[2] . ", " . $m[3] . "<br>";
	echo $m[0][0] . ", " . $m[0][1] . "<br>";
	echo $m[1][0] . ", " . $m[1][1] . "<br>";
	echo "Result: " . $m[1][0] . "<br>";
	echo "==================================<br>";
	// die;

	return $m[1][0];
}


?>