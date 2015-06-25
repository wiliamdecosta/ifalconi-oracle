<?php
//BindEvents Method @1-46AD63F6
function BindEvents()
{
    global $P_CHARGING_METHOD;
    global $CCSEvents;
    $P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->CCSEvents["BeforeShow"] = "P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow";
    $P_CHARGING_METHOD->CCSEvents["BeforeShowRow"] = "P_CHARGING_METHOD_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow @7-4B02F8CA
function P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow(& $sender)
{
    $P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CHARGING_METHOD; //Compatibility
//End P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow

//Custom Code @39-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Page = $FileName;
	$P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Parameters = CCRemoveParam($P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Parameters, "P_CHARGING_METHOD_ID");
	$P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Parameters = CCAddParam($P_CHARGING_METHOD->P_CHARGING_METHOD_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow @7-2FD69B74
    return $P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow;
}
//End Close P_CHARGING_METHOD_P_CHARGING_METHOD_Insert_BeforeShow

//P_CHARGING_METHOD_BeforeShowRow @2-7FCEBB98
function P_CHARGING_METHOD_BeforeShowRow(& $sender)
{
    $P_CHARGING_METHOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CHARGING_METHOD; //Compatibility
//End P_CHARGING_METHOD_BeforeShowRow

//Set Row Style @45-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CHARGING_METHOD_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CHARGING_METHOD->P_CHARGING_METHOD_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CHARGING_METHOD_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CHARGING_METHOD->P_CHARGING_METHOD_ID->GetValue() == $keyId) {
		$P_CHARGING_METHOD->ADLink->Visible = true;
		$P_CHARGING_METHOD->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CHARGING_METHOD->ADLink->Visible = false;
		$P_CHARGING_METHOD->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CHARGING_METHOD_BeforeShowRow @2-A5B32AAE
    return $P_CHARGING_METHOD_BeforeShowRow;
}
//End Close P_CHARGING_METHOD_BeforeShowRow

//Page_OnInitializeView @1-9C291CDB
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_charging_method; //Compatibility
//End Page_OnInitializeView

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-FB7FA98E
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_charging_method; //Compatibility
//End Page_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CHARGING_METHODSearch;
	global $P_CHARGING_METHOD;
	global $P_CHARGING_METHOD1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CHARGING_METHODSearch->Visible = false;
		$P_CHARGING_METHOD->Visible = false;
		$P_CHARGING_METHOD1->Visible = true;
		$P_CHARGING_METHOD1->ds->SQL = "";
	} else {
		$P_CHARGING_METHODSearch->Visible = true;
		$P_CHARGING_METHOD->Visible = true;
		$P_CHARGING_METHOD1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
