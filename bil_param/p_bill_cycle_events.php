<?php
//BindEvents Method @1-BCA754C5
function BindEvents()
{
    global $P_BILL_CYCLE;
    global $CCSEvents;
    $P_BILL_CYCLE->P_BILL_CYCLE_Insert->CCSEvents["BeforeShow"] = "P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow";
    $P_BILL_CYCLE->CCSEvents["BeforeShowRow"] = "P_BILL_CYCLE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow @7-94A63F5C
function P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow(& $sender)
{
    $P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_CYCLE; //Compatibility
//End P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow

//Custom Code @68-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Page = $FileName;
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCRemoveParam($P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters, "P_BILL_CYCLE_ID");
	$P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters = CCAddParam($P_BILL_CYCLE->P_BILL_CYCLE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow @7-37E66161
    return $P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow;
}
//End Close P_BILL_CYCLE_P_BILL_CYCLE_Insert_BeforeShow

//P_BILL_CYCLE_BeforeShowRow @2-C215AF65
function P_BILL_CYCLE_BeforeShowRow(& $sender)
{
    $P_BILL_CYCLE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_CYCLE; //Compatibility
//End P_BILL_CYCLE_BeforeShowRow

//Set Row Style @69-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_BILL_CYCLE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_BILL_CYCLE->P_BILL_CYCLE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_BILL_CYCLE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_BILL_CYCLE->P_BILL_CYCLE_ID->GetValue() == $keyId) {
		$P_BILL_CYCLE->ADLink->Visible = true;
		$P_BILL_CYCLE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_BILL_CYCLE->ADLink->Visible = false;
		$P_BILL_CYCLE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_BILL_CYCLE_BeforeShowRow @2-5C53B85A
    return $P_BILL_CYCLE_BeforeShowRow;
}
//End Close P_BILL_CYCLE_BeforeShowRow

//Page_OnInitializeView @1-38839223
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_cycle; //Compatibility
//End Page_OnInitializeView

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-BB20E03A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_cycle; //Compatibility
//End Page_BeforeShow

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_CYCLESearch;
	global $P_BILL_CYCLE;
	global $P_BILL_CYCLE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_CYCLESearch->Visible = false;
		$P_BILL_CYCLE->Visible = false;
		$P_BILL_CYCLE1->Visible = true;
		$P_BILL_CYCLE1->ds->SQL = "";
	} else {
		$P_BILL_CYCLESearch->Visible = true;
		$P_BILL_CYCLE->Visible = true;
		$P_BILL_CYCLE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
