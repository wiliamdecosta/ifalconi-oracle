<?php
//BindEvents Method @1-3258508E
function BindEvents()
{
    global $P_TICKET_COMPONENT;
    global $CCSEvents;
    $P_TICKET_COMPONENT->Navigator->CCSEvents["BeforeShow"] = "P_TICKET_COMPONENT_Navigator_BeforeShow";
    $P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->CCSEvents["BeforeShow"] = "P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow";
    $P_TICKET_COMPONENT->CCSEvents["BeforeShowRow"] = "P_TICKET_COMPONENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_TICKET_COMPONENT_Navigator_BeforeShow @21-3AB33E14
function P_TICKET_COMPONENT_Navigator_BeforeShow(& $sender)
{
    $P_TICKET_COMPONENT_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TICKET_COMPONENT; //Compatibility
//End P_TICKET_COMPONENT_Navigator_BeforeShow

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_TICKET_COMPONENT_Navigator_BeforeShow @21-492A850C
    return $P_TICKET_COMPONENT_Navigator_BeforeShow;
}
//End Close P_TICKET_COMPONENT_Navigator_BeforeShow

//P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow @43-18D517DF
function P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow(& $sender)
{
    $P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TICKET_COMPONENT; //Compatibility
//End P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow

//Custom Code @44-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Page = $FileName;
	$P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Parameters = CCRemoveParam($P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Parameters, "P_TICKET_COMPONENT_ID");
	$P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Parameters = CCAddParam($P_TICKET_COMPONENT->P_TICKET_COMPONENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow @43-29B31E6F
    return $P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow;
}
//End Close P_TICKET_COMPONENT_P_TICKET_COMPONENT_Insert_BeforeShow

//P_TICKET_COMPONENT_BeforeShowRow @2-58D83E0E
function P_TICKET_COMPONENT_BeforeShowRow(& $sender)
{
    $P_TICKET_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TICKET_COMPONENT; //Compatibility
//End P_TICKET_COMPONENT_BeforeShowRow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TICKET_COMPONENT1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_TICKET_COMPONENT_ID->GetValue();
        $P_TICKET_COMPONENT1->DataSource->Parameters["urlP_TICKET_COMPONENT_ID"] = $selected_id;
        $P_TICKET_COMPONENT1->DataSource->Prepare();
        $P_TICKET_COMPONENT1->EditMode = $P_TICKET_COMPONENT1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @48-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_TICKET_COMPONENT_ID->GetValue()== $selected_id) {
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

//Close P_TICKET_COMPONENT_BeforeShowRow @2-648673FC
    return $P_TICKET_COMPONENT_BeforeShowRow;
}
//End Close P_TICKET_COMPONENT_BeforeShowRow

//Page_OnInitializeView @1-16FC52D8
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_ticket_component; //Compatibility
//End Page_OnInitializeView

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_TICKET_COMPONENT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0D9AA116
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_ticket_component; //Compatibility
//End Page_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_TICKET_COMPONENTSearch;
	global $P_TICKET_COMPONENT;
	global $P_TICKET_COMPONENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_TICKET_COMPONENTSearch->Visible = false;
		$P_TICKET_COMPONENT->Visible = false;
		$P_TICKET_COMPONENT1->Visible = true;
		$P_TICKET_COMPONENT1->ds->SQL = "";
	} else {
		$P_TICKET_COMPONENTSearch->Visible = true;
		$P_TICKET_COMPONENT->Visible = true;
		$P_TICKET_COMPONENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
