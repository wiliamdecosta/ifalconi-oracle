<html>
<head>
    <title>MENU</title>
</head>
<frameset framespacing="1" frameborder="0" cols=*,200>
    <frame name="mnmain" id="mnmain" src="p_job.php?PARENT_ID=0&PARENT_CODE=-&P_JOB_TYPE_ID=<?=$_GET["P_JOB_TYPE_ID"]?>&JOBTYPE_CODE=<?=$_GET["JOBTYPE_CODE"]?>&P_JOB_TYPESearchs_keyword=<?=$_GET["P_JOB_TYPESearchs_keyword"]?>">
    <frame name="mntree" src="p_job_tree.php?P_JOB_TYPE_ID=<?=$_GET["P_JOB_TYPE_ID"]?>&JOBTYPE_CODE=<?=$_GET["JOBTYPE_CODE"]?>&P_JOB_TYPESearchs_keyword=<?=$_GET["P_JOB_TYPESearchs_keyword"]?>">
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them.
            </p>
        </body>
    </noframes>
</frameset>
</html>
