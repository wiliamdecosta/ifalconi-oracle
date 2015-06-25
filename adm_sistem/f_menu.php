<html>
<head>
    <title>MENU</title>
</head>
<frameset framespacing="1" frameborder="0" cols=*,200>
    <frame name="mnmain" id="mnmain" src="p_menu.php?PARENT_ID=0&PARENT_CODE=-&P_APPLICATION_ID=<?=$_GET["P_APPLICATION_ID"]?>&APPL_CODE=<?=$_GET["APPL_CODE"]?>&P_APPLSearchs_keyword=<?=$_GET["P_APPLSearchs_keyword"]?>&P_APPLGridPage=<?=$_GET["P_APPLGridPage"]?>">
    <frame name="mntree" src="p_menu_tree.php?P_APPLICATION_ID=<?=$_GET["P_APPLICATION_ID"]?>&APPL_CODE=<?=$_GET["APPL_CODE"]?>&P_APPLSearchs_keyword=<?=$_GET["P_APPLSearchs_keyword"]?>&P_APPLGridPage=<?=$_GET["P_APPLGridPage"]?>">
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them.
            </p>
        </body>
    </noframes>
</frameset>
</html>
