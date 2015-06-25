<?php
//BindEvents Method @1-7DC202F1
function BindEvents()
{
    global $P_STATUS_LIST;
    global $CCSEvents;
    $P_STATUS_LIST->P_STATUS_LIST_Insert->CCSEvents["BeforeShow"] = "P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow";
    $P_STATUS_LIST->CCSEvents["BeforeShowRow"] = "P_STATUS_LIST_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow @7-B168EE04
function P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow(& $sender)
{
    $P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_LIST; //Compatibility
//End P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

global $FileName;
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Page = $FileName;
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCRemoveParam($P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters, "P_STATUS_LIST_ID");
	$P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters = CCAddParam($P_STATUS_LIST->P_STATUS_LIST_Insert->Parameters, "TAMBAH", "1");

//Close P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow @7-DE7C5638
    return $P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow;
}
//End Close P_STATUS_LIST_P_STATUS_LIST_Insert_BeforeShow

//P_STATUS_LIST_BeforeShowRow @2-0E1D1037
function P_STATUS_LIST_BeforeShowRow(& $sender)
{
    $P_STATUS_LIST_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_LIST; //Compatibility
//End P_STATUS_LIST_BeforeShowRow

//Set Row Style @49-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @50-2A29BDB7

	$keyId = CCGetFromGet("P_STATUS_LIST_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_STATUS_LIST->P_STATUS_LIST_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_STATUS_LIST_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_STATUS_LIST->P_STATUS_LIST_ID->GetValue() == $keyId) {
		$P_STATUS_LIST->ADLink->Visible = true;
		$P_STATUS_LIST->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_STATUS_LIST->ADLink->Visible = false;
		$P_STATUS_LIST->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_STATUS_LIST_BeforeShowRow @2-0E24005D
    return $P_STATUS_LIST_BeforeShowRow;
}
//End Close P_STATUS_LIST_BeforeShowRow

//Page_OnInitializeView @1-919B40C5
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list; //Compatibility
//End Page_OnInitializeView

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F5734B77
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_list; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
  global $P_STATUS_LISTSearch;
	global $P_STATUS_LIST;
	global $P_STATUS_LIST1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_STATUS_LISTSearch->Visible = false;
		$P_STATUS_LIST->Visible = false;
		//$P_STATUS_LIST1->Visible = true;
		//$P_STATUS_LIST1->ds->SQL = "";
	} else {
		$P_STATUS_LISTSearch->Visible = true;
		$P_STATUS_LIST->Visible = true;
		//$P_STATUS_LIST1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
