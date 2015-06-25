<?php
//BindEvents Method @1-75AB999B
function BindEvents()
{
    global $P_APPLGrid;
    global $CCSEvents;
    $P_APPLGrid->Navigator->CCSEvents["BeforeShow"] = "P_APPLGrid_Navigator_BeforeShow";
    $P_APPLGrid->CCSEvents["BeforeShowRow"] = "P_APPLGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_APPLGrid_Navigator_BeforeShow @7-C90051F5
function P_APPLGrid_Navigator_BeforeShow(& $sender)
{
    $P_APPLGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPLGrid; //Compatibility
//End P_APPLGrid_Navigator_BeforeShow

//Custom Code @175-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_APPLGrid_Navigator_BeforeShow @7-F7579B59
    return $P_APPLGrid_Navigator_BeforeShow;
}
//End Close P_APPLGrid_Navigator_BeforeShow

//P_APPLGrid_BeforeShowRow @2-505D0004
function P_APPLGrid_BeforeShowRow(& $sender)
{
    $P_APPLGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPLGrid; //Compatibility
//End P_APPLGrid_BeforeShowRow

    global $P_APPLForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_APPLICATION_ID->GetValue();
        $P_APPLForm->DataSource->Parameters["urlP_APPLICATION_ID"] = $selected_id;
        $P_APPLForm->DataSource->Prepare();
        $P_APPLForm->EditMode = $P_APPLForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @94-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_APPLICATION_ID->GetValue()== $selected_id) {
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


//Close P_APPLGrid_BeforeShowRow @2-ECAC2641
    return $P_APPLGrid_BeforeShowRow;
}
//End Close P_APPLGrid_BeforeShowRow

//Page_OnInitializeView @1-A520B4B2
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_application; //Compatibility
//End Page_OnInitializeView

//Custom Code @174-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_APPLICATION_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
