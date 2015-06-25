<?php
//Include Common Files @1-D6D21002
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_account_rep.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_ACCOUNT_REP { //P_ACCOUNT_REP class @2-1EAAD38D

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

//Class_Initialize Event @2-9817F965
    function clsGridP_ACCOUNT_REP($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_ACCOUNT_REP";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_ACCOUNT_REP";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_ACCOUNT_REPDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->ACCOUNT_NAME = & new clsControl(ccsLabel, "ACCOUNT_NAME", "ACCOUNT_NAME", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", ccsGet, NULL), $this);
        $this->EMPLOYEE_NO = & new clsControl(ccsLabel, "EMPLOYEE_NO", "EMPLOYEE_NO", ccsText, "", CCGetRequestParam("EMPLOYEE_NO", ccsGet, NULL), $this);
        $this->P_JOB_POSITION_NAME = & new clsControl(ccsLabel, "P_JOB_POSITION_NAME", "P_JOB_POSITION_NAME", ccsText, "", CCGetRequestParam("P_JOB_POSITION_NAME", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_account_rep.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_account_rep.php";
        $this->P_ACCOUNT_REP_ID = & new clsControl(ccsHidden, "P_ACCOUNT_REP_ID", "P_ACCOUNT_REP_ID", ccsFloat, "", CCGetRequestParam("P_ACCOUNT_REP_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this, "P_ACCOUNT_REP_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_ACCOUNT_REP_Insert = & new clsControl(ccsLink, "P_ACCOUNT_REP_Insert", "P_ACCOUNT_REP_Insert", ccsText, "", CCGetRequestParam("P_ACCOUNT_REP_Insert", ccsGet, NULL), $this);
        $this->P_ACCOUNT_REP_Insert->Page = "p_account_rep.php";
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

//Show Method @2-137D746A
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
            $this->ControlsVisible["ACCOUNT_NAME"] = $this->ACCOUNT_NAME->Visible;
            $this->ControlsVisible["EMPLOYEE_NO"] = $this->EMPLOYEE_NO->Visible;
            $this->ControlsVisible["P_JOB_POSITION_NAME"] = $this->P_JOB_POSITION_NAME->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_ACCOUNT_REP_ID"] = $this->P_ACCOUNT_REP_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                $this->EMPLOYEE_NO->SetValue($this->DataSource->EMPLOYEE_NO->GetValue());
                $this->P_JOB_POSITION_NAME->SetValue($this->DataSource->P_JOB_POSITION_NAME->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_ACCOUNT_REP_ID", $this->DataSource->f("P_ACCOUNT_REP_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_ACCOUNT_REP_ID", $this->DataSource->f("P_ACCOUNT_REP_ID"));
                $this->P_ACCOUNT_REP_ID->SetValue($this->DataSource->P_ACCOUNT_REP_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ACCOUNT_NAME->Show();
                $this->EMPLOYEE_NO->Show();
                $this->P_JOB_POSITION_NAME->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_ACCOUNT_REP_ID->Show();
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
        $this->P_ACCOUNT_REP_Insert->Parameters = CCGetQueryString("QueryString", array("P_ACCOUNT_REP_ID", "ccsForm"));
        $this->P_ACCOUNT_REP_Insert->Parameters = CCAddParam($this->P_ACCOUNT_REP_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_ACCOUNT_REP_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-A748E8C0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ACCOUNT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EMPLOYEE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_JOB_POSITION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ACCOUNT_REP_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_ACCOUNT_REP Class @2-FCB6E20C

class clsP_ACCOUNT_REPDataSource extends clsDBConn {  //P_ACCOUNT_REPDataSource Class @2-62B964C8

//DataSource Variables @2-CF5C7EAB
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $ACCOUNT_NAME;
    var $EMPLOYEE_NO;
    var $P_JOB_POSITION_NAME;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_ACCOUNT_REP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-D46A4874
    function clsP_ACCOUNT_REPDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_ACCOUNT_REP";
        $this->Initialize();
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->EMPLOYEE_NO = new clsField("EMPLOYEE_NO", ccsText, "");
        
        $this->P_JOB_POSITION_NAME = new clsField("P_JOB_POSITION_NAME", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_ACCOUNT_REP_ID = new clsField("P_ACCOUNT_REP_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
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

//Open Method @2-16E41ACB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as p_job_position_name from p_account_rep a , p_job_position b\n" .
        "where a.p_job_position_id=b.p_job_position_id\n" .
        "and upper(a.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as p_job_position_name from p_account_rep a , p_job_position b\n" .
        "where a.p_job_position_id=b.p_job_position_id\n" .
        "and upper(a.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-EC10970D
    function SetValues()
    {
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->EMPLOYEE_NO->SetDBValue($this->f("EMPLOYEE_NO"));
        $this->P_JOB_POSITION_NAME->SetDBValue($this->f("P_JOB_POSITION_NAME"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_ACCOUNT_REP_ID"));
        $this->ADLink->SetDBValue($this->f("P_ACCOUNT_REP_ID"));
        $this->P_ACCOUNT_REP_ID->SetDBValue(trim($this->f("P_ACCOUNT_REP_ID")));
    }
//End SetValues Method

} //End P_ACCOUNT_REPDataSource Class @2-FCB6E20C

class clsRecordP_ACCOUNT_REPSearch { //P_ACCOUNT_REPSearch Class @3-FDEA5C56

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

//Class_Initialize Event @3-2E7E2AFC
    function clsRecordP_ACCOUNT_REPSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_ACCOUNT_REPSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_ACCOUNT_REPSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
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

//Operation Method @3-F6561277
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
        $Redirect = "p_account_rep.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_account_rep.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-7913FA87
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

        $this->s_keyword->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_ACCOUNT_REPSearch Class @3-FCB6E20C

class clsRecordp_account_rep1 { //p_account_rep1 Class @31-8752943B

//Variables @31-D6FF3E86

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

//Class_Initialize Event @31-500851A6
    function clsRecordp_account_rep1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_account_rep1/Error";
        $this->DataSource = new clsp_account_rep1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_account_rep1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ACCOUNT_NAME = & new clsControl(ccsTextBox, "ACCOUNT_NAME", "ACCOUNT NAME", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", $Method, NULL), $this);
            $this->ACCOUNT_NAME->Required = true;
            $this->EMPLOYEE_NO = & new clsControl(ccsTextBox, "EMPLOYEE_NO", "EMPLOYEE NO", ccsText, "", CCGetRequestParam("EMPLOYEE_NO", $Method, NULL), $this);
            $this->P_JOB_POSITION_ID = & new clsControl(ccsHidden, "P_JOB_POSITION_ID", "P JOB POSITION ID", ccsFloat, "", CCGetRequestParam("P_JOB_POSITION_ID", $Method, NULL), $this);
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "p_account_rep1", "VALID_FROM", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "p_account_rep1", "VALID_TO", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_JOB_POSITION_NAME = & new clsControl(ccsTextBox, "P_JOB_POSITION_NAME", "P JOB POSITION ID", ccsText, "", CCGetRequestParam("P_JOB_POSITION_NAME", $Method, NULL), $this);
            $this->P_ACCOUNT_REP_ID = & new clsControl(ccsHidden, "P_ACCOUNT_REP_ID", "EMPLOYEE NO", ccsFloat, "", CCGetRequestParam("P_ACCOUNT_REP_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-90BF1C41
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_ACCOUNT_REP_ID"] = CCGetFromGet("P_ACCOUNT_REP_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-8E8EA4FA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->ACCOUNT_NAME->Validate() && $Validation);
        $Validation = ($this->EMPLOYEE_NO->Validate() && $Validation);
        $Validation = ($this->P_JOB_POSITION_ID->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_JOB_POSITION_NAME->Validate() && $Validation);
        $Validation = ($this->P_ACCOUNT_REP_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->ACCOUNT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EMPLOYEE_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_POSITION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_POSITION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ACCOUNT_REP_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-CCE5C86E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ACCOUNT_NAME->Errors->Count());
        $errors = ($errors || $this->EMPLOYEE_NO->Errors->Count());
        $errors = ($errors || $this->P_JOB_POSITION_ID->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_JOB_POSITION_NAME->Errors->Count());
        $errors = ($errors || $this->P_ACCOUNT_REP_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @31-ED598703
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

//Operation Method @31-872C026F
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
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

//InsertRow Method @31-B40D6830
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->ACCOUNT_NAME->SetValue($this->ACCOUNT_NAME->GetValue(true));
        $this->DataSource->EMPLOYEE_NO->SetValue($this->EMPLOYEE_NO->GetValue(true));
        $this->DataSource->P_JOB_POSITION_ID->SetValue($this->P_JOB_POSITION_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-01C95545
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->ACCOUNT_NAME->SetValue($this->ACCOUNT_NAME->GetValue(true));
        $this->DataSource->EMPLOYEE_NO->SetValue($this->EMPLOYEE_NO->GetValue(true));
        $this->DataSource->P_JOB_POSITION_ID->SetValue($this->P_JOB_POSITION_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_ACCOUNT_REP_ID->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-E24E21DA
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_ACCOUNT_REP_ID->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-EAD10F54
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
                    $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                    $this->EMPLOYEE_NO->SetValue($this->DataSource->EMPLOYEE_NO->GetValue());
                    $this->P_JOB_POSITION_ID->SetValue($this->DataSource->P_JOB_POSITION_ID->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_JOB_POSITION_NAME->SetValue($this->DataSource->P_JOB_POSITION_NAME->GetValue());
                    $this->P_ACCOUNT_REP_ID->SetValue($this->DataSource->P_ACCOUNT_REP_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ACCOUNT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EMPLOYEE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_POSITION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_POSITION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ACCOUNT_REP_ID->Errors->ToString());
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

        $this->ACCOUNT_NAME->Show();
        $this->EMPLOYEE_NO->Show();
        $this->P_JOB_POSITION_ID->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_JOB_POSITION_NAME->Show();
        $this->P_ACCOUNT_REP_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_account_rep1 Class @31-FCB6E20C

class clsp_account_rep1DataSource extends clsDBConn {  //p_account_rep1DataSource Class @31-E0F1CB4C

//DataSource Variables @31-75BA0BB4
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
    var $ACCOUNT_NAME;
    var $EMPLOYEE_NO;
    var $P_JOB_POSITION_ID;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $P_JOB_POSITION_NAME;
    var $P_ACCOUNT_REP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-7CC43806
    function clsp_account_rep1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_account_rep1/Error";
        $this->Initialize();
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->EMPLOYEE_NO = new clsField("EMPLOYEE_NO", ccsText, "");
        
        $this->P_JOB_POSITION_ID = new clsField("P_JOB_POSITION_ID", ccsFloat, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_JOB_POSITION_NAME = new clsField("P_JOB_POSITION_NAME", ccsText, "");
        
        $this->P_ACCOUNT_REP_ID = new clsField("P_ACCOUNT_REP_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-B778B5B6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_ACCOUNT_REP_ID", ccsFloat, "", "", $this->Parameters["urlP_ACCOUNT_REP_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @31-24DF7960
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_job_position_name from p_account_rep a , p_job_position b\n" .
        "where a.p_job_position_id=b.p_job_position_id\n" .
        "and a.P_ACCOUNT_REP_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-E75AD845
    function SetValues()
    {
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->EMPLOYEE_NO->SetDBValue($this->f("EMPLOYEE_NO"));
        $this->P_JOB_POSITION_ID->SetDBValue(trim($this->f("P_JOB_POSITION_ID")));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_JOB_POSITION_NAME->SetDBValue($this->f("P_JOB_POSITION_NAME"));
        $this->P_ACCOUNT_REP_ID->SetDBValue(trim($this->f("P_ACCOUNT_REP_ID")));
    }
//End SetValues Method

//Insert Method @31-18975AB3
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["ACCOUNT_NAME"] = new clsSQLParameter("ctrlACCOUNT_NAME", ccsText, "", "", $this->ACCOUNT_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EMPLOYEE_NO"] = new clsSQLParameter("ctrlEMPLOYEE_NO", ccsText, "", "", $this->EMPLOYEE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_POSITION_ID"] = new clsSQLParameter("ctrlP_JOB_POSITION_ID", ccsFloat, "", "", $this->P_JOB_POSITION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["ACCOUNT_NAME"]->GetValue()) and !strlen($this->cp["ACCOUNT_NAME"]->GetText()) and !is_bool($this->cp["ACCOUNT_NAME"]->GetValue())) 
            $this->cp["ACCOUNT_NAME"]->SetValue($this->ACCOUNT_NAME->GetValue(true));
        if (!is_null($this->cp["EMPLOYEE_NO"]->GetValue()) and !strlen($this->cp["EMPLOYEE_NO"]->GetText()) and !is_bool($this->cp["EMPLOYEE_NO"]->GetValue())) 
            $this->cp["EMPLOYEE_NO"]->SetValue($this->EMPLOYEE_NO->GetValue(true));
        if (!is_null($this->cp["P_JOB_POSITION_ID"]->GetValue()) and !strlen($this->cp["P_JOB_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_JOB_POSITION_ID"]->GetValue())) 
            $this->cp["P_JOB_POSITION_ID"]->SetValue($this->P_JOB_POSITION_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_JOB_POSITION_ID"]->GetValue(true))) 
            $this->cp["P_JOB_POSITION_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue(true))) 
            $this->cp["VALID_FROM"]->SetText(00-00-0000);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue(true))) 
            $this->cp["VALID_TO"]->SetText(00-00-0000);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_ACCOUNT_REP(P_ACCOUNT_REP_ID, ACCOUNT_NAME, EMPLOYEE_NO, P_JOB_POSITION_ID, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_ACCOUNT_REP','P_ACCOUNT_REP_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["ACCOUNT_NAME"]->GetDBValue(), ccsText) . "')),'" . $this->SQLValue($this->cp["EMPLOYEE_NO"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_JOB_POSITION_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-AEC4DE7E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["ACCOUNT_NAME"] = new clsSQLParameter("ctrlACCOUNT_NAME", ccsText, "", "", $this->ACCOUNT_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["EMPLOYEE_NO"] = new clsSQLParameter("ctrlEMPLOYEE_NO", ccsText, "", "", $this->EMPLOYEE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_POSITION_ID"] = new clsSQLParameter("ctrlP_JOB_POSITION_ID", ccsFloat, "", "", $this->P_JOB_POSITION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_ACCOUNT_REP_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["ACCOUNT_NAME"]->GetValue()) and !strlen($this->cp["ACCOUNT_NAME"]->GetText()) and !is_bool($this->cp["ACCOUNT_NAME"]->GetValue())) 
            $this->cp["ACCOUNT_NAME"]->SetValue($this->ACCOUNT_NAME->GetValue(true));
        if (!is_null($this->cp["EMPLOYEE_NO"]->GetValue()) and !strlen($this->cp["EMPLOYEE_NO"]->GetText()) and !is_bool($this->cp["EMPLOYEE_NO"]->GetValue())) 
            $this->cp["EMPLOYEE_NO"]->SetValue($this->EMPLOYEE_NO->GetValue(true));
        if (!is_null($this->cp["P_JOB_POSITION_ID"]->GetValue()) and !strlen($this->cp["P_JOB_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_JOB_POSITION_ID"]->GetValue())) 
            $this->cp["P_JOB_POSITION_ID"]->SetValue($this->P_JOB_POSITION_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_JOB_POSITION_ID"]->GetValue(true))) 
            $this->cp["P_JOB_POSITION_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue(true))) 
            $this->cp["VALID_FROM"]->SetText(00-00-0000);
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue(true))) 
            $this->cp["VALID_TO"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_ACCOUNT_REP_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetText(0);
        $this->SQL = "UPDATE P_ACCOUNT_REP SET \n" .
        "ACCOUNT_NAME='" . $this->SQLValue($this->cp["ACCOUNT_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "EMPLOYEE_NO='" . $this->SQLValue($this->cp["EMPLOYEE_NO"]->GetDBValue(), ccsText) . "',\n" .
        "P_JOB_POSITION_ID=" . $this->SQLValue($this->cp["P_JOB_POSITION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATE_DATE=sysdate,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_ACCOUNT_REP_ID = " . $this->SQLValue($this->cp["P_ACCOUNT_REP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-49CDEB7C
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ACCOUNT_REP_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_ACCOUNT_REP_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_ACCOUNT_REP WHERE P_ACCOUNT_REP_ID = " . $this->SQLValue($this->cp["P_ACCOUNT_REP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_account_rep1DataSource Class @31-FCB6E20C

//Initialize Page @1-BF41ED85
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
$TemplateFileName = "p_account_rep.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-B44E10C8
include_once("./p_account_rep_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-07A54583
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_ACCOUNT_REP = & new clsGridP_ACCOUNT_REP("", $MainPage);
$P_ACCOUNT_REPSearch = & new clsRecordP_ACCOUNT_REPSearch("", $MainPage);
$p_account_rep1 = & new clsRecordp_account_rep1("", $MainPage);
$MainPage->P_ACCOUNT_REP = & $P_ACCOUNT_REP;
$MainPage->P_ACCOUNT_REPSearch = & $P_ACCOUNT_REPSearch;
$MainPage->p_account_rep1 = & $p_account_rep1;
$P_ACCOUNT_REP->Initialize();
$p_account_rep1->Initialize();

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

//Execute Components @1-95953A86
$P_ACCOUNT_REPSearch->Operation();
$p_account_rep1->Operation();
//End Execute Components

//Go to destination page @1-0730A679
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_ACCOUNT_REP);
    unset($P_ACCOUNT_REPSearch);
    unset($p_account_rep1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-3EAB7F35
$P_ACCOUNT_REP->Show();
$P_ACCOUNT_REPSearch->Show();
$p_account_rep1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-96DC7C54
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_ACCOUNT_REP);
unset($P_ACCOUNT_REPSearch);
unset($p_account_rep1);
unset($Tpl);
//End Unload Page


?>
