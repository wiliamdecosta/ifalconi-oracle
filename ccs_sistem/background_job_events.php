<?php
//BindEvents Method @1-E9C3BFB1
function BindEvents()
{
    global $BACKJOBGrid;
    global $LOGJOBGrid;
    global $ForceForm;
    global $CCSEvents;
    $BACKJOBGrid->Navigator->CCSEvents["BeforeShow"] = "BACKJOBGrid_Navigator_BeforeShow";
    $BACKJOBGrid->CCSEvents["BeforeShowRow"] = "BACKJOBGrid_BeforeShowRow";
    $LOGJOBGrid->Navigator->CCSEvents["BeforeShow"] = "LOGJOBGrid_Navigator_BeforeShow";
    $ForceForm->Button_Force->CCSEvents["OnClick"] = "ForceForm_Button_Force_OnClick";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//BACKJOBGrid_Navigator_BeforeShow @7-D972A36C
function BACKJOBGrid_Navigator_BeforeShow(& $sender)
{
    $BACKJOBGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BACKJOBGrid; //Compatibility
//End BACKJOBGrid_Navigator_BeforeShow

//Custom Code @12-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close BACKJOBGrid_Navigator_BeforeShow @7-C33DCF12
    return $BACKJOBGrid_Navigator_BeforeShow;
}
//End Close BACKJOBGrid_Navigator_BeforeShow

//BACKJOBGrid_BeforeShowRow @2-BFF0902E
function BACKJOBGrid_BeforeShowRow(& $sender)
{
    $BACKJOBGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $BACKJOBGrid; //Compatibility
//End BACKJOBGrid_BeforeShowRow

    global $LOGJOBGrid;
    global $selected_id1;
    global $selected_id2;

    if ($selected_id1<0) {
    	$selected_id1 = $Component->DataSource->JOB_CONTROL_ID->GetValue();
    	$selected_id2 = $Component->DataSource->JOB->GetValue();
        $LOGJOBGrid->DataSource->Parameters["urlJOB_CONTROL_ID"] = $selected_id1;
        $LOGJOBGrid->DataSource->Prepare();
        $LOGJOBGrid->EditMode = $LOGJOBGrid->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @3-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->JOB->GetValue()== $selected_id2) {
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

//Close BACKJOBGrid_BeforeShowRow @2-550221F0
    return $BACKJOBGrid_BeforeShowRow;
}
//End Close BACKJOBGrid_BeforeShowRow

//LOGJOBGrid_Navigator_BeforeShow @17-597461CF
function LOGJOBGrid_Navigator_BeforeShow(& $sender)
{
    $LOGJOBGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LOGJOBGrid; //Compatibility
//End LOGJOBGrid_Navigator_BeforeShow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close LOGJOBGrid_Navigator_BeforeShow @17-4080055E
    return $LOGJOBGrid_Navigator_BeforeShow;
}
//End Close LOGJOBGrid_Navigator_BeforeShow

//ForceForm_Button_Force_OnClick @28-7E327A5F
function ForceForm_Button_Force_OnClick(& $sender)
{
    $ForceForm_Button_Force_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ForceForm; //Compatibility
//End ForceForm_Button_Force_OnClick

//Custom Code @30-2A29BDB7
// -------------------------
    // Write your own code here.
    
	$dbConn = new clsDBConn();
    $query = "DECLARE RetVal VARCHAR2(2000); BEGIN  RetVal := PACK_BACKGROUND_SCHEDULER.FORCE_SCHEDULER;  END;";
	$dbConn->query($query);
	$dbConn->close();
    
// -------------------------
//End Custom Code

//Close ForceForm_Button_Force_OnClick @28-1AF6FD5D
    return $ForceForm_Button_Force_OnClick;
}
//End Close ForceForm_Button_Force_OnClick

//Page_OnInitializeView @1-7CE5A418
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $background_job; //Compatibility
//End Page_OnInitializeView

//Custom Code @11-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id1;
    global $selected_id2;
    $selected_id1 = -1;
    $selected_id2 = -1;
    $selected_id1=CCGetFromGet("JOB_CONTROL_ID", $selected_id1);
    $selected_id2=CCGetFromGet("JOB", $selected_id2);
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
