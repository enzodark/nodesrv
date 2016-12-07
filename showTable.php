<?php
require 'db.php';


       $query = "SELECT
datatable.KODARTIKULLI,
datatable.PERSHKRIMARTIKULLI,
datatable.PERSHKRIMIANGARTIKULLI,
datatable.KODNJESIA1,
datatable.KODNJESIA2,
datatable.KOEFICENTARTIKULLI,
datatable.MAGAZINA,
datatable.GRUPI,
datatable.NENGRUPI,
datatable2.KODI,
datatable2.gjendje,
datatable2.DETAJIM1,
datatable2.DETAJIM2,
datatable2.cmimibaze,
datatable2.BARKOD,
datatable.AKTIV
FROM
datatable
INNER JOIN datatable2 ON datatable.KODARTIKULLI = datatable2.KODARTIKULLI";

        $result = mysqli_query($link,$query);

$shumaGjendje = "SELECT Sum(datatable2.gjendje) FROM datatable2 ";

 $result2 = mysqli_query($link,$shumaGjendje);
    echo mysql_result($shumaGjendje, 0);


?>
<html>
    <head></head>
    <body>
        <table>
    <thead>
        <tr>
            <th>Kodi</th>
            <th>Pershrkimi</th>
            <th>Pershkrimi 2</th>
            <th>KODNJESIA1</th>
            <th>KODNJESIA2</th>
            <th>KOEFICENTARTIKULLI</th>
            <th>MAGAZINA</th>
            <th>GRUPI</th>
            <th>NENGRUPI</th>
            <th>KODI</th>
            <th>gjendje</th>
            <th>DETAJIM1</th>
            <th>DETAJIM2</th>
            <th>cmimibaze</th>
            <th>BARKOD</th>
            <th>AKTIV</th>
                    </tr>
    </thead>

    <tbody>
    <?php

            while($infoItems = $result->fetch_array()){
                echo    "
                            <tr>
                                <td>".$infoItems['KODARTIKULLI']."</td>
                                <td>".$infoItems['PERSHKRIMARTIKULLI']."</td>
                                <td>".$infoItems['PERSHKRIMIANGARTIKULLI']."</td>
                                <td>".$infoItems['KODNJESIA1']."</td>
                                <td>".$infoItems['KODNJESIA2']."</td>
                                <td>".$infoItems['KOEFICENTARTIKULLI']."</td>
                                <td>".$infoItems['MAGAZINA']."</td>
                                <td>".$infoItems['GRUPI']."</td>
                                <td>".$infoItems['NENGRUPI']."</td>
                                <td>".$infoItems['KODI']."</td>
                                <td>".$infoItems['gjendje']."</td>
                                <td>".$infoItems['DETAJIM1']."</td>
                                <td>".$infoItems['DETAJIM2']."</td>
                                <td>".$infoItems['cmimibaze']."</td>
                                <td>".$infoItems['BARKOD']."</td>
                                <td>".$infoItems['AKTIV']."</td>
                            </tr>
                        ";

            }
        ?>
     </tbody>
    </table>
    </body>
</html>
