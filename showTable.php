<?php
require 'db.php';

       $query ="SELECT
	datatable.KODARTIKULLI as KODI,
	datatable.PERSHKRIMARTIKULLI as PERSHKRIMI,
	datatable.KODNJESIA1 as NJESIA,
	datatable.KODNJESIA2 as NJESIA 2,
	datatable.AKTIV as AKTIV,
	datatable.GRUPI as GRUPI,
	datatable.NENGRUPI as NENGRUPI,
	datatable.KODBARI as KODBARI,
	datatable.VENDODHJEARTIKULLI as VENDODHJE,
	gjendjedatatable.MD as GjendjeDogane,
	cmimedatatable.C1 as C1,
	cmimedatatable.C2 as C2,
	cmimedatatable.C3 as C3,
	cmimedatatable.C4 as C4,
	cmimedatatable.C5 as C5,
	cmimedatatable.C6 as C6,
	cmimedatatable.C0 as C0,
SUM(gjendjedatatable.MQ+gjendjedatatable.MK) AS Gjendja
FROM
	cmimedatatable
INNER JOIN datatable ON cmimedatatable.KODARTIKULLI = datatable.KODARTIKULLI
INNER JOIN gjendjedatatable ON datatable.KODARTIKULLI = gjendjedatatable.KODARTIKULLI
AND gjendjedatatable.KODARTIKULLI = cmimedatatable.KODARTIKULLI
GROUP BY gjendjedatatable.KODARTIKULLI";

$result = $mysqli->query($query);

?>
<html>
    <head>
       <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>

    </head>
    <body>
        <table>
    <thead>
        <tr>
        <th>KODI</th>
        <th>PERSHKRIMI</th>
        <th>NJESIA</th>
        <th>NJESIA</th>
        <th>AKTIV</th>
        <th>GRUPI</th>
        <th>NENGRUPI</th>
        <th>KODBARI</th>
        <th>VENDODHJE</th>
        <th>GjendjeDogane</th>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th>C5</th>
        <th>C6</th>
        <th>C0</th>
        <th>Gjendja</th>
                    </tr>
    </thead>
        <tfooter>
        <tr>
            <th>KODI</th>
            <th>PERSHKRIMI</th>
            <th>NJESIA</th>
            <th>NJESIA</th>
            <th>AKTIV</th>
            <th>GRUPI</th>
            <th>NENGRUPI</th>
            <th>KODBARI</th>
            <th>VENDODHJE</th>
            <th>GjendjeDogane</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>C0</th>
            <th>Gjendja</th>
                    </tr>
    </tfooter>

    <tbody>
    <?php


            while($infoItems = mysql_fetch_row($result)){
                echo    "
                            <tr>
                                <td>".$infoItems['KODI']."</td>
                                <td>".$infoItems['PERSHKRIMI']."</td>
                                <td>".$infoItems['NJESIA']."</td>
                                <td>".$infoItems['NJESIA 2']."</td>
                                <td>".$infoItems['AKTIV']."</td>
                                <td>".$infoItems['GRUPI']."</td>
                                <td>".$infoItems['NENGRUPI']."</td>
                                <td>".$infoItems['KODBARI']."</td>
                            </tr>
                        ";
            }
        ?>
     </tbody>
    </table>
    </body>
</html>

