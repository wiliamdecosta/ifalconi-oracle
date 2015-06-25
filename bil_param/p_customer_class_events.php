<?php
//BindEvents Method @1-DDB441E3
function BindEvents()
{
    global $P_CUSTOMER_CLASS;
    global $CCSEvents;
    $P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->CCSEvents["BeforeShow"] = "P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow";
    $P_CUSTOMER_CLASS->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_CLASS_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow @7-97AC0CBF
function P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow(& $sender)
{
    $P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_CLASS; //Compatibility
//End P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Page = $FileName;
	$P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Parameters = CCRemoveParam($P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Parameters, "P_CUSTOMER_CLASS_ID");
	$P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Parameters = CCAddParam($P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow @7-DCFC0FC0
    return $P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow;
}
//End Close P_CUSTOMER_CLASS_P_CUSTOMER_CLASS_Insert_BeforeShow

//P_CUSTOMER_CLASS_BeforeShowRow @2-B54C28C6
function P_CUSTOMER_CLASS_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_CLASS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_CLASS; //Compatibility
//End P_CUSTOMER_CLASS_BeforeShowRow

//Set Row Style @50-BEA8E266
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("RowStyle", $Style);
    }
//End Set Row Style

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CUSTOMER_CLASS_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CUSTOMER_CLASS_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CUSTOMER_CLASS->P_CUSTOMER_CLASS_ID->GetValue() == $keyId) {
		$P_CUSTOMER_CLASS->ADLink->Visible = true;
		$P_CUSTOMER_CLASS->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CUSTOMER_CLASS->ADLink->Visible = false;
		$P_CUSTOMER_CLASS->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_CUSTOMER_CLASS_BeforeShowRow @2-BE7B376A
    return $P_CUSTOMER_CLASS_BeforeShowRow;
}
//End Close P_CUSTOMER_CLASS_BeforeShowRow

//Page_OnInitializeView @1-D1E9557E
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_class; //Compatibility
//End Page_OnInitializeView

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-5A16CCE5
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_customer_class; //Compatibility
//End Page_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CUSTOMER_CLASSSearch;
	global $P_CUSTOMER_CLASS;
	global $P_CUSTOMER_CLASS1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CUSTOMER_CLASSSearch->Visible = false;
		$P_CUSTOMER_CLASS->Visible = false;
		$P_CUSTOMER_CLASS1->Visible = true;
		$P_CUSTOMER_CLASS1->ds->SQL = "";
	} else {
		$P_CUSTOMER_CLASSSearch->Visible = true;
		$P_CUSTOMER_CLASS->Visible = true;
		$P_CUSTOMER_CLASS1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
