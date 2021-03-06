<?php
include '/database/db.php';
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
cmimedatatable.C6 AS C6,
CONCAT (datatable.imazhi,datatable.KODARTIKULLI,'.jpg') AS IMAZHI
FROM
gjendjedatatable
INNER JOIN datatable ON datatable.KODARTIKULLI = gjendjedatatable.KODARTIKULLI
INNER JOIN cmimedatatable ON datatable.KODARTIKULLI = cmimedatatable.KODARTIKULLI
GROUP BY gjendjedatatable.KODARTIKULLI");

$value1 = $mysqli->query("SELECT
Sum(gjendjedatatable.MQ + gjendjedatatable.MK) AS gjendjaTOTALE
FROM
gjendjedatatable
");
$gjendjaTotale = mysqli_fetch_assoc($value1);

$value2 = $mysqli->query("SELECT
Sum(gjendjedatatable.MD) AS gjendjaDogana
FROM
gjendjedatatable
");

$gjendjaDogana = mysqli_fetch_assoc($value2);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Analiza e magazines</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- DataTable -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Albamedia</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="list-group">
  <a href="analizaMag.php" class="list-group-item">Analiza e magazines</a>
  <a href="listeCmimesh.php" class="list-group-item">Liste Cmimesh</a>
  <a href="logout.php" class="list-group-item">Logout</a>
</div>

            </div>
            <div class="col-lg-12">
<table class="table table-striped table-bordered table-condensed" id="analizaTable">
    <thead>
        <tr>
            <th>IMAZH</th>
            <th>KODI</th>
            <th>PERSHKRIMI</th>
            <th>GRUPI</th>
            <th>NENGRUPI</th>
            <th>KODBARI</th>
            <th>GJENDJA</th>
            <th>DOGANA</th>
            <th>C0</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
        </tr>
    </thead>
    <tfoot>
                <tr>
            <th>IMAZH</th>
            <th>KODI</th>
            <th>PERSHKRIMI</th>
            <th>GRUPI</th>
            <th>NENGRUPI</th>
            <th>KODBARI</th>
            <th><?php echo $gjendjaTotale['gjendjaTOTALE']; ?> <br/> GJEDNJA TOTALE </th>
            <th> <?php echo $gjendjaDogana['gjendjaDogana']; ?> <br/> DOGANA </th>
            <th>C0</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($analiza)){   //Creates a loop to loop through results
echo "<tr><td><img height='40' width='40' src=". $row['IMAZHI']. "></td><td>" . $row['KODI'] . "</td><td>" . $row['PERSHKRIMI'] . "</td><td>" . $row['GRUPI'] . "</td><td>" . $row['NENGRUPI'] . "</td><td>" . $row['KODBARI'] . "</td><td>" . $row['Gjendja'] . "</td><td>" . $row['Dogana'] . "</td><td>" . $row['C0'] . "</td><td>" . $row['C1'] . "</td><td>" . $row['C2'] . "</td><td>" . $row['C3'] . "</td><td>" . $row['C4'] . "</td><td>" . $row['C5'] . "</td><td>" . $row['C6'] . "</td></tr>";  //$row['index'] the index here is a field name
}
?>
    </tbody>
</table>
            </div>
        </div>
    </div>

    <!-- Script executed on the table -->
    <script>
    $('#analizaTable').dataTable({
        dom: 'B<"clear">lfrtip',
    buttons: [ 'copy', 'csv']
    } );
    </script>

  </body>
</html>

