<?php
//BindEvents Method @1-B37222E7
function BindEvents()
{
    global $P_ONETIME_TARIFF_SCENARIO;
    $P_ONETIME_TARIFF_SCENARIO->CCSEvents["BeforeShowRow"] = "P_ONETIME_TARIFF_SCENARIO_BeforeShowRow";
}
//End BindEvents Method

//P_ONETIME_TARIFF_SCENARIO_BeforeShowRow @2-C886E440
function P_ONETIME_TARIFF_SCENARIO_BeforeShowRow(& $sender)
{
    $P_ONETIME_TARIFF_SCENARIO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_ONETIME_TARIFF_SCENARIO; //Compatibility
//End P_ONETIME_TARIFF_SCENARIO_BeforeShowRow

//Custom Code @13-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_ONETIME_TARIFF_SCENARIO->P_ONETIME_TARIFF_SCENARIO_ID->GetValue()."#~#".str_replace(" ","",$P_ONETIME_TARIFF_SCENARIO->CODE->GetValue());
	$P_ONETIME_TARIFF_SCENARIO->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_ONETIME_TARIFF_SCENARIO_BeforeShowRow @2-1B4576F0
    return $P_ONETIME_TARIFF_SCENARIO_BeforeShowRow;
}
//End Close P_ONETIME_TARIFF_SCENARIO_BeforeShowRow


?>
