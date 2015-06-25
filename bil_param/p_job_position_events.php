<?php
//BindEvents Method @1-7A516AA1
function BindEvents()
{
    global $P_JOB_POSITION;
    global $CCSEvents;
    $P_JOB_POSITION->P_JOB_POSITION_Insert->CCSEvents["BeforeShow"] = "P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow";
    $P_JOB_POSITION->CCSEvents["BeforeShowRow"] = "P_JOB_POSITION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow @7-F95D5C26
function P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow(& $sender)
{
    $P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB_POSITION; //Compatibility
//End P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_JOB_POSITION->P_JOB_POSITION_Insert->Page = $FileName;
	$P_JOB_POSITION->P_JOB_POSITION_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_JOB_POSITION->P_JOB_POSITION_Insert->Parameters = CCRemoveParam($P_JOB_POSITION->P_JOB_POSITION_Insert->Parameters, "P_JOB_POSITION_ID");
	$P_JOB_POSITION->P_JOB_POSITION_Insert->Parameters = CCAddParam($P_JOB_POSITION->P_JOB_POSITION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow @7-29489EA7
    return $P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow;
}
//End Close P_JOB_POSITION_P_JOB_POSITION_Insert_BeforeShow

//P_JOB_POSITION_BeforeShowRow @2-6E641DEA
function P_JOB_POSITION_BeforeShowRow(& $sender)
{
    $P_JOB_POSITION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB_POSITION; //Compatibility
//End P_JOB_POSITION_BeforeShowRow

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_JOB_POSITION_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_JOB_POSITION->P_JOB_POSITION_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_JOB_POSITION_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_JOB_POSITION->P_JOB_POSITION_ID->GetValue() == $keyId) {
		$P_JOB_POSITION->ADLink->Visible = true;
		$P_JOB_POSITION->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_JOB_POSITION->ADLink->Visible = false;
		$P_JOB_POSITION->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_JOB_POSITION_BeforeShowRow @2-0146C975
    return $P_JOB_POSITION_BeforeShowRow;
}
//End Close P_JOB_POSITION_BeforeShowRow

//Page_OnInitializeView @1-E493C136
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job_position; //Compatibility
//End Page_OnInitializeView

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-C198FB9D
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job_position; //Compatibility
//End Page_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_JOB_POSITIONSearch;
	global $P_JOB_POSITION;
	global $P_JOB_POSITION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_JOB_POSITIONSearch->Visible = false;
		$P_JOB_POSITION->Visible = false;
		$P_JOB_POSITION1->Visible = true;
		$P_JOB_POSITION1->ds->SQL = "";
	} else {
		$P_JOB_POSITIONSearch->Visible = true;
		$P_JOB_POSITION->Visible = true;
		$P_JOB_POSITION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
