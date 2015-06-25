<?php
//Include Common Files @1-510FF8AC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
include_once(RelativePath . "/Common.php");
if ($_SESSION["UserName"]=="" || $_SESSION["AppName"]!="CCBS") 
{
?>	
<html>
<link href="images/ccbs.ico" rel="shortcut icon" />
<head>
    <title>i-Falconi</title>
</head>
<frameset id="ttop1" border="0" framespacing="0" rows="*" frameborder="0">
    <frame name="ttop" src="ixlogin.php" noresize="noresize" scrolling="no" />
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them. 
            </p>
        </body>
    </noframes>
</frameset>
</html>
<?php
} else {
    $_SESSION["MODULID"]=1;
?>	
<html>
<link href="images/ccbs.ico" rel="shortcut icon" />
<head>
    <title>iFalconi</title>
</head>
<frameset id="ttop1" border="0" framespacing="0" rows="*" frameborder="0">
    <frame name="ttop" src="ixmain.php" noresize="noresize" scrolling="no" />
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them. 
            </p>
        </body>
    </noframes>
</frameset>
</html>
<?php
}
?>
