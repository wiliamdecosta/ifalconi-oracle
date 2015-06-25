<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "menu.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

   if ($_SESSION["UserName"]=="") 
   {
     exit;
   } 

$dbConn = new clsDBConn();
$dbConnTwo = new clsDBConn();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>header</title>
<link href="../Styles/trb/layout.css" type="text/css" rel="stylesheet"/>
<style>
	/* Style for tree item text */
	body {
		background-color: #89a5f7;
		color : #363636;
		font-family: Tahoma, Calibri, Arial;
		font-size: 9pt;
	}
	.t0i {
		font-family: Tahoma, Calibri, Arial;
		font-size: 9pt;
		color: #363636;
		background-color: #89a5f7;
		text-decoration: none;
	}
	.t0i:hover {
		font-family: Tahoma, Calibri, Arial;
		font-size: 9pt;
		color: #363636;
		background-color: #89a5f7;
		text-decoration: none;
	}
	.t0i:active {
		font-family: Tahoma, Calibri, Arial;
		font-size: 9pt;
		color: #363636;
		background-color: #89a5f7;
		text-decoration: none;
	}

	/* Style for tree item image */
	.t0im {
		border: 2px;
		width: 4px;
		height: 16px;
	}
</style>
<script type="text/javascript" language="JavaScript" src="../js/menu_tree.js"></script>
<script type="text/javascript" language="javascript">
var tree_tpl = {

	'target'  : 'main',	// name of the frame links will be opened in  other possible values are: _blank, _parent, _search, _self and _top

	'icon_e'  : '../images/empty.gif', // empty image

	'icon_l'  : '../images/empty.gif',  // vertical line

	

	'icon_48' : '../images/empty.gif',   // root icon normal

	'icon_52' : '../images/empty.gif',   // root icon selected

	'icon_56' : '../images/empty.gif',   // root icon opened

	'icon_60' : '../images/empty.gif',   // root icon selected

	

	'icon_16' : '../images/empty.gif', // node icon normal

	'icon_20' : '../images/empty.gif', // node icon selected

	'icon_24' : '../images/empty.gif', // node icon opened

	'icon_28' : '../images/empty.gif', // node icon selected opened



	'icon_0'  : '../images/empty.gif', // leaf icon normal

	'icon_4'  : '../images/empty.gif', // leaf icon selected

	'icon_8'  : '../images/empty.gif', // leaf icon opened

	'icon_12' : '../images/empty.gif', // leaf icon selected

	

	'icon_2'  : '../images/empty.gif', // junction for leaf

	'icon_3'  : '../images/empty.gif',       // junction for last leaf

	'icon_18' : '../images/a_plus.gif', // junction for closed node

	'icon_19' : '../images/a_plus.gif',       // junctioin for last closed node

	'icon_26' : '../images/a_minus.gif',// junction for opened node

	'icon_27' : '../images/a_minus.gif'       // junctioin for last opended node

};

</script>
</head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table border="0" cellspacing="0" cellpadding="0" width="100%"  background="../images/tab_back.gif">
  <tr>
    <td>&nbsp;&nbsp;</td>
    <td width="100%"><img border="0" src="../images/tab_back.gif"></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="100%" valign="top">
<div id="links" style="font-family: Tahoma, Calibri, Arial;">
<form name="menuform" id="menuform">
<table style="font-family: Tahoma, Calibri, Arial;font-weight:normal;font-size: 9pt" width="100%">
<tr>
<td width="100%" style="text-align:center"><img border='0' height=64 src='<?echo $_GET["module_image"];?>'><br><b><?echo $_GET["p_application_code"]; ?></b></td>
</tr>
</table>

	<ul>
<?php

	$p_application_id = $_GET["p_application_id"];

        $isdamin=0;
        
        if (CCGetUserID()==1) $isadmin=1;
        $dbConn__ = new clsDBConn();
        $dbConn__->query("select count(*) jml from p_user_role where p_role_id=1 and p_user_id=" . CCGetUserID());
        if ($dbConn__->next_record() )
        {
           if ($dbConn__->f("jml")>0) $isadmin=1;
        }
        $dbConn__->close();


 
?>
		<li style="background-color: #89a5f7;text-align:left; padding:1px;border-top:1px dotted #363636"">
			<a style="font-size: 9pt;" href="#"><img border="0" src="../images/item_blue.gif"> MENU</a>
			<span id="menu_1>" style="font-size: 9pt; text-align:left; background-color: #89a5f7; border-top: 0px solid #0969B0; border-left: 0px solid #0969B0; border-bottom: 0px solid #7EB5F1; border-right: 0px solid #7EB5F1">
<?php

if ($isadmin==1) {
	$queryMenu = "select p_menu_id as p_menu_id, nvl (parent_id, 0) parent_id, menu menu, file_name, description, listing_no "
			."from (select p_menu_id, parent_id, code as menu, nvl (file_name, '-') as file_name,"
			."	description, listing_no "
			."	from p_menu "
			."	where is_active = 'Y' "
			."	and p_application_id = ".$p_application_id." "
			." start with parent_id is null connect by prior p_menu_id = parent_id order siblings by nvl(listing_no, 9999))";
} else {    
	$queryMenu = "select p_menu_id as p_menu_id, nvl (parent_id, 0) parent_id, menu menu, file_name, description, listing_no "
			."from (select p_menu_id, parent_id, code as menu, nvl (file_name, '-') as file_name,"
			."	description, listing_no "
			."	from p_menu "
			."	where is_active = 'Y' "
			."	and p_application_id = ".$p_application_id." "
			."	and p_menu_id in ( "
			."	select rm.p_menu_id "
			."	from p_role_menu rm, p_user_role ur, p_user u "
			."	where rm.p_role_id = ur.p_role_id "
			."	and ur.p_user_id = u.p_user_id "
			."	and ur.p_user_id = " . CCGetUserID() . ") "
			." start with parent_id is null connect by prior p_menu_id = parent_id order siblings by nvl(listing_no, 9999))";
}			
			
// die($queryMenu);
// echo($queryMenu);
          
			
	$dbConnTwo->query($queryMenu);

	
?>
				<script language="JavaScript" type="text/javascript">
					var TREE_ITEMS = 
						[
							['', ''
					<?php
						$PLevel= array (-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,);
						$level = 0;
						$bdmnid = 0;
						$nplevel = 0;
						$parid = 0;
						  
						while ($dbConnTwo->next_record()) {
							
							
							
							if ($dbConnTwo->f("p_menu_id")!=$bdmnid) {
								$bdmnid=$dbConnTwo->f("p_menu_id");

								$parid= $dbConnTwo->f("parent_id");

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

								$nplevel = $dbConnTwo->f("p_menu_id");
								$fileName = $dbConnTwo->f("file_name");
								echo "['" . $dbConnTwo->f("menu");
								
								if (empty($fileName)) {
									echo "',''";
								} else {
									echo "','open.php?NAMAPHP=" . $fileName . "'"; // "&MENU_ID=" . $dbConnTwo->f("p_menu_id")."'";
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
			</span>
		</li>
<?php

	$dbConn->close();
	$dbConnTwo->close();
	//echo($queryMenu);		

    $_SESSION["MODULID"]=$p_application_id;
		
?>

		<li style="background-color: #89a5f7;text-align:left; padding:1px;border-top:1px dotted #363636"">&nbsp;</li>

	</ul>
	
</form>
</div>

</td>
    <td nowrap style="background-image: url('../images/back_v_split.gif')"><img border="0" src="../images/vertical_split.gif"></td> 
</tr>    
</table>

</body>
</html>
<script language="javascript" type="text/javascript">
function show(id, jums) { 
	var displayVal = "";
	var namaId = "";
	for (var i=1; i<=jums; i++) { 
		namaId = "menu_" + i; 
		displayVal = "";
		if (namaId == id) {
			displayVal = "block";
			if (document.getElementById(namaId).style.display == "block") {
			   displayVal = "none";
		         }	
//		document.getElementById(namaId).style.display = displayVal;
		} else {
			displayVal = "none";
		}
		document.getElementById(namaId).style.display = displayVal;
	}
}

function logout()
{
  if (confirm("Are you sure to logout?")==1)
  {
     top.ttop.location.href="../main/logout.php";
  }
}

function SetHeadON()
{
  if (parent.parent.document.getElementById('UTAMAD')!=null) {
     document.getElementById("tdtoup").style.display="";
     document.getElementById("tdtodown").style.display="none";
//     parent.document.getElementById('UTAMAD').setAttribute('rows', '65,25,*,20');
     parent.parent.document.getElementById('UTAMAD').setAttribute('rows', '65,25,*,20');
  }

}

function SetHeadOFF()
{
  if (parent.parent.document.getElementById('UTAMAD')!=null) {
     document.getElementById("tdtoup").style.display="none";
     document.getElementById("tdtodown").style.display="";
//     parent.document.getElementById('UTAMAD').setAttribute('rows', '1,25,*,20');
     parent.parent.document.getElementById('UTAMAD').setAttribute('rows', '1,25,*,20');
  }
}

</script>

