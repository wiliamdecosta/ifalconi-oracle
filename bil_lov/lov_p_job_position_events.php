<?php
//BindEvents Method @1-4E28E637
function BindEvents()
{
    global $P_JOB_POSITION;
    $P_JOB_POSITION->CCSEvents["BeforeShowRow"] = "P_JOB_POSITION_BeforeShowRow";
}
//End BindEvents Method

//P_JOB_POSITION_BeforeShowRow @2-6E641DEA
function P_JOB_POSITION_BeforeShowRow(& $sender)
{
    $P_JOB_POSITION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB_POSITION; //Compatibility
//End P_JOB_POSITION_BeforeShowRow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_JOB_POSITION->P_JOB_POSITION_ID->GetValue()."#~#".$P_JOB_POSITION->CODE->GetValue();
	$P_JOB_POSITION->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$P_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_JOB_POSITION_BeforeShowRow @2-0146C975
    return $P_JOB_POSITION_BeforeShowRow;
}
//End Close P_JOB_POSITION_BeforeShowRow
?>