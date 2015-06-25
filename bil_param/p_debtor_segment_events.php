<?php
//BindEvents Method @1-F5E006E1
function BindEvents()
{
    global $P_DEBTOR_SEGMENT;
    global $CCSEvents;
    $P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->CCSEvents["BeforeShow"] = "P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow";
    $P_DEBTOR_SEGMENT->CCSEvents["BeforeShowRow"] = "P_DEBTOR_SEGMENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow @7-FD7E7268
function P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow(& $sender)
{
    $P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DEBTOR_SEGMENT; //Compatibility
//End P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow

//Custom Code @39-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Page = $FileName;
	$P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Parameters = CCRemoveParam($P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Parameters, "P_DEBTOR_SEGMENT_ID");
	$P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Parameters = CCAddParam($P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow @7-EA089839
    return $P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow;
}
//End Close P_DEBTOR_SEGMENT_P_DEBTOR_SEGMENT_Insert_BeforeShow

//P_DEBTOR_SEGMENT_BeforeShowRow @2-5E4F6D0A
function P_DEBTOR_SEGMENT_BeforeShowRow(& $sender)
{
    $P_DEBTOR_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DEBTOR_SEGMENT; //Compatibility
//End P_DEBTOR_SEGMENT_BeforeShowRow

//Set Row Style @45-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_DEBTOR_SEGMENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_DEBTOR_SEGMENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_DEBTOR_SEGMENT->P_DEBTOR_SEGMENT_ID->GetValue() == $keyId) {
		$P_DEBTOR_SEGMENT->ADLink->Visible = true;
		$P_DEBTOR_SEGMENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_DEBTOR_SEGMENT->ADLink->Visible = false;
		$P_DEBTOR_SEGMENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_DEBTOR_SEGMENT_BeforeShowRow @2-9F916AD5
    return $P_DEBTOR_SEGMENT_BeforeShowRow;
}
//End Close P_DEBTOR_SEGMENT_BeforeShowRow

//Page_OnInitializeView @1-864A6478
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_debtor_segment; //Compatibility
//End Page_OnInitializeView

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0DB5FDE3
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_debtor_segment; //Compatibility
//End Page_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_DEBTOR_SEGMENTSearch;
	global $P_DEBTOR_SEGMENT;
	global $P_DEBTOR_SEGMENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_DEBTOR_SEGMENTSearch->Visible = false;
		$P_DEBTOR_SEGMENT->Visible = false;
		$P_DEBTOR_SEGMENT1->Visible = true;
		$P_DEBTOR_SEGMENT1->ds->SQL = "";
	} else {
		$P_DEBTOR_SEGMENTSearch->Visible = true;
		$P_DEBTOR_SEGMENT->Visible = true;
		$P_DEBTOR_SEGMENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
