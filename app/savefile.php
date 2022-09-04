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
    $filename= $_POST["filename"];
    $code= $_POST["code"];
    $username=$_SESSION["name"];

    $insertionquery="SELECT * FROM `code` WHERE username='$username' AND filename='$filename';";
  $result=mysqli_query($conn,$insertionquery); 
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    
        $sql = "UPDATE `code` SET `code` = '$code' WHERE `username` = '$username' AND `filename` = '$filename'";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $output=$code;
            echo $output;
  }
}
else{
        $sql = "INSERT INTO `code` ( `username`, `code`, `filename`) VALUES ('$username', '$code', '$filename')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $output=$code;
            $_SESSION['filename']="untitled";
            echo $output;
        }
     
}
}

?>