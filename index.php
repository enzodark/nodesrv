<?php
//ini_set('max_execution_time', 300);

//Inicializimi
$url = "http://192.168.1.30:3050/artikujPost" ;
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
//$rawData3='{"artikujGjendje":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"","MAGKODI":"","KODARTIKULLI":"","ARTBARKOD":"","DETAJIM1":"","DETAJIM2":""}]}';
//$rawData4 ='{"cmime":[{"MARRE":"1\\/1\\/2015","NRSEL":100,"NRCHUNK":0,"PERDORUES":"",""}]}';


//Settings cURL Option
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ekzektuimi
$result = curl_exec($ch);
//$json = file_get_contents($result);
$obj = json_decode($result,true);

//$kodi= $obj['entiteteTeReja']['artRi']['0']['KODARTIKULLI'];
//$pershkrimArtikulli= $obj['entiteteTeReja']['artRi']['0']['PERSHKRIMARTIKULLI'];
//$njesia= $obj['entiteteTeReja']['artRi']['0']['KODNJESIA1'];

echo "<pre>";
print_r($obj);
echo "</pre>";

//foreach($obj as $lista){
//    foreach()
//}
//adding Some comments


//Mbyllja
curl_close($ch);
?>
