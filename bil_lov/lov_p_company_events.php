<?php
//BindEvents Method @1-562E3FB2
function BindEvents()
{
    global $P_COMPANY;
    $P_COMPANY->CCSEvents["BeforeShowRow"] = "P_COMPANY_BeforeShowRow";
}
//End BindEvents Method

//P_COMPANY_BeforeShowRow @2-9E9F922A
function P_COMPANY_BeforeShowRow(& $sender)
{
    $P_COMPANY_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_COMPANY; //Compatibility
//End P_COMPANY_BeforeShowRow

//Custom Code @15-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->CODE->GetValue());
	$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_COMPANY_BeforeShowRow @2-0D4F6BD5
    return $P_COMPANY_BeforeShowRow;
}
//End Close P_COMPANY_BeforeShowRow


?>
