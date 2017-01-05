<?php
require '../database/db.php';


if($_POST){

    $validator = array('success' => false, 'message' => array());

    $emri = $_POST['firstName'];
    $mbiermi = $_POST['lastName'];
    $username = $_POST['userName'];
    $password = $_POST['password'];
    $roli = $_POST['roli'];

    $sql = "INSERT INTO users SET firstName = '$emri', lastName='$mbiermi', uName='$username', password='$password', type= '$roli'";
    $query = $mysqli->query($sql) or die(mysqli_error($mysqli));

    if($query === TRUE){
        $validator['success'] = true;
        $validator['message'] = 'Perdoruesi u shtua';

    }
    else{
        $validator['success'] = true;
        $validator['message'] = 'Perdoruesi nuk u shtua, ka nje gabim';
    }
    echo json_encode($validator);
}
