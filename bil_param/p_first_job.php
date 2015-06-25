<?php
//Include Common Files @1-6A69FA8A
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_first_job.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_FIRST_JOB { //P_FIRST_JOB class @2-43396549

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

//Class_Initialize Event @2-0E3AEE1E
    function clsGridP_FIRST_JOB($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_FIRST_JOB";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_FIRST_JOB";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_FIRST_JOBDataSource($this);
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

        $this->JOB_CODE = & new clsControl(ccsLabel, "JOB_CODE", "JOB_CODE", ccsText, "", CCGetRequestParam("JOB_CODE", ccsGet, NULL), $this);
        $this->DATA_TYPE_CODE = & new clsControl(ccsLabel, "DATA_TYPE_CODE", "DATA_TYPE_CODE", ccsText, "", CCGetRequestParam("DATA_TYPE_CODE", ccsGet, NULL), $this);
        $this->LISTING_NO = & new clsControl(ccsLabel, "LISTING_NO", "LISTING_NO", ccsText, "", CCGetRequestParam("LISTING_NO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_first_job.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_first_job.php";
        $this->P_FIRST_JOB_ID = & new clsControl(ccsHidden, "P_FIRST_JOB_ID", "P_FIRST_JOB_ID", ccsFloat, "", CCGetRequestParam("P_FIRST_JOB_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this, "P_FIRST_JOB_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_FIRST_JOB_Insert = & new clsControl(ccsLink, "P_FIRST_JOB_Insert", "P_FIRST_JOB_Insert", ccsText, "", CCGetRequestParam("P_FIRST_JOB_Insert", ccsGet, NULL), $this);
        $this->P_FIRST_JOB_Insert->Page = "p_first_job.php";
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

//Show Method @2-BA8B9F2E
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
            $this->ControlsVisible["JOB_CODE"] = $this->JOB_CODE->Visible;
            $this->ControlsVisible["DATA_TYPE_CODE"] = $this->DATA_TYPE_CODE->Visible;
            $this->ControlsVisible["LISTING_NO"] = $this->LISTING_NO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_FIRST_JOB_ID"] = $this->P_FIRST_JOB_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->JOB_CODE->SetValue($this->DataSource->JOB_CODE->GetValue());
                $this->DATA_TYPE_CODE->SetValue($this->DataSource->DATA_TYPE_CODE->GetValue());
                $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_FIRST_JOB_ID", $this->DataSource->f("P_FIRST_JOB_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_FIRST_JOB_ID", $this->DataSource->f("P_FIRST_JOB_ID"));
                $this->P_FIRST_JOB_ID->SetValue($this->DataSource->P_FIRST_JOB_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->JOB_CODE->Show();
                $this->DATA_TYPE_CODE->Show();
                $this->LISTING_NO->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_FIRST_JOB_ID->Show();
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
        $this->P_FIRST_JOB_Insert->Parameters = CCGetQueryString("QueryString", array("P_FIRST_JOB_ID", "ccsForm"));
        $this->P_FIRST_JOB_Insert->Parameters = CCAddParam($this->P_FIRST_JOB_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_FIRST_JOB_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-9F464990
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->JOB_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DATA_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LISTING_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_FIRST_JOB_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_FIRST_JOB Class @2-FCB6E20C

class clsP_FIRST_JOBDataSource extends clsDBConn {  //P_FIRST_JOBDataSource Class @2-64DEA619

//DataSource Variables @2-FB24972F
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $JOB_CODE;
    var $DATA_TYPE_CODE;
    var $LISTING_NO;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_FIRST_JOB_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-46205C0E
    function clsP_FIRST_JOBDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_FIRST_JOB";
        $this->Initialize();
        $this->JOB_CODE = new clsField("JOB_CODE", ccsText, "");
        
        $this->DATA_TYPE_CODE = new clsField("DATA_TYPE_CODE", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_FIRST_JOB_ID = new clsField("P_FIRST_JOB_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9D18E324
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "a.update_date desc";
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

//Open Method @2-366FBCD3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*, b.code as job_code, c.code as data_type_code\n" .
        "from p_first_job a, p_job b, p_reference_list c\n" .
        "where a.p_job_id = b.p_job_id\n" .
        "and a.data_type_id = c.p_reference_list_id\n" .
        "and (upper(b.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(c.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))) cnt";
        $this->SQL = "select a.*, b.code as job_code, c.code as data_type_code\n" .
        "from p_first_job a, p_job b, p_reference_list c\n" .
        "where a.p_job_id = b.p_job_id\n" .
        "and a.data_type_id = c.p_reference_list_id\n" .
        "and (upper(b.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(c.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) {SQL_OrderBy}";
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

//SetValues Method @2-13709A4A
    function SetValues()
    {
        $this->JOB_CODE->SetDBValue($this->f("JOB_CODE"));
        $this->DATA_TYPE_CODE->SetDBValue($this->f("DATA_TYPE_CODE"));
        $this->LISTING_NO->SetDBValue($this->f("LISTING_NO"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_FIRST_JOB_ID"));
        $this->ADLink->SetDBValue($this->f("P_FIRST_JOB_ID"));
        $this->P_FIRST_JOB_ID->SetDBValue(trim($this->f("P_FIRST_JOB_ID")));
    }
//End SetValues Method

} //End P_FIRST_JOBDataSource Class @2-FCB6E20C

class clsRecordP_FIRST_JOBSearch { //P_FIRST_JOBSearch Class @3-7CF13A2B

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

//Class_Initialize Event @3-8914129F
    function clsRecordP_FIRST_JOBSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_FIRST_JOBSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_FIRST_JOBSearch";
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

//Operation Method @3-24D25F8C
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
        $Redirect = "p_first_job.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_first_job.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_FIRST_JOBSearch Class @3-FCB6E20C

class clsRecordP_FIRST_JOB1 { //P_FIRST_JOB1 Class @37-7DD150AB

//Variables @37-D6FF3E86

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

//Class_Initialize Event @37-9B978EEB
    function clsRecordP_FIRST_JOB1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_FIRST_JOB1/Error";
        $this->DataSource = new clsP_FIRST_JOB1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_FIRST_JOB1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->JOB_CODE = & new clsControl(ccsTextBox, "JOB_CODE", "JOB_CODE", ccsText, "", CCGetRequestParam("JOB_CODE", $Method, NULL), $this);
            $this->JOB_CODE->Required = true;
            $this->DATA_TYPE_ID = & new clsControl(ccsHidden, "DATA_TYPE_ID", "DATA_TYPE_ID", ccsFloat, "", CCGetRequestParam("DATA_TYPE_ID", $Method, NULL), $this);
            $this->DATA_TYPE_ID->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->DATA_TYPE_CODE = & new clsControl(ccsTextBox, "DATA_TYPE_CODE", "DATA_TYPE_CODE", ccsText, "", CCGetRequestParam("DATA_TYPE_CODE", $Method, NULL), $this);
            $this->DATA_TYPE_CODE->Required = true;
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "LISTING_NO", ccsText, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->LISTING_NO->Required = true;
            $this->P_FIRST_JOB_ID = & new clsControl(ccsHidden, "P_FIRST_JOB_ID", "P_FIRST_JOB_ID", ccsFloat, "", CCGetRequestParam("P_FIRST_JOB_ID", $Method, NULL), $this);
            $this->P_JOB_ID = & new clsControl(ccsHidden, "P_JOB_ID", "P_JOB_ID", ccsFloat, "", CCGetRequestParam("P_JOB_ID", $Method, NULL), $this);
            $this->P_JOB_ID->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @37-A72FFB46
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_FIRST_JOB_ID"] = CCGetFromGet("P_FIRST_JOB_ID", NULL);
    }
//End Initialize Method

//Validate Method @37-14CFD9E6
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->JOB_CODE->Validate() && $Validation);
        $Validation = ($this->DATA_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->DATA_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->P_FIRST_JOB_ID->Validate() && $Validation);
        $Validation = ($this->P_JOB_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->JOB_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DATA_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DATA_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_FIRST_JOB_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @37-82EBA444
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->JOB_CODE->Errors->Count());
        $errors = ($errors || $this->DATA_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DATA_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->P_FIRST_JOB_ID->Errors->Count());
        $errors = ($errors || $this->P_JOB_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @37-ED598703
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

//Operation Method @37-872C026F
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

//InsertRow Method @37-EECCFAC6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->DATA_TYPE_ID->SetValue($this->DATA_TYPE_ID->GetValue(true));
        $this->DataSource->P_JOB_ID->SetValue($this->P_JOB_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @37-EF42BF3A
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_JOB_ID->SetValue($this->P_JOB_ID->GetValue(true));
        $this->DataSource->DATA_TYPE_ID->SetValue($this->DATA_TYPE_ID->GetValue(true));
        $this->DataSource->P_FIRST_JOB_ID->SetValue($this->P_FIRST_JOB_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @37-2889968D
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_FIRST_JOB_ID->SetValue($this->P_FIRST_JOB_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @37-652FE496
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
                    $this->JOB_CODE->SetValue($this->DataSource->JOB_CODE->GetValue());
                    $this->DATA_TYPE_ID->SetValue($this->DataSource->DATA_TYPE_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->DATA_TYPE_CODE->SetValue($this->DataSource->DATA_TYPE_CODE->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->P_FIRST_JOB_ID->SetValue($this->DataSource->P_FIRST_JOB_ID->GetValue());
                    $this->P_JOB_ID->SetValue($this->DataSource->P_JOB_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->JOB_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DATA_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DATA_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_FIRST_JOB_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_ID->Errors->ToString());
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

        $this->JOB_CODE->Show();
        $this->DATA_TYPE_ID->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->DATA_TYPE_CODE->Show();
        $this->LISTING_NO->Show();
        $this->P_FIRST_JOB_ID->Show();
        $this->P_JOB_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_FIRST_JOB1 Class @37-FCB6E20C

class clsP_FIRST_JOB1DataSource extends clsDBConn {  //P_FIRST_JOB1DataSource Class @37-22F83913

//DataSource Variables @37-1165104B
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
    var $JOB_CODE;
    var $DATA_TYPE_ID;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $DATA_TYPE_CODE;
    var $LISTING_NO;
    var $P_FIRST_JOB_ID;
    var $P_JOB_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @37-2147B270
    function clsP_FIRST_JOB1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_FIRST_JOB1/Error";
        $this->Initialize();
        $this->JOB_CODE = new clsField("JOB_CODE", ccsText, "");
        
        $this->DATA_TYPE_ID = new clsField("DATA_TYPE_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->DATA_TYPE_CODE = new clsField("DATA_TYPE_CODE", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsText, "");
        
        $this->P_FIRST_JOB_ID = new clsField("P_FIRST_JOB_ID", ccsFloat, "");
        
        $this->P_JOB_ID = new clsField("P_JOB_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @37-E7186D51
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_FIRST_JOB_ID", ccsFloat, "", "", $this->Parameters["urlP_FIRST_JOB_ID"], -99, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @37-3FBDF804
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*, b.code as job_code, c.code as data_type_code\n" .
        "from p_first_job a, p_job b, p_reference_list c\n" .
        "where a.p_job_id = b.p_job_id\n" .
        "and a.data_type_id = c.p_reference_list_id\n" .
        "and a.P_FIRST_JOB_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @37-4E52EAE3
    function SetValues()
    {
        $this->JOB_CODE->SetDBValue($this->f("JOB_CODE"));
        $this->DATA_TYPE_ID->SetDBValue(trim($this->f("DATA_TYPE_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->DATA_TYPE_CODE->SetDBValue($this->f("DATA_TYPE_CODE"));
        $this->LISTING_NO->SetDBValue($this->f("LISTING_NO"));
        $this->P_FIRST_JOB_ID->SetDBValue(trim($this->f("P_FIRST_JOB_ID")));
        $this->P_JOB_ID->SetDBValue(trim($this->f("P_JOB_ID")));
    }
//End SetValues Method

//Insert Method @37-04B73D2C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["DATA_TYPE_ID"] = new clsSQLParameter("ctrlDATA_TYPE_ID", ccsFloat, "", "", $this->DATA_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_JOB_ID"] = new clsSQLParameter("ctrlP_JOB_ID", ccsFloat, "", "", $this->P_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["DATA_TYPE_ID"]->GetValue()) and !strlen($this->cp["DATA_TYPE_ID"]->GetText()) and !is_bool($this->cp["DATA_TYPE_ID"]->GetValue())) 
            $this->cp["DATA_TYPE_ID"]->SetValue($this->DATA_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["DATA_TYPE_ID"]->GetText()) and !is_bool($this->cp["DATA_TYPE_ID"]->GetValue(true))) 
            $this->cp["DATA_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_JOB_ID"]->GetValue()) and !strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue())) 
            $this->cp["P_JOB_ID"]->SetValue($this->P_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue(true))) 
            $this->cp["P_JOB_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(0);
        $this->SQL = "INSERT INTO p_first_job(P_FIRST_JOB_ID, DATA_TYPE_ID, P_JOB_ID, LISTING_NO, DESCRIPTION, UPDATE_DATE, UPDATE_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_FIRST_JOB','P_FIRST_JOB_ID')," . $this->SQLValue($this->cp["DATA_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_JOB_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @37-56F2C487
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsText, "", "", $this->LISTING_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_ID"] = new clsSQLParameter("ctrlP_JOB_ID", ccsFloat, "", "", $this->P_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DATA_TYPE_ID"] = new clsSQLParameter("ctrlDATA_TYPE_ID", ccsFloat, "", "", $this->DATA_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_FIRST_JOB_ID"] = new clsSQLParameter("ctrlP_FIRST_JOB_ID", ccsFloat, "", "", $this->P_FIRST_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_JOB_ID"]->GetValue()) and !strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue())) 
            $this->cp["P_JOB_ID"]->SetValue($this->P_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue(true))) 
            $this->cp["P_JOB_ID"]->SetText(0);
        if (!is_null($this->cp["DATA_TYPE_ID"]->GetValue()) and !strlen($this->cp["DATA_TYPE_ID"]->GetText()) and !is_bool($this->cp["DATA_TYPE_ID"]->GetValue())) 
            $this->cp["DATA_TYPE_ID"]->SetValue($this->DATA_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["DATA_TYPE_ID"]->GetText()) and !is_bool($this->cp["DATA_TYPE_ID"]->GetValue(true))) 
            $this->cp["DATA_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_FIRST_JOB_ID"]->GetValue()) and !strlen($this->cp["P_FIRST_JOB_ID"]->GetText()) and !is_bool($this->cp["P_FIRST_JOB_ID"]->GetValue())) 
            $this->cp["P_FIRST_JOB_ID"]->SetValue($this->P_FIRST_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_FIRST_JOB_ID"]->GetText()) and !is_bool($this->cp["P_FIRST_JOB_ID"]->GetValue(true))) 
            $this->cp["P_FIRST_JOB_ID"]->SetText(0);
        $this->SQL = "UPDATE P_FIRST_JOB SET \n" .
        "	P_JOB_ID=" . $this->SQLValue($this->cp["P_JOB_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "	DATA_TYPE_ID=" . $this->SQLValue($this->cp["DATA_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "	LISTING_NO='" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsText) . "',\n" .
        "	DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
        "	UPDATE_DATE=sysdate, \n" .
        "	UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        "	WHERE  P_FIRST_JOB_ID = " . $this->SQLValue($this->cp["P_FIRST_JOB_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @37-9981EBAB
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_FIRST_JOB_ID"] = new clsSQLParameter("ctrlP_FIRST_JOB_ID", ccsFloat, "", "", $this->P_FIRST_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_FIRST_JOB_ID"]->GetValue()) and !strlen($this->cp["P_FIRST_JOB_ID"]->GetText()) and !is_bool($this->cp["P_FIRST_JOB_ID"]->GetValue())) 
            $this->cp["P_FIRST_JOB_ID"]->SetValue($this->P_FIRST_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_FIRST_JOB_ID"]->GetText()) and !is_bool($this->cp["P_FIRST_JOB_ID"]->GetValue(true))) 
            $this->cp["P_FIRST_JOB_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_FIRST_JOB WHERE P_FIRST_JOB = " . $this->SQLValue($this->cp["P_FIRST_JOB_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_FIRST_JOB1DataSource Class @37-FCB6E20C

//Initialize Page @1-07AAF5D0
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
$TemplateFileName = "p_first_job.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-23CE3F01
include_once("./p_first_job_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5E88567A
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_FIRST_JOB = & new clsGridP_FIRST_JOB("", $MainPage);
$P_FIRST_JOBSearch = & new clsRecordP_FIRST_JOBSearch("", $MainPage);
$P_FIRST_JOB1 = & new clsRecordP_FIRST_JOB1("", $MainPage);
$MainPage->P_FIRST_JOB = & $P_FIRST_JOB;
$MainPage->P_FIRST_JOBSearch = & $P_FIRST_JOBSearch;
$MainPage->P_FIRST_JOB1 = & $P_FIRST_JOB1;
$P_FIRST_JOB->Initialize();
$P_FIRST_JOB1->Initialize();

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

//Execute Components @1-53A78D94
$P_FIRST_JOBSearch->Operation();
$P_FIRST_JOB1->Operation();
//End Execute Components

//Go to destination page @1-DC7F7029
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_FIRST_JOB);
    unset($P_FIRST_JOBSearch);
    unset($P_FIRST_JOB1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-60495219
$P_FIRST_JOB->Show();
$P_FIRST_JOBSearch->Show();
$P_FIRST_JOB1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-4CA058C5
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_FIRST_JOB);
unset($P_FIRST_JOBSearch);
unset($P_FIRST_JOB1);
unset($Tpl);
//End Unload Page


?>
