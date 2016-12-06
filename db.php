
<?php

global $link;

$link = mysqli_connect('localhost', 'root', '','nodesrv');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';


//$db = mysqli_select_db("nodesrv", $link);

if($db){
    echo "Result OK";
}


?>



