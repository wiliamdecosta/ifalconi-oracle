<?php
//BindEvents Method @1-A614DD16
function BindEvents()
{
    global $P_RECURRING_FEATURE_TARIF1;
    global $CCSEvents;
    $P_RECURRING_FEATURE_TARIF1->Navigator->CCSEvents["BeforeShow"] = "P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow";
    $P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->CCSEvents["BeforeShow"] = "P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow";
    $P_RECURRING_FEATURE_TARIF1->CCSEvents["BeforeShowRow"] = "P_RECURRING_FEATURE_TARIF1_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow @24-AFB57299
function P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow(& $sender)
{
    $P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_FEATURE_TARIF1; //Compatibility
//End P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow @24-451C4703
    return $P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow;
}
//End Close P_RECURRING_FEATURE_TARIF1_Navigator_BeforeShow

//P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow @46-814BBC8A
function P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow(& $sender)
{
    $P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_FEATURE_TARIF1; //Compatibility
//End P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Page = $FileName;
	$P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Parameters = CCRemoveParam($P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Parameters, "P_RECURRING_FEATURE_TARIFF_ID");
	$P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Parameters = CCAddParam($P_RECURRING_FEATURE_TARIF1->P_RECURRING_FEATURE_TARIF1_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow @46-AE921631
    return $P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow;
}
//End Close P_RECURRING_FEATURE_TARIF1_P_RECURRING_FEATURE_TARIF1_Insert_BeforeShow

//P_RECURRING_FEATURE_TARIF1_BeforeShowRow @2-D5600C7F
function P_RECURRING_FEATURE_TARIF1_BeforeShowRow(& $sender)
{
    $P_RECURRING_FEATURE_TARIF1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_FEATURE_TARIF1; //Compatibility
//End P_RECURRING_FEATURE_TARIF1_BeforeShowRow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_RECURRING_FEATURE_TARIF2;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_RECURRING_FEATURE_TARIFF_ID->GetValue();
        $P_RECURRING_FEATURE_TARIF2->DataSource->Parameters["urlP_RECURRING_FEATURE_TARIFF_ID"] = $selected_id;
        $P_RECURRING_FEATURE_TARIF2->DataSource->Prepare();
        $P_RECURRING_FEATURE_TARIF2->EditMode = $P_RECURRING_FEATURE_TARIF2->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @51-E8A92450
    $styles = array("Row", "AltRow");
    $Style = $styles[0];
    if ($Component->DataSource->P_RECURRING_FEATURE_TARIFF_ID->GetValue()== $selected_id) {
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

//Close P_RECURRING_FEATURE_TARIF1_BeforeShowRow @2-88400707
    return $P_RECURRING_FEATURE_TARIF1_BeforeShowRow;
}
//End Close P_RECURRING_FEATURE_TARIF1_BeforeShowRow

//Page_OnInitializeView @1-FDEDFBBD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_recurring_feature_tariff; //Compatibility
//End Page_OnInitializeView

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_RECURRING_FEATURE_TARIFF_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-0ECAC428
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_recurring_feature_tariff; //Compatibility
//End Page_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_RECURRING_FEATURE_TARIF;
	global $P_RECURRING_FEATURE_TARIF1;
	global $P_RECURRING_FEATURE_TARIF2;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_RECURRING_FEATURE_TARIF->Visible = false;
		$P_RECURRING_FEATURE_TARIF1->Visible = false;
		$P_RECURRING_FEATURE_TARIF2->Visible = true;
		$P_RECURRING_FEATURE_TARIF2->ds->SQL = "";
	} else {
		$P_RECURRING_FEATURE_TARIF->Visible = true;
		$P_RECURRING_FEATURE_TARIF1->Visible = true;
		$P_RECURRING_FEATURE_TARIF2->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
