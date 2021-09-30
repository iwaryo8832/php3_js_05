<?php

    // mysqlとのコネクションを確率
    $con = mysqli_connect('localhost','root','root','unityaccess');

    if(mysqli_connect_errno())
    {
        echo "1:Connection failed";
        exit();
    }

    $username = $_POST["name"];
    $newscore = $_POST["score"];

    $namecheckquery = "SELECT username FROM players WHERE username='".$username."';";

    $namecheck = mysqli_query($con,$namecheckquery) or die ("2:Name check query failed");

    if(mysqli_num_rows($namecheck)!=1)
    {
        echo "5:Either no user name, or more than one";
        exit();
    }

    $updatequery = "UPDATE players SET score = ". $newscore . " WHERE username = '" . $username . "';";
    mysqli_query($con, $updatequery) or die ("7:Save query failed"); //error code

    echo "0";




?>
