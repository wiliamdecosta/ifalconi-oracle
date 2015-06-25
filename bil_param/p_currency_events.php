<?php
//BindEvents Method @1-A1CFC4E2
function BindEvents()
{
    global $P_CURRENCY;
    global $CCSEvents;
    $P_CURRENCY->Navigator->CCSEvents["BeforeShow"] = "P_CURRENCY_Navigator_BeforeShow";
    $P_CURRENCY->P_CURRENCY_Insert->CCSEvents["BeforeShow"] = "P_CURRENCY_P_CURRENCY_Insert_BeforeShow";
    $P_CURRENCY->CCSEvents["BeforeShowRow"] = "P_CURRENCY_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CURRENCY_Navigator_BeforeShow @27-67693DCD
function P_CURRENCY_Navigator_BeforeShow(& $sender)
{
    $P_CURRENCY_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CURRENCY; //Compatibility
//End P_CURRENCY_Navigator_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_CURRENCY_Navigator_BeforeShow @27-C2CA7B73
    return $P_CURRENCY_Navigator_BeforeShow;
}
//End Close P_CURRENCY_Navigator_BeforeShow

//P_CURRENCY_P_CURRENCY_Insert_BeforeShow @52-D29C3861
function P_CURRENCY_P_CURRENCY_Insert_BeforeShow(& $sender)
{
    $P_CURRENCY_P_CURRENCY_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CURRENCY; //Compatibility
//End P_CURRENCY_P_CURRENCY_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_CURRENCY->P_CURRENCY_Insert->Page = $FileName;
  	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCRemoveParam($P_CURRENCY->P_CURRENCY_Insert->Parameters, "P_CURRENCY_ID");
  	$P_CURRENCY->P_CURRENCY_Insert->Parameters = CCAddParam($P_CURRENCY->P_CURRENCY_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CURRENCY_P_CURRENCY_Insert_BeforeShow @52-BA56D05E
    return $P_CURRENCY_P_CURRENCY_Insert_BeforeShow;
}
//End Close P_CURRENCY_P_CURRENCY_Insert_BeforeShow

//P_CURRENCY_BeforeShowRow @2-220D52F6
function P_CURRENCY_BeforeShowRow(& $sender)
{
    $P_CURRENCY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CURRENCY; //Compatibility
//End P_CURRENCY_BeforeShowRow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CURRENCY1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_CURRENCY_ID->GetValue();
        $P_CURRENCY1->DataSource->Parameters["urlP_CURRENCY_ID"] = $selected_id;
        $P_CURRENCY1->DataSource->Prepare();
        $P_CURRENCY1->EditMode = $P_CURRENCY1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @60-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_CURRENCY_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }

	$Component->DLink->SetValue($img_radio);  // Bdr
//End Set Row Style

//Close P_CURRENCY_BeforeShowRow @2-638D280A
    return $P_CURRENCY_BeforeShowRow;
}
//End Close P_CURRENCY_BeforeShowRow

//Page_OnInitializeView @1-A86B1B96
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_currency; //Compatibility
//End Page_OnInitializeView

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_CURRENCY_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-35418393
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_currency; //Compatibility
//End Page_BeforeShow

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CURRENCYSearch;
	global $P_CURRENCY;
	global $P_CURRENCY1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CURRENCYSearch->Visible = false;
		$P_CURRENCY->Visible = false;
		$P_CURRENCY1->Visible = true;
		$P_CURRENCY1->ds->SQL = "";
	} else {
		$P_CURRENCYSearch->Visible = true;
		$P_CURRENCY->Visible = true;
		$P_CURRENCY1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
