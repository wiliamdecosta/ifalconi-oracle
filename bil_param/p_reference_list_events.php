<?php
//BindEvents Method @1-DC321A2F
function BindEvents()
{
    global $P_REFERENCE_LIST;
    global $CCSEvents;
    $P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->CCSEvents["BeforeShow"] = "P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow";
    $P_REFERENCE_LIST->CCSEvents["BeforeShowRow"] = "P_REFERENCE_LIST_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow @7-E3BF34EF
function P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow(& $sender)
{
    $P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REFERENCE_LIST; //Compatibility
//End P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Page = $FileName;
	$P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Parameters = CCRemoveParam($P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Parameters, "P_REFERENCE_LIST_ID");
	$P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Parameters = CCAddParam($P_REFERENCE_LIST->P_REFERENCE_LIST_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow @7-2C572EAC
    return $P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow;
}
//End Close P_REFERENCE_LIST_P_REFERENCE_LIST_Insert_BeforeShow

//P_REFERENCE_LIST_BeforeShowRow @2-CE08D367
function P_REFERENCE_LIST_BeforeShowRow(& $sender)
{
    $P_REFERENCE_LIST_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REFERENCE_LIST; //Compatibility
//End P_REFERENCE_LIST_BeforeShowRow

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
	$keyId = CCGetFromGet("P_REFERENCE_LIST_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_REFERENCE_LIST->P_REFERENCE_LIST_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_REFERENCE_LIST_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_REFERENCE_LIST->P_REFERENCE_LIST_ID->GetValue() == $keyId) {
		$P_REFERENCE_LIST->ADLink->Visible = true;
		$P_REFERENCE_LIST->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_REFERENCE_LIST->ADLink->Visible = false;
		$P_REFERENCE_LIST->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_REFERENCE_LIST_BeforeShowRow @2-3D29FAD2
    return $P_REFERENCE_LIST_BeforeShowRow;
}
//End Close P_REFERENCE_LIST_BeforeShowRow

//Page_OnInitializeView @1-4DEC2FDD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_reference_list; //Compatibility
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

//Page_BeforeShow @1-C613B646
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_reference_list; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REFERENCE_LISTSearch;
	global $P_REFERENCE_LIST;
	global $P_REFERENCE_LIST1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REFERENCE_LISTSearch->Visible = false;
		$P_REFERENCE_LIST->Visible = false;
		$P_REFERENCE_LIST1->Visible = true;
		$P_REFERENCE_LIST1->ds->SQL = "";
	} else {
		$P_REFERENCE_LISTSearch->Visible = true;
		$P_REFERENCE_LIST->Visible = true;
		$P_REFERENCE_LIST1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
