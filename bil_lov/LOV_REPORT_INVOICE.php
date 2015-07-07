<?php
//Include Common Files @1-72E02613
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_lov/");
define("FileName", "LOV_REPORT_INVOICE.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordSEARCH { //SEARCH Class @3-F27E9413

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

//Class_Initialize Event @3-E019F9E1
    function clsRecordSEARCH($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record SEARCH/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "SEARCH";
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

//Operation Method @3-2818EED4
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
        $Redirect = "LOV_REPORT_INVOICE.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "LOV_REPORT_INVOICE.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "TAMBAH", "BATCH_CONTROL_ID")), CCGetQueryString("QueryString", array("s_keyword", "ccsForm", "TAMBAH", "BATCH_CONTROL_ID")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-1D416E0E
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
        if($this->FormSubmitted || CCGetFromGet("ccsForm")) {
            $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        } else {
            $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("All", ""), "ccsForm", $CCSForm);
        }
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

} //End SEARCH Class @3-FCB6E20C

class clsGridGRID { //GRID class @282-7BE954E8

//Variables @282-AC1EDBB9

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

//Class_Initialize Event @282-DA080AFD
    function clsGridGRID($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "GRID";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid GRID";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGRIDDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 15;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsLabel, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsFloat, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", ccsGet, NULL), $this);
        $this->INVOICE_DATE = & new clsControl(ccsLabel, "INVOICE_DATE", "INVOICE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("INVOICE_DATE", ccsGet, NULL), $this);
        $this->BATCH_TYPE = & new clsControl(ccsLabel, "BATCH_TYPE", "BATCH_TYPE", ccsText, "", CCGetRequestParam("BATCH_TYPE", ccsGet, NULL), $this);
        $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", ccsGet, NULL), $this);
        $this->BILL_CYCLE_CODE = & new clsControl(ccsLabel, "BILL_CYCLE_CODE", "BILL_CYCLE_CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", ccsGet, NULL), $this);
        $this->BILL_STATUS = & new clsControl(ccsLabel, "BILL_STATUS", "BILL_STATUS", ccsText, "", CCGetRequestParam("BILL_STATUS", ccsGet, NULL), $this);
        $this->Label1 = & new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        $this->Label1->HTML = true;
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @282-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @282-F65B9238
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
            $this->ControlsVisible["INPUT_DATA_CONTROL_ID"] = $this->INPUT_DATA_CONTROL_ID->Visible;
            $this->ControlsVisible["INVOICE_DATE"] = $this->INVOICE_DATE->Visible;
            $this->ControlsVisible["BATCH_TYPE"] = $this->BATCH_TYPE->Visible;
            $this->ControlsVisible["FINANCE_PERIOD_CODE"] = $this->FINANCE_PERIOD_CODE->Visible;
            $this->ControlsVisible["BILL_CYCLE_CODE"] = $this->BILL_CYCLE_CODE->Visible;
            $this->ControlsVisible["BILL_STATUS"] = $this->BILL_STATUS->Visible;
            $this->ControlsVisible["Label1"] = $this->Label1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                $this->INVOICE_DATE->SetValue($this->DataSource->INVOICE_DATE->GetValue());
                $this->BATCH_TYPE->SetValue($this->DataSource->BATCH_TYPE->GetValue());
                $this->FINANCE_PERIOD_CODE->SetValue($this->DataSource->FINANCE_PERIOD_CODE->GetValue());
                $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                $this->BILL_STATUS->SetValue($this->DataSource->BILL_STATUS->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->INPUT_DATA_CONTROL_ID->Show();
                $this->INVOICE_DATE->Show();
                $this->BATCH_TYPE->Show();
                $this->FINANCE_PERIOD_CODE->Show();
                $this->BILL_CYCLE_CODE->Show();
                $this->BILL_STATUS->Show();
                $this->Label1->Show();
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @282-126F181A
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BATCH_TYPE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FINANCE_PERIOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_CYCLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_STATUS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Label1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End GRID Class @282-FCB6E20C

class clsGRIDDataSource extends clsDBConn {  //GRIDDataSource Class @282-846D01C3

//DataSource Variables @282-6ED96D11
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $INPUT_DATA_CONTROL_ID;
    var $INVOICE_DATE;
    var $BATCH_TYPE;
    var $FINANCE_PERIOD_CODE;
    var $BILL_CYCLE_CODE;
    var $BILL_STATUS;
//End DataSource Variables

//DataSourceClass_Initialize Event @282-19D85C6E
    function clsGRIDDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid GRID";
        $this->Initialize();
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsFloat, "");
        
        $this->INVOICE_DATE = new clsField("INVOICE_DATE", ccsDate, $this->DateFormat);
        
        $this->BATCH_TYPE = new clsField("BATCH_TYPE", ccsText, "");
        
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->BILL_STATUS = new clsField("BILL_STATUS", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @282-E714E73E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Input_data_control_id";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @282-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @282-F9B04BDE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT\n" .
        "Input_data_control_id,\n" .
        "batch_type,\n" .
        "finance_period_code,\n" .
        "Invoice_date,\n" .
        "bill_cycle_code,\n" .
        "bill_status,\n" .
        "BILL_AMT,\n" .
        "CLOSING_DATE,\n" .
        "CLOSED_BY,\n" .
        "CREATION_DATE,\n" .
        "OPERATOR_ID\n" .
        "\n" .
        "FROM\n" .
        "V_INPUT_DATA_CONTROL_BILL\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(Input_data_control_id) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(batch_type) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(finance_period_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(Invoice_date) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_cycle_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_status) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(BILL_AMT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSING_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSED_BY) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CREATION_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(OPERATOR_ID) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT\n" .
        "Input_data_control_id,\n" .
        "batch_type,\n" .
        "finance_period_code,\n" .
        "Invoice_date,\n" .
        "bill_cycle_code,\n" .
        "bill_status,\n" .
        "BILL_AMT,\n" .
        "CLOSING_DATE,\n" .
        "CLOSED_BY,\n" .
        "CREATION_DATE,\n" .
        "OPERATOR_ID\n" .
        "\n" .
        "FROM\n" .
        "V_INPUT_DATA_CONTROL_BILL\n" .
        "\n" .
        "WHERE\n" .
        "UPPER(Input_data_control_id) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(batch_type) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(finance_period_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(Invoice_date) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_cycle_code) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(bill_status) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(BILL_AMT) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSING_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CLOSED_BY) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(CREATION_DATE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "UPPER(OPERATOR_ID) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') {SQL_OrderBy}";
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

//SetValues Method @282-DD4E58E6
    function SetValues()
    {
        $this->INPUT_DATA_CONTROL_ID->SetDBValue(trim($this->f("INPUT_DATA_CONTROL_ID")));
        $this->INVOICE_DATE->SetDBValue(trim($this->f("INVOICE_DATE")));
        $this->BATCH_TYPE->SetDBValue($this->f("BATCH_TYPE"));
        $this->FINANCE_PERIOD_CODE->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->BILL_STATUS->SetDBValue($this->f("BILL_STATUS"));
    }
//End SetValues Method

} //End GRIDDataSource Class @282-FCB6E20C

//Initialize Page @1-F1E933C1
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
$TemplateFileName = "LOV_REPORT_INVOICE.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-D0F08BD0
include_once("./LOV_REPORT_INVOICE_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FA37E79E
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$SEARCH = & new clsRecordSEARCH("", $MainPage);
$GRID = & new clsGridGRID("", $MainPage);
$MainPage->SEARCH = & $SEARCH;
$MainPage->GRID = & $GRID;
$GRID->Initialize();

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

//Execute Components @1-FE4A2003
$SEARCH->Operation();
//End Execute Components

//Go to destination page @1-F188685B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($SEARCH);
    unset($GRID);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-54CB83BB
$SEARCH->Show();
$GRID->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-B5C45754
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($SEARCH);
unset($GRID);
unset($Tpl);
//End Unload Page


?>
