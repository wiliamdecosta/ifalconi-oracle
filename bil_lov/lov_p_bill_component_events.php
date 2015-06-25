<?php
//BindEvents Method @1-59699436
function BindEvents()
{
    global $P_BILL_COMPONENT;
    $P_BILL_COMPONENT->CCSEvents["BeforeShowRow"] = "P_BILL_COMPONENT_BeforeShowRow";
}
//End BindEvents Method

//P_BILL_COMPONENT_BeforeShowRow @2-F571BC76
function P_BILL_COMPONENT_BeforeShowRow(& $sender)
{
    $P_BILL_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_BILL_COMPONENT; //Compatibility
//End P_BILL_COMPONENT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_BILL_COMPONENT->P_BILL_COMPONENT_ID->GetValue()."#~#".str_replace(" ","",$P_BILL_COMPONENT->CODE->GetValue());
	$P_BILL_COMPONENT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_BILL_COMPONENT_BeforeShowRow @2-D705C1E7
    return $P_BILL_COMPONENT_BeforeShowRow;
}
//End Close P_BILL_COMPONENT_BeforeShowRow


?>
