<?php
//BindEvents Method @1-0DF1F2DD
function BindEvents()
{
    global $P_JOB;
    $P_JOB->CCSEvents["BeforeShowRow"] = "P_JOB_BeforeShowRow";
}
//End BindEvents Method

//P_JOB_BeforeShowRow @2-6CF73C00
function P_JOB_BeforeShowRow(& $sender)
{
    $P_JOB_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_JOB; //Compatibility
//End P_JOB_BeforeShowRow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_JOB->P_JOB_ID->GetValue()."#~#".$P_JOB->CODE->GetValue();
	$P_JOB->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$P_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_JOB_BeforeShowRow @2-BF271120
    return $P_JOB_BeforeShowRow;
}
//End Close P_JOB_BeforeShowRow
?>