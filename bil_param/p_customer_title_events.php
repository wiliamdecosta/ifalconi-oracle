<?php
//BindEvents Method @1-D1B97B2B
function BindEvents()
{
    global $P_CUSTOMER_TITLE;
    global $CCSEvents;
    $P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->CCSEvents["BeforeShow"] = "P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow";
    $P_CUSTOMER_TITLE->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_TITLE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow @7-C8786B4C
function P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow(& $sender)
{
    $P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_TITLE; //Compatibility
//End P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->Page = $FileName;
	$P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->Parameters = CCRemoveParam($P_CUSTOMER_TITLE->P_ACCESS_LEVEL_Insert->Parameters, "P_CUSTOMER_TITLE_ID");
	$P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->Parameters = CCAddParam($P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow @7-71416FD9
    return $P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow;
}
//End Close P_CUSTOMER_TITLE_P_CUSTOMER_TITLE_Insert_BeforeShow

//P_CUSTOMER_TITLE_BeforeShowRow @2-9B0ACBA5
function P_CUSTOMER_TITLE_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_TITLE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_TITLE; //Compatibility
//End P_CUSTOMER_TITLE_BeforeShowRow

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
	$keyId = CCGetFromGet("P_CUSTOMER_TITLE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CUSTOMER_TITLE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CUSTOMER_TITLE->P_CUSTOMER_TITLE_ID->GetValue() == $keyId) {
		$P_CUSTOMER_TITLE->ADLink->Visible = true;
		$P_CUSTOMER_TITLE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CUSTOMER_TITLE->ADLink->Visible = false;
		$P_CUSTOMER_TITLE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CUSTOMER_TITLE_BeforeShowRow @2-F2831374
    return $P_CUSTOMER_TITLE_BeforeShowRow;
}
//End Close P_CUSTOMER_TITLE_BeforeShowRow

//Page_OnInitializeView @1-9D117160
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_title; //Compatibility
//End Page_OnInitializeView

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CUSTOMER_TITLESearch;
	global $P_CUSTOMER_TITLE;
	global $P_CUSTOMER_TITLE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CUSTOMER_TITLESearch->Visible = false;
		$P_CUSTOMER_TITLE->Visible = false;
		//$P_CUSTOMER_TITLE1->Visible = true;
		//$P_CUSTOMER_TITLE1->ds->SQL = "";
	} else {
		$P_CUSTOMER_TITLESearch->Visible = true;
		$P_CUSTOMER_TITLE->Visible = true;
		//$P_CUSTOMER_TITLE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView




?>