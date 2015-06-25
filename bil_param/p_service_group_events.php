<?php
//BindEvents Method @1-CCCE2912
function BindEvents()
{
    global $P_SERVICE_GROUP;
    global $CCSEvents;
    $P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->CCSEvents["BeforeShow"] = "P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow";
    $P_SERVICE_GROUP->CCSEvents["BeforeShowRow"] = "P_SERVICE_GROUP_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow @7-2DDDBE3A
function P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow(& $sender)
{
    $P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_GROUP; //Compatibility
//End P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Page = $FileName;
	$P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Parameters = CCRemoveParam($P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Parameters, "P_SERVICE_GROUP_ID");
	$P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Parameters = CCAddParam($P_SERVICE_GROUP->P_SERVICE_GROUP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow @7-FD0DD0CA
    return $P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow;
}
//End Close P_SERVICE_GROUP_P_SERVICE_GROUP_Insert_BeforeShow

//P_SERVICE_GROUP_BeforeShowRow @2-CAC77C9D
function P_SERVICE_GROUP_BeforeShowRow(& $sender)
{
    $P_SERVICE_GROUP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_GROUP; //Compatibility
//End P_SERVICE_GROUP_BeforeShowRow

//Set Row Style @59-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_SERVICE_GROUP_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SERVICE_GROUP->P_SERVICE_GROUP_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SERVICE_GROUP_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SERVICE_GROUP->P_SERVICE_GROUP_ID->GetValue() == $keyId) {
		$P_SERVICE_GROUP->ADLink->Visible = true;
		$P_SERVICE_GROUP->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SERVICE_GROUP->ADLink->Visible = false;
		$P_SERVICE_GROUP->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SERVICE_GROUP_BeforeShowRow @2-1E517F66
    return $P_SERVICE_GROUP_BeforeShowRow;
}
//End Close P_SERVICE_GROUP_BeforeShowRow

//Page_OnInitializeView @1-D504E85C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_group; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-94259906
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_service_group; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SERVICE_GROUPSearch;
	global $P_SERVICE_GROUP;
	global $P_SERVICE_GROUP1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SERVICE_GROUPSearch->Visible = false;
		$P_SERVICE_GROUP->Visible = false;
		$P_SERVICE_GROUP1->Visible = true;
		$P_SERVICE_GROUP1->ds->SQL = "";
	} else {
		$P_SERVICE_GROUPSearch->Visible = true;
		$P_SERVICE_GROUP->Visible = true;
		$P_SERVICE_GROUP1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
