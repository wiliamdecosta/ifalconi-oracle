<?php
//BindEvents Method @1-E24A21EC
function BindEvents()
{
    global $P_RECURRING_TARIFF_SCENAR1;
    global $CCSEvents;
    $P_RECURRING_TARIFF_SCENAR1->Navigator->CCSEvents["BeforeShow"] = "P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow";
    $P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->CCSEvents["BeforeShow"] = "P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow";
    $P_RECURRING_TARIFF_SCENAR1->CCSEvents["BeforeShowRow"] = "P_RECURRING_TARIFF_SCENAR1_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow @24-68F9A5E7
function P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow(& $sender)
{
    $P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_TARIFF_SCENAR1; //Compatibility
//End P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow

//Custom Code @54-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow @24-B7AFFAB8
    return $P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow;
}
//End Close P_RECURRING_TARIFF_SCENAR1_Navigator_BeforeShow

//P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow @48-E75FC2E1
function P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow(& $sender)
{
    $P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_TARIFF_SCENAR1; //Compatibility
//End P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Page = $FileName;
	$P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Parameters = CCRemoveParam($P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Parameters, "P_RECURRING_TARIFF_SCENARIO_ID");
	$P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Parameters = CCAddParam($P_RECURRING_TARIFF_SCENAR1->P_RECURRING_TARIFF_SCENAR_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow @48-4627E247
    return $P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow;
}
//End Close P_RECURRING_TARIFF_SCENAR1_P_RECURRING_TARIFF_SCENAR_Insert_BeforeShow

//P_RECURRING_TARIFF_SCENAR1_BeforeShowRow @2-9E041F01
function P_RECURRING_TARIFF_SCENAR1_BeforeShowRow(& $sender)
{
    $P_RECURRING_TARIFF_SCENAR1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_TARIFF_SCENAR1; //Compatibility
//End P_RECURRING_TARIFF_SCENAR1_BeforeShowRow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_RECURRING_TARIFF_SCENAR2;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_RECURR_TARIFF_SCENARIO_ID->GetValue();
        $P_RECURRING_TARIFF_SCENAR2->DataSource->Parameters["urlP_RECURR_TARIFF_SCENARIO_ID"] = $selected_id;
        $P_RECURRING_TARIFF_SCENAR2->DataSource->Prepare();
        $P_RECURRING_TARIFF_SCENAR2->EditMode = $P_RECURRING_TARIFF_SCENAR2->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @56-E8A92450
    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->P_RECURR_TARIFF_SCENARIO_ID->GetValue()== $selected_id) {
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

//Close P_RECURRING_TARIFF_SCENAR1_BeforeShowRow @2-1323822B
    return $P_RECURRING_TARIFF_SCENAR1_BeforeShowRow;
}
//End Close P_RECURRING_TARIFF_SCENAR1_BeforeShowRow

//Page_OnInitializeView @1-36A51176
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_recurring_tariff_scenario; //Compatibility
//End Page_OnInitializeView

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_RECURR_TARIFF_SCENARIO_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-B6335182
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_recurring_tariff_scenario; //Compatibility
//End Page_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_RECURRING_TARIFF_SCENAR;
	global $P_RECURRING_TARIFF_SCENAR1;
	global $P_RECURRING_TARIFF_SCENAR2;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_RECURRING_TARIFF_SCENAR->Visible = false;
		$P_RECURRING_TARIFF_SCENAR1->Visible = false;
		$P_RECURRING_TARIFF_SCENAR2->Visible = true;
		$P_RECURRING_TARIFF_SCENAR2->ds->SQL = "";
	} else {
		$P_RECURRING_TARIFF_SCENAR->Visible = true;
		$P_RECURRING_TARIFF_SCENAR1->Visible = true;
		$P_RECURRING_TARIFF_SCENAR2->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
