<?php
//Include Common Files @1-FC411E37
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_city_coordinate.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_CITY_COORDINATE { //P_CITY_COORDINATE class @2-53EBBC94

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

//Class_Initialize Event @2-70DD0C1F
    function clsGridP_CITY_COORDINATE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_CITY_COORDINATE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_CITY_COORDINATE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_CITY_COORDINATEDataSource($this);
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
        $this->CITY_NAME = & new clsControl(ccsLabel, "CITY_NAME", "CITY_NAME", ccsText, "", CCGetRequestParam("CITY_NAME", ccsGet, NULL), $this);
        $this->P_COUNTRY_NAME = & new clsControl(ccsLabel, "P_COUNTRY_NAME", "P_COUNTRY_NAME", ccsText, "", CCGetRequestParam("P_COUNTRY_NAME", ccsGet, NULL), $this);
        $this->TIME_REF = & new clsControl(ccsLabel, "TIME_REF", "TIME_REF", ccsFloat, "", CCGetRequestParam("TIME_REF", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_city_coordinate.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_city_coordinate.php";
        $this->P_CITY_COORDINATE_ID = & new clsControl(ccsHidden, "P_CITY_COORDINATE_ID", "P_CITY_COORDINATE_ID", ccsFloat, "", CCGetRequestParam("P_CITY_COORDINATE_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_CITY_COORDINATE_Insert = & new clsControl(ccsLink, "P_CITY_COORDINATE_Insert", "P_CITY_COORDINATE_Insert", ccsText, "", CCGetRequestParam("P_CITY_COORDINATE_Insert", ccsGet, NULL), $this);
        $this->P_CITY_COORDINATE_Insert->HTML = true;
        $this->P_CITY_COORDINATE_Insert->Parameters = CCGetQueryString("QueryString", array("P_CITY_COORDINATE_ID", "FLAG", "s_keyword", "P_CITY_COORDINATEPage", "P_CITY_COORDINATEPageSize", "P_CITY_COORDINATEOrder", "P_CITY_COORDINATEDir", "ccsForm"));
        $this->P_CITY_COORDINATE_Insert->Page = "p_city_coordinate.php";
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

//Show Method @2-46414683
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
            $this->ControlsVisible["CITY_NAME"] = $this->CITY_NAME->Visible;
            $this->ControlsVisible["P_COUNTRY_NAME"] = $this->P_COUNTRY_NAME->Visible;
            $this->ControlsVisible["TIME_REF"] = $this->TIME_REF->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_CITY_COORDINATE_ID"] = $this->P_CITY_COORDINATE_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->CITY_NAME->SetValue($this->DataSource->CITY_NAME->GetValue());
                $this->P_COUNTRY_NAME->SetValue($this->DataSource->P_COUNTRY_NAME->GetValue());
                $this->TIME_REF->SetValue($this->DataSource->TIME_REF->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_CITY_COORDINATE_ID", $this->DataSource->f("P_CITY_COORDINATE_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_CITY_COORDINATE_ID", $this->DataSource->f("P_CITY_COORDINATE_ID"));
                $this->P_CITY_COORDINATE_ID->SetValue($this->DataSource->P_CITY_COORDINATE_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->CITY_NAME->Show();
                $this->P_COUNTRY_NAME->Show();
                $this->TIME_REF->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_CITY_COORDINATE_ID->Show();
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
        $this->P_CITY_COORDINATE_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-654773C0
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CITY_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_COUNTRY_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TIME_REF->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CITY_COORDINATE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_CITY_COORDINATE Class @2-FCB6E20C

class clsP_CITY_COORDINATEDataSource extends clsDBConn {  //P_CITY_COORDINATEDataSource Class @2-641907CE

//DataSource Variables @2-48A49C32
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $CITY_NAME;
    var $P_COUNTRY_NAME;
    var $TIME_REF;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_CITY_COORDINATE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-C19E6E71
    function clsP_CITY_COORDINATEDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_CITY_COORDINATE";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->CITY_NAME = new clsField("CITY_NAME", ccsText, "");
        
        $this->P_COUNTRY_NAME = new clsField("P_COUNTRY_NAME", ccsText, "");
        
        $this->TIME_REF = new clsField("TIME_REF", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_CITY_COORDINATE_ID = new clsField("P_CITY_COORDINATE_ID", ccsFloat, "");
        

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

//Open Method @2-9852BAB3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as p_country_name from p_city_coordinate a ,\n" .
        "p_country b\n" .
        "where a.p_country_id=b.p_country_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as p_country_name from p_city_coordinate a ,\n" .
        "p_country b\n" .
        "where a.p_country_id=b.p_country_id\n" .
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

//SetValues Method @2-1DCDF2B3
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->CITY_NAME->SetDBValue($this->f("CITY_NAME"));
        $this->P_COUNTRY_NAME->SetDBValue($this->f("P_COUNTRY_NAME"));
        $this->TIME_REF->SetDBValue(trim($this->f("TIME_REF")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_CITY_COORDINATE_ID"));
        $this->ADLink->SetDBValue($this->f("P_CITY_COORDINATE_ID"));
        $this->P_CITY_COORDINATE_ID->SetDBValue(trim($this->f("P_CITY_COORDINATE_ID")));
    }
//End SetValues Method

} //End P_CITY_COORDINATEDataSource Class @2-FCB6E20C

class clsRecordP_CITY_COORDINATESearch { //P_CITY_COORDINATESearch Class @3-0E624B09

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

//Class_Initialize Event @3-3D88D983
    function clsRecordP_CITY_COORDINATESearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_CITY_COORDINATESearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_CITY_COORDINATESearch";
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

//Operation Method @3-5F334B39
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
        $Redirect = "p_city_coordinate.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_city_coordinate.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_CITY_COORDINATESearch Class @3-FCB6E20C

class clsRecordp_city_coordinate1 { //p_city_coordinate1 Class @59-D6BCC4AF

//Variables @59-D6FF3E86

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

//Class_Initialize Event @59-B13C0706
    function clsRecordp_city_coordinate1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_city_coordinate1/Error";
        $this->DataSource = new clsp_city_coordinate1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_city_coordinate1";
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
            $this->CITY_NAME = & new clsControl(ccsTextBox, "CITY_NAME", "CITY NAME", ccsText, "", CCGetRequestParam("CITY_NAME", $Method, NULL), $this);
            $this->P_COUNTRY_ID = & new clsControl(ccsHidden, "P_COUNTRY_ID", "P COUNTRY ID", ccsFloat, "", CCGetRequestParam("P_COUNTRY_ID", $Method, NULL), $this);
            $this->EM_DEG = & new clsControl(ccsTextBox, "EM_DEG", "EM DEG", ccsFloat, "", CCGetRequestParam("EM_DEG", $Method, NULL), $this);
            $this->EM_DEG->Required = true;
            $this->SL_DEG = & new clsControl(ccsTextBox, "SL_DEG", "SL DEG", ccsFloat, "", CCGetRequestParam("SL_DEG", $Method, NULL), $this);
            $this->SL_DEG->Required = true;
            $this->TIME_REF = & new clsControl(ccsTextBox, "TIME_REF", "TIME REF", ccsFloat, "", CCGetRequestParam("TIME_REF", $Method, NULL), $this);
            $this->TIME_REF->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->SL_MIN = & new clsControl(ccsTextBox, "SL_MIN", "SL MIN", ccsFloat, "", CCGetRequestParam("SL_MIN", $Method, NULL), $this);
            $this->SL_MIN->Required = true;
            $this->SL_SEC = & new clsControl(ccsTextBox, "SL_SEC", "SL SEC", ccsFloat, "", CCGetRequestParam("SL_SEC", $Method, NULL), $this);
            $this->SL_SEC->Required = true;
            $this->EM_MIN = & new clsControl(ccsTextBox, "EM_MIN", "EM MIN", ccsFloat, "", CCGetRequestParam("EM_MIN", $Method, NULL), $this);
            $this->EM_MIN->Required = true;
            $this->EM_SEC = & new clsControl(ccsTextBox, "EM_SEC", "EM SEC", ccsFloat, "", CCGetRequestParam("EM_SEC", $Method, NULL), $this);
            $this->EM_SEC->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_CITY_COORDINATE_ID = & new clsControl(ccsHidden, "P_CITY_COORDINATE_ID", "P_CITY_COORDINATE_ID", ccsFloat, "", CCGetRequestParam("P_CITY_COORDINATE_ID", $Method, NULL), $this);
            $this->P_COUNTRY_NAME = & new clsControl(ccsTextBox, "P_COUNTRY_NAME", "P COUNTRY ID", ccsText, "", CCGetRequestParam("P_COUNTRY_NAME", $Method, NULL), $this);
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

//Initialize Method @59-AEF94F2F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_CITY_COORDINATE_ID"] = CCGetFromGet("P_CITY_COORDINATE_ID", NULL);
    }
//End Initialize Method

//Validate Method @59-860C3015
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->CITY_NAME->Validate() && $Validation);
        $Validation = ($this->P_COUNTRY_ID->Validate() && $Validation);
        $Validation = ($this->EM_DEG->Validate() && $Validation);
        $Validation = ($this->SL_DEG->Validate() && $Validation);
        $Validation = ($this->TIME_REF->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->SL_MIN->Validate() && $Validation);
        $Validation = ($this->SL_SEC->Validate() && $Validation);
        $Validation = ($this->EM_MIN->Validate() && $Validation);
        $Validation = ($this->EM_SEC->Validate() && $Validation);
        $Validation = ($this->P_CITY_COORDINATE_ID->Validate() && $Validation);
        $Validation = ($this->P_COUNTRY_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CITY_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COUNTRY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_DEG->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_DEG->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TIME_REF->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_MIN->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SL_SEC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_MIN->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EM_SEC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CITY_COORDINATE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_COUNTRY_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @59-210B3EA6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->CITY_NAME->Errors->Count());
        $errors = ($errors || $this->P_COUNTRY_ID->Errors->Count());
        $errors = ($errors || $this->EM_DEG->Errors->Count());
        $errors = ($errors || $this->SL_DEG->Errors->Count());
        $errors = ($errors || $this->TIME_REF->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->SL_MIN->Errors->Count());
        $errors = ($errors || $this->SL_SEC->Errors->Count());
        $errors = ($errors || $this->EM_MIN->Errors->Count());
        $errors = ($errors || $this->EM_SEC->Errors->Count());
        $errors = ($errors || $this->P_CITY_COORDINATE_ID->Errors->Count());
        $errors = ($errors || $this->P_COUNTRY_NAME->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @59-ED598703
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

//Operation Method @59-D5B5039B
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
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

//InsertRow Method @59-2EC25E38
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->CITY_NAME->SetValue($this->CITY_NAME->GetValue(true));
        $this->DataSource->P_COUNTRY_ID->SetValue($this->P_COUNTRY_ID->GetValue(true));
        $this->DataSource->EM_DEG->SetValue($this->EM_DEG->GetValue(true));
        $this->DataSource->EM_MIN->SetValue($this->EM_MIN->GetValue(true));
        $this->DataSource->EM_SEC->SetValue($this->EM_SEC->GetValue(true));
        $this->DataSource->SL_DEG->SetValue($this->SL_DEG->GetValue(true));
        $this->DataSource->SL_MIN->SetValue($this->SL_MIN->GetValue(true));
        $this->DataSource->SL_SEC->SetValue($this->SL_SEC->GetValue(true));
        $this->DataSource->TIME_REF->SetValue($this->TIME_REF->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @59-1D4798BB
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->CITY_NAME->SetValue($this->CITY_NAME->GetValue(true));
        $this->DataSource->P_COUNTRY_ID->SetValue($this->P_COUNTRY_ID->GetValue(true));
        $this->DataSource->EM_DEG->SetValue($this->EM_DEG->GetValue(true));
        $this->DataSource->EM_MIN->SetValue($this->EM_MIN->GetValue(true));
        $this->DataSource->EM_SEC->SetValue($this->EM_SEC->GetValue(true));
        $this->DataSource->SL_DEG->SetValue($this->SL_DEG->GetValue(true));
        $this->DataSource->SL_MIN->SetValue($this->SL_MIN->GetValue(true));
        $this->DataSource->SL_SEC->SetValue($this->SL_SEC->GetValue(true));
        $this->DataSource->TIME_REF->SetValue($this->TIME_REF->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_CITY_COORDINATE_ID->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @59-ABBCBB17
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_CITY_COORDINATE_ID->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @59-9C6DACEB
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
                    $this->CITY_NAME->SetValue($this->DataSource->CITY_NAME->GetValue());
                    $this->P_COUNTRY_ID->SetValue($this->DataSource->P_COUNTRY_ID->GetValue());
                    $this->EM_DEG->SetValue($this->DataSource->EM_DEG->GetValue());
                    $this->SL_DEG->SetValue($this->DataSource->SL_DEG->GetValue());
                    $this->TIME_REF->SetValue($this->DataSource->TIME_REF->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->SL_MIN->SetValue($this->DataSource->SL_MIN->GetValue());
                    $this->SL_SEC->SetValue($this->DataSource->SL_SEC->GetValue());
                    $this->EM_MIN->SetValue($this->DataSource->EM_MIN->GetValue());
                    $this->EM_SEC->SetValue($this->DataSource->EM_SEC->GetValue());
                    $this->P_CITY_COORDINATE_ID->SetValue($this->DataSource->P_CITY_COORDINATE_ID->GetValue());
                    $this->P_COUNTRY_NAME->SetValue($this->DataSource->P_COUNTRY_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CITY_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COUNTRY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_DEG->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_DEG->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TIME_REF->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_MIN->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SL_SEC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_MIN->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EM_SEC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CITY_COORDINATE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_COUNTRY_NAME->Errors->ToString());
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
        $this->CITY_NAME->Show();
        $this->P_COUNTRY_ID->Show();
        $this->EM_DEG->Show();
        $this->SL_DEG->Show();
        $this->TIME_REF->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->SL_MIN->Show();
        $this->SL_SEC->Show();
        $this->EM_MIN->Show();
        $this->EM_SEC->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_CITY_COORDINATE_ID->Show();
        $this->P_COUNTRY_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_city_coordinate1 Class @59-FCB6E20C

class clsp_city_coordinate1DataSource extends clsDBConn {  //p_city_coordinate1DataSource Class @59-BC422A34

//DataSource Variables @59-B3052997
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
    var $CITY_NAME;
    var $P_COUNTRY_ID;
    var $EM_DEG;
    var $SL_DEG;
    var $TIME_REF;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $SL_MIN;
    var $SL_SEC;
    var $EM_MIN;
    var $EM_SEC;
    var $P_CITY_COORDINATE_ID;
    var $P_COUNTRY_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @59-AE7E911D
    function clsp_city_coordinate1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_city_coordinate1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->CITY_NAME = new clsField("CITY_NAME", ccsText, "");
        
        $this->P_COUNTRY_ID = new clsField("P_COUNTRY_ID", ccsFloat, "");
        
        $this->EM_DEG = new clsField("EM_DEG", ccsFloat, "");
        
        $this->SL_DEG = new clsField("SL_DEG", ccsFloat, "");
        
        $this->TIME_REF = new clsField("TIME_REF", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->SL_MIN = new clsField("SL_MIN", ccsFloat, "");
        
        $this->SL_SEC = new clsField("SL_SEC", ccsFloat, "");
        
        $this->EM_MIN = new clsField("EM_MIN", ccsFloat, "");
        
        $this->EM_SEC = new clsField("EM_SEC", ccsFloat, "");
        
        $this->P_CITY_COORDINATE_ID = new clsField("P_CITY_COORDINATE_ID", ccsFloat, "");
        
        $this->P_COUNTRY_NAME = new clsField("P_COUNTRY_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @59-D5D16EAE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_CITY_COORDINATE_ID", ccsFloat, "", "", $this->Parameters["urlP_CITY_COORDINATE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @59-A23AAF30
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_country_name from p_city_coordinate a ,\n" .
        "p_country b\n" .
        "where a.p_country_id=b.p_country_id\n" .
        "and a.P_CITY_COORDINATE_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @59-720B0C41
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->CITY_NAME->SetDBValue($this->f("CITY_NAME"));
        $this->P_COUNTRY_ID->SetDBValue(trim($this->f("P_COUNTRY_ID")));
        $this->EM_DEG->SetDBValue(trim($this->f("EM_DEG")));
        $this->SL_DEG->SetDBValue(trim($this->f("SL_DEG")));
        $this->TIME_REF->SetDBValue(trim($this->f("TIME_REF")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->SL_MIN->SetDBValue(trim($this->f("SL_MIN")));
        $this->SL_SEC->SetDBValue(trim($this->f("SL_SEC")));
        $this->EM_MIN->SetDBValue(trim($this->f("EM_MIN")));
        $this->EM_SEC->SetDBValue(trim($this->f("EM_SEC")));
        $this->P_CITY_COORDINATE_ID->SetDBValue(trim($this->f("P_CITY_COORDINATE_ID")));
        $this->P_COUNTRY_NAME->SetDBValue($this->f("P_COUNTRY_NAME"));
    }
//End SetValues Method

//Insert Method @59-23CE453D
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CITY_NAME"] = new clsSQLParameter("ctrlCITY_NAME", ccsText, "", "", $this->CITY_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_COUNTRY_ID"] = new clsSQLParameter("ctrlP_COUNTRY_ID", ccsFloat, "", "", $this->P_COUNTRY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_DEG"] = new clsSQLParameter("ctrlEM_DEG", ccsFloat, "", "", $this->EM_DEG->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_MIN"] = new clsSQLParameter("ctrlEM_MIN", ccsFloat, "", "", $this->EM_MIN->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_SEC"] = new clsSQLParameter("ctrlEM_SEC", ccsFloat, "", "", $this->EM_SEC->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_DEG"] = new clsSQLParameter("ctrlSL_DEG", ccsFloat, "", "", $this->SL_DEG->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_MIN"] = new clsSQLParameter("ctrlSL_MIN", ccsFloat, "", "", $this->SL_MIN->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_SEC"] = new clsSQLParameter("ctrlSL_SEC", ccsFloat, "", "", $this->SL_SEC->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TIME_REF"] = new clsSQLParameter("ctrlTIME_REF", ccsFloat, "", "", $this->TIME_REF->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["CITY_NAME"]->GetValue()) and !strlen($this->cp["CITY_NAME"]->GetText()) and !is_bool($this->cp["CITY_NAME"]->GetValue())) 
            $this->cp["CITY_NAME"]->SetValue($this->CITY_NAME->GetValue(true));
        if (!is_null($this->cp["P_COUNTRY_ID"]->GetValue()) and !strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue())) 
            $this->cp["P_COUNTRY_ID"]->SetValue($this->P_COUNTRY_ID->GetValue(true));
        if (!strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue(true))) 
            $this->cp["P_COUNTRY_ID"]->SetText(0);
        if (!is_null($this->cp["EM_DEG"]->GetValue()) and !strlen($this->cp["EM_DEG"]->GetText()) and !is_bool($this->cp["EM_DEG"]->GetValue())) 
            $this->cp["EM_DEG"]->SetValue($this->EM_DEG->GetValue(true));
        if (!strlen($this->cp["EM_DEG"]->GetText()) and !is_bool($this->cp["EM_DEG"]->GetValue(true))) 
            $this->cp["EM_DEG"]->SetText(0);
        if (!is_null($this->cp["EM_MIN"]->GetValue()) and !strlen($this->cp["EM_MIN"]->GetText()) and !is_bool($this->cp["EM_MIN"]->GetValue())) 
            $this->cp["EM_MIN"]->SetValue($this->EM_MIN->GetValue(true));
        if (!strlen($this->cp["EM_MIN"]->GetText()) and !is_bool($this->cp["EM_MIN"]->GetValue(true))) 
            $this->cp["EM_MIN"]->SetText(0);
        if (!is_null($this->cp["EM_SEC"]->GetValue()) and !strlen($this->cp["EM_SEC"]->GetText()) and !is_bool($this->cp["EM_SEC"]->GetValue())) 
            $this->cp["EM_SEC"]->SetValue($this->EM_SEC->GetValue(true));
        if (!strlen($this->cp["EM_SEC"]->GetText()) and !is_bool($this->cp["EM_SEC"]->GetValue(true))) 
            $this->cp["EM_SEC"]->SetText(0);
        if (!is_null($this->cp["SL_DEG"]->GetValue()) and !strlen($this->cp["SL_DEG"]->GetText()) and !is_bool($this->cp["SL_DEG"]->GetValue())) 
            $this->cp["SL_DEG"]->SetValue($this->SL_DEG->GetValue(true));
        if (!strlen($this->cp["SL_DEG"]->GetText()) and !is_bool($this->cp["SL_DEG"]->GetValue(true))) 
            $this->cp["SL_DEG"]->SetText(0);
        if (!is_null($this->cp["SL_MIN"]->GetValue()) and !strlen($this->cp["SL_MIN"]->GetText()) and !is_bool($this->cp["SL_MIN"]->GetValue())) 
            $this->cp["SL_MIN"]->SetValue($this->SL_MIN->GetValue(true));
        if (!strlen($this->cp["SL_MIN"]->GetText()) and !is_bool($this->cp["SL_MIN"]->GetValue(true))) 
            $this->cp["SL_MIN"]->SetText(0);
        if (!is_null($this->cp["SL_SEC"]->GetValue()) and !strlen($this->cp["SL_SEC"]->GetText()) and !is_bool($this->cp["SL_SEC"]->GetValue())) 
            $this->cp["SL_SEC"]->SetValue($this->SL_SEC->GetValue(true));
        if (!strlen($this->cp["SL_SEC"]->GetText()) and !is_bool($this->cp["SL_SEC"]->GetValue(true))) 
            $this->cp["SL_SEC"]->SetText(0);
        if (!is_null($this->cp["TIME_REF"]->GetValue()) and !strlen($this->cp["TIME_REF"]->GetText()) and !is_bool($this->cp["TIME_REF"]->GetValue())) 
            $this->cp["TIME_REF"]->SetValue($this->TIME_REF->GetValue(true));
        if (!strlen($this->cp["TIME_REF"]->GetText()) and !is_bool($this->cp["TIME_REF"]->GetValue(true))) 
            $this->cp["TIME_REF"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_CITY_COORDINATE(P_CITY_COORDINATE_ID, CODE, CITY_NAME, P_COUNTRY_ID, EM_DEG, EM_MIN, EM_SEC, SL_DEG, SL_MIN, SL_SEC, TIME_REF, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_CITY_COORDINATE','P_CITY_COORDINATE_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),'" . $this->SQLValue($this->cp["CITY_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_COUNTRY_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["EM_DEG"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["EM_MIN"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["EM_SEC"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["SL_DEG"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["SL_MIN"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["SL_SEC"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["TIME_REF"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @59-5E1B6101
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CITY_NAME"] = new clsSQLParameter("ctrlCITY_NAME", ccsText, "", "", $this->CITY_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_COUNTRY_ID"] = new clsSQLParameter("ctrlP_COUNTRY_ID", ccsFloat, "", "", $this->P_COUNTRY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_DEG"] = new clsSQLParameter("ctrlEM_DEG", ccsFloat, "", "", $this->EM_DEG->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_MIN"] = new clsSQLParameter("ctrlEM_MIN", ccsFloat, "", "", $this->EM_MIN->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["EM_SEC"] = new clsSQLParameter("ctrlEM_SEC", ccsFloat, "", "", $this->EM_SEC->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_DEG"] = new clsSQLParameter("ctrlSL_DEG", ccsFloat, "", "", $this->SL_DEG->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_MIN"] = new clsSQLParameter("ctrlSL_MIN", ccsFloat, "", "", $this->SL_MIN->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["SL_SEC"] = new clsSQLParameter("ctrlSL_SEC", ccsFloat, "", "", $this->SL_SEC->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TIME_REF"] = new clsSQLParameter("ctrlTIME_REF", ccsFloat, "", "", $this->TIME_REF->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CITY_COORDINATE_ID"] = new clsSQLParameter("ctrlP_CITY_COORDINATE_ID", ccsFloat, "", "", $this->P_CITY_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["CITY_NAME"]->GetValue()) and !strlen($this->cp["CITY_NAME"]->GetText()) and !is_bool($this->cp["CITY_NAME"]->GetValue())) 
            $this->cp["CITY_NAME"]->SetValue($this->CITY_NAME->GetValue(true));
        if (!is_null($this->cp["P_COUNTRY_ID"]->GetValue()) and !strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue())) 
            $this->cp["P_COUNTRY_ID"]->SetValue($this->P_COUNTRY_ID->GetValue(true));
        if (!strlen($this->cp["P_COUNTRY_ID"]->GetText()) and !is_bool($this->cp["P_COUNTRY_ID"]->GetValue(true))) 
            $this->cp["P_COUNTRY_ID"]->SetText(0);
        if (!is_null($this->cp["EM_DEG"]->GetValue()) and !strlen($this->cp["EM_DEG"]->GetText()) and !is_bool($this->cp["EM_DEG"]->GetValue())) 
            $this->cp["EM_DEG"]->SetValue($this->EM_DEG->GetValue(true));
        if (!strlen($this->cp["EM_DEG"]->GetText()) and !is_bool($this->cp["EM_DEG"]->GetValue(true))) 
            $this->cp["EM_DEG"]->SetText(0);
        if (!is_null($this->cp["EM_MIN"]->GetValue()) and !strlen($this->cp["EM_MIN"]->GetText()) and !is_bool($this->cp["EM_MIN"]->GetValue())) 
            $this->cp["EM_MIN"]->SetValue($this->EM_MIN->GetValue(true));
        if (!strlen($this->cp["EM_MIN"]->GetText()) and !is_bool($this->cp["EM_MIN"]->GetValue(true))) 
            $this->cp["EM_MIN"]->SetText(0);
        if (!is_null($this->cp["EM_SEC"]->GetValue()) and !strlen($this->cp["EM_SEC"]->GetText()) and !is_bool($this->cp["EM_SEC"]->GetValue())) 
            $this->cp["EM_SEC"]->SetValue($this->EM_SEC->GetValue(true));
        if (!strlen($this->cp["EM_SEC"]->GetText()) and !is_bool($this->cp["EM_SEC"]->GetValue(true))) 
            $this->cp["EM_SEC"]->SetText(0);
        if (!is_null($this->cp["SL_DEG"]->GetValue()) and !strlen($this->cp["SL_DEG"]->GetText()) and !is_bool($this->cp["SL_DEG"]->GetValue())) 
            $this->cp["SL_DEG"]->SetValue($this->SL_DEG->GetValue(true));
        if (!strlen($this->cp["SL_DEG"]->GetText()) and !is_bool($this->cp["SL_DEG"]->GetValue(true))) 
            $this->cp["SL_DEG"]->SetText(0);
        if (!is_null($this->cp["SL_MIN"]->GetValue()) and !strlen($this->cp["SL_MIN"]->GetText()) and !is_bool($this->cp["SL_MIN"]->GetValue())) 
            $this->cp["SL_MIN"]->SetValue($this->SL_MIN->GetValue(true));
        if (!strlen($this->cp["SL_MIN"]->GetText()) and !is_bool($this->cp["SL_MIN"]->GetValue(true))) 
            $this->cp["SL_MIN"]->SetText(0);
        if (!is_null($this->cp["SL_SEC"]->GetValue()) and !strlen($this->cp["SL_SEC"]->GetText()) and !is_bool($this->cp["SL_SEC"]->GetValue())) 
            $this->cp["SL_SEC"]->SetValue($this->SL_SEC->GetValue(true));
        if (!strlen($this->cp["SL_SEC"]->GetText()) and !is_bool($this->cp["SL_SEC"]->GetValue(true))) 
            $this->cp["SL_SEC"]->SetText(0);
        if (!is_null($this->cp["TIME_REF"]->GetValue()) and !strlen($this->cp["TIME_REF"]->GetText()) and !is_bool($this->cp["TIME_REF"]->GetValue())) 
            $this->cp["TIME_REF"]->SetValue($this->TIME_REF->GetValue(true));
        if (!strlen($this->cp["TIME_REF"]->GetText()) and !is_bool($this->cp["TIME_REF"]->GetValue(true))) 
            $this->cp["TIME_REF"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_CITY_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetText(0);
        $this->SQL = "UPDATE P_CITY_COORDINATE SET \n" .
        "CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "CITY_NAME='" . $this->SQLValue($this->cp["CITY_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "P_COUNTRY_ID=" . $this->SQLValue($this->cp["P_COUNTRY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "EM_DEG=" . $this->SQLValue($this->cp["EM_DEG"]->GetDBValue(), ccsFloat) . ",\n" .
        "EM_MIN=" . $this->SQLValue($this->cp["EM_MIN"]->GetDBValue(), ccsFloat) . ",\n" .
        "EM_SEC=" . $this->SQLValue($this->cp["EM_SEC"]->GetDBValue(), ccsFloat) . ",\n" .
        "SL_DEG=" . $this->SQLValue($this->cp["SL_DEG"]->GetDBValue(), ccsFloat) . ",\n" .
        "SL_MIN=" . $this->SQLValue($this->cp["SL_MIN"]->GetDBValue(), ccsFloat) . ",\n" .
        "SL_SEC=" . $this->SQLValue($this->cp["SL_SEC"]->GetDBValue(), ccsFloat) . ",\n" .
        "TIME_REF=" . $this->SQLValue($this->cp["TIME_REF"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_CITY_COORDINATE_ID = " . $this->SQLValue($this->cp["P_CITY_COORDINATE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @59-3191AA7F
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_CITY_COORDINATE_ID"] = new clsSQLParameter("ctrlP_CITY_COORDINATE_ID", ccsFloat, "", "", $this->P_CITY_COORDINATE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_CITY_COORDINATE_ID"]->GetValue()) and !strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue())) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetValue($this->P_CITY_COORDINATE_ID->GetValue(true));
        if (!strlen($this->cp["P_CITY_COORDINATE_ID"]->GetText()) and !is_bool($this->cp["P_CITY_COORDINATE_ID"]->GetValue(true))) 
            $this->cp["P_CITY_COORDINATE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_CITY_COORDINATE WHERE P_CITY_COORDINATE_ID = " . $this->SQLValue($this->cp["P_CITY_COORDINATE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_city_coordinate1DataSource Class @59-FCB6E20C

//Initialize Page @1-04394F74
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
$TemplateFileName = "p_city_coordinate.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-A46E47BC
include_once("./p_city_coordinate_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AB71B513
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_CITY_COORDINATE = & new clsGridP_CITY_COORDINATE("", $MainPage);
$P_CITY_COORDINATESearch = & new clsRecordP_CITY_COORDINATESearch("", $MainPage);
$p_city_coordinate1 = & new clsRecordp_city_coordinate1("", $MainPage);
$MainPage->P_CITY_COORDINATE = & $P_CITY_COORDINATE;
$MainPage->P_CITY_COORDINATESearch = & $P_CITY_COORDINATESearch;
$MainPage->p_city_coordinate1 = & $p_city_coordinate1;
$P_CITY_COORDINATE->Initialize();
$p_city_coordinate1->Initialize();

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

//Execute Components @1-0B13FDF1
$P_CITY_COORDINATESearch->Operation();
$p_city_coordinate1->Operation();
//End Execute Components

//Go to destination page @1-6C5762F4
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_CITY_COORDINATE);
    unset($P_CITY_COORDINATESearch);
    unset($p_city_coordinate1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A91B048F
$P_CITY_COORDINATE->Show();
$P_CITY_COORDINATESearch->Show();
$p_city_coordinate1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-80987080
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_CITY_COORDINATE);
unset($P_CITY_COORDINATESearch);
unset($p_city_coordinate1);
unset($Tpl);
//End Unload Page


?>
