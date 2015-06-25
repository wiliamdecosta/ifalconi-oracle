<?php
//BindEvents Method @1-DA609EEB
function BindEvents()
{
    global $P_SERVICE_CATEGORY;
    $P_SERVICE_CATEGORY->CCSEvents["BeforeShowRow"] = "P_SERVICE_CATEGORY_BeforeShowRow";
}
//End BindEvents Method

//P_SERVICE_CATEGORY_BeforeShowRow @2-E9910869
function P_SERVICE_CATEGORY_BeforeShowRow(& $sender)
{
    $P_SERVICE_CATEGORY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_SERVICE_CATEGORY; //Compatibility
//End P_SERVICE_CATEGORY_BeforeShowRow

//Custom Code @16-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_SERVICE_CATEGORY->P_SERVICE_CATEGORY_ID->GetValue()."#~#".str_replace(" ","",$P_SERVICE_CATEGORY->CODE->GetValue());
	$P_SERVICE_CATEGORY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_SERVICE_CATEGORY_BeforeShowRow @2-A13F31E4
    return $P_SERVICE_CATEGORY_BeforeShowRow;
}
//End Close P_SERVICE_CATEGORY_BeforeShowRow


?>
