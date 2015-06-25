<?php
//BindEvents Method @1-45A59566
function BindEvents()
{
    global $CPE_LOCATION;
    global $CCSEvents;
    $CPE_LOCATION->Navigator->CCSEvents["BeforeShow"] = "CPE_LOCATION_Navigator_BeforeShow";
    $CPE_LOCATION->P_APPL_Insert->CCSEvents["BeforeShow"] = "CPE_LOCATION_P_APPL_Insert_BeforeShow";
    $CPE_LOCATION->CCSEvents["BeforeShowRow"] = "CPE_LOCATION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//CPE_LOCATION_Navigator_BeforeShow @30-A16A7693
function CPE_LOCATION_Navigator_BeforeShow(& $sender)
{
    $CPE_LOCATION_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_LOCATION; //Compatibility
//End CPE_LOCATION_Navigator_BeforeShow

//Custom Code @88-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close CPE_LOCATION_Navigator_BeforeShow @30-789872AA
    return $CPE_LOCATION_Navigator_BeforeShow;
}
//End Close CPE_LOCATION_Navigator_BeforeShow

//CPE_LOCATION_P_APPL_Insert_BeforeShow @52-06D5366B
function CPE_LOCATION_P_APPL_Insert_BeforeShow(& $sender)
{
    $CPE_LOCATION_P_APPL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_LOCATION; //Compatibility
//End CPE_LOCATION_P_APPL_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$CPE_LOCATION->CPE_LOCATION_Insert->Page = $FileName;
  	$CPE_LOCATION->CPE_LOCATION_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$CPE_LOCATION->CPE_LOCATION_Insert->Parameters = CCRemoveParam($P_REGION_LEVEL->CPE_LOCATION_Insert->Parameters, "CPE_LOCATION_ID");
  	$CPE_LOCATION->CPE_LOCATION_Insert->Parameters = CCAddParam($P_REGION_LEVEL->CPE_LOCATION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close CPE_LOCATION_P_APPL_Insert_BeforeShow @52-A5BD1CF8
    return $CPE_LOCATION_P_APPL_Insert_BeforeShow;
}
//End Close CPE_LOCATION_P_APPL_Insert_BeforeShow

//CPE_LOCATION_BeforeShowRow @2-A8D5EDBC
function CPE_LOCATION_BeforeShowRow(& $sender)
{
    $CPE_LOCATION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $CPE_LOCATION; //Compatibility
//End CPE_LOCATION_BeforeShowRow

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
	global $CPE_LOCATION1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->CPE_LOCATION_ID->GetValue();
        $CPE_LOCATION1->DataSource->Parameters["urlCPE_LOCATION_ID"] = $selected_id;
        $CPE_LOCATION1->DataSource->Prepare();
        $CPE_LOCATION1->EditMode = $CPE_LOCATION1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @90-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->CPE_LOCATION_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }

	$Component->DLink->SetValue($img_radio);
//End Set Row Style

//Close CPE_LOCATION_BeforeShowRow @2-F4F6DDEF
    return $CPE_LOCATION_BeforeShowRow;
}
//End Close CPE_LOCATION_BeforeShowRow

//Page_OnInitializeView @1-147E7D23
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $cpe_location; //Compatibility
//End Page_OnInitializeView

//Custom Code @91-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("CPE_LOCATION_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-97DD0F3A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $cpe_location; //Compatibility
//End Page_BeforeShow

//Custom Code @92-2A29BDB7
// -------------------------
    // Write your own code here.
	global $CPE_LOCATIONSearch;
	global $CPE_LOCATION;
	global $CPE_LOCATION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$CPE_LOCATIONSearch->Visible = false;
		$CPE_LOCATION->Visible = false;
		$CPE_LOCATION1->Visible = true;
		$CPE_LOCATION1->ds->SQL = "";
	} else {
		$CPE_LOCATIONSearch->Visible = true;
		$CPE_LOCATION->Visible = true;
		$CPE_LOCATION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
