<?php
//BindEvents Method @1-5CE32084
function BindEvents()
{
    global $P_INPUT_FILE_DESC;
    global $CCSEvents;
    $P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->CCSEvents["BeforeShow"] = "P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow";
    $P_INPUT_FILE_DESC->CCSEvents["BeforeShowRow"] = "P_INPUT_FILE_DESC_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow @7-8CB975FD
function P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow(& $sender)
{
    $P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_DESC; //Compatibility
//End P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow

//Custom Code @65-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Page = $FileName;
	$P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Parameters = CCRemoveParam($P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Parameters, "P_INPUT_FILE_DESC_ID");
	$P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Parameters = CCAddParam($P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow @7-F803C568
    return $P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow;
}
//End Close P_INPUT_FILE_DESC_P_INPUT_FILE_DESC_Insert_BeforeShow

//P_INPUT_FILE_DESC_BeforeShowRow @2-BB240697
function P_INPUT_FILE_DESC_BeforeShowRow(& $sender)
{
    $P_INPUT_FILE_DESC_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INPUT_FILE_DESC; //Compatibility
//End P_INPUT_FILE_DESC_BeforeShowRow

//Set Row Style @71-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @72-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_INPUT_FILE_DESC_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_INPUT_FILE_DESC_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_INPUT_FILE_DESC->P_INPUT_FILE_DESC_ID->GetValue() == $keyId) {
		$P_INPUT_FILE_DESC->ADLink->Visible = true;
		$P_INPUT_FILE_DESC->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_INPUT_FILE_DESC->ADLink->Visible = false;
		$P_INPUT_FILE_DESC->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_INPUT_FILE_DESC_BeforeShowRow @2-10B34C15
    return $P_INPUT_FILE_DESC_BeforeShowRow;
}
//End Close P_INPUT_FILE_DESC_BeforeShowRow

//Page_OnInitializeView @1-33D1E391
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_input_file_desc; //Compatibility
//End Page_OnInitializeView

//Custom Code @73-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Custom Code @74-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_INPUT_FILE_DESCSearch;
	global $P_INPUT_FILE_DESC;
	global $P_INPUT_FILE_DESC1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_INPUT_FILE_DESCSearch->Visible = false;
		$P_INPUT_FILE_DESC->Visible = false;
		$P_INPUT_FILE_DESC1->Visible = true;
		$P_INPUT_FILE_DESC1->ds->SQL = "";
	} else {
		$P_INPUT_FILE_DESCSearch->Visible = true;
		$P_INPUT_FILE_DESC->Visible = true;
		$P_INPUT_FILE_DESC1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView
?>
