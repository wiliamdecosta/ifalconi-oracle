<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "menu.php");

include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

$dbConn = new clsDBConn();
$dbConnTwo = new clsDBConn();

?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="../Styles/trb/Style_doctype.css">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table background="../images/bgheader.jpg" style="width: 100%; color: rgb(255,255,255); font-size:12px; font-weight:bold" 
      border="0" cellpadding="0" cellspacing="0">
      <td>&nbsp;</td>
      <td><img border="0" src="../images/ccbslogo.gif"></td>
      <td><img border="0" src="../images/ccbs.gif"></td>
      <td width="100%" style="text-align:center">&nbsp;</td>
      <td nowrap><label id="billname"></label></td>
      <td>&nbsp;&nbsp;</td>
</tr>
</table>
<?php
        $query = "select * from p_user where p_user_id=" . CCGetUserID();
	$dbConn->query($query);
	$dbConn->next_record();
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#000000; background-color:#89a5f7;font-size:14px;">
<tr><td><b>&nbsp;You are login as :&nbsp;<?echo $dbConn->f("user_name"); ?></b></td>
<td style="text-align:right">
<a title="Home" href="#" alt="Home" onclick ="javascript:home();"><img border="0" src="../images/home.gif" alt="Home"></a>
<a title="Ubah Password" href="#" alt="Ubah Password" onclick ="javascript:chpassword();"><img border="0" src="../images/password.gif" alt="Ubah Password"></a>
<a title="Logout" href="#" alt="Logout" onclick ="javascript:logout();"><img border="0" src="../images/logoff.gif" alt="Logout"></a>
</td>
</tr>
</table>
<?php
	$dbConn->close();
?>

</body>

<SCRIPT LANGUAGE="JavaScript">

function logout()
{
  if (confirm("Anda yakin mau logout?")==1)
  {
     top.ttop.location.href="../main/logout.php";
  }
}

function chpassword()
{
  if (confirm("Anda yakin mau Ubah Password?")==1)
  {
     top.ttop.modul.location.href="to_password.php";
  }
}

function home()
{
   top.ttop.modul.location.href="to_home.php";
}

function changelabel(namalabel)
{
  document.getElementById('billname').innerHTML = namalabel;
}

</script>
</html>
