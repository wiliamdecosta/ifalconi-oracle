<?php
//BindEvents Method @1-582C6070
function BindEvents()
{
    global $P_CPE_LOCATION_TYPE;
    $P_CPE_LOCATION_TYPE->CCSEvents["BeforeShowRow"] = "P_CPE_LOCATION_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_CPE_LOCATION_TYPE_BeforeShowRow @2-F4676C7D
function P_CPE_LOCATION_TYPE_BeforeShowRow(& $sender)
{
    $P_CPE_LOCATION_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CPE_LOCATION_TYPE; //Compatibility
//End P_CPE_LOCATION_TYPE_BeforeShowRow

//Custom Code @17-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_CPE_LOCATION_TYPE->P_CPE_LOCATION_TYPE_ID->GetValue()."#~#".str_replace(" ","",$P_CPE_LOCATION_TYPE->CODE->GetValue());
	$P_CPE_LOCATION_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_CPE_LOCATION_TYPE_BeforeShowRow @2-27706F30
    return $P_CPE_LOCATION_TYPE_BeforeShowRow;
}
//End Close P_CPE_LOCATION_TYPE_BeforeShowRow


?>
