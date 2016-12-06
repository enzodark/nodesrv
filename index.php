<?php
//ini_set('max_execution_time', 300);

//Inicializimi
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
$rawData2 ='{"art":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';
$rawData3='{"artikujGjendje":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","MAGKODI":"","KODARTIKULLI":"","ARTBARKOD":"","DETAJIM1":"","DETAJIM2":""}]}';
//$rawData4 ='{"artikujGjendje":[{"MARRE":"1/1/1900","NRSEL":0,"NRCHUNK":0,"PERDORUES":""}]}';


//Settings cURL Option
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData2);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ekzektuimi
$result = curl_exec($ch);
//$json = file_get_contents($result);
$obj = json_decode($result,true);


foreach($obj['entiteteTeReja']['artikujGjendjeRi'] as $lista){
    foreach($lista as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
}

foreach($obj['entiteteTeReja']['artRi'] as $lista){
    foreach($lista as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
}

include 'db.php';
$st = mysqli_prepare($link, 'INSERT INTO dataTable (KODARTIKULLI,
PERSHKRIMARTIKULLI,
PERSHKRIMIANGARTIKULLI,
KODNJESIA1,
KODNJESIA2,
KOEFICENTARTIKULLI,
MAGAZINA,
AKTIV,
KLASA,
GRUPI,
NENGRUPI,
TVSHKODI,
VENDODHJEARTIKULLI,
PERSHKRIMI,
IMAZH,
VLERATVSH,
KODIDOGANORARTIKULLI,
ARTREF,
KODIFIKIMARTIKULLI,
KODIFIKIMARTIKULLI2,
DTMODIFIKIM,
IDSTATUSDOK,
PERPESHORE,
LLOJGARANCIA,
GARANCIA,
) VALUES (?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?)');


//Mbyllja
curl_close($ch);
?>
