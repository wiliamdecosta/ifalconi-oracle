<?php
//BindEvents Method @1-4131949D
function BindEvents()
{
    global $P_GLOBAL_PARAM;
    global $CCSEvents;
    $P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->CCSEvents["BeforeShow"] = "P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow";
    $P_GLOBAL_PARAM->CCSEvents["BeforeShowRow"] = "P_GLOBAL_PARAM_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow @7-C7CCF258
function P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow(& $sender)
{
    $P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_GLOBAL_PARAM; //Compatibility
//End P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Page = $FileName;
	$P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Parameters = CCRemoveParam($P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Parameters, "CODE");
	$P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Parameters = CCAddParam($P_GLOBAL_PARAM->P_GLOBAL_PARAM_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow @7-062D672A
    return $P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow;
}
//End Close P_GLOBAL_PARAM_P_GLOBAL_PARAM_Insert_BeforeShow

//P_GLOBAL_PARAM_BeforeShowRow @2-6B8543C1
function P_GLOBAL_PARAM_BeforeShowRow(& $sender)
{
    $P_GLOBAL_PARAM_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_GLOBAL_PARAM; //Compatibility
//End P_GLOBAL_PARAM_BeforeShowRow

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
	$keyId = CCGetFromGet("CODE", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_GLOBAL_PARAM->CODE->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "CODE", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_GLOBAL_PARAM->CODE->GetValue() == $keyId) {
		$P_GLOBAL_PARAM->ADLink->Visible = true;
		$P_GLOBAL_PARAM->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_GLOBAL_PARAM->ADLink->Visible = false;
		$P_GLOBAL_PARAM->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_GLOBAL_PARAM_BeforeShowRow @2-AE5EEADC
    return $P_GLOBAL_PARAM_BeforeShowRow;
}
//End Close P_GLOBAL_PARAM_BeforeShowRow

//Page_OnInitializeView @1-733A3E80
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_global_param; //Compatibility
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

//Page_BeforeShow @1-5631042B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_global_param; //Compatibility
//End Page_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_GLOBAL_PARAMSearch;
	global $P_GLOBAL_PARAM;
	global $P_GLOBAL_PARAM1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_GLOBAL_PARAMSearch->Visible = false;
		$P_GLOBAL_PARAM->Visible = false;
		$P_GLOBAL_PARAM1->Visible = true;
		$P_GLOBAL_PARAM1->ds->SQL = "";
	} else {
		$P_GLOBAL_PARAMSearch->Visible = true;
		$P_GLOBAL_PARAM->Visible = true;
		$P_GLOBAL_PARAM1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
