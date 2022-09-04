<?php

$servername="localhost";
$username="root";
$serverpassword="1234";
$databasename="condacode";

$conn=mysqli_connect($servername,$username,$serverpassword,$databasename);
if(!$conn)
{
    echo "connection unsuccessful";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    session_start(); 
    $username=$_SESSION["name"];
    try {
        $sql = "DELETE FROM `code` WHERE username='$username' AND filename='untitled';";
        $result=mysqli_query($conn,$sql); 
        $output=' ';
        echo $output;
    } catch (Exception $e) {
        
    }
   
    
}

?>