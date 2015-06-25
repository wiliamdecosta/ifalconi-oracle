<?php
//BindEvents Method @1-8B38BCD7
function BindEvents()
{
    global $P_DATA_TYPE;
    $P_DATA_TYPE->CCSEvents["BeforeShowRow"] = "P_DATA_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_DATA_TYPE_BeforeShowRow @2-D7D8BDC2
function P_DATA_TYPE_BeforeShowRow(& $sender)
{
    $P_DATA_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_DATA_TYPE; //Compatibility
//End P_DATA_TYPE_BeforeShowRow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_DATA_TYPE->P_REFERENCE_LIST_ID->GetValue()."#~#".$P_DATA_TYPE->CODE->GetValue();
	$P_DATA_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$P_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_DATA_TYPE_BeforeShowRow @2-F6D442CF
    return $P_DATA_TYPE_BeforeShowRow;
}
//End Close P_DATA_TYPE_BeforeShowRow
?>