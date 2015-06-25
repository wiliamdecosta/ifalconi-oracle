<?php
//BindEvents Method @1-BE480255
function BindEvents()
{
    global $P_FINANCE_PERIOD;
    global $CCSEvents;
    $P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->CCSEvents["BeforeShow"] = "P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow";
    $P_FINANCE_PERIOD->CCSEvents["BeforeShowRow"] = "P_FINANCE_PERIOD_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow @7-6EC6DB25
function P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow(& $sender)
{
    $P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD; //Compatibility
//End P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow

//Custom Code @60-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

  // -------------------------
      // Write your own code here.
  	global $FileName;
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Page = $FileName;
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCRemoveParam($P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters, "P_FINANCE_PERIOD_ID");
  	$P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters = CCAddParam($P_FINANCE_PERIOD->P_FINANCE_PERIOD_Insert->Parameters, "TAMBAH", "1");
  // -------------------------


//Close P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow @7-E644EECD
    return $P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow;
}
//End Close P_FINANCE_PERIOD_P_FINANCE_PERIOD_Insert_BeforeShow

//P_FINANCE_PERIOD_BeforeShowRow @2-1C05A5A6
function P_FINANCE_PERIOD_BeforeShowRow(& $sender)
{
    $P_FINANCE_PERIOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_FINANCE_PERIOD; //Compatibility
//End P_FINANCE_PERIOD_BeforeShowRow

//Set Row Style @66-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @67-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

  // -------------------------
      // Write your own code here.
  	$keyId = CCGetFromGet("P_FINANCE_PERIOD_ID", "");
  	$sCode = CCGetFromGet("s_keyword", "");
  	global $id;
  	if (empty($keyId)) {
  		if (empty($id)) {
  			$id = $P_FINANCE_PERIOD->P_FINANCE_PERIOD_ID->GetValue();
  		}
  		global $FileName;
  		global $PathToCurrentPage;
  		$param = CCGetQueryString("QueryString", "");
  		$param = CCAddParam($param, "P_FINANCE_PERIOD_ID", $id);
  		
  		$Redirect = $FileName."?".$param;
  		//die($Redirect);
  		header("Location: ".$Redirect);
  		return;
  	}
  
  	if ($P_FINANCE_PERIOD->P_FINANCE_PERIOD_ID->GetValue() == $keyId) {
  		$P_FINANCE_PERIOD->ADLink->Visible = true;
  		$P_FINANCE_PERIOD->DLink->Visible = false;
  		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
  	} else {
  		$P_FINANCE_PERIOD->ADLink->Visible = false;
  		$P_FINANCE_PERIOD->DLink->Visible = true;
  		$Component->Attributes->SetValue("rowStyle", "class=Row");
  	}
  // -------------------------


//Close P_FINANCE_PERIOD_BeforeShowRow @2-A833E8B6
    return $P_FINANCE_PERIOD_BeforeShowRow;
}
//End Close P_FINANCE_PERIOD_BeforeShowRow

//Page_OnInitializeView @1-7AE32A00
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_finance_period_year; //Compatibility
//End Page_OnInitializeView

//Custom Code @68-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-7A92E742
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_finance_period_year; //Compatibility
//End Page_BeforeShow

//Custom Code @69-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

  // -------------------------
      // Write your own code here.
  	global $P_FINANCE_PERIODSearch;
  	global $P_FINANCE_PERIOD;
  	global $P_FINANCE_PERIOD1;
  	global $id;
  	$tambah = CCGetFromGet("TAMBAH", "");
  
  	if($tambah == "1") {
  		$P_FINANCE_PERIODSearch->Visible = false;
  		$P_FINANCE_PERIOD->Visible = false;
  		$P_FINANCE_PERIOD1->Visible = true;
  		$P_FINANCE_PERIOD1->ds->SQL = "";
  	} else {
  		$P_FINANCE_PERIODSearch->Visible = true;
  		$P_FINANCE_PERIOD->Visible = true;
  		$P_FINANCE_PERIOD1->Visible = true;
  	}
  // -------------------------


//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
