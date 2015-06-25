<?php
//BindEvents Method @1-EBCBA3C3
function BindEvents()
{
    global $P_CPE_TYPE;
    global $CCSEvents;
    $P_CPE_TYPE->Navigator->CCSEvents["BeforeShow"] = "P_CPE_TYPE_Navigator_BeforeShow";
    $P_CPE_TYPE->P_CPE_TYPE_Insert->CCSEvents["BeforeShow"] = "P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow";
    $P_CPE_TYPE->CCSEvents["BeforeShowRow"] = "P_CPE_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CPE_TYPE_Navigator_BeforeShow @25-0A62BE2A
function P_CPE_TYPE_Navigator_BeforeShow(& $sender)
{
    $P_CPE_TYPE_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_TYPE; //Compatibility
//End P_CPE_TYPE_Navigator_BeforeShow

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_CPE_TYPE_Navigator_BeforeShow @25-9AB9ADC9
    return $P_CPE_TYPE_Navigator_BeforeShow;
}
//End Close P_CPE_TYPE_Navigator_BeforeShow

//P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow @40-7F235055
function P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow(& $sender)
{
    $P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_TYPE; //Compatibility
//End P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow

//Custom Code @41-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_CPE_TYPE->P_CPE_TYPE_Insert->Page = $FileName;
  	$P_CPE_TYPE->P_CPE_TYPE_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_CPE_TYPE->P_CPE_TYPE_Insert->Parameters = CCRemoveParam($P_CPE_TYPE->P_CPE_TYPE_Insert->Parameters, "P_CPE_TYPE_ID");
  	$P_CPE_TYPE->P_CPE_TYPE_Insert->Parameters = CCAddParam($P_CPE_TYPE->P_CPE_TYPE_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow @40-DA2232EB
    return $P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow;
}
//End Close P_CPE_TYPE_P_CPE_TYPE_Insert_BeforeShow

//P_CPE_TYPE_BeforeShowRow @2-06430BD3
function P_CPE_TYPE_BeforeShowRow(& $sender)
{
    $P_CPE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_TYPE; //Compatibility
//End P_CPE_TYPE_BeforeShowRow

//Set Row Style @53-E8A92450

global $P_CPE_TYPE1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_CPE_TYPE_ID->GetValue();
        $P_CPE_TYPE1->DataSource->Parameters["urlP_CPE_TYPE_ID"] = $selected_id;
        $P_CPE_TYPE1->DataSource->Prepare();
        $P_CPE_TYPE1->EditMode = $P_CPE_TYPE1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";



    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_CPE_TYPE_ID->GetValue()== $selected_id) {
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



//Custom Code @54-2A29BDB7
// -------------------------
	
// -------------------------
//End Custom Code

//Close P_CPE_TYPE_BeforeShowRow @2-06ECC96B
    return $P_CPE_TYPE_BeforeShowRow;
}
//End Close P_CPE_TYPE_BeforeShowRow

//Page_OnInitializeView @1-5AC2DF2F
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_CPE_TYPE_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-C7E8472A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_cpe_type; //Compatibility
//End Page_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CPE_TYPESearch;
	global $P_CPE_TYPE;
	global $P_CPE_TYPE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CPE_TYPESearch->Visible = false;
		$P_CPE_TYPE->Visible = false;
		$P_CPE_TYPE1->Visible = true;
		$P_CPE_TYPE1->ds->SQL = "";
	} else {
		$P_CPE_TYPESearch->Visible = true;
		$P_CPE_TYPE->Visible = true;
		$P_CPE_TYPE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
