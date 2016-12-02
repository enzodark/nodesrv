
<?php

global $link;

$link = mysql_connect('localhost', 'root', '','nodesrv');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db = mysql_select_db("nodesrv", $link);

if($db){
    echo "Result OK";
}

mysql_close($link);
?>



