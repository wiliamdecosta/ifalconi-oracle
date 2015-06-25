<?php
//BindEvents Method @1-03A9DEA2
function BindEvents()
{
    global $P_POC;
    global $CCSEvents;
    $P_POC->P_POC_Insert->CCSEvents["BeforeShow"] = "P_POC_P_POC_Insert_BeforeShow";
    $P_POC->CCSEvents["BeforeShowRow"] = "P_POC_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_POC_P_POC_Insert_BeforeShow @7-61231FFE
function P_POC_P_POC_Insert_BeforeShow(& $sender)
{
    $P_POC_P_POC_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_POC; //Compatibility
//End P_POC_P_POC_Insert_BeforeShow

//Custom Code @71-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_POC->P_POC_Insert->Page = $FileName;
	$P_POC->P_POC_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_POC->P_POC_Insert->Parameters = CCRemoveParam($P_POC->P_POC_Insert->Parameters, "P_POC_ID");
	$P_POC->P_POC_Insert->Parameters = CCAddParam($P_POC->P_POC_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_POC_P_POC_Insert_BeforeShow @7-75E8C669
    return $P_POC_P_POC_Insert_BeforeShow;
}
//End Close P_POC_P_POC_Insert_BeforeShow

//P_POC_BeforeShowRow @2-5AFE002F
function P_POC_BeforeShowRow(& $sender)
{
    $P_POC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_POC; //Compatibility
//End P_POC_BeforeShowRow

//Set Row Style @73-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @74-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_POC_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_POC->P_POC_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_POC_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_POC->P_POC_ID->GetValue() == $keyId) {
		$P_POC->ADLink->Visible = true;
		$P_POC->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_POC->ADLink->Visible = false;
		$P_POC->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_POC_BeforeShowRow @2-56D6FA1D
    return $P_POC_BeforeShowRow;
}
//End Close P_POC_BeforeShowRow

//Page_OnInitializeView @1-33A013F5
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_poc; //Compatibility
//End Page_OnInitializeView

//Custom Code @75-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-6832FD81
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_poc; //Compatibility
//End Page_BeforeShow

//Custom Code @76-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_POCSearch;
	global $P_POC;
	global $P_POC1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_POCSearch->Visible = false;
		$P_POC->Visible = false;
		$P_POC1->Visible = true;
		$P_POC1->ds->SQL = "";
	} else {
		$P_POCSearch->Visible = true;
		$P_POC->Visible = true;
		$P_POC1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
