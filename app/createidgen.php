<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$db="condacode";

// Create connection
$conn =new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $random = substr(md5(mt_rand()), 0, 7);
    $sql = "INSERT INTO `worktogether` ( `idgen`, `code`) VALUES ('$random', '  ')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $output=$random;
            echo $output;
        }

}
    
?>
