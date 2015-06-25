<?php
//BindEvents Method @1-A22002DF
function BindEvents()
{
    global $P_PAYMENT_METHOD;
    global $CCSEvents;
    $P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->CCSEvents["BeforeShow"] = "P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow";
    $P_PAYMENT_METHOD->CCSEvents["BeforeShowRow"] = "P_PAYMENT_METHOD_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow @7-510952CA
function P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow(& $sender)
{
    $P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_PAYMENT_METHOD; //Compatibility
//End P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
  	$P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Page = $FileName;
  	$P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Parameters = CCGetQueryString("QueryString", "");
  	$P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Parameters = CCRemoveParam($P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Parameters, "P_PAYMENT_METHOD_ID");
  	$P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Parameters = CCAddParam($P_PAYMENT_METHOD->P_PAYMENT_METHOD_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow @7-06B45D88
    return $P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow;
}
//End Close P_PAYMENT_METHOD_P_PAYMENT_METHOD_Insert_BeforeShow

  // -------------------------
      // Write your own code here.
  	
  // -------------------------

//P_PAYMENT_METHOD_BeforeShowRow @2-D4372890
function P_PAYMENT_METHOD_BeforeShowRow(& $sender)
{
    $P_PAYMENT_METHOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_PAYMENT_METHOD; //Compatibility
//End P_PAYMENT_METHOD_BeforeShowRow

//Set Row Style @41-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @42-2A29BDB7
// -------------------------
    // Write your own code here.
		$keyId = CCGetFromGet("P_PAYMENT_METHOD_ID", "");
		
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_PAYMENT_METHOD->P_PAYMENT_METHOD_ID->GetValue();
			
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_PAYMENT_METHOD_ID", $id);

		
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_PAYMENT_METHOD->P_PAYMENT_METHOD_ID->GetValue() == $keyId) {
		$P_PAYMENT_METHOD->ADLink->Visible = true;
		$P_PAYMENT_METHOD->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_PAYMENT_METHOD->ADLink->Visible = false;
		$P_PAYMENT_METHOD->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_PAYMENT_METHOD_BeforeShowRow @2-6025D17A
    return $P_PAYMENT_METHOD_BeforeShowRow;
}
//End Close P_PAYMENT_METHOD_BeforeShowRow

//Page_BeforeShow @1-0E32B4AE
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_payment_method; //Compatibility
//End Page_BeforeShow

//Custom Code @46-2A29BDB7
// -------------------------
    // Write your own code here.

	global $P_PAYMENT_METHODSearch;
	global $P_PAYMENT_METHOD;
	global $P_PAYMENT_METHOD1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_PAYMENT_METHODSearch->Visible = false;
		$P_PAYMENT_METHOD->Visible = false;
		$P_PAYMENT_METHOD1->Visible = true;
		$P_PAYMENT_METHOD1->ds->SQL = "";
	} else {
		$P_PAYMENT_METHODSearch->Visible = true;
		$P_PAYMENT_METHOD->Visible = true;
		$P_PAYMENT_METHOD1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_OnInitializeView @1-85CD2D35
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_payment_method; //Compatibility
//End Page_OnInitializeView

//Custom Code @49-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
