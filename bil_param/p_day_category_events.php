<?php
//BindEvents Method @1-D4560BB6
function BindEvents()
{
    global $P_DAY_CATEGORY;
    global $CCSEvents;
    $P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->CCSEvents["BeforeShow"] = "P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow";
    $P_DAY_CATEGORY->CCSEvents["BeforeShowRow"] = "P_DAY_CATEGORY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow @7-1B1D4B69
function P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow(& $sender)
{
    $P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DAY_CATEGORY; //Compatibility
//End P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow

//Custom Code @39-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Page = $FileName;
	$P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Parameters = CCRemoveParam($P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Parameters, "P_DAY_CATEGORY_ID");
	$P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Parameters = CCAddParam($P_DAY_CATEGORY->P_DAY_CATEGORY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow @7-0EDC8950
    return $P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow;
}
//End Close P_DAY_CATEGORY_P_DAY_CATEGORY_Insert_BeforeShow

//P_DAY_CATEGORY_BeforeShowRow @2-F4E21F5D
function P_DAY_CATEGORY_BeforeShowRow(& $sender)
{
    $P_DAY_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DAY_CATEGORY; //Compatibility
//End P_DAY_CATEGORY_BeforeShowRow

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
	$keyId = CCGetFromGet("P_DAY_CATEGORY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_DAY_CATEGORY->P_DAY_CATEGORY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_DAY_CATEGORY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_DAY_CATEGORY->P_DAY_CATEGORY_ID->GetValue() == $keyId) {
		$P_DAY_CATEGORY->ADLink->Visible = true;
		$P_DAY_CATEGORY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_DAY_CATEGORY->ADLink->Visible = false;
		$P_DAY_CATEGORY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_DAY_CATEGORY_BeforeShowRow @2-DA0E705F
    return $P_DAY_CATEGORY_BeforeShowRow;
}
//End Close P_DAY_CATEGORY_BeforeShowRow

//Page_OnInitializeView @1-3FDB781C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_day_category; //Compatibility
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

//Page_BeforeShow @1-1AD042B7
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_day_category; //Compatibility
//End Page_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_DAY_CATEGORYSearch;
	global $P_DAY_CATEGORY;
	global $P_DAY_CATEGORY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_DAY_CATEGORYSearch->Visible = false;
		$P_DAY_CATEGORY->Visible = false;
		$P_DAY_CATEGORY1->Visible = true;
		$P_DAY_CATEGORY1->ds->SQL = "";
	} else {
		$P_DAY_CATEGORYSearch->Visible = true;
		$P_DAY_CATEGORY->Visible = true;
		$P_DAY_CATEGORY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
