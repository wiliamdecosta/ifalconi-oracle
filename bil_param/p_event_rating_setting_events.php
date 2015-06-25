<?php
//BindEvents Method @1-5EB72C90
function BindEvents()
{
    global $P_EVENT_RATING_SETTING;
    global $CCSEvents;
    $P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->CCSEvents["BeforeShow"] = "P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow";
    $P_EVENT_RATING_SETTING->CCSEvents["BeforeShowRow"] = "P_EVENT_RATING_SETTING_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow @7-E91FC187
function P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow(& $sender)
{
    $P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_RATING_SETTING; //Compatibility
//End P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Page = $FileName;
	$P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Parameters = CCRemoveParam($P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Parameters, "P_EVENT_RATING_SETTING_ID");
	$P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Parameters = CCAddParam($P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow @7-375D54F4
    return $P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow;
}
//End Close P_EVENT_RATING_SETTING_P_EVENT_RATING_SETTING_Insert_BeforeShow

//P_EVENT_RATING_SETTING_BeforeShowRow @2-25A24ECA
function P_EVENT_RATING_SETTING_BeforeShowRow(& $sender)
{
    $P_EVENT_RATING_SETTING_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_RATING_SETTING; //Compatibility
//End P_EVENT_RATING_SETTING_BeforeShowRow

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
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_EVENT_RATING_SETTING_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_EVENT_RATING_SETTING_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_EVENT_RATING_SETTING->P_EVENT_RATING_SETTING_ID->GetValue() == $keyId) {
		$P_EVENT_RATING_SETTING->ADLink->Visible = true;
		$P_EVENT_RATING_SETTING->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_EVENT_RATING_SETTING->ADLink->Visible = false;
		$P_EVENT_RATING_SETTING->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_EVENT_RATING_SETTING_BeforeShowRow @2-3E95913F
    return $P_EVENT_RATING_SETTING_BeforeShowRow;
}
//End Close P_EVENT_RATING_SETTING_BeforeShowRow

//Page_OnInitializeView @1-DBC192EA
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_rating_setting; //Compatibility
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

//Page_BeforeShow @1-4313C39B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_rating_setting; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_EVENT_RATING_SETTINGSearch;
	global $P_EVENT_RATING_SETTING;
	global $P_EVENT_RATING_SETTING1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_EVENT_RATING_SETTINGSearch->Visible = false;
		$P_EVENT_RATING_SETTING->Visible = false;
		$P_EVENT_RATING_SETTING1->Visible = true;
		$P_EVENT_RATING_SETTING1->ds->SQL = "";
	} else {
		$P_EVENT_RATING_SETTINGSearch->Visible = true;
		$P_EVENT_RATING_SETTING->Visible = true;
		$P_EVENT_RATING_SETTING1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
