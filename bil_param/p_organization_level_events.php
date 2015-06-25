<?php
//BindEvents Method @1-9624E16B
function BindEvents()
{
    global $P_ORGANIZATION_LEVEL;
    global $CCSEvents;
    $P_ORGANIZATION_LEVEL->Navigator->CCSEvents["BeforeShow"] = "P_ORGANIZATION_LEVEL_Navigator_BeforeShow";
    $P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->CCSEvents["BeforeShow"] = "P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow";
    $P_ORGANIZATION_LEVEL->CCSEvents["BeforeShowRow"] = "P_ORGANIZATION_LEVEL_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_ORGANIZATION_LEVEL_Navigator_BeforeShow @29-113C7423
function P_ORGANIZATION_LEVEL_Navigator_BeforeShow(& $sender)
{
    $P_ORGANIZATION_LEVEL_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ORGANIZATION_LEVEL; //Compatibility
//End P_ORGANIZATION_LEVEL_Navigator_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_ORGANIZATION_LEVEL_Navigator_BeforeShow @29-4F1DE5BB
    return $P_ORGANIZATION_LEVEL_Navigator_BeforeShow;
}
//End Close P_ORGANIZATION_LEVEL_Navigator_BeforeShow

//P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow @55-C8ED829B
function P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow(& $sender)
{
    $P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ORGANIZATION_LEVEL; //Compatibility
//End P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Page = $FileName;
  	$P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Parameters = CCRemoveParam($P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Parameters, "P_ORGANIZATION_LEVEL_ID");
  	$P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Parameters = CCAddParam($P_ORGANIZATION_LEVEL->P_ORGANIZATION_LEVEL_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow @55-66F3FCCD
    return $P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow;
}
//End Close P_ORGANIZATION_LEVEL_P_ORGANIZATION_LEVEL_Insert_BeforeShow

//P_ORGANIZATION_LEVEL_BeforeShowRow @2-728F8796
function P_ORGANIZATION_LEVEL_BeforeShowRow(& $sender)
{
    $P_ORGANIZATION_LEVEL_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ORGANIZATION_LEVEL; //Compatibility
//End P_ORGANIZATION_LEVEL_BeforeShowRow

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ORGANIZATION_LEVEL1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_ORGANIZATION_LEVEL_ID->GetValue();
        $P_ORGANIZATION_LEVEL1->DataSource->Parameters["urlP_ORGANIZATION_LEVEL_ID"] = $selected_id;
        $P_ORGANIZATION_LEVEL1->DataSource->Prepare();
        $P_ORGANIZATION_LEVEL1->EditMode = $P_ORGANIZATION_LEVEL1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @64-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_ORGANIZATION_LEVEL_ID->GetValue()== $selected_id) {
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

//Close P_ORGANIZATION_LEVEL_BeforeShowRow @2-E6834976
    return $P_ORGANIZATION_LEVEL_BeforeShowRow;
}
//End Close P_ORGANIZATION_LEVEL_BeforeShowRow

//Page_BeforeShow @1-1A846ECB
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_organization_level; //Compatibility
//End Page_BeforeShow

//Custom Code @62-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_ORGANIZATION_LEVELSearch;
	global $P_ORGANIZATION_LEVEL;
	global $P_ORGANIZATION_LEVEL1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_ORGANIZATION_LEVELSearch->Visible = false;
		$P_ORGANIZATION_LEVEL->Visible = false;
		$P_ORGANIZATION_LEVEL1->Visible = true;
		$P_ORGANIZATION_LEVEL1->ds->SQL = "";
	} else {
		$P_ORGANIZATION_LEVELSearch->Visible = true;
		$P_ORGANIZATION_LEVEL->Visible = true;
		$P_ORGANIZATION_LEVEL1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-6B492CCB
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_organization_level; //Compatibility
//End Page_OnInitializeView

//Custom Code @63-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_ORGANIZATION_LEVEL_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
