<?php
//ini_set('max_execution_time', 300);
//Inicializimi

$link = mysqli_connect('localhost', 'root', '','nodesrv');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';

$url = "http://80.78.76.160:3050/artikujPost" ;
//$url = "http://192.168.1.30:3050/artikujPost" ;
$ch = curl_init($url);

//Parametrat Header
$headr = array();
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Basic ZGVtb3M1NjpkN2MwOGE3NDM2YTAxZWFkNjNmZTQ4ZGFlNWE0OGMxYWFmNGFjZWEwMWYyNDFhZmVhZDQyOTZjODFlNDE0Njhk';
$headr[] = 'ndermarrjaserver: Albamedia';
$headr[] = 'Accept: application/json';

//RawData To Send
$rawData ='{"art":[{"MARRE":"1\\/1\\/1990","NRSEL":15,"NRCHUNK":0,"PERDORUES":""}]}';
//$rawData2 ='{"art":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';
//$rawData3='{"artikujGjendje":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","MAGKODI":"","KODARTIKULLI":"","ARTBARKOD":"","DETAJIM1":"","DETAJIM2":""}]}';
//$rawData4 ='{"cmime":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';


//Settings cURL Option
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Ekzektuimi

$result = curl_exec($ch);
//$json = file_get_contents($result);
$obj = json_decode($result,true);

echo "<pre>";
print_r($obj);
echo "</pre>";

//foreach($lista as $x=> $x_value)

//$stmt = $link->prepare("INSERT INTO DATATABLE2 VALUES (?,?,?,?,?,?,?,?,?,?)");
foreach($obj['entiteteTeReja']['artRi'] as $x){
        $sql = "INSERT INTO DATATABLE(KODARTIKULLI,
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
GARANCIA
) VALUES ('".$x["KODARTIKULLI"]."','".$x["PERSHKRIMARTIKULLI"]."','".$x["PERSHKRIMIANGARTIKULLI"]."','".$x["KODNJESIA1"]."','".$x["KODNJESIA2"]."','".$x["KOEFICENTARTIKULLI"]."','".$x["MAGAZINA"]."','".$x["AKTIV"]."','".$x["KLASA"]."','".$x["GRUPI"]."','".$x["NENGRUPI"]."','".$x["TVSHKODI"]."','".$x["VENDODHJEARTIKULLI"]."','".$x["PERSHKRIMI"]."','".$x["IMAZH"]."','".$x["VLERATVSH"]."','".$x["KODIDOGANORARTIKULLI"]."','".$x["ARTREF"]."','".$x["KODIFIKIMARTIKULLI"]."','".$x["KODIFIKIMARTIKULLI2"]."','".$x["DTMODIFIKIM"]."','".$x["IDSTATUSDOK"]."','".$x["PERPESHORE"]."','".$x["LLOJGARANCIA"]."','".$x["GARANCIA"]."')";

       $success = mysqli_query($link,$sql);
        if(!$success) {
          die("Query error: " . mysqli_error($link));
        }
}
//Mbyllja
curl_close($ch);
?>
