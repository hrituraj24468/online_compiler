
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Codeboard Online IDE</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <div class="header"> <div class="Name" style="text-align: left;">CondaCode</div> 

    <?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location:index.php");
}

else
    {
        echo '<div class="login" style="text-align: right;">Welcome , '.$_SESSION['name'].'</div>
        <div class="logout" style="text-align: right;"><a href="logout.php"> <button type="button" style="font-size: 16px; background-color: #f44336; "> Logout!</button> </a></div>';

    }

?>

    
    </div>
    <div class="control-panel">
    <?php

?>
        Select Language:
        &nbsp; &nbsp;
        <select id="languages" class="languages" onchange="changeLanguage()">
            <option value="c"> C </option>
            <option value="cpp"> C++ </option>
            <option value="php"> PHP </option>
            <option value="python"> Python </option>
            <option value="node"> Node JS </option>
        </select>
    
        <div class="panel" style="float: left; padding-left: 5px;">
        <button class="bttn" onclick="newfile()"><i class="fas fa-folder"></i>  Open File</button>
        <button class="bttn" onclick="newfile()"><i class="fas fa-file"></i>  New File</button>
        <button class="bttn" onclick="savefile()"><i class="fas fa-save"></i>  Save</button>
        <button class="bttn" onclick="newfile()"><i class="fas fa-share"></i>  Share</button>
        <a href="index.php"><button class="bttn" onclick="newfile()"><i class="fas fa-user"></i>  Normal Mode</button></a>
<?php
        if(!isset($_SESSION['idgen'])){
    echo '<button class="bttn" onclick="createidgen()" style="margin-left: 85px;"><i class="fas fa-folder"></i>  Create</button>
    <button class="bttn" onclick="joinidgen()" style="margin-left: 5px;"><i class="fas fa-user"></i>  Join</button>';

}

else
    {
        echo '<h3 class="bttn" style="margin-right: 85px; float: left;"> '.$_SESSION['idgen'].'</h3>
        <button class="bttn" onclick="pushidgen()" style="margin-left: 85px;"><i class="fas fa-save"></i>  Push</button>';

    }

?>
  
    </div>
    
    </div>
    <div class="editor" id="editor"></div>

    <div class="button-container">
        <button class="btn" onclick="executeCode()"> Run </button>
    </div>

    <div class="output"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/lib/ace.js"></script>
    <script src="js/lib/theme-monokai.js"></script>
    <script src="js/ide3.js"></script>
    <script src="js/ide2.js"></script>


</body>
</html>