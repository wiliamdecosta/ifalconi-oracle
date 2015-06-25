<?php
//Include Common Files @1-11B335AB
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_organization.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_ORGANIZATION { //P_ORGANIZATION class @2-78E75D85

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

//Class_Initialize Event @2-34D48153
    function clsGridP_ORGANIZATION($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_ORGANIZATION";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_ORGANIZATION";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_ORGANIZATIONDataSource($this);
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

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->ORGANIZATION_NAME = & new clsControl(ccsLabel, "ORGANIZATION_NAME", "ORGANIZATION_NAME", ccsText, "", CCGetRequestParam("ORGANIZATION_NAME", ccsGet, NULL), $this);
        $this->P_COMPANY_NAME = & new clsControl(ccsLabel, "P_COMPANY_NAME", "P_COMPANY_NAME", ccsText, "", CCGetRequestParam("P_COMPANY_NAME", ccsGet, NULL), $this);
        $this->LEVEL_NUMBER = & new clsControl(ccsLabel, "LEVEL_NUMBER", "LEVEL_NUMBER", ccsFloat, "", CCGetRequestParam("LEVEL_NUMBER", ccsGet, NULL), $this);
        $this->P_BILLING_CENTER_ID = & new clsControl(ccsLabel, "P_BILLING_CENTER_ID", "P_BILLING_CENTER_ID", ccsFloat, "", CCGetRequestParam("P_BILLING_CENTER_ID", ccsGet, NULL), $this);
        $this->FINANCE_CODE = & new clsControl(ccsLabel, "FINANCE_CODE", "FINANCE_CODE", ccsText, "", CCGetRequestParam("FINANCE_CODE", ccsGet, NULL), $this);
        $this->P_REGION_NAME = & new clsControl(ccsLabel, "P_REGION_NAME", "P_REGION_NAME", ccsText, "", CCGetRequestParam("P_REGION_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_organization.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_organization.php";
        $this->P_ORGANIZATION_ID = & new clsControl(ccsHidden, "P_ORGANIZATION_ID", "P_ORGANIZATION_ID", ccsFloat, "", CCGetRequestParam("P_ORGANIZATION_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_ORGANIZATION_Insert = & new clsControl(ccsLink, "P_ORGANIZATION_Insert", "P_ORGANIZATION_Insert", ccsText, "", CCGetRequestParam("P_ORGANIZATION_Insert", ccsGet, NULL), $this);
        $this->P_ORGANIZATION_Insert->Page = "p_organization.php";
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

//Show Method @2-6239252F
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
            $this->ControlsVisible["CODE"] = $this->CODE->Visible;
            $this->ControlsVisible["ORGANIZATION_NAME"] = $this->ORGANIZATION_NAME->Visible;
            $this->ControlsVisible["P_COMPANY_NAME"] = $this->P_COMPANY_NAME->Visible;
            $this->ControlsVisible["LEVEL_NUMBER"] = $this->LEVEL_NUMBER->Visible;
            $this->ControlsVisible["P_BILLING_CENTER_ID"] = $this->P_BILLING_CENTER_ID->Visible;
            $this->ControlsVisible["FINANCE_CODE"] = $this->FINANCE_CODE->Visible;
            $this->ControlsVisible["P_REGION_NAME"] = $this->P_REGION_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_ORGANIZATION_ID"] = $this->P_ORGANIZATION_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->ORGANIZATION_NAME->SetValue($this->DataSource->ORGANIZATION_NAME->GetValue());
                $this->P_COMPANY_NAME->SetValue($this->DataSource->P_COMPANY_NAME->GetValue());
                $this->LEVEL_NUMBER->SetValue($this->DataSource->LEVEL_NUMBER->GetValue());
                $this->P_BILLING_CENTER_ID->SetValue($this->DataSource->P_BILLING_CENTER_ID->GetValue());
                $this->FINANCE_CODE->SetValue($this->DataSource->FINANCE_CODE->GetValue());
                $this->P_REGION_NAME->SetValue($this->DataSource->P_REGION_NAME->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_ORGANIZATION_ID", $this->DataSource->f("P_ORGANIZATION_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_ORGANIZATION_ID", $this->DataSource->f("P_ORGANIZATION_ID"));
                $this->P_ORGANIZATION_ID->SetValue($this->DataSource->P_ORGANIZATION_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->ORGANIZATION_NAME->Show();
                $this->P_COMPANY_NAME->Show();
                $this->LEVEL_NUMBER->Show();
                $this->P_BILLING_CENTER_ID->Show();
                $this->FINANCE_CODE->Show();
                $this->P_REGION_NAME->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_ORGANIZATION_ID->Show();
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
        $this->P_ORGANIZATION_Insert->Parameters = CCGetQueryString("QueryString", array("P_ORGANIZATION_ID", "ccsForm"));
        $this->P_ORGANIZATION_Insert->Parameters = CCAddParam($this->P_ORGANIZATION_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_ORGANIZATION_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-DE2AC2EC
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ORGANIZATION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_COMPANY_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LEVEL_NUMBER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILLING_CENTER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FINANCE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REGION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ORGANIZATION_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_ORGANIZATION Class @2-FCB6E20C

class clsP_ORGANIZATIONDataSource extends clsDBConn {  //P_ORGANIZATIONDataSource Class @2-B97A87BF

//DataSource Variables @2-EFECE1D4
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $ORGANIZATION_NAME;
    var $P_COMPANY_NAME;
    var $LEVEL_NUMBER;
    var $P_BILLING_CENTER_ID;
    var $FINANCE_CODE;
    var $P_REGION_NAME;
    var $DLink;
    var $ADLink;
    var $P_ORGANIZATION_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A2EA1D84
    function clsP_ORGANIZATIONDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_ORGANIZATION";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->ORGANIZATION_NAME = new clsField("ORGANIZATION_NAME", ccsText, "");
        
        $this->P_COMPANY_NAME = new clsField("P_COMPANY_NAME", ccsText, "");
        
        $this->LEVEL_NUMBER = new clsField("LEVEL_NUMBER", ccsFloat, "");
        
        $this->P_BILLING_CENTER_ID = new clsField("P_BILLING_CENTER_ID", ccsFloat, "");
        
        $this->FINANCE_CODE = new clsField("FINANCE_CODE", ccsText, "");
        
        $this->P_REGION_NAME = new clsField("P_REGION_NAME", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_ORGANIZATION_ID = new clsField("P_ORGANIZATION_ID", ccsFloat, "");
        

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

//Open Method @2-402AE1B0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as p_company_name,c.region_name as p_region_name,d.code as p_country_name \n" .
        "from p_organization a,\n" .
        "p_company b,\n" .
        "p_region c,\n" .
        "p_country d\n" .
        "where a.p_company_id=b.p_company_id\n" .
        "and a.p_region_id=c.p_region_id\n" .
        "and a.p_country_id=d.p_country_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as p_company_name,c.region_name as p_region_name,d.code as p_country_name \n" .
        "from p_organization a,\n" .
        "p_company b,\n" .
        "p_region c,\n" .
        "p_country d\n" .
        "where a.p_company_id=b.p_company_id\n" .
        "and a.p_region_id=c.p_region_id\n" .
        "and a.p_country_id=d.p_country_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-7111F5B0
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->ORGANIZATION_NAME->SetDBValue($this->f("ORGANIZATION_NAME"));
        $this->P_COMPANY_NAME->SetDBValue($this->f("P_COMPANY_NAME"));
        $this->LEVEL_NUMBER->SetDBValue(trim($this->f("LEVEL_NUMBER")));
        $this->P_BILLING_CENTER_ID->SetDBValue(trim($this->f("P_BILLING_CENTER_ID")));
        $this->FINANCE_CODE->SetDBValue($this->f("FINANCE_CODE"));
        $this->P_REGION_NAME->SetDBValue($this->f("P_REGION_NAME"));
        $this->DLink->SetDBValue($this->f("P_ORGANIZATION_ID"));
        $this->ADLink->SetDBValue($this->f("P_ORGANIZATION_ID"));
        $this->P_ORGANIZATION_ID->SetDBValue(trim($this->f("P_ORGANIZATION_ID")));
    }
//End SetValues Method

} //End P_ORGANIZATIONDataSource Class @2-FCB6E20C

class clsRecordP_ORGANIZATIONSearch { //P_ORGANIZATIONSearch Class @3-E581F7BE

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

//Class_Initialize Event @3-AFD960EE
    function clsRecordP_ORGANIZATIONSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_ORGANIZATIONSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_ORGANIZATIONSearch";
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

//Operation Method @3-C98AD6D8
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
        $Redirect = "p_organization.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_organization.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_ORGANIZATIONSearch Class @3-FCB6E20C

class clsRecordp_organization1 { //p_organization1 Class @72-777F9A13

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

//Class_Initialize Event @72-82FDDB22
    function clsRecordp_organization1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_organization1/Error";
        $this->DataSource = new clsp_organization1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_organization1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->ORGANIZATION_NAME = & new clsControl(ccsTextBox, "ORGANIZATION_NAME", "ORGANIZATION NAME", ccsText, "", CCGetRequestParam("ORGANIZATION_NAME", $Method, NULL), $this);
            $this->ORGANIZATION_NAME->Required = true;
            $this->P_COMPANY_ID = & new clsControl(ccsHidden, "P_COMPANY_ID", "P COMPANY ID", ccsFloat, "", CCGetRequestParam("P_COMPANY_ID", $Method, NULL), $this);
            $this->P_COMPANY_ID->Required = true;
            $this->LEVEL_NUMBER = & new clsControl(ccsTextBox, "LEVEL_NUMBER", "LEVEL NUMBER", ccsFloat, "", CCGetRequestParam("LEVEL_NUMBER", $Method, NULL), $this);
            $this->LEVEL_NUMBER->Required = true;
            $this->FINANCE_CODE = & new clsControl(ccsTextBox, "FINANCE_CODE", "FINANCE CODE", ccsText, "", CCGetRequestParam("FINANCE_CODE", $Method, NULL), $this);
            $this->PARENT_ID = & new clsControl(ccsTextBox, "PARENT_ID", "PARENT ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->ADDRESS_1 = & new clsControl(ccsTextBox, "ADDRESS_1", "ADDRESS 1", ccsText, "", CCGetRequestParam("ADDRESS_1", $Method, NULL), $this);
            $this->ADDRESS_2 = & new clsControl(ccsTextBox, "ADDRESS_2", "ADDRESS 2", ccsText, "", CCGetRequestParam("ADDRESS_2", $Method, NULL), $this);
            $this->ADDRESS_3 = & new clsControl(ccsTextBox, "ADDRESS_3", "ADDRESS 3", ccsText, "", CCGetRequestParam("ADDRESS_3", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P REGION ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->ZIP_CODE = & new clsControl(ccsTextBox, "ZIP_CODE", "ZIP CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", $Method, NULL), $this);
            $this->P_COUNTRY_ID = & new clsControl(ccsHidden, "P_COUNTRY_ID", "P COUNTRY ID", ccsFloat, "", CCGetRequestParam("P_COUNTRY_ID", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->Button_Insert1 = & new clsButton("Button_Insert1", $Method, $this);
            $this->Button_Update1 = & new clsButton("Button_Update1", $Method, $this);
            $this->Button_Delete1 = & new clsButton("Button_Delete1", $Method, $this);
            $this->Button_Cancel1 = & new clsButton("Button_Cancel1", $Method, $this);
            $this->P_COMPANY_NAME = & new clsControl(ccsTextBox, "P_COMPANY_NAME", "P_COMPANY_NAME", ccsText, "", CCGetRequestParam("P_COMPANY_NAME", $Method, NULL), $this);
            $this->P_REGION_NAME = & new clsControl(ccsTextBox, "P_REGION_NAME", "P_REGION_NAME", ccsText, "", CCGetRequestParam("P_REGION_NAME", $Method, NULL), $this);
            $this->P_COUNTRY_NAME = & new clsControl(ccsTextBox, "P_COUNTRY_NAME", "P_COUNTRY_NAME", ccsText, "", CCGetRequestParam("P_COUNTRY_NAME", $Method, NULL), $this);
            $this->P_ORGANIZATION_ID = & new clsControl(ccsHidden, "P_ORGANIZATION_ID", "CODE", ccsFloat, "", CCGetRequestParam("P_ORGANIZATION_ID", $Method, NULL), $this);
            $this->P_BILLING_CENTER_ID = & new clsControl(ccsTextBox, "P_BILLING_CENTER_ID", "P BILLING CENTER ID", ccsFloat, "", CCGetRequestParam("P_BILLING_CENTER_ID", $Method, NULL), $this);
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

//Initialize Method @72-6FA3BC34
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_ORGANIZATION_ID"] = CCGetFromGet("P_ORGANIZATION_ID", NULL);
    }
//End Initialize Method

//Validate Method @72-F235DE33
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->ORGANIZATION_NAME->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_ID->Validate() && $Validation);
        $Validation = ($this->LEVEL_NUMBER->Validate() && $Validation);
        $Validation = ($this->FINANCE_CODE->Validate() && $Validation);
        $Validation = ($this->PARENT_ID->Validate() && $Validation);
        $Validation = ($this->ADDRESS_1->Validate() && $Validation);
        $Validation = ($this->ADDRESS_2->Validate() && $Validation);
        $Validation = ($this->ADDRESS_3->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $Validation = ($this->ZIP_CODE->Validate() && $Validation);
        $Validation = ($this->P_COUNTRY_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_NAME->Validate() && $Validation);
        $Validation = ($this->P_REGION_NAME->Validate() && $Validation);
        $Validation = ($this->P_COUNTRY_NAME->Validate() && $Validation);
        $Validation = ($this->P_ORGANIZATION_ID->Validate() && $Validation);
        $Validation = ($this->P_BILLING_CENTER_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ORGANIZATION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LEVEL_NUMBER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FINANCE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ZIP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COUNTRY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COUNTRY_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ORGANIZATION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_CENTER_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @72-F654DE64
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->ORGANIZATION_NAME->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_ID->Errors->Count());
        $errors = ($errors || $this->LEVEL_NUMBER->Errors->Count());
        $errors = ($errors || $this->FINANCE_CODE->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->ADDRESS_1->Errors->Count());
        $errors = ($errors || $this->ADDRESS_2->Errors->Count());
        $errors = ($errors || $this->ADDRESS_3->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->ZIP_CODE->Errors->Count());
        $errors = ($errors || $this->P_COUNTRY_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_NAME->Errors->Count());
        $errors = ($errors || $this->P_REGION_NAME->Errors->Count());
        $errors = ($errors || $this->P_COUNTRY_NAME->Errors->Count());
        $errors = ($errors || $this->P_ORGANIZATION_ID->Errors->Count());
        $errors = ($errors || $this->P_BILLING_CENTER_ID->Errors->Count());
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

//Operation Method @72-9EABF5E0
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
            $this->PressedButton = $this->EditMode ? "Button_Update1" : "Button_Insert1";
            if($this->Button_Insert1->Pressed) {
                $this->PressedButton = "Button_Insert1";
            } else if($this->Button_Update1->Pressed) {
                $this->PressedButton = "Button_Update1";
            } else if($this->Button_Delete1->Pressed) {
                $this->PressedButton = "Button_Delete1";
            } else if($this->Button_Cancel1->Pressed) {
                $this->PressedButton = "Button_Cancel1";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete1->CCSEvents, "OnClick", $this->Button_Delete1) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel1->CCSEvents, "OnClick", $this->Button_Cancel1)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert1->CCSEvents, "OnClick", $this->Button_Insert1) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Update1->CCSEvents, "OnClick", $this->Button_Update1) || !$this->UpdateRow()) {
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

//InsertRow Method @72-1C3D3C44
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->ORGANIZATION_NAME->SetValue($this->ORGANIZATION_NAME->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->LEVEL_NUMBER->SetValue($this->LEVEL_NUMBER->GetValue(true));
        $this->DataSource->P_BILLING_CENTER_ID->SetValue($this->P_BILLING_CENTER_ID->GetValue(true));
        $this->DataSource->FINANCE_CODE->SetValue($this->FINANCE_CODE->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->P_COUNTRY_ID->SetValue($this->P_COUNTRY_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @72-33CE99E3
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->ORGANIZATION_NAME->SetValue($this->ORGANIZATION_NAME->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->LEVEL_NUMBER->SetValue($this->LEVEL_NUMBER->GetValue(true));
        $this->DataSource->P_BILLING_CENTER_ID->SetValue($this->P_BILLING_CENTER_ID->GetValue(true));
        $this->DataSource->FINANCE_CODE->SetValue($this->FINANCE_CODE->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->P_COUNTRY_ID->SetValue($this->P_COUNTRY_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_ORGANIZATION_ID->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @72-E6AFDCA5
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_ORGANIZATION_ID->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @72-E04DBD8B
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
                    $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                    $this->ORGANIZATION_NAME->SetValue($this->DataSource->ORGANIZATION_NAME->GetValue());
                    $this->P_COMPANY_ID->SetValue($this->DataSource->P_COMPANY_ID->GetValue());
                    $this->LEVEL_NUMBER->SetValue($this->DataSource->LEVEL_NUMBER->GetValue());
                    $this->FINANCE_CODE->SetValue($this->DataSource->FINANCE_CODE->GetValue());
                    $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                    $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                    $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                    $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                    $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                    $this->P_COUNTRY_ID->SetValue($this->DataSource->P_COUNTRY_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_COMPANY_NAME->SetValue($this->DataSource->P_COMPANY_NAME->GetValue());
                    $this->P_REGION_NAME->SetValue($this->DataSource->P_REGION_NAME->GetValue());
                    $this->P_COUNTRY_NAME->SetValue($this->DataSource->P_COUNTRY_NAME->GetValue());
                    $this->P_ORGANIZATION_ID->SetValue($this->DataSource->P_ORGANIZATION_ID->GetValue());
                    $this->P_BILLING_CENTER_ID->SetValue($this->DataSource->P_BILLING_CENTER_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ORGANIZATION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LEVEL_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ZIP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COUNTRY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COUNTRY_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ORGANIZATION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_CENTER_ID->Errors->ToString());
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
        $this->Button_Insert1->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update1->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete1->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->CODE->Show();
        $this->ORGANIZATION_NAME->Show();
        $this->P_COMPANY_ID->Show();
        $this->LEVEL_NUMBER->Show();
        $this->FINANCE_CODE->Show();
        $this->PARENT_ID->Show();
        $this->ADDRESS_1->Show();
        $this->ADDRESS_2->Show();
        $this->ADDRESS_3->Show();
        $this->P_REGION_ID->Show();
        $this->ZIP_CODE->Show();
        $this->P_COUNTRY_ID->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert1->Show();
        $this->Button_Update1->Show();
        $this->Button_Delete1->Show();
        $this->Button_Cancel1->Show();
        $this->P_COMPANY_NAME->Show();
        $this->P_REGION_NAME->Show();
        $this->P_COUNTRY_NAME->Show();
        $this->P_ORGANIZATION_ID->Show();
        $this->P_BILLING_CENTER_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_organization1 Class @72-FCB6E20C

class clsp_organization1DataSource extends clsDBConn {  //p_organization1DataSource Class @72-B5C892B3

//DataSource Variables @72-72A91838
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
    var $CODE;
    var $ORGANIZATION_NAME;
    var $P_COMPANY_ID;
    var $LEVEL_NUMBER;
    var $FINANCE_CODE;
    var $PARENT_ID;
    var $ADDRESS_1;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $P_REGION_ID;
    var $ZIP_CODE;
    var $P_COUNTRY_ID;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_COMPANY_NAME;
    var $P_REGION_NAME;
    var $P_COUNTRY_NAME;
    var $P_ORGANIZATION_ID;
    var $P_BILLING_CENTER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @72-0CDD374A
    function clsp_organization1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_organization1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->ORGANIZATION_NAME = new clsField("ORGANIZATION_NAME", ccsText, "");
        
        $this->P_COMPANY_ID = new clsField("P_COMPANY_ID", ccsFloat, "");
        
        $this->LEVEL_NUMBER = new clsField("LEVEL_NUMBER", ccsFloat, "");
        
        $this->FINANCE_CODE = new clsField("FINANCE_CODE", ccsText, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->P_COUNTRY_ID = new clsField("P_COUNTRY_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_COMPANY_NAME = new clsField("P_COMPANY_NAME", ccsText, "");
        
        $this->P_REGION_NAME = new clsField("P_REGION_NAME", ccsText, "");
        
        $this->P_COUNTRY_NAME = new clsField("P_COUNTRY_NAME", ccsText, "");
        
        $this->P_ORGANIZATION_ID = new clsField("P_ORGANIZATION_ID", ccsFloat, "");
        
        $this->P_BILLING_CENTER_ID = new clsField("P_BILLING_CENTER_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @72-045E7951
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_ORGANIZATION_ID", ccsFloat, "", "", $this->Parameters["urlP_ORGANIZATION_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @72-53D6145C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_company_name,c.region_name as p_region_name,d.code as p_country_name \n" .
        "from p_organization a,\n" .
        "p_company b,\n" .
        "p_region c,\n" .
        "p_country d\n" .
        "where a.p_company_id=b.p_company_id\n" .
        "and a.p_region_id=c.p_region_id\n" .
        "and a.p_country_id=d.p_country_id\n" .
        "and a.P_ORGANIZATION_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @72-BC8D98F8
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->ORGANIZATION_NAME->SetDBValue($this->f("ORGANIZATION_NAME"));
        $this->P_COMPANY_ID->SetDBValue(trim($this->f("P_COMPANY_ID")));
        $this->LEVEL_NUMBER->SetDBValue(trim($this->f("LEVEL_NUMBER")));
        $this->FINANCE_CODE->SetDBValue($this->f("FINANCE_CODE"));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->P_COUNTRY_ID->SetDBValue(trim($this->f("P_COUNTRY_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_COMPANY_NAME->SetDBValue($this->f("P_COMPANY_NAME"));
        $this->P_REGION_NAME->SetDBValue($this->f("P_REGION_NAME"));
        $this->P_COUNTRY_NAME->SetDBValue($this->f("P_COUNTRY_NAME"));
        $this->P_ORGANIZATION_ID->SetDBValue(trim($this->f("P_ORGANIZATION_ID")));
        $this->P_BILLING_CENTER_ID->SetDBValue(trim($this->f("P_BILLING_CENTER_ID")));
    }
//End SetValues Method

//Insert Method @72-38A1818C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ORGANIZATION_NAME"] = new clsSQLParameter("ctrlORGANIZATION_NAME", ccsText, "", "", $this->ORGANIZATION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["LEVEL_NUMBER"] = new clsSQLParameter("ctrlLEVEL_NUMBER", ccsFloat, "", "", $this->LEVEL_NUMBER->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILLING_CENTER_ID"] = new clsSQLParameter("ctrlP_BILLING_CENTER_ID", ccsFloat, "", "", $this->P_BILLING_CENTER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["FINANCE_CODE"] = new clsSQLParameter("ctrlFINANCE_CODE", ccsText, "", "", $this->FINANCE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COUNTRY_ID"] = new clsSQLParameter("ctrlP_COUNTRY_ID", ccsFloat, "", "", $this->P_COUNTRY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["ORGANIZATION_NAME"]->GetValue()) and !strlen($this->cp["ORGANIZATION_NAME"]->GetText()) and !is_bool($this->cp["ORGANIZATION_NAME"]->GetValue())) 
            $this->cp["ORGANIZATION_NAME"]->SetValue($this->ORGANIZATION_NAME->GetValue(true));
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["LEVEL_NUMBER"]->GetValue()) and !strlen($this->cp["LEVEL_NUMBER"]->GetText()) and !is_bool($this->cp["LEVEL_NUMBER"]->GetValue())) 
            $this->cp["LEVEL_NUMBER"]->SetValue($this->LEVEL_NUMBER->GetValue(true));
        if (!strlen($this->cp["LEVEL_NUMBER"]->GetText()) and !is_bool($this->cp["LEVEL_NUMBER"]->GetValue(true))) 
            $this->cp["LEVEL_NUMBER"]->SetText(0);
        if (!is_null($this->cp["P_BILLING_CENTER_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_CENTER_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_CENTER_ID"]->GetValue())) 
            $this->cp["P_BILLING_CENTER_ID"]->SetValue($this->P_BILLING_CENTER_ID->GetValue(true));
        if (!strlen($this->cp["P_BILLING_CENTER_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_CENTER_ID"]->GetValue(true))) 
            $this->cp["P_BILLING_CENTER_ID"]->SetText(0);
        if (!is_null($this->cp["FINANCE_CODE"]->GetValue()) and !strlen($this->cp["FINANCE_CODE"]->GetText()) and !is_bool($this->cp["FINANCE_CODE"]->GetValue())) 
            $this->cp["FINANCE_CODE"]->SetValue($this->FINANCE_CODE->GetValue(true));
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(0);
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue(true))) 
            $this->cp["ZIP_CODE"]->SetText(0);
        if (!is_null($this->cp["P_COUNTRY_ID"]->GetValue()) and !strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue())) 
            $this->cp["P_COUNTRY_ID"]->SetValue($this->P_COUNTRY_ID->GetValue(true));
        if (!strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue(true))) 
            $this->cp["P_COUNTRY_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_ORGANIZATION(P_ORGANIZATION_ID, CODE, ORGANIZATION_NAME, P_COMPANY_ID, LEVEL_NUMBER, P_BILLING_CENTER_ID, FINANCE_CODE, PARENT_ID, ADDRESS_1, ADDRESS_2, ADDRESS_3, P_REGION_ID, ZIP_CODE, P_COUNTRY_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_ORGANIZATION','P_ORGANIZATION_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ORGANIZATION_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["LEVEL_NUMBER"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_BILLING_CENTER_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["FINANCE_CODE"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_COUNTRY_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "') ";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @72-84F57EF0
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ORGANIZATION_NAME"] = new clsSQLParameter("ctrlORGANIZATION_NAME", ccsText, "", "", $this->ORGANIZATION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["LEVEL_NUMBER"] = new clsSQLParameter("ctrlLEVEL_NUMBER", ccsFloat, "", "", $this->LEVEL_NUMBER->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILLING_CENTER_ID"] = new clsSQLParameter("ctrlP_BILLING_CENTER_ID", ccsFloat, "", "", $this->P_BILLING_CENTER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["FINANCE_CODE"] = new clsSQLParameter("ctrlFINANCE_CODE", ccsText, "", "", $this->FINANCE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COUNTRY_ID"] = new clsSQLParameter("ctrlP_COUNTRY_ID", ccsFloat, "", "", $this->P_COUNTRY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_ORGANIZATION_ID"] = new clsSQLParameter("ctrlP_ORGANIZATION_ID", ccsFloat, "", "", $this->P_ORGANIZATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["ORGANIZATION_NAME"]->GetValue()) and !strlen($this->cp["ORGANIZATION_NAME"]->GetText()) and !is_bool($this->cp["ORGANIZATION_NAME"]->GetValue())) 
            $this->cp["ORGANIZATION_NAME"]->SetValue($this->ORGANIZATION_NAME->GetValue(true));
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["LEVEL_NUMBER"]->GetValue()) and !strlen($this->cp["LEVEL_NUMBER"]->GetText()) and !is_bool($this->cp["LEVEL_NUMBER"]->GetValue())) 
            $this->cp["LEVEL_NUMBER"]->SetValue($this->LEVEL_NUMBER->GetValue(true));
        if (!strlen($this->cp["LEVEL_NUMBER"]->GetText()) and !is_bool($this->cp["LEVEL_NUMBER"]->GetValue(true))) 
            $this->cp["LEVEL_NUMBER"]->SetText(0);
        if (!is_null($this->cp["P_BILLING_CENTER_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_CENTER_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_CENTER_ID"]->GetValue())) 
            $this->cp["P_BILLING_CENTER_ID"]->SetValue($this->P_BILLING_CENTER_ID->GetValue(true));
        if (!strlen($this->cp["P_BILLING_CENTER_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_CENTER_ID"]->GetValue(true))) 
            $this->cp["P_BILLING_CENTER_ID"]->SetText(0);
        if (!is_null($this->cp["FINANCE_CODE"]->GetValue()) and !strlen($this->cp["FINANCE_CODE"]->GetText()) and !is_bool($this->cp["FINANCE_CODE"]->GetValue())) 
            $this->cp["FINANCE_CODE"]->SetValue($this->FINANCE_CODE->GetValue(true));
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(0);
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue(true))) 
            $this->cp["ZIP_CODE"]->SetText(0);
        if (!is_null($this->cp["P_COUNTRY_ID"]->GetValue()) and !strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue())) 
            $this->cp["P_COUNTRY_ID"]->SetValue($this->P_COUNTRY_ID->GetValue(true));
        if (!strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue(true))) 
            $this->cp["P_COUNTRY_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_ORGANIZATION_ID"]->GetValue()) and !strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue())) 
            $this->cp["P_ORGANIZATION_ID"]->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        if (!strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue(true))) 
            $this->cp["P_ORGANIZATION_ID"]->SetText(0);
        $this->SQL = "UPDATE P_ORGANIZATION SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "ORGANIZATION_NAME='" . $this->SQLValue($this->cp["ORGANIZATION_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "P_COMPANY_ID=" . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "LEVEL_NUMBER=" . $this->SQLValue($this->cp["LEVEL_NUMBER"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_BILLING_CENTER_ID=" . $this->SQLValue($this->cp["P_BILLING_CENTER_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "FINANCE_CODE='" . $this->SQLValue($this->cp["FINANCE_CODE"]->GetDBValue(), ccsText) . "',\n" .
        "PARENT_ID=" . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "ADDRESS_1='" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "',\n" .
        "ADDRESS_2='" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "',\n" .
        "ADDRESS_3='" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "',\n" .
        "P_REGION_ID=" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "ZIP_CODE=" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_COUNTRY_ID=" . $this->SQLValue($this->cp["P_COUNTRY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_ORGANIZATION_ID = " . $this->SQLValue($this->cp["P_ORGANIZATION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @72-AC4758E3
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ORGANIZATION_ID"] = new clsSQLParameter("ctrlP_ORGANIZATION_ID", ccsFloat, "", "", $this->P_ORGANIZATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_ORGANIZATION_ID"]->GetValue()) and !strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue())) 
            $this->cp["P_ORGANIZATION_ID"]->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        if (!strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue(true))) 
            $this->cp["P_ORGANIZATION_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_ORGANIZATION WHERE P_ORGANIZATION_ID = " . $this->SQLValue($this->cp["P_ORGANIZATION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_organization1DataSource Class @72-FCB6E20C

//Initialize Page @1-5B1B1B18
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
$TemplateFileName = "p_organization.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-F09EAA62
include_once("./p_organization_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1B7ABD36
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_ORGANIZATION = & new clsGridP_ORGANIZATION("", $MainPage);
$P_ORGANIZATIONSearch = & new clsRecordP_ORGANIZATIONSearch("", $MainPage);
$p_organization1 = & new clsRecordp_organization1("", $MainPage);
$MainPage->P_ORGANIZATION = & $P_ORGANIZATION;
$MainPage->P_ORGANIZATIONSearch = & $P_ORGANIZATIONSearch;
$MainPage->p_organization1 = & $p_organization1;
$P_ORGANIZATION->Initialize();
$p_organization1->Initialize();

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

//Execute Components @1-A61F37DF
$P_ORGANIZATIONSearch->Operation();
$p_organization1->Operation();
//End Execute Components

//Go to destination page @1-D5E96786
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_ORGANIZATION);
    unset($P_ORGANIZATIONSearch);
    unset($p_organization1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2FBDBADA
$P_ORGANIZATION->Show();
$P_ORGANIZATIONSearch->Show();
$p_organization1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7826D477
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_ORGANIZATION);
unset($P_ORGANIZATIONSearch);
unset($p_organization1);
unset($Tpl);
//End Unload Page


?>
