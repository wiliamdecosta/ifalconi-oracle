<?php
//BindEvents Method @1-F9893D32
function BindEvents()
{
    global $P_USAGE_TARIFF_SCENARIO;
    $P_USAGE_TARIFF_SCENARIO->CCSEvents["BeforeShowRow"] = "P_USAGE_TARIFF_SCENARIO_BeforeShowRow";
}
//End BindEvents Method

//P_USAGE_TARIFF_SCENARIO_BeforeShowRow @2-CED61F54
function P_USAGE_TARIFF_SCENARIO_BeforeShowRow(& $sender)
{
    $P_USAGE_TARIFF_SCENARIO_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_USAGE_TARIFF_SCENARIO; //Compatibility
//End P_USAGE_TARIFF_SCENARIO_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_USAGE_TARIFF_SCENARIO->P_USAGE_TARIFF_SCENARIO_ID->GetValue()."#~#".str_replace(" ","",$P_USAGE_TARIFF_SCENARIO->CODE->GetValue());
	$P_USAGE_TARIFF_SCENARIO->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_USAGE_TARIFF_SCENARIO_BeforeShowRow @2-D3715561
    return $P_USAGE_TARIFF_SCENARIO_BeforeShowRow;
}
//End Close P_USAGE_TARIFF_SCENARIO_BeforeShowRow


?>
