<?php
//BindEvents Method @1-0FF7F018
function BindEvents()
{
    global $P_COUNTRY;
    global $CCSEvents;
    $P_COUNTRY->P_COUNTRY_Insert->CCSEvents["BeforeShow"] = "P_COUNTRY_P_COUNTRY_Insert_BeforeShow";
    $P_COUNTRY->CCSEvents["BeforeShowRow"] = "P_COUNTRY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_COUNTRY_P_COUNTRY_Insert_BeforeShow @7-1E2EA4F9
function P_COUNTRY_P_COUNTRY_Insert_BeforeShow(& $sender)
{
    $P_COUNTRY_P_COUNTRY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COUNTRY; //Compatibility
//End P_COUNTRY_P_COUNTRY_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_COUNTRY->P_COUNTRY_Insert->Page = $FileName;
	$P_COUNTRY->P_COUNTRY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_COUNTRY->P_COUNTRY_Insert->Parameters = CCRemoveParam($P_COUNTRY->P_COUNTRY_Insert->Parameters, "P_COUNTRY_ID");
	$P_COUNTRY->P_COUNTRY_Insert->Parameters = CCAddParam($P_COUNTRY->P_COUNTRY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_COUNTRY_P_COUNTRY_Insert_BeforeShow @7-4414CEC7
    return $P_COUNTRY_P_COUNTRY_Insert_BeforeShow;
}
//End Close P_COUNTRY_P_COUNTRY_Insert_BeforeShow

//P_COUNTRY_BeforeShowRow @2-066662DC
function P_COUNTRY_BeforeShowRow(& $sender)
{
    $P_COUNTRY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COUNTRY; //Compatibility
//End P_COUNTRY_BeforeShowRow

//Set Row Style @58-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_COUNTRY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_COUNTRY->P_COUNTRY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_COUNTRY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_COUNTRY->P_COUNTRY_ID->GetValue() == $keyId) {
		$P_COUNTRY->ADLink->Visible = true;
		$P_COUNTRY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_COUNTRY->ADLink->Visible = false;
		$P_COUNTRY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_COUNTRY_BeforeShowRow @2-85F503AF
    return $P_COUNTRY_BeforeShowRow;
}
//End Close P_COUNTRY_BeforeShowRow

//Page_OnInitializeView @1-F462C6E8
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_country; //Compatibility
//End Page_OnInitializeView

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0C8D6C6D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_country; //Compatibility
//End Page_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_COUNTRYSearch;
	global $P_COUNTRY;
	global $P_COUNTRY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_COUNTRYSearch->Visible = false;
		$P_COUNTRY->Visible = false;
		$P_COUNTRY1->Visible = true;
		$P_COUNTRY1->ds->SQL = "";
	} else {
		$P_COUNTRYSearch->Visible = true;
		$P_COUNTRY->Visible = true;
		$P_COUNTRY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
