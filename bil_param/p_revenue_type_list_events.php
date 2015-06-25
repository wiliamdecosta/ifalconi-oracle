<?php
//BindEvents Method @1-C2CCB2B5
function BindEvents()
{
    global $P_REVENUE_TYPE_LIST;
    global $CCSEvents;
    $P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->CCSEvents["BeforeShow"] = "P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow";
    $P_REVENUE_TYPE_LIST->CCSEvents["BeforeShowRow"] = "P_REVENUE_TYPE_LIST_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow @7-95D7BA21
function P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow(& $sender)
{
    $P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REVENUE_TYPE_LIST; //Compatibility
//End P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Page = $FileName;
	$P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Parameters = CCRemoveParam($P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Parameters, "P_REVENUE_TYPE_LIST_ID");
	$P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Parameters = CCAddParam($P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow @7-726C6F5F
    return $P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow;
}
//End Close P_REVENUE_TYPE_LIST_P_REVENUE_TYPE_LIST_Insert_BeforeShow

//P_REVENUE_TYPE_LIST_BeforeShowRow @2-F25A7807
function P_REVENUE_TYPE_LIST_BeforeShowRow(& $sender)
{
    $P_REVENUE_TYPE_LIST_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REVENUE_TYPE_LIST; //Compatibility
//End P_REVENUE_TYPE_LIST_BeforeShowRow

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
	$keyId = CCGetFromGet("P_REVENUE_TYPE_LIST_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_REVENUE_TYPE_LIST_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_REVENUE_TYPE_LIST->P_REVENUE_TYPE_LIST_ID->GetValue() == $keyId) {
		$P_REVENUE_TYPE_LIST->ADLink->Visible = true;
		$P_REVENUE_TYPE_LIST->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_REVENUE_TYPE_LIST->ADLink->Visible = false;
		$P_REVENUE_TYPE_LIST->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_REVENUE_TYPE_LIST_BeforeShowRow @2-AB293AE8
    return $P_REVENUE_TYPE_LIST_BeforeShowRow;
}
//End Close P_REVENUE_TYPE_LIST_BeforeShowRow

//Page_OnInitializeView @1-108317B1
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_revenue_type_list; //Compatibility
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

//Page_BeforeShow @1-6C449EF5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_revenue_type_list; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REVENUE_TYPE_LISTSearch;
	global $P_REVENUE_TYPE_LIST;
	global $P_REVENUE_TYPE_LIST1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REVENUE_TYPE_LISTSearch->Visible = false;
		$P_REVENUE_TYPE_LIST->Visible = false;
		//$P_REVENUE_TYPE_LIST1->Visible = true;
		//$P_REVENUE_TYPE_LIST1->ds->SQL = "";
	} else {
		$P_REVENUE_TYPE_LISTSearch->Visible = true;
		$P_REVENUE_TYPE_LIST->Visible = true;
		//$P_REVENUE_TYPE_LIST1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
