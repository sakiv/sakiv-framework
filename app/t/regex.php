<?php

echo "Welcome to regex page...<br>";

$p = getParams();

if(isset ($p)) {
    echo "Found parameters...{" . $p . "}";
    return $p;
}

function getParams() {
    if (isset ($_GET["p"])) {
        return $_GET["p"];
    }
}

?>