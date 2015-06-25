<?php
//BindEvents Method @1-CD8D3D17
function BindEvents()
{
    global $P_BUSINESS_AREA;
    global $CCSEvents;
    $P_BUSINESS_AREA->Navigator->CCSEvents["BeforeShow"] = "P_BUSINESS_AREA_Navigator_BeforeShow";
    $P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->CCSEvents["BeforeShow"] = "P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow";
    $P_BUSINESS_AREA->CCSEvents["BeforeShowRow"] = "P_BUSINESS_AREA_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BUSINESS_AREA_Navigator_BeforeShow @26-D46211C2
function P_BUSINESS_AREA_Navigator_BeforeShow(& $sender)
{
    $P_BUSINESS_AREA_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_Navigator_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_Navigator_BeforeShow @26-91DF29D7
    return $P_BUSINESS_AREA_Navigator_BeforeShow;
}
//End Close P_BUSINESS_AREA_Navigator_BeforeShow

//P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow @50-99E75EA5
function P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow(& $sender)
{
    $P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Page = $FileName;
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCRemoveParam($P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters, "P_BUSINESS_AREA_ID");
  	$P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters = CCAddParam($P_BUSINESS_AREA->P_BUSINESS_AREA_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow @50-14A3E971
    return $P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow;
}
//End Close P_BUSINESS_AREA_P_BUSINESS_AREA_Insert_BeforeShow

//P_BUSINESS_AREA_BeforeShowRow @2-1129FB69
function P_BUSINESS_AREA_BeforeShowRow(& $sender)
{
    $P_BUSINESS_AREA_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_AREA; //Compatibility
//End P_BUSINESS_AREA_BeforeShowRow
	
	global $P_BUSINESS_AREA1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BUSINESS_AREA_ID->GetValue();
        $P_BUSINESS_AREA1->DataSource->Parameters["urlP_BUSINESS_AREA_ID"] = $selected_id;
        $P_BUSINESS_AREA1->DataSource->Prepare();
        $P_BUSINESS_AREA1->EditMode = $P_BUSINESS_AREA1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BUSINESS_AREA_ID->GetValue()== $selected_id) {
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

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_BUSINESS_AREA_BeforeShowRow @2-65865B9C
    return $P_BUSINESS_AREA_BeforeShowRow;
}
//End Close P_BUSINESS_AREA_BeforeShowRow

//Page_OnInitializeView @1-B1847BBD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_area; //Compatibility
//End Page_OnInitializeView

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BUSINESS_AREA_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-F0A50AE7
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_area; //Compatibility
//End Page_BeforeShow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BUSINESS_AREASearch;
	global $P_BUSINESS_AREA;
	global $P_BUSINESS_AREA1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BUSINESS_AREASearch->Visible = false;
		$P_BUSINESS_AREA->Visible = false;
		$P_BUSINESS_AREA1->Visible = true;
		$P_BUSINESS_AREA1->ds->SQL = "";
	} else {
		$P_BUSINESS_AREASearch->Visible = true;
		$P_BUSINESS_AREA->Visible = true;
		$P_BUSINESS_AREA1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
