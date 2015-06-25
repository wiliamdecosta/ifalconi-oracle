<?php
//BindEvents Method @1-DB3A2A10
function BindEvents()
{
    global $P_SERVICE_GROUP;
    $P_SERVICE_GROUP->CCSEvents["BeforeShowRow"] = "P_SERVICE_GROUP_BeforeShowRow";
}
//End BindEvents Method

//P_SERVICE_GROUP_BeforeShowRow @2-CAC77C9D
function P_SERVICE_GROUP_BeforeShowRow(& $sender)
{
    $P_SERVICE_GROUP_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_GROUP; //Compatibility
//End P_SERVICE_GROUP_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SERVICE_GROUP->P_SERVICE_GROUP_ID->GetValue()."#~#".str_replace(" ","",$P_SERVICE_GROUP->CODE->GetValue());
	$P_SERVICE_GROUP->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_SERVICE_GROUP_BeforeShowRow @2-1E517F66
    return $P_SERVICE_GROUP_BeforeShowRow;
}
//End Close P_SERVICE_GROUP_BeforeShowRow
?>
