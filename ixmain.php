<script language="javascript">
if (window == top) top.location.href = "index.php";
</script>
<html>
<head>
    <title>TRB</title>
</head>
<frameset id="UTAMAD" border="0" framespacing="0" rows="84,*,20" frameborder="0">
    <frame name="info" src="main/header.php?<?php echo time(); ?>" noresize="noresize" scrolling="no" />
    <frame name="modul" name="modul" src="main/module.php?<?php echo time(); ?>" noresize="noresize" scrolling="yws" />
    <frame name="foot" src="main/footer.html?<?php echo time(); ?>" noresize="noresize" scrolling="no" />
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them. 
            </p>
        </body>
    </noframes>
</frameset>
</html>
