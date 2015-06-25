<?php
//Include Common Files @1-7A8AD2AD
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_business_area.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_BUSINESS_AREA { //P_BUSINESS_AREA class @2-2F29F60E

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

//Class_Initialize Event @2-F39FEA9E
    function clsGridP_BUSINESS_AREA($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_BUSINESS_AREA";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_BUSINESS_AREA";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_BUSINESS_AREADataSource($this);
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
        $this->BUSINESS_AREA_NAME = & new clsControl(ccsLabel, "BUSINESS_AREA_NAME", "BUSINESS_AREA_NAME", ccsText, "", CCGetRequestParam("BUSINESS_AREA_NAME", ccsGet, NULL), $this);
        $this->IS_BILLING_CENTER = & new clsControl(ccsLabel, "IS_BILLING_CENTER", "IS_BILLING_CENTER", ccsText, "", CCGetRequestParam("IS_BILLING_CENTER", ccsGet, NULL), $this);
        $this->H2H_CODE = & new clsControl(ccsLabel, "H2H_CODE", "H2H_CODE", ccsText, "", CCGetRequestParam("H2H_CODE", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_business_area.php";
        $this->P_BUSINESS_AREA_ID = & new clsControl(ccsHidden, "P_BUSINESS_AREA_ID", "P_BUSINESS_AREA_ID", ccsFloat, "", CCGetRequestParam("P_BUSINESS_AREA_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_BUSINESS_AREA_Insert = & new clsControl(ccsLink, "P_BUSINESS_AREA_Insert", "P_BUSINESS_AREA_Insert", ccsText, "", CCGetRequestParam("P_BUSINESS_AREA_Insert", ccsGet, NULL), $this);
        $this->P_BUSINESS_AREA_Insert->HTML = true;
        $this->P_BUSINESS_AREA_Insert->Page = "p_business_area.php";
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

//Show Method @2-DC452DB0
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
            $this->ControlsVisible["BUSINESS_AREA_NAME"] = $this->BUSINESS_AREA_NAME->Visible;
            $this->ControlsVisible["IS_BILLING_CENTER"] = $this->IS_BILLING_CENTER->Visible;
            $this->ControlsVisible["H2H_CODE"] = $this->H2H_CODE->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_BUSINESS_AREA_ID"] = $this->P_BUSINESS_AREA_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->BUSINESS_AREA_NAME->SetValue($this->DataSource->BUSINESS_AREA_NAME->GetValue());
                $this->IS_BILLING_CENTER->SetValue($this->DataSource->IS_BILLING_CENTER->GetValue());
                $this->H2H_CODE->SetValue($this->DataSource->H2H_CODE->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_BUSINESS_AREA_ID", $this->DataSource->f("P_BUSINESS_AREA_ID"));
                $this->P_BUSINESS_AREA_ID->SetValue($this->DataSource->P_BUSINESS_AREA_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->BUSINESS_AREA_NAME->Show();
                $this->IS_BILLING_CENTER->Show();
                $this->H2H_CODE->Show();
                $this->DLink->Show();
                $this->P_BUSINESS_AREA_ID->Show();
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
        $this->P_BUSINESS_AREA_Insert->Parameters = CCGetQueryString("QueryString", array("P_REGION_LEVEL_ID", "ccsForm"));
        $this->P_BUSINESS_AREA_Insert->Parameters = CCAddParam($this->P_BUSINESS_AREA_Insert->Parameters, "TAMBAH", 1);
        $this->Navigator->Show();
        $this->P_BUSINESS_AREA_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-39639341
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BUSINESS_AREA_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_BILLING_CENTER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->H2H_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BUSINESS_AREA_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_BUSINESS_AREA Class @2-FCB6E20C

class clsP_BUSINESS_AREADataSource extends clsDBConn {  //P_BUSINESS_AREADataSource Class @2-A65AFE4C

//DataSource Variables @2-F65B3591
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $BUSINESS_AREA_NAME;
    var $IS_BILLING_CENTER;
    var $H2H_CODE;
    var $P_BUSINESS_AREA_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-889F225D
    function clsP_BUSINESS_AREADataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_BUSINESS_AREA";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->BUSINESS_AREA_NAME = new clsField("BUSINESS_AREA_NAME", ccsText, "");
        
        $this->IS_BILLING_CENTER = new clsField("IS_BILLING_CENTER", ccsText, "");
        
        $this->H2H_CODE = new clsField("H2H_CODE", ccsText, "");
        
        $this->P_BUSINESS_AREA_ID = new clsField("P_BUSINESS_AREA_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-C6C41109
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "P_BUSINESS_AREA_ID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-BEDC8051
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("3", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "CODE", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "BUSINESS_AREA_NAME", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "H2H_CODE", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->Where = $this->wp->opOR(
             true, $this->wp->opOR(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]);
    }
//End Prepare Method

//Open Method @2-803C14EC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM P_BUSINESS_AREA";
        $this->SQL = "SELECT P_BUSINESS_AREA_ID, CODE, BUSINESS_AREA_NAME, IS_BILLING_CENTER, H2H_CODE \n\n" .
        "FROM P_BUSINESS_AREA {SQL_Where} {SQL_OrderBy}";
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

//SetValues Method @2-81271FB5
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->BUSINESS_AREA_NAME->SetDBValue($this->f("BUSINESS_AREA_NAME"));
        $this->IS_BILLING_CENTER->SetDBValue($this->f("IS_BILLING_CENTER"));
        $this->H2H_CODE->SetDBValue($this->f("H2H_CODE"));
        $this->P_BUSINESS_AREA_ID->SetDBValue(trim($this->f("P_BUSINESS_AREA_ID")));
    }
//End SetValues Method

} //End P_BUSINESS_AREADataSource Class @2-FCB6E20C

class clsRecordP_BUSINESS_AREASearch { //P_BUSINESS_AREASearch Class @3-6ED2122B

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

//Class_Initialize Event @3-BB4C4D3E
    function clsRecordP_BUSINESS_AREASearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BUSINESS_AREASearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BUSINESS_AREASearch";
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

//Operation Method @3-814A0738
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
        $Redirect = "p_business_area.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_business_area.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "FLAG", "p_application_id")));
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

} //End P_BUSINESS_AREASearch Class @3-FCB6E20C

class clsRecordP_BUSINESS_AREA1 { //P_BUSINESS_AREA1 Class @27-D6C78229

//Variables @27-D6FF3E86

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

//Class_Initialize Event @27-B79427A0
    function clsRecordP_BUSINESS_AREA1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BUSINESS_AREA1/Error";
        $this->DataSource = new clsP_BUSINESS_AREA1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BUSINESS_AREA1";
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
            $this->BUSINESS_AREA_NAME = & new clsControl(ccsTextBox, "BUSINESS_AREA_NAME", "BUSINESS AREA NAME", ccsText, "", CCGetRequestParam("BUSINESS_AREA_NAME", $Method, NULL), $this);
            $this->BUSINESS_AREA_NAME->Required = true;
            $this->IS_BILLING_CENTER = & new clsControl(ccsListBox, "IS_BILLING_CENTER", "IS BILLING CENTER", ccsText, "", CCGetRequestParam("IS_BILLING_CENTER", $Method, NULL), $this);
            $this->IS_BILLING_CENTER->DSType = dsListOfValues;
            $this->IS_BILLING_CENTER->Values = array(array("Y", "Y"), array("N", "N"));
            $this->IS_BILLING_CENTER->Required = true;
            $this->OFFICE_ADDRESS = & new clsControl(ccsTextArea, "OFFICE_ADDRESS", "OFFICE ADDRESS", ccsText, "", CCGetRequestParam("OFFICE_ADDRESS", $Method, NULL), $this);
            $this->H2H_CODE = & new clsControl(ccsTextBox, "H2H_CODE", "H2 H CODE", ccsText, "", CCGetRequestParam("H2H_CODE", $Method, NULL), $this);
            $this->H2H_CODE->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "P_BUSINESS_AREA1", "UPDATE_DATE", $this);
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->P_BUSINESS_AREA_ID = & new clsControl(ccsHidden, "P_BUSINESS_AREA_ID", "CODE", ccsText, "", CCGetRequestParam("P_BUSINESS_AREA_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @27-A1301B8D
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_BUSINESS_AREA_ID"] = CCGetFromGet("P_BUSINESS_AREA_ID", NULL);
    }
//End Initialize Method

//Validate Method @27-9CFEB7DA
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->BUSINESS_AREA_NAME->Validate() && $Validation);
        $Validation = ($this->IS_BILLING_CENTER->Validate() && $Validation);
        $Validation = ($this->OFFICE_ADDRESS->Validate() && $Validation);
        $Validation = ($this->H2H_CODE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_BUSINESS_AREA_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BUSINESS_AREA_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_BILLING_CENTER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OFFICE_ADDRESS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->H2H_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BUSINESS_AREA_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @27-7DB093F9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->BUSINESS_AREA_NAME->Errors->Count());
        $errors = ($errors || $this->IS_BILLING_CENTER->Errors->Count());
        $errors = ($errors || $this->OFFICE_ADDRESS->Errors->Count());
        $errors = ($errors || $this->H2H_CODE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_BUSINESS_AREA_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @27-ED598703
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

//Operation Method @27-BD7E7B45
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
        if($this->PressedButton == "Button_Update") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "P_APPLICATION_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
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

//InsertRow Method @27-97D8F13A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->BUSINESS_AREA_NAME->SetValue($this->BUSINESS_AREA_NAME->GetValue(true));
        $this->DataSource->IS_BILLING_CENTER->SetValue($this->IS_BILLING_CENTER->GetValue(true));
        $this->DataSource->OFFICE_ADDRESS->SetValue($this->OFFICE_ADDRESS->GetValue(true));
        $this->DataSource->H2H_CODE->SetValue($this->H2H_CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @27-6B22C5D2
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->BUSINESS_AREA_NAME->SetValue($this->BUSINESS_AREA_NAME->GetValue(true));
        $this->DataSource->IS_BILLING_CENTER->SetValue($this->IS_BILLING_CENTER->GetValue(true));
        $this->DataSource->OFFICE_ADDRESS->SetValue($this->OFFICE_ADDRESS->GetValue(true));
        $this->DataSource->H2H_CODE->SetValue($this->H2H_CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @27-366FA3F0
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_BUSINESS_AREA_ID->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @27-2686F194
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

        $this->IS_BILLING_CENTER->Prepare();

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
                    $this->BUSINESS_AREA_NAME->SetValue($this->DataSource->BUSINESS_AREA_NAME->GetValue());
                    $this->IS_BILLING_CENTER->SetValue($this->DataSource->IS_BILLING_CENTER->GetValue());
                    $this->OFFICE_ADDRESS->SetValue($this->DataSource->OFFICE_ADDRESS->GetValue());
                    $this->H2H_CODE->SetValue($this->DataSource->H2H_CODE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_BUSINESS_AREA_ID->SetValue($this->DataSource->P_BUSINESS_AREA_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BUSINESS_AREA_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_BILLING_CENTER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OFFICE_ADDRESS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->H2H_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BUSINESS_AREA_ID->Errors->ToString());
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

        $this->CODE->Show();
        $this->BUSINESS_AREA_NAME->Show();
        $this->IS_BILLING_CENTER->Show();
        $this->OFFICE_ADDRESS->Show();
        $this->H2H_CODE->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->UPDATE_BY->Show();
        $this->P_BUSINESS_AREA_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_BUSINESS_AREA1 Class @27-FCB6E20C

class clsP_BUSINESS_AREA1DataSource extends clsDBConn {  //P_BUSINESS_AREA1DataSource Class @27-393B1830

//DataSource Variables @27-1C1CF098
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
    var $BUSINESS_AREA_NAME;
    var $IS_BILLING_CENTER;
    var $OFFICE_ADDRESS;
    var $H2H_CODE;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $P_BUSINESS_AREA_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @27-70BC10F6
    function clsP_BUSINESS_AREA1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_BUSINESS_AREA1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->BUSINESS_AREA_NAME = new clsField("BUSINESS_AREA_NAME", ccsText, "");
        
        $this->IS_BILLING_CENTER = new clsField("IS_BILLING_CENTER", ccsText, "");
        
        $this->OFFICE_ADDRESS = new clsField("OFFICE_ADDRESS", ccsText, "");
        
        $this->H2H_CODE = new clsField("H2H_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_BUSINESS_AREA_ID = new clsField("P_BUSINESS_AREA_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @27-BC1BC84F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->Parameters["urlP_BUSINESS_AREA_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @27-86E3D906
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT *FROM P_BUSINESS_AREA\n" .
        "WHERE P_BUSINESS_AREA_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @27-6E00B724
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->BUSINESS_AREA_NAME->SetDBValue($this->f("BUSINESS_AREA_NAME"));
        $this->IS_BILLING_CENTER->SetDBValue($this->f("IS_BILLING_CENTER"));
        $this->OFFICE_ADDRESS->SetDBValue($this->f("OFFICE_ADDRESS"));
        $this->H2H_CODE->SetDBValue($this->f("H2H_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_BUSINESS_AREA_ID->SetDBValue($this->f("P_BUSINESS_AREA_ID"));
    }
//End SetValues Method

//Insert Method @27-E5B1C58C
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUSINESS_AREA_NAME"] = new clsSQLParameter("ctrlBUSINESS_AREA_NAME", ccsText, "", "", $this->BUSINESS_AREA_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BILLING_CENTER"] = new clsSQLParameter("ctrlIS_BILLING_CENTER", ccsText, "", "", $this->IS_BILLING_CENTER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OFFICE_ADDRESS"] = new clsSQLParameter("ctrlOFFICE_ADDRESS", ccsText, "", "", $this->OFFICE_ADDRESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["H2H_CODE"] = new clsSQLParameter("ctrlH2H_CODE", ccsText, "", "", $this->H2H_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["BUSINESS_AREA_NAME"]->GetValue()) and !strlen($this->cp["BUSINESS_AREA_NAME"]->GetText()) and !is_bool($this->cp["BUSINESS_AREA_NAME"]->GetValue())) 
            $this->cp["BUSINESS_AREA_NAME"]->SetValue($this->BUSINESS_AREA_NAME->GetValue(true));
        if (!is_null($this->cp["IS_BILLING_CENTER"]->GetValue()) and !strlen($this->cp["IS_BILLING_CENTER"]->GetText()) and !is_bool($this->cp["IS_BILLING_CENTER"]->GetValue())) 
            $this->cp["IS_BILLING_CENTER"]->SetValue($this->IS_BILLING_CENTER->GetValue(true));
        if (!is_null($this->cp["OFFICE_ADDRESS"]->GetValue()) and !strlen($this->cp["OFFICE_ADDRESS"]->GetText()) and !is_bool($this->cp["OFFICE_ADDRESS"]->GetValue())) 
            $this->cp["OFFICE_ADDRESS"]->SetValue($this->OFFICE_ADDRESS->GetValue(true));
        if (!is_null($this->cp["H2H_CODE"]->GetValue()) and !strlen($this->cp["H2H_CODE"]->GetText()) and !is_bool($this->cp["H2H_CODE"]->GetValue())) 
            $this->cp["H2H_CODE"]->SetValue($this->H2H_CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_BUSINESS_AREA (P_BUSINESS_AREA_ID, CODE, BUSINESS_AREA_NAME, IS_BILLING_CENTER, OFFICE_ADDRESS, H2H_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES (GENERATE_ID('BILLDB','P_BUSINESS_AREA','P_BUSINESS_AREA_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["BUSINESS_AREA_NAME"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["IS_BILLING_CENTER"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["OFFICE_ADDRESS"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["H2H_CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',SYSDATE,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @27-E7141309
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BUSINESS_AREA_NAME"] = new clsSQLParameter("ctrlBUSINESS_AREA_NAME", ccsText, "", "", $this->BUSINESS_AREA_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_BILLING_CENTER"] = new clsSQLParameter("ctrlIS_BILLING_CENTER", ccsText, "", "", $this->IS_BILLING_CENTER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OFFICE_ADDRESS"] = new clsSQLParameter("ctrlOFFICE_ADDRESS", ccsText, "", "", $this->OFFICE_ADDRESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["H2H_CODE"] = new clsSQLParameter("ctrlH2H_CODE", ccsText, "", "", $this->H2H_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue(true))) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetText(0);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["BUSINESS_AREA_NAME"]->GetValue()) and !strlen($this->cp["BUSINESS_AREA_NAME"]->GetText()) and !is_bool($this->cp["BUSINESS_AREA_NAME"]->GetValue())) 
            $this->cp["BUSINESS_AREA_NAME"]->SetValue($this->BUSINESS_AREA_NAME->GetValue(true));
        if (!is_null($this->cp["IS_BILLING_CENTER"]->GetValue()) and !strlen($this->cp["IS_BILLING_CENTER"]->GetText()) and !is_bool($this->cp["IS_BILLING_CENTER"]->GetValue())) 
            $this->cp["IS_BILLING_CENTER"]->SetValue($this->IS_BILLING_CENTER->GetValue(true));
        if (!is_null($this->cp["OFFICE_ADDRESS"]->GetValue()) and !strlen($this->cp["OFFICE_ADDRESS"]->GetText()) and !is_bool($this->cp["OFFICE_ADDRESS"]->GetValue())) 
            $this->cp["OFFICE_ADDRESS"]->SetValue($this->OFFICE_ADDRESS->GetValue(true));
        if (!is_null($this->cp["H2H_CODE"]->GetValue()) and !strlen($this->cp["H2H_CODE"]->GetText()) and !is_bool($this->cp["H2H_CODE"]->GetValue())) 
            $this->cp["H2H_CODE"]->SetValue($this->H2H_CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "UPDATE P_BUSINESS_AREA SET\n" .
        "CODE = '" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "BUSINESS_AREA_NAME = '" . $this->SQLValue($this->cp["BUSINESS_AREA_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "IS_BILLING_CENTER = '" . $this->SQLValue($this->cp["IS_BILLING_CENTER"]->GetDBValue(), ccsText) . "',\n" .
        "OFFICE_ADDRESS = '" . $this->SQLValue($this->cp["OFFICE_ADDRESS"]->GetDBValue(), ccsText) . "',\n" .
        "H2H_CODE = '" . $this->SQLValue($this->cp["H2H_CODE"]->GetDBValue(), ccsText) . "',\n" .
        "DESCRIPTION = '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "UPDATE_DATE = SYSDATE,\n" .
        "UPDATE_BY = '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE P_BUSINESS_AREA_ID=" . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @27-CCEDA2F0
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BUSINESS_AREA_ID"] = new clsSQLParameter("ctrlP_BUSINESS_AREA_ID", ccsFloat, "", "", $this->P_BUSINESS_AREA_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_BUSINESS_AREA_ID"]->GetValue()) and !strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue())) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetValue($this->P_BUSINESS_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_BUSINESS_AREA_ID"]->GetText()) and !is_bool($this->cp["P_BUSINESS_AREA_ID"]->GetValue(true))) 
            $this->cp["P_BUSINESS_AREA_ID"]->SetText(0);
        $this->SQL = "DELETE P_BUSINESS_AREA\n" .
        "WHERE P_BUSINESS_AREA_ID = " . $this->SQLValue($this->cp["P_BUSINESS_AREA_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_BUSINESS_AREA1DataSource Class @27-FCB6E20C

//Initialize Page @1-0DC212A3
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
$TemplateFileName = "p_business_area.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-5F71FD3F
include_once("./p_business_area_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-965949F1
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_BUSINESS_AREA = & new clsGridP_BUSINESS_AREA("", $MainPage);
$P_BUSINESS_AREASearch = & new clsRecordP_BUSINESS_AREASearch("", $MainPage);
$P_BUSINESS_AREA1 = & new clsRecordP_BUSINESS_AREA1("", $MainPage);
$MainPage->P_BUSINESS_AREA = & $P_BUSINESS_AREA;
$MainPage->P_BUSINESS_AREASearch = & $P_BUSINESS_AREASearch;
$MainPage->P_BUSINESS_AREA1 = & $P_BUSINESS_AREA1;
$P_BUSINESS_AREA->Initialize();
$P_BUSINESS_AREA1->Initialize();

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

//Execute Components @1-F651AA1C
$P_BUSINESS_AREASearch->Operation();
$P_BUSINESS_AREA1->Operation();
//End Execute Components

//Go to destination page @1-F09BF70E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_BUSINESS_AREA);
    unset($P_BUSINESS_AREASearch);
    unset($P_BUSINESS_AREA1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-BBDD2E4D
$P_BUSINESS_AREA->Show();
$P_BUSINESS_AREASearch->Show();
$P_BUSINESS_AREA1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2D8D5120
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_BUSINESS_AREA);
unset($P_BUSINESS_AREASearch);
unset($P_BUSINESS_AREA1);
unset($Tpl);
//End Unload Page


?>
