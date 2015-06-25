<?php
//BindEvents Method @1-837F9528
function BindEvents()
{
    global $P_SERVICE_TYPE;
    $P_SERVICE_TYPE->CCSEvents["BeforeShowRow"] = "P_SERVICE_TYPE_BeforeShowRow";
}
//End BindEvents Method

//P_SERVICE_TYPE_BeforeShowRow @2-0502D92C
function P_SERVICE_TYPE_BeforeShowRow(& $sender)
{
    $P_SERVICE_TYPE_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_TYPE; //Compatibility
//End P_SERVICE_TYPE_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SERVICE_TYPE->P_SERVICE_TYPE_ID->GetValue()."#~#".str_replace(" ","",$P_SERVICE_TYPE->CODE->GetValue());
	$P_SERVICE_TYPE->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_SERVICE_TYPE_BeforeShowRow @2-1E26A103
    return $P_SERVICE_TYPE_BeforeShowRow;
}
//End Close P_SERVICE_TYPE_BeforeShowRow


?>
