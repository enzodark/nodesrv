<?php
ini_set('max_execution_time', 300);
//Inicializimi

$mysqli = new mysqli("localhost","root","","nodesrv");
if($mysqli->connect_errno){
    http_response_code(500);
    exit;
}
echo 'Connected successfully';

$url = "http://80.78.76.160:3050/cmimiPost" ;
//$url = "http://192.168.1.30:3050/artikujPost" ;
$ch = curl_init($url);

//Parametrat Header
$headr = array();
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Basic ZGVtb3M1NjpkN2MwOGE3NDM2YTAxZWFkNjNmZTQ4ZGFlNWE0OGMxYWFmNGFjZWEwMWYyNDFhZmVhZDQyOTZjODFlNDE0Njhk';
$headr[] = 'ndermarrjaserver: Albamedia';
$headr[] = 'Accept: application/json';

//RawData To Send
//$rawData ='{"art":[{"MARRE":"1\\/1\\/1990","NRSEL":15,"NRCHUNK":0,"PERDORUES":""}]}';
//$rawData2 ='{"art":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';
//$rawData3='{"artikujGjendje":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","MAGKODI":"","KODARTIKULLI":"","ARTBARKOD":"","DETAJIM1":"","DETAJIM2":""}]}';
$rawData4 ='{"cmime":[{"MARRE":"1\\/1\\/1990","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","KODARTIKULLI":"","CMIMI":"","CMIMI2":""}]}';

//Settings cURL Option
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData4);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ekzektuimi

$result = curl_exec($ch);
//$json = file_get_contents($result);
$obj = json_decode($result,true);

foreach($obj['entiteteTeReja']['cmimeReja'] as $key => $x){

	$query = "SELECT COUNT(*) AS nr FROM cmimedatatable WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
	$result = $mysqli->query($query);

	if($nr == 1){
		if($x['KODNIVELCMIMI'] == 'N1'){
			$query = "UPDATE cmimedatatable SET C1 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
		else if($x['KODNIVELCMIMI'] == 'N2'){
			$query = "UPDATE cmimedatatable SET C2 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
		else if($x['KODNIVELCMIMI'] == 'N3'){
			$query = "UPDATE cmimedatatable SET C3 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
		else if($x['KODNIVELCMIMI'] == 'N4'){
			$query = "UPDATE cmimedatatable SET C4 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
		else if($x['KODNIVELCMIMI'] == 'N5'){
			$query = "UPDATE cmimedatatable SET C5 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
		else if($x['KODNIVELCMIMI'] == 'N6'){
			$query = "UPDATE cmimedatatable SET C6 = ".$x['CMIMI']." WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
		}
	}else if($nr == 0){
		if($x['KODNIVELCMIMI'] == 'N1'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',".$x['CMIMI'].",0,0,0,0,0)";
		}
		else if($x['KODNIVELCMIMI'] == 'N2'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',0,".$x['CMIMI'].",0,0,0,0)";
		}
		else if($x['KODNIVELCMIMI'] == 'N3'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',0,0,".$x['CMIMI'].",0,0,0)";
		}
		else if($x['KODNIVELCMIMI'] == 'N4'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',0,0,0,".$x['CMIMI'].",0,0)";
		}
		else if($x['KODNIVELCMIMI'] == 'N5'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',0,0,0,0,".$x['CMIMI'].",0)";
		}
		else if($x['KODNIVELCMIMI'] == 'N6'){
			$query = "INSERT INTO cmimedatatable(KODARTIKULLI, C1,C2, C3, C4, C5, C6) VALUES('".$x['KODARTIKULLI']."',0,0,0,0,0,".$x['CMIMI'].")";
		}
	}

  	$mysqli->query($query);

}

curl_close($ch);
?>
