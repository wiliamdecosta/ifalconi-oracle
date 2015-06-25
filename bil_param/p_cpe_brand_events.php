<?php
//BindEvents Method @1-FB75AADB
function BindEvents()
{
    global $P_CPE_BRAND;
    global $CCSEvents;
    $P_CPE_BRAND->Navigator->CCSEvents["BeforeShow"] = "P_CPE_BRAND_Navigator_BeforeShow";
    $P_CPE_BRAND->P_APPL_Insert->CCSEvents["BeforeShow"] = "P_CPE_BRAND_P_APPL_Insert_BeforeShow";
    $P_CPE_BRAND->CCSEvents["BeforeShowRow"] = "P_CPE_BRAND_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CPE_BRAND_Navigator_BeforeShow @22-68393D1E
function P_CPE_BRAND_Navigator_BeforeShow(& $sender)
{
    $P_CPE_BRAND_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_BRAND; //Compatibility
//End P_CPE_BRAND_Navigator_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_CPE_BRAND_Navigator_BeforeShow @22-2BBACD25
    return $P_CPE_BRAND_Navigator_BeforeShow;
}
//End Close P_CPE_BRAND_Navigator_BeforeShow

//P_CPE_BRAND_P_APPL_Insert_BeforeShow @36-73416FDD
function P_CPE_BRAND_P_APPL_Insert_BeforeShow(& $sender)
{
    $P_CPE_BRAND_P_APPL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_BRAND; //Compatibility
//End P_CPE_BRAND_P_APPL_Insert_BeforeShow

//Custom Code @37-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_CPE_BRAND->P_CPE_BRAND_Insert->Page = $FileName;
  	$P_CPE_BRAND->P_CPE_BRAND_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_CPE_BRAND->P_CPE_BRAND_Insert->Parameters = CCRemoveParam($P_CPE_BRAND->P_CPE_BRAND_Insert->Parameters, "P_CPE_BRAND_ID");
  	$P_CPE_BRAND->P_CPE_BRAND_Insert->Parameters = CCAddParam($P_CPE_BRAND->P_CPE_BRAND_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CPE_BRAND_P_APPL_Insert_BeforeShow @36-8B5545D6
    return $P_CPE_BRAND_P_APPL_Insert_BeforeShow;
}
//End Close P_CPE_BRAND_P_APPL_Insert_BeforeShow

//P_CPE_BRAND_BeforeShowRow @2-60FE4907
function P_CPE_BRAND_BeforeShowRow(& $sender)
{
    $P_CPE_BRAND_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_BRAND; //Compatibility
//End P_CPE_BRAND_BeforeShowRow

//Custom Code @48-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CPE_BRAND1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_CPE_BRAND_ID->GetValue();
        $P_CPE_BRAND1->DataSource->Parameters["urlP_CPE_BRAND_ID"] = $selected_id;
        $P_CPE_BRAND1->DataSource->Prepare();
        $P_CPE_BRAND1->EditMode = $P_CPE_BRAND1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @49-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_CPE_BRAND_ID->GetValue()== $selected_id) {
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

//Close P_CPE_BRAND_BeforeShowRow @2-F3535C13
    return $P_CPE_BRAND_BeforeShowRow;
}
//End Close P_CPE_BRAND_BeforeShowRow

//Page_OnInitializeView @1-A19187E6
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_brand; //Compatibility
//End Page_OnInitializeView

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_CPE_BRAND_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-D16659F1
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_brand; //Compatibility
//End Page_BeforeShow

//Custom Code @51-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CPE_BRANDSearch;
	global $P_CPE_BRAND;
	global $P_CPE_BRAND1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CPE_BRANDSearch->Visible = false;
		$P_CPE_BRAND->Visible = false;
		$P_CPE_BRAND1->Visible = true;
		$P_CPE_BRAND1->ds->SQL = "";
	} else {
		$P_CPE_BRANDSearch->Visible = true;
		$P_CPE_BRAND->Visible = true;
		$P_CPE_BRAND1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
