<?php
//BindEvents Method @1-13183E04
function BindEvents()
{
    global $P_SALES_FEE_TYPE;
    global $CCSEvents;
    $P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->CCSEvents["BeforeShow"] = "P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow";
    $P_SALES_FEE_TYPE->CCSEvents["BeforeShowRow"] = "P_SALES_FEE_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow @7-AFB132B5
function P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow(& $sender)
{
    $P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SALES_FEE_TYPE; //Compatibility
//End P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Page = $FileName;
	$P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Parameters = CCRemoveParam($P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Parameters, "P_SALES_FEE_TYPE_ID");
	$P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Parameters = CCAddParam($P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow @7-3E9EC2D7
    return $P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow;
}
//End Close P_SALES_FEE_TYPE_P_SALES_FEE_TYPE_Insert_BeforeShow

//P_SALES_FEE_TYPE_BeforeShowRow @2-2ABD24F4
function P_SALES_FEE_TYPE_BeforeShowRow(& $sender)
{
    $P_SALES_FEE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SALES_FEE_TYPE; //Compatibility
//End P_SALES_FEE_TYPE_BeforeShowRow

//Set Row Style @57-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_SALES_FEE_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SALES_FEE_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SALES_FEE_TYPE->P_SALES_FEE_TYPE_ID->GetValue() == $keyId) {
		$P_SALES_FEE_TYPE->ADLink->Visible = true;
		$P_SALES_FEE_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SALES_FEE_TYPE->ADLink->Visible = false;
		$P_SALES_FEE_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SALES_FEE_TYPE_BeforeShowRow @2-706DDACF
    return $P_SALES_FEE_TYPE_BeforeShowRow;
}
//End Close P_SALES_FEE_TYPE_BeforeShowRow

//Page_OnInitializeView @1-B086411C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_sales_fee_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-3B79D887
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_sales_fee_type; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SALES_FEE_TYPESearch;
	global $P_SALES_FEE_TYPE;
	global $P_SALES_FEE_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SALES_FEE_TYPESearch->Visible = false;
		$P_SALES_FEE_TYPE->Visible = false;
		//$P_SALES_FEE_TYPE1->Visible = true;
		//$P_SALES_FEE_TYPE1->ds->SQL = "";
	} else {
		$P_SALES_FEE_TYPESearch->Visible = true;
		$P_SALES_FEE_TYPE->Visible = true;
		//$P_SALES_FEE_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
