<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
include_once(RelativePath . "/Common.php");

    $_SESSION["MODULID"]=1;
    header("Location: module.php");
    exit;
?>