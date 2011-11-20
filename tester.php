<?php

$qs = $_SERVER['QUERY_STRING'];

echo "Loading Tester...<br>";

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

$t = getRequestedTester($qs);

if (isset($t)) {
	echo "./test/$t.php";
	require_once "./test/$t.php";
}


function getRequestedTester($queryString) {
	echo "==================================<br>";
	echo "Input: $queryString<br>";
	$s = $queryString;
	$s = preg_replace("#^([/]?)#", "\1", $s);
	$s = $s . "/";
	echo "Replace result: ";
	print_r($s);
	echo "<br>";
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