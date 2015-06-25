<?php
//BindEvents Method @1-81C9AD56
function BindEvents()
{
    global $P_COVERAGE_AREA;
    global $CCSEvents;
    $P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->CCSEvents["BeforeShow"] = "P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow";
    $P_COVERAGE_AREA->CCSEvents["BeforeShowRow"] = "P_COVERAGE_AREA_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow @7-E0B1D377
function P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow(& $sender)
{
    $P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COVERAGE_AREA; //Compatibility
//End P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Page = $FileName;
	$P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Parameters = CCRemoveParam($P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Parameters, "P_COVERAGE_AREA_ID");
	$P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Parameters = CCAddParam($P_COVERAGE_AREA->P_COVERAGE_AREA_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow @7-7F4BC02B
    return $P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow;
}
//End Close P_COVERAGE_AREA_P_COVERAGE_AREA_Insert_BeforeShow

//P_COVERAGE_AREA_BeforeShowRow @2-743387EC
function P_COVERAGE_AREA_BeforeShowRow(& $sender)
{
    $P_COVERAGE_AREA_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COVERAGE_AREA; //Compatibility
//End P_COVERAGE_AREA_BeforeShowRow

//Set Row Style @61-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_COVERAGE_AREA_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_COVERAGE_AREA->P_COVERAGE_AREA_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_COVERAGE_AREA_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_COVERAGE_AREA->P_COVERAGE_AREA_ID->GetValue() == $keyId) {
		$P_COVERAGE_AREA->ADLink->Visible = true;
		$P_COVERAGE_AREA->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_COVERAGE_AREA->ADLink->Visible = false;
		$P_COVERAGE_AREA->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_COVERAGE_AREA_BeforeShowRow @2-5FE5DDBF
    return $P_COVERAGE_AREA_BeforeShowRow;
}
//End Close P_COVERAGE_AREA_BeforeShowRow

//Page_OnInitializeView @1-8BE7FD9E
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_coverage_area; //Compatibility
//End Page_OnInitializeView

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-CAC68CC4
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_coverage_area; //Compatibility
//End Page_BeforeShow

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_COVERAGE_AREASearch;
	global $P_COVERAGE_AREA;
	global $P_COVERAGE_AREA1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_COVERAGE_AREASearch->Visible = false;
		$P_COVERAGE_AREA->Visible = false;
		$P_COVERAGE_AREA1->Visible = true;
		$P_COVERAGE_AREA1->ds->SQL = "";
	} else {
		$P_COVERAGE_AREASearch->Visible = true;
		$P_COVERAGE_AREA->Visible = true;
		$P_COVERAGE_AREA1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
