<?php
//Include Common Files @1-261299A5
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_customer_title.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_CUSTOMER_TITLE { //P_CUSTOMER_TITLE class @2-FDB45D0C

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

//Class_Initialize Event @2-8071DD86
    function clsGridP_CUSTOMER_TITLE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_CUSTOMER_TITLE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_CUSTOMER_TITLE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_CUSTOMER_TITLEDataSource($this);
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
        $this->P_TITLE_POSITION_NAME = & new clsControl(ccsLabel, "P_TITLE_POSITION_NAME", "P_TITLE_POSITION_NAME", ccsText, "", CCGetRequestParam("P_TITLE_POSITION_NAME", ccsGet, NULL), $this);
        $this->P_CUSTOMER_SEGMENT_NAME = & new clsControl(ccsLabel, "P_CUSTOMER_SEGMENT_NAME", "P_CUSTOMER_SEGMENT_NAME", ccsText, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_NAME", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_customer_title.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_customer_title.php";
        $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this, "P_CUSTOMER_TITLE_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_CUSTOMER_TITLE_Insert = & new clsControl(ccsLink, "P_CUSTOMER_TITLE_Insert", "P_CUSTOMER_TITLE_Insert", ccsText, "", CCGetRequestParam("P_CUSTOMER_TITLE_Insert", ccsGet, NULL), $this);
        $this->P_CUSTOMER_TITLE_Insert->Page = "p_customer_title.php";
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

//Show Method @2-61489E28
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
            $this->ControlsVisible["P_TITLE_POSITION_NAME"] = $this->P_TITLE_POSITION_NAME->Visible;
            $this->ControlsVisible["P_CUSTOMER_SEGMENT_NAME"] = $this->P_CUSTOMER_SEGMENT_NAME->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_CUSTOMER_TITLE_ID"] = $this->P_CUSTOMER_TITLE_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->P_TITLE_POSITION_NAME->SetValue($this->DataSource->P_TITLE_POSITION_NAME->GetValue());
                $this->P_CUSTOMER_SEGMENT_NAME->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_NAME->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_CUSTOMER_TITLE_ID", $this->DataSource->f("P_CUSTOMER_TITLE_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_CUSTOMER_TITLE_ID", $this->DataSource->f("P_CUSTOMER_TITLE_ID"));
                $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->P_TITLE_POSITION_NAME->Show();
                $this->P_CUSTOMER_SEGMENT_NAME->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_CUSTOMER_TITLE_ID->Show();
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
        $this->P_CUSTOMER_TITLE_Insert->Parameters = CCGetQueryString("QueryString", array("P_CUSTOMER_TITLE_ID", "ccsForm"));
        $this->P_CUSTOMER_TITLE_Insert->Parameters = CCAddParam($this->P_CUSTOMER_TITLE_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_CUSTOMER_TITLE_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-32D18FB3
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_TITLE_POSITION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_SEGMENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_CUSTOMER_TITLE Class @2-FCB6E20C

class clsP_CUSTOMER_TITLEDataSource extends clsDBConn {  //P_CUSTOMER_TITLEDataSource Class @2-D529AB67

//DataSource Variables @2-3BA408D6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $P_TITLE_POSITION_NAME;
    var $P_CUSTOMER_SEGMENT_NAME;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_CUSTOMER_TITLE_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A0D7FF74
    function clsP_CUSTOMER_TITLEDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_CUSTOMER_TITLE";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_TITLE_POSITION_NAME = new clsField("P_TITLE_POSITION_NAME", ccsText, "");
        
        $this->P_CUSTOMER_SEGMENT_NAME = new clsField("P_CUSTOMER_SEGMENT_NAME", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-BEF8C08B
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "A.p_customer_title_ID desc";
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

//Open Method @2-AF1F97B6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as p_title_position_name,c.code as p_customer_segment_name from p_customer_title a , p_title_position b , p_customer_segment c\n" .
        "where a.p_title_position_id=b.p_title_position_id and a.p_customer_segment_id=c.p_customer_segment_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as p_title_position_name,c.code as p_customer_segment_name from p_customer_title a , p_title_position b , p_customer_segment c\n" .
        "where a.p_title_position_id=b.p_title_position_id and a.p_customer_segment_id=c.p_customer_segment_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') {SQL_OrderBy}";
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

//SetValues Method @2-4F1C2331
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_TITLE_POSITION_NAME->SetDBValue($this->f("P_TITLE_POSITION_NAME"));
        $this->P_CUSTOMER_SEGMENT_NAME->SetDBValue($this->f("P_CUSTOMER_SEGMENT_NAME"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_CUSTOMER_TITLE_ID"));
        $this->ADLink->SetDBValue($this->f("P_CUSTOMER_TITLE_ID"));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue(trim($this->f("P_CUSTOMER_TITLE_ID")));
    }
//End SetValues Method

} //End P_CUSTOMER_TITLEDataSource Class @2-FCB6E20C

class clsRecordP_CUSTOMER_TITLESearch { //P_CUSTOMER_TITLESearch Class @3-9C11CF2A

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

//Class_Initialize Event @3-5854334D
    function clsRecordP_CUSTOMER_TITLESearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_CUSTOMER_TITLESearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_CUSTOMER_TITLESearch";
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

//Operation Method @3-8595B4C0
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
        $Redirect = "p_customer_title.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_customer_title.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_CUSTOMER_TITLESearch Class @3-FCB6E20C

class clsRecordp_customer_title1 { //p_customer_title1 Class @37-C224A62B

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

//Class_Initialize Event @37-3E5F19DB
    function clsRecordp_customer_title1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_customer_title1/Error";
        $this->DataSource = new clsp_customer_title1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_customer_title1";
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
            $this->P_TITLE_POSITION_ID = & new clsControl(ccsHidden, "P_TITLE_POSITION_ID", "P TITLE POSITION ID", ccsFloat, "", CCGetRequestParam("P_TITLE_POSITION_ID", $Method, NULL), $this);
            $this->P_TITLE_POSITION_ID->Required = true;
            $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsHidden, "P_CUSTOMER_SEGMENT_ID", "P CUSTOMER SEGMENT ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", $Method, NULL), $this);
            $this->P_CUSTOMER_SEGMENT_ID->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", $Method, NULL), $this);
            $this->P_TITLE_POSITION_NAME = & new clsControl(ccsTextBox, "P_TITLE_POSITION_NAME", "P TITLE POSITION ID", ccsText, "", CCGetRequestParam("P_TITLE_POSITION_NAME", $Method, NULL), $this);
            $this->P_TITLE_POSITION_NAME->Required = true;
            $this->P_CUSTOMER_SEGMENT_NAME = & new clsControl(ccsTextBox, "P_CUSTOMER_SEGMENT_NAME", "P CUSTOMER SEGMENT ID", ccsText, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_NAME", $Method, NULL), $this);
            $this->P_CUSTOMER_SEGMENT_NAME->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @37-68A0E209
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_CUSTOMER_TITLE_ID"] = CCGetFromGet("P_CUSTOMER_TITLE_ID", NULL);
    }
//End Initialize Method

//Validate Method @37-D7BEC3E0
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->P_TITLE_POSITION_ID->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_TITLE_ID->Validate() && $Validation);
        $Validation = ($this->P_TITLE_POSITION_NAME->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_SEGMENT_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TITLE_POSITION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_TITLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_TITLE_POSITION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_SEGMENT_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @37-35355876
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->P_TITLE_POSITION_ID->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_TITLE_ID->Errors->Count());
        $errors = ($errors || $this->P_TITLE_POSITION_NAME->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_SEGMENT_NAME->Errors->Count());
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

//InsertRow Method @37-9D769EC3
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_TITLE_POSITION_ID->SetValue($this->P_TITLE_POSITION_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @37-F9D26F39
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->P_TITLE_POSITION_ID->SetValue($this->P_TITLE_POSITION_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @37-F5F23E72
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @37-ABFC438C
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
                    $this->P_TITLE_POSITION_ID->SetValue($this->DataSource->P_TITLE_POSITION_ID->GetValue());
                    $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                    $this->P_TITLE_POSITION_NAME->SetValue($this->DataSource->P_TITLE_POSITION_NAME->GetValue());
                    $this->P_CUSTOMER_SEGMENT_NAME->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TITLE_POSITION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_TITLE_POSITION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_SEGMENT_NAME->Errors->ToString());
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
        $this->P_TITLE_POSITION_ID->Show();
        $this->P_CUSTOMER_SEGMENT_ID->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_CUSTOMER_TITLE_ID->Show();
        $this->P_TITLE_POSITION_NAME->Show();
        $this->P_CUSTOMER_SEGMENT_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_customer_title1 Class @37-FCB6E20C

class clsp_customer_title1DataSource extends clsDBConn {  //p_customer_title1DataSource Class @37-8672C788

//DataSource Variables @37-68752208
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
    var $P_TITLE_POSITION_ID;
    var $P_CUSTOMER_SEGMENT_ID;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $P_CUSTOMER_TITLE_ID;
    var $P_TITLE_POSITION_NAME;
    var $P_CUSTOMER_SEGMENT_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @37-EEF6CB9B
    function clsp_customer_title1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_customer_title1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_TITLE_POSITION_ID = new clsField("P_TITLE_POSITION_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsFloat, "");
        
        $this->P_TITLE_POSITION_NAME = new clsField("P_TITLE_POSITION_NAME", ccsText, "");
        
        $this->P_CUSTOMER_SEGMENT_NAME = new clsField("P_CUSTOMER_SEGMENT_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @37-5B2F37B0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->Parameters["urlP_CUSTOMER_TITLE_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @37-D47042E3
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_title_position_name,c.code as p_customer_segment_name from p_customer_title a , p_title_position b , p_customer_segment c\n" .
        "where a.p_title_position_id=b.p_title_position_id and a.p_customer_segment_id=c.p_customer_segment_id\n" .
        "and a.P_CUSTOMER_TITLE_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @37-8BF2612E
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_TITLE_POSITION_ID->SetDBValue(trim($this->f("P_TITLE_POSITION_ID")));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue(trim($this->f("P_CUSTOMER_TITLE_ID")));
        $this->P_TITLE_POSITION_NAME->SetDBValue($this->f("P_TITLE_POSITION_NAME"));
        $this->P_CUSTOMER_SEGMENT_NAME->SetDBValue($this->f("P_CUSTOMER_SEGMENT_NAME"));
    }
//End SetValues Method

//Insert Method @37-8C0F9C40
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_TITLE_POSITION_ID"] = new clsSQLParameter("ctrlP_TITLE_POSITION_ID", ccsFloat, "", "", $this->P_TITLE_POSITION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_TITLE_POSITION_ID"]->GetValue()) and !strlen($this->cp["P_TITLE_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_TITLE_POSITION_ID"]->GetValue())) 
            $this->cp["P_TITLE_POSITION_ID"]->SetValue($this->P_TITLE_POSITION_ID->GetValue(true));
        if (!strlen($this->cp["P_TITLE_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_TITLE_POSITION_ID"]->GetValue(true))) 
            $this->cp["P_TITLE_POSITION_ID"]->SetText(0);
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_CUSTOMER_TITLE(P_CUSTOMER_TITLE_ID, CODE, P_TITLE_POSITION_ID, P_CUSTOMER_SEGMENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_CUSTOMER_TITLE','P_CUSTOMER_TITLE_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'))," . $this->SQLValue($this->cp["P_TITLE_POSITION_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate,'{UPDATED_BY}')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @37-61995451
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_TITLE_POSITION_ID"] = new clsSQLParameter("ctrlP_TITLE_POSITION_ID", ccsFloat, "", "", $this->P_TITLE_POSITION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetText(0);
        if (!is_null($this->cp["P_TITLE_POSITION_ID"]->GetValue()) and !strlen($this->cp["P_TITLE_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_TITLE_POSITION_ID"]->GetValue())) 
            $this->cp["P_TITLE_POSITION_ID"]->SetValue($this->P_TITLE_POSITION_ID->GetValue(true));
        if (!strlen($this->cp["P_TITLE_POSITION_ID"]->GetText()) and !is_bool($this->cp["P_TITLE_POSITION_ID"]->GetValue(true))) 
            $this->cp["P_TITLE_POSITION_ID"]->SetText(0);
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetText(0);
        $this->SQL = "UPDATE P_CUSTOMER_TITLE SET \n" .
        "	CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')),\n" .
        "	P_TITLE_POSITION_ID=" . $this->SQLValue($this->cp["P_TITLE_POSITION_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "	P_CUSTOMER_SEGMENT_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "	DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')), \n" .
        "	UPDATE_DATE=sysdate, \n" .
        "	UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        "	WHERE  P_CUSTOMER_TITLE_ID = " . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @37-E54CD6E6
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_CUSTOMER_TITLE WHERE P_CUSTOMER_TITLE_ID = " . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_customer_title1DataSource Class @37-FCB6E20C

//Initialize Page @1-2980F013
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
$TemplateFileName = "p_customer_title.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-9C59C9A8
include_once("./p_customer_title_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C2EEC390
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_CUSTOMER_TITLE = & new clsGridP_CUSTOMER_TITLE("", $MainPage);
$P_CUSTOMER_TITLESearch = & new clsRecordP_CUSTOMER_TITLESearch("", $MainPage);
$p_customer_title1 = & new clsRecordp_customer_title1("", $MainPage);
$MainPage->P_CUSTOMER_TITLE = & $P_CUSTOMER_TITLE;
$MainPage->P_CUSTOMER_TITLESearch = & $P_CUSTOMER_TITLESearch;
$MainPage->p_customer_title1 = & $p_customer_title1;
$P_CUSTOMER_TITLE->Initialize();
$p_customer_title1->Initialize();

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

//Execute Components @1-FABE0A34
$P_CUSTOMER_TITLESearch->Operation();
$p_customer_title1->Operation();
//End Execute Components

//Go to destination page @1-C6BD871B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_CUSTOMER_TITLE);
    unset($P_CUSTOMER_TITLESearch);
    unset($p_customer_title1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B15CB706
$P_CUSTOMER_TITLE->Show();
$P_CUSTOMER_TITLESearch->Show();
$p_customer_title1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1EBF4AAC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_CUSTOMER_TITLE);
unset($P_CUSTOMER_TITLESearch);
unset($p_customer_title1);
unset($Tpl);
//End Unload Page


?>
