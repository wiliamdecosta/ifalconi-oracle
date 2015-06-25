<?php
//BindEvents Method @1-9F0DD2F3
function BindEvents()
{
    global $P_ACCOUNT_REP;
    global $CCSEvents;
    $P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->CCSEvents["BeforeShow"] = "P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow";
    $P_ACCOUNT_REP->CCSEvents["BeforeShowRow"] = "P_ACCOUNT_REP_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow @7-4D9310CE
function P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow(& $sender)
{
    $P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_REP; //Compatibility
//End P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow

//Custom Code @76-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Page = $FileName;
	$P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Parameters = CCRemoveParam($P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Parameters, "P_ACCOUNT_REP_ID");
	$P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Parameters = CCAddParam($P_ACCOUNT_REP->P_ACCOUNT_REP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow @7-1FD146F2
    return $P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow;
}
//End Close P_ACCOUNT_REP_P_ACCOUNT_REP_Insert_BeforeShow

//P_ACCOUNT_REP_BeforeShowRow @2-63C104B1
function P_ACCOUNT_REP_BeforeShowRow(& $sender)
{
    $P_ACCOUNT_REP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCOUNT_REP; //Compatibility
//End P_ACCOUNT_REP_BeforeShowRow

//Set Row Style @82-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @83-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_ACCOUNT_REP_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_ACCOUNT_REP->P_ACCOUNT_REP_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_ACCOUNT_REP_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_ACCOUNT_REP->P_ACCOUNT_REP_ID->GetValue() == $keyId) {
		$P_ACCOUNT_REP->ADLink->Visible = true;
		$P_ACCOUNT_REP->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_ACCOUNT_REP->ADLink->Visible = false;
		$P_ACCOUNT_REP->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_ACCOUNT_REP_BeforeShowRow @2-3A1BE0AD
    return $P_ACCOUNT_REP_BeforeShowRow;
}
//End Close P_ACCOUNT_REP_BeforeShowRow

//Page_OnInitializeView @1-2890D5E6
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_account_rep; //Compatibility
//End Page_OnInitializeView

//Custom Code @84-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-4C78DE54
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_account_rep; //Compatibility
//End Page_BeforeShow

//Custom Code @85-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ACCOUNT_REPSearch;
	global $P_ACCOUNT_REP;
	global $P_ACCOUNT_REP1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ACCOUNT_REPSearch->Visible = false;
		$P_ACCOUNT_REP->Visible = false;
		//$P_ACCOUNT_REP1->Visible = true;
		//$P_ACCOUNT_REP1->ds->SQL = "";
	} else {
		$P_ACCOUNT_REPSearch->Visible = true;
		$P_ACCOUNT_REP->Visible = true;
		//$P_ACCOUNT_REP1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow



?>