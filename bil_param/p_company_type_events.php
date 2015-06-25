<?php
//BindEvents Method @1-43E9C829
function BindEvents()
{
    global $P_COMPANY_TYPE;
    global $CCSEvents;
    $P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->CCSEvents["BeforeShow"] = "P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow";
    $P_COMPANY_TYPE->CCSEvents["BeforeShowRow"] = "P_COMPANY_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow @7-FF936B15
function P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow(& $sender)
{
    $P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COMPANY_TYPE; //Compatibility
//End P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Page = $FileName;
	$P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Parameters = CCRemoveParam($P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Parameters, "P_COMPANY_TYPE_ID");
	$P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Parameters = CCAddParam($P_COMPANY_TYPE->P_COMPANY_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow @7-2FDE5522
    return $P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow;
}
//End Close P_COMPANY_TYPE_P_COMPANY_TYPE_Insert_BeforeShow

//P_COMPANY_TYPE_BeforeShowRow @2-CB01770D
function P_COMPANY_TYPE_BeforeShowRow(& $sender)
{
    $P_COMPANY_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COMPANY_TYPE; //Compatibility
//End P_COMPANY_TYPE_BeforeShowRow

//Set Row Style @53-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_COMPANY_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_COMPANY_TYPE->P_COMPANY_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_COMPANY_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_COMPANY_TYPE->P_COMPANY_TYPE_ID->GetValue() == $keyId) {
		$P_COMPANY_TYPE->ADLink->Visible = true;
		$P_COMPANY_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_COMPANY_TYPE->ADLink->Visible = false;
		$P_COMPANY_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_COMPANY_TYPE_BeforeShowRow @2-530E3A01
    return $P_COMPANY_TYPE_BeforeShowRow;
}
//End Close P_COMPANY_TYPE_BeforeShowRow

//Page_OnInitializeView @1-913D5946
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-B43663ED
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company_type; //Compatibility
//End Page_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_COMPANY_TYPESearch;
	global $P_COMPANY_TYPE;
	global $P_COMPANY_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1"){
		$P_COMPANY_TYPESearch->Visible = false;
		$P_COMPANY_TYPE->Visible = false;
		$P_COMPANY_TYPE1->Visible = true;
		$P_COMPANY_TYPE1->ds->SQL = "";
	} else {
		$P_COMPANY_TYPESearch->Visible = true;
		$P_COMPANY_TYPE->Visible = true;
		$P_COMPANY_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
