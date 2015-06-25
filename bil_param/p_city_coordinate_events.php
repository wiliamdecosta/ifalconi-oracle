<?php
//BindEvents Method @1-4362C212
function BindEvents()
{
    global $P_CITY_COORDINATE;
    global $CCSEvents;
    $P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->CCSEvents["BeforeShow"] = "P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow";
    $P_CITY_COORDINATE->CCSEvents["BeforeShowRow"] = "P_CITY_COORDINATE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow @7-79EC2180
function P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow(& $sender)
{
    $P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CITY_COORDINATE; //Compatibility
//End P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow

//Custom Code @90-2A29BDB7
// -------------------------
    // Write your own code here.
	global $FileName;
	$P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->Page = $FileName;
	$P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->Parameters = CCGetQueryString("QueryString", "");
	$P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->Parameters = CCRemoveParam($P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->Parameters, "P_FEATURE_GROUP_ID");
	$P_CITY_COORDINATE->P_CITY_COORDINATE_Insert->Parameters = CCAddParam($P_CITY_COORDINATE->P_FEATURP_CITY_COORDINATE_InsertP_CITY_COORDINATE_InsertE_GROUP_Insert->Parameters, "TAMBAH", "1");
// -------------------------
//End Custom Code

//Close P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow @7-41CF55CF
    return $P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow;
}
//End Close P_CITY_COORDINATE_P_CITY_COORDINATE_Insert_BeforeShow

//P_CITY_COORDINATE_BeforeShowRow @2-73D87664
function P_CITY_COORDINATE_BeforeShowRow(& $sender)
{
    $P_CITY_COORDINATE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CITY_COORDINATE; //Compatibility
//End P_CITY_COORDINATE_BeforeShowRow

//Set Row Style @92-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Custom Code @93-2A29BDB7
// -------------------------
    // Write your own code here.
	$keyId = CCGetFromGet("P_CITY_COORDINATE_ID", "");
	$sCode = CCGetFromGet("s_keyword", "");
	global $id;
	if (empty($keyId)) {
		if (empty($id)) {
			$id = $P_CITY_COORDINATE->P_CITY_COORDINATE_ID->GetValue();
		}
		global $FileName;
		global $PathToCurrentPage;
		$param = CCGetQueryString("QueryString", "");
		$param = CCAddParam($param, "P_CITY_COORDINATE_ID", $id);
		
		$Redirect = $FileName."?".$param;
		//die($Redirect);
		header("Location: ".$Redirect);
		return;
	}

	if ($P_CITY_COORDINATE->P_CITY_COORDINATE_ID->GetValue() == $keyId) {
		$P_CITY_COORDINATE->ADLink->Visible = true;
		$P_CITY_COORDINATE->DLink->Visible = false;
		$Component->Attributes->SetValue("rowStyle", "class=AltRow");
	} else {
		$P_CITY_COORDINATE->ADLink->Visible = false;
		$P_CITY_COORDINATE->DLink->Visible = true;
		$Component->Attributes->SetValue("rowStyle", "class=Row");
	}

// -------------------------
//End Custom Code

//Close P_CITY_COORDINATE_BeforeShowRow @2-B0A492BA
    return $P_CITY_COORDINATE_BeforeShowRow;
}
//End Close P_CITY_COORDINATE_BeforeShowRow

//Page_OnInitializeView @1-3732FEFD
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_city_coordinate; //Compatibility
//End Page_OnInitializeView

//Custom Code @94-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView

//Page_BeforeShow @1-50644BA8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_city_coordinate; //Compatibility
//End Page_BeforeShow

//Custom Code @95-2A29BDB7
// -------------------------
    // Write your own code here.
	global $P_CITY_COORDINATESearch;
	global $P_CITY_COORDINATE;
	global $P_CITY_COORDINATE1;
	global $id;
	$tambah = CCGetFromGet("TAMBAH", "");

	if($tambah == "1") {
		$P_CITY_COORDINATESearch->Visible = false;
		$P_CITY_COORDINATE->Visible = false;
		$P_CITY_COORDINATE1->Visible = true;
		$P_CITY_COORDINATE1->ds->SQL = "";
	} else {
		$P_CITY_COORDINATESearch->Visible = true;
		$P_CITY_COORDINATE->Visible = true;
		$P_CITY_COORDINATE1->Visible = true;
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow
?>
