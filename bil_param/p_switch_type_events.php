<?php
//BindEvents Method @1-12D60E65
function BindEvents()
{
    global $P_SWITCH_TYPE;
    global $CCSEvents;
    $P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->CCSEvents["BeforeShow"] = "P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow";
    $P_SWITCH_TYPE->CCSEvents["BeforeShowRow"] = "P_SWITCH_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow @7-37290412
function P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow(& $sender)
{
    $P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SWITCH_TYPE; //Compatibility
//End P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Page = $FileName;
	$P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Parameters = CCRemoveParam($P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Parameters, "P_SWITCH_TYPE_ID");
	$P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Parameters = CCAddParam($P_SWITCH_TYPE->P_SWITCH_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow @7-D676C9C3
    return $P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow;
}
//End Close P_SWITCH_TYPE_P_SWITCH_TYPE_Insert_BeforeShow

//P_SWITCH_TYPE_BeforeShowRow @2-C045287E
function P_SWITCH_TYPE_BeforeShowRow(& $sender)
{
    $P_SWITCH_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SWITCH_TYPE; //Compatibility
//End P_SWITCH_TYPE_BeforeShowRow

//Set Row Style @74-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @75-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_SWITCH_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SWITCH_TYPE->P_SWITCH_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SWITCH_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SWITCH_TYPE->P_SWITCH_TYPE_ID->GetValue() == $keyId) {
		$P_SWITCH_TYPE->ADLink->Visible = true;
		$P_SWITCH_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SWITCH_TYPE->ADLink->Visible = false;
		$P_SWITCH_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SWITCH_TYPE_BeforeShowRow @2-012282E4
    return $P_SWITCH_TYPE_BeforeShowRow;
}
//End Close P_SWITCH_TYPE_BeforeShowRow

//Page_OnInitializeView @1-9E9DC27C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_switch_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @76-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-FA75C9CE
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_switch_type; //Compatibility
//End Page_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SWITCH_TYPESearch;
	global $P_SWITCH_TYPE;
	global $P_SWITCH_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SWITCH_TYPESearch->Visible = false;
		$P_SWITCH_TYPE->Visible = false;
		$P_SWITCH_TYPE1->Visible = true;
		$P_SWITCH_TYPE1->ds->SQL = "";
	} else {
		$P_SWITCH_TYPESearch->Visible = true;
		$P_SWITCH_TYPE->Visible = true;
		$P_SWITCH_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
