<?php
    
    //$dbServername = "sql308.epizy.com";
    //$dbUsername = "epiz_21684013";
    //$dbName = $username."_anme";
    //$dbPassword = "tX9dARlo8BIz";

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "AnMe";
    try{
        //create connection
        $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    } catch(Exception $e){
        echo $sql . "<br>" . $e->getMessage();
    }
?>