<?php
//BindEvents Method @1-CA59BF62
function BindEvents()
{
    global $P_TITLE_POSITION;
    $P_TITLE_POSITION->CCSEvents["BeforeShowRow"] = "P_TITLE_POSITION_BeforeShowRow";
}
//End BindEvents Method

//P_TITLE_POSITION_BeforeShowRow @2-7C6F7771
function P_TITLE_POSITION_BeforeShowRow(& $sender)
{
    $P_TITLE_POSITION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_TITLE_POSITION; //Compatibility
//End P_TITLE_POSITION_BeforeShowRow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_TITLE_POSITION->P_TITLE_POSITION_ID->GetValue()."#~#".$P_TITLE_POSITION->CODE->GetValue();
	$P_TITLE_POSITION->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$P_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_TITLE_POSITION_BeforeShowRow @2-7E53A946
    return $P_TITLE_POSITION_BeforeShowRow;
}
//End Close P_TITLE_POSITION_BeforeShowRow




?>