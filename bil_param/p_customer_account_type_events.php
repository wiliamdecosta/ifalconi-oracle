<?php
//BindEvents Method @1-D4A21624
function BindEvents()
{
    global $P_CUSTOMER_ACCOUNT_TYPE;
    global $CCSEvents;
    $P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->CCSEvents["BeforeShow"] = "P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow";
    $P_CUSTOMER_ACCOUNT_TYPE->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow @7-AC3F5C82
function P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow(& $sender)
{
    $P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_ACCOUNT_TYPE; //Compatibility
//End P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow

//Custom Code @39-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Page = $FileName;
	$P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Parameters = CCRemoveParam($P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Parameters, "P_CUSTOMER_ACCOUNT_TYPE_ID");
	$P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Parameters = CCAddParam($P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow @7-3CB2BAD6
    return $P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow;
}
//End Close P_CUSTOMER_ACCOUNT_TYPE_P_CUSTOMER_ACCOUNT_TYPE_Insert_BeforeShow

//P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow @2-D5BA8CA8
function P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_ACCOUNT_TYPE; //Compatibility
//End P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow

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
	$keyId = CCGetFromGet("P_CUSTOMER_ACCOUNT_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CUSTOMER_ACCOUNT_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CUSTOMER_ACCOUNT_TYPE->P_CUSTOMER_ACCOUNT_TYPE_ID->GetValue() == $keyId) {
		$P_CUSTOMER_ACCOUNT_TYPE->ADLink->Visible = true;
		$P_CUSTOMER_ACCOUNT_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CUSTOMER_ACCOUNT_TYPE->ADLink->Visible = false;
		$P_CUSTOMER_ACCOUNT_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow @2-B6B4D77F
    return $P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow;
}
//End Close P_CUSTOMER_ACCOUNT_TYPE_BeforeShowRow

//Page_OnInitializeView @1-A8737FD0
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_account_type; //Compatibility
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

//Page_BeforeShow @1-8FE9EC2B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_account_type; //Compatibility
//End Page_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CUSTOMER_ACCOUNT_TYPESearch;
	global $P_CUSTOMER_ACCOUNT_TYPE;
	global $P_CUSTOMER_ACCOUNT_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CUSTOMER_ACCOUNT_TYPESearch->Visible = false;
		$P_CUSTOMER_ACCOUNT_TYPE->Visible = false;
		$P_CUSTOMER_ACCOUNT_TYPE1->Visible = true;
		$P_CUSTOMER_ACCOUNT_TYPE1->ds->SQL = "";
	} else {
		$P_CUSTOMER_ACCOUNT_TYPESearch->Visible = true;
		$P_CUSTOMER_ACCOUNT_TYPE->Visible = true;
		$P_CUSTOMER_ACCOUNT_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
