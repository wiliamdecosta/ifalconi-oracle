<?php
//BindEvents Method @1-88987DD3
function BindEvents()
{
    global $P_ACCESS_LEVEL;
    global $CCSEvents;
    $P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->CCSEvents["BeforeShow"] = "P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow";
    $P_ACCESS_LEVEL->CCSEvents["BeforeShowRow"] = "P_ACCESS_LEVEL_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow @7-944B0A4C
function P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow(& $sender)
{
    $P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCESS_LEVEL; //Compatibility
//End P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Page = $FileName;
	$P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Parameters = CCRemoveParam($P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Parameters, "P_ACCESS_LEVEL_ID");
	$P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Parameters = CCAddParam($P_ACCESS_LEVEL->P_ACCESS_LEVEL_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow @7-C1D14279
    return $P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow;
}
//End Close P_ACCESS_LEVEL_P_ACCESS_LEVEL_Insert_BeforeShow

//P_ACCESS_LEVEL_BeforeShowRow @2-3A7C40BC
function P_ACCESS_LEVEL_BeforeShowRow(& $sender)
{
    $P_ACCESS_LEVEL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCESS_LEVEL; //Compatibility
//End P_ACCESS_LEVEL_BeforeShowRow

//Set Row Style @62-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_ACCESS_LEVEL_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_ACCESS_LEVEL->P_ACCESS_LEVEL_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_ACCESS_LEVEL_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_ACCESS_LEVEL->P_ACCESS_LEVEL_ID->GetValue() == $keyId) {
		$P_ACCESS_LEVEL->ADLink->Visible = true;
		$P_ACCESS_LEVEL->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_ACCESS_LEVEL->ADLink->Visible = false;
		$P_ACCESS_LEVEL->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_ACCESS_LEVEL_BeforeShowRow @2-8C1E387D
    return $P_ACCESS_LEVEL_BeforeShowRow;
}
//End Close P_ACCESS_LEVEL_BeforeShowRow

//Page_OnInitializeView @1-517AEC21
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_access_level; //Compatibility
//End Page_OnInitializeView

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-7471D68A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_access_level; //Compatibility
//End Page_BeforeShow

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ACCESS_LEVELSearch;
	global $P_ACCESS_LEVEL;
	global $P_ACCESS_LEVEL1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ACCESS_LEVELSearch->Visible = false;
		$P_ACCESS_LEVEL->Visible = false;
		$P_ACCESS_LEVEL1->Visible = true;
		$P_ACCESS_LEVEL1->ds->SQL = "";
	} else {
		$P_ACCESS_LEVELSearch->Visible = true;
		$P_ACCESS_LEVEL->Visible = true;
		$P_ACCESS_LEVEL1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
