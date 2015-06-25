<?php
//BindEvents Method @1-51DABBA6
function BindEvents()
{
    global $P_RECURRING_TARIFF_SCENAR1;
    $P_RECURRING_TARIFF_SCENAR1->CCSEvents["BeforeShowRow"] = "P_RECURRING_TARIFF_SCENAR1_BeforeShowRow";
}
//End BindEvents Method

//P_RECURRING_TARIFF_SCENAR1_BeforeShowRow @2-9E041F01
function P_RECURRING_TARIFF_SCENAR1_BeforeShowRow(& $sender)
{
    $P_RECURRING_TARIFF_SCENAR1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_RECURRING_TARIFF_SCENAR1; //Compatibility
//End P_RECURRING_TARIFF_SCENAR1_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_RECURRING_TARIFF_SCENAR1->P_RECURR_TARIFF_SCENARIO_ID->GetValue()."#~#".str_replace(" ","",$P_RECURRING_TARIFF_SCENAR1->CODE->GetValue());
	$P_RECURRING_TARIFF_SCENAR1->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_RECURRING_TARIFF_SCENAR1_BeforeShowRow @2-1323822B
    return $P_RECURRING_TARIFF_SCENAR1_BeforeShowRow;
}
//End Close P_RECURRING_TARIFF_SCENAR1_BeforeShowRow


?>
