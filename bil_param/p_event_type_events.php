<?php
//BindEvents Method @1-15D8BD3A
function BindEvents()
{
    global $P_EVENT_TYPE;
    global $CCSEvents;
    $P_EVENT_TYPE->P_EVENT_TYPE_Insert->CCSEvents["BeforeShow"] = "P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow";
    $P_EVENT_TYPE->CCSEvents["BeforeShowRow"] = "P_EVENT_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow @7-AD65B3FA
function P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow(& $sender)
{
    $P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_TYPE; //Compatibility
//End P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_EVENT_TYPE->P_EVENT_TYPE_Insert->Page = $FileName;
	$P_EVENT_TYPE->P_EVENT_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_EVENT_TYPE->P_EVENT_TYPE_Insert->Parameters = CCRemoveParam($P_EVENT_TYPE->P_EVENT_TYPE_Insert->Parameters, "P_EVENT_TYPE_ID");
	$P_EVENT_TYPE->P_EVENT_TYPE_Insert->Parameters = CCAddParam($P_EVENT_TYPE->P_EVENT_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow @7-720104AE
    return $P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow;
}
//End Close P_EVENT_TYPE_P_EVENT_TYPE_Insert_BeforeShow

//P_EVENT_TYPE_BeforeShowRow @2-13CE1FAB
function P_EVENT_TYPE_BeforeShowRow(& $sender)
{
    $P_EVENT_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_TYPE; //Compatibility
//End P_EVENT_TYPE_BeforeShowRow

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_EVENT_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_EVENT_TYPE->P_EVENT_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_EVENT_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_EVENT_TYPE->P_EVENT_TYPE_ID->GetValue() == $keyId) {
		$P_EVENT_TYPE->ADLink->Visible = true;
		$P_EVENT_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_EVENT_TYPE->ADLink->Visible = false;
		$P_EVENT_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_EVENT_TYPE_BeforeShowRow @2-96EA96DD
    return $P_EVENT_TYPE_BeforeShowRow;
}
//End Close P_EVENT_TYPE_BeforeShowRow

//Page_OnInitializeView @1-ED6D0BBF
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-6ECE79A6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_type; //Compatibility
//End Page_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_EVENT_TYPESearch;
	global $P_EVENT_TYPE;
	global $P_EVENT_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_EVENT_TYPESearch->Visible = false;
		$P_EVENT_TYPE->Visible = false;
		$P_EVENT_TYPE1->Visible = true;
		$P_EVENT_TYPE1->ds->SQL = "";
	} else {
		$P_EVENT_TYPESearch->Visible = true;
		$P_EVENT_TYPE->Visible = true;
		$P_EVENT_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
