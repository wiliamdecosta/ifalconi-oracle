<?php
//BindEvents Method @1-0F601DEB
function BindEvents()
{
    global $P_BILL_INVOICE_COMP_MAP;
    global $CCSEvents;
    $P_BILL_INVOICE_COMP_MAP->Navigator->CCSEvents["BeforeShow"] = "P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow";
    $P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->CCSEvents["BeforeShow"] = "P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow";
    $P_BILL_INVOICE_COMP_MAP->CCSEvents["BeforeShowRow"] = "P_BILL_INVOICE_COMP_MAP_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow @21-A2E217F3
function P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow(& $sender)
{
    $P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_INVOICE_COMP_MAP; //Compatibility
//End P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow @21-A7692E8B
    return $P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow;
}
//End Close P_BILL_INVOICE_COMP_MAP_Navigator_BeforeShow

//P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow @44-E46DBB7D
function P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow(& $sender)
{
    $P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_INVOICE_COMP_MAP; //Compatibility
//End P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow

//Custom Code @45-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Page = $FileName;
  	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCRemoveParam($P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "P_BILL_INVOICE_COMP_MAP_ID");
  	$P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCAddParam($P_BILL_INVOICE_COMP_MAP->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow @44-86EC5AFF
    return $P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow;
}
//End Close P_BILL_INVOICE_COMP_MAP_P_BILL_INVOICE_COMP_MAP_Insert_BeforeShow

//P_BILL_INVOICE_COMP_MAP_BeforeShowRow @2-C8C369D0
function P_BILL_INVOICE_COMP_MAP_BeforeShowRow(& $sender)
{
    $P_BILL_INVOICE_COMP_MAP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_INVOICE_COMP_MAP; //Compatibility
//End P_BILL_INVOICE_COMP_MAP_BeforeShowRow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_INVOICE_COMP_MAP1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue();
        $P_BILL_INVOICE_COMP_MAP1->DataSource->Parameters["urlP_BILL_INVOICE_COMP_MAP_ID"] = $selected_id;
        $P_BILL_INVOICE_COMP_MAP1->DataSource->Prepare();
        $P_BILL_INVOICE_COMP_MAP1->EditMode = $P_BILL_INVOICE_COMP_MAP1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @50-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue()== $selected_id) {
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

//Close P_BILL_INVOICE_COMP_MAP_BeforeShowRow @2-E75752DD
    return $P_BILL_INVOICE_COMP_MAP_BeforeShowRow;
}
//End Close P_BILL_INVOICE_COMP_MAP_BeforeShowRow

//Page_OnInitializeView @1-7A8DDC13
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_invoice_comp_map; //Compatibility
//End Page_OnInitializeView

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_BILL_INVOICE_COMP_MAP_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-5D174FE8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_bill_invoice_comp_map; //Compatibility
//End Page_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_BILL_INVOICE_COMP_MAPSearch;
	global $P_BILL_INVOICE_COMP_MAP;
	global $P_BILL_INVOICE_COMP_MAP1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_BILL_INVOICE_COMP_MAPSearch->Visible = false;
		$P_BILL_INVOICE_COMP_MAP->Visible = false;
		$P_BILL_INVOICE_COMP_MAP1->Visible = true;
		$P_BILL_INVOICE_COMP_MAP1->ds->SQL = "";
	} else {
		$P_BILL_INVOICE_COMP_MAPSearch->Visible = true;
		$P_BILL_INVOICE_COMP_MAP->Visible = true;
		$P_BILL_INVOICE_COMP_MAP1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
