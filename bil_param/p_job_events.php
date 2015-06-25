<?php
//BindEvents Method @1-658B42C4
function BindEvents()
{
    global $P_JOB;
    global $CCSEvents;
    $P_JOB->P_JOB_Insert->CCSEvents["BeforeShow"] = "P_JOB_P_JOB_Insert_BeforeShow";
    $P_JOB->CCSEvents["BeforeShowRow"] = "P_JOB_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_JOB_P_JOB_Insert_BeforeShow @7-A60242E9
function P_JOB_P_JOB_Insert_BeforeShow(& $sender)
{
    $P_JOB_P_JOB_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB; //Compatibility
//End P_JOB_P_JOB_Insert_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_JOB->P_JOB_Insert->Page = $FileName;
	$P_JOB->P_JOB_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_JOB->P_JOB_Insert->Parameters = CCRemoveParam($P_JOB->P_JOB_Insert->Parameters, "P_JOB_ID");
	$P_JOB->P_JOB_Insert->Parameters = CCAddParam($P_JOB->P_JOB_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_JOB_P_JOB_Insert_BeforeShow @7-86F8B2DA
    return $P_JOB_P_JOB_Insert_BeforeShow;
}
//End Close P_JOB_P_JOB_Insert_BeforeShow

//P_JOB_BeforeShowRow @2-6CF73C00
function P_JOB_BeforeShowRow(& $sender)
{
    $P_JOB_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB; //Compatibility
//End P_JOB_BeforeShowRow

//Set Row Style @68-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @69-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_JOB_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_JOB->P_JOB_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_JOB_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_JOB->P_JOB_ID->GetValue() == $keyId) {
		$P_JOB->ADLink->Visible = true;
		$P_JOB->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_JOB->ADLink->Visible = false;
		$P_JOB->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_JOB_BeforeShowRow @2-BF271120
    return $P_JOB_BeforeShowRow;
}
//End Close P_JOB_BeforeShowRow

//Page_OnInitializeView @1-DA51F8C8
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job; //Compatibility
//End Page_OnInitializeView

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-81C316BC
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job; //Compatibility
//End Page_BeforeShow

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_JOBSearch;
	global $P_JOB;
	global $P_JOB1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_JOBSearch->Visible = false;
		$P_JOB->Visible = false;
		//$P_JOB1->Visible = true;
		//$P_JOB1->ds->SQL = "";
	} else {
		$P_JOBSearch->Visible = true;
		$P_JOB->Visible = true;
		//$P_JOB1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
