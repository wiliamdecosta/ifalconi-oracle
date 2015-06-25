<?php
//BindEvents Method @1-7BB8F5E2
function BindEvents()
{
    global $GRID;
    $GRID->CCSEvents["BeforeShowRow"] = "GRID_BeforeShowRow";
}
//End BindEvents Method

//GRID_BeforeShowRow @2-819AE556
function GRID_BeforeShowRow(& $sender)
{
    $GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GRID; //Compatibility
//End GRID_BeforeShowRow

//Custom Code @20-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$GRID->p_bank_id->GetValue()."#~#".$GRID->code->GetValue();
	$GRID->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$P_CURRENCY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close GRID_BeforeShowRow @2-9BECCA60
    return $GRID_BeforeShowRow;
}
//End Close GRID_BeforeShowRow
?>