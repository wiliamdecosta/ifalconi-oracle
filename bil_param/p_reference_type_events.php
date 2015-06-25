<?php
//BindEvents Method @1-852E49DE
function BindEvents()
{
    global $P_REFERENCE_TYPEGrid;
    global $CCSEvents;
    $P_REFERENCE_TYPEGrid->Navigator->CCSEvents["BeforeShow"] = "P_REFERENCE_TYPEGrid_Navigator_BeforeShow";
    $P_REFERENCE_TYPEGrid->CCSEvents["BeforeShowRow"] = "P_REFERENCE_TYPEGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_REFERENCE_TYPEGrid_Navigator_BeforeShow @34-A2B79015
function P_REFERENCE_TYPEGrid_Navigator_BeforeShow(& $sender)
{
    $P_REFERENCE_TYPEGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REFERENCE_TYPEGrid; //Compatibility
//End P_REFERENCE_TYPEGrid_Navigator_BeforeShow

//Custom Code @95-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_REFERENCE_TYPEGrid_Navigator_BeforeShow @34-5CB37316
    return $P_REFERENCE_TYPEGrid_Navigator_BeforeShow;
}
//End Close P_REFERENCE_TYPEGrid_Navigator_BeforeShow

//P_REFERENCE_TYPEGrid_BeforeShowRow @2-77D1D813
function P_REFERENCE_TYPEGrid_BeforeShowRow(& $sender)
{
    $P_REFERENCE_TYPEGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REFERENCE_TYPEGrid; //Compatibility
//End P_REFERENCE_TYPEGrid_BeforeShowRow

    global $P_REFERENCE_TYPEForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_REFERENCE_TYPE_ID->GetValue();
        $P_REFERENCE_TYPEForm->DataSource->Parameters["urlP_REFERENCE_TYPE_ID"] = $selected_id;
        $P_REFERENCE_TYPEForm->DataSource->Prepare();
        $P_REFERENCE_TYPEForm->EditMode = $P_REFERENCE_TYPEForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @63-BEA8E266
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_REFERENCE_TYPE_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	
    
    if (count($styles)) {
//        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("RowStyle", $Style);
    }
//End Set Row Style

    $Component->DLink->SetValue($img_radio);  // Bdr

//Close P_REFERENCE_TYPEGrid_BeforeShowRow @2-8F19E6DB
    return $P_REFERENCE_TYPEGrid_BeforeShowRow;
}
//End Close P_REFERENCE_TYPEGrid_BeforeShowRow

//Page_OnInitializeView @1-59C2E61C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_reference_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_REFERENCE_TYPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
