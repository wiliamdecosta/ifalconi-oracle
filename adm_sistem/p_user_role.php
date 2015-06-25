<?php
//Include Common Files @1-04873786
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "p_user_role.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsEditableGridP_UROLEGrid { //P_UROLEGrid Class @110-D5F4405E

//Variables @110-F667987F

    // Public variables
    var $ComponentType = "EditableGrid";
    var $ComponentName;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormParameters;
    var $FormState;
    var $FormEnctype;
    var $CachedColumns;
    var $TotalRows;
    var $UpdatedRows;
    var $EmptyRows;
    var $Visible;
    var $RowsErrors;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode;
    var $ValidatingControls;
    var $Controls;
    var $ControlsErrors;
    var $RowNumber;
    var $Attributes;
    var $PrimaryKeys;

    // Class variables
//End Variables

//Class_Initialize Event @110-580C8525
    function clsEditableGridP_UROLEGrid($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid P_UROLEGrid/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "P_UROLEGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["P_USER_ROLE_ID"][0] = "P_USER_ROLE_ID";
        $this->DataSource = new clsP_UROLEGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 1;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->P_ROLE_ID = & new clsControl(ccsListBox, "P_ROLE_ID", "P ROLE ID", ccsFloat, "", NULL, $this);
        $this->P_ROLE_ID->DSType = dsTable;
        $this->P_ROLE_ID->DataSource = new clsDBConn();
        $this->P_ROLE_ID->ds = & $this->P_ROLE_ID->DataSource;
        $this->P_ROLE_ID->DataSource->SQL = "SELECT * \n" .
"FROM P_ROLE {SQL_Where} {SQL_OrderBy}";
        list($this->P_ROLE_ID->BoundColumn, $this->P_ROLE_ID->TextColumn, $this->P_ROLE_ID->DBFormat) = array("P_ROLE_ID", "CODE", "");
        $this->P_ROLE_ID->Required = true;
        $this->CREATED_BY = & new clsControl(ccsLabel, "CREATED_BY", "CREATED BY", ccsText, "", NULL, $this);
        $this->CREATION_DATE = & new clsControl(ccsLabel, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), NULL, $this);
        $this->CheckBox_Delete_Panel = & new clsPanel("CheckBox_Delete_Panel", $this);
        $this->CheckBox_Delete = & new clsControl(ccsCheckBox, "CheckBox_Delete", "CheckBox_Delete", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->CheckBox_Delete->CheckedValue = true;
        $this->CheckBox_Delete->UncheckedValue = false;
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = & new clsButton("Button_Submit", $Method, $this);
        $this->Cancel = & new clsButton("Cancel", $Method, $this);
        $this->P_USER_ID = & new clsControl(ccsHidden, "P_USER_ID", "P USER ID", ccsFloat, "", NULL, $this);
        $this->P_USER_ID->Required = true;
        $this->P_USER_ROLE_ID = & new clsControl(ccsHidden, "P_USER_ROLE_ID", "ID", ccsFloat, "", NULL, $this);
        $this->CheckBox_Delete_Panel->AddComponent("CheckBox_Delete", $this->CheckBox_Delete);
    }
//End Class_Initialize Event

//Initialize Method @110-4A0CD36A
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlP_USER_ID"] = CCGetFromGet("P_USER_ID", NULL);
    }
//End Initialize Method

//SetPrimaryKeys Method @110-EBC3F86C
    function SetPrimaryKeys($PrimaryKeys) {
        $this->PrimaryKeys = $PrimaryKeys;
        return $this->PrimaryKeys;
    }
//End SetPrimaryKeys Method

//GetPrimaryKeys Method @110-74F9A772
    function GetPrimaryKeys() {
        return $this->PrimaryKeys;
    }
//End GetPrimaryKeys Method

//GetFormParameters Method @110-8D06BC17
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["P_ROLE_ID"][$RowNumber] = CCGetFromPost("P_ROLE_ID_" . $RowNumber, NULL);
            $this->FormParameters["CheckBox_Delete"][$RowNumber] = CCGetFromPost("CheckBox_Delete_" . $RowNumber, NULL);
            $this->FormParameters["P_USER_ID"][$RowNumber] = CCGetFromPost("P_USER_ID_" . $RowNumber, NULL);
            $this->FormParameters["P_USER_ROLE_ID"][$RowNumber] = CCGetFromPost("P_USER_ROLE_ID_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @110-E36868AA
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["P_USER_ROLE_ID"] = $this->CachedColumns["P_USER_ROLE_ID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->P_USER_ID->SetText($this->FormParameters["P_USER_ID"][$this->RowNumber], $this->RowNumber);
            $this->P_USER_ROLE_ID->SetText($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if(!$this->CheckBox_Delete->Value)
                    $Validation = ($this->ValidateRow() && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @110-B5ABACEC
    function ValidateRow()
    {
        global $CCSLocales;
        $this->P_ROLE_ID->Validate();
        $this->CheckBox_Delete->Validate();
        $this->P_USER_ID->Validate();
        $this->P_USER_ROLE_ID->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->P_ROLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CheckBox_Delete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_USER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_USER_ROLE_ID->Errors->ToString());
        $this->P_ROLE_ID->Errors->Clear();
        $this->CheckBox_Delete->Errors->Clear();
        $this->P_USER_ID->Errors->Clear();
        $this->P_USER_ROLE_ID->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @110-8C76CE13
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["P_ROLE_ID"][$this->RowNumber]) && count($this->FormParameters["P_ROLE_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_ROLE_ID"][$this->RowNumber]));
//        $filed = ($filed || (is_array($this->FormParameters["P_USER_ID"][$this->RowNumber]) && count($this->FormParameters["P_USER_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_USER_ID"][$this->RowNumber]));
//        $filed = ($filed || (is_array($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber]) && count($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @110-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @110-6B923CC2
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        } else if($this->Cancel->Pressed) {
            $this->PressedButton = "Cancel";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Cancel") {
            if(!CCGetEvent($this->Cancel->CCSEvents, "OnClick", $this->Cancel)) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @110-274BA1E5
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["P_USER_ROLE_ID"] = $this->CachedColumns["P_USER_ROLE_ID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->P_USER_ID->SetText($this->FormParameters["P_USER_ID"][$this->RowNumber], $this->RowNumber);
            $this->P_USER_ROLE_ID->SetText($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->CheckBox_Delete->Value) {
                    if($this->DeleteAllowed) { $Validation = ($this->DeleteRow() && $Validation); }
                } else if($this->UpdateAllowed) {
                    $Validation = ($this->UpdateRow() && $Validation);
                }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//InsertRow Method @110-645086C5
    function InsertRow()
    {
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_ROLE_ID->SetValue($this->P_ROLE_ID->GetValue(true));
        $this->DataSource->P_USER_ID->SetValue($this->P_USER_ID->GetValue(true));
        $this->DataSource->Insert();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End InsertRow Method

//UpdateRow Method @110-780D5A9D
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_ROLE_ID->SetValue($this->P_ROLE_ID->GetValue(true));
        $this->DataSource->P_USER_ROLE_ID->SetValue($this->P_USER_ROLE_ID->GetValue(true));
        $this->DataSource->P_USER_ROLE_ID->SetValue($this->P_USER_ROLE_ID->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//DeleteRow Method @110-9003E06C
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_USER_ROLE_ID->SetValue($this->P_USER_ROLE_ID->GetValue());
        $this->DataSource->Delete();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End DeleteRow Method

//FormScript Method @110-5A8395CF
    function FormScript($TotalRows)
    {
        $script = "";
        $script .= "\n<script language=\"JavaScript\" type=\"text/javascript\">\n<!--\n";
        $script .= "var P_UROLEGridElements;\n";
        $script .= "var P_UROLEGridEmptyRows = 1;\n";
        $script .= "var " . $this->ComponentName . "P_ROLE_IDID = 0;\n";
        $script .= "var " . $this->ComponentName . "DeleteControl = 1;\n";
        $script .= "var " . $this->ComponentName . "P_USER_IDID = 2;\n";
        $script .= "var " . $this->ComponentName . "P_USER_ROLE_IDID = 3;\n";
        $script .= "\nfunction initP_UROLEGridElements() {\n";
        $script .= "\tvar ED = document.forms[\"P_UROLEGrid\"];\n";
        $script .= "\tP_UROLEGridElements = new Array (\n";
        for($i = 1; $i <= $TotalRows; $i++) {
            $script .= "\t\tnew Array(" . "ED.P_ROLE_ID_" . $i . ", " . "ED.CheckBox_Delete_" . $i . ", " . "ED.P_USER_ID_" . $i . ", " . "ED.P_USER_ROLE_ID_" . $i . ")";
            if($i != $TotalRows) $script .= ",\n";
        }
        $script .= ");\n";
        $script .= "}\n";
        $script .= "\n//-->\n</script>";
        return $script;
    }
//End FormScript Method

//SetFormState Method @110-C33BECBD
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["P_USER_ROLE_ID"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["P_USER_ROLE_ID"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @110-0097B87D
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["P_USER_ROLE_ID"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @110-F6062468
    function Show()
    {
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->P_ROLE_ID->Prepare();

        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["P_ROLE_ID"] = $this->P_ROLE_ID->Visible;
        $this->ControlsVisible["CREATED_BY"] = $this->CREATED_BY->Visible;
        $this->ControlsVisible["CREATION_DATE"] = $this->CREATION_DATE->Visible;
        $this->ControlsVisible["CheckBox_Delete_Panel"] = $this->CheckBox_Delete_Panel->Visible;
        $this->ControlsVisible["CheckBox_Delete"] = $this->CheckBox_Delete->Visible;
        $this->ControlsVisible["P_USER_ID"] = $this->P_USER_ID->Visible;
        $this->ControlsVisible["P_USER_ROLE_ID"] = $this->P_USER_ROLE_ID->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($is_next_record) || !($this->DeleteAllowed)) {
                    $this->CheckBox_Delete->Visible = false;
                    $this->CheckBox_Delete_Panel->Visible = false;
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["P_USER_ROLE_ID"][$this->RowNumber] = $this->DataSource->CachedColumns["P_USER_ROLE_ID"];
                    $this->CheckBox_Delete->SetValue("");
                    $this->P_ROLE_ID->SetValue($this->DataSource->P_ROLE_ID->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->P_USER_ID->SetValue($this->DataSource->P_USER_ID->GetValue());
                    $this->P_USER_ROLE_ID->SetValue($this->DataSource->P_USER_ROLE_ID->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->P_USER_ID->SetText($this->FormParameters["P_USER_ID"][$this->RowNumber], $this->RowNumber);
                    $this->P_USER_ROLE_ID->SetText($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["P_USER_ROLE_ID"][$this->RowNumber] = "";
                    $this->P_ROLE_ID->SetText("");
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->P_USER_ID->SetText(CCGetFromGet("P_USER_ID", NULL));
                    $this->P_USER_ROLE_ID->SetText("");
                } else {
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->P_USER_ID->SetText($this->FormParameters["P_USER_ID"][$this->RowNumber], $this->RowNumber);
                    $this->P_USER_ROLE_ID->SetText($this->FormParameters["P_USER_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->P_ROLE_ID->Show($this->RowNumber);
                $this->CREATED_BY->Show($this->RowNumber);
                $this->CREATION_DATE->Show($this->RowNumber);
                $this->CheckBox_Delete_Panel->Show($this->RowNumber);
                $this->P_USER_ID->Show($this->RowNumber);
                $this->P_USER_ROLE_ID->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["P_USER_ROLE_ID"] == $this->CachedColumns["P_USER_ROLE_ID"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->Cancel->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_UROLEGrid Class @110-FCB6E20C

class clsP_UROLEGridDataSource extends clsDBConn {  //P_UROLEGridDataSource Class @110-1EBC0C02

//DataSource Variables @110-A7B24154
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $CountSQL;
    var $wp;
    var $AllParametersSet;

    var $CachedColumns;
    var $CurrentRow;

    // Datasource fields
    var $P_ROLE_ID;
    var $CREATED_BY;
    var $CREATION_DATE;
    var $CheckBox_Delete;
    var $P_USER_ID;
    var $P_USER_ROLE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @110-3432EFDF
    function clsP_UROLEGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid P_UROLEGrid/Error";
        $this->Initialize();
        $this->P_ROLE_ID = new clsField("P_ROLE_ID", ccsFloat, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->CheckBox_Delete = new clsField("CheckBox_Delete", ccsBoolean, $this->BooleanFormat);
        
        $this->P_USER_ID = new clsField("P_USER_ID", ccsFloat, "");
        
        $this->P_USER_ROLE_ID = new clsField("P_USER_ROLE_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @110-2B2AA3E4
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_USER_ROLE_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @110-1D8B4528
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_USER_ID", ccsFloat, "", "", $this->Parameters["urlP_USER_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_USER_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @110-07EAE524
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM P_USER_ROLE";
        $this->SQL = "SELECT * \n\n" .
        "FROM P_USER_ROLE {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @110-D520E8A6
    function SetValues()
    {
        $this->CachedColumns["P_USER_ROLE_ID"] = $this->f("P_USER_ROLE_ID");
        $this->P_ROLE_ID->SetDBValue(trim($this->f("P_ROLE_ID")));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->P_USER_ID->SetDBValue(trim($this->f("P_USER_ID")));
        $this->P_USER_ROLE_ID->SetDBValue(trim($this->f("P_USER_ROLE_ID")));
    }
//End SetValues Method

//Insert Method @110-13F1C6C4
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ROLE_ID"] = new clsSQLParameter("ctrlP_ROLE_ID", ccsFloat, "", "", $this->P_ROLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_USER_ID"] = new clsSQLParameter("ctrlP_USER_ID", ccsFloat, "", "", $this->P_USER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_ROLE_ID"]->GetValue())) 
            $this->cp["P_ROLE_ID"]->SetValue($this->P_ROLE_ID->GetValue(true));
        if (!is_null($this->cp["P_USER_ID"]->GetValue()) and !strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue())) 
            $this->cp["P_USER_ID"]->SetValue($this->P_USER_ID->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "INSERT INTO P_USER_ROLE(P_USER_ROLE_ID, P_ROLE_ID, P_USER_ID, CREATION_DATE, CREATED_BY ) VALUES(generate_id('','P_USER_ROLE','P_USER_ROLE_ID')," . $this->SQLValue($this->cp["P_ROLE_ID"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["P_USER_ID"]->GetDBValue(), ccsFloat) . ", sysdate,'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @110-DECA7D82
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ROLE_ID"] = new clsSQLParameter("ctrlP_ROLE_ID", ccsFloat, "", "", $this->P_ROLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_USER_ROLE_ID"] = new clsSQLParameter("ctrlP_USER_ROLE_ID", ccsFloat, "", "", $this->P_USER_ROLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_ROLE_ID"]->GetValue())) 
            $this->cp["P_ROLE_ID"]->SetValue($this->P_ROLE_ID->GetValue(true));
        if (!is_null($this->cp["P_USER_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_USER_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_USER_ROLE_ID"]->GetValue())) 
            $this->cp["P_USER_ROLE_ID"]->SetValue($this->P_USER_ROLE_ID->GetValue(true));
        if (!strlen($this->cp["P_USER_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_USER_ROLE_ID"]->GetValue(true))) 
            $this->cp["P_USER_ROLE_ID"]->SetText(0);
        $this->SQL = "UPDATE P_USER_ROLE SET P_ROLE_ID=" . $this->SQLValue($this->cp["P_ROLE_ID"]->GetDBValue(), ccsFloat) . " WHERE  P_USER_ROLE_ID = " . $this->SQLValue($this->cp["P_USER_ROLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @110-8BD5B7AB
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_USER_ROLE_ID"] = new clsSQLParameter("ctrlP_USER_ROLE_ID", ccsFloat, "", "", $this->P_USER_ROLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_USER_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_USER_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_USER_ROLE_ID"]->GetValue())) 
            $this->cp["P_USER_ROLE_ID"]->SetValue($this->P_USER_ROLE_ID->GetValue(true));
        if (!strlen($this->cp["P_USER_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_USER_ROLE_ID"]->GetValue(true))) 
            $this->cp["P_USER_ROLE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_USER_ROLE WHERE  P_USER_ROLE_ID = " . $this->SQLValue($this->cp["P_USER_ROLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_UROLEGridDataSource Class @110-FCB6E20C

//Initialize Page @1-D4EB660A
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "p_user_role.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B039FA38
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$user_name = & new clsControl(ccsLabel, "user_name", "user_name", ccsText, "", CCGetRequestParam("user_name", ccsGet, NULL), $MainPage);
$P_UROLEGrid = & new clsEditableGridP_UROLEGrid("", $MainPage);
$MainPage->user_name = & $user_name;
$MainPage->P_UROLEGrid = & $P_UROLEGrid;
if(!is_array($user_name->Value) && !strlen($user_name->Value) && $user_name->Value !== false)
    $user_name->SetText(CCGetFromGet("USER_NAME", NULL) ." - ".CCGetFromGet("FULL_NAME", NULL));
$P_UROLEGrid->Initialize();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-52F9C312
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-91FADBD2
$P_UROLEGrid->Operation();
//End Execute Components

//Go to destination page @1-789626BE
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_UROLEGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-95864B38
$P_UROLEGrid->Show();
$user_name->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1D7DBACC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_UROLEGrid);
unset($Tpl);
//End Unload Page


?>
