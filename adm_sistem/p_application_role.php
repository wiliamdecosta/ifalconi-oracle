<?php
//Include Common Files @1-50076F69
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "p_application_role.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files



class clsRecordP_APPROLEForm { //P_APPROLEForm Class @72-51BCB191

//Variables @72-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @72-39663BDA
    function clsRecordP_APPROLEForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_APPROLEForm/Error";
        $this->DataSource = new clsP_APPROLEFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_APPROLEForm";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->P_APPLICATION_ROLE_ID = & new clsControl(ccsHidden, "P_APPLICATION_ROLE_ID", "P APPLICATION ROLE ID", ccsFloat, "", CCGetRequestParam("P_APPLICATION_ROLE_ID", $Method, NULL), $this);
            $this->P_ROLE_ID = & new clsControl(ccsHidden, "P_ROLE_ID", "P ROLE ID", ccsFloat, "", CCGetRequestParam("P_ROLE_ID", $Method, NULL), $this);
            $this->P_ROLE_ID->Required = true;
            $this->APPLICATION_CODE = & new clsControl(ccsHidden, "APPLICATION_CODE", "APPLICATION CODE", ccsText, "", CCGetRequestParam("APPLICATION_CODE", $Method, NULL), $this);
            $this->P_APPLICATION_ID = & new clsControl(ccsHidden, "P_APPLICATION_ID", "MODUL", ccsFloat, "", CCGetRequestParam("P_APPLICATION_ID", $Method, NULL), $this);
            $this->P_APPLICATION_ID->Required = true;
        }
    }
//End Class_Initialize Event

//Initialize Method @72-AE020841
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_APPLICATION_ROLE_ID"] = CCGetFromGet("P_APPLICATION_ROLE_ID", NULL);
    }
//End Initialize Method

//Validate Method @72-2F7BE850
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_APPLICATION_ROLE_ID->Validate() && $Validation);
        $Validation = ($this->P_ROLE_ID->Validate() && $Validation);
        $Validation = ($this->APPLICATION_CODE->Validate() && $Validation);
        $Validation = ($this->P_APPLICATION_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_APPLICATION_ROLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ROLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->APPLICATION_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_APPLICATION_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @72-BD7416B1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_APPLICATION_ROLE_ID->Errors->Count());
        $errors = ($errors || $this->P_ROLE_ID->Errors->Count());
        $errors = ($errors || $this->APPLICATION_CODE->Errors->Count());
        $errors = ($errors || $this->P_APPLICATION_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @72-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @72-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @72-853A642E
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->P_APPLICATION_ROLE_ID->SetValue($this->DataSource->P_APPLICATION_ROLE_ID->GetValue());
                    $this->P_ROLE_ID->SetValue($this->DataSource->P_ROLE_ID->GetValue());
                    $this->APPLICATION_CODE->SetValue($this->DataSource->APPLICATION_CODE->GetValue());
                    $this->P_APPLICATION_ID->SetValue($this->DataSource->P_APPLICATION_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_APPLICATION_ROLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ROLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->APPLICATION_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_APPLICATION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->P_APPLICATION_ROLE_ID->Show();
        $this->P_ROLE_ID->Show();
        $this->APPLICATION_CODE->Show();
        $this->P_APPLICATION_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_APPROLEForm Class @72-FCB6E20C

class clsP_APPROLEFormDataSource extends clsDBConn {  //P_APPROLEFormDataSource Class @72-792DDC6C

//DataSource Variables @72-8D00E5AD
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $P_APPLICATION_ROLE_ID;
    var $P_ROLE_ID;
    var $APPLICATION_CODE;
    var $P_APPLICATION_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @72-624F1244
    function clsP_APPROLEFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_APPROLEForm/Error";
        $this->Initialize();
        $this->P_APPLICATION_ROLE_ID = new clsField("P_APPLICATION_ROLE_ID", ccsFloat, "");
        
        $this->P_ROLE_ID = new clsField("P_ROLE_ID", ccsFloat, "");
        
        $this->APPLICATION_CODE = new clsField("APPLICATION_CODE", ccsText, "");
        
        $this->P_APPLICATION_ID = new clsField("P_APPLICATION_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @72-0931BD33
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_APPLICATION_ROLE_ID", ccsFloat, "", "", $this->Parameters["urlP_APPLICATION_ROLE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_APPLICATION_ROLE_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @72-9A25D643
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_P_APPLICATION_ROLE {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @72-CF669346
    function SetValues()
    {
        $this->P_APPLICATION_ROLE_ID->SetDBValue(trim($this->f("P_APPLICATION_ROLE_ID")));
        $this->P_ROLE_ID->SetDBValue(trim($this->f("P_ROLE_ID")));
        $this->APPLICATION_CODE->SetDBValue($this->f("APPLICATION_CODE"));
        $this->P_APPLICATION_ID->SetDBValue(trim($this->f("P_APPLICATION_ID")));
    }
//End SetValues Method

} //End P_APPROLEFormDataSource Class @72-FCB6E20C

class clsEditableGridP_APPROLEGrid { //P_APPROLEGrid Class @105-AE374D8D

//Variables @105-F667987F

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

//Class_Initialize Event @105-0A40AABA
    function clsEditableGridP_APPROLEGrid($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid P_APPROLEGrid/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "P_APPROLEGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["P_APPLICATION_ROLE_ID"][0] = "P_APPLICATION_ROLE_ID";
        $this->DataSource = new clsP_APPROLEGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
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

        $this->P_APPLICATION_ID = & new clsControl(ccsListBox, "P_APPLICATION_ID", "P APPLICATION ID", ccsFloat, "", NULL, $this);
        $this->P_APPLICATION_ID->DSType = dsTable;
        $this->P_APPLICATION_ID->DataSource = new clsDBConn();
        $this->P_APPLICATION_ID->ds = & $this->P_APPLICATION_ID->DataSource;
        $this->P_APPLICATION_ID->DataSource->SQL = "SELECT * \n" .
"FROM P_APPLICATION {SQL_Where} {SQL_OrderBy}";
        list($this->P_APPLICATION_ID->BoundColumn, $this->P_APPLICATION_ID->TextColumn, $this->P_APPLICATION_ID->DBFormat) = array("P_APPLICATION_ID", "CODE", "");
        $this->CheckBox_Delete_Panel = & new clsPanel("CheckBox_Delete_Panel", $this);
        $this->CheckBox_Delete = & new clsControl(ccsCheckBox, "CheckBox_Delete", "CheckBox_Delete", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->CheckBox_Delete->CheckedValue = true;
        $this->CheckBox_Delete->UncheckedValue = false;
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = & new clsButton("Button_Submit", $Method, $this);
        $this->Cancel = & new clsButton("Cancel", $Method, $this);
        $this->P_APPLICATION_ROLE_ID = & new clsControl(ccsHidden, "P_APPLICATION_ROLE_ID", "ID", ccsFloat, "", NULL, $this);
        $this->P_ROLE_ID = & new clsControl(ccsHidden, "P_ROLE_ID", "P ROLE ID", ccsFloat, "", NULL, $this);
        $this->P_ROLE_ID->Required = true;
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", NULL, $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_application_role.php";
        $this->rowStyle = & new clsControl(ccsLabel, "rowStyle", "rowStyle", ccsText, "", NULL, $this);
        $this->rowStyle->HTML = true;
        $this->CREATED_BY = & new clsControl(ccsLabel, "CREATED_BY", "CREATED_BY", ccsText, "", NULL, $this);
        $this->CREATION_DATE = & new clsControl(ccsLabel, "CREATION_DATE", "CREATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), NULL, $this);
        $this->CheckBox_Delete_Panel->AddComponent("CheckBox_Delete", $this->CheckBox_Delete);
    }
//End Class_Initialize Event

//Initialize Method @105-B574B2DC
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlP_ROLE_ID"] = CCGetFromGet("P_ROLE_ID", NULL);
    }
//End Initialize Method

//SetPrimaryKeys Method @105-EBC3F86C
    function SetPrimaryKeys($PrimaryKeys) {
        $this->PrimaryKeys = $PrimaryKeys;
        return $this->PrimaryKeys;
    }
//End SetPrimaryKeys Method

//GetPrimaryKeys Method @105-74F9A772
    function GetPrimaryKeys() {
        return $this->PrimaryKeys;
    }
//End GetPrimaryKeys Method

//GetFormParameters Method @105-A1B1B278
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["P_APPLICATION_ID"][$RowNumber] = CCGetFromPost("P_APPLICATION_ID_" . $RowNumber, NULL);
            $this->FormParameters["CheckBox_Delete"][$RowNumber] = CCGetFromPost("CheckBox_Delete_" . $RowNumber, NULL);
            $this->FormParameters["P_APPLICATION_ROLE_ID"][$RowNumber] = CCGetFromPost("P_APPLICATION_ROLE_ID_" . $RowNumber, NULL);
            $this->FormParameters["P_ROLE_ID"][$RowNumber] = CCGetFromPost("P_ROLE_ID_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @105-05DB00FD
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["P_APPLICATION_ROLE_ID"] = $this->CachedColumns["P_APPLICATION_ROLE_ID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->P_APPLICATION_ID->SetText($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->P_APPLICATION_ROLE_ID->SetText($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
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

//ValidateRow Method @105-F573B7C1
    function ValidateRow()
    {
        global $CCSLocales;
        $this->P_APPLICATION_ID->Validate();
        $this->CheckBox_Delete->Validate();
        $this->P_APPLICATION_ROLE_ID->Validate();
        $this->P_ROLE_ID->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->P_APPLICATION_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CheckBox_Delete->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_APPLICATION_ROLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ROLE_ID->Errors->ToString());
        $this->P_APPLICATION_ID->Errors->Clear();
        $this->CheckBox_Delete->Errors->Clear();
        $this->P_APPLICATION_ROLE_ID->Errors->Clear();
        $this->P_ROLE_ID->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @105-83127177
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber]) && count($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber]));
//        $filed = ($filed || (is_array($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber]) && count($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber]));
//        $filed = ($filed || (is_array($this->FormParameters["P_ROLE_ID"][$this->RowNumber]) && count($this->FormParameters["P_ROLE_ID"][$this->RowNumber])) || strlen($this->FormParameters["P_ROLE_ID"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @105-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @105-591E3ED8
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
            } else {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "P_APPLICATION_ROLE_ID"));
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

//UpdateGrid Method @105-5429D4AE
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["P_APPLICATION_ROLE_ID"] = $this->CachedColumns["P_APPLICATION_ROLE_ID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->P_APPLICATION_ID->SetText($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            $this->P_APPLICATION_ROLE_ID->SetText($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber], $this->RowNumber);
            $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
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

//InsertRow Method @105-D895A48D
    function InsertRow()
    {
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_APPLICATION_ID->SetValue($this->P_APPLICATION_ID->GetValue(true));
        $this->DataSource->P_ROLE_ID->SetValue($this->P_ROLE_ID->GetValue(true));
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

//UpdateRow Method @105-E0AA5AD4
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_APPLICATION_ID->SetValue($this->P_APPLICATION_ID->GetValue(true));
        $this->DataSource->P_APPLICATION_ROLE_ID->SetValue($this->P_APPLICATION_ROLE_ID->GetValue(true));
        $this->DataSource->P_APPLICATION_ROLE_ID->SetValue($this->P_APPLICATION_ROLE_ID->GetValue(true));
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

//DeleteRow Method @105-C60F5C0A
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_APPLICATION_ROLE_ID->SetValue($this->P_APPLICATION_ROLE_ID->GetValue());
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

//FormScript Method @105-9D44B4A5
    function FormScript($TotalRows)
    {
        $script = "";
        $script .= "\n<script language=\"JavaScript\" type=\"text/javascript\">\n<!--\n";
        $script .= "var P_APPROLEGridElements;\n";
        $script .= "var P_APPROLEGridEmptyRows = 1;\n";
        $script .= "var " . $this->ComponentName . "P_APPLICATION_IDID = 0;\n";
        $script .= "var " . $this->ComponentName . "DeleteControl = 1;\n";
        $script .= "var " . $this->ComponentName . "P_APPLICATION_ROLE_IDID = 2;\n";
        $script .= "var " . $this->ComponentName . "P_ROLE_IDID = 3;\n";
        $script .= "\nfunction initP_APPROLEGridElements() {\n";
        $script .= "\tvar ED = document.forms[\"P_APPROLEGrid\"];\n";
        $script .= "\tP_APPROLEGridElements = new Array (\n";
        for($i = 1; $i <= $TotalRows; $i++) {
            $script .= "\t\tnew Array(" . "ED.P_APPLICATION_ID_" . $i . ", " . "ED.CheckBox_Delete_" . $i . ", " . "ED.P_APPLICATION_ROLE_ID_" . $i . ", " . "ED.P_ROLE_ID_" . $i . ")";
            if($i != $TotalRows) $script .= ",\n";
        }
        $script .= ");\n";
        $script .= "}\n";
        $script .= "\n//-->\n</script>";
        return $script;
    }
//End FormScript Method

//SetFormState Method @105-60D7A8AE
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
                $this->CachedColumns["P_APPLICATION_ROLE_ID"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["P_APPLICATION_ROLE_ID"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @105-B181717A
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["P_APPLICATION_ROLE_ID"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @105-A4E1A9F8
    function Show()
    {
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->P_APPLICATION_ID->Prepare();

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
        $this->ControlsVisible["P_APPLICATION_ID"] = $this->P_APPLICATION_ID->Visible;
        $this->ControlsVisible["CheckBox_Delete_Panel"] = $this->CheckBox_Delete_Panel->Visible;
        $this->ControlsVisible["CheckBox_Delete"] = $this->CheckBox_Delete->Visible;
        $this->ControlsVisible["P_APPLICATION_ROLE_ID"] = $this->P_APPLICATION_ROLE_ID->Visible;
        $this->ControlsVisible["P_ROLE_ID"] = $this->P_ROLE_ID->Visible;
        $this->ControlsVisible["DLink"] = $this->DLink->Visible;
        $this->ControlsVisible["rowStyle"] = $this->rowStyle->Visible;
        $this->ControlsVisible["CREATED_BY"] = $this->CREATED_BY->Visible;
        $this->ControlsVisible["CREATION_DATE"] = $this->CREATION_DATE->Visible;
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
                    $this->CachedColumns["P_APPLICATION_ROLE_ID"][$this->RowNumber] = $this->DataSource->CachedColumns["P_APPLICATION_ROLE_ID"];
                    $this->CheckBox_Delete->SetValue("");
                    $this->DLink->SetText("");
                    $this->rowStyle->SetText("");
                    $this->P_APPLICATION_ID->SetValue($this->DataSource->P_APPLICATION_ID->GetValue());
                    $this->P_APPLICATION_ROLE_ID->SetValue($this->DataSource->P_APPLICATION_ROLE_ID->GetValue());
                    $this->P_ROLE_ID->SetValue($this->DataSource->P_ROLE_ID->GetValue());
                    $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                    $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_APPLICATION_ROLE_ID", $this->DataSource->f("P_APPLICATION_ROLE_ID"));
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->rowStyle->SetText("");
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                    $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_APPLICATION_ROLE_ID", $this->DataSource->f("P_APPLICATION_ROLE_ID"));
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->P_APPLICATION_ID->SetText($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->P_APPLICATION_ROLE_ID->SetText($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                    $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["P_APPLICATION_ROLE_ID"][$this->RowNumber] = "";
                    $this->P_APPLICATION_ID->SetText("");
                    $this->P_APPLICATION_ROLE_ID->SetText("");
                    $this->P_ROLE_ID->SetText(CCGetFromGet("P_ROLE_ID", NULL));
                    $this->rowStyle->SetText("");
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                    $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_APPLICATION_ROLE_ID", $this->DataSource->f("P_APPLICATION_ROLE_ID"));
                } else {
                    $this->rowStyle->SetText("");
                    $this->CREATED_BY->SetText("");
                    $this->CREATION_DATE->SetText("");
                    $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                    $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_APPLICATION_ROLE_ID", $this->DataSource->f("P_APPLICATION_ROLE_ID"));
                    $this->P_APPLICATION_ID->SetText($this->FormParameters["P_APPLICATION_ID"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                    $this->P_APPLICATION_ROLE_ID->SetText($this->FormParameters["P_APPLICATION_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                    $this->P_ROLE_ID->SetText($this->FormParameters["P_ROLE_ID"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->P_APPLICATION_ID->Show($this->RowNumber);
                $this->CheckBox_Delete_Panel->Show($this->RowNumber);
                $this->P_APPLICATION_ROLE_ID->Show($this->RowNumber);
                $this->P_ROLE_ID->Show($this->RowNumber);
                $this->DLink->Show($this->RowNumber);
                $this->rowStyle->Show($this->RowNumber);
                $this->CREATED_BY->Show($this->RowNumber);
                $this->CREATION_DATE->Show($this->RowNumber);
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
                        if (($this->DataSource->CachedColumns["P_APPLICATION_ROLE_ID"] == $this->CachedColumns["P_APPLICATION_ROLE_ID"][$this->RowNumber])) {
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

} //End P_APPROLEGrid Class @105-FCB6E20C

class clsP_APPROLEGridDataSource extends clsDBConn {  //P_APPROLEGridDataSource Class @105-73B54FA8

//DataSource Variables @105-301C28C1
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
    var $P_APPLICATION_ID;
    var $CheckBox_Delete;
    var $P_APPLICATION_ROLE_ID;
    var $P_ROLE_ID;
    var $DLink;
    var $rowStyle;
    var $CREATED_BY;
    var $CREATION_DATE;
//End DataSource Variables

//DataSourceClass_Initialize Event @105-F04385A1
    function clsP_APPROLEGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid P_APPROLEGrid/Error";
        $this->Initialize();
        $this->P_APPLICATION_ID = new clsField("P_APPLICATION_ID", ccsFloat, "");
        
        $this->CheckBox_Delete = new clsField("CheckBox_Delete", ccsBoolean, $this->BooleanFormat);
        
        $this->P_APPLICATION_ROLE_ID = new clsField("P_APPLICATION_ROLE_ID", ccsFloat, "");
        
        $this->P_ROLE_ID = new clsField("P_ROLE_ID", ccsFloat, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->rowStyle = new clsField("rowStyle", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @105-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @105-48A9CFDF
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_ROLE_ID", ccsFloat, "", "", $this->Parameters["urlP_ROLE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_ROLE_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @105-22E2A392
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM P_APPLICATION_ROLE";
        $this->SQL = "SELECT * \n\n" .
        "FROM P_APPLICATION_ROLE {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @105-4AE565B1
    function SetValues()
    {
        $this->CachedColumns["P_APPLICATION_ROLE_ID"] = $this->f("P_APPLICATION_ROLE_ID");
        $this->P_APPLICATION_ID->SetDBValue(trim($this->f("P_APPLICATION_ID")));
        $this->P_APPLICATION_ROLE_ID->SetDBValue(trim($this->f("P_APPLICATION_ROLE_ID")));
        $this->P_ROLE_ID->SetDBValue(trim($this->f("P_ROLE_ID")));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
    }
//End SetValues Method

//Insert Method @105-24564488
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_APPLICATION_ID"] = new clsSQLParameter("ctrlP_APPLICATION_ID", ccsFloat, "", "", $this->P_APPLICATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_ROLE_ID"] = new clsSQLParameter("ctrlP_ROLE_ID", ccsFloat, "", "", $this->P_ROLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_APPLICATION_ID"]->GetValue()) and !strlen($this->cp["P_APPLICATION_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ID"]->GetValue())) 
            $this->cp["P_APPLICATION_ID"]->SetValue($this->P_APPLICATION_ID->GetValue(true));
        if (!strlen($this->cp["P_APPLICATION_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ID"]->GetValue(true))) 
            $this->cp["P_APPLICATION_ID"]->SetText(0);
        if (!is_null($this->cp["P_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_ROLE_ID"]->GetValue())) 
            $this->cp["P_ROLE_ID"]->SetValue($this->P_ROLE_ID->GetValue(true));
        if (!strlen($this->cp["P_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_ROLE_ID"]->GetValue(true))) 
            $this->cp["P_ROLE_ID"]->SetText(0);
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "INSERT INTO P_APPLICATION_ROLE(P_APPLICATION_ROLE_ID, P_ROLE_ID, P_APPLICATION_ID, CREATION_DATE, CREATED_BY) VALUES(generate_id('','P_APPLICATION_ROLE','P_APPLICATION_ROLE_ID'), " . $this->SQLValue($this->cp["P_ROLE_ID"]->GetDBValue(), ccsFloat) . ", " . $this->SQLValue($this->cp["P_APPLICATION_ID"]->GetDBValue(), ccsFloat) . ", sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @105-4843F1A7
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_APPLICATION_ID"] = new clsSQLParameter("ctrlP_APPLICATION_ID", ccsFloat, "", "", $this->P_APPLICATION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_APPLICATION_ROLE_ID"] = new clsSQLParameter("ctrlP_APPLICATION_ROLE_ID", ccsFloat, "", "", $this->P_APPLICATION_ROLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_APPLICATION_ID"]->GetValue()) and !strlen($this->cp["P_APPLICATION_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ID"]->GetValue())) 
            $this->cp["P_APPLICATION_ID"]->SetValue($this->P_APPLICATION_ID->GetValue(true));
        if (!is_null($this->cp["P_APPLICATION_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_APPLICATION_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ROLE_ID"]->GetValue())) 
            $this->cp["P_APPLICATION_ROLE_ID"]->SetValue($this->P_APPLICATION_ROLE_ID->GetValue(true));
        if (!strlen($this->cp["P_APPLICATION_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ROLE_ID"]->GetValue(true))) 
            $this->cp["P_APPLICATION_ROLE_ID"]->SetText(0);
        $this->SQL = "UPDATE P_APPLICATION_ROLE SET P_APPLICATION_ID=" . $this->SQLValue($this->cp["P_APPLICATION_ID"]->GetDBValue(), ccsFloat) . " WHERE  P_APPLICATION_ROLE_ID = " . $this->SQLValue($this->cp["P_APPLICATION_ROLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @105-20F4492D
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_APPLICATION_ROLE_ID"] = new clsSQLParameter("ctrlP_APPLICATION_ROLE_ID", ccsFloat, "", "", $this->P_APPLICATION_ROLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_APPLICATION_ROLE_ID"]->GetValue()) and !strlen($this->cp["P_APPLICATION_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ROLE_ID"]->GetValue())) 
            $this->cp["P_APPLICATION_ROLE_ID"]->SetValue($this->P_APPLICATION_ROLE_ID->GetValue(true));
        if (!strlen($this->cp["P_APPLICATION_ROLE_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ROLE_ID"]->GetValue(true))) 
            $this->cp["P_APPLICATION_ROLE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_APPLICATION_ROLE WHERE  P_APPLICATION_ROLE_ID = " . $this->SQLValue($this->cp["P_APPLICATION_ROLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_APPROLEGridDataSource Class @105-FCB6E20C

//Initialize Page @1-7184F00B
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
$TemplateFileName = "p_application_role.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C5F354B3
include_once("./p_application_role_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3909FF39
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_APPROLEForm = & new clsRecordP_APPROLEForm("", $MainPage);
$role_code = & new clsControl(ccsLabel, "role_code", "role_code", ccsText, "", CCGetRequestParam("role_code", ccsGet, NULL), $MainPage);
$P_APPROLEGrid = & new clsEditableGridP_APPROLEGrid("", $MainPage);
$MainPage->P_APPROLEForm = & $P_APPROLEForm;
$MainPage->role_code = & $role_code;
$MainPage->P_APPROLEGrid = & $P_APPROLEGrid;
if(!is_array($role_code->Value) && !strlen($role_code->Value) && $role_code->Value !== false)
    $role_code->SetText(CCGetFromGet("ROLE_CODE", NULL));
$P_APPROLEForm->Initialize();
$P_APPROLEGrid->Initialize();

BindEvents();

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

//Execute Components @1-75C86587
$P_APPROLEGrid->Operation();
$P_APPROLEForm->Operation();
//End Execute Components

//Go to destination page @1-6C11B1C0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_APPROLEForm);
    unset($P_APPROLEGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8672BCB7
$P_APPROLEGrid->Show();
$P_APPROLEForm->Show();
$role_code->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3B0516F5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_APPROLEForm);
unset($P_APPROLEGrid);
unset($Tpl);
//End Unload Page


?>
