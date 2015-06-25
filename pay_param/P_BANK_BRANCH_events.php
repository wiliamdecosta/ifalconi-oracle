<?php
//BindEvents Method @1-CD61D96C
function BindEvents()
{
    global $GRID;
    global $CCSEvents;
    $GRID->GRID_Insert->CCSEvents["BeforeShow"] = "GRID_GRID_Insert_BeforeShow";
    $GRID->CCSEvents["BeforeShowRow"] = "GRID_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//GRID_GRID_Insert_BeforeShow @7-04A2528C
function GRID_GRID_Insert_BeforeShow(& $sender)
{
    $GRID_GRID_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GRID; //Compatibility
//End GRID_GRID_Insert_BeforeShow

//Custom Code @53-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$GRID->GRID_Insert->Page = $FileName;
	$GRID->GRID_Insert->Parameters = CCGetQueryString("QueryString", "");
	$GRID->GRID_Insert->Parameters = CCRemoveParam($GRID->GRID_Insert->Parameters, "p_bank_branch_id");
	$GRID->GRID_Insert->Parameters = CCAddParam($GRID->GRID_Insert->Parameters, "TAMBAH", "1");

// -------------------------
//End Custom Code

//Close GRID_GRID_Insert_BeforeShow @7-91972E52
    return $GRID_GRID_Insert_BeforeShow;
}
//End Close GRID_GRID_Insert_BeforeShow

//GRID_BeforeShowRow @2-819AE556
function GRID_BeforeShowRow(& $sender)
{
    $GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GRID; //Compatibility
//End GRID_BeforeShowRow

//Set Row Style @123-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @124-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("p_bank_branch_id", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $GRID->p_bank_branch_id->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "p_bank_branch_id", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($GRID->p_bank_branch_id->GetValue() == $keyId) {
		$GRID->ADLink->Visible = true;
		$GRID->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$GRID->ADLink->Visible = false;
		$GRID->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close GRID_BeforeShowRow @2-9BECCA60
    return $GRID_BeforeShowRow;
}
//End Close GRID_BeforeShowRow

//Page_OnInitializeView @1-7DFAE8BC
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BANK_BRANCH; //Compatibility
//End Page_OnInitializeView

//Custom Code @125-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-1912E30E
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BANK_BRANCH; //Compatibility
//End Page_BeforeShow

//Custom Code @126-2A29BDB7
// -------------------------
    // Write your own code here.
	global $GRIDSearch;
	global $GRID;
	global $FORM;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$GRIDSearch->Visible = false;
		$GRID->Visible = false;
		$FORM->Visible = true;
		$FORM->ds->SQL = "";
	} else {
		$GRIDSearch->Visible = true;
		$GRID->Visible = true;
		$FORM->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
