<?php
//BindEvents Method @1-98B30E2E
function BindEvents()
{
    global $P_INPUT_FILE_LOCATION;
    global $CCSEvents;
    $P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->CCSEvents["BeforeShow"] = "P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow";
    $P_INPUT_FILE_LOCATION->CCSEvents["BeforeShowRow"] = "P_INPUT_FILE_LOCATION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow @7-1F136D21
function P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow(& $sender)
{
    $P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_LOCATION; //Compatibility
//End P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Page = $FileName;
	$P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Parameters = CCRemoveParam($P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Parameters, "P_INPUT_FILE_LOCATION_ID");
	$P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Parameters = CCAddParam($P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow @7-7D210D46
    return $P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow;
}
//End Close P_INPUT_FILE_LOCATION_P_INPUT_FILE_LOCATION_Insert_BeforeShow

//P_INPUT_FILE_LOCATION_BeforeShowRow @2-F179FE97
function P_INPUT_FILE_LOCATION_BeforeShowRow(& $sender)
{
    $P_INPUT_FILE_LOCATION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_LOCATION; //Compatibility
//End P_INPUT_FILE_LOCATION_BeforeShowRow

//Set Row Style @53-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_INPUT_FILE_LOCATION_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_INPUT_FILE_LOCATION_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_INPUT_FILE_LOCATION->P_INPUT_FILE_LOCATION_ID->GetValue() == $keyId) {
		$P_INPUT_FILE_LOCATION->ADLink->Visible = true;
		$P_INPUT_FILE_LOCATION->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_INPUT_FILE_LOCATION->ADLink->Visible = false;
		$P_INPUT_FILE_LOCATION->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_LOCATION_BeforeShowRow @2-C7894B58
    return $P_INPUT_FILE_LOCATION_BeforeShowRow;
}
//End Close P_INPUT_FILE_LOCATION_BeforeShowRow

//Page_OnInitializeView @1-02E80426
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_input_file_location; //Compatibility
//End Page_OnInitializeView

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0299C964
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_input_file_location; //Compatibility
//End Page_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_INPUT_FILE_LOCATIONSearch;
	global $P_INPUT_FILE_LOCATION;
	global $P_INPUT_FILE_LOCATION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_INPUT_FILE_LOCATIONSearch->Visible = false;
		$P_INPUT_FILE_LOCATION->Visible = false;
		$P_INPUT_FILE_LOCATION1->Visible = true;
		$P_INPUT_FILE_LOCATION1->ds->SQL = "";
	} else {
		$P_INPUT_FILE_LOCATIONSearch->Visible = true;
		$P_INPUT_FILE_LOCATION->Visible = true;
		$P_INPUT_FILE_LOCATION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
