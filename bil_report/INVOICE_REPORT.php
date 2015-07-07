<?php
//Include Common Files @1-73DC5E08
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_report/");
define("FileName", "INVOICE_REPORT.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordINVOICEREPORT_SEARCH { //INVOICEREPORT_SEARCH Class @3-B35E57CC

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

//Class_Initialize Event @3-D597637E
    function clsRecordINVOICEREPORT_SEARCH($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record INVOICEREPORT_SEARCH/Error";
        $this->DataSource = new clsINVOICEREPORT_SEARCHDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "INVOICEREPORT_SEARCH";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Invoice_date = & new clsControl(ccsTextBox, "Invoice_date", "Invoice_date", ccsDate, array("dd", "/", "mm", "/", "yyyy"), CCGetRequestParam("Invoice_date", $Method, NULL), $this);
            $this->bill_cycle_code = & new clsControl(ccsTextBox, "bill_cycle_code", "bill_cycle_code", ccsText, "", CCGetRequestParam("bill_cycle_code", $Method, NULL), $this);
            $this->finance_period_code = & new clsControl(ccsTextBox, "finance_period_code", "finance_period_code", ccsText, "", CCGetRequestParam("finance_period_code", $Method, NULL), $this);
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsTextBox, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->ACCOUNT_NO = & new clsControl(ccsTextBox, "ACCOUNT_NO", "ACCOUNT_NO", ccsText, "", CCGetRequestParam("ACCOUNT_NO", $Method, NULL), $this);
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsTextBox, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @3-ED4422A5
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlINPUT_DATA_CONTROL_ID"] = CCGetFromGet("INPUT_DATA_CONTROL_ID", NULL);
    }
//End Initialize Method

//Validate Method @3-A84C1C44
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Invoice_date->Validate() && $Validation);
        $Validation = ($this->bill_cycle_code->Validate() && $Validation);
        $Validation = ($this->finance_period_code->Validate() && $Validation);
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->ACCOUNT_NO->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Invoice_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->bill_cycle_code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->finance_period_code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACCOUNT_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-9996A394
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Invoice_date->Errors->Count());
        $errors = ($errors || $this->bill_cycle_code->Errors->Count());
        $errors = ($errors || $this->finance_period_code->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->ACCOUNT_NO->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
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

//Operation Method @3-FE9F1CEB
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
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "INVOICE_REPORT.php" . "?" . CCGetQueryString("All", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "INVOICE_REPORT.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")), CCGetQueryString("QueryString", array("Invoice_date", "bill_cycle_code", "finance_period_code", "INPUT_DATA_CONTROL_ID", "ACCOUNT_NO", "CUSTOMER_ACCOUNT_ID", "ccsForm")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
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

//Show Method @3-F11F0B0E
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
                    $this->Invoice_date->SetValue($this->DataSource->Invoice_date->GetValue());
                    $this->bill_cycle_code->SetValue($this->DataSource->bill_cycle_code->GetValue());
                    $this->finance_period_code->SetValue($this->DataSource->finance_period_code->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Invoice_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->bill_cycle_code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->finance_period_code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACCOUNT_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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

        $this->Invoice_date->Show();
        $this->bill_cycle_code->Show();
        $this->finance_period_code->Show();
        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->Button_DoSearch->Show();
        $this->ACCOUNT_NO->Show();
        $this->CUSTOMER_ACCOUNT_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End INVOICEREPORT_SEARCH Class @3-FCB6E20C

class clsINVOICEREPORT_SEARCHDataSource extends clsDBConn {  //INVOICEREPORT_SEARCHDataSource Class @3-3E62F8DA

//DataSource Variables @3-5EBA7335
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $Invoice_date;
    var $bill_cycle_code;
    var $finance_period_code;
    var $INPUT_DATA_CONTROL_ID;
    var $ACCOUNT_NO;
    var $CUSTOMER_ACCOUNT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @3-8EDF8143
    function clsINVOICEREPORT_SEARCHDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record INVOICEREPORT_SEARCH/Error";
        $this->Initialize();
        $this->Invoice_date = new clsField("Invoice_date", ccsDate, $this->DateFormat);
        
        $this->bill_cycle_code = new clsField("bill_cycle_code", ccsText, "");
        
        $this->finance_period_code = new clsField("finance_period_code", ccsText, "");
        
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsText, "");
        
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @3-C7BC9C0B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlINPUT_DATA_CONTROL_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "INPUT_DATA_CONTROL_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @3-75A05C9B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_INPUT_DATA_CONTROL_BILL {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @3-1CED2FA9
    function SetValues()
    {
        $this->Invoice_date->SetDBValue(trim($this->f("INVOICE_DATE")));
        $this->bill_cycle_code->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->finance_period_code->SetDBValue($this->f("FINANCE_PERIOD_CODE"));
    }
//End SetValues Method

} //End INVOICEREPORT_SEARCHDataSource Class @3-FCB6E20C



//Initialize Page @1-8303DE19
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
$TemplateFileName = "INVOICE_REPORT.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-79439583
include_once("./INVOICE_REPORT_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E507044F
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$INVOICEREPORT_SEARCH = & new clsRecordINVOICEREPORT_SEARCH("", $MainPage);
$MainPage->INVOICEREPORT_SEARCH = & $INVOICEREPORT_SEARCH;
$INVOICEREPORT_SEARCH->Initialize();

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

//Execute Components @1-9D0D6DA4
$INVOICEREPORT_SEARCH->Operation();
//End Execute Components

//Go to destination page @1-915C4183
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($INVOICEREPORT_SEARCH);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A0ADBDB0
$INVOICEREPORT_SEARCH->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9A347FC8
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($INVOICEREPORT_SEARCH);
unset($Tpl);
//End Unload Page


?>
