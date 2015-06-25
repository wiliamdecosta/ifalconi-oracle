<?php
//BindEvents Method @1-42C3BAF1
function BindEvents()
{
    global $P_BILLING_PERIOD_UNIT;
    global $CCSEvents;
    $P_BILLING_PERIOD_UNIT->Navigator->CCSEvents["BeforeShow"] = "P_BILLING_PERIOD_UNIT_Navigator_BeforeShow";
    $P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->CCSEvents["BeforeShow"] = "P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow";
    $P_BILLING_PERIOD_UNIT->CCSEvents["BeforeShowRow"] = "P_BILLING_PERIOD_UNIT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILLING_PERIOD_UNIT_Navigator_BeforeShow @18-C31620A2
function P_BILLING_PERIOD_UNIT_Navigator_BeforeShow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_Navigator_BeforeShow

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BILLING_PERIOD_UNIT_Navigator_BeforeShow @18-47B40511
    return $P_BILLING_PERIOD_UNIT_Navigator_BeforeShow;
}
//End Close P_BILLING_PERIOD_UNIT_Navigator_BeforeShow

//P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow @34-1D1AB0F6
function P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow

//Custom Code @35-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Page = $FileName;
  	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCRemoveParam($P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters, "P_BILLING_PERIOD_UNIT_ID");
  	$P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters = CCAddParam($P_BILLING_PERIOD_UNIT->P_BILLING_PERIOD_UNIT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow @34-CAF6133D
    return $P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow;
}
//End Close P_BILLING_PERIOD_UNIT_P_BILLING_PERIOD_UNIT_Insert_BeforeShow

//P_BILLING_PERIOD_UNIT_BeforeShowRow @2-34305331
function P_BILLING_PERIOD_UNIT_BeforeShowRow(& $sender)
{
    $P_BILLING_PERIOD_UNIT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILLING_PERIOD_UNIT; //Compatibility
//End P_BILLING_PERIOD_UNIT_BeforeShowRow

//Custom Code @44-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILLING_PERIOD_UNIT1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue();
        $P_BILLING_PERIOD_UNIT1->DataSource->Parameters["urlP_BILLING_PERIOD_UNIT_ID"] = $selected_id;
        $P_BILLING_PERIOD_UNIT1->DataSource->Prepare();
        $P_BILLING_PERIOD_UNIT1->EditMode = $P_BILLING_PERIOD_UNIT1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @45-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue()== $selected_id) {
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

//Close P_BILLING_PERIOD_UNIT_BeforeShowRow @2-1BB16ADB
    return $P_BILLING_PERIOD_UNIT_BeforeShowRow;
}
//End Close P_BILLING_PERIOD_UNIT_BeforeShowRow

//Page_OnInitializeView @1-2E519505
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_billing_period_unit; //Compatibility
//End Page_OnInitializeView

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BILLING_PERIOD_UNIT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-2E205847
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_billing_period_unit; //Compatibility
//End Page_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILLING_PERIOD_UNITSearch;
	global $P_BILLING_PERIOD_UNIT;
	global $P_BILLING_PERIOD_UNIT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILLING_PERIOD_UNITSearch->Visible = false;
		$P_BILLING_PERIOD_UNIT->Visible = false;
		$P_BILLING_PERIOD_UNIT1->Visible = true;
		$P_BILLING_PERIOD_UNIT1->ds->SQL = "";
	} else {
		$P_BILLING_PERIOD_UNITSearch->Visible = true;
		$P_BILLING_PERIOD_UNIT->Visible = true;
		$P_BILLING_PERIOD_UNIT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
