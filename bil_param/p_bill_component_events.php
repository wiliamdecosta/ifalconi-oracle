<?php
//BindEvents Method @1-8CABFC2F
function BindEvents()
{
    global $P_BILL_COMPONENT;
    global $CCSEvents;
    $P_BILL_COMPONENT->Navigator->CCSEvents["BeforeShow"] = "P_BILL_COMPONENT_Navigator_BeforeShow";
    $P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->CCSEvents["BeforeShow"] = "P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow";
    $P_BILL_COMPONENT->CCSEvents["BeforeShowRow"] = "P_BILL_COMPONENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_COMPONENT_Navigator_BeforeShow @24-2539C781
function P_BILL_COMPONENT_Navigator_BeforeShow(& $sender)
{
    $P_BILL_COMPONENT_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_Navigator_BeforeShow

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BILL_COMPONENT_Navigator_BeforeShow @24-8270D470
    return $P_BILL_COMPONENT_Navigator_BeforeShow;
}
//End Close P_BILL_COMPONENT_Navigator_BeforeShow

//P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow @45-176829E9
function P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow(& $sender)
{
    $P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Page = $FileName;
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCRemoveParam($P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters, "P_BILL_COMPONENT_ID");
	$P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters = CCAddParam($P_BILL_COMPONENT->P_BILL_COMPONENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow @45-BE5D11EC
    return $P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow;
}
//End Close P_BILL_COMPONENT_P_BILL_COMPONENT_Insert_BeforeShow

//P_BILL_COMPONENT_BeforeShowRow @2-F571BC76
function P_BILL_COMPONENT_BeforeShowRow(& $sender)
{
    $P_BILL_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_BeforeShowRow

//Custom Code @64-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_COMPONENT1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BILL_COMPONENT_ID->GetValue();
        $P_BILL_COMPONENT1->DataSource->Parameters["urlP_BILL_COMPONENT_ID"] = $selected_id;
        $P_BILL_COMPONENT1->DataSource->Prepare();
        $P_BILL_COMPONENT1->EditMode = $P_BILL_COMPONENT1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @65-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BILL_COMPONENT_ID->GetValue()== $selected_id) {
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

//Close P_BILL_COMPONENT_BeforeShowRow @2-D705C1E7
    return $P_BILL_COMPONENT_BeforeShowRow;
}
//End Close P_BILL_COMPONENT_BeforeShowRow

//Page_OnInitializeView @1-BFDD8181
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component; //Compatibility
//End Page_OnInitializeView

//Custom Code @66-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BILL_COMPONENT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-3422181A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_component; //Compatibility
//End Page_BeforeShow

//Custom Code @67-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_COMPONENTSearch;
	global $P_BILL_COMPONENT;
	global $P_BILL_COMPONENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_COMPONENTSearch->Visible = false;
		$P_BILL_COMPONENT->Visible = false;
		$P_BILL_COMPONENT1->Visible = true;
		$P_BILL_COMPONENT1->ds->SQL = "";
	} else {
		$P_BILL_COMPONENTSearch->Visible = true;
		$P_BILL_COMPONENT->Visible = true;
		$P_BILL_COMPONENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
