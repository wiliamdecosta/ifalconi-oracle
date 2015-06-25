<?php
//Include Common Files @1-7FD0B1A7
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "p_user.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_USERGrid { //P_USERGrid class @2-289366EE

//Variables @2-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @2-58BE430B
    function clsGridP_USERGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_USERGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_USERGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_USERGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_user.php";
        $this->EMAIL_ADDRESS = & new clsControl(ccsLabel, "EMAIL_ADDRESS", "EMAIL_ADDRESS", ccsText, "", CCGetRequestParam("EMAIL_ADDRESS", ccsGet, NULL), $this);
        $this->USER_STATUS = & new clsControl(ccsLabel, "USER_STATUS", "USER_STATUS", ccsText, "", CCGetRequestParam("USER_STATUS", ccsGet, NULL), $this);
        $this->P_USER_ID = & new clsControl(ccsHidden, "P_USER_ID", "P_USER_ID", ccsText, "", CCGetRequestParam("P_USER_ID", ccsGet, NULL), $this);
        $this->USER_NAME = & new clsControl(ccsLabel, "USER_NAME", "USER_NAME", ccsText, "", CCGetRequestParam("USER_NAME", ccsGet, NULL), $this);
        $this->FULL_NAME = & new clsControl(ccsLabel, "FULL_NAME", "FULL_NAME", ccsText, "", CCGetRequestParam("FULL_NAME", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_USER_Insert = & new clsControl(ccsLink, "P_USER_Insert", "P_USER_Insert", ccsText, "", CCGetRequestParam("P_USER_Insert", ccsGet, NULL), $this);
        $this->P_USER_Insert->HTML = true;
        $this->P_USER_Insert->Page = "p_user.php";
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-41EBCA7A
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["EMAIL_ADDRESS"] = $this->EMAIL_ADDRESS->Visible;
            $this->ControlsVisible["USER_STATUS"] = $this->USER_STATUS->Visible;
            $this->ControlsVisible["P_USER_ID"] = $this->P_USER_ID->Visible;
            $this->ControlsVisible["USER_NAME"] = $this->USER_NAME->Visible;
            $this->ControlsVisible["FULL_NAME"] = $this->FULL_NAME->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_USER_ID", $this->DataSource->f("P_USER_ID"));
                $this->EMAIL_ADDRESS->SetValue($this->DataSource->EMAIL_ADDRESS->GetValue());
                $this->USER_STATUS->SetValue($this->DataSource->USER_STATUS->GetValue());
                $this->P_USER_ID->SetValue($this->DataSource->P_USER_ID->GetValue());
                $this->USER_NAME->SetValue($this->DataSource->USER_NAME->GetValue());
                $this->FULL_NAME->SetValue($this->DataSource->FULL_NAME->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DLink->Show();
                $this->EMAIL_ADDRESS->Show();
                $this->USER_STATUS->Show();
                $this->P_USER_ID->Show();
                $this->USER_NAME->Show();
                $this->FULL_NAME->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->P_USER_Insert->Parameters = CCGetQueryString("QueryString", array("P_USER_ID", "FLAG", "ccsForm"));
        $this->P_USER_Insert->Parameters = CCAddParam($this->P_USER_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_USER_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-0BFB8497
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EMAIL_ADDRESS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->USER_STATUS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_USER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->USER_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FULL_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_USERGrid Class @2-FCB6E20C

class clsP_USERGridDataSource extends clsDBConn {  //P_USERGridDataSource Class @2-845C9234

//DataSource Variables @2-51691045
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EMAIL_ADDRESS;
    var $USER_STATUS;
    var $P_USER_ID;
    var $USER_NAME;
    var $FULL_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-7E5E922F
    function clsP_USERGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_USERGrid";
        $this->Initialize();
        $this->EMAIL_ADDRESS = new clsField("EMAIL_ADDRESS", ccsText, "");
        
        $this->USER_STATUS = new clsField("USER_STATUS", ccsText, "");
        
        $this->P_USER_ID = new clsField("P_USER_ID", ccsText, "");
        
        $this->USER_NAME = new clsField("USER_NAME", ccsText, "");
        
        $this->FULL_NAME = new clsField("FULL_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-AABF185D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_USER_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-39314EB7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM P_USER\n" .
        "WHERE (UPPER(USER_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(FULL_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))) cnt";
        $this->SQL = "SELECT * \n" .
        "FROM P_USER\n" .
        "WHERE (UPPER(USER_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        "OR UPPER(FULL_NAME) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) {SQL_OrderBy}";
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

//SetValues Method @2-3FEF340F
    function SetValues()
    {
        $this->EMAIL_ADDRESS->SetDBValue($this->f("EMAIL_ADDRESS"));
        $this->USER_STATUS->SetDBValue($this->f("USER_STATUS"));
        $this->P_USER_ID->SetDBValue($this->f("P_USER_ID"));
        $this->USER_NAME->SetDBValue($this->f("USER_NAME"));
        $this->FULL_NAME->SetDBValue($this->f("FULL_NAME"));
    }
//End SetValues Method

} //End P_USERGridDataSource Class @2-FCB6E20C

class clsRecordP_USERSearch { //P_USERSearch Class @3-F8A22280

//Variables @3-D6FF3E86

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

//Class_Initialize Event @3-69118D20
    function clsRecordP_USERSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_USERSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_USERSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
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

//Operation Method @3-DDC28BC1
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "p_user.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_user.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-9830B7FB
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
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->s_keyword->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_USERSearch Class @3-FCB6E20C

class clsRecordP_USERForm { //P_USERForm Class @28-548D1A0F

//Variables @28-D6FF3E86

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

//Class_Initialize Event @28-D2652CC9
    function clsRecordP_USERForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_USERForm/Error";
        $this->DataSource = new clsP_USERFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_USERForm";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->USER_NAME = & new clsControl(ccsTextBox, "USER_NAME", "User", ccsText, "", CCGetRequestParam("USER_NAME", $Method, NULL), $this);
            $this->USER_NAME->Required = true;
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->EMAIL_ADDRESS = & new clsControl(ccsTextBox, "EMAIL_ADDRESS", "Email", ccsText, "", CCGetRequestParam("EMAIL_ADDRESS", $Method, NULL), $this);
            $this->EMAIL_ADDRESS->Required = true;
            $this->P_USER_ID = & new clsControl(ccsHidden, "P_USER_ID", "P_USER_ID", ccsText, "", CCGetRequestParam("P_USER_ID", $Method, NULL), $this);
            $this->USER_STATUS = & new clsControl(ccsListBox, "USER_STATUS", "USER STATUS", ccsFloat, "", CCGetRequestParam("USER_STATUS", $Method, NULL), $this);
            $this->USER_STATUS->DSType = dsListOfValues;
            $this->USER_STATUS->Values = array(array("1", "ACTIVE"), array("0", "NEW USER"), array("2", "INACTIVE"), array("3", "BLOCKED"));
            $this->IS_NEW_USER = & new clsControl(ccsListBox, "IS_NEW_USER", "IS NEW USER", ccsText, "", CCGetRequestParam("IS_NEW_USER", $Method, NULL), $this);
            $this->IS_NEW_USER->DSType = dsListOfValues;
            $this->IS_NEW_USER->Values = array(array("Y", "YA"), array("N", "TIDAK"));
            $this->IS_NEW_USER->Required = true;
            $this->LAST_LOGIN_TIME = & new clsControl(ccsTextBox, "LAST_LOGIN_TIME", "LAST LOGIN TIME", ccsDate, array("dd", "-", "mmm", "-", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("LAST_LOGIN_TIME", $Method, NULL), $this);
            $this->FULL_NAME = & new clsControl(ccsTextBox, "FULL_NAME", "FULL NAME", ccsText, "", CCGetRequestParam("FULL_NAME", $Method, NULL), $this);
            $this->EMPLOYEE_NO = & new clsControl(ccsTextBox, "EMPLOYEE_NO", "EMPLOYEE_NO", ccsText, "", CCGetRequestParam("EMPLOYEE_NO", $Method, NULL), $this);
            $this->IS_EMPLOYEE = & new clsControl(ccsListBox, "IS_EMPLOYEE", "IS EMPLOYEE", ccsText, "", CCGetRequestParam("IS_EMPLOYEE", $Method, NULL), $this);
            $this->IS_EMPLOYEE->DSType = dsListOfValues;
            $this->IS_EMPLOYEE->Values = array(array("N", "EXTERNAL"), array("Y", "INTERNAL"));
            $this->Button_Reset = & new clsButton("Button_Reset", $Method, $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextBox, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->CREATED_BY->Value) && !strlen($this->CREATED_BY->Value) && $this->CREATED_BY->Value !== false)
                    $this->CREATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATED_BY->Value) && !strlen($this->UPDATED_BY->Value) && $this->UPDATED_BY->Value !== false)
                    $this->UPDATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->USER_STATUS->Value) && !strlen($this->USER_STATUS->Value) && $this->USER_STATUS->Value !== false)
                    $this->USER_STATUS->SetText(1);
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetValue(time());
                if(!is_array($this->UPDATED_DATE->Value) && !strlen($this->UPDATED_DATE->Value) && $this->UPDATED_DATE->Value !== false)
                    $this->UPDATED_DATE->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @28-639D859B
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_USER_ID"] = CCGetFromGet("P_USER_ID", NULL);
    }
//End Initialize Method

//Validate Method @28-C514D365
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if(strlen($this->EMAIL_ADDRESS->GetText()) && !preg_match ("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $this->EMAIL_ADDRESS->GetText())) {
            $this->EMAIL_ADDRESS->Errors->addError($CCSLocales->GetText("CCS_MaskValidation", "Email"));
        }
        $Validation = ($this->USER_NAME->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->EMAIL_ADDRESS->Validate() && $Validation);
        $Validation = ($this->P_USER_ID->Validate() && $Validation);
        $Validation = ($this->USER_STATUS->Validate() && $Validation);
        $Validation = ($this->IS_NEW_USER->Validate() && $Validation);
        $Validation = ($this->LAST_LOGIN_TIME->Validate() && $Validation);
        $Validation = ($this->FULL_NAME->Validate() && $Validation);
        $Validation = ($this->EMPLOYEE_NO->Validate() && $Validation);
        $Validation = ($this->IS_EMPLOYEE->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->USER_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EMAIL_ADDRESS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_USER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->USER_STATUS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_NEW_USER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_LOGIN_TIME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FULL_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EMPLOYEE_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_EMPLOYEE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @28-0C703285
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->USER_NAME->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->EMAIL_ADDRESS->Errors->Count());
        $errors = ($errors || $this->P_USER_ID->Errors->Count());
        $errors = ($errors || $this->USER_STATUS->Errors->Count());
        $errors = ($errors || $this->IS_NEW_USER->Errors->Count());
        $errors = ($errors || $this->LAST_LOGIN_TIME->Errors->Count());
        $errors = ($errors || $this->FULL_NAME->Errors->Count());
        $errors = ($errors || $this->EMPLOYEE_NO->Errors->Count());
        $errors = ($errors || $this->IS_EMPLOYEE->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @28-ED598703
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

//Operation Method @28-5971C06C
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

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->Button_Reset->Pressed) {
                $this->PressedButton = "Button_Reset";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG", "P_USER_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Reset") {
            if(!CCGetEvent($this->Button_Reset->CCSEvents, "OnClick", $this->Button_Reset)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @28-0E27AC8E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->USER_NAME->SetValue($this->USER_NAME->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->EMAIL_ADDRESS->SetValue($this->EMAIL_ADDRESS->GetValue(true));
        $this->DataSource->P_USER_ID->SetValue($this->P_USER_ID->GetValue(true));
        $this->DataSource->P_USER_STATUS_ID->SetValue($this->P_USER_STATUS_ID->GetValue(true));
        $this->DataSource->IS_NEW_USER->SetValue($this->IS_NEW_USER->GetValue(true));
        $this->DataSource->LAST_LOGIN_TIME->SetValue($this->LAST_LOGIN_TIME->GetValue(true));
        $this->DataSource->FULL_NAME->SetValue($this->FULL_NAME->GetValue(true));
        $this->DataSource->EMPLOYEE_NO->SetValue($this->EMPLOYEE_NO->GetValue(true));
        $this->DataSource->IS_EMPLOYEE->SetValue($this->IS_EMPLOYEE->GetValue(true));
        $this->DataSource->USER_NAME->SetValue($this->USER_NAME->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @28-B411E4DD
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->USER_NAME->SetValue($this->USER_NAME->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->FULL_NAME->SetValue($this->FULL_NAME->GetValue(true));
        $this->DataSource->IS_NEW_USER->SetValue($this->IS_NEW_USER->GetValue(true));
        $this->DataSource->EMAIL_ADDRESS->SetValue($this->EMAIL_ADDRESS->GetValue(true));
        $this->DataSource->P_USER_ID->SetValue($this->P_USER_ID->GetValue(true));
        $this->DataSource->P_USER_STATUS_ID->SetValue($this->P_USER_STATUS_ID->GetValue(true));
        $this->DataSource->EMPLOYEE_NO->SetValue($this->EMPLOYEE_NO->GetValue(true));
        $this->DataSource->IS_EMPLOYEE->SetValue($this->IS_EMPLOYEE->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @28-9A8F54D4
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_USER_ID->SetValue($this->P_USER_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @28-83A65996
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

        $this->USER_STATUS->Prepare();
        $this->IS_NEW_USER->Prepare();
        $this->IS_EMPLOYEE->Prepare();

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
                    $this->USER_NAME->SetValue($this->DataSource->USER_NAME->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->EMAIL_ADDRESS->SetValue($this->DataSource->EMAIL_ADDRESS->GetValue());
                    $this->P_USER_ID->SetValue($this->DataSource->P_USER_ID->GetValue());
                    $this->USER_STATUS->SetValue($this->DataSource->USER_STATUS->GetValue());
                    $this->IS_NEW_USER->SetValue($this->DataSource->IS_NEW_USER->GetValue());
                    $this->LAST_LOGIN_TIME->SetValue($this->DataSource->LAST_LOGIN_TIME->GetValue());
                    $this->FULL_NAME->SetValue($this->DataSource->FULL_NAME->GetValue());
                    $this->EMPLOYEE_NO->SetValue($this->DataSource->EMPLOYEE_NO->GetValue());
                    $this->IS_EMPLOYEE->SetValue($this->DataSource->IS_EMPLOYEE->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->USER_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EMAIL_ADDRESS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_USER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->USER_STATUS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_NEW_USER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_LOGIN_TIME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FULL_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EMPLOYEE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_EMPLOYEE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
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
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->USER_NAME->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->EMAIL_ADDRESS->Show();
        $this->P_USER_ID->Show();
        $this->USER_STATUS->Show();
        $this->IS_NEW_USER->Show();
        $this->LAST_LOGIN_TIME->Show();
        $this->FULL_NAME->Show();
        $this->EMPLOYEE_NO->Show();
        $this->IS_EMPLOYEE->Show();
        $this->Button_Reset->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->DESCRIPTION->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_USERForm Class @28-FCB6E20C

class clsP_USERFormDataSource extends clsDBConn {  //P_USERFormDataSource Class @28-8EC401F0

//DataSource Variables @28-CE852646
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $USER_NAME;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $EMAIL_ADDRESS;
    var $P_USER_ID;
    var $USER_STATUS;
    var $IS_NEW_USER;
    var $LAST_LOGIN_TIME;
    var $FULL_NAME;
    var $EMPLOYEE_NO;
    var $IS_EMPLOYEE;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $DESCRIPTION;
//End DataSource Variables

//DataSourceClass_Initialize Event @28-337A799C
    function clsP_USERFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_USERForm/Error";
        $this->Initialize();
        $this->USER_NAME = new clsField("USER_NAME", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->EMAIL_ADDRESS = new clsField("EMAIL_ADDRESS", ccsText, "");
        
        $this->P_USER_ID = new clsField("P_USER_ID", ccsText, "");
        
        $this->USER_STATUS = new clsField("USER_STATUS", ccsFloat, "");
        
        $this->IS_NEW_USER = new clsField("IS_NEW_USER", ccsText, "");
        
        $this->LAST_LOGIN_TIME = new clsField("LAST_LOGIN_TIME", ccsDate, $this->DateFormat);
        
        $this->FULL_NAME = new clsField("FULL_NAME", ccsText, "");
        
        $this->EMPLOYEE_NO = new clsField("EMPLOYEE_NO", ccsText, "");
        
        $this->IS_EMPLOYEE = new clsField("IS_EMPLOYEE", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @28-1D8B4528
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

//Open Method @28-48F29A2B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM P_USER {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method


//SetValues Method @28-57CF7E15
    function SetValues()
    {
        $this->USER_NAME->SetDBValue($this->f("USER_NAME"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->EMAIL_ADDRESS->SetDBValue($this->f("EMAIL_ADDRESS"));
        $this->P_USER_ID->SetDBValue($this->f("P_USER_ID"));
        $this->USER_STATUS->SetDBValue(trim($this->f("USER_STATUS")));
        $this->IS_NEW_USER->SetDBValue($this->f("IS_NEW_USER"));
        $this->LAST_LOGIN_TIME->SetDBValue(trim($this->f("LAST_LOGIN_TIME")));
        $this->FULL_NAME->SetDBValue($this->f("FULL_NAME"));
        $this->EMPLOYEE_NO->SetDBValue($this->f("EMPLOYEE_NO"));
        $this->IS_EMPLOYEE->SetDBValue($this->f("IS_EMPLOYEE"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
    }
//End SetValues Method

//Insert Method @28-120A64F6
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["USER_NAME"] = new clsSQLParameter("ctrlUSER_NAME", ccsText, "", "", $this->USER_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EMAIL_ADDRESS"] = new clsSQLParameter("ctrlEMAIL_ADDRESS", ccsText, "", "", $this->EMAIL_ADDRESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_USER_ID"] = new clsSQLParameter("ctrlP_USER_ID", ccsText, "", "", $this->P_USER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_USER_STATUS_ID"] = new clsSQLParameter("ctrlP_USER_STATUS_ID", ccsFloat, "", "", $this->P_USER_STATUS_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_NEW_USER"] = new clsSQLParameter("ctrlIS_NEW_USER", ccsText, "", "", $this->IS_NEW_USER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_LOGIN_TIME"] = new clsSQLParameter("ctrlLAST_LOGIN_TIME", ccsText, "", "", $this->LAST_LOGIN_TIME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FULL_NAME"] = new clsSQLParameter("ctrlFULL_NAME", ccsText, "", "", $this->FULL_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EMPLOYEE_NO"] = new clsSQLParameter("ctrlEMPLOYEE_NO", ccsText, "", "", $this->EMPLOYEE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_EMPLOYEE"] = new clsSQLParameter("ctrlIS_EMPLOYEE", ccsText, "", "", $this->IS_EMPLOYEE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["USER_PWD"] = new clsSQLParameter("ctrlUSER_NAME", ccsText, "", "", $this->USER_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["USER_NAME"]->GetValue()) and !strlen($this->cp["USER_NAME"]->GetText()) and !is_bool($this->cp["USER_NAME"]->GetValue())) 
            $this->cp["USER_NAME"]->SetValue($this->USER_NAME->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["EMAIL_ADDRESS"]->GetValue()) and !strlen($this->cp["EMAIL_ADDRESS"]->GetText()) and !is_bool($this->cp["EMAIL_ADDRESS"]->GetValue())) 
            $this->cp["EMAIL_ADDRESS"]->SetValue($this->EMAIL_ADDRESS->GetValue(true));
        if (!is_null($this->cp["P_USER_ID"]->GetValue()) and !strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue())) 
            $this->cp["P_USER_ID"]->SetValue($this->P_USER_ID->GetValue(true));
        if (!is_null($this->cp["P_USER_STATUS_ID"]->GetValue()) and !strlen($this->cp["P_USER_STATUS_ID"]->GetText()) and !is_bool($this->cp["P_USER_STATUS_ID"]->GetValue())) 
            $this->cp["P_USER_STATUS_ID"]->SetValue($this->P_USER_STATUS_ID->GetValue(true));
        if (!is_null($this->cp["IS_NEW_USER"]->GetValue()) and !strlen($this->cp["IS_NEW_USER"]->GetText()) and !is_bool($this->cp["IS_NEW_USER"]->GetValue())) 
            $this->cp["IS_NEW_USER"]->SetValue($this->IS_NEW_USER->GetValue(true));
        if (!is_null($this->cp["LAST_LOGIN_TIME"]->GetValue()) and !strlen($this->cp["LAST_LOGIN_TIME"]->GetText()) and !is_bool($this->cp["LAST_LOGIN_TIME"]->GetValue())) 
            $this->cp["LAST_LOGIN_TIME"]->SetValue($this->LAST_LOGIN_TIME->GetValue(true));
        if (!is_null($this->cp["FULL_NAME"]->GetValue()) and !strlen($this->cp["FULL_NAME"]->GetText()) and !is_bool($this->cp["FULL_NAME"]->GetValue())) 
            $this->cp["FULL_NAME"]->SetValue($this->FULL_NAME->GetValue(true));
        if (!is_null($this->cp["EMPLOYEE_NO"]->GetValue()) and !strlen($this->cp["EMPLOYEE_NO"]->GetText()) and !is_bool($this->cp["EMPLOYEE_NO"]->GetValue())) 
            $this->cp["EMPLOYEE_NO"]->SetValue($this->EMPLOYEE_NO->GetValue(true));
        if (!is_null($this->cp["IS_EMPLOYEE"]->GetValue()) and !strlen($this->cp["IS_EMPLOYEE"]->GetText()) and !is_bool($this->cp["IS_EMPLOYEE"]->GetValue())) 
            $this->cp["IS_EMPLOYEE"]->SetValue($this->IS_EMPLOYEE->GetValue(true));
        if (!is_null($this->cp["USER_PWD"]->GetValue()) and !strlen($this->cp["USER_PWD"]->GetText()) and !is_bool($this->cp["USER_PWD"]->GetValue())) 
            $this->cp["USER_PWD"]->SetValue($this->USER_NAME->GetValue(true));
        $this->SQL = "INSERT INTO P_USER(P_USER_ID, USER_NAME, USER_PWD, DESCRIPTION, EMAIL_ADDRESS, P_USER_STATUS_ID, IS_NEW_USER, FULL_NAME, EMPLOYEE_NO, IS_EMPLOYEE, CREATION_DATE, CREATED_BY,  UPDATED_DATE, UPDATED_BY ) VALUES( GENERATE_ID('','P_USER','P_USER_ID'), '" . $this->SQLValue($this->cp["USER_NAME"]->GetDBValue(), ccsText) . "', '" . md5($this->SQLValue($this->cp["USER_PWD"]->GetDBValue()), ccsText) . "', '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["EMAIL_ADDRESS"]->GetDBValue(), ccsText) . "', " . $this->SQLValue($this->cp["P_USER_STATUS_ID"]->GetDBValue(), ccsFloat) . ", '" . $this->SQLValue($this->cp["IS_NEW_USER"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["FULL_NAME"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["EMPLOYEE_NO"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["IS_EMPLOYEE"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "', sysdate,'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method


//Update Method @28-2EBB4810
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["USER_NAME"] = new clsSQLParameter("ctrlUSER_NAME", ccsText, "", "", $this->USER_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FULL_NAME"] = new clsSQLParameter("ctrlFULL_NAME", ccsText, "", "", $this->FULL_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_NEW_USER"] = new clsSQLParameter("ctrlIS_NEW_USER", ccsText, "", "", $this->IS_NEW_USER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EMAIL_ADDRESS"] = new clsSQLParameter("ctrlEMAIL_ADDRESS", ccsText, "", "", $this->EMAIL_ADDRESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_USER_ID"] = new clsSQLParameter("ctrlP_USER_ID", ccsFloat, "", "", $this->P_USER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_USER_STATUS_ID"] = new clsSQLParameter("ctrlP_USER_STATUS_ID", ccsFloat, "", "", $this->P_USER_STATUS_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EMPLOYEE_NO"] = new clsSQLParameter("ctrlEMPLOYEE_NO", ccsText, "", "", $this->EMPLOYEE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_EMPLOYEE"] = new clsSQLParameter("ctrlIS_EMPLOYEE", ccsText, "", "", $this->IS_EMPLOYEE->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["USER_NAME"]->GetValue()) and !strlen($this->cp["USER_NAME"]->GetText()) and !is_bool($this->cp["USER_NAME"]->GetValue())) 
            $this->cp["USER_NAME"]->SetValue($this->USER_NAME->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["FULL_NAME"]->GetValue()) and !strlen($this->cp["FULL_NAME"]->GetText()) and !is_bool($this->cp["FULL_NAME"]->GetValue())) 
            $this->cp["FULL_NAME"]->SetValue($this->FULL_NAME->GetValue(true));
        if (!is_null($this->cp["IS_NEW_USER"]->GetValue()) and !strlen($this->cp["IS_NEW_USER"]->GetText()) and !is_bool($this->cp["IS_NEW_USER"]->GetValue())) 
            $this->cp["IS_NEW_USER"]->SetValue($this->IS_NEW_USER->GetValue(true));
        if (!is_null($this->cp["EMAIL_ADDRESS"]->GetValue()) and !strlen($this->cp["EMAIL_ADDRESS"]->GetText()) and !is_bool($this->cp["EMAIL_ADDRESS"]->GetValue())) 
            $this->cp["EMAIL_ADDRESS"]->SetValue($this->EMAIL_ADDRESS->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_USER_ID"]->GetValue()) and !strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue())) 
            $this->cp["P_USER_ID"]->SetValue($this->P_USER_ID->GetValue(true));
        if (!strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue(true))) 
            $this->cp["P_USER_ID"]->SetText(0);
        if (!is_null($this->cp["P_USER_STATUS_ID"]->GetValue()) and !strlen($this->cp["P_USER_STATUS_ID"]->GetText()) and !is_bool($this->cp["P_USER_STATUS_ID"]->GetValue())) 
            $this->cp["P_USER_STATUS_ID"]->SetValue($this->P_USER_STATUS_ID->GetValue(true));
        if (!strlen($this->cp["P_USER_STATUS_ID"]->GetText()) and !is_bool($this->cp["P_USER_STATUS_ID"]->GetValue(true))) 
            $this->cp["P_USER_STATUS_ID"]->SetText(0);
        if (!is_null($this->cp["EMPLOYEE_NO"]->GetValue()) and !strlen($this->cp["EMPLOYEE_NO"]->GetText()) and !is_bool($this->cp["EMPLOYEE_NO"]->GetValue())) 
            $this->cp["EMPLOYEE_NO"]->SetValue($this->EMPLOYEE_NO->GetValue(true));
        if (!is_null($this->cp["IS_EMPLOYEE"]->GetValue()) and !strlen($this->cp["IS_EMPLOYEE"]->GetText()) and !is_bool($this->cp["IS_EMPLOYEE"]->GetValue())) 
            $this->cp["IS_EMPLOYEE"]->SetValue($this->IS_EMPLOYEE->GetValue(true));
        $this->SQL = "UPDATE P_USER SET \n" .
        "DESCRIPTION='" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "FULL_NAME='" . $this->SQLValue($this->cp["FULL_NAME"]->GetDBValue(), ccsText) . "',  \n" .
        "IS_NEW_USER='" . $this->SQLValue($this->cp["IS_NEW_USER"]->GetDBValue(), ccsText) . "', \n" .
        "EMAIL_ADDRESS='" . $this->SQLValue($this->cp["EMAIL_ADDRESS"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATED_DATE=sysdate, \n" .
        "P_USER_STATUS_ID=" . $this->SQLValue($this->cp["P_USER_STATUS_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "EMPLOYEE_NO = '" . $this->SQLValue($this->cp["EMPLOYEE_NO"]->GetDBValue(), ccsText) . "',\n" .
        "IS_EMPLOYEE = '" . $this->SQLValue($this->cp["IS_EMPLOYEE"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE P_USER_ID = " . $this->SQLValue($this->cp["P_USER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @28-8436FDC1
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_USER_ID"] = new clsSQLParameter("ctrlP_USER_ID", ccsFloat, "", "", $this->P_USER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_USER_ID"]->GetValue()) and !strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue())) 
            $this->cp["P_USER_ID"]->SetValue($this->P_USER_ID->GetValue(true));
        if (!strlen($this->cp["P_USER_ID"]->GetText()) and !is_bool($this->cp["P_USER_ID"]->GetValue(true))) 
            $this->cp["P_USER_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_USER WHERE  P_USER_ID = " . $this->SQLValue($this->cp["P_USER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_USERFormDataSource Class @28-FCB6E20C

//Initialize Page @1-856F499F
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
$TemplateFileName = "p_user.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-EFAF1611
include_once("./p_user_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B45B47FC
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_USERGrid = & new clsGridP_USERGrid("", $MainPage);
$P_USERSearch = & new clsRecordP_USERSearch("", $MainPage);
$P_USERForm = & new clsRecordP_USERForm("", $MainPage);
$MainPage->P_USERGrid = & $P_USERGrid;
$MainPage->P_USERSearch = & $P_USERSearch;
$MainPage->P_USERForm = & $P_USERForm;
$P_USERGrid->Initialize();
$P_USERForm->Initialize();

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

//Execute Components @1-8FD1039E
$P_USERSearch->Operation();
$P_USERForm->Operation();
//End Execute Components

//Go to destination page @1-9204DBF9
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_USERGrid);
    unset($P_USERSearch);
    unset($P_USERForm);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-10E3712A
$P_USERGrid->Show();
$P_USERSearch->Show();
$P_USERForm->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-37D6290B
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_USERGrid);
unset($P_USERSearch);
unset($P_USERForm);
unset($Tpl);
//End Unload Page


?>
