<?php
include '/database/db.php';
session_start();

if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

//$analiza = $mysqli->query("SELECT
//datatable.KODARTIKULLI as KODI,
//datatable.PERSHKRIMARTIKULLI AS PERSHKRIMI,
//datatable.GRUPI AS GRUPI,
//datatable.NENGRUPI AS NENGRUPI,
//datatable.KODBARI AS KODBARI,
//Sum(gjendjedatatable.MQ + gjendjedatatable.MK) AS Gjendja,
//gjendjedatatable.MD AS Dogana,
//cmimedatatable.C0 AS C0,
//cmimedatatable.C1 AS C1,
//cmimedatatable.C2 AS C2,
//cmimedatatable.C3 AS C3,
//cmimedatatable.C4 AS C4,
//cmimedatatable.C5 AS C5,
//cmimedatatable.C6 AS C6
//FROM
//gjendjedatatable
//INNER JOIN datatable ON datatable.KODARTIKULLI = gjendjedatatable.KODARTIKULLI
//INNER JOIN cmimedatatable ON datatable.KODARTIKULLI = cmimedatatable.KODARTIKULLI
//GROUP BY gjendjedatatable.KODARTIKULLI");
//
////create an array
//    $emparray = array();
//    while($row =mysqli_fetch_assoc($analiza))
//    {
//        $emparray[] = $row;
//    }
//$tempdata = json_encode($emparray);

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
        <!-- Tabulator -->
    <link href="assets/tabulator/tabulator.css" rel="stylesheet">
    <script type="text/javascript" src="assets/tabulator/tabulator.js"></script>

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
            <div class="col-xs-2">
                <div class="list-group">
  <a href="analizaMag.php" class="list-group-item">Analiza e magazines</a>
  <a href="logout.php" class="list-group-item">Logout</a>
</div>

            </div>
            <div class="col-xs-10">
   <div id="analizaTable">
        </div>

           <div id="example-table">
        </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<script>
     $("#analizaTable").tabulator({
    height:"311px",
    sortable: true,
    ajaxURL:"updater/analizaMag.php",
    columns:[
        {title:"Kodi", field:"name"},
        {title:"Pershkrimi", field:"name"},
        {title:"Grupi", field:"name"},
        {title:"Nengrupi", field:"name"},
        {title:"Kodbari", field:"name"},
        {title:"Gjendja", field:"name"},
        {title:"GjendjaDogane", field:"name"},
        {title:"C0", field:"name"},
        {title:"C1", field:"name"},
        {title:"C2", field:"name"},
        {title:"C3", field:"name"},
        {title:"C4", field:"name"},
        {title:"C5", field:"name"},
        {title:"C6", field:"name"},
    ],
});
      </script>
  </body>
</html>

