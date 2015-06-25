<?php
//BindEvents Method @1-429F5244
function BindEvents()
{
    global $P_STATUS_TYPE;
    global $CCSEvents;
    $P_STATUS_TYPE->Navigator->CCSEvents["BeforeShow"] = "P_STATUS_TYPE_Navigator_BeforeShow";
    $P_STATUS_TYPE->P_STATUS_TYPE_Insert->CCSEvents["BeforeShow"] = "P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow";
    $P_STATUS_TYPE->CCSEvents["BeforeShowRow"] = "P_STATUS_TYPE_BeforeShowRow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//P_STATUS_TYPE_Navigator_BeforeShow @31-6C659FF7
function P_STATUS_TYPE_Navigator_BeforeShow(& $sender)
{
    $P_STATUS_TYPE_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_Navigator_BeforeShow

//Custom Code @89-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_STATUS_TYPE_Navigator_BeforeShow @31-863B73C6
    return $P_STATUS_TYPE_Navigator_BeforeShow;
}
//End Close P_STATUS_TYPE_Navigator_BeforeShow

//P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow @7-7482286E
function P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow(& $sender)
{
    $P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow

//Custom Code @58-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow @7-1B45D2FE
    return $P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow;
}
//End Close P_STATUS_TYPE_P_STATUS_TYPE_Insert_BeforeShow

//P_STATUS_TYPE_BeforeShowRow @2-814BF8AF
function P_STATUS_TYPE_BeforeShowRow(& $sender)
{
    $P_STATUS_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_STATUS_TYPE; //Compatibility
//End P_STATUS_TYPE_BeforeShowRow

//Set Row Style @59-E8A92450
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("", $Style);
    }
//End Set Row Style

//Close P_STATUS_TYPE_BeforeShowRow @2-1A0AC99C
    return $P_STATUS_TYPE_BeforeShowRow;
}
//End Close P_STATUS_TYPE_BeforeShowRow

//Page_OnInitializeView @1-85B58904
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_status_type; //Compatibility
//End Page_OnInitializeView

//Custom Code @61-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
