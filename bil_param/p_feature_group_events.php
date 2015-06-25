<?php
//BindEvents Method @1-C01293F1
function BindEvents()
{
    global $P_FEATURE_GROUP;
    global $CCSEvents;
    $P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->CCSEvents["BeforeShow"] = "P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow";
    $P_FEATURE_GROUP->CCSEvents["BeforeShowRow"] = "P_FEATURE_GROUP_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow @7-CA18F6A1
function P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow(& $sender)
{
    $P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_GROUP; //Compatibility
//End P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Page = $FileName;
	$P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Parameters = CCRemoveParam($P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Parameters, "P_FEATURE_GROUP_ID");
	$P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Parameters = CCAddParam($P_FEATURE_GROUP->P_FEATURE_GROUP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow @7-28095F69
    return $P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow;
}
//End Close P_FEATURE_GROUP_P_FEATURE_GROUP_Insert_BeforeShow

//P_FEATURE_GROUP_BeforeShowRow @2-1655C5DB
function P_FEATURE_GROUP_BeforeShowRow(& $sender)
{
    $P_FEATURE_GROUP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_GROUP; //Compatibility
//End P_FEATURE_GROUP_BeforeShowRow

//Set Row Style @64-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_FEATURE_GROUP_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_FEATURE_GROUP->P_FEATURE_GROUP_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_FEATURE_GROUP_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_FEATURE_GROUP->P_FEATURE_GROUP_ID->GetValue() == $keyId) {
		$P_FEATURE_GROUP->ADLink->Visible = true;
		$P_FEATURE_GROUP->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_FEATURE_GROUP->ADLink->Visible = false;
		$P_FEATURE_GROUP->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_FEATURE_GROUP_BeforeShowRow @2-25B56057
    return $P_FEATURE_GROUP_BeforeShowRow;
}
//End Close P_FEATURE_GROUP_BeforeShowRow

//Page_OnInitializeView @1-EEE0F76D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_group; //Compatibility
//End Page_OnInitializeView

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-AFC18637
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_group; //Compatibility
//End Page_BeforeShow

//Custom Code @67-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FEATURE_GROUPSearch;
	global $P_FEATURE_GROUP;
	global $P_APP_ROLE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FEATURE_GROUPSearch->Visible = false;
		$P_FEATURE_GROUP->Visible = false;
		$p_feature_group1->Visible = true;
		$p_feature_group1->ds->SQL = "";
	} else {
		$P_FEATURE_GROUPSearch->Visible = true;
		$P_FEATURE_GROUP->Visible = true;
		$p_feature_group1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
