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
    if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    exit;
    }
    $idgen=$_SESSION['idgen'];
        $sql = "SELECT * FROM `worktogether` WHERE idgen='$idgen';";
        $result=mysqli_query($conn,$sql); 
        $num=mysqli_num_rows($result);
        if($num==1)
  {
        $data=mysqli_fetch_assoc($result);
        $output=$data["code"];
        echo $output ;
  }
    
}

?>