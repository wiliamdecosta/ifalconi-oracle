<?php
//BindEvents Method @1-8AF11438
function BindEvents()
{
    global $P_APPROLEGrid;
    global $CCSEvents;
    $P_APPROLEGrid->Navigator->CCSEvents["BeforeShow"] = "P_APPROLEGrid_Navigator_BeforeShow";
    $P_APPROLEGrid->CCSEvents["BeforeShowRow"] = "P_APPROLEGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method


//P_APPROLEGrid_Navigator_BeforeShow @112-D7810048
function P_APPROLEGrid_Navigator_BeforeShow(& $sender)
{
    $P_APPROLEGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPROLEGrid; //Compatibility
//End P_APPROLEGrid_Navigator_BeforeShow

//Custom Code @117-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible=true;
// -------------------------
//End Custom Code

//Close P_APPROLEGrid_Navigator_BeforeShow @112-DF23F35E
    return $P_APPROLEGrid_Navigator_BeforeShow;
}
//End Close P_APPROLEGrid_Navigator_BeforeShow

//P_APPROLEGrid_BeforeShowRow @105-C2F2F4C7
function P_APPROLEGrid_BeforeShowRow(& $sender)
{
    $P_APPROLEGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPROLEGrid; //Compatibility
//End P_APPROLEGrid_BeforeShowRow

//Custom Code @116-2A29BDB7
// -------------------------
    // Write your own code here.
    global $P_APPROLEForm;
    global $selected_id;

    if ($selected_id<0) {
    	$selected_id = $Component->DataSource->P_APPLICATION_ROLE_ID->GetValue();
        $P_APPROLEForm->DataSource->Parameters["urlP_APPLICATION_ROLE_ID"] = $selected_id;
        $P_APPROLEForm->DataSource->Prepare();
        $P_APPROLEForm->EditMode = $P_APPROLEForm->DataSource->AllParametersSet;
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

      $styles = array("Row", "AltRow");
 
      $Style = $styles[0];
      if ($Component->DataSource->P_APPLICATION_ROLE_ID->GetValue()== $selected_id) {
      	$img_radio= "<img border='0' src='../images/radio_s.gif'>";
        $Style = $styles[1];
      }	

    if ($Component->CheckBox_Delete->Visible == false)
    {
        $Style = $styles[0];
        $Component->DLink->Visible = false;
    }

    $Component->rowStyle->SetValue($Style);  // Bdr
    $Component->DLink->SetValue($img_radio);  // Bdr
// -------------------------
//End Custom Code

//Close P_APPROLEGrid_BeforeShowRow @105-0C4E776B
    return $P_APPROLEGrid_BeforeShowRow;
}
//End Close P_APPROLEGrid_BeforeShowRow

//Page_OnInitializeView @1-BC921559
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_application_role; //Compatibility
//End Page_OnInitializeView

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_APPLICATION_ROLE_ID", $selected_id);
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
