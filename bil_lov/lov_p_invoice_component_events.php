<?php
//BindEvents Method @1-36FFF92A
function BindEvents()
{
    global $P_INVOICE_COMPONENT;
    $P_INVOICE_COMPONENT->CCSEvents["BeforeShowRow"] = "P_INVOICE_COMPONENT_BeforeShowRow";
}
//End BindEvents Method

//P_INVOICE_COMPONENT_BeforeShowRow @2-E6BEBB81
function P_INVOICE_COMPONENT_BeforeShowRow(& $sender)
{
    $P_INVOICE_COMPONENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_INVOICE_COMPONENT; //Compatibility
//End P_INVOICE_COMPONENT_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_INVOICE_COMPONENT->P_INVOICE_COMPONENT_ID->GetValue()."#~#".str_replace(" ","",$P_INVOICE_COMPONENT->CODE->GetValue());
	$P_INVOICE_COMPONENT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_INVOICE_COMPONENT_BeforeShowRow @2-5E4919BC
    return $P_INVOICE_COMPONENT_BeforeShowRow;
}
//End Close P_INVOICE_COMPONENT_BeforeShowRow


?>
