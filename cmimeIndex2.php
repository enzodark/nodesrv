
<?php

foreach($obj['entiteteTeReja']['cmimeReja'] as $key => $x){

	$query = "SELECT COUNT(*) AS ".$nr." FROM cmimedatatable WHERE KODARTIKULLI = '".$x['KODARTIKULLI']."' ";
	$result = $mysqli->query($query);

    if( $nr == 1){
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
	}
	else if ( $nr == 0){
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
