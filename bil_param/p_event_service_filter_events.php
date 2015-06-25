<?php
//BindEvents Method @1-0A5479D1
function BindEvents()
{
    global $P_EVENT_SERVICE_FILTER;
    global $CCSEvents;
    $P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->CCSEvents["BeforeShow"] = "P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow";
    $P_EVENT_SERVICE_FILTER->CCSEvents["BeforeShowRow"] = "P_EVENT_SERVICE_FILTER_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow @7-CAC6E3AE
function P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow(& $sender)
{
    $P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_SERVICE_FILTER; //Compatibility
//End P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Page = $FileName;
	$P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Parameters = CCRemoveParam($P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Parameters, "P_EVENT_SERVICE_FILTER_ID");
	$P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Parameters = CCAddParam($P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow @7-7302E377
    return $P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow;
}
//End Close P_EVENT_SERVICE_FILTER_P_EVENT_SERVICE_FILTER_Insert_BeforeShow

//P_EVENT_SERVICE_FILTER_BeforeShowRow @2-559AD376
function P_EVENT_SERVICE_FILTER_BeforeShowRow(& $sender)
{
    $P_EVENT_SERVICE_FILTER_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_SERVICE_FILTER; //Compatibility
//End P_EVENT_SERVICE_FILTER_BeforeShowRow

//Set Row Style @86-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_EVENT_SERVICE_FILTER_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_EVENT_SERVICE_FILTER_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_EVENT_SERVICE_FILTER->P_EVENT_SERVICE_FILTER_ID->GetValue() == $keyId) {
		$P_EVENT_SERVICE_FILTER->ADLink->Visible = true;
		$P_EVENT_SERVICE_FILTER->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_EVENT_SERVICE_FILTER->ADLink->Visible = false;
		$P_EVENT_SERVICE_FILTER->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_EVENT_SERVICE_FILTER_BeforeShowRow @2-D4D398D7
    return $P_EVENT_SERVICE_FILTER_BeforeShowRow;
}
//End Close P_EVENT_SERVICE_FILTER_BeforeShowRow

//Page_OnInitializeView @1-CDB469E0
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_service_filter; //Compatibility
//End Page_OnInitializeView

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-55663891
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_service_filter; //Compatibility
//End Page_BeforeShow

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_EVENT_SERVICE_FILTERSearch;
	global $P_EVENT_SERVICE_FILTER;
	global $P_EVENT_SERVICE_FILTER1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_EVENT_SERVICE_FILTERSearch->Visible = false;
		$P_EVENT_SERVICE_FILTER->Visible = false;
		$P_EVENT_SERVICE_FILTER1->Visible = true;
		$P_EVENT_SERVICE_FILTER1->ds->SQL = "";
	} else {
		$P_EVENT_SERVICE_FILTERSearch->Visible = true;
		$P_EVENT_SERVICE_FILTER->Visible = true;
		$P_EVENT_SERVICE_FILTER1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
