<?php
//BindEvents Method @1-D5D230FB
function BindEvents()
{
    global $P_AR_SEGMENT;
    global $CCSEvents;
    $P_AR_SEGMENT->P_AR_SEGMENT_Insert->CCSEvents["BeforeShow"] = "P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow";
    $P_AR_SEGMENT->CCSEvents["BeforeShowRow"] = "P_AR_SEGMENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow @7-05DE89D6
function P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow(& $sender)
{
    $P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_AR_SEGMENT; //Compatibility
//End P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_AR_SEGMENT->P_AR_SEGMENT_Insert->Page = $FileName;
	$P_AR_SEGMENT->P_AR_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_AR_SEGMENT->P_AR_SEGMENT_Insert->Parameters = CCRemoveParam($P_AR_SEGMENT->P_AR_SEGMENT_Insert->Parameters, "P_AR_SEGMENT_ID");
	$P_AR_SEGMENT->P_AR_SEGMENT_Insert->Parameters = CCAddParam($P_AR_SEGMENT->P_AR_SEGMENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow @7-F3168BD3
    return $P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow;
}
//End Close P_AR_SEGMENT_P_AR_SEGMENT_Insert_BeforeShow



//P_AR_SEGMENT_BeforeShowRow @2-9288C0F2
function P_AR_SEGMENT_BeforeShowRow(& $sender)
{
    $P_AR_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_AR_SEGMENT; //Compatibility
//End P_AR_SEGMENT_BeforeShowRow

//Set Row Style @51-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_AR_SEGMENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_AR_SEGMENT->P_AR_SEGMENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_AR_SEGMENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_AR_SEGMENT->P_AR_SEGMENT_ID->GetValue() == $keyId) {
		$P_AR_SEGMENT->ADLink->Visible = true;
		$P_AR_SEGMENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_AR_SEGMENT->ADLink->Visible = false;
		$P_AR_SEGMENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_AR_SEGMENT_BeforeShowRow @2-353B0F51
    return $P_AR_SEGMENT_BeforeShowRow;
}
//End Close P_AR_SEGMENT_BeforeShowRow

//Page_OnInitializeView @1-27A24991
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_ar_segment; //Compatibility
//End Page_OnInitializeView

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A4013B88
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_ar_segment; //Compatibility
//End Page_BeforeShow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_AR_SEGMENTSearch;
	global $P_AR_SEGMENT;
	global $P_AR_SEGMENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_AR_SEGMENTSearch->Visible = false;
		$P_AR_SEGMENT->Visible = false;
		$P_AR_SEGMENT1->Visible = true;
		$P_AR_SEGMENT1->ds->SQL = "";
	} else {
		$P_AR_SEGMENTSearch->Visible = true;
		$P_AR_SEGMENT->Visible = true;
		$P_AR_SEGMENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
