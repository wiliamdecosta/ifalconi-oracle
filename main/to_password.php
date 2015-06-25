<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
include_once(RelativePath . "/Common.php");

    $_SESSION["MODULID"]=1;
    header("Location: ../adm_sistem/user_password_self.php");

?>