<!DOCTYPE html>
<head>
    <title>Regular Expression Tester</title>
</head>
<?php

echo "Regex page processing...<br>";

$p = getParams();

if(isset ($p)) {
    echo "Found parameters...{" . $p . "}<br>";
}

//$t = getRequestedTester($qs);
smokeTest($p);

function getParams() {
    if (isset ($_GET["p"])) {
        return $_GET["p"];
    }
}

function processRegex($r, $s) {
    preg_match_all($r, $s, $m);
    return $m;   
}

function smokeTest($param) {
    
    echo Constants::bold_line;
    echo "Smoke Test started<br>";
    echo Constants::bold_line;
    $s = array(
        "regex",
        "regex/",
        "regex/abcd",
        "regex/abcd/",
        "regex/abcd/efgh",
        "regex/abcd/efgh/",

        "/regex",
        "/regex/",
        "/regex/abcd",
        "/regex/abcd/",
        "/regex/abcd/efgh",
        "/regex/abcd/efgh/"
        );

    $t = "regex";

    foreach ($s as $v) {
        $t = getRequestedTester($v);
    }

    echo "Smoke Test finished<br>";
    echo Constants::bold_line;

//    preg_match_all("#^/\#(.*?)/(.*)#", "/#t/search/vaggarwa", $matches);
//    print_r($matches);
//    die;
}

function getRequestedTester($param) {
	echo "Input: $param : ";
        echo strlen($param) . "<br>";
	echo Constants::thin_line;
        
	$s = $param;        
	$s = preg_replace("#^([/]?)#", " ", $s);
	echo "Replace result: $s : " . strlen($s) . "<br>";
	$s = trim($s) . "/";
	echo "Concat result: $s : " . strlen($s) . "<br>";
        
	$r = preg_match_all("#^([^/].*?)/#", $s, $m);

	// $r = preg_match_all("#^([/]?)#", $s, $m);
	// $m = preg_split("/", $s);
	// echo "Match Found: $r<br>";
	print_r($m);
	echo "<br>";
	echo "1. " . $m[1] . ", " . $m[2] . ", " . $m[3] . "<br>";
	echo "2. " . $m[0][0] . ", " . $m[0][1] . "<br>";
	echo "3. " . $m[1][0] . ", " . $m[1][1] . "<br>";
	echo "Result: " . $m[1][0] . "<br>";
	echo Constants::bold_line;
	// die;

	return $m[1][0];
}

?>