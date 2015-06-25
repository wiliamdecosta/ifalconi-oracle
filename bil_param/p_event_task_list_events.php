<?php
//BindEvents Method @1-BCD4DA47
function BindEvents()
{
    global $P_EVENT_TASK_LIST;
    global $CCSEvents;
    $P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->CCSEvents["BeforeShow"] = "P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow";
    $P_EVENT_TASK_LIST->CCSEvents["BeforeShowRow"] = "P_EVENT_TASK_LIST_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow @7-19CF16F3
function P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow(& $sender)
{
    $P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_TASK_LIST; //Compatibility
//End P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Page = $FileName;
	$P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Parameters = CCRemoveParam($P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Parameters, "P_EVENT_TASK_LIST_ID");
	$P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Parameters = CCAddParam($P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow @7-8DF31AA9
    return $P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow;
}
//End Close P_EVENT_TASK_LIST_P_EVENT_TASK_LIST_Insert_BeforeShow

//P_EVENT_TASK_LIST_BeforeShowRow @2-75707089
function P_EVENT_TASK_LIST_BeforeShowRow(& $sender)
{
    $P_EVENT_TASK_LIST_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_TASK_LIST; //Compatibility
//End P_EVENT_TASK_LIST_BeforeShowRow

//Set Row Style @55-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @56-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_EVENT_TASK_LIST_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_EVENT_TASK_LIST_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_EVENT_TASK_LIST->P_EVENT_TASK_LIST_ID->GetValue() == $keyId) {
		$P_EVENT_TASK_LIST->ADLink->Visible = true;
		$P_EVENT_TASK_LIST->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_EVENT_TASK_LIST->ADLink->Visible = false;
		$P_EVENT_TASK_LIST->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}
// -------------------------
//End Custom Code

//Close P_EVENT_TASK_LIST_BeforeShowRow @2-5E6BBC1F
    return $P_EVENT_TASK_LIST_BeforeShowRow;
}
//End Close P_EVENT_TASK_LIST_BeforeShowRow

//Page_OnInitializeView @1-7D09139B
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_task_list; //Compatibility
//End Page_OnInitializeView

//Custom Code @69-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-1A5FA6CE
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_event_task_list; //Compatibility
//End Page_BeforeShow

//Custom Code @70-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_EVENT_TASK_LISTSearch;
	global $P_EVENT_TASK_LIST;
	global $P_EVENT_TASK_LIST1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_EVENT_TASK_LISTSearch->Visible = false;
		$P_EVENT_TASK_LIST->Visible = false;
		$P_EVENT_TASK_LIST1->Visible = true;
		$P_EVENT_TASK_LIST1->ds->SQL = "";
	} else {
		$P_EVENT_TASK_LISTSearch->Visible = true;
		$P_EVENT_TASK_LIST->Visible = true;
		$P_EVENT_TASK_LIST1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
