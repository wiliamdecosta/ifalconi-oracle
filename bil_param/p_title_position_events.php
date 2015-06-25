<?php
//BindEvents Method @1-071F77B2
function BindEvents()
{
    global $P_TITLE_POSITION;
    global $CCSEvents;
    $P_TITLE_POSITION->P_TITLE_POSITION_Insert->CCSEvents["BeforeShow"] = "P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow";
    $P_TITLE_POSITION->CCSEvents["BeforeShowRow"] = "P_TITLE_POSITION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow @7-DB1E8FDB
function P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow(& $sender)
{
    $P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TITLE_POSITION; //Compatibility
//End P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_TITLE_POSITION->P_TITLE_POSITION_Insert->Page = $FileName;
	$P_TITLE_POSITION->P_TITLE_POSITION_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_TITLE_POSITION->P_TITLE_POSITION_Insert->Parameters = CCRemoveParam($P_TITLE_POSITION->P_TITLE_POSITION_Insert->Parameters, "P_TITLE_POSITION_ID");
	$P_TITLE_POSITION->P_TITLE_POSITION_Insert->Parameters = CCAddParam($P_TITLE_POSITION->P_TITLE_POSITION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow @7-0E6393AD
    return $P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow;
}
//End Close P_TITLE_POSITION_P_TITLE_POSITION_Insert_BeforeShow

//P_TITLE_POSITION_BeforeShowRow @2-7C6F7771
function P_TITLE_POSITION_BeforeShowRow(& $sender)
{
    $P_TITLE_POSITION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TITLE_POSITION; //Compatibility
//End P_TITLE_POSITION_BeforeShowRow

//Set Row Style @50-BEA8E266
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("RowStyle", $Style);
    }
//End Set Row Style

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_TITLE_POSITION_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_TITLE_POSITION->P_TITLE_POSITION_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_TITLE_POSITION_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_TITLE_POSITION->P_TITLE_POSITION_ID->GetValue() == $keyId) {
		$P_TITLE_POSITION->ADLink->Visible = true;
		$P_TITLE_POSITION->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_TITLE_POSITION->ADLink->Visible = false;
		$P_TITLE_POSITION->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_TITLE_POSITION_BeforeShowRow @2-7E53A946
    return $P_TITLE_POSITION_BeforeShowRow;
}
//End Close P_TITLE_POSITION_BeforeShowRow

//Page_OnInitializeView @1-2970174D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_title_position; //Compatibility
//End Page_OnInitializeView

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A28F8ED6
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_title_position; //Compatibility
//End Page_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TITLE_POSITIONSearch;
	global $P_TITLE_POSITION;
	global $P_TITLE_POSITION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_TITLE_POSITIONSearch->Visible = false;
		$P_TITLE_POSITION->Visible = false;
		$P_TITLE_POSITION1->Visible = true;
		$P_TITLE_POSITION1->ds->SQL = "";
	} else {
		$P_TITLE_POSITIONSearch->Visible = true;
		$P_TITLE_POSITION->Visible = true;
		$P_TITLE_POSITION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
