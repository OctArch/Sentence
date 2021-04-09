<?php
$dbname = $_POST['dbname'];
$dbpasswd = $_POST['dbpasswd'];
$dbuser = $_POST['dbuser'];
$dbprefix = $_POST['dbprefix'];
$dbhost = $_POST['dbhost'];

$sitename = $_POST['sitetitle'];
$describe = $_POST['describe'];

$adminname = $_POST['adminusername'];
$adminpasswd = $_POST['adminpasswd'];

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sqlsentence = $dbprefix . 'sentence';
$sqluser = $dbprefix . 'user';

if($con)
{
    $test1 = "SELECT * FROM ".$sqlsentence;
    $test2 = "SELECT * FROM ".$sqluser;
    if(mysqli_query($con,$test1) && mysqli_query($con,$test2))
    {
        echo "A Sentence 数据库: ".$sqlsentence.' & '.$sqluser." 已创建<br>如想在同一数据库内创建多个站点，请更改表前缀";
        echo '<meta http-equiv="refresh" content = "5;url=../">';
        
    }
    else
    {
        $sql1 = "CREATE TABLE ".$sqlsentence." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
author VARCHAR(30) NOT NULL,
creator VARCHAR(30) NOT NULL,
text VARCHAR(21775),
reg_date TIMESTAMP
)";
        $sql2 = "CREATE TABLE ".$sqluser." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
passwd VARCHAR(45) NOT NULL,
usergroup VARCHAR(30)
)";

$sql3 = "INSERT INTO ".$sqlsentence." (creator, author, text)
VALUES ('A Sentence','A Sentence','Welcome To A Sentence')";

        

        mysqli_query($con,$sql1);
        mysqli_query($con,$sql2);
        mysqli_query($con, $sql3);
        if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2)) {
            $com=1;
        } else {
            echo "创建数据表错误: " . $con->error;
        }
        
        mkdir("../config/");
        
        touch("../config/database.php");
        $CONFIGfile = fopen("../config/database.php", "w");
        $txt = (
            "<?php\n"
.'$dbhost = "'.$dbhost."\";
".'$dbname = "'.$dbname."\";
".'$dbuser = "'.$dbuser."\";
".'$dbpasswd = "' .$dbpasswd . "\";
".'$dbprefix = "'. $dbprefix."\";
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);
        
        touch("../config/siteinfo.php");
        $CONFIGfile = fopen("../config/siteinfo.php", "w");
        $txt = (
            "<?php\n"
.'$sitename = "'.$sitename."\";//The Title Of WebSite\n"
.'$describe = "'.$describe."\";//The Describe Of WebSite\n"
.'$tg = "'."\";//Contribute Link\n"
.'$keyword = "'."\";//KeyWord"."
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);
        
        touch('./userdata.php');
        $CONFIGfile=fopen('./userdata.php',"w");
        $txt=('<?php
$name =$_GET["username"];
$passwd =$_GET["passwd"];

include "../config/database.php";
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$passwdsha1 = sha1($passwd);

$sqluser =$dbprefix."user";

$sql = "INSERT INTO ".$sqluser." (username, passwd, usergroup)
VALUES (\'".$name."\', \'".$passwdsha1."\', \'admin\')";

mysqli_query($con, $sql);

header("Location: ./?code=complete");

?>');
fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);

        $url ="Location: ./userdata.php?username=".$adminname."&&passwd=".$adminpasswd;
        
        if($com=1)
            header($url);
           
    }
    
}


?>