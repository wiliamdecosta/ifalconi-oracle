<?php
//BindEvents Method @1-5E8AEA37
function BindEvents()
{
    global $P_JOB_TYPE;
    global $CCSEvents;
    $P_JOB_TYPE->P_JOB_TYPE_Insert->CCSEvents["BeforeShow"] = "P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow";
    $P_JOB_TYPE->CCSEvents["BeforeShowRow"] = "P_JOB_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow @7-BB5AE0E7
function P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow(& $sender)
{
    $P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB_TYPE; //Compatibility
//End P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_JOB_TYPE->P_JOB_TYPE_Insert->Page = $FileName;
	$P_JOB_TYPE->P_JOB_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_JOB_TYPE->P_JOB_TYPE_Insert->Parameters = CCRemoveParam($P_JOB_TYPE->P_JOB_TYPE_Insert->Parameters, "P_JOB_TYPE_ID");
	$P_JOB_TYPE->P_JOB_TYPE_Insert->Parameters = CCAddParam($P_JOB_TYPE->P_JOB_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow @7-3733A64B
    return $P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow;
}
//End Close P_JOB_TYPE_P_JOB_TYPE_Insert_BeforeShow

//P_JOB_TYPE_BeforeShowRow @2-3DA89FE0
function P_JOB_TYPE_BeforeShowRow(& $sender)
{
    $P_JOB_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB_TYPE; //Compatibility
//End P_JOB_TYPE_BeforeShowRow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_JOB_TYPE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_JOB_TYPE->P_JOB_TYPE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_JOB_TYPE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_JOB_TYPE->P_JOB_TYPE_ID->GetValue() == $keyId) {
		$P_JOB_TYPE->ADLink->Visible = true;
		$P_JOB_TYPE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_JOB_TYPE->ADLink->Visible = false;
		$P_JOB_TYPE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Set Row Style @91-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Close P_JOB_TYPE_BeforeShowRow @2-476FF376
    return $P_JOB_TYPE_BeforeShowRow;
}
//End Close P_JOB_TYPE_BeforeShowRow

//Page_OnInitializeView @1-1B41E532
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-866B7D37
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_job_type; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_JOB_TYPESearch;
	global $P_JOB_TYPE;
	global $P_JOB_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_JOB_TYPESearch->Visible = false;
		$P_JOB_TYPE->Visible = false;
		//$P_JOB_TYPE1->Visible = true;
		//$P_JOB_TYPE1->ds->SQL = "";
	} else {
		$P_JOB_TYPESearch->Visible = true;
		$P_JOB_TYPE->Visible = true;
		//$P_JOB_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
