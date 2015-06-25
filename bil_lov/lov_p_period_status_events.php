<?php
//BindEvents Method @1-DB05CA7C
function BindEvents()
{
    global $P_PERIOD_STATUS;
    $P_PERIOD_STATUS->CCSEvents["BeforeShowRow"] = "P_PERIOD_STATUS_BeforeShowRow";
}
//End BindEvents Method

//P_PERIOD_STATUS_BeforeShowRow @2-31B358A4
function P_PERIOD_STATUS_BeforeShowRow(& $sender)
{
    $P_PERIOD_STATUS_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_PERIOD_STATUS; //Compatibility
//End P_PERIOD_STATUS_BeforeShowRow

//Custom Code @14-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_PERIOD_STATUS->P_PERIOD_STATUS_ID->GetValue()."#~#".str_replace(" ","",$P_PERIOD_STATUS->CODE->GetValue());
	$P_PERIOD_STATUS->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_PERIOD_STATUS_BeforeShowRow @2-5A276CF8
    return $P_PERIOD_STATUS_BeforeShowRow;
}
//End Close P_PERIOD_STATUS_BeforeShowRow


?>
