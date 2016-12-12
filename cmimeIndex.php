<?php
ini_set('max_execution_time', 300);
//Inicializimi

$mysqli = new mysqli("localhost","root","","nodesrv");
	if($mysqli->connect_errno){
		http_response_code(500);
		exit;
	}

$url = "http://80.78.76.160:3050/cmimiPost" ;
//$url = "http://192.168.1.30:3050/artikujPost" ;
$ch = curl_init($url);

//Parametrat Header
$headr = array();
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Basic ZGVtb3M1NjpkN2MwOGE3NDM2YTAxZWFkNjNmZTQ4ZGFlNWE0OGMxYWFmNGFjZWEwMWYyNDFhZmVhZDQyOTZjODFlNDE0Njhk';
$headr[] = 'ndermarrjaserver: Albamedia';
$headr[] = 'Accept: application/json';

$rawData4 ='{"cmime":[{"MARRE":"1\\/1\\/1990","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","KODARTIKULLI":"","CMIMI":"","CMIMI2":""}]}';

//Settings cURL Option`
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData4);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ekzektuimi

$result = curl_exec($ch);
//$json = file_get_contents($result);
$obj = json_decode($result,true);
//
//echo "<pre>";
//print_r($obj);
//echo "</pre>";

foreach($obj['entiteteTeReja']['cmimeReja']as $x){

    switch ($x['KODNIVELCMIMI']){

        case 'N1': $mysqli->query("INSERT INTO gjendjeDataTable (KODARTIKULLI, C1) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C1 = ".$x['CMIMI']." ");
            break;
        case 'N2': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C2) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C2 = ".$x['CMIMI']." ");
            break;
        case 'N3': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C3) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C3 = ".$x['CMIMI']." ");
            break;
        case 'N4': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C4) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C4 = ".$x['CMIMI']." ");
            break;
        case 'N5': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C5) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C5 = ".$x['CMIMI']." ");
            break;
        case 'N6': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C6) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C6 = ".$x['CMIMI']." ");
            break;
        case 'N7': $mysqli->query("INSERT INTO cmimedatatable (KODARTIKULLI, C0) VALUES ('".$x['KODARTIKULLI']."',".$x['CMIMI'].") ON DUPLICATE KEY UPDATE C0 = ".$x['CMIMI']." ");
            break;
        default:
            break;
    }

}
//Mbyllja
curl_close($ch);
?>
