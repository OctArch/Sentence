<?php
$sql1 = "CREATE TABLE ".$sqlsentence." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
author VARCHAR(30) NOT NULL,
speaker VARCHAR(30) NOT NULL,
text VARCHAR(65530),
reg_date TIMESTAMP
)";
        $sql2 = "CREATE TABLE ".$sqluser." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
passwd VARCHAR(45) NOT NULL,
usergroup VARCHAR(30)
)";

        if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2)) {
            $com=1;
        } else {
            echo "创建数据表错误: " . $con->error;
        }
 
        $con->close();
        
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
        
        
?>