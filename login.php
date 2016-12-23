<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <p><br/><br/><br/></p>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="panel panel-default">
               <div class="panel-body">

                        <?php

                   include '/database/db.php';


                   if(isset($_POST['username']) && isset($_POST['password'])){

                       $username = $_POST['username'];
                       $password = $_POST['password'];
                       $stmt = $mysqli->query("SELECT * FROM users WHERE uname='$username' AND password = '$password'");

                       $row = $stmt->fetch_assoc();
                       $user = $row['uname'];
                       $pass = $row['password'];
                       $id = $row['ID'];
                       $type = $row['type'];
                       $emri = $row['firstName'];

                       if($username == $user && $password == $pass){
                           session_start();
                           $_SESSION['username'] = $user;
                           $_SESSION['password'] = $pass;
                           $_SESSION['id'] = $id;
                           $_SESSION['type'] = $type;
                           $_SESSION['firstName'] = $emri;
                           ?>
                           <script>window.location.href='index.php'</script>
                           <?php
                       }

                       else{ ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>GABIM!</strong>Username ose password eshte i gabuar.
                        </div>
                          <?php

                       }
                   }
                   ?>
                         <form method="post">
                             <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" class="form-control" name="username"/>
                             </div>
                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" class="form-control" name="password"/>
                             </div>
                             <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
                         </form>

               </div>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
