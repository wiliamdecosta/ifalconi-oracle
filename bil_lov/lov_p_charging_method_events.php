<?php
//BindEvents Method @1-590B4D5C
function BindEvents()
{
    global $P_CHARGING_METHOD;
    $P_CHARGING_METHOD->CCSEvents["BeforeShowRow"] = "P_CHARGING_METHOD_BeforeShowRow";
}
//End BindEvents Method

//P_CHARGING_METHOD_BeforeShowRow @2-7FCEBB98
function P_CHARGING_METHOD_BeforeShowRow(& $sender)
{
    $P_CHARGING_METHOD_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CHARGING_METHOD; //Compatibility
//End P_CHARGING_METHOD_BeforeShowRow

//Custom Code @23-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_CHARGING_METHOD->P_CHARGING_METHOD_ID->GetValue()."#~#".$P_CHARGING_METHOD->CODE->GetValue();
	$P_CHARGING_METHOD->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");

	//$nilai = $LovGrid->d_supplier_id->GetValue()."#~#".$LovGrid->name->GetValue()
	


	
// -------------------------
//End Custom Code

//Close P_CHARGING_METHOD_BeforeShowRow @2-A5B32AAE
    return $P_CHARGING_METHOD_BeforeShowRow;
}
//End Close P_CHARGING_METHOD_BeforeShowRow
?>
