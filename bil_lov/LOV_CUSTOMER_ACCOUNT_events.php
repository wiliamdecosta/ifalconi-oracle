<?php
//BindEvents Method @1-30994BCF
function BindEvents()
{
    global $GRID;
    global $CCSEvents;
    $GRID->CCSEvents["BeforeShowRow"] = "GRID_BeforeShowRow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//GRID_BeforeShowRow @282-819AE556
function GRID_BeforeShowRow(& $sender)
{
    $GRID_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $GRID; //Compatibility
//End GRID_BeforeShowRow

//Custom Code @392-2A29BDB7
// -------------------------
    
  	$nilai=$GRID->CUSTOMER_ACCOUNT_ID->GetValue()."#~#".$GRID->ACCOUNT_NO->GetValue();
  	$GRID->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close GRID_BeforeShowRow @282-9BECCA60
    return $GRID_BeforeShowRow;
}
//End Close GRID_BeforeShowRow

//Page_BeforeShow @1-5D6156DD
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LOV_CUSTOMER_ACCOUNT; //Compatibility
//End Page_BeforeShow

//Custom Code @129-2A29BDB7
// -------------------------
    
  	$nilai=$GRID->INPUT_DATA_CONTROL_ID->GetValue()."#~#".$GRID->BILL_CYCLE_CODE->GetValue()."#~#".$GRID->INVOICE_DATE->GetValue()."#~#".$GRID->FINANCE_PERIOD_CODE->GetValue();
  	$GRID->Label1->SetValue("<input type=button value=PILIH class=Button onclick=clickReturn('".$nilai."')>");
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
