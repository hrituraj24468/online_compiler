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
    $code= $_POST["code"];
    $idgen=$_SESSION["idgen"];

    $insertionquery="SELECT * FROM `worktogether` WHERE idgen='$idgen';";
  $result=mysqli_query($conn,$insertionquery); 
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    
        $sql = "UPDATE `worktogether` SET `code` = '$code' WHERE `idgen` = '$idgen'";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $output=$code;
            echo $output;
  }
}
else{
        $sql = "INSERT INTO `worktogether` ( `idgen`, `code`) VALUES ('$idgen', '$code')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $output=$code;
            echo $output;
        }
     
}
}

?>