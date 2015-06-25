<?php
//BindEvents Method @1-29830882
function BindEvents()
{
    global $P_FIRST_JOB;
    global $CCSEvents;
    $P_FIRST_JOB->P_FIRST_JOB_Insert->CCSEvents["BeforeShow"] = "P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow";
    $P_FIRST_JOB->CCSEvents["BeforeShowRow"] = "P_FIRST_JOB_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow @7-4A809637
function P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow(& $sender)
{
    $P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FIRST_JOB; //Compatibility
//End P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_FIRST_JOB->P_FIRST_JOB_Insert->Page = $FileName;
	$P_FIRST_JOB->P_FIRST_JOB_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_FIRST_JOB->P_FIRST_JOB_Insert->Parameters = CCAddParam($P_FIRST_JOB->P_FIRST_JOB_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow @7-672C5767
    return $P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow;
}
//End Close P_FIRST_JOB_P_FIRST_JOB_Insert_BeforeShow

//P_FIRST_JOB_BeforeShowRow @2-84F82EF9
function P_FIRST_JOB_BeforeShowRow(& $sender)
{
    $P_FIRST_JOB_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FIRST_JOB; //Compatibility
//End P_FIRST_JOB_BeforeShowRow

//Set Row Style @62-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_FIRST_JOB_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_FIRST_JOB->P_FIRST_JOB_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_FIRST_JOB_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_FIRST_JOB->P_FIRST_JOB_ID->GetValue() == $keyId) {
		$P_FIRST_JOB->ADLink->Visible = true;
		$P_FIRST_JOB->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_FIRST_JOB->ADLink->Visible = false;
		$P_FIRST_JOB->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_FIRST_JOB_BeforeShowRow @2-FA1680E2
    return $P_FIRST_JOB_BeforeShowRow;
}
//End Close P_FIRST_JOB_BeforeShowRow

//Page_OnInitializeView @1-3AB799DF
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_first_job; //Compatibility
//End Page_OnInitializeView

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FIRST_JOBSearch;
	global $P_FIRST_JOB;
	global $P_FIRST_JOB1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FIRST_JOBSearch->Visible = false;
		$P_FIRST_JOB->Visible = false;
		//$P_CUSTOMER_TITLE1->Visible = true;
		//$P_CUSTOMER_TITLE1->ds->SQL = "";
	} else {
		$P_FIRST_JOBSearch->Visible = true;
		$P_FIRST_JOB->Visible = true;
		//$P_CUSTOMER_TITLE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView




?>