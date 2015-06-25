<?php

//include_once("../main/cek_session.php");

//BindEvents Method @1-CC3790C9
function BindEvents()
{
    global $ModulGrid;
    $ModulGrid->CCSEvents["BeforeShowRow"] = "ModulGrid_BeforeShowRow";
}
//End BindEvents Method

//ModulGrid_BeforeShowRow @2-85D5CDB5
function ModulGrid_BeforeShowRow(& $sender)
{
    $ModulGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $ModulGrid; //Compatibility
//End ModulGrid_BeforeShowRow

//Gallery Layout @5-6715D311
    $NumberOfColumns = $Component->Attributes->GetText("numberOfColumns");
    if (isset($Component->RowOpenTag))
        $Component->RowOpenTag->Visible = ($Component->RowNumber % $NumberOfColumns) == 1;
    if (isset($Component->AltRowOpenTag))
        $Component->AltRowOpenTag->Visible = ($Component->RowNumber % $NumberOfColumns) == 1;
    if (isset($Component->RowCloseTag))
        $Component->RowCloseTag->Visible = (($Component->RowNumber % $NumberOfColumns) == 0);
    if (isset($Component->AltRowCloseTag))
        $Component->AltRowCloseTag->Visible = (($Component->RowNumber % $NumberOfColumns) == 0);
    if (isset($Component->RowComponents))
        $Component->RowComponents->Visible = !$Component->ForceIteration;
    if (isset($Component->AltRowComponents))
        $Component->AltRowComponents->Visible = !$Component->ForceIteration;
    $Component->ForceIteration = (($Component->RowNumber >= $Component->PageSize) || !$Component->DataSource->has_next_record()) && ($Component->RowNumber % $NumberOfColumns);
//End Gallery Layout

//Close ModulGrid_BeforeShowRow @2-6CDBFD0C
    return $ModulGrid_BeforeShowRow;
}
//End Close ModulGrid_BeforeShowRow


?>
