<?php
//BindEvents Method @1-18613382
function BindEvents()
{
    global $P_FEATURE_PROMOTION;
    global $CCSEvents;
    $P_FEATURE_PROMOTION->Navigator->CCSEvents["BeforeShow"] = "P_FEATURE_PROMOTION_Navigator_BeforeShow";
    $P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->CCSEvents["BeforeShow"] = "P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow";
    $P_FEATURE_PROMOTION->CCSEvents["BeforeShowRow"] = "P_FEATURE_PROMOTION_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FEATURE_PROMOTION_Navigator_BeforeShow @21-E141C537
function P_FEATURE_PROMOTION_Navigator_BeforeShow(& $sender)
{
    $P_FEATURE_PROMOTION_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_PROMOTION; //Compatibility
//End P_FEATURE_PROMOTION_Navigator_BeforeShow

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
	$Component->Visible = true;
// -------------------------
//End Custom Code

//Close P_FEATURE_PROMOTION_Navigator_BeforeShow @21-8711A67E
    return $P_FEATURE_PROMOTION_Navigator_BeforeShow;
}
//End Close P_FEATURE_PROMOTION_Navigator_BeforeShow

//P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow @46-90C85A6A
function P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow(& $sender)
{
    $P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_PROMOTION; //Compatibility
//End P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Page = $FileName;
	$P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Parameters = CCRemoveParam($P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Parameters, "P_FEATURE_PROMOTION_ID");
	$P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Parameters = CCAddParam($P_FEATURE_PROMOTION->P_FEATURE_PROMOTION_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow @46-99342174
    return $P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow;
}
//End Close P_FEATURE_PROMOTION_P_FEATURE_PROMOTION_Insert_BeforeShow

//P_FEATURE_PROMOTION_BeforeShowRow @2-93A3C08B
function P_FEATURE_PROMOTION_BeforeShowRow(& $sender)
{
    $P_FEATURE_PROMOTION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FEATURE_PROMOTION; //Compatibility
//End P_FEATURE_PROMOTION_BeforeShowRow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FEATURE_PROMOTION1;
    global $selected_id;
    global $add_flag;

    if ($selected_id<0 && $add_flag!="ADD") {
    	$selected_id = $Component->DataSource->P_FEATURE_PROMOTION_ID->GetValue();
        $P_FEATURE_PROMOTION1->DataSource->Parameters["urlP_FEATURE_PROMOTION_ID"] = $selected_id;
        $P_FEATURE_PROMOTION1->DataSource->Prepare();
        $P_FEATURE_PROMOTION1->EditMode = $P_FEATURE_PROMOTION1->DataSource->AllParametersSet;
        
   }
   
    $img_radio= "<img border='0' src='../images/radio.gif'>";
// -------------------------
//End Custom Code

//Set Row Style @51-E8A92450
    $styles = array("Row", "AltRow");

    $Style = $styles[0];
    if ($Component->DataSource->P_FEATURE_PROMOTION_ID->GetValue()== $selected_id) {
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

//Close P_FEATURE_PROMOTION_BeforeShowRow @2-3439CAC7
    return $P_FEATURE_PROMOTION_BeforeShowRow;
}
//End Close P_FEATURE_PROMOTION_BeforeShowRow

//Page_OnInitializeView @1-185BC246
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_promotion; //Compatibility
//End Page_OnInitializeView

//Custom Code @52-2A29BDB7
// -------------------------
    // Write your own code here.
	global $selected_id;
    global $add_flag;
    $selected_id = -1;
    $selected_id=CCGetFromGet("P_FEATURE_PROMOTION_ID", $selected_id);
    $add_flag=CCGetFromGet("FLAG", "NONE");
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-649C4B02
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_feature_promotion; //Compatibility
//End Page_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_FEATURE_PROMOTIONSearch;
	global $P_FEATURE_PROMOTION;
	global $P_FEATURE_PROMOTION1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_FEATURE_PROMOTIONSearch->Visible = false;
		$P_FEATURE_PROMOTION->Visible = false;
		$P_FEATURE_PROMOTION1->Visible = true;
		$P_FEATURE_PROMOTION1->ds->SQL = "";
	} else {
		$P_FEATURE_PROMOTIONSearch->Visible = true;
		$P_FEATURE_PROMOTION->Visible = true;
		$P_FEATURE_PROMOTION1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
