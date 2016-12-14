
<?php

$mysqli = new mysqli("localhost","root","","nodesrv");
	if($mysqli->connect_errno){
		http_response_code(500);
		exit;
	}
