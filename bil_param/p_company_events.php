<?php
//BindEvents Method @1-BAC353E2
function BindEvents()
{
    global $P_COMPANY;
    global $CCSEvents;
    $P_COMPANY->P_COMPANY_Insert->CCSEvents["BeforeShow"] = "P_COMPANY_P_COMPANY_Insert_BeforeShow";
    $P_COMPANY->CCSEvents["BeforeShowRow"] = "P_COMPANY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_COMPANY_P_COMPANY_Insert_BeforeShow @7-FF26AD61
function P_COMPANY_P_COMPANY_Insert_BeforeShow(& $sender)
{
    $P_COMPANY_P_COMPANY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COMPANY; //Compatibility
//End P_COMPANY_P_COMPANY_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_COMPANY->P_COMPANY_Insert->Page = $FileName;
	$P_COMPANY->P_COMPANY_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_COMPANY->P_COMPANY_Insert->Parameters = CCRemoveParam($P_COMPANY->P_COMPANY_Insert->Parameters, "P_COMPANY_ID");
	$P_COMPANY->P_COMPANY_Insert->Parameters = CCAddParam($P_COMPANY->P_COMPANY_Insert->Parameters, "TAMBAH", "1");

// -------------------------
//End Custom Code

//Close P_COMPANY_P_COMPANY_Insert_BeforeShow @7-C4485C35
    return $P_COMPANY_P_COMPANY_Insert_BeforeShow;
}
//End Close P_COMPANY_P_COMPANY_Insert_BeforeShow

//P_COMPANY_BeforeShowRow @2-9E9F922A
function P_COMPANY_BeforeShowRow(& $sender)
{
    $P_COMPANY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COMPANY; //Compatibility
//End P_COMPANY_BeforeShowRow

//Set Row Style @123-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @124-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_COMPANY_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_COMPANY->P_COMPANY_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_COMPANY_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_COMPANY->P_COMPANY_ID->GetValue() == $keyId) {
		$P_COMPANY->ADLink->Visible = true;
		$P_COMPANY->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_COMPANY->ADLink->Visible = false;
		$P_COMPANY->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_COMPANY_BeforeShowRow @2-0D4F6BD5
    return $P_COMPANY_BeforeShowRow;
}
//End Close P_COMPANY_BeforeShowRow

//Page_OnInitializeView @1-7CD8AE92
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company; //Compatibility
//End Page_OnInitializeView

//Custom Code @125-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-84370417
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company; //Compatibility
//End Page_BeforeShow

//Custom Code @126-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_COMPANYSearch;
	global $P_COMPANY;
	global $P_COMPANY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_COMPANYSearch->Visible = false;
		$P_COMPANY->Visible = false;
		$P_COMPANY1->Visible = true;
		$P_COMPANY1->ds->SQL = "";
	} else {
		$P_COMPANYSearch->Visible = true;
		$P_COMPANY->Visible = true;
		$P_COMPANY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
