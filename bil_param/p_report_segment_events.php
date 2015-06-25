<?php
//BindEvents Method @1-FABB538D
function BindEvents()
{
    global $P_REPORT_SEGMENT;
    global $CCSEvents;
    $P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->CCSEvents["BeforeShow"] = "P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow";
    $P_REPORT_SEGMENT->CCSEvents["BeforeShowRow"] = "P_REPORT_SEGMENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow @7-D94C167F
function P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow(& $sender)
{
    $P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REPORT_SEGMENT; //Compatibility
//End P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Page = $FileName;
	$P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Parameters = CCRemoveParam($P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Parameters, "P_REPORT_SEGMENT_ID");
	$P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Parameters = CCAddParam($P_REPORT_SEGMENT->P_REPORT_SEGMENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow @7-3B36D860
    return $P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow;
}
//End Close P_REPORT_SEGMENT_P_REPORT_SEGMENT_Insert_BeforeShow

//P_REPORT_SEGMENT_BeforeShowRow @2-48108B3B
function P_REPORT_SEGMENT_BeforeShowRow(& $sender)
{
    $P_REPORT_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REPORT_SEGMENT; //Compatibility
//End P_REPORT_SEGMENT_BeforeShowRow

//Set Row Style @57-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_REPORT_SEGMENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_REPORT_SEGMENT->P_REPORT_SEGMENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_REPORT_SEGMENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_REPORT_SEGMENT->P_REPORT_SEGMENT_ID->GetValue() == $keyId) {
		$P_REPORT_SEGMENT->ADLink->Visible = true;
		$P_REPORT_SEGMENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_REPORT_SEGMENT->ADLink->Visible = false;
		$P_REPORT_SEGMENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_REPORT_SEGMENT_BeforeShowRow @2-08404D3A
    return $P_REPORT_SEGMENT_BeforeShowRow;
}
//End Close P_REPORT_SEGMENT_BeforeShowRow

//Page_OnInitializeView @1-119B4397
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_report_segment; //Compatibility
//End Page_OnInitializeView

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-9A64DA0C
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_report_segment; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REPORT_SEGMENTSearch;
	global $P_REPORT_SEGMENT;
	global $P_REPORT_SEGMENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REPORT_SEGMENTSearch->Visible = false;
		$P_REPORT_SEGMENT->Visible = false;
		//$P_REPORT_SEGMENT1->Visible = true;
		//$P_REPORT_SEGMENT1->ds->SQL = "";
	} else {
		$P_REPORT_SEGMENTSearch->Visible = true;
		$P_REPORT_SEGMENT->Visible = true;
		//$P_REPORT_SEGMENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
