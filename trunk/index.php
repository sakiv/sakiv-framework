<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to Sakiv Framework landing page.</h1>
        <?php        
        $qs = $_SERVER['QUERY_STRING'];
        // put your code here
        $header = header("location: $qs");
        //include_once './test/regex.php';
        ?>
    </body>
</html>
