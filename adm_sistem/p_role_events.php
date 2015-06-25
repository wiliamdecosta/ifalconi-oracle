<?php
//BindEvents Method @1-592369EC
function BindEvents()
{
    global $P_ROLEGrid;
    global $CCSEvents;
    $P_ROLEGrid->Navigator->CCSEvents["BeforeShow"] = "P_ROLEGrid_Navigator_BeforeShow";
    $P_ROLEGrid->CCSEvents["BeforeShowRow"] = "P_ROLEGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_ROLEGrid_Navigator_BeforeShow @18-F07FBA6D
function P_ROLEGrid_Navigator_BeforeShow(& $sender)
{
    $P_ROLEGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ROLEGrid; //Compatibility
//End P_ROLEGrid_Navigator_BeforeShow

//Custom Code @179-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_ROLEGrid_Navigator_BeforeShow @18-84D99B82
    return $P_ROLEGrid_Navigator_BeforeShow;
}
//End Close P_ROLEGrid_Navigator_BeforeShow

//P_ROLEGrid_BeforeShowRow @2-FB1AA4DF
function P_ROLEGrid_BeforeShowRow(& $sender)
{
    $P_ROLEGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ROLEGrid; //Compatibility
//End P_ROLEGrid_BeforeShowRow

    global $P_ROLEForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_ROLE_ID->GetValue();
        $P_ROLEForm->DataSource->Parameters["urlP_ROLE_ID"] = $selected_id;
        $P_ROLEForm->DataSource->Prepare();
        $P_ROLEForm->EditMode = $P_ROLEForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @51-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_ROLE_ID->GetValue()== $selected_id) {
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

//Close P_ROLEGrid_BeforeShowRow @2-4A96D839
    return $P_ROLEGrid_BeforeShowRow;
}
//End Close P_ROLEGrid_BeforeShowRow

//Page_OnInitializeView @1-CA358329
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End Page_OnInitializeView

//Custom Code @172-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_ROLE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
