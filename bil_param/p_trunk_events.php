<?php
//BindEvents Method @1-1B010635
function BindEvents()
{
    global $P_TRUNK;
    global $CCSEvents;
    $P_TRUNK->P_TRUNK_Insert->CCSEvents["BeforeShow"] = "P_TRUNK_P_TRUNK_Insert_BeforeShow";
    $P_TRUNK->CCSEvents["BeforeShowRow"] = "P_TRUNK_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_TRUNK_P_TRUNK_Insert_BeforeShow @7-76BC83E3
function P_TRUNK_P_TRUNK_Insert_BeforeShow(& $sender)
{
    $P_TRUNK_P_TRUNK_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TRUNK; //Compatibility
//End P_TRUNK_P_TRUNK_Insert_BeforeShow

//Custom Code @100-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_TRUNK->P_TRUNK_Insert->Page = $FileName;
	$P_TRUNK->P_TRUNK_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_TRUNK->P_TRUNK_Insert->Parameters = CCRemoveParam($P_TRUNK->P_TRUNK_Insert->Parameters, "P_TRUNK_ID");
	$P_TRUNK->P_TRUNK_Insert->Parameters = CCAddParam($P_TRUNK->P_TRUNK_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_TRUNK_P_TRUNK_Insert_BeforeShow @7-1BB0E60B
    return $P_TRUNK_P_TRUNK_Insert_BeforeShow;
}
//End Close P_TRUNK_P_TRUNK_Insert_BeforeShow

//P_TRUNK_BeforeShowRow @2-D9B0F080
function P_TRUNK_BeforeShowRow(& $sender)
{
    $P_TRUNK_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TRUNK; //Compatibility
//End P_TRUNK_BeforeShowRow

//Set Row Style @102-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @103-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_TRUNK_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_TRUNK->P_TRUNK_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_TRUNK_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_TRUNK->P_TRUNK_ID->GetValue() == $keyId) {
		$P_TRUNK->ADLink->Visible = true;
		$P_TRUNK->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_TRUNK->ADLink->Visible = false;
		$P_TRUNK->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Custom Code @104-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_TRUNK_BeforeShowRow @2-695A4ED1
    return $P_TRUNK_BeforeShowRow;
}
//End Close P_TRUNK_BeforeShowRow

//Page_OnInitializeView @1-A840DFC3
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_trunk; //Compatibility
//End Page_OnInitializeView

//Custom Code @105-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A4A1F7DC
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_trunk; //Compatibility
//End Page_BeforeShow

//Custom Code @106-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TRUNKSearch;
	global $P_TRUNK;
	global $P_TRUNK1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_TRUNKSearch->Visible = false;
		$P_TRUNK->Visible = false;
		$P_TRUNK1->Visible = true;
		$P_TRUNK1->ds->SQL = "";
	} else {
		$P_TRUNKSearch->Visible = true;
		$P_TRUNK->Visible = true;
		$P_TRUNK1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
