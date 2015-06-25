<?php
//BindEvents Method @1-AEAC05DF
function BindEvents()
{
    global $P_FEATURE_TYPE;
    global $CCSEvents;
    $P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->CCSEvents["BeforeShow"] = "P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow";
    $P_FEATURE_TYPE->CCSEvents["BeforeShowRow"] = "P_FEATURE_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow @7-E36F7F79
function P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow(& $sender)
{
    $P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_TYPE; //Compatibility
//End P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Page = $FileName;
	$P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Parameters = CCRemoveParam($P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Parameters, "P_FEATURE_TYPE_ID");
	$P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Parameters = CCAddParam($P_FEATURE_TYPE->P_FEATURE_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow @7-66A32B27
    return $P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow;
}
//End Close P_FEATURE_TYPE_P_FEATURE_TYPE_Insert_BeforeShow

//P_FEATURE_TYPE_BeforeShowRow @2-F5311AE2
function P_FEATURE_TYPE_BeforeShowRow(& $sender)
{
    $P_FEATURE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_TYPE; //Compatibility
//End P_FEATURE_TYPE_BeforeShowRow

//Set Row Style @64-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_FEATURE_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_FEATURE_TYPE->P_FEATURE_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_FEATURE_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_FEATURE_TYPE->P_FEATURE_TYPE_ID->GetValue() == $keyId) {
		$P_FEATURE_TYPE->ADLink->Visible = true;
		$P_FEATURE_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_FEATURE_TYPE->ADLink->Visible = false;
		$P_FEATURE_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_FEATURE_TYPE_BeforeShowRow @2-94195823
    return $P_FEATURE_TYPE_BeforeShowRow;
}
//End Close P_FEATURE_TYPE_BeforeShowRow

//Page_OnInitializeView @1-562A3B64
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-732101CF
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_type; //Compatibility
//End Page_BeforeShow

//Custom Code @67-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FEATURE_TYPESearch;
	global $P_FEATURE_TYPE;
	global $P_FEATURE_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FEATURE_TYPESearch->Visible = false;
		$P_FEATURE_TYPE->Visible = false;
		$P_FEATURE_TYPE1->Visible = true;
		$P_FEATURE_TYPE1->ds->SQL = "";
	} else {
		$P_FEATURE_TYPESearch->Visible = true;
		$P_FEATURE_TYPE->Visible = true;
		$P_FEATURE_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
