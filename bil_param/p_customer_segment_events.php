<?php
//BindEvents Method @1-273285CE
function BindEvents()
{
    global $P_CUSTOMER_SEGMENT;
    global $CCSEvents;
    $P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->CCSEvents["BeforeShow"] = "P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow";
    $P_CUSTOMER_SEGMENT->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_SEGMENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow @7-44AA6411
function P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow(& $sender)
{
    $P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_SEGMENT; //Compatibility
//End P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Page = $FileName;
	$P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Parameters = CCRemoveParam($P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Parameters, "P_CUSTOMER_SEGMENT_ID");
	$P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Parameters = CCAddParam($P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow @7-53B5AB76
    return $P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow;
}
//End Close P_CUSTOMER_SEGMENT_P_CUSTOMER_SEGMENT_Insert_BeforeShow

//P_CUSTOMER_SEGMENT_BeforeShowRow @2-3525449F
function P_CUSTOMER_SEGMENT_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_SEGMENT; //Compatibility
//End P_CUSTOMER_SEGMENT_BeforeShowRow

//Set Row Style @59-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CUSTOMER_SEGMENT_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CUSTOMER_SEGMENT_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_ID->GetValue() == $keyId) {
		$P_CUSTOMER_SEGMENT->ADLink->Visible = true;
		$P_CUSTOMER_SEGMENT->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CUSTOMER_SEGMENT->ADLink->Visible = false;
		$P_CUSTOMER_SEGMENT->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CUSTOMER_SEGMENT_BeforeShowRow @2-D956D5D3
    return $P_CUSTOMER_SEGMENT_BeforeShowRow;
}
//End Close P_CUSTOMER_SEGMENT_BeforeShowRow

//Page_OnInitializeView @1-DA2FBA3C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_segment; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-C14949F2
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_segment; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CUSTOMER_SEGMENTSearch;
	global $P_CUSTOMER_SEGMENT;
	global $P_CUSTOMER_SEGMENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CUSTOMER_SEGMENTSearch->Visible = false;
		$P_CUSTOMER_SEGMENT->Visible = false;
		//$P_CUSTOMER_SEGMENT1->Visible = true;
		//$P_CUSTOMER_SEGMENT1->ds->SQL = "";
	} else {
		$P_CUSTOMER_SEGMENTSearch->Visible = true;
		$P_CUSTOMER_SEGMENT->Visible = true;
		//$P_CUSTOMER_SEGMENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
