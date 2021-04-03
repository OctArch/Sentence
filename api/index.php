<?php

if(!file_exists('./config/database.php') || !file_exists('../config/siteinfo.php'))
{
    if(!file_exists('../config/database.php') && !file_exists('../config/siteinfo.php'))
        header("Location: /install");
    else
    {
        if(!file_exists('../config/database.php') && file_exists('../config/siteinfo.php'))
            echo '找不到 siteinfo.php ，请删除站点目录中的 config 文件夹并重新安装<br>';
        if(file_exists('../config/database.php') && !file_exists('../config/siteinfo.php'))
            echo '找不到 database.php ，请删除站点目录中的 config 文件夹并重新安装<br>';
    }
    
}
    include '../config/database.php';
    include '../config/siteinfo.php';
    
    $encode = $_GET["encode"];
    
    if($encode!="json"&& $encode!="text" && $encode!="js" && $encode!="help")
    $encode='json';
    
    $conn = mysqli_connect($dbhost, $dbname, $dbpasswd , $dbname);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sentencedatabase = $dbprefix . 'sentence';
    
    $a = mysqli_select_db($conn,$sentencedatabase);
    
    $result = mysqli_query($conn,"SELECT * FROM ".$sentencedatabase." order by rand() limit 1");
    if($encode=="json")
        include "json.php";
    if($encode=="text")
        include "text.php";
    if($encode=="js")
        include "js.php";
    
    if($encode == 'help')
        include 'help.php';
    
    mysqli_close($conn);


?>