<?php
//BindEvents Method @1-C22DCB9D
function BindEvents()
{
    global $P_REGION;
    $P_REGION->CCSEvents["BeforeShowRow"] = "P_REGION_BeforeShowRow";
}
//End BindEvents Method

//P_REGION_BeforeShowRow @2-47FE2B67
function P_REGION_BeforeShowRow(& $sender)
{
    $P_REGION_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_REGION; //Compatibility
//End P_REGION_BeforeShowRow

//Custom Code @15-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_REGION->P_REGION_ID->GetValue()."#~#".str_replace(" ","",$P_REGION->REGION_NAME->GetValue());
	$P_REGION->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_REGION_BeforeShowRow @2-671464E1
    return $P_REGION_BeforeShowRow;
}
//End Close P_REGION_BeforeShowRow


?>
