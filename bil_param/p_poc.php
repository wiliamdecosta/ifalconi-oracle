<?php
//Include Common Files @1-39F1BDEB
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_poc.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_POC { //P_POC class @2-6BE779BA

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

//Class_Initialize Event @2-49F9E5F5
    function clsGridP_POC($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_POC";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_POC";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_POCDataSource($this);
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
        $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsLabel, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", ccsGet, NULL), $this);
        $this->P_COVERAGE_AREA_NAME = & new clsControl(ccsLabel, "P_COVERAGE_AREA_NAME", "P_COVERAGE_AREA_NAME", ccsText, "", CCGetRequestParam("P_COVERAGE_AREA_NAME", ccsGet, NULL), $this);
        $this->P_ACCESS_CODE_NAME = & new clsControl(ccsLabel, "P_ACCESS_CODE_NAME", "P_ACCESS_CODE_NAME", ccsText, "", CCGetRequestParam("P_ACCESS_CODE_NAME", ccsGet, NULL), $this);
        $this->P_COMPANY_NAME = & new clsControl(ccsLabel, "P_COMPANY_NAME", "P_COMPANY_NAME", ccsText, "", CCGetRequestParam("P_COMPANY_NAME", ccsGet, NULL), $this);
        $this->P_ORGANIZATION_NAME = & new clsControl(ccsLabel, "P_ORGANIZATION_NAME", "P_ORGANIZATION_NAME", ccsText, "", CCGetRequestParam("P_ORGANIZATION_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_poc.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_poc.php";
        $this->P_POC_ID = & new clsControl(ccsHidden, "P_POC_ID", "P_POC_ID", ccsFloat, "", CCGetRequestParam("P_POC_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_POC_Insert = & new clsControl(ccsLink, "P_POC_Insert", "P_POC_Insert", ccsText, "", CCGetRequestParam("P_POC_Insert", ccsGet, NULL), $this);
        $this->P_POC_Insert->Page = "p_poc.php";
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

//Show Method @2-C0FF209E
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
            $this->ControlsVisible["P_SERVICE_TYPE_NAME"] = $this->P_SERVICE_TYPE_NAME->Visible;
            $this->ControlsVisible["P_COVERAGE_AREA_NAME"] = $this->P_COVERAGE_AREA_NAME->Visible;
            $this->ControlsVisible["P_ACCESS_CODE_NAME"] = $this->P_ACCESS_CODE_NAME->Visible;
            $this->ControlsVisible["P_COMPANY_NAME"] = $this->P_COMPANY_NAME->Visible;
            $this->ControlsVisible["P_ORGANIZATION_NAME"] = $this->P_ORGANIZATION_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_POC_ID"] = $this->P_POC_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                $this->P_COVERAGE_AREA_NAME->SetValue($this->DataSource->P_COVERAGE_AREA_NAME->GetValue());
                $this->P_ACCESS_CODE_NAME->SetValue($this->DataSource->P_ACCESS_CODE_NAME->GetValue());
                $this->P_COMPANY_NAME->SetValue($this->DataSource->P_COMPANY_NAME->GetValue());
                $this->P_ORGANIZATION_NAME->SetValue($this->DataSource->P_ORGANIZATION_NAME->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_POC_ID", $this->DataSource->f("P_POC_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_POC_ID", $this->DataSource->f("P_POC_ID"));
                $this->P_POC_ID->SetValue($this->DataSource->P_POC_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->P_SERVICE_TYPE_NAME->Show();
                $this->P_COVERAGE_AREA_NAME->Show();
                $this->P_ACCESS_CODE_NAME->Show();
                $this->P_COMPANY_NAME->Show();
                $this->P_ORGANIZATION_NAME->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_POC_ID->Show();
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
        $this->P_POC_Insert->Parameters = CCGetQueryString("QueryString", array("P_POC_ID", "ccsForm"));
        $this->P_POC_Insert->Parameters = CCAddParam($this->P_POC_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_POC_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-1D1B6BC0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_COVERAGE_AREA_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ACCESS_CODE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_COMPANY_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ORGANIZATION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_POC_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_POC Class @2-FCB6E20C

class clsP_POCDataSource extends clsDBConn {  //P_POCDataSource Class @2-9F4F60D0

//DataSource Variables @2-32B25D8B
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $P_SERVICE_TYPE_NAME;
    var $P_COVERAGE_AREA_NAME;
    var $P_ACCESS_CODE_NAME;
    var $P_COMPANY_NAME;
    var $P_ORGANIZATION_NAME;
    var $DLink;
    var $ADLink;
    var $P_POC_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E569AEEF
    function clsP_POCDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_POC";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_COVERAGE_AREA_NAME = new clsField("P_COVERAGE_AREA_NAME", ccsText, "");
        
        $this->P_ACCESS_CODE_NAME = new clsField("P_ACCESS_CODE_NAME", ccsText, "");
        
        $this->P_COMPANY_NAME = new clsField("P_COMPANY_NAME", ccsText, "");
        
        $this->P_ORGANIZATION_NAME = new clsField("P_ORGANIZATION_NAME", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_POC_ID = new clsField("P_POC_ID", ccsFloat, "");
        

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

//Open Method @2-1A15E028
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.* ,\n" .
        "b.code as p_switch_coordinate_name,\n" .
        "c.code as p_service_type_name,\n" .
        "d.code as p_city_coordinate_name,\n" .
        "e.code as p_coverage_area_name,\n" .
        "f.code as p_access_code_name,\n" .
        "g.code as p_trunk_name,\n" .
        "h.code as p_company_name,\n" .
        "i.code as p_organization_name\n" .
        "from p_poc a,\n" .
        "p_switch_coordinate b,\n" .
        "p_service_type c,\n" .
        "p_city_coordinate d,\n" .
        "p_coverage_area e,\n" .
        "p_access_code f,\n" .
        "p_trunk g,\n" .
        "p_company h,\n" .
        "p_organization i\n" .
        "where\n" .
        "a.p_switch_coordinate_id=b.p_switch_coordinate_id(+)\n" .
        "and a.p_service_type_id=c.p_service_type_id(+)\n" .
        "and a.p_city_coordinate_id=d.p_city_coordinate_id(+)\n" .
        "and a.p_coverage_area_id=e.p_coverage_area_id(+)\n" .
        "and a.p_access_code_id=f.p_access_code_id(+)\n" .
        "and a.p_trunk_id=g.p_trunk_id(+)\n" .
        "and a.p_company_id=h.p_company_id(+)\n" .
        "and a.p_organization_id=i.p_organization_id(+)\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.* ,\n" .
        "b.code as p_switch_coordinate_name,\n" .
        "c.code as p_service_type_name,\n" .
        "d.code as p_city_coordinate_name,\n" .
        "e.code as p_coverage_area_name,\n" .
        "f.code as p_access_code_name,\n" .
        "g.code as p_trunk_name,\n" .
        "h.code as p_company_name,\n" .
        "i.code as p_organization_name\n" .
        "from p_poc a,\n" .
        "p_switch_coordinate b,\n" .
        "p_service_type c,\n" .
        "p_city_coordinate d,\n" .
        "p_coverage_area e,\n" .
        "p_access_code f,\n" .
        "p_trunk g,\n" .
        "p_company h,\n" .
        "p_organization i\n" .
        "where\n" .
        "a.p_switch_coordinate_id=b.p_switch_coordinate_id(+)\n" .
        "and a.p_service_type_id=c.p_service_type_id(+)\n" .
        "and a.p_city_coordinate_id=d.p_city_coordinate_id(+)\n" .
        "and a.p_coverage_area_id=e.p_coverage_area_id(+)\n" .
        "and a.p_access_code_id=f.p_access_code_id(+)\n" .
        "and a.p_trunk_id=g.p_trunk_id(+)\n" .
        "and a.p_company_id=h.p_company_id(+)\n" .
        "and a.p_organization_id=i.p_organization_id(+)\n" .
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

//SetValues Method @2-AAE4C01A
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_COVERAGE_AREA_NAME->SetDBValue($this->f("P_COVERAGE_AREA_NAME"));
        $this->P_ACCESS_CODE_NAME->SetDBValue($this->f("P_ACCESS_CODE_NAME"));
        $this->P_COMPANY_NAME->SetDBValue($this->f("P_COMPANY_NAME"));
        $this->P_ORGANIZATION_NAME->SetDBValue($this->f("P_ORGANIZATION_NAME"));
        $this->DLink->SetDBValue($this->f("P_POC_ID"));
        $this->ADLink->SetDBValue($this->f("P_POC_ID"));
        $this->P_POC_ID->SetDBValue(trim($this->f("P_POC_ID")));
    }
//End SetValues Method

} //End P_POCDataSource Class @2-FCB6E20C

class clsRecordP_POCSearch { //P_POCSearch Class @3-1C820AC1

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

//Class_Initialize Event @3-122B387D
    function clsRecordP_POCSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_POCSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_POCSearch";
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

//Operation Method @3-3C183D74
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
        $Redirect = "p_poc.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_poc.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_POCSearch Class @3-FCB6E20C

class clsRecordp_poc1 { //p_poc1 Class @43-F6D6A3FA

//Variables @43-D6FF3E86

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

//Class_Initialize Event @43-0FB76A59
    function clsRecordp_poc1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_poc1/Error";
        $this->DataSource = new clsp_poc1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_poc1";
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
            $this->P_SWITCH_COORDINATE_ID = & new clsControl(ccsHidden, "P_SWITCH_COORDINATE_ID", "P_SWITCH_COORDINATE_ID", ccsFloat, "", CCGetRequestParam("P_SWITCH_COORDINATE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_CITY_COORDINATE_ID = & new clsControl(ccsHidden, "P_CITY_COORDINATE_ID", "P CITY COORDINATE ID", ccsFloat, "", CCGetRequestParam("P_CITY_COORDINATE_ID", $Method, NULL), $this);
            $this->P_COVERAGE_AREA_ID = & new clsControl(ccsHidden, "P_COVERAGE_AREA_ID", "P COVERAGE AREA ID", ccsFloat, "", CCGetRequestParam("P_COVERAGE_AREA_ID", $Method, NULL), $this);
            $this->P_ACCESS_CODE_ID = & new clsControl(ccsHidden, "P_ACCESS_CODE_ID", "P ACCESS CODE ID", ccsFloat, "", CCGetRequestParam("P_ACCESS_CODE_ID", $Method, NULL), $this);
            $this->P_TRUNK_ID = & new clsControl(ccsHidden, "P_TRUNK_ID", "P TRUNK ID", ccsFloat, "", CCGetRequestParam("P_TRUNK_ID", $Method, NULL), $this);
            $this->P_COMPANY_ID = & new clsControl(ccsHidden, "P_COMPANY_ID", "P COMPANY ID", ccsFloat, "", CCGetRequestParam("P_COMPANY_ID", $Method, NULL), $this);
            $this->P_ORGANIZATION_ID = & new clsControl(ccsHidden, "P_ORGANIZATION_ID", "P ORGANIZATION ID", ccsFloat, "", CCGetRequestParam("P_ORGANIZATION_ID", $Method, NULL), $this);
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
            $this->P_SWITCH_COORDINATE_NAME = & new clsControl(ccsTextBox, "P_SWITCH_COORDINATE_NAME", "P_SWITCH_COORDINATE_NAME", ccsText, "", CCGetRequestParam("P_SWITCH_COORDINATE_NAME", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", $Method, NULL), $this);
            $this->P_CITY_COORDINATE_NAME = & new clsControl(ccsTextBox, "P_CITY_COORDINATE_NAME", "P_CITY_COORDINATE_NAME", ccsText, "", CCGetRequestParam("P_CITY_COORDINATE_NAME", $Method, NULL), $this);
            $this->P_COVERAGE_AREA_NAME = & new clsControl(ccsTextBox, "P_COVERAGE_AREA_NAME", "P COVERAGE AREA ID", ccsText, "", CCGetRequestParam("P_COVERAGE_AREA_NAME", $Method, NULL), $this);
            $this->P_ACCESS_CODE_NAME = & new clsControl(ccsTextBox, "P_ACCESS_CODE_NAME", "P_ACCESS_CODE_NAME", ccsText, "", CCGetRequestParam("P_ACCESS_CODE_NAME", $Method, NULL), $this);
            $this->P_TRUNK_NAME = & new clsControl(ccsTextBox, "P_TRUNK_NAME", "P_TRUNK_NAME", ccsText, "", CCGetRequestParam("P_TRUNK_NAME", $Method, NULL), $this);
            $this->P_COMPANY_NAME = & new clsControl(ccsTextBox, "P_COMPANY_NAME", "P_COMPANY_NAME", ccsText, "", CCGetRequestParam("P_COMPANY_NAME", $Method, NULL), $this);
            $this->P_ORGANIZATION_NAME = & new clsControl(ccsTextBox, "P_ORGANIZATION_NAME", "P_ORGANIZATION_NAME", ccsText, "", CCGetRequestParam("P_ORGANIZATION_NAME", $Method, NULL), $this);
            $this->P_POC_ID = & new clsControl(ccsHidden, "P_POC_ID", "CODE", ccsFloat, "", CCGetRequestParam("P_POC_ID", $Method, NULL), $this);
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

//Initialize Method @43-C82DDCF0
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_POC_ID"] = CCGetFromGet("P_POC_ID", NULL);
    }
//End Initialize Method

//Validate Method @43-8AE22A25
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->P_SWITCH_COORDINATE_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_CITY_COORDINATE_ID->Validate() && $Validation);
        $Validation = ($this->P_COVERAGE_AREA_ID->Validate() && $Validation);
        $Validation = ($this->P_ACCESS_CODE_ID->Validate() && $Validation);
        $Validation = ($this->P_TRUNK_ID->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_ID->Validate() && $Validation);
        $Validation = ($this->P_ORGANIZATION_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_SWITCH_COORDINATE_NAME->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_NAME->Validate() && $Validation);
        $Validation = ($this->P_CITY_COORDINATE_NAME->Validate() && $Validation);
        $Validation = ($this->P_COVERAGE_AREA_NAME->Validate() && $Validation);
        $Validation = ($this->P_ACCESS_CODE_NAME->Validate() && $Validation);
        $Validation = ($this->P_TRUNK_NAME->Validate() && $Validation);
        $Validation = ($this->P_COMPANY_NAME->Validate() && $Validation);
        $Validation = ($this->P_ORGANIZATION_NAME->Validate() && $Validation);
        $Validation = ($this->P_POC_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SWITCH_COORDINATE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CITY_COORDINATE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COVERAGE_AREA_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ACCESS_CODE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TRUNK_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ORGANIZATION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SWITCH_COORDINATE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CITY_COORDINATE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COVERAGE_AREA_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ACCESS_CODE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TRUNK_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COMPANY_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ORGANIZATION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_POC_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @43-0685921A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->P_SWITCH_COORDINATE_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_CITY_COORDINATE_ID->Errors->Count());
        $errors = ($errors || $this->P_COVERAGE_AREA_ID->Errors->Count());
        $errors = ($errors || $this->P_ACCESS_CODE_ID->Errors->Count());
        $errors = ($errors || $this->P_TRUNK_ID->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_ID->Errors->Count());
        $errors = ($errors || $this->P_ORGANIZATION_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_SWITCH_COORDINATE_NAME->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_NAME->Errors->Count());
        $errors = ($errors || $this->P_CITY_COORDINATE_NAME->Errors->Count());
        $errors = ($errors || $this->P_COVERAGE_AREA_NAME->Errors->Count());
        $errors = ($errors || $this->P_ACCESS_CODE_NAME->Errors->Count());
        $errors = ($errors || $this->P_TRUNK_NAME->Errors->Count());
        $errors = ($errors || $this->P_COMPANY_NAME->Errors->Count());
        $errors = ($errors || $this->P_ORGANIZATION_NAME->Errors->Count());
        $errors = ($errors || $this->P_POC_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @43-ED598703
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

//Operation Method @43-872C026F
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

//InsertRow Method @43-C161F29D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_SWITCH_COORDINATE_ID->SetValue($this->P_SWITCH_COORDINATE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_CITY_COORDINATE_ID->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        $this->DataSource->P_COVERAGE_AREA_ID->SetValue($this->P_COVERAGE_AREA_ID->GetValue(true));
        $this->DataSource->P_ACCESS_CODE_ID->SetValue($this->P_ACCESS_CODE_ID->GetValue(true));
        $this->DataSource->P_TRUNK_ID->SetValue($this->P_TRUNK_ID->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->P_ORGANIZATION_ID->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @43-7148666E
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_SWITCH_COORDINATE_ID->SetValue($this->P_SWITCH_COORDINATE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_CITY_COORDINATE_ID->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        $this->DataSource->P_COVERAGE_AREA_ID->SetValue($this->P_COVERAGE_AREA_ID->GetValue(true));
        $this->DataSource->P_ACCESS_CODE_ID->SetValue($this->P_ACCESS_CODE_ID->GetValue(true));
        $this->DataSource->P_TRUNK_ID->SetValue($this->P_TRUNK_ID->GetValue(true));
        $this->DataSource->P_COMPANY_ID->SetValue($this->P_COMPANY_ID->GetValue(true));
        $this->DataSource->P_ORGANIZATION_ID->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_POC_ID->SetValue($this->P_POC_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @43-82C4842E
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_POC_ID->SetValue($this->P_POC_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @43-E9DCFCB5
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
                    $this->P_SWITCH_COORDINATE_ID->SetValue($this->DataSource->P_SWITCH_COORDINATE_ID->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                    $this->P_CITY_COORDINATE_ID->SetValue($this->DataSource->P_CITY_COORDINATE_ID->GetValue());
                    $this->P_COVERAGE_AREA_ID->SetValue($this->DataSource->P_COVERAGE_AREA_ID->GetValue());
                    $this->P_ACCESS_CODE_ID->SetValue($this->DataSource->P_ACCESS_CODE_ID->GetValue());
                    $this->P_TRUNK_ID->SetValue($this->DataSource->P_TRUNK_ID->GetValue());
                    $this->P_COMPANY_ID->SetValue($this->DataSource->P_COMPANY_ID->GetValue());
                    $this->P_ORGANIZATION_ID->SetValue($this->DataSource->P_ORGANIZATION_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_SWITCH_COORDINATE_NAME->SetValue($this->DataSource->P_SWITCH_COORDINATE_NAME->GetValue());
                    $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                    $this->P_CITY_COORDINATE_NAME->SetValue($this->DataSource->P_CITY_COORDINATE_NAME->GetValue());
                    $this->P_COVERAGE_AREA_NAME->SetValue($this->DataSource->P_COVERAGE_AREA_NAME->GetValue());
                    $this->P_ACCESS_CODE_NAME->SetValue($this->DataSource->P_ACCESS_CODE_NAME->GetValue());
                    $this->P_TRUNK_NAME->SetValue($this->DataSource->P_TRUNK_NAME->GetValue());
                    $this->P_COMPANY_NAME->SetValue($this->DataSource->P_COMPANY_NAME->GetValue());
                    $this->P_ORGANIZATION_NAME->SetValue($this->DataSource->P_ORGANIZATION_NAME->GetValue());
                    $this->P_POC_ID->SetValue($this->DataSource->P_POC_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SWITCH_COORDINATE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CITY_COORDINATE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COVERAGE_AREA_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ACCESS_CODE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TRUNK_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ORGANIZATION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SWITCH_COORDINATE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CITY_COORDINATE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COVERAGE_AREA_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ACCESS_CODE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TRUNK_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COMPANY_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ORGANIZATION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_POC_ID->Errors->ToString());
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
        $this->P_SWITCH_COORDINATE_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->P_CITY_COORDINATE_ID->Show();
        $this->P_COVERAGE_AREA_ID->Show();
        $this->P_ACCESS_CODE_ID->Show();
        $this->P_TRUNK_ID->Show();
        $this->P_COMPANY_ID->Show();
        $this->P_ORGANIZATION_ID->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_SWITCH_COORDINATE_NAME->Show();
        $this->P_SERVICE_TYPE_NAME->Show();
        $this->P_CITY_COORDINATE_NAME->Show();
        $this->P_COVERAGE_AREA_NAME->Show();
        $this->P_ACCESS_CODE_NAME->Show();
        $this->P_TRUNK_NAME->Show();
        $this->P_COMPANY_NAME->Show();
        $this->P_ORGANIZATION_NAME->Show();
        $this->P_POC_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_poc1 Class @43-FCB6E20C

class clsp_poc1DataSource extends clsDBConn {  //p_poc1DataSource Class @43-98E8ABCA

//DataSource Variables @43-9FEC993B
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
    var $P_SWITCH_COORDINATE_ID;
    var $P_SERVICE_TYPE_ID;
    var $P_CITY_COORDINATE_ID;
    var $P_COVERAGE_AREA_ID;
    var $P_ACCESS_CODE_ID;
    var $P_TRUNK_ID;
    var $P_COMPANY_ID;
    var $P_ORGANIZATION_ID;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $P_SWITCH_COORDINATE_NAME;
    var $P_SERVICE_TYPE_NAME;
    var $P_CITY_COORDINATE_NAME;
    var $P_COVERAGE_AREA_NAME;
    var $P_ACCESS_CODE_NAME;
    var $P_TRUNK_NAME;
    var $P_COMPANY_NAME;
    var $P_ORGANIZATION_NAME;
    var $P_POC_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @43-07531150
    function clsp_poc1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_poc1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_SWITCH_COORDINATE_ID = new clsField("P_SWITCH_COORDINATE_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->P_CITY_COORDINATE_ID = new clsField("P_CITY_COORDINATE_ID", ccsFloat, "");
        
        $this->P_COVERAGE_AREA_ID = new clsField("P_COVERAGE_AREA_ID", ccsFloat, "");
        
        $this->P_ACCESS_CODE_ID = new clsField("P_ACCESS_CODE_ID", ccsFloat, "");
        
        $this->P_TRUNK_ID = new clsField("P_TRUNK_ID", ccsFloat, "");
        
        $this->P_COMPANY_ID = new clsField("P_COMPANY_ID", ccsFloat, "");
        
        $this->P_ORGANIZATION_ID = new clsField("P_ORGANIZATION_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_SWITCH_COORDINATE_NAME = new clsField("P_SWITCH_COORDINATE_NAME", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_CITY_COORDINATE_NAME = new clsField("P_CITY_COORDINATE_NAME", ccsText, "");
        
        $this->P_COVERAGE_AREA_NAME = new clsField("P_COVERAGE_AREA_NAME", ccsText, "");
        
        $this->P_ACCESS_CODE_NAME = new clsField("P_ACCESS_CODE_NAME", ccsText, "");
        
        $this->P_TRUNK_NAME = new clsField("P_TRUNK_NAME", ccsText, "");
        
        $this->P_COMPANY_NAME = new clsField("P_COMPANY_NAME", ccsText, "");
        
        $this->P_ORGANIZATION_NAME = new clsField("P_ORGANIZATION_NAME", ccsText, "");
        
        $this->P_POC_ID = new clsField("P_POC_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @43-CE262542
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_POC_ID", ccsFloat, "", "", $this->Parameters["urlP_POC_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @43-9AEEF4D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.* ,\n" .
        "b.code as p_switch_coordinate_name,\n" .
        "c.code as p_service_type_name,\n" .
        "d.code as p_city_coordinate_name,\n" .
        "e.code as p_coverage_area_name,\n" .
        "f.code as p_access_code_name,\n" .
        "g.code as p_trunk_name,\n" .
        "h.code as p_company_name,\n" .
        "i.code as p_organization_name\n" .
        "from p_poc a,\n" .
        "p_switch_coordinate b,\n" .
        "p_service_type c,\n" .
        "p_city_coordinate d,\n" .
        "p_coverage_area e,\n" .
        "p_access_code f,\n" .
        "p_trunk g,\n" .
        "p_company h,\n" .
        "p_organization i\n" .
        "where\n" .
        "a.p_switch_coordinate_id=b.p_switch_coordinate_id(+)\n" .
        "and a.p_service_type_id=c.p_service_type_id(+)\n" .
        "and a.p_city_coordinate_id=d.p_city_coordinate_id(+)\n" .
        "and a.p_coverage_area_id=e.p_coverage_area_id(+)\n" .
        "and a.p_access_code_id=f.p_access_code_id(+)\n" .
        "and a.p_trunk_id=g.p_trunk_id(+)\n" .
        "and a.p_company_id=h.p_company_id(+)\n" .
        "and a.p_organization_id=i.p_organization_id(+)\n" .
        "and a.P_POC_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @43-91CD05AF
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_SWITCH_COORDINATE_ID->SetDBValue(trim($this->f("P_SWITCH_COORDINATE_ID")));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->P_CITY_COORDINATE_ID->SetDBValue(trim($this->f("P_CITY_COORDINATE_ID")));
        $this->P_COVERAGE_AREA_ID->SetDBValue(trim($this->f("P_COVERAGE_AREA_ID")));
        $this->P_ACCESS_CODE_ID->SetDBValue(trim($this->f("P_ACCESS_CODE_ID")));
        $this->P_TRUNK_ID->SetDBValue(trim($this->f("P_TRUNK_ID")));
        $this->P_COMPANY_ID->SetDBValue(trim($this->f("P_COMPANY_ID")));
        $this->P_ORGANIZATION_ID->SetDBValue(trim($this->f("P_ORGANIZATION_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_SWITCH_COORDINATE_NAME->SetDBValue($this->f("P_SWITCH_COORDINATE_NAME"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_CITY_COORDINATE_NAME->SetDBValue($this->f("P_CITY_COORDINATE_NAME"));
        $this->P_COVERAGE_AREA_NAME->SetDBValue($this->f("P_COVERAGE_AREA_NAME"));
        $this->P_ACCESS_CODE_NAME->SetDBValue($this->f("P_ACCESS_CODE_NAME"));
        $this->P_TRUNK_NAME->SetDBValue($this->f("P_TRUNK_NAME"));
        $this->P_COMPANY_NAME->SetDBValue($this->f("P_COMPANY_NAME"));
        $this->P_ORGANIZATION_NAME->SetDBValue($this->f("P_ORGANIZATION_NAME"));
        $this->P_POC_ID->SetDBValue(trim($this->f("P_POC_ID")));
    }
//End SetValues Method

//Insert Method @43-BB0A15A4
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SWITCH_COORDINATE_ID"] = new clsSQLParameter("ctrlP_SWITCH_COORDINATE_ID", ccsFloat, "", "", $this->P_SWITCH_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CITY_COORDINATE_ID"] = new clsSQLParameter("ctrlP_CITY_COORDINATE_ID", ccsFloat, "", "", $this->P_CITY_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COVERAGE_AREA_ID"] = new clsSQLParameter("ctrlP_COVERAGE_AREA_ID", ccsFloat, "", "", $this->P_COVERAGE_AREA_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_ACCESS_CODE_ID"] = new clsSQLParameter("ctrlP_ACCESS_CODE_ID", ccsFloat, "", "", $this->P_ACCESS_CODE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_TRUNK_ID"] = new clsSQLParameter("ctrlP_TRUNK_ID", ccsFloat, "", "", $this->P_TRUNK_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_ORGANIZATION_ID"] = new clsSQLParameter("ctrlP_ORGANIZATION_ID", ccsFloat, "", "", $this->P_ORGANIZATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_SWITCH_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_SWITCH_COORDINATE_ID"]->SetValue($this->P_SWITCH_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_SWITCH_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_SWITCH_COORDINATE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_CITY_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetText(0);
        if (!is_null($this->cp["P_COVERAGE_AREA_ID"]->GetValue()) and !strlen($this->cp["P_COVERAGE_AREA_ID"]->GetText()) and !is_bool($this->cp["P_COVERAGE_AREA_ID"]->GetValue())) 
            $this->cp["P_COVERAGE_AREA_ID"]->SetValue($this->P_COVERAGE_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_COVERAGE_AREA_ID"]->GetText()) and !is_bool($this->cp["P_COVERAGE_AREA_ID"]->GetValue(true))) 
            $this->cp["P_COVERAGE_AREA_ID"]->SetText(0);
        if (!is_null($this->cp["P_ACCESS_CODE_ID"]->GetValue()) and !strlen($this->cp["P_ACCESS_CODE_ID"]->GetText()) and !is_bool($this->cp["P_ACCESS_CODE_ID"]->GetValue())) 
            $this->cp["P_ACCESS_CODE_ID"]->SetValue($this->P_ACCESS_CODE_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCESS_CODE_ID"]->GetText()) and !is_bool($this->cp["P_ACCESS_CODE_ID"]->GetValue(true))) 
            $this->cp["P_ACCESS_CODE_ID"]->SetText(0);
        if (!is_null($this->cp["P_TRUNK_ID"]->GetValue()) and !strlen($this->cp["P_TRUNK_ID"]->GetText()) and !is_bool($this->cp["P_TRUNK_ID"]->GetValue())) 
            $this->cp["P_TRUNK_ID"]->SetValue($this->P_TRUNK_ID->GetValue(true));
        if (!strlen($this->cp["P_TRUNK_ID"]->GetText()) and !is_bool($this->cp["P_TRUNK_ID"]->GetValue(true))) 
            $this->cp["P_TRUNK_ID"]->SetText(0);
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["P_ORGANIZATION_ID"]->GetValue()) and !strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue())) 
            $this->cp["P_ORGANIZATION_ID"]->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        if (!strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue(true))) 
            $this->cp["P_ORGANIZATION_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_POC(P_POC_ID, CODE, P_SWITCH_COORDINATE_ID, P_SERVICE_TYPE_ID, P_CITY_COORDINATE_ID, P_COVERAGE_AREA_ID, P_ACCESS_CODE_ID, P_TRUNK_ID, P_COMPANY_ID, P_ORGANIZATION_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_POC','P_POC_ID'), '" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_SWITCH_COORDINATE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_CITY_COORDINATE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_COVERAGE_AREA_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_ACCESS_CODE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_TRUNK_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_ORGANIZATION_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate,'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "') ";
	//	die($this->SQL);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @43-CA3549F4
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SWITCH_COORDINATE_ID"] = new clsSQLParameter("ctrlP_SWITCH_COORDINATE_ID", ccsFloat, "", "", $this->P_SWITCH_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CITY_COORDINATE_ID"] = new clsSQLParameter("ctrlP_CITY_COORDINATE_ID", ccsFloat, "", "", $this->P_CITY_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COVERAGE_AREA_ID"] = new clsSQLParameter("ctrlP_COVERAGE_AREA_ID", ccsFloat, "", "", $this->P_COVERAGE_AREA_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_ACCESS_CODE_ID"] = new clsSQLParameter("ctrlP_ACCESS_CODE_ID", ccsFloat, "", "", $this->P_ACCESS_CODE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_TRUNK_ID"] = new clsSQLParameter("ctrlP_TRUNK_ID", ccsFloat, "", "", $this->P_TRUNK_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_COMPANY_ID"] = new clsSQLParameter("ctrlP_COMPANY_ID", ccsFloat, "", "", $this->P_COMPANY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_ORGANIZATION_ID"] = new clsSQLParameter("ctrlP_ORGANIZATION_ID", ccsFloat, "", "", $this->P_ORGANIZATION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_POC_ID"] = new clsSQLParameter("ctrlP_POC_ID", ccsFloat, "", "", $this->P_POC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_SWITCH_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_SWITCH_COORDINATE_ID"]->SetValue($this->P_SWITCH_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_SWITCH_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_SWITCH_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_SWITCH_COORDINATE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_CITY_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetText(0);
        if (!is_null($this->cp["P_COVERAGE_AREA_ID"]->GetValue()) and !strlen($this->cp["P_COVERAGE_AREA_ID"]->GetText()) and !is_bool($this->cp["P_COVERAGE_AREA_ID"]->GetValue())) 
            $this->cp["P_COVERAGE_AREA_ID"]->SetValue($this->P_COVERAGE_AREA_ID->GetValue(true));
        if (!strlen($this->cp["P_COVERAGE_AREA_ID"]->GetText()) and !is_bool($this->cp["P_COVERAGE_AREA_ID"]->GetValue(true))) 
            $this->cp["P_COVERAGE_AREA_ID"]->SetText(0);
        if (!is_null($this->cp["P_ACCESS_CODE_ID"]->GetValue()) and !strlen($this->cp["P_ACCESS_CODE_ID"]->GetText()) and !is_bool($this->cp["P_ACCESS_CODE_ID"]->GetValue())) 
            $this->cp["P_ACCESS_CODE_ID"]->SetValue($this->P_ACCESS_CODE_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCESS_CODE_ID"]->GetText()) and !is_bool($this->cp["P_ACCESS_CODE_ID"]->GetValue(true))) 
            $this->cp["P_ACCESS_CODE_ID"]->SetText(0);
        if (!is_null($this->cp["P_TRUNK_ID"]->GetValue()) and !strlen($this->cp["P_TRUNK_ID"]->GetText()) and !is_bool($this->cp["P_TRUNK_ID"]->GetValue())) 
            $this->cp["P_TRUNK_ID"]->SetValue($this->P_TRUNK_ID->GetValue(true));
        if (!strlen($this->cp["P_TRUNK_ID"]->GetText()) and !is_bool($this->cp["P_TRUNK_ID"]->GetValue(true))) 
            $this->cp["P_TRUNK_ID"]->SetText(0);
        if (!is_null($this->cp["P_COMPANY_ID"]->GetValue()) and !strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue())) 
            $this->cp["P_COMPANY_ID"]->SetValue($this->P_COMPANY_ID->GetValue(true));
        if (!strlen($this->cp["P_COMPANY_ID"]->GetText()) and !is_bool($this->cp["P_COMPANY_ID"]->GetValue(true))) 
            $this->cp["P_COMPANY_ID"]->SetText(0);
        if (!is_null($this->cp["P_ORGANIZATION_ID"]->GetValue()) and !strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue())) 
            $this->cp["P_ORGANIZATION_ID"]->SetValue($this->P_ORGANIZATION_ID->GetValue(true));
        if (!strlen($this->cp["P_ORGANIZATION_ID"]->GetText()) and !is_bool($this->cp["P_ORGANIZATION_ID"]->GetValue(true))) 
            $this->cp["P_ORGANIZATION_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_POC_ID"]->GetValue()) and !strlen($this->cp["P_POC_ID"]->GetText()) and !is_bool($this->cp["P_POC_ID"]->GetValue())) 
            $this->cp["P_POC_ID"]->SetValue($this->P_POC_ID->GetValue(true));
        if (!strlen($this->cp["P_POC_ID"]->GetText()) and !is_bool($this->cp["P_POC_ID"]->GetValue(true))) 
            $this->cp["P_POC_ID"]->SetText(0);
        $this->SQL = "UPDATE P_POC SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "P_SWITCH_COORDINATE_ID=" . $this->SQLValue($this->cp["P_SWITCH_COORDINATE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_CITY_COORDINATE_ID=" . $this->SQLValue($this->cp["P_CITY_COORDINATE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_COVERAGE_AREA_ID=" . $this->SQLValue($this->cp["P_COVERAGE_AREA_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_ACCESS_CODE_ID=" . $this->SQLValue($this->cp["P_ACCESS_CODE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_TRUNK_ID=" . $this->SQLValue($this->cp["P_TRUNK_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_COMPANY_ID=" . $this->SQLValue($this->cp["P_COMPANY_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "P_ORGANIZATION_ID=" . $this->SQLValue($this->cp["P_ORGANIZATION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_POC_ID = " . $this->SQLValue($this->cp["P_POC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @43-BDF3693C
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_POC_ID"] = new clsSQLParameter("ctrlP_POC_ID", ccsFloat, "", "", $this->P_POC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_POC_ID"]->GetValue()) and !strlen($this->cp["P_POC_ID"]->GetText()) and !is_bool($this->cp["P_POC_ID"]->GetValue())) 
            $this->cp["P_POC_ID"]->SetValue($this->P_POC_ID->GetValue(true));
        if (!strlen($this->cp["P_POC_ID"]->GetText()) and !is_bool($this->cp["P_POC_ID"]->GetValue(true))) 
            $this->cp["P_POC_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_POC WHERE P_POC_ID = " . $this->SQLValue($this->cp["P_POC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_poc1DataSource Class @43-FCB6E20C

//Initialize Page @1-188BD6F0
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
$TemplateFileName = "p_poc.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-EC12AAA5
include_once("./p_poc_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A1F5C688
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_POC = & new clsGridP_POC("", $MainPage);
$P_POCSearch = & new clsRecordP_POCSearch("", $MainPage);
$p_poc1 = & new clsRecordp_poc1("", $MainPage);
$MainPage->P_POC = & $P_POC;
$MainPage->P_POCSearch = & $P_POCSearch;
$MainPage->p_poc1 = & $p_poc1;
$P_POC->Initialize();
$p_poc1->Initialize();

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

//Execute Components @1-184DC5E3
$P_POCSearch->Operation();
$p_poc1->Operation();
//End Execute Components

//Go to destination page @1-AFBA54F0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_POC);
    unset($P_POCSearch);
    unset($p_poc1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-DF845393
$P_POC->Show();
$P_POCSearch->Show();
$p_poc1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-CF03BC0A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_POC);
unset($P_POCSearch);
unset($p_poc1);
unset($Tpl);
//End Unload Page


?>
