<?php
//BindEvents Method @1-7F84C167
function BindEvents()
{
    global $P_MENUGrid;
    global $CCSEvents;
    $P_MENUGrid->Navigator->CCSEvents["BeforeShow"] = "P_MENUGrid_Navigator_BeforeShow";
    $P_MENUGrid->CCSEvents["BeforeShowRow"] = "P_MENUGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_MENUGrid_Navigator_BeforeShow @107-E81CB953
function P_MENUGrid_Navigator_BeforeShow(& $sender)
{
    $P_MENUGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_MENUGrid; //Compatibility
//End P_MENUGrid_Navigator_BeforeShow

//Custom Code @201-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible=true;
// -------------------------
//End Custom Code

//Close P_MENUGrid_Navigator_BeforeShow @107-A8C871A4
    return $P_MENUGrid_Navigator_BeforeShow;
}
//End Close P_MENUGrid_Navigator_BeforeShow


//P_MENUGrid_BeforeShowRow @101-86C7875A
function P_MENUGrid_BeforeShowRow(& $sender)
{
    $P_MENUGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_MENUGrid; //Compatibility
//End P_MENUGrid_BeforeShowRow

    global $P_MENUForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_MENU_ID->GetValue();
        $P_MENUForm->DataSource->Parameters["urlP_MENU_ID"] = $selected_id;
        $P_MENUForm->DataSource->Prepare();
        $P_MENUForm->EditMode = $P_MENUForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @144-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_MENU_ID->GetValue()== $selected_id) {
    	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
    }	

    if (count($styles)) {
//        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style
    $Component->DLink->SetValue($img_radio);  // Bdr

//Close P_MENUGrid_BeforeShowRow @101-5E73E76E
    return $P_MENUGrid_BeforeShowRow;
}
//End Close P_MENUGrid_BeforeShowRow

//Page_OnInitializeView @1-39FCB1A7
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_OnInitializeView

//Custom Code @250-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_MENU_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
