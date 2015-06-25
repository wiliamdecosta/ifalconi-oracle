<?php
//BindEvents Method @1-3422FD63
function BindEvents()
{
    global $P_CPE_STATUS;
    global $CCSEvents;
    $P_CPE_STATUS->Navigator->CCSEvents["BeforeShow"] = "P_CPE_STATUS_Navigator_BeforeShow";
    $P_CPE_STATUS->P_REGION_Insert->CCSEvents["BeforeShow"] = "P_CPE_STATUS_P_REGION_Insert_BeforeShow";
    $P_CPE_STATUS->CCSEvents["BeforeShowRow"] = "P_CPE_STATUS_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CPE_STATUS_Navigator_BeforeShow @21-5A957E93
function P_CPE_STATUS_Navigator_BeforeShow(& $sender)
{
    $P_CPE_STATUS_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_STATUS; //Compatibility
//End P_CPE_STATUS_Navigator_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_CPE_STATUS_Navigator_BeforeShow @21-00460424
    return $P_CPE_STATUS_Navigator_BeforeShow;
}
//End Close P_CPE_STATUS_Navigator_BeforeShow

//P_CPE_STATUS_P_REGION_Insert_BeforeShow @42-F8EDE70D
function P_CPE_STATUS_P_REGION_Insert_BeforeShow(& $sender)
{
    $P_CPE_STATUS_P_REGION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_STATUS; //Compatibility
//End P_CPE_STATUS_P_REGION_Insert_BeforeShow

//Custom Code @43-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_CPE_STATUS->P_CPE_STATUS_Insert->Page = $FileName;
  	$P_CPE_STATUS->P_CPE_STATUS_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_CPE_STATUS->P_CPE_STATUS_Insert->Parameters = CCRemoveParam($P_CPE_STATUS->P_CPE_STATUS_Insert->Parameters, "P_CPE_STATUS_ID");
  	$P_CPE_STATUS->P_CPE_STATUS_Insert->Parameters = CCAddParam($P_CPE_STATUS->P_CPE_STATUS_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CPE_STATUS_P_REGION_Insert_BeforeShow @42-2FD3F293
    return $P_CPE_STATUS_P_REGION_Insert_BeforeShow;
}
//End Close P_CPE_STATUS_P_REGION_Insert_BeforeShow

//P_CPE_STATUS_BeforeShowRow @2-A3BDCA1E
function P_CPE_STATUS_BeforeShowRow(& $sender)
{
    $P_CPE_STATUS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_STATUS; //Compatibility
//End P_CPE_STATUS_BeforeShowRow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CPE_STATUS1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_CPE_STATUS_ID->GetValue();
        $P_CPE_STATUS1->DataSource->Parameters["urlP_CPE_STATUS_ID"] = $selected_id;
        $P_CPE_STATUS1->DataSource->Prepare();
        $P_CPE_STATUS1->EditMode = $P_CPE_STATUS1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @62-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_CPE_STATUS_ID->GetValue()== $selected_id) {
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

//Close P_CPE_STATUS_BeforeShowRow @2-CB235A10
    return $P_CPE_STATUS_BeforeShowRow;
}
//End Close P_CPE_STATUS_BeforeShowRow

//Page_OnInitializeView @1-2589EE32
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_status; //Compatibility
//End Page_OnInitializeView

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_CPE_STATUS_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-A62A9C2B
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_status; //Compatibility
//End Page_BeforeShow

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CPE_STATUSSearch;
	global $P_CPE_STATUS;
	global $P_CPE_STATUS1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CPE_STATUSSearch->Visible = false;
		$P_CPE_STATUS->Visible = false;
		$P_CPE_STATUS1->Visible = true;
		$P_CPE_STATUS1->ds->SQL = "";
	} else {
		$P_CPE_STATUSSearch->Visible = true;
		$P_CPE_STATUS->Visible = true;
		$P_CPE_STATUS1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
