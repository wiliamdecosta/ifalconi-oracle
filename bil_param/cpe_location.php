<?php
//Include Common Files @1-91C8BDB5
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "cpe_location.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridCPE_LOCATION { //CPE_LOCATION class @2-567C1E55

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

//Class_Initialize Event @2-852D6810
    function clsGridCPE_LOCATION($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "CPE_LOCATION";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid CPE_LOCATION";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsCPE_LOCATIONDataSource($this);
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
        $this->P_CPE_LOCATION_NAME = & new clsControl(ccsLabel, "P_CPE_LOCATION_NAME", "P_CPE_LOCATION_NAME", ccsText, "", CCGetRequestParam("P_CPE_LOCATION_NAME", ccsGet, NULL), $this);
        $this->REGION_NAME = & new clsControl(ccsLabel, "REGION_NAME", "REGION_NAME", ccsText, "", CCGetRequestParam("REGION_NAME", ccsGet, NULL), $this);
        $this->COMPANY_NAME = & new clsControl(ccsLabel, "COMPANY_NAME", "COMPANY_NAME", ccsText, "", CCGetRequestParam("COMPANY_NAME", ccsGet, NULL), $this);
        $this->ZIP_CODE = & new clsControl(ccsLabel, "ZIP_CODE", "ZIP_CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->CPE_LOCATION_ID = & new clsControl(ccsHidden, "CPE_LOCATION_ID", "CPE_LOCATION_ID", ccsFloat, "", CCGetRequestParam("CPE_LOCATION_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "cpe_location.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_APPL_Insert = & new clsControl(ccsLink, "P_APPL_Insert", "P_APPL_Insert", ccsText, "", CCGetRequestParam("P_APPL_Insert", ccsGet, NULL), $this);
        $this->P_APPL_Insert->HTML = true;
        $this->P_APPL_Insert->Page = "cpe_location.php";
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

//Show Method @2-C46DE66A
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
            $this->ControlsVisible["P_CPE_LOCATION_NAME"] = $this->P_CPE_LOCATION_NAME->Visible;
            $this->ControlsVisible["REGION_NAME"] = $this->REGION_NAME->Visible;
            $this->ControlsVisible["COMPANY_NAME"] = $this->COMPANY_NAME->Visible;
            $this->ControlsVisible["ZIP_CODE"] = $this->ZIP_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["CPE_LOCATION_ID"] = $this->CPE_LOCATION_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->P_CPE_LOCATION_NAME->SetValue($this->DataSource->P_CPE_LOCATION_NAME->GetValue());
                $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                $this->COMPANY_NAME->SetValue($this->DataSource->COMPANY_NAME->GetValue());
                $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->CPE_LOCATION_ID->SetValue($this->DataSource->CPE_LOCATION_ID->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CPE_LOCATION_ID", $this->DataSource->f("CPE_LOCATION_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->P_CPE_LOCATION_NAME->Show();
                $this->REGION_NAME->Show();
                $this->COMPANY_NAME->Show();
                $this->ZIP_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->CPE_LOCATION_ID->Show();
                $this->DLink->Show();
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
        $this->P_APPL_Insert->Parameters = CCGetQueryString("QueryString", array("CPE_LOCATION_ID", "ccsForm"));
        $this->P_APPL_Insert->Parameters = CCAddParam($this->P_APPL_Insert->Parameters, "TAMBAH", 1);
        $this->Navigator->Show();
        $this->P_APPL_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-8E0F5102
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CPE_LOCATION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REGION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->COMPANY_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ZIP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CPE_LOCATION_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End CPE_LOCATION Class @2-FCB6E20C

class clsCPE_LOCATIONDataSource extends clsDBConn {  //CPE_LOCATIONDataSource Class @2-1B737548

//DataSource Variables @2-7A3D1B36
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $P_CPE_LOCATION_NAME;
    var $REGION_NAME;
    var $COMPANY_NAME;
    var $ZIP_CODE;
    var $DESCRIPTION;
    var $CPE_LOCATION_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E431C460
    function clsCPE_LOCATIONDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid CPE_LOCATION";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_CPE_LOCATION_NAME = new clsField("P_CPE_LOCATION_NAME", ccsText, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->COMPANY_NAME = new clsField("COMPANY_NAME", ccsText, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CPE_LOCATION_ID = new clsField("CPE_LOCATION_ID", ccsFloat, "");
        

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

//Open Method @2-D8AB7E09
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT A.*,B.CODE AS P_CPE_LOCATION_NAME,\n" .
        "C.REGION_NAME AS REGION_NAME,\n" .
        "D.CODE AS COMPANY_NAME FROM CPE_LOCATION A , P_CPE_LOCATION_TYPE B , P_REGION C,P_COMPANY D\n" .
        "WHERE A.P_CPE_LOCATION_TYPE_ID = B.P_CPE_LOCATION_TYPE_ID\n" .
        "AND A.P_REGION_ID = C.P_REGION_ID\n" .
        "AND A.P_COMPANY_ID = D.P_COMPANY_ID\n" .
        "AND UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT A.*,B.CODE AS P_CPE_LOCATION_NAME,\n" .
        "C.REGION_NAME AS REGION_NAME,\n" .
        "D.CODE AS COMPANY_NAME FROM CPE_LOCATION A , P_CPE_LOCATION_TYPE B , P_REGION C,P_COMPANY D\n" .
        "WHERE A.P_CPE_LOCATION_TYPE_ID = B.P_CPE_LOCATION_TYPE_ID\n" .
        "AND A.P_REGION_ID = C.P_REGION_ID\n" .
        "AND A.P_COMPANY_ID = D.P_COMPANY_ID\n" .
        "AND UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-9AAE1971
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_CPE_LOCATION_NAME->SetDBValue($this->f("P_CPE_LOCATION_NAME"));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->COMPANY_NAME->SetDBValue($this->f("COMPANY_NAME"));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CPE_LOCATION_ID->SetDBValue(trim($this->f("CPE_LOCATION_ID")));
    }
//End SetValues Method

} //End CPE_LOCATIONDataSource Class @2-FCB6E20C

class clsRecordCPE_LOCATIONSearch { //CPE_LOCATIONSearch Class @3-C54B13EF

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

//Class_Initialize Event @3-B9D2174B
    function clsRecordCPE_LOCATIONSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record CPE_LOCATIONSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "CPE_LOCATIONSearch";
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

//Operation Method @3-994C3AB6
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
        $Redirect = "cpe_location.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "cpe_location.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "FLAG", "p_application_id")));
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

} //End CPE_LOCATIONSearch Class @3-FCB6E20C

class clsRecordCPE_LOCATION1 { //CPE_LOCATION1 Class @31-7B13E518

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

//Class_Initialize Event @31-CBC8BB55
    function clsRecordCPE_LOCATION1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record CPE_LOCATION1/Error";
        $this->DataSource = new clsCPE_LOCATION1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "CPE_LOCATION1";
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
            $this->ADDRESS_1 = & new clsControl(ccsTextArea, "ADDRESS_1", "ADDRESS 1", ccsText, "", CCGetRequestParam("ADDRESS_1", $Method, NULL), $this);
            $this->ADDRESS_1->Required = true;
            $this->ADDRESS_2 = & new clsControl(ccsTextArea, "ADDRESS_2", "ADDRESS 2", ccsText, "", CCGetRequestParam("ADDRESS_2", $Method, NULL), $this);
            $this->ADDRESS_3 = & new clsControl(ccsTextArea, "ADDRESS_3", "ADDRESS 3", ccsText, "", CCGetRequestParam("ADDRESS_3", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P REGION ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            $this->P_REGION_ID->Required = true;
            $this->P_COMPANY_ID = & new clsControl(ccsHidden, "P_COMPANY_ID", "P COMPANY ID", ccsFloat, "", CCGetRequestParam("P_COMPANY_ID", $Method, NULL), $this);
            $this->ZIP_CODE = & new clsControl(ccsTextBox, "ZIP_CODE", "ZIP CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "CPE_LOCATION1", "UPDATE_DATE", $this);
            $this->CPE_LOCATION_ID = & new clsControl(ccsHidden, "CPE_LOCATION_ID", "CODE", ccsText, "", CCGetRequestParam("CPE_LOCATION_ID", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_CPE_LOCATION_TYPE_ID = & new clsControl(ccsHidden, "P_CPE_LOCATION_TYPE_ID", "P CPE LOCATION TYPE ID", ccsFloat, "", CCGetRequestParam("P_CPE_LOCATION_TYPE_ID", $Method, NULL), $this);
            $this->P_CPE_LOCATION_TYPE_ID->Required = true;
            $this->LOC_NAME = & new clsControl(ccsTextBox, "LOC_NAME", "P CPE LOCATION TYPE ID", ccsText, "", CCGetRequestParam("LOC_NAME", $Method, NULL), $this);
            $this->P_REGION_NAME = & new clsControl(ccsTextBox, "P_REGION_NAME", "P REGION ID", ccsText, "", CCGetRequestParam("P_REGION_NAME", $Method, NULL), $this);
            $this->P_COMPANY_NAME = & new clsControl(ccsTextBox, "P_COMPANY_NAME", "P COMPANY ID", ccsText, "", CCGetRequestParam("P_COMPANY_NAME", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-430F5C18
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCPE_LOCATION_ID"] = CCGetFromGet("CPE_LOCATION_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-8296EFCF
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->ADDRESS_1->Validate() && $Validation);
        $Validation = ($this->ADDRESS_2->Validate() && $Validation);
        $Validation = ($this->ADDRESS_3->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_ID->Validate() && $Validation);
        $Validation = ($this->ZIP_CODE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->CPE_LOCATION_ID->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_CPE_LOCATION_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->LOC_NAME->Validate() && $Validation);
        $Validation = ($this->P_REGION_NAME->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ZIP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CPE_LOCATION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CPE_LOCATION_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LOC_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-392EFF9E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->ADDRESS_1->Errors->Count());
        $errors = ($errors || $this->ADDRESS_2->Errors->Count());
        $errors = ($errors || $this->ADDRESS_3->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_ID->Errors->Count());
        $errors = ($errors || $this->ZIP_CODE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->CPE_LOCATION_ID->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_CPE_LOCATION_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->LOC_NAME->Errors->Count());
        $errors = ($errors || $this->P_REGION_NAME->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_NAME->Errors->Count());
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

//Operation Method @31-BD7E7B45
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

//InsertRow Method @31-18F92F1C
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_CPE_LOCATION_TYPE_ID->SetValue($this->P_CPE_LOCATION_TYPE_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-899AD749
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_CPE_LOCATION_TYPE_ID->SetValue($this->P_CPE_LOCATION_TYPE_ID->GetValue(true));
        $this->DataSource->CPE_LOCATION_ID->SetValue($this->CPE_LOCATION_ID->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-C88E62EA
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->CPE_LOCATION_ID->SetValue($this->CPE_LOCATION_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-ACBAAE02
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
                    $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                    $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                    $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                    $this->P_COMPANY_ID->SetValue($this->DataSource->P_COMPANY_ID->GetValue());
                    $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->CPE_LOCATION_ID->SetValue($this->DataSource->CPE_LOCATION_ID->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_CPE_LOCATION_TYPE_ID->SetValue($this->DataSource->P_CPE_LOCATION_TYPE_ID->GetValue());
                    $this->LOC_NAME->SetValue($this->DataSource->LOC_NAME->GetValue());
                    $this->P_REGION_NAME->SetValue($this->DataSource->P_REGION_NAME->GetValue());
                    $this->P_COMPANY_NAME->SetValue($this->DataSource->P_COMPANY_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ZIP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CPE_LOCATION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CPE_LOCATION_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LOC_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_NAME->Errors->ToString());
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
        $this->ADDRESS_1->Show();
        $this->ADDRESS_2->Show();
        $this->ADDRESS_3->Show();
        $this->P_REGION_ID->Show();
        $this->P_COMPANY_ID->Show();
        $this->ZIP_CODE->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->CPE_LOCATION_ID->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_CPE_LOCATION_TYPE_ID->Show();
        $this->LOC_NAME->Show();
        $this->P_REGION_NAME->Show();
        $this->P_COMPANY_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End CPE_LOCATION1 Class @31-FCB6E20C

class clsCPE_LOCATION1DataSource extends clsDBConn {  //CPE_LOCATION1DataSource Class @31-3EEBF5A2

//DataSource Variables @31-99017780
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
    var $ADDRESS_1;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $P_REGION_ID;
    var $P_COMPANY_ID;
    var $ZIP_CODE;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $CPE_LOCATION_ID;
    var $UPDATE_BY;
    var $P_CPE_LOCATION_TYPE_ID;
    var $LOC_NAME;
    var $P_REGION_NAME;
    var $P_COMPANY_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-56AD845E
    function clsCPE_LOCATION1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record CPE_LOCATION1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->P_COMPANY_ID = new clsField("P_COMPANY_ID", ccsFloat, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->CPE_LOCATION_ID = new clsField("CPE_LOCATION_ID", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_CPE_LOCATION_TYPE_ID = new clsField("P_CPE_LOCATION_TYPE_ID", ccsFloat, "");
        
        $this->LOC_NAME = new clsField("LOC_NAME", ccsText, "");
        
        $this->P_REGION_NAME = new clsField("P_REGION_NAME", ccsText, "");
        
        $this->P_COMPANY_NAME = new clsField("P_COMPANY_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-71E95FD2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCPE_LOCATION_ID", ccsFloat, "", "", $this->Parameters["urlCPE_LOCATION_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @31-44F3C7EB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT A.*,B.CODE AS P_CPE_LOCATION_NAME,\n" .
        "C.REGION_NAME AS REGION_NAME,\n" .
        "D.CODE AS COMPANY_NAME FROM CPE_LOCATION A , P_CPE_LOCATION_TYPE B , P_REGION C,P_COMPANY D\n" .
        "WHERE A.P_CPE_LOCATION_TYPE_ID = B.P_CPE_LOCATION_TYPE_ID\n" .
        "AND A.P_REGION_ID = C.P_REGION_ID\n" .
        "AND A.P_COMPANY_ID = D.P_COMPANY_ID\n" .
        "AND A.CPE_LOCATION_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-CDF667BE
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->P_COMPANY_ID->SetDBValue(trim($this->f("P_COMPANY_ID")));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->CPE_LOCATION_ID->SetDBValue($this->f("CPE_LOCATION_ID"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_CPE_LOCATION_TYPE_ID->SetDBValue(trim($this->f("P_CPE_LOCATION_TYPE_ID")));
        $this->LOC_NAME->SetDBValue($this->f("P_CPE_LOCATION_NAME"));
        $this->P_REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->P_COMPANY_NAME->SetDBValue($this->f("COMPANY_NAME"));
    }
//End SetValues Method

//Insert Method @31-BC942B39
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CPE_LOCATION_TYPE_ID"] = new clsSQLParameter("ctrlP_CPE_LOCATION_TYPE_ID", ccsFloat, "", "", $this->P_CPE_LOCATION_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue())) 
            $this->cp["P_CPE_LOCATION_TYPE_ID"]->SetValue($this->P_CPE_LOCATION_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_CPE_LOCATION_TYPE_ID"]->SetText(0);
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
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue(true))) 
            $this->cp["ZIP_CODE"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO CPE_LOCATION (CPE_LOCATION_ID, CODE, P_CPE_LOCATION_TYPE_ID, ADDRESS_1, ADDRESS_2, ADDRESS_3, P_REGION_ID, P_COMPANY_ID, ZIP_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)VALUES\n" .
        "(GENERATE_ID('BILLDB','CPE_LOCATION','CPE_LOCATION_ID'),UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')," . $this->SQLValue($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',SYSDATE,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-7F11DEA2
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CPE_LOCATION_TYPE_ID"] = new clsSQLParameter("ctrlP_CPE_LOCATION_TYPE_ID", ccsFloat, "", "", $this->P_CPE_LOCATION_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CPE_LOCATION_ID"] = new clsSQLParameter("ctrlCPE_LOCATION_ID", ccsFloat, "", "", $this->CPE_LOCATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsText, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue())) 
            $this->cp["P_CPE_LOCATION_TYPE_ID"]->SetValue($this->P_CPE_LOCATION_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_CPE_LOCATION_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["CPE_LOCATION_ID"]->GetValue()) and !strlen($this->cp["CPE_LOCATION_ID"]->GetText()) and !is_bool($this->cp["CPE_LOCATION_ID"]->GetValue())) 
            $this->cp["CPE_LOCATION_ID"]->SetValue($this->CPE_LOCATION_ID->GetValue(true));
        if (!strlen($this->cp["CPE_LOCATION_ID"]->GetText()) and !is_bool($this->cp["CPE_LOCATION_ID"]->GetValue(true))) 
            $this->cp["CPE_LOCATION_ID"]->SetText(0);
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "UPDATE CPE_LOCATION SET\n" .
        "CODE = UPPER('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'),\n" .
        "P_CPE_LOCATION_TYPE_ID = " . $this->SQLValue($this->cp["P_CPE_LOCATION_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_REGION_ID = " . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_COMPANY_ID = " . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "ADDRESS_1 = '" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "',\n" .
        "ADDRESS_2 = '" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "',\n" .
        "ADDRESS_3 = '" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "',\n" .
        "ZIP_CODE = " . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsText) . ",\n" .
        "DESCRIPTION = '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "UPDATE_DATE = SYSDATE,\n" .
        "UPDATE_BY = '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE CPE_LOCATION_ID = " . $this->SQLValue($this->cp["CPE_LOCATION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-59094E70
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CPE_LOCATION_ID"] = new clsSQLParameter("ctrlCPE_LOCATION_ID", ccsFloat, "", "", $this->CPE_LOCATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CPE_LOCATION_ID"]->GetValue()) and !strlen($this->cp["CPE_LOCATION_ID"]->GetText()) and !is_bool($this->cp["CPE_LOCATION_ID"]->GetValue())) 
            $this->cp["CPE_LOCATION_ID"]->SetValue($this->CPE_LOCATION_ID->GetValue(true));
        if (!strlen($this->cp["CPE_LOCATION_ID"]->GetText()) and !is_bool($this->cp["CPE_LOCATION_ID"]->GetValue(true))) 
            $this->cp["CPE_LOCATION_ID"]->SetText(0);
        $this->SQL = "DELETE CPE_LOCATION WHERE CPE_LOCATION_ID = " . $this->SQLValue($this->cp["CPE_LOCATION_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End CPE_LOCATION1DataSource Class @31-FCB6E20C

//Initialize Page @1-100742AE
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
$TemplateFileName = "cpe_location.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-913E602A
include_once("./cpe_location_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-74F7E3D0
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$CPE_LOCATION = & new clsGridCPE_LOCATION("", $MainPage);
$CPE_LOCATIONSearch = & new clsRecordCPE_LOCATIONSearch("", $MainPage);
$CPE_LOCATION1 = & new clsRecordCPE_LOCATION1("", $MainPage);
$MainPage->CPE_LOCATION = & $CPE_LOCATION;
$MainPage->CPE_LOCATIONSearch = & $CPE_LOCATIONSearch;
$MainPage->CPE_LOCATION1 = & $CPE_LOCATION1;
$CPE_LOCATION->Initialize();
$CPE_LOCATION1->Initialize();

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

//Execute Components @1-DA3F7188
$CPE_LOCATIONSearch->Operation();
$CPE_LOCATION1->Operation();
//End Execute Components

//Go to destination page @1-00FAF2EB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($CPE_LOCATION);
    unset($CPE_LOCATIONSearch);
    unset($CPE_LOCATION1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-03799A8A
$CPE_LOCATION->Show();
$CPE_LOCATIONSearch->Show();
$CPE_LOCATION1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D73D6566
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($CPE_LOCATION);
unset($CPE_LOCATIONSearch);
unset($CPE_LOCATION1);
unset($Tpl);
//End Unload Page


?>
