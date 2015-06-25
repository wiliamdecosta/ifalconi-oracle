<?php
//BindEvents Method @1-4753303B
function BindEvents()
{
    global $P_ONETIME_TARIFF_SCENARIO;
    global $CCSEvents;
    $P_ONETIME_TARIFF_SCENARIO->Navigator->CCSEvents["BeforeShow"] = "P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow";
    $P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->CCSEvents["BeforeShow"] = "P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow";
    $P_ONETIME_TARIFF_SCENARIO->CCSEvents["BeforeShowRow"] = "P_ONETIME_TARIFF_SCENARIO_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow @24-082C9BDA
function P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow(& $sender)
{
    $P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ONETIME_TARIFF_SCENARIO; //Compatibility
//End P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow @24-43AE5C0A
    return $P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow;
}
//End Close P_ONETIME_TARIFF_SCENARIO_Navigator_BeforeShow

//P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow @42-00FF7DF7
function P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow(& $sender)
{
    $P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ONETIME_TARIFF_SCENARIO; //Compatibility
//End P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Page = $FileName;
	$P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters = CCRemoveParam($P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters, "P_ONETIME_TARIFF_SCENARIO_ID");
	$P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters = CCAddParam($P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow @42-03029394
    return $P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow;
}
//End Close P_ONETIME_TARIFF_SCENARIO_P_ONETIME_TARIFF_SCENARIO_Insert_BeforeShow

//P_ONETIME_TARIFF_SCENARIO_BeforeShowRow @2-C886E440
function P_ONETIME_TARIFF_SCENARIO_BeforeShowRow(& $sender)
{
    $P_ONETIME_TARIFF_SCENARIO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ONETIME_TARIFF_SCENARIO; //Compatibility
//End P_ONETIME_TARIFF_SCENARIO_BeforeShowRow

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ONETIME_TARIFF_SCENARIO1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->GetValue();
        $P_ONETIME_TARIFF_SCENARIO1->DataSource->Parameters["urlP_ONETIME_TARIFF_SCENARIO_ID"] = $selected_id;
        $P_ONETIME_TARIFF_SCENARIO1->DataSource->Prepare();
        $P_ONETIME_TARIFF_SCENARIO1->EditMode = $P_ONETIME_TARIFF_SCENARIO1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->GetValue()== $selected_id) {
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

//Close P_ONETIME_TARIFF_SCENARIO_BeforeShowRow @2-1B4576F0
    return $P_ONETIME_TARIFF_SCENARIO_BeforeShowRow;
}
//End Close P_ONETIME_TARIFF_SCENARIO_BeforeShowRow

//Page_OnInitializeView @1-EB49B760
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_onetime_tariff_scenario; //Compatibility
//End Page_OnInitializeView

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_ONETIME_TARIFF_SCENARIO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-75076A72
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_onetime_tariff_scenario; //Compatibility
//End Page_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ONETIME_TARIFF_SCENARIOSearch;
	global $P_ONETIME_TARIFF_SCENARIO;
	global $P_ONETIME_TARIFF_SCENARIO1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ONETIME_TARIFF_SCENARIOSearch->Visible = false;
		$P_ONETIME_TARIFF_SCENARIO->Visible = false;
		$P_ONETIME_TARIFF_SCENARIO1->Visible = true;
		$P_ONETIME_TARIFF_SCENARIO1->ds->SQL = "";
	} else {
		$P_ONETIME_TARIFF_SCENARIOSearch->Visible = true;
		$P_ONETIME_TARIFF_SCENARIO->Visible = true;
		$P_ONETIME_TARIFF_SCENARIO1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
