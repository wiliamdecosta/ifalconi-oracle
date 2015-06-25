<?php
//BindEvents Method @1-BAFB6ED9
function BindEvents()
{
    global $P_ACCOUNT_REP_INFO;
    global $CCSEvents;
    $P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->CCSEvents["BeforeShow"] = "P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow";
    $P_ACCOUNT_REP_INFO->CCSEvents["BeforeShowRow"] = "P_ACCOUNT_REP_INFO_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow @7-9DDD36A6
function P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow(& $sender)
{
    $P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_REP_INFO; //Compatibility
//End P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Page = $FileName;
	$P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Parameters = CCRemoveParam($P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Parameters, "P_ACCOUNT_REP_INFO_ID");
	$P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Parameters = CCAddParam($P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow @7-F19AC0EA
    return $P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow;
}
//End Close P_ACCOUNT_REP_INFO_P_ACCOUNT_REP_INFO_Insert_BeforeShow

//P_ACCOUNT_REP_INFO_BeforeShowRow @2-8300A9F8
function P_ACCOUNT_REP_INFO_BeforeShowRow(& $sender)
{
    $P_ACCOUNT_REP_INFO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_REP_INFO; //Compatibility
//End P_ACCOUNT_REP_INFO_BeforeShowRow

//Set Row Style @62-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_ACCOUNT_REP_INFO_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_ACCOUNT_REP_INFO_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_ACCOUNT_REP_INFO->P_ACCOUNT_REP_INFO_ID->GetValue() == $keyId) {
		$P_ACCOUNT_REP_INFO->ADLink->Visible = true;
		$P_ACCOUNT_REP_INFO->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_ACCOUNT_REP_INFO->ADLink->Visible = false;
		$P_ACCOUNT_REP_INFO->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_ACCOUNT_REP_INFO_BeforeShowRow @2-465EA460
    return $P_ACCOUNT_REP_INFO_BeforeShowRow;
}
//End Close P_ACCOUNT_REP_INFO_BeforeShowRow

//Page_OnInitializeView @1-9C175EF1
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_account_rep_info; //Compatibility
//End Page_OnInitializeView

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-8771AD3F
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_account_rep_info; //Compatibility
//End Page_BeforeShow

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ACCOUNT_REP_INFOSearch;
	global $P_ACCOUNT_REP_INFO;
	global $P_ACCOUNT_REP_INFO1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ACCOUNT_REP_INFOSearch->Visible = false;
		$P_ACCOUNT_REP_INFO->Visible = false;
		$P_ACCOUNT_REP_INFO1->Visible = true;
		$P_ACCOUNT_REP_INFO1->ds->SQL = "";
	} else {
		$P_ACCOUNT_REP_INFOSearch->Visible = true;
		$P_ACCOUNT_REP_INFO->Visible = true;
		$P_ACCOUNT_REP_INFO1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
