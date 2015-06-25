<?php
//BindEvents Method @1-05ADAFCC
function BindEvents()
{
    global $P_SWITCH_COORDINATE;
    global $CCSEvents;
    $P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->CCSEvents["BeforeShow"] = "P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow";
    $P_SWITCH_COORDINATE->CCSEvents["BeforeShowRow"] = "P_SWITCH_COORDINATE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow @7-7B1CD3BB
function P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow(& $sender)
{
    $P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SWITCH_COORDINATE; //Compatibility
//End P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Page = $FileName;
	$P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Parameters = CCRemoveParam($P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Parameters, "P_SWITCH_COORDINATE_ID");
	$P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Parameters = CCAddParam($P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow @7-D0E47E4B
    return $P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow;
}
//End Close P_SWITCH_COORDINATE_P_SWITCH_COORDINATE_Insert_BeforeShow

//P_SWITCH_COORDINATE_BeforeShowRow @2-6A14FC16
function P_SWITCH_COORDINATE_BeforeShowRow(& $sender)
{
    $P_SWITCH_COORDINATE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SWITCH_COORDINATE; //Compatibility
//End P_SWITCH_COORDINATE_BeforeShowRow

//Set Row Style @89-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @90-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_SWITCH_COORDINATE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SWITCH_COORDINATE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SWITCH_COORDINATE->P_SWITCH_COORDINATE_ID->GetValue() == $keyId) {
		$P_SWITCH_COORDINATE->ADLink->Visible = true;
		$P_SWITCH_COORDINATE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SWITCH_COORDINATE->ADLink->Visible = false;
		$P_SWITCH_COORDINATE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SWITCH_COORDINATE_BeforeShowRow @2-216D1EB4
    return $P_SWITCH_COORDINATE_BeforeShowRow;
}
//End Close P_SWITCH_COORDINATE_BeforeShowRow

//Page_OnInitializeView @1-3E33F02E
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_switch_coordinate; //Compatibility
//End Page_OnInitializeView

//Custom Code @91-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-42F4796A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_switch_coordinate; //Compatibility
//End Page_BeforeShow

//Custom Code @92-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SWITCH_COORDINATESearch;
	global $P_SWITCH_COORDINATE;
	global $P_SWITCH_COORDINATE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SWITCH_COORDINATESearch->Visible = false;
		$P_SWITCH_COORDINATE->Visible = false;
		$P_SWITCH_COORDINATE1->Visible = true;
		$P_SWITCH_COORDINATE1->ds->SQL = "";
	} else {
		$P_SWITCH_COORDINATESearch->Visible = true;
		$P_SWITCH_COORDINATE->Visible = true;
		$P_SWITCH_COORDINATE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
