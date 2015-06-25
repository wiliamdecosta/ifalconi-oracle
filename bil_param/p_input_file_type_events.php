<?php
//BindEvents Method @1-DDA44F88
function BindEvents()
{
    global $P_INPUT_FILE_TYPE;
    global $CCSEvents;
    $P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->CCSEvents["BeforeShow"] = "P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow";
    $P_INPUT_FILE_TYPE->CCSEvents["BeforeShowRow"] = "P_INPUT_FILE_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow @7-355517E0
function P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow(& $sender)
{
    $P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_TYPE; //Compatibility
//End P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Page = $FileName;
	$P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Parameters = CCRemoveParam($P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Parameters, "P_INPUT_FILE_TYPE_ID");
	$P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Parameters = CCAddParam($P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow @7-6D427A69
    return $P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow;
}
//End Close P_INPUT_FILE_TYPE_P_INPUT_FILE_TYPE_Insert_BeforeShow

//P_INPUT_FILE_TYPE_BeforeShowRow @2-19BE4E8C
function P_INPUT_FILE_TYPE_BeforeShowRow(& $sender)
{
    $P_INPUT_FILE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_TYPE; //Compatibility
//End P_INPUT_FILE_TYPE_BeforeShowRow

//Set Row Style @68-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @69-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_INPUT_FILE_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_INPUT_FILE_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_INPUT_FILE_TYPE->P_INPUT_FILE_TYPE_ID->GetValue() == $keyId) {
		$P_INPUT_FILE_TYPE->ADLink->Visible = true;
		$P_INPUT_FILE_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_INPUT_FILE_TYPE->ADLink->Visible = false;
		$P_INPUT_FILE_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_TYPE_BeforeShowRow @2-4E4CA637
    return $P_INPUT_FILE_TYPE_BeforeShowRow;
}
//End Close P_INPUT_FILE_TYPE_BeforeShowRow

//Page_OnInitializeView @1-6D2E09B3
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_input_file_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0A78BCE6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_input_file_type; //Compatibility
//End Page_BeforeShow

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_INPUT_FILE_TYPESearch;
	global $P_INPUT_FILE_TYPE;
	global $P_INPUT_FILE_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_INPUT_FILE_TYPESearch->Visible = false;
		$P_INPUT_FILE_TYPE->Visible = false;
		$P_INPUT_FILE_TYPE1->Visible = true;
		$P_INPUT_FILE_TYPE1->ds->SQL = "";
	} else {
		$P_INPUT_FILE_TYPESearch->Visible = true;
		$P_INPUT_FILE_TYPE->Visible = true;
		$P_INPUT_FILE_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
