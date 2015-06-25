<?php
if ($_SESSION["UserName"]=="" || $_SESSION["AppName"]!="TRB") 
{
    header("Location: " . "../main/logout.php");
    exit;
}
?>
