<html>
<head>
    <title>FMENU</title>
</head>
<frameset id="FORMMODUL" framespacing="1" frameborder="0" cols="240,*">
    <frame scrolling="no" name="frmmenu" src="modul_menu.php?p_application_id=<?=$_GET["p_application_id"]?>&p_application_code=<?=$_GET["p_application_code"]?>&module_image=<?=$_GET["module_image"]?>">
    <frame scrolling="auto" name="main" id="main" src="blank.html">
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them.
            </p>
        </body>
    </noframes>
</frameset>
</html>

