<?php
//BindEvents Method @1-F6759387
function BindEvents()
{
    global $P_SERVICE_CATEGORY;
    global $CCSEvents;
    $P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->CCSEvents["BeforeShow"] = "P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow";
    $P_SERVICE_CATEGORY->CCSEvents["BeforeShowRow"] = "P_SERVICE_CATEGORY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow @7-27A6A571
function P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow(& $sender)
{
    $P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_CATEGORY; //Compatibility
//End P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow

//Custom Code @81-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Page = $FileName;
	$P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Parameters = CCRemoveParam($P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Parameters, "P_SERVICE_CATEGORY_ID");
	$P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Parameters = CCAddParam($P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow @7-D5E82408
    return $P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow;
}
//End Close P_SERVICE_CATEGORY_P_SERVICE_CATEGORY_Insert_BeforeShow

//P_SERVICE_CATEGORY_BeforeShowRow @2-E9910869
function P_SERVICE_CATEGORY_BeforeShowRow(& $sender)
{
    $P_SERVICE_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_CATEGORY; //Compatibility
//End P_SERVICE_CATEGORY_BeforeShowRow

//Set Row Style @87-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_SERVICE_CATEGORY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SERVICE_CATEGORY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_ID->GetValue() == $keyId) {
		$P_SERVICE_CATEGORY->ADLink->Visible = true;
		$P_SERVICE_CATEGORY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SERVICE_CATEGORY->ADLink->Visible = false;
		$P_SERVICE_CATEGORY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SERVICE_CATEGORY_BeforeShowRow @2-A13F31E4
    return $P_SERVICE_CATEGORY_BeforeShowRow;
}
//End Close P_SERVICE_CATEGORY_BeforeShowRow

//Page_OnInitializeView @1-ECBEEEAD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_category; //Compatibility
//End Page_OnInitializeView

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F7D81D63
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_category; //Compatibility
//End Page_BeforeShow

//Custom Code @90-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SERVICE_CATEGORYSearch;
	global $P_SERVICE_CATEGORY;
	global $P_SERVICE_CATEGORY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SERVICE_CATEGORYSearch->Visible = false;
		$P_SERVICE_CATEGORY->Visible = false;
		$P_SERVICE_CATEGORY1->Visible = true;
		$P_SERVICE_CATEGORY1->ds->SQL = "";
	} else {
		$P_SERVICE_CATEGORYSearch->Visible = true;
		$P_SERVICE_CATEGORY->Visible = true;
		$P_SERVICE_CATEGORY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
