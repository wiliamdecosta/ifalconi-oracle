<?php
//BindEvents Method @1-AD258D5E
function BindEvents()
{
    global $P_REGION;
    global $CCSEvents;
    $P_REGION->Navigator->CCSEvents["BeforeShow"] = "P_REGION_Navigator_BeforeShow";
    $P_REGION->P_REGION_Insert->CCSEvents["BeforeShow"] = "P_REGION_P_REGION_Insert_BeforeShow";
    $P_REGION->CCSEvents["BeforeShowRow"] = "P_REGION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_REGION_Navigator_BeforeShow @33-21576257
function P_REGION_Navigator_BeforeShow(& $sender)
{
    $P_REGION_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION; //Compatibility
//End P_REGION_Navigator_BeforeShow

//Custom Code @75-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_REGION_Navigator_BeforeShow @33-E88391BF
    return $P_REGION_Navigator_BeforeShow;
}
//End Close P_REGION_Navigator_BeforeShow

//P_REGION_P_REGION_Insert_BeforeShow @54-025B7EBC
function P_REGION_P_REGION_Insert_BeforeShow(& $sender)
{
    $P_REGION_P_REGION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION; //Compatibility
//End P_REGION_P_REGION_Insert_BeforeShow

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_REGION->P_REGION_Insert->Page = $FileName;
  	$P_REGION->P_REGION_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_REGION->P_REGION_Insert->Parameters = CCRemoveParam($P_REGION->P_REGION_Insert->Parameters, "P_REGION_ID");
  	$P_REGION->P_REGION_Insert->Parameters = CCAddParam($P_REGION->P_REGION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_REGION_P_REGION_Insert_BeforeShow @54-A7F6235F
    return $P_REGION_P_REGION_Insert_BeforeShow;
}
//End Close P_REGION_P_REGION_Insert_BeforeShow

//P_REGION_BeforeShowRow @2-47FE2B67
function P_REGION_BeforeShowRow(& $sender)
{
    $P_REGION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION; //Compatibility
//End P_REGION_BeforeShowRow
	
	global $P_REGION1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_REGION_ID->GetValue();
        $P_REGION1->DataSource->Parameters["urlP_REGION_ID"] = $selected_id;
        $P_REGION1->DataSource->Prepare();
        $P_REGION1->EditMode = $P_REGION1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @73-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_REGION_ID->GetValue()== $selected_id) {
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

//Custom Code @74-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_REGION_BeforeShowRow @2-671464E1
    return $P_REGION_BeforeShowRow;
}
//End Close P_REGION_BeforeShowRow

//Page_OnInitializeView @1-B7437F52
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region; //Compatibility
//End Page_OnInitializeView

//Custom Code @76-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_REGION_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-3A47938F
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_region; //Compatibility
//End Page_BeforeShow

//Custom Code @77-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_REGIONSearch;
	global $P_REGION;
	global $P_REGION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_REGIONSearch->Visible = false;
		$P_REGION->Visible = false;
		$P_REGION1->Visible = true;
		$P_REGION1->ds->SQL = "";
	} else {
		$P_REGIONSearch->Visible = true;
		$P_REGION->Visible = true;
		$p_region_level1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
