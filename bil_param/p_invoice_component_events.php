<?php
//BindEvents Method @1-E7784787
function BindEvents()
{
    global $P_INVOICE_COMPONENT;
    global $CCSEvents;
    $P_INVOICE_COMPONENT->Navigator->CCSEvents["BeforeShow"] = "P_INVOICE_COMPONENT_Navigator_BeforeShow";
    $P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->CCSEvents["BeforeShow"] = "P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow";
    $P_INVOICE_COMPONENT->CCSEvents["BeforeShowRow"] = "P_INVOICE_COMPONENT_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_INVOICE_COMPONENT_Navigator_BeforeShow @21-052559A8
function P_INVOICE_COMPONENT_Navigator_BeforeShow(& $sender)
{
    $P_INVOICE_COMPONENT_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_Navigator_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_INVOICE_COMPONENT_Navigator_BeforeShow @21-509DBB86
    return $P_INVOICE_COMPONENT_Navigator_BeforeShow;
}
//End Close P_INVOICE_COMPONENT_Navigator_BeforeShow

//P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow @44-CAFAB307
function P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow(& $sender)
{
    $P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow

//Custom Code @45-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Page = $FileName;
  	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCRemoveParam($P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters, "P_INVOICE_COMPONENT_ID");
  	$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters = CCAddParam($P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow @44-351F9D12
    return $P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow;
}
//End Close P_INVOICE_COMPONENT_P_INVOICE_COMPONENT_Insert_BeforeShow

//P_INVOICE_COMPONENT_BeforeShowRow @2-E6BEBB81
function P_INVOICE_COMPONENT_BeforeShowRow(& $sender)
{
    $P_INVOICE_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_BeforeShowRow

//Custom Code @59-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_INVOICE_COMPONENT1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_INVOICE_COMPONENT_ID->GetValue();
        $P_INVOICE_COMPONENT1->DataSource->Parameters["urlP_INVOICE_COMPONENT_ID"] = $selected_id;
        $P_INVOICE_COMPONENT1->DataSource->Prepare();
        $P_INVOICE_COMPONENT1->EditMode = $P_INVOICE_COMPONENT1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @60-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_INVOICE_COMPONENT_ID->GetValue()== $selected_id) {
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

//Close P_INVOICE_COMPONENT_BeforeShowRow @2-5E4919BC
    return $P_INVOICE_COMPONENT_BeforeShowRow;
}
//End Close P_INVOICE_COMPONENT_BeforeShowRow

//Page_OnInitializeView @1-722B113D
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_invoice_component; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_INVOICE_COMPONENT_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0EEC9879
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_invoice_component; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_INVOICE_COMPONENTSearch;
	global $P_INVOICE_COMPONENT;
	global $P_INVOICE_COMPONENT1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_INVOICE_COMPONENTSearch->Visible = false;
		$P_INVOICE_COMPONENT->Visible = false;
		$P_INVOICE_COMPONENT1->Visible = true;
		$P_INVOICE_COMPONENT1->ds->SQL = "";
	} else {
		$P_INVOICE_COMPONENTSearch->Visible = true;
		$P_INVOICE_COMPONENT->Visible = true;
		$P_INVOICE_COMPONENT1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
