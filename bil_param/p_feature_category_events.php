<?php
//BindEvents Method @1-102B45D1
function BindEvents()
{
    global $P_FEATURE_CATEGORY;
    global $CCSEvents;
    $P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->CCSEvents["BeforeShow"] = "P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow";
    $P_FEATURE_CATEGORY->CCSEvents["BeforeShowRow"] = "P_FEATURE_CATEGORY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow @50-CCF0ABCE
function P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow(& $sender)
{
    $P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_CATEGORY; //Compatibility
//End P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Page = $FileName;
	$P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Parameters = CCRemoveParam($P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Parameters, "P_FEATURE_CATEGORY_ID");
	$P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Parameters = CCAddParam($P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow @50-22AABE05
    return $P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow;
}
//End Close P_FEATURE_CATEGORY_P_FEATURE_CATEGORY_Insert_BeforeShow

//P_FEATURE_CATEGORY_BeforeShowRow @2-1821ECCD
function P_FEATURE_CATEGORY_BeforeShowRow(& $sender)
{
    $P_FEATURE_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_CATEGORY; //Compatibility
//End P_FEATURE_CATEGORY_BeforeShowRow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_FEATURE_CATEGORY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_FEATURE_CATEGORY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_FEATURE_CATEGORY->P_FEATURE_CATEGORY_ID->GetValue() == $keyId) {
		$P_FEATURE_CATEGORY->ADLink->Visible = true;
		$P_FEATURE_CATEGORY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_FEATURE_CATEGORY->ADLink->Visible = false;
		$P_FEATURE_CATEGORY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code





//Set Row Style @54-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Close P_FEATURE_CATEGORY_BeforeShowRow @2-EEAB9687
    return $P_FEATURE_CATEGORY_BeforeShowRow;
}
//End Close P_FEATURE_CATEGORY_BeforeShowRow

//Page_OnInitializeView @1-A32A49CE
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_category; //Compatibility
//End Page_OnInitializeView

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-B84CBA00
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_category; //Compatibility
//End Page_BeforeShow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FEATURE_CATEGORYSearch;
	global $P_FEATURE_CATEGORY;
	global $p_feature_category1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FEATURE_CATEGORYSearch->Visible = false;
		$P_FEATURE_CATEGORY->Visible = false;
		$p_feature_category1->Visible = true;
		$p_feature_category1->ds->SQL = "";
	} else {
		$P_FEATURE_CATEGORYSearch->Visible = true;
		$P_FEATURE_CATEGORY->Visible = true;
		$p_feature_category1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
