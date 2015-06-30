<?php
//BindEvents Method @1-6E29DF1B
function BindEvents()
{
    global $P_APPLGrid;
    global $CCSEvents;
    $P_APPLGrid->Navigator->CCSEvents["BeforeShow"] = "P_APPLGrid_Navigator_BeforeShow";
    $P_APPLGrid->P_APPL_Insert->CCSEvents["BeforeShow"] = "P_APPLGrid_P_APPL_Insert_BeforeShow";
    $P_APPLGrid->CCSEvents["BeforeShowRow"] = "P_APPLGrid_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_APPLGrid_Navigator_BeforeShow @7-C90051F5
function P_APPLGrid_Navigator_BeforeShow(& $sender)
{
    $P_APPLGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPLGrid; //Compatibility
//End P_APPLGrid_Navigator_BeforeShow

//Custom Code @175-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

  // -------------------------
      // Write your own code here.
  	$Component->Visible = true;
  // -------------------------


//Close P_APPLGrid_Navigator_BeforeShow @7-F7579B59
    return $P_APPLGrid_Navigator_BeforeShow;
}
//End Close P_APPLGrid_Navigator_BeforeShow

//P_APPLGrid_P_APPL_Insert_BeforeShow @128-F24DDE72
function P_APPLGrid_P_APPL_Insert_BeforeShow(& $sender)
{
    $P_APPLGrid_P_APPL_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPLGrid; //Compatibility
//End P_APPLGrid_P_APPL_Insert_BeforeShow

//Custom Code @215-2A29BDB7
// -------------------------
  	global $FileName;
  	$P_APPLGrid->P_APPL_Insert->Page = $FileName;
  	$P_APPLGrid->P_APPL_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_APPLGrid->P_APPL_Insert->Parameters = CCRemoveParam($P_APPLGrid->P_APPL_Insert->Parameters, "P_APPLICATION_ID");
  	$P_APPLGrid->P_APPL_Insert->Parameters = CCAddParam($P_APPLGrid->P_APPL_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_APPLGrid_P_APPL_Insert_BeforeShow @128-A6381BAE
    return $P_APPLGrid_P_APPL_Insert_BeforeShow;
}
//End Close P_APPLGrid_P_APPL_Insert_BeforeShow

//P_APPLGrid_BeforeShowRow @2-505D0004
function P_APPLGrid_BeforeShowRow(& $sender)
{
    $P_APPLGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_APPLGrid; //Compatibility
//End P_APPLGrid_BeforeShowRow

//Set Row Style @94-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @214-2A29BDB7
// -------------------------
   $keyId = CCGetFromGet("P_APPLICATION_ID", "");
  	$sCode = CCGetFromGet("s_keyword", "");
  	global $id;
  	if (empty($keyId)) {
  		if (empty($id)) {
  			$id = $P_APPLGrid->P_APPLICATION_ID->GetValue();
  		}
  		global $FileName;
  		global $PathToCurrentPage;
  		$param = CCGetQueryString("QueryString", "");
  		$param = CCAddParam($param, "P_APPLICATION_ID", $id);
  		
  		$Redirect = $FileName."?".$param;
  		//die($Redirect);
  		header("Location: ".$Redirect);
  		return;
  	}
  
  	if ($P_APPLGrid->P_APPLICATION_ID->GetValue() == $keyId) {
  		$P_APPLGrid->ADLink->Visible = true;
  		$P_APPLGrid->DLink->Visible = false;
  		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
  	} else {
  		$P_APPLGrid->ADLink->Visible = false;
  		$P_APPLGrid->DLink->Visible = true;
  		$Component->Attributes->SetValue("rowStyle", "class=Row");
  	}
// -------------------------
//End Custom Code

    


//Close P_APPLGrid_BeforeShowRow @2-ECAC2641
    return $P_APPLGrid_BeforeShowRow;
}
//End Close P_APPLGrid_BeforeShowRow

//Page_OnInitializeView @1-A520B4B2
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_application; //Compatibility
//End Page_OnInitializeView

//Custom Code @174-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code




//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-C1C8BF00
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_application; //Compatibility
//End Page_BeforeShow

//Custom Code @216-2A29BDB7
// -------------------------
  	global $P_APPLSearch;
  	global $P_APPLGrid;
  	global $P_APPLForm;
  	global $id;
  	$tambah = CCGetFromGet("TAMBAH", "");
  
  	if($tambah == "1") {
  		$P_APPLSearch->Visible = false;
  		$P_APPLGrid->Visible = false;
  		$P_APPLForm->Visible = true;
  		$P_APPLForm->ds->SQL = "";
  	} else {
  		$P_APPLSearch->Visible = true;
  		$P_APPLGrid->Visible = true;
  		$P_APPLForm->Visible = true;
  	}
  // -------------------------
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
