<?php
//BindEvents Method @1-CDD3746F
function BindEvents()
{
    global $P_ORGANIZATION;
    global $CCSEvents;
    $P_ORGANIZATION->P_ORGANIZATION_Insert->CCSEvents["BeforeShow"] = "P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow";
    $P_ORGANIZATION->CCSEvents["BeforeShowRow"] = "P_ORGANIZATION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow @7-2C9B9AF5
function P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow(& $sender)
{
    $P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ORGANIZATION; //Compatibility
//End P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow

//Custom Code @104-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ORGANIZATION->P_ORGANIZATION_Insert->Page = $FileName;
	$P_ORGANIZATION->P_ORGANIZATION_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ORGANIZATION->P_ORGANIZATION_Insert->Parameters = CCRemoveParam($P_ORGANIZATION->P_ORGANIZATION_Insert->Parameters, "P_ORGANIZATION_ID");
	$P_ORGANIZATION->P_ORGANIZATION_Insert->Parameters = CCAddParam($P_ORGANIZATION->P_ORGANIZATION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow @7-55F61092
    return $P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow;
}
//End Close P_ORGANIZATION_P_ORGANIZATION_Insert_BeforeShow

//P_ORGANIZATION_BeforeShowRow @2-2921395A
function P_ORGANIZATION_BeforeShowRow(& $sender)
{
    $P_ORGANIZATION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ORGANIZATION; //Compatibility
//End P_ORGANIZATION_BeforeShowRow

//Set Row Style @109-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @110-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_ORGANIZATION_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_ORGANIZATION->P_ORGANIZATION_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_ORGANIZATION_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_ORGANIZATION->P_ORGANIZATION_ID->GetValue() == $keyId) {
		$P_ORGANIZATION->ADLink->Visible = true;
		$P_ORGANIZATION->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_ORGANIZATION->ADLink->Visible = false;
		$P_ORGANIZATION->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_ORGANIZATION_BeforeShowRow @2-3C590DEE
    return $P_ORGANIZATION_BeforeShowRow;
}
//End Close P_ORGANIZATION_BeforeShowRow

//Page_OnInitializeView @1-69A24B71
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_organization; //Compatibility
//End Page_OnInitializeView

//Custom Code @111-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Custom Code @112-2A29BDB7
// -------------------------
    // Write your own code here.
	
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-4CA971DA
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_organization; //Compatibility
//End Page_BeforeShow

//Custom Code @113-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ORGANIZATIONSearch;
	global $P_ORGANIZATION;
	global $P_ORGANIZATION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ORGANIZATIONSearch->Visible = false;
		$P_ORGANIZATION->Visible = false;
		$P_ORGANIZATION1->Visible = true;
		$P_ORGANIZATION1->ds->SQL = "";
	} else {
		$P_ORGANIZATIONSearch->Visible = true;
		$P_ORGANIZATION->Visible = true;
		$P_ORGANIZATION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
