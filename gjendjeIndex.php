<?php
//ini_set('max_execution_time', 300);
//Inicializimi

$link = mysqli_connect('localhost', 'root', '','nodesrv');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';

$url = "http://80.78.76.160:3050/entitetePost" ;
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
$rawData3='{"artikujGjendje":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","MAGKODI":"","KODARTIKULLI":"","ARTBARKOD":"","DETAJIM1":"","DETAJIM2":""}]}';
//$rawData4 ='{"cmime":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';

//Settings cURL Option
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ekzektuimi
$result = curl_exec($ch);
$obj = json_decode($result,true);

echo "<pre>";
print_r($obj);
echo "</pre>";


//Mbyllja
curl_close($ch);
?>
