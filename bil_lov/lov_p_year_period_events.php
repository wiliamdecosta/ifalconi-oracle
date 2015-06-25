<?php
//BindEvents Method @1-4D3F0730
function BindEvents()
{
    global $P_YEAR_PERIOD;
    $P_YEAR_PERIOD->CCSEvents["BeforeShowRow"] = "P_YEAR_PERIOD_BeforeShowRow";
}
//End BindEvents Method

//P_YEAR_PERIOD_BeforeShowRow @2-E2414EF7
function P_YEAR_PERIOD_BeforeShowRow(& $sender)
{
    $P_YEAR_PERIOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_YEAR_PERIOD; //Compatibility
//End P_YEAR_PERIOD_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_YEAR_PERIOD->P_YEAR_PERIOD_ID->GetValue()."#~#".str_replace(" ","",$P_YEAR_PERIOD->CODE->GetValue());
	$P_YEAR_PERIOD->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_YEAR_PERIOD_BeforeShowRow @2-6E7C34AF
    return $P_YEAR_PERIOD_BeforeShowRow;
}
//End Close P_YEAR_PERIOD_BeforeShowRow


?>
