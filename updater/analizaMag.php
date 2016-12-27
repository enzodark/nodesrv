<?php
include '../database/db.php';
session_start();

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

$analiza = $mysqli->query("SELECT
datatable.KODARTIKULLI as KODI,
datatable.PERSHKRIMARTIKULLI AS PERSHKRIMI,
datatable.GRUPI AS GRUPI,
datatable.NENGRUPI AS NENGRUPI,
datatable.KODBARI AS KODBARI,
Sum(gjendjedatatable.MQ + gjendjedatatable.MK) AS Gjendja,
gjendjedatatable.MD AS Dogana,
cmimedatatable.C0 AS C0,
cmimedatatable.C1 AS C1,
cmimedatatable.C2 AS C2,
cmimedatatable.C3 AS C3,
cmimedatatable.C4 AS C4,
cmimedatatable.C5 AS C5,
cmimedatatable.C6 AS C6
FROM
gjendjedatatable
INNER JOIN datatable ON datatable.KODARTIKULLI = gjendjedatatable.KODARTIKULLI
INNER JOIN cmimedatatable ON datatable.KODARTIKULLI = cmimedatatable.KODARTIKULLI
GROUP BY gjendjedatatable.KODARTIKULLI");

//create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($analiza))
    {
        $emparray[] = $row;
    }
echo json_encode($emparray);

