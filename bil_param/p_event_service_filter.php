<?php
//Include Common Files @1-F98142D1
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_event_service_filter.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_EVENT_SERVICE_FILTER { //P_EVENT_SERVICE_FILTER class @2-4A216CEF

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

//Class_Initialize Event @2-B8C22F2E
    function clsGridP_EVENT_SERVICE_FILTER($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_EVENT_SERVICE_FILTER";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_EVENT_SERVICE_FILTER";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_EVENT_SERVICE_FILTERDataSource($this);
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

        $this->P_EVENT_SERVICE_TYPE_ID = & new clsControl(ccsLabel, "P_EVENT_SERVICE_TYPE_ID", "P_EVENT_SERVICE_TYPE_ID", ccsFloat, "", CCGetRequestParam("P_EVENT_SERVICE_TYPE_ID", ccsGet, NULL), $this);
        $this->FILTER_COLUMN_NAME = & new clsControl(ccsLabel, "FILTER_COLUMN_NAME", "FILTER_COLUMN_NAME", ccsText, "", CCGetRequestParam("FILTER_COLUMN_NAME", ccsGet, NULL), $this);
        $this->FILTER_COLUMN_VALUE = & new clsControl(ccsLabel, "FILTER_COLUMN_VALUE", "FILTER_COLUMN_VALUE", ccsText, "", CCGetRequestParam("FILTER_COLUMN_VALUE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_event_service_filter.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_event_service_filter.php";
        $this->P_EVENT_SERVICE_FILTER_ID = & new clsControl(ccsHidden, "P_EVENT_SERVICE_FILTER_ID", "P_EVENT_SERVICE_FILTER_ID", ccsFloat, "", CCGetRequestParam("P_EVENT_SERVICE_FILTER_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_EVENT_SERVICE_FILTER_Insert = & new clsControl(ccsLink, "P_EVENT_SERVICE_FILTER_Insert", "P_EVENT_SERVICE_FILTER_Insert", ccsText, "", CCGetRequestParam("P_EVENT_SERVICE_FILTER_Insert", ccsGet, NULL), $this);
        $this->P_EVENT_SERVICE_FILTER_Insert->HTML = true;
        $this->P_EVENT_SERVICE_FILTER_Insert->Parameters = CCGetQueryString("QueryString", array("P_EVENT_SERVICE_FILTER_ID", "ccsForm"));
        $this->P_EVENT_SERVICE_FILTER_Insert->Page = "p_event_service_filter.php";
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

//Show Method @2-7F0CF73D
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
            $this->ControlsVisible["P_EVENT_SERVICE_TYPE_ID"] = $this->P_EVENT_SERVICE_TYPE_ID->Visible;
            $this->ControlsVisible["FILTER_COLUMN_NAME"] = $this->FILTER_COLUMN_NAME->Visible;
            $this->ControlsVisible["FILTER_COLUMN_VALUE"] = $this->FILTER_COLUMN_VALUE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_EVENT_SERVICE_FILTER_ID"] = $this->P_EVENT_SERVICE_FILTER_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->P_EVENT_SERVICE_TYPE_ID->SetValue($this->DataSource->P_EVENT_SERVICE_TYPE_ID->GetValue());
                $this->FILTER_COLUMN_NAME->SetValue($this->DataSource->FILTER_COLUMN_NAME->GetValue());
                $this->FILTER_COLUMN_VALUE->SetValue($this->DataSource->FILTER_COLUMN_VALUE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_EVENT_SERVICE_FILTER_ID", $this->DataSource->f("P_EVENT_SERVICE_FILTER_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_EVENT_SERVICE_FILTER_ID", $this->DataSource->f("P_EVENT_SERVICE_FILTER_ID"));
                $this->P_EVENT_SERVICE_FILTER_ID->SetValue($this->DataSource->P_EVENT_SERVICE_FILTER_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->P_EVENT_SERVICE_TYPE_ID->Show();
                $this->FILTER_COLUMN_NAME->Show();
                $this->FILTER_COLUMN_VALUE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_EVENT_SERVICE_FILTER_ID->Show();
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
        $this->Navigator->Show();
        $this->P_EVENT_SERVICE_FILTER_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-7BA36501
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->P_EVENT_SERVICE_TYPE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FILTER_COLUMN_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FILTER_COLUMN_VALUE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_EVENT_SERVICE_FILTER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_EVENT_SERVICE_FILTER Class @2-FCB6E20C

class clsP_EVENT_SERVICE_FILTERDataSource extends clsDBConn {  //P_EVENT_SERVICE_FILTERDataSource Class @2-AD4D1310

//DataSource Variables @2-73A99CD1
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $P_EVENT_SERVICE_TYPE_ID;
    var $FILTER_COLUMN_NAME;
    var $FILTER_COLUMN_VALUE;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_EVENT_SERVICE_FILTER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-CC9326DB
    function clsP_EVENT_SERVICE_FILTERDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_EVENT_SERVICE_FILTER";
        $this->Initialize();
        $this->P_EVENT_SERVICE_TYPE_ID = new clsField("P_EVENT_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->FILTER_COLUMN_NAME = new clsField("FILTER_COLUMN_NAME", ccsText, "");
        
        $this->FILTER_COLUMN_VALUE = new clsField("FILTER_COLUMN_VALUE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_EVENT_SERVICE_FILTER_ID = new clsField("P_EVENT_SERVICE_FILTER_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-79F83B00
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_EVENT_SERVICE_FILTER_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-F8D9B741
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "FILTER_COLUMN_NAME", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-7EB86FB1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM p_event_service_filter";
        $this->SQL = "SELECT P_EVENT_SERVICE_FILTER_ID, P_EVENT_SERVICE_TYPE_ID, FILTER_COLUMN_NAME, FILTER_COLUMN_VALUE, VALID_FROM, VALID_TO, DESCRIPTION \n\n" .
        "FROM p_event_service_filter {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-B7680120
    function SetValues()
    {
        $this->P_EVENT_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_EVENT_SERVICE_TYPE_ID")));
        $this->FILTER_COLUMN_NAME->SetDBValue($this->f("FILTER_COLUMN_NAME"));
        $this->FILTER_COLUMN_VALUE->SetDBValue($this->f("FILTER_COLUMN_VALUE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_EVENT_SERVICE_FILTER_ID"));
        $this->ADLink->SetDBValue($this->f("P_EVENT_SERVICE_FILTER_ID"));
        $this->P_EVENT_SERVICE_FILTER_ID->SetDBValue(trim($this->f("P_EVENT_SERVICE_FILTER_ID")));
    }
//End SetValues Method

} //End P_EVENT_SERVICE_FILTERDataSource Class @2-FCB6E20C

class clsRecordP_EVENT_SERVICE_FILTERSearch { //P_EVENT_SERVICE_FILTERSearch Class @3-715431D8

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

//Class_Initialize Event @3-2220DE98
    function clsRecordP_EVENT_SERVICE_FILTERSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_EVENT_SERVICE_FILTERSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_EVENT_SERVICE_FILTERSearch";
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

//Operation Method @3-4FBC6022
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
        $Redirect = "p_event_service_filter.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_event_service_filter.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_EVENT_SERVICE_FILTERSearch Class @3-FCB6E20C

class clsRecordp_event_service_filter1 { //p_event_service_filter1 Class @31-9543BECA

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

//Class_Initialize Event @31-75BF7950
    function clsRecordp_event_service_filter1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_event_service_filter1/Error";
        $this->DataSource = new clsp_event_service_filter1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_event_service_filter1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->P_EVENT_SERVICE_TYPE_ID = & new clsControl(ccsTextBox, "P_EVENT_SERVICE_TYPE_ID", "P EVENT SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_EVENT_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_EVENT_SERVICE_TYPE_ID->Required = true;
            $this->FILTER_COLUMN_NAME = & new clsControl(ccsTextBox, "FILTER_COLUMN_NAME", "FILTER COLUMN NAME", ccsText, "", CCGetRequestParam("FILTER_COLUMN_NAME", $Method, NULL), $this);
            $this->FILTER_COLUMN_NAME->Required = true;
            $this->FILTER_COLUMN_VALUE = & new clsControl(ccsTextBox, "FILTER_COLUMN_VALUE", "FILTER COLUMN VALUE", ccsText, "", CCGetRequestParam("FILTER_COLUMN_VALUE", $Method, NULL), $this);
            $this->FILTER_COLUMN_VALUE->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "p_event_service_filter1", "VALID_FROM", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "p_event_service_filter1", "VALID_TO", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_EVENT_SERVICE_FILTER_ID = & new clsControl(ccsHidden, "P_EVENT_SERVICE_FILTER_ID", "P EVENT SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_EVENT_SERVICE_FILTER_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->CREATED_BY->Value) && !strlen($this->CREATED_BY->Value) && $this->CREATED_BY->Value !== false)
                    $this->CREATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATED_BY->Value) && !strlen($this->UPDATED_BY->Value) && $this->UPDATED_BY->Value !== false)
                    $this->UPDATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetText(date("d-M-Y"));
                if(!is_array($this->UPDATED_DATE->Value) && !strlen($this->UPDATED_DATE->Value) && $this->UPDATED_DATE->Value !== false)
                    $this->UPDATED_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-B9A9AAA0
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_EVENT_SERVICE_FILTER_ID"] = CCGetFromGet("P_EVENT_SERVICE_FILTER_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-51E62DDA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_EVENT_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->FILTER_COLUMN_NAME->Validate() && $Validation);
        $Validation = ($this->FILTER_COLUMN_VALUE->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_EVENT_SERVICE_FILTER_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_EVENT_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILTER_COLUMN_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILTER_COLUMN_VALUE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_EVENT_SERVICE_FILTER_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-D4FAADED
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_EVENT_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->FILTER_COLUMN_NAME->Errors->Count());
        $errors = ($errors || $this->FILTER_COLUMN_VALUE->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_EVENT_SERVICE_FILTER_ID->Errors->Count());
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

//Operation Method @31-EC4C5258
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_APP_ROLE_ID", "s_keyword", "P_APP_ROLEPage"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_APP_ROLEPage"));
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
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
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

//InsertRow Method @31-362746E8
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_EVENT_SERVICE_TYPE_ID->SetValue($this->P_EVENT_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->FILTER_COLUMN_NAME->SetValue($this->FILTER_COLUMN_NAME->GetValue(true));
        $this->DataSource->FILTER_COLUMN_VALUE->SetValue($this->FILTER_COLUMN_VALUE->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-56F57BA0
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_EVENT_SERVICE_TYPE_ID->SetValue($this->P_EVENT_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->FILTER_COLUMN_NAME->SetValue($this->FILTER_COLUMN_NAME->GetValue(true));
        $this->DataSource->FILTER_COLUMN_VALUE->SetValue($this->FILTER_COLUMN_VALUE->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_EVENT_SERVICE_FILTER_ID->SetValue($this->P_EVENT_SERVICE_FILTER_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-BAD51C2F
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_EVENT_SERVICE_FILTER_ID->SetValue($this->P_EVENT_SERVICE_FILTER_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-F593BB97
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
                    $this->P_EVENT_SERVICE_TYPE_ID->SetValue($this->DataSource->P_EVENT_SERVICE_TYPE_ID->GetValue());
                    $this->FILTER_COLUMN_NAME->SetValue($this->DataSource->FILTER_COLUMN_NAME->GetValue());
                    $this->FILTER_COLUMN_VALUE->SetValue($this->DataSource->FILTER_COLUMN_VALUE->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_EVENT_SERVICE_FILTER_ID->SetValue($this->DataSource->P_EVENT_SERVICE_FILTER_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_EVENT_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILTER_COLUMN_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILTER_COLUMN_VALUE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_EVENT_SERVICE_FILTER_ID->Errors->ToString());
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

        $this->P_EVENT_SERVICE_TYPE_ID->Show();
        $this->FILTER_COLUMN_NAME->Show();
        $this->FILTER_COLUMN_VALUE->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_EVENT_SERVICE_FILTER_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_event_service_filter1 Class @31-FCB6E20C

class clsp_event_service_filter1DataSource extends clsDBConn {  //p_event_service_filter1DataSource Class @31-D34B48DE

//DataSource Variables @31-34CA4D46
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
    var $P_EVENT_SERVICE_TYPE_ID;
    var $FILTER_COLUMN_NAME;
    var $FILTER_COLUMN_VALUE;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_EVENT_SERVICE_FILTER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-E4D8DCA8
    function clsp_event_service_filter1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_event_service_filter1/Error";
        $this->Initialize();
        $this->P_EVENT_SERVICE_TYPE_ID = new clsField("P_EVENT_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->FILTER_COLUMN_NAME = new clsField("FILTER_COLUMN_NAME", ccsText, "");
        
        $this->FILTER_COLUMN_VALUE = new clsField("FILTER_COLUMN_VALUE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_EVENT_SERVICE_FILTER_ID = new clsField("P_EVENT_SERVICE_FILTER_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-81814C86
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_EVENT_SERVICE_FILTER_ID", ccsFloat, "", "", $this->Parameters["urlP_EVENT_SERVICE_FILTER_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_EVENT_SERVICE_FILTER_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @31-CC55D056
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_event_service_filter {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-545CB2F3
    function SetValues()
    {
        $this->P_EVENT_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_EVENT_SERVICE_TYPE_ID")));
        $this->FILTER_COLUMN_NAME->SetDBValue($this->f("FILTER_COLUMN_NAME"));
        $this->FILTER_COLUMN_VALUE->SetDBValue($this->f("FILTER_COLUMN_VALUE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_EVENT_SERVICE_FILTER_ID->SetDBValue(trim($this->f("P_EVENT_SERVICE_FILTER_ID")));
    }
//End SetValues Method

//Insert Method @31-53F6A8B8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_EVENT_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_EVENT_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_EVENT_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["FILTER_COLUMN_NAME"] = new clsSQLParameter("ctrlFILTER_COLUMN_NAME", ccsText, "", "", $this->FILTER_COLUMN_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILTER_COLUMN_VALUE"] = new clsSQLParameter("ctrlFILTER_COLUMN_VALUE", ccsText, "", "", $this->FILTER_COLUMN_VALUE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_EVENT_SERVICE_TYPE_ID"]->SetValue($this->P_EVENT_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_EVENT_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["FILTER_COLUMN_NAME"]->GetValue()) and !strlen($this->cp["FILTER_COLUMN_NAME"]->GetText()) and !is_bool($this->cp["FILTER_COLUMN_NAME"]->GetValue())) 
            $this->cp["FILTER_COLUMN_NAME"]->SetValue($this->FILTER_COLUMN_NAME->GetValue(true));
        if (!is_null($this->cp["FILTER_COLUMN_VALUE"]->GetValue()) and !strlen($this->cp["FILTER_COLUMN_VALUE"]->GetText()) and !is_bool($this->cp["FILTER_COLUMN_VALUE"]->GetValue())) 
            $this->cp["FILTER_COLUMN_VALUE"]->SetValue($this->FILTER_COLUMN_VALUE->GetValue(true));
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
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_EVENT_SERVICE_FILTER(P_EVENT_SERVICE_FILTER_ID, P_EVENT_SERVICE_TYPE_ID, FILTER_COLUMN_NAME, FILTER_COLUMN_VALUE, VALID_FROM, VALID_TO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_EVENT_SERVICE_FILTER','P_EVENT_SERVICE_FILTER_ID')," . $this->SQLValue($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["FILTER_COLUMN_NAME"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["FILTER_COLUMN_VALUE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-4752C9AC
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_EVENT_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_EVENT_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_EVENT_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["FILTER_COLUMN_NAME"] = new clsSQLParameter("ctrlFILTER_COLUMN_NAME", ccsText, "", "", $this->FILTER_COLUMN_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILTER_COLUMN_VALUE"] = new clsSQLParameter("ctrlFILTER_COLUMN_VALUE", ccsText, "", "", $this->FILTER_COLUMN_VALUE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), UPDATED_BY, false, $this->ErrorBlock);
        $this->cp["P_EVENT_SERVICE_FILTER_ID"] = new clsSQLParameter("ctrlP_EVENT_SERVICE_FILTER_ID", ccsFloat, "", "", $this->P_EVENT_SERVICE_FILTER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_EVENT_SERVICE_TYPE_ID"]->SetValue($this->P_EVENT_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_EVENT_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["FILTER_COLUMN_NAME"]->GetValue()) and !strlen($this->cp["FILTER_COLUMN_NAME"]->GetText()) and !is_bool($this->cp["FILTER_COLUMN_NAME"]->GetValue())) 
            $this->cp["FILTER_COLUMN_NAME"]->SetValue($this->FILTER_COLUMN_NAME->GetValue(true));
        if (!is_null($this->cp["FILTER_COLUMN_VALUE"]->GetValue()) and !strlen($this->cp["FILTER_COLUMN_VALUE"]->GetText()) and !is_bool($this->cp["FILTER_COLUMN_VALUE"]->GetValue())) 
            $this->cp["FILTER_COLUMN_VALUE"]->SetValue($this->FILTER_COLUMN_VALUE->GetValue(true));
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
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue(true))) 
            $this->cp["UPDATED_BY"]->SetText(UPDATED_BY);
        if (!is_null($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue()) and !strlen($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue())) 
            $this->cp["P_EVENT_SERVICE_FILTER_ID"]->SetValue($this->P_EVENT_SERVICE_FILTER_ID->GetValue(true));
        if (!strlen($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue(true))) 
            $this->cp["P_EVENT_SERVICE_FILTER_ID"]->SetText(0);
        $this->SQL = "UPDATE P_EVENT_SERVICE_FILTER SET \n" .
        "P_EVENT_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_EVENT_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "FILTER_COLUMN_NAME='" . $this->SQLValue($this->cp["FILTER_COLUMN_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "FILTER_COLUMN_VALUE='" . $this->SQLValue($this->cp["FILTER_COLUMN_VALUE"]->GetDBValue(), ccsText) . "',\n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_EVENT_SERVICE_FILTER_ID = " . $this->SQLValue($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-68B504C4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_EVENT_SERVICE_FILTER_ID"] = new clsSQLParameter("ctrlP_EVENT_SERVICE_FILTER_ID", ccsFloat, "", "", $this->P_EVENT_SERVICE_FILTER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue()) and !strlen($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue())) 
            $this->cp["P_EVENT_SERVICE_FILTER_ID"]->SetValue($this->P_EVENT_SERVICE_FILTER_ID->GetValue(true));
        if (!strlen($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetText()) and !is_bool($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetValue(true))) 
            $this->cp["P_EVENT_SERVICE_FILTER_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_EVENT_SERVICE_FILTER WHERE P_EVENT_SERVICE_FILTER_ID = " . $this->SQLValue($this->cp["P_EVENT_SERVICE_FILTER_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_event_service_filter1DataSource Class @31-FCB6E20C

//Initialize Page @1-8C060E75
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
$TemplateFileName = "p_event_service_filter.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-98C6CE3E
include_once("./p_event_service_filter_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-8721E5EA
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_EVENT_SERVICE_FILTER = & new clsGridP_EVENT_SERVICE_FILTER("", $MainPage);
$P_EVENT_SERVICE_FILTERSearch = & new clsRecordP_EVENT_SERVICE_FILTERSearch("", $MainPage);
$p_event_service_filter1 = & new clsRecordp_event_service_filter1("", $MainPage);
$MainPage->P_EVENT_SERVICE_FILTER = & $P_EVENT_SERVICE_FILTER;
$MainPage->P_EVENT_SERVICE_FILTERSearch = & $P_EVENT_SERVICE_FILTERSearch;
$MainPage->p_event_service_filter1 = & $p_event_service_filter1;
$P_EVENT_SERVICE_FILTER->Initialize();
$p_event_service_filter1->Initialize();

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

//Execute Components @1-7E87926A
$P_EVENT_SERVICE_FILTERSearch->Operation();
$p_event_service_filter1->Operation();
//End Execute Components

//Go to destination page @1-05BF7888
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_EVENT_SERVICE_FILTER);
    unset($P_EVENT_SERVICE_FILTERSearch);
    unset($p_event_service_filter1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-048B6B9E
$P_EVENT_SERVICE_FILTER->Show();
$P_EVENT_SERVICE_FILTERSearch->Show();
$p_event_service_filter1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2FC1F31F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_EVENT_SERVICE_FILTER);
unset($P_EVENT_SERVICE_FILTERSearch);
unset($p_event_service_filter1);
unset($Tpl);
//End Unload Page


?>
