<?php
//BindEvents Method @1-AD9A1D24
function BindEvents()
{
    global $P_BUSINESS_SEGMENT;
    global $CCSEvents;
    $P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->CCSEvents["BeforeShow"] = "P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow";
    $P_BUSINESS_SEGMENT->CCSEvents["BeforeShowRow"] = "P_BUSINESS_SEGMENT_BeforeShowRow";
    $P_BUSINESS_SEGMENT->CCSEvents["BeforeShow"] = "P_BUSINESS_SEGMENT_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow @7-110A6232
function P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow(& $sender)
{
    $P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_SEGMENT; //Compatibility
//End P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow

//Custom Code @57-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Page = $FileName;
	$P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Parameters = CCRemoveParam($P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Parameters, "P_BUSINESS_SEGMENT_ID");
	$P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Parameters = CCAddParam($P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow @7-6741BF40
    return $P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow;
}
//End Close P_BUSINESS_SEGMENT_P_BUSINESS_SEGMENT_Insert_BeforeShow

//P_BUSINESS_SEGMENT_BeforeShowRow @2-F7CCADD7
function P_BUSINESS_SEGMENT_BeforeShowRow(& $sender)
{
    $P_BUSINESS_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_SEGMENT; //Compatibility
//End P_BUSINESS_SEGMENT_BeforeShowRow

//Set Row Style @58-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @59-2A29BDB7
// -------------------------
      	$keyId = CCGetFromGet("P_BUSINESS_SEGMENT_ID", "");
  	$sCode = CCGetFromGet("s_keyword", "");
  	global $id;
  	if (empty($keyId)) {
  		if (empty($id)) {
  			$id = $P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_ID->GetValue();
  		}
  		global $FileName;
  		global $PathToCurrentPage;
  		$param = CCGetQueryString("QueryString", "");
  		$param = CCAddParam($param, "P_BUSINESS_SEGMENT_ID", $id);
  		
  		$Redirect = $FileName."?".$param;
  		//die($Redirect);
  		header("Location: ".$Redirect);
  		return;
  	}
  
  	if ($P_BUSINESS_SEGMENT->P_BUSINESS_SEGMENT_ID->GetValue() == $keyId) {
  		$P_BUSINESS_SEGMENT->ADLink->Visible = true;
  		$P_BUSINESS_SEGMENT->DLink->Visible = false;
  		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
  	} else {
  		$P_BUSINESS_SEGMENT->ADLink->Visible = false;
  		$P_BUSINESS_SEGMENT->DLink->Visible = true;
  		$Component->Attributes->SetValue("rowStyle", "class=Row");
  	}
// -------------------------
//End Custom Code


//Close P_BUSINESS_SEGMENT_BeforeShowRow @2-C7C11E7B
    return $P_BUSINESS_SEGMENT_BeforeShowRow;
}
//End Close P_BUSINESS_SEGMENT_BeforeShowRow

//P_BUSINESS_SEGMENT_BeforeShow @2-247ACCB9
function P_BUSINESS_SEGMENT_BeforeShow(& $sender)
{
    $P_BUSINESS_SEGMENT_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BUSINESS_SEGMENT; //Compatibility
//End P_BUSINESS_SEGMENT_BeforeShow

//Custom Code @95-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code


//Close P_BUSINESS_SEGMENT_BeforeShow @2-7BAC4CC4
    return $P_BUSINESS_SEGMENT_BeforeShow;
}
//End Close P_BUSINESS_SEGMENT_BeforeShow

//Page_OnInitializeView @1-C4B87194
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_segment; //Compatibility
//End Page_OnInitializeView

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-DFDE825A
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_business_segment; //Compatibility
//End Page_BeforeShow

//Custom Code @61-2A29BDB7
// -------------------------
      	global $P_BUSINESS_SEGMENTSearch;
  	global $P_BUSINESS_SEGMENT;
  	global $P_BUSINESS_SEGMENT1;
  	global $id;
  	$tambah = CCGetFromGet("TAMBAH", "");
  
  	if($tambah == "1") {
  		$P_BUSINESS_SEGMENTSearch->Visible = false;
  		$P_BUSINESS_SEGMENT->Visible = false;
  		//$P_BUSINESS_SEGMENT1->Visible = true;
  		//$P_BUSINESS_SEGMENT1->ds->SQL = "";
  	} else {
  		$P_BUSINESS_SEGMENTSearch->Visible = true;
  		$P_BUSINESS_SEGMENT->Visible = true;
  		//$P_BUSINESS_SEGMENT1->Visible = true;
  	}
// -------------------------
//End Custom Code


//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
