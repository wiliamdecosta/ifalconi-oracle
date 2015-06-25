<?php
//BindEvents Method @1-2330679E
function BindEvents()
{
    global $P_ACCESS_CODE;
    global $CCSEvents;
    $P_ACCESS_CODE->P_ACCESS_CODE_Insert->CCSEvents["BeforeShow"] = "P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow";
    $P_ACCESS_CODE->CCSEvents["BeforeShowRow"] = "P_ACCESS_CODE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow @7-9D5EBCAB
function P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow(& $sender)
{
    $P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCESS_CODE; //Compatibility
//End P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ACCESS_CODE->P_ACCESS_CODE_Insert->Page = $FileName;
	$P_ACCESS_CODE->P_ACCESS_CODE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ACCESS_CODE->P_ACCESS_CODE_Insert->Parameters = CCRemoveParam($P_ACCESS_CODE->P_ACCESS_CODE_Insert->Parameters, "P_ACCESS_CODE_ID");
	$P_ACCESS_CODE->P_ACCESS_CODE_Insert->Parameters = CCAddParam($P_ACCESS_CODE->P_ACCESS_CODE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow @7-2B8D12D7
    return $P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow;
}
//End Close P_ACCESS_CODE_P_ACCESS_CODE_Insert_BeforeShow

//P_ACCESS_CODE_BeforeShowRow @2-FEA5789A
function P_ACCESS_CODE_BeforeShowRow(& $sender)
{
    $P_ACCESS_CODE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ACCESS_CODE; //Compatibility
//End P_ACCESS_CODE_BeforeShowRow

//Set Row Style @49-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
		$keyId = CCGetFromGet("P_ACCESS_CODE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_ACCESS_CODE->P_ACCESS_CODE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_ACCESS_CODE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_ACCESS_CODE->P_ACCESS_CODE_ID->GetValue() == $keyId) {
		$P_ACCESS_CODE->ADLink->Visible = true;
		$P_ACCESS_CODE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_ACCESS_CODE->ADLink->Visible = false;
		$P_ACCESS_CODE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_ACCESS_CODE_BeforeShowRow @2-C2028C99
    return $P_ACCESS_CODE_BeforeShowRow;
}
//End Close P_ACCESS_CODE_BeforeShowRow

//Page_OnInitializeView @1-5DBDCC01
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_access_code; //Compatibility
//End Page_OnInitializeView

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-3955C7B3
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_access_code; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ACCESS_CODESearch;
	global $P_ACCESS_CODE;
	global $P_ACCESS_CODE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ACCESS_CODESearch->Visible = false;
		$P_ACCESS_CODE->Visible = false;
		$P_ACCESS_CODE1->Visible = true;
		$P_ACCESS_CODE1->ds->SQL = "";
	} else {
		$P_ACCESS_CODESearch->Visible = true;
		$P_ACCESS_CODE->Visible = true;
		$P_ACCESS_CODE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
