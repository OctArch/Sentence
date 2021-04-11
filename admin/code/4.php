<?php
$title=$_POST['title'];
$describe=$_POST['describe'];
$tg=$_POST['tg'];
$keywords=$_POST['keywords'];
$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
$CONFIGfile = fopen("../config/siteinfo.php", "w");
        $txt = (
            "<?php\n"
.'$sitename = "'.$title."\";//The Title Of WebSite\n"
.'$describe = "'.$describe."\";//The Describe Of WebSite\n"
.'$tg = "'.$tg."\";//Contribute Link\n"
.'$keyword = "'.$keywords."\";//KeyWord"."
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);

if($newpasswd!='')
    {
        $newpasswdsha1 = sha1($newpasswd);
        
        $passwdsha1 = sha1($passwd);
        
        $sqluser =$dbprefix."user";
        
        $sql = "UPDATE ".$sqluser." SET passwd='".$newpasswdsha1."' 
        WHERE passwd='".$passwdsha1."'";
        mysqli_query($con, $sql);
    }
    header('Location: ./?complete=1');
?>