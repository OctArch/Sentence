<?php
$title=$_POST['title'];
$describe=$_POST['describe'];
$tg=$_POST['tg'];
$keywords=$_POST['keywords'];

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

?>