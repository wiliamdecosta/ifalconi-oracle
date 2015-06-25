<?php
//BindEvents Method @1-AD78FE7B
function BindEvents()
{
    global $P_EVENT_SERVICE_TYPE;
    global $CCSEvents;
    $P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->CCSEvents["BeforeShow"] = "P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow";
    $P_EVENT_SERVICE_TYPE->CCSEvents["BeforeShowRow"] = "P_EVENT_SERVICE_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow @7-A54EAAB6
function P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow(& $sender)
{
    $P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_SERVICE_TYPE; //Compatibility
//End P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Page = $FileName;
	$P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Parameters = CCRemoveParam($P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Parameters, "P_EVENT_SERVICE_TYPE_ID");
	$P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Parameters = CCAddParam($P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow @7-8E57FD2D
    return $P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow;
}
//End Close P_EVENT_SERVICE_TYPE_P_EVENT_SERVICE_TYPE_Insert_BeforeShow

//P_EVENT_SERVICE_TYPE_BeforeShowRow @2-D8F89513
function P_EVENT_SERVICE_TYPE_BeforeShowRow(& $sender)
{
    $P_EVENT_SERVICE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_SERVICE_TYPE; //Compatibility
//End P_EVENT_SERVICE_TYPE_BeforeShowRow

//Set Row Style @84-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_EVENT_SERVICE_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_EVENT_SERVICE_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_EVENT_SERVICE_TYPE->P_EVENT_SERVICE_TYPE_ID->GetValue() == $keyId) {
		$P_EVENT_SERVICE_TYPE->ADLink->Visible = true;
		$P_EVENT_SERVICE_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_EVENT_SERVICE_TYPE->ADLink->Visible = false;
		$P_EVENT_SERVICE_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_EVENT_SERVICE_TYPE_BeforeShowRow @2-6B3C7402
    return $P_EVENT_SERVICE_TYPE_BeforeShowRow;
}
//End Close P_EVENT_SERVICE_TYPE_BeforeShowRow

//Page_OnInitializeView @1-2F41BAEF
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_service_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @86-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-5E8CF8EF
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_service_type; //Compatibility
//End Page_BeforeShow

//Custom Code @87-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_EVENT_SERVICE_TYPESearch;
	global $P_EVENT_SERVICE_TYPE;
	global $P_EVENT_SERVICE_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_EVENT_SERVICE_TYPESearch->Visible = false;
		$P_EVENT_SERVICE_TYPE->Visible = false;
		$P_EVENT_SERVICE_TYPE1->Visible = true;
		$P_EVENT_SERVICE_TYPE1->ds->SQL = "";
	} else {
		$P_EVENT_SERVICE_TYPESearch->Visible = true;
		$P_EVENT_SERVICE_TYPE->Visible = true;
		$P_EVENT_SERVICE_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>


