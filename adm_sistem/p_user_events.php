<?php
//BindEvents Method @1-19378D1D
function BindEvents()
{
    global $P_USERGrid;
    global $P_USERForm;
    global $CCSEvents;
    $P_USERGrid->Navigator->CCSEvents["BeforeShow"] = "P_USERGrid_Navigator_BeforeShow";
    $P_USERGrid->CCSEvents["BeforeShowRow"] = "P_USERGrid_BeforeShowRow";
    $P_USERForm->Button_Reset->CCSEvents["OnClick"] = "P_USERForm_Button_Reset_OnClick";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_USERGrid_Navigator_BeforeShow @18-DA96DD0D
function P_USERGrid_Navigator_BeforeShow(& $sender)
{
    $P_USERGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_USERGrid; //Compatibility
//End P_USERGrid_Navigator_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible=true;
// -------------------------
//End Custom Code

//Close P_USERGrid_Navigator_BeforeShow @18-C7FA9193
    return $P_USERGrid_Navigator_BeforeShow;
}
//End Close P_USERGrid_Navigator_BeforeShow

//P_USERGrid_BeforeShowRow @2-A5CE1D88
function P_USERGrid_BeforeShowRow(& $sender)
{
    $P_USERGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_USERGrid; //Compatibility
//End P_USERGrid_BeforeShowRow

    global $P_USERForm;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_USER_ID->GetValue();
        $P_USERForm->DataSource->Parameters["urlP_USER_ID"] = $selected_id;
        $P_USERForm->DataSource->Prepare();
        $P_USERForm->EditMode = $P_USERForm->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";

//Set Row Style @51-982C9472
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_USER_ID->GetValue()== $selected_id) {
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

//Close P_USERGrid_BeforeShowRow @2-F6715DC3
    return $P_USERGrid_BeforeShowRow;
}
//End Close P_USERGrid_BeforeShowRow

//P_USERForm_Button_Reset_OnClick @202-F11C1FF5
function P_USERForm_Button_Reset_OnClick(& $sender)
{
    $P_USERForm_Button_Reset_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_USERForm; //Compatibility
//End P_USERForm_Button_Reset_OnClick

//Custom Code @209-2A29BDB7
// -------------------------
    // Write your own code here.
	$dbConn = new clsDBConn();
	$query = "UPDATE P_USER SET USER_PWD=UPPER('" . md5(CCGetFromPost("USER_NAME", "-")) . "') WHERE P_USER_ID=" . CCGetFromGet("P_USER_ID", "0");

	$dbConn->query($query);
	$dbConn->close();

// -------------------------
//End Custom Code

//Close P_USERForm_Button_Reset_OnClick @202-5839C04F
    return $P_USERForm_Button_Reset_OnClick;
}
//End Close P_USERForm_Button_Reset_OnClick

//Page_OnInitializeView @1-173AF30C
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user; //Compatibility
//End Page_OnInitializeView

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
    global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_USER_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
