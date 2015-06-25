<?php
//BindEvents Method @1-7B669B7D
function BindEvents()
{
    global $P_TARIFF_SCENARIO;
    global $CCSEvents;
    $P_TARIFF_SCENARIO->Navigator->CCSEvents["BeforeShow"] = "P_TARIFF_SCENARIO_Navigator_BeforeShow";
    $P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->CCSEvents["BeforeShow"] = "P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow";
    $P_TARIFF_SCENARIO->CCSEvents["BeforeShowRow"] = "P_TARIFF_SCENARIO_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_TARIFF_SCENARIO_Navigator_BeforeShow @27-32A6B99A
function P_TARIFF_SCENARIO_Navigator_BeforeShow(& $sender)
{
    $P_TARIFF_SCENARIO_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TARIFF_SCENARIO; //Compatibility
//End P_TARIFF_SCENARIO_Navigator_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_TARIFF_SCENARIO_Navigator_BeforeShow @27-B68C1048
    return $P_TARIFF_SCENARIO_Navigator_BeforeShow;
}
//End Close P_TARIFF_SCENARIO_Navigator_BeforeShow

//P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow @56-2653FCAF
function P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow(& $sender)
{
    $P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TARIFF_SCENARIO; //Compatibility
//End P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Page = $FileName;
	$P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Parameters = CCRemoveParam($P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Parameters, "P_TARIFF_SCENARIO_ID");
	$P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Parameters = CCAddParam($P_TARIFF_SCENARIO->P_TARIFF_SCENARIO_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow @56-AD0C76DF
    return $P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow;
}
//End Close P_TARIFF_SCENARIO_P_TARIFF_SCENARIO_Insert_BeforeShow

//P_TARIFF_SCENARIO_BeforeShowRow @2-099FB9FC
function P_TARIFF_SCENARIO_BeforeShowRow(& $sender)
{
    $P_TARIFF_SCENARIO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TARIFF_SCENARIO; //Compatibility
//End P_TARIFF_SCENARIO_BeforeShowRow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TARIFF_SCENARIO1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_TARIFF_SCENARIO_ID->GetValue();
        $P_TARIFF_SCENARIO1->DataSource->Parameters["urlP_TARIFF_SCENARIO_ID"] = $selected_id;
        $P_TARIFF_SCENARIO1->DataSource->Prepare();
        $P_TARIFF_SCENARIO1->EditMode = $P_TARIFF_SCENARIO1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @61-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_TARIFF_SCENARIO_ID->GetValue()== $selected_id) {
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

//Close P_TARIFF_SCENARIO_BeforeShowRow @2-A0C03998
    return $P_TARIFF_SCENARIO_BeforeShowRow;
}
//End Close P_TARIFF_SCENARIO_BeforeShowRow

//Page_OnInitializeView @1-2B914DA9
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_tariff_scenario; //Compatibility
//End Page_OnInitializeView

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_TARIFF_SCENARIO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-4CC7F8FC
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_tariff_scenario; //Compatibility
//End Page_BeforeShow

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TARIFF_SCENARIOSearch;
	global $P_TARIFF_SCENARIO;
	global $P_TARIFF_SCENARIO1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_TARIFF_SCENARIOSearch->Visible = false;
		$P_TARIFF_SCENARIO->Visible = false;
		$P_TARIFF_SCENARIO1->Visible = true;
		$P_TARIFF_SCENARIO1->ds->SQL = "";
	} else {
		$P_TARIFF_SCENARIOSearch->Visible = true;
		$P_TARIFF_SCENARIO->Visible = true;
		$P_TARIFF_SCENARIO1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
