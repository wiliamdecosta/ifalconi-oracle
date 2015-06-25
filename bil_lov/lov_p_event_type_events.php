<?php
//BindEvents Method @1-A866A587
function BindEvents()
{
    global $P_EVENT_TYPE;
    $P_EVENT_TYPE->CCSEvents["BeforeShowRow"] = "P_EVENT_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_EVENT_TYPE_BeforeShowRow @2-13CE1FAB
function P_EVENT_TYPE_BeforeShowRow(& $sender)
{
    $P_EVENT_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_EVENT_TYPE; //Compatibility
//End P_EVENT_TYPE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_EVENT_TYPE->P_EVENT_TYPE_ID->GetValue()."#~#".str_replace(" ","",$P_EVENT_TYPE->CODE->GetValue());
	$P_EVENT_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_EVENT_TYPE_BeforeShowRow @2-96EA96DD
    return $P_EVENT_TYPE_BeforeShowRow;
}
//End Close P_EVENT_TYPE_BeforeShowRow
?>
