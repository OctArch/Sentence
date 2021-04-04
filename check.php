<?php
if(!file_exists('./config/database.php') || !file_exists('./config/database.php'))
{
    header("Location: ./install");
}
?>