<?php
include '/database/db.php';
session_start();

if(!isset($_SESSION['username'])){
    header('Location: login.php');

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Perdoruesit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- jQuery -->

    <!-- DataTable -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/fc-3.2.2/fh-3.1.2/r-2.1.0/datatables.min.js"></script>
    <scirpt type="text/javascript" src="custom/custom.js" ></scirpt>
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
  <a href="perdoruesit.php" class="list-group-item">Menaxhimi i perdoruesve</a>
  <a href="listeCmimesh.php" class="list-group-item">Liste Cmimesh</a>
  <a href="logout.php" class="list-group-item">Logout</a>
</div>

            </div>
            <div class="col-lg-12">

               <button class="btn - btn-default pull pull-right" data-toggle="modal" data-target="#shtoPerdorues" id="shtoPerdoruesModalBtn">
               <span class="glyphicon glyphicon-plus"></span>  Shto Perdorues</button>

                <table class="table table-striped table-bordered table-condensed" id="userTable">
                   <br />
                   <br />
                   <br />
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Emri</th>
                            <th>Mbiemri</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Roli</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Emri</th>
                            <th>Mbiemri</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Roli</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="shtoPerdorues">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Shto Perdorues</h4>
      </div>
      <div class="modal-body">
      <div class="message"></div>
<div class="form-group">
 <form action="phpAction/create.php" method="post" id="shtoPerdoruesForm">
  <div class="form-group">
    <label for="name">Emri</label>
    <input type="name" class="form-control" name="firstName" id="firstName" placeholder="Emri">
  </div>
   <div class="form-group">
    <label for="Mbiermi">Mbiemri</label>
    <input type="name" class="form-control" name="lastName" id="lastName" placeholder="Mbiemri">
  </div>
   <div class="form-group">
    <label for="Username">Username</label>
    <input type="name" class="form-control" name="userName" id="userName" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="type">Roli</label>
    <select name="roli" id="type">
        <option value="">Zgjidhni</option>
        <option value="Administrator">Administrator</option>
        <option value="anetar">Anetar</option>
    </select>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
      </div><!-- /.form-group -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <!-- Script executed on the table -->
<script>
     $("#userTable").dataTable();
      </script>
      <script type="text/javascript" src="custom/custom.js"></script>
  </body>
</html>
