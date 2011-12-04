<!DOCTYPE html>
<head>
    <title>Load Debug Configuration</title>
</head>
<?php

error_reporting(
          E_COMPILE_ERROR 
        | E_COMPILE_WARNING 
        | E_CORE_ERROR
        | E_CORE_WARNING
        | E_DEPRECATED
        | E_ERROR 
//        | E_NOTICE
        | E_PARSE
        | E_RECOVERABLE_ERROR
        | E_STRICT
        | E_USER_DEPRECATED
        | E_USER_ERROR
        | E_USER_NOTICE
        | E_USER_WARNING
        | E_WARNING
        );

ini_set("display_errors", 1);



?>
