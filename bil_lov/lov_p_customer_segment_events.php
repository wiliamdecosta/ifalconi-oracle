<?php
//BindEvents Method @1-CF5CE2AC
function BindEvents()
{
    global $P_CUSTOMER_SEGMENT;
    $P_CUSTOMER_SEGMENT->CCSEvents["BeforeShowRow"] = "P_CUSTOMER_SEGMENT_BeforeShowRow";
}
//End BindEvents Method

//P_CUSTOMER_SEGMENT_BeforeShowRow @2-3525449F
function P_CUSTOMER_SEGMENT_BeforeShowRow(& $sender)
{
    $P_CUSTOMER_SEGMENT_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $P_CUSTOMER_SEGMENT; //Compatibility
//End P_CUSTOMER_SEGMENT_BeforeShowRow

//Custom Code @22-2A29BDB7
// -------------------------
    // Write your own code here.
	$nilai=$P_CUSTOMER_SEGMENT->P_CUSTOMER_SEGMENT_ID->GetValue()."#~#".str_replace(" ","",$P_CUSTOMER_SEGMENT->CODE->GetValue() );
	$P_CUSTOMER_SEGMENT->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
	//$nilai=$P_COMPANY->P_COMPANY_ID->GetValue()."#~#".str_replace(" ","",$P_COMPANY->COMPANY_NAME->GetValue());
	//$P_COMPANY->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close P_CUSTOMER_SEGMENT_BeforeShowRow @2-D956D5D3
    return $P_CUSTOMER_SEGMENT_BeforeShowRow;
}
//End Close P_CUSTOMER_SEGMENT_BeforeShowRow




?>