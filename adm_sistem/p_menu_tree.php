<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "p_menu_tree.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

$dbConn = new clsDBConn();
?>
<html>
<head>
    <title>MENU TREE</title>
    <link href="../Styles/trb/layout.css" type="text/css" rel="stylesheet"/>
    <style>
	/* Style for tree item text */
	.t0i {
		font-family: Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
		font-size: 10px;
		color: #FFFFFF;
		background-color: #313E4D;
		text-decoration: none;
	}
	/* Style for tree item image */
	.t0im {
		border: 0px;
		width: 18px;
		height: 16px;
	}
	/* Style for overmouse item text */
	.t0iMO {
		font-family: Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
		font-size: 10px;
		color: silver;
		background-color: #313E4D;
		text-decoration: none;
	}
</style>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="BACKGROUND-COLOR: #89a5f7">
  <tr>
    <td><img border="0" src="../images/tab_back.gif"></td>
    <td width="100%" background="../images/tab_back.gif">&nbsp;</td>
  </tr>
</table>
<?php
	$queryApp = "select code from p_application where p_application_id=".$_GET["P_APPLICATION_ID"];
	$dbConn->query($queryApp);
	$dbConn->next_record();
	$appCode = $dbConn->f("code");
	$query = "SELECT p_menu_id p_menu_id, NVL (parent_id, 0) parent_id, menu, path_file_name, description "
		. "FROM (SELECT   p_menu_id, parent_id, code menu, NVL (file_name, '0') path_file_name, description, "
		. "listing_no FROM p_menu WHERE p_application_id = ".$_GET["P_APPLICATION_ID"]." "
		. "ORDER BY NVL (parent_id, 0), listing_no) x START WITH x.parent_id IS NULL "
		. "CONNECT BY PRIOR x.p_menu_id = x.parent_id ORDER SIBLINGS BY NVL (listing_no, 9999)";
	$dbConn->query($query);
?>
    <table height="100%" cellspacing="0" width="100%" border="0">
        <tbody>
            <tr>
                <td style="COLOR: #FFFFFF; BACKGROUND-COLOR: #313E4D" valign="top" height="100%">
                    <script language="JavaScript" src="../js/white_tree.js"></script>
                    <script language="JavaScript">

var tree_tpl = {
	'target'  : 'mnmain',	// name of the frame links will be opened in
				// other possible values are: _blank, _parent, _search, _self and _top
	'icon_e'  : '../images/empty.gif', // empty IMAGES
	'icon_l'  : '../images/line.gif',  // vertical line

	'icon_48' : '../images/base.gif',   // root icon normal
	'icon_52' : '../images/base.gif',   // root icon selected
	'icon_56' : '../images/base.gif',   // root icon opened
	'icon_60' : '../images/base.gif',   // root icon selected

	'icon_16' : '../images/folder.gif', // node icon normal
	'icon_20' : '../images/folderopen.gif', // node icon selected
	'icon_24' : '../images/folder.gif', // node icon opened
	'icon_28' : '../images/folderopen.gif', // node icon selected opened

	'icon_0'  : '../images/page.gif', // leaf icon normal
	'icon_4'  : '../images/page.gif', // leaf icon selected
	'icon_8'  : '../images/page.gif', // leaf icon opened
	'icon_12' : '../images/page.gif', // leaf icon selected

	'icon_2'  : '../images/joinbottom.gif', // junction for leaf
	'icon_3'  : '../images/join.gif',       // junction for last leaf
	'icon_18' : '../images/plusbottom.gif', // junction for closed node
	'icon_19' : '../images/plus.gif',       // junctioin for last closed node
	'icon_26' : '../images/minusbottom.gif',// junction for opened node
	'icon_27' : '../images/minus.gif'       // junctioin for last opended node

};


var TREE_ITEMS =
 [
  ['<?=$appCode?>', 'p_menu.php?PARENT_ID=0&PARENT_CODE=-&P_APPLICATION_ID=<?=$_GET["P_APPLICATION_ID"]?>&APPL_CODE=<?=$_GET["APPL_CODE"]?>&P_APPLSearchs_keyword=<?=$_GET["P_APPLSearchs_keyword"]?>&P_APPLGridPage=<?=$_GET["P_APPLGridPage"]?>'
  
<?php
	$PLevel= array (-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,);
	$level = 0;
	$bdmnid = 0;
	$nplevel = 0;
	$parid = 0;
	while ($dbConn->next_record()) {
		if ($dbConn->f("p_menu_id")!=$bdmnid) {
			$bdmnid=$dbConn->f("p_menu_id");
			$parid= $dbConn->f("parent_id");
			if ($parid==$PLevel[$level]) {
				echo "]," . chr(13);
			} else {
				if ($parid==$nplevel) {
					echo "," . chr(13);
					$level=$level+1;
					$PLevel[$level]=$parid;
				} else {
					echo "]," . chr(13);
					while ($PLevel[$level]!=$parid && $level>0) {
						echo "]," . chr(13);
						$level=$level-1;
					}
				}
			}
			$nplevel = $dbConn->f("p_menu_id");
			$fileName = $dbConn->f("path_file_name");
			echo "['" . $dbConn->f("menu");
			if ($fileName=="") {
				echo "',''";
			} else {
				
				//echo "','sip_open.php?NAMAPHP=" . $fileName . "&P_MENU_ID=" . $dbConnTwo->f("p_menu_id")."'";
//				echo "','p_menu.php?PARENT_ID=".$dbConn->f("p_menu_id")."&P_APPLICATION_ID="
//					.$_GET["P_APPLICATION_ID"]."'";
				echo "','p_menu.php?PARENT_ID=" . $dbConn->f("p_menu_id") .
				     "&PARENT_CODE=" . $dbConn->f("menu") . 
				     "&P_APPLICATION_ID=" . $_GET["P_APPLICATION_ID"] .
				     "&APPL_CODE=" . $_GET["APPL_CODE"] .
				     "&P_APPLSearchs_keyword=" . $_GET["P_APPLSearchs_keyword"] .
				     "&P_APPLGridPage=" . $_GET["P_APPLGridPage"] .
				     "'";
			}
		}
	}
	while ($level>0) {
		echo "]," . chr(13);
		$level=$level-1;
	}
?>
  ],
 ];

 new tree (TREE_ITEMS, tree_tpl);

</script>
</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
