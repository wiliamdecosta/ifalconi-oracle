<?php
//BindEvents Method @1-64C86751
function BindEvents()
{
    global $P_SALES_PERSON;
    global $CCSEvents;
    $P_SALES_PERSON->P_SALES_PERSON_Insert->CCSEvents["BeforeShow"] = "P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow";
    $P_SALES_PERSON->CCSEvents["BeforeShowRow"] = "P_SALES_PERSON_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow @7-C565CCA0
function P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow(& $sender)
{
    $P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SALES_PERSON; //Compatibility
//End P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_SALES_PERSON->P_SALES_PERSON_Insert->Page = $FileName;
	$P_SALES_PERSON->P_SALES_PERSON_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_SALES_PERSON->P_SALES_PERSON_Insert->Parameters = CCRemoveParam($P_SALES_PERSON->P_SALES_PERSON_Insert->Parameters, "P_SALES_PERSON_ID");
	$P_SALES_PERSON->P_SALES_PERSON_Insert->Parameters = CCAddParam($P_SALES_PERSON->P_SALES_PERSON_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow @7-74E5A42D
    return $P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow;
}
//End Close P_SALES_PERSON_P_SALES_PERSON_Insert_BeforeShow

//P_SALES_PERSON_BeforeShowRow @2-4A7D45C0
function P_SALES_PERSON_BeforeShowRow(& $sender)
{
    $P_SALES_PERSON_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SALES_PERSON; //Compatibility
//End P_SALES_PERSON_BeforeShowRow

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
	$keyId = CCGetFromGet("P_SALES_PERSON_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_SALES_PERSON->P_SALES_PERSON_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_SALES_PERSON_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_SALES_PERSON->P_SALES_PERSON_ID->GetValue() == $keyId) {
		$P_SALES_PERSON->ADLink->Visible = true;
		$P_SALES_PERSON->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_SALES_PERSON->ADLink->Visible = false;
		$P_SALES_PERSON->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_SALES_PERSON_BeforeShowRow @2-5B3ED6D6
    return $P_SALES_PERSON_BeforeShowRow;
}
//End Close P_SALES_PERSON_BeforeShowRow

//Page_OnInitializeView @1-0C209CD1
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_sales_person; //Compatibility
//End Page_OnInitializeView

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-292BA67A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_sales_person; //Compatibility
//End Page_BeforeShow

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_SALES_PERSONSearch;
	global $P_SALES_PERSON;
	global $P_SALES_PERSON1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_SALES_PERSONSearch->Visible = false;
		$P_SALES_PERSON->Visible = false;
		$P_SALES_PERSON1->Visible = true;
		$P_SALES_PERSON1->ds->SQL = "";
	} else {
		$P_SALES_PERSONSearch->Visible = true;
		$P_SALES_PERSON->Visible = true;
		$P_SALES_PERSON1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
