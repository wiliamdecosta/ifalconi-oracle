<?php
//Include Common Files @1-76D7055B
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_account_rep_info.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_ACCOUNT_REP_INFO { //P_ACCOUNT_REP_INFO class @2-CD2F2A3A

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

//Class_Initialize Event @2-D541D456
    function clsGridP_ACCOUNT_REP_INFO($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_ACCOUNT_REP_INFO";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_ACCOUNT_REP_INFO";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_ACCOUNT_REP_INFODataSource($this);
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

        $this->ACCOUNT_NAME = & new clsControl(ccsLabel, "ACCOUNT_NAME", "ACCOUNT_NAME", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", ccsGet, NULL), $this);
        $this->P_REFERENCE_LIST_NAME = & new clsControl(ccsLabel, "P_REFERENCE_LIST_NAME", "P_REFERENCE_LIST_NAME", ccsText, "", CCGetRequestParam("P_REFERENCE_LIST_NAME", ccsGet, NULL), $this);
        $this->INFO_DESC = & new clsControl(ccsLabel, "INFO_DESC", "INFO_DESC", ccsText, "", CCGetRequestParam("INFO_DESC", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_account_rep_info.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_account_rep_info.php";
        $this->P_ACCOUNT_REP_INFO_ID = & new clsControl(ccsHidden, "P_ACCOUNT_REP_INFO_ID", "P_ACCOUNT_REP_INFO_ID", ccsFloat, "", CCGetRequestParam("P_ACCOUNT_REP_INFO_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_ACCOUNT_REP_INFO_Insert = & new clsControl(ccsLink, "P_ACCOUNT_REP_INFO_Insert", "P_ACCOUNT_REP_INFO_Insert", ccsText, "", CCGetRequestParam("P_ACCOUNT_REP_INFO_Insert", ccsGet, NULL), $this);
        $this->P_ACCOUNT_REP_INFO_Insert->Page = "p_account_rep_info.php";
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

//Show Method @2-96734BC9
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
            $this->ControlsVisible["ACCOUNT_NAME"] = $this->ACCOUNT_NAME->Visible;
            $this->ControlsVisible["P_REFERENCE_LIST_NAME"] = $this->P_REFERENCE_LIST_NAME->Visible;
            $this->ControlsVisible["INFO_DESC"] = $this->INFO_DESC->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_ACCOUNT_REP_INFO_ID"] = $this->P_ACCOUNT_REP_INFO_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                $this->P_REFERENCE_LIST_NAME->SetValue($this->DataSource->P_REFERENCE_LIST_NAME->GetValue());
                $this->INFO_DESC->SetValue($this->DataSource->INFO_DESC->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_ACCOUNT_REP_INFO_ID", $this->DataSource->f("P_ACCOUNT_REP_INFO_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_ACCOUNT_REP_INFO_ID", $this->DataSource->f("P_ACCOUNT_REP_INFO_ID"));
                $this->P_ACCOUNT_REP_INFO_ID->SetValue($this->DataSource->P_ACCOUNT_REP_INFO_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ACCOUNT_NAME->Show();
                $this->P_REFERENCE_LIST_NAME->Show();
                $this->INFO_DESC->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_ACCOUNT_REP_INFO_ID->Show();
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
        $this->P_ACCOUNT_REP_INFO_Insert->Parameters = CCGetQueryString("QueryString", array("P_ACCOUNT_REP_INFO_ID", "ccsForm"));
        $this->P_ACCOUNT_REP_INFO_Insert->Parameters = CCAddParam($this->P_ACCOUNT_REP_INFO_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_ACCOUNT_REP_INFO_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-1476969B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ACCOUNT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REFERENCE_LIST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INFO_DESC->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ACCOUNT_REP_INFO_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_ACCOUNT_REP_INFO Class @2-FCB6E20C

class clsP_ACCOUNT_REP_INFODataSource extends clsDBConn {  //P_ACCOUNT_REP_INFODataSource Class @2-2B7CE8DE

//DataSource Variables @2-AC1A4B1D
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $ACCOUNT_NAME;
    var $P_REFERENCE_LIST_NAME;
    var $INFO_DESC;
    var $DLink;
    var $ADLink;
    var $P_ACCOUNT_REP_INFO_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-19091823
    function clsP_ACCOUNT_REP_INFODataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_ACCOUNT_REP_INFO";
        $this->Initialize();
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->P_REFERENCE_LIST_NAME = new clsField("P_REFERENCE_LIST_NAME", ccsText, "");
        
        $this->INFO_DESC = new clsField("INFO_DESC", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_ACCOUNT_REP_INFO_ID = new clsField("P_ACCOUNT_REP_INFO_ID", ccsFloat, "");
        

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

//Open Method @2-C08F05AA
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.ACCOUNT_NAME , c.CODE as p_reference_list_name from p_account_rep_info a ,\n" .
        "		p_account_rep b,\n" .
        "		p_reference_list c\n" .
        "where a.p_account_rep_id=b.p_account_rep_id\n" .
        "and a.p_reference_list_id=c.p_reference_list_id\n" .
        "and \n" .
        "(\n" .
        "upper(a.INFO_DESC) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(b.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(b.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")\n" .
        "\n" .
        ") cnt";
        $this->SQL = "select a.*,b.ACCOUNT_NAME , c.CODE as p_reference_list_name from p_account_rep_info a ,\n" .
        "		p_account_rep b,\n" .
        "		p_reference_list c\n" .
        "where a.p_account_rep_id=b.p_account_rep_id\n" .
        "and a.p_reference_list_id=c.p_reference_list_id\n" .
        "and \n" .
        "(\n" .
        "upper(a.INFO_DESC) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(b.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') or\n" .
        "upper(b.ACCOUNT_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")\n" .
        "\n" .
        "";
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

//SetValues Method @2-6A45BEE6
    function SetValues()
    {
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->P_REFERENCE_LIST_NAME->SetDBValue($this->f("P_REFERENCE_LIST_NAME"));
        $this->INFO_DESC->SetDBValue($this->f("INFO_DESC"));
        $this->DLink->SetDBValue($this->f("P_ACCOUNT_REP_INFO_ID"));
        $this->ADLink->SetDBValue($this->f("P_ACCOUNT_REP_INFO_ID"));
        $this->P_ACCOUNT_REP_INFO_ID->SetDBValue(trim($this->f("P_ACCOUNT_REP_INFO_ID")));
    }
//End SetValues Method

} //End P_ACCOUNT_REP_INFODataSource Class @2-FCB6E20C

class clsRecordP_ACCOUNT_REP_INFOSearch { //P_ACCOUNT_REP_INFOSearch Class @3-C9ADC12A

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

//Class_Initialize Event @3-8E02D752
    function clsRecordP_ACCOUNT_REP_INFOSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_ACCOUNT_REP_INFOSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_ACCOUNT_REP_INFOSearch";
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

//Operation Method @3-EFEE1264
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
        $Redirect = "p_account_rep_info.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_account_rep_info.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_ACCOUNT_REP_INFOSearch Class @3-FCB6E20C

class clsRecordp_account_rep_info1 { //p_account_rep_info1 Class @31-D6D22AEB

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

//Class_Initialize Event @31-5AD79F0A
    function clsRecordp_account_rep_info1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_account_rep_info1/Error";
        $this->DataSource = new clsp_account_rep_info1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_account_rep_info1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->P_ACCOUNT_REP_ID = & new clsControl(ccsHidden, "P_ACCOUNT_REP_ID", "P ACCOUNT REP ID", ccsFloat, "", CCGetRequestParam("P_ACCOUNT_REP_ID", $Method, NULL), $this);
            $this->P_ACCOUNT_REP_ID->Required = true;
            $this->P_REFERENCE_LIST_ID = & new clsControl(ccsHidden, "P_REFERENCE_LIST_ID", "P REFERENCE LIST ID", ccsFloat, "", CCGetRequestParam("P_REFERENCE_LIST_ID", $Method, NULL), $this);
            $this->P_REFERENCE_LIST_ID->Required = true;
            $this->INFO_DESC = & new clsControl(ccsTextBox, "INFO_DESC", "INFO DESC", ccsText, "", CCGetRequestParam("INFO_DESC", $Method, NULL), $this);
            $this->INFO_DESC->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "p_account_rep_info1", "VALID_FROM", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, $DefaultDateFormat, CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "p_account_rep_info1", "VALID_TO", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATED_BY->Required = true;
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->UPDATED_DATE->Required = true;
            $this->ACCOUNT_NAME = & new clsControl(ccsTextBox, "ACCOUNT_NAME", "P ACCOUNT REP ID", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", $Method, NULL), $this);
            $this->P_REFERENCE_LIST_NAME = & new clsControl(ccsTextBox, "P_REFERENCE_LIST_NAME", "P REFERENCE LIST ID", ccsText, "", CCGetRequestParam("P_REFERENCE_LIST_NAME", $Method, NULL), $this);
            $this->P_ACCOUNT_REP_INFO_ID = & new clsControl(ccsHidden, "P_ACCOUNT_REP_INFO_ID", "P_ACCOUNT_REP_INFO_ID", ccsFloat, "", CCGetRequestParam("P_ACCOUNT_REP_INFO_ID", $Method, NULL), $this);
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

//Initialize Method @31-3521CB08
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_ACCOUNT_REP_INFO_ID"] = CCGetFromGet("P_ACCOUNT_REP_INFO_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-B00D3760
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_ACCOUNT_REP_ID->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_LIST_ID->Validate() && $Validation);
        $Validation = ($this->INFO_DESC->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->ACCOUNT_NAME->Validate() && $Validation);
        $Validation = ($this->P_REFERENCE_LIST_NAME->Validate() && $Validation);
        $Validation = ($this->P_ACCOUNT_REP_INFO_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_ACCOUNT_REP_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_LIST_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INFO_DESC->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACCOUNT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REFERENCE_LIST_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ACCOUNT_REP_INFO_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-112CCE59
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_ACCOUNT_REP_ID->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_LIST_ID->Errors->Count());
        $errors = ($errors || $this->INFO_DESC->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->ACCOUNT_NAME->Errors->Count());
        $errors = ($errors || $this->P_REFERENCE_LIST_NAME->Errors->Count());
        $errors = ($errors || $this->P_ACCOUNT_REP_INFO_ID->Errors->Count());
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

//Operation Method @31-872C026F
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

//InsertRow Method @31-6F39AA6A
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_ACCOUNT_REP_ID->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        $this->DataSource->P_REFERENCE_LIST_ID->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        $this->DataSource->INFO_DESC->SetValue($this->INFO_DESC->GetValue(true));
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

//UpdateRow Method @31-97DF17BC
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_ACCOUNT_REP_ID->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        $this->DataSource->P_REFERENCE_LIST_ID->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        $this->DataSource->INFO_DESC->SetValue($this->INFO_DESC->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_ACCOUNT_REP_INFO_ID->SetValue($this->P_ACCOUNT_REP_INFO_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-E601968B
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_ACCOUNT_REP_INFO_ID->SetValue($this->P_ACCOUNT_REP_INFO_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-8283DFDF
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
                    $this->P_ACCOUNT_REP_ID->SetValue($this->DataSource->P_ACCOUNT_REP_ID->GetValue());
                    $this->P_REFERENCE_LIST_ID->SetValue($this->DataSource->P_REFERENCE_LIST_ID->GetValue());
                    $this->INFO_DESC->SetValue($this->DataSource->INFO_DESC->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                    $this->P_REFERENCE_LIST_NAME->SetValue($this->DataSource->P_REFERENCE_LIST_NAME->GetValue());
                    $this->P_ACCOUNT_REP_INFO_ID->SetValue($this->DataSource->P_ACCOUNT_REP_INFO_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_ACCOUNT_REP_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REFERENCE_LIST_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INFO_DESC->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACCOUNT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REFERENCE_LIST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ACCOUNT_REP_INFO_ID->Errors->ToString());
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

        $this->P_ACCOUNT_REP_ID->Show();
        $this->P_REFERENCE_LIST_ID->Show();
        $this->INFO_DESC->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->ACCOUNT_NAME->Show();
        $this->P_REFERENCE_LIST_NAME->Show();
        $this->P_ACCOUNT_REP_INFO_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_account_rep_info1 Class @31-FCB6E20C

class clsp_account_rep_info1DataSource extends clsDBConn {  //p_account_rep_info1DataSource Class @31-A54BA6FE

//DataSource Variables @31-2B10756E
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
    var $P_ACCOUNT_REP_ID;
    var $P_REFERENCE_LIST_ID;
    var $INFO_DESC;
    var $VALID_FROM;
    var $VALID_TO;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $ACCOUNT_NAME;
    var $P_REFERENCE_LIST_NAME;
    var $P_ACCOUNT_REP_INFO_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-8DE03B1F
    function clsp_account_rep_info1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_account_rep_info1/Error";
        $this->Initialize();
        $this->P_ACCOUNT_REP_ID = new clsField("P_ACCOUNT_REP_ID", ccsFloat, "");
        
        $this->P_REFERENCE_LIST_ID = new clsField("P_REFERENCE_LIST_ID", ccsFloat, "");
        
        $this->INFO_DESC = new clsField("INFO_DESC", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->P_REFERENCE_LIST_NAME = new clsField("P_REFERENCE_LIST_NAME", ccsText, "");
        
        $this->P_ACCOUNT_REP_INFO_ID = new clsField("P_ACCOUNT_REP_INFO_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-935B026F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_ACCOUNT_REP_INFO_ID", ccsFloat, "", "", $this->Parameters["urlP_ACCOUNT_REP_INFO_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @31-44041BF0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.ACCOUNT_NAME , c.CODE as p_reference_list_name from p_account_rep_info a ,\n" .
        "		p_account_rep b,\n" .
        "		p_reference_list c\n" .
        "where a.p_account_rep_id=b.p_account_rep_id\n" .
        "and a.p_reference_list_id=c.p_reference_list_id\n" .
        "and a.P_ACCOUNT_REP_INFO_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "\n" .
        "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-1F84455A
    function SetValues()
    {
        $this->P_ACCOUNT_REP_ID->SetDBValue(trim($this->f("P_ACCOUNT_REP_ID")));
        $this->P_REFERENCE_LIST_ID->SetDBValue(trim($this->f("P_REFERENCE_LIST_ID")));
        $this->INFO_DESC->SetDBValue($this->f("INFO_DESC"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->P_REFERENCE_LIST_NAME->SetDBValue($this->f("P_REFERENCE_LIST_NAME"));
        $this->P_ACCOUNT_REP_INFO_ID->SetDBValue(trim($this->f("P_ACCOUNT_REP_INFO_ID")));
    }
//End SetValues Method

//Insert Method @31-9D7F6F1B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ACCOUNT_REP_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_REFERENCE_LIST_ID"] = new clsSQLParameter("ctrlP_REFERENCE_LIST_ID", ccsFloat, "", "", $this->P_REFERENCE_LIST_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INFO_DESC"] = new clsSQLParameter("ctrlINFO_DESC", ccsText, "", "", $this->INFO_DESC->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_ACCOUNT_REP_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetText(0);
        if (!is_null($this->cp["P_REFERENCE_LIST_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetText(0);
        if (!is_null($this->cp["INFO_DESC"]->GetValue()) and !strlen($this->cp["INFO_DESC"]->GetText()) and !is_bool($this->cp["INFO_DESC"]->GetValue())) 
            $this->cp["INFO_DESC"]->SetValue($this->INFO_DESC->GetValue(true));
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
        $this->SQL = "INSERT INTO P_ACCOUNT_REP_INFO(P_ACCOUNT_REP_INFO_ID, P_ACCOUNT_REP_ID, P_REFERENCE_LIST_ID, INFO_DESC, VALID_FROM, VALID_TO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_ACCOUNT_REP_INFO','P_ACCOUNT_REP_INFO_ID')," . $this->SQLValue($this->cp["P_ACCOUNT_REP_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_REFERENCE_LIST_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["INFO_DESC"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-9304DC03
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ACCOUNT_REP_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_REFERENCE_LIST_ID"] = new clsSQLParameter("ctrlP_REFERENCE_LIST_ID", ccsFloat, "", "", $this->P_REFERENCE_LIST_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["INFO_DESC"] = new clsSQLParameter("ctrlINFO_DESC", ccsText, "", "", $this->INFO_DESC->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_FROM->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->VALID_TO->GetValue(true), 00-00-0000, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_ACCOUNT_REP_INFO_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_INFO_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_INFO_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_ACCOUNT_REP_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetValue($this->P_ACCOUNT_REP_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_ID"]->SetText(0);
        if (!is_null($this->cp["P_REFERENCE_LIST_ID"]->GetValue()) and !strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue())) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetValue($this->P_REFERENCE_LIST_ID->GetValue(true));
        if (!strlen($this->cp["P_REFERENCE_LIST_ID"]->GetText()) and !is_bool($this->cp["P_REFERENCE_LIST_ID"]->GetValue(true))) 
            $this->cp["P_REFERENCE_LIST_ID"]->SetText(0);
        if (!is_null($this->cp["INFO_DESC"]->GetValue()) and !strlen($this->cp["INFO_DESC"]->GetText()) and !is_bool($this->cp["INFO_DESC"]->GetValue())) 
            $this->cp["INFO_DESC"]->SetValue($this->INFO_DESC->GetValue(true));
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
        if (!is_null($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_INFO_ID"]->SetValue($this->P_ACCOUNT_REP_INFO_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_INFO_ID"]->SetText(0);
        $this->SQL = "UPDATE P_ACCOUNT_REP_INFO SET \n" .
        "P_ACCOUNT_REP_ID=" . $this->SQLValue($this->cp["P_ACCOUNT_REP_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_REFERENCE_LIST_ID=" . $this->SQLValue($this->cp["P_REFERENCE_LIST_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "INFO_DESC='" . $this->SQLValue($this->cp["INFO_DESC"]->GetDBValue(), ccsText) . "',\n" .
        "VALID_FROM='" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',\n" .
        "VALID_TO='" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_ACCOUNT_REP_INFO_ID = " . $this->SQLValue($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-F79D6678
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ACCOUNT_REP_INFO_ID"] = new clsSQLParameter("ctrlP_ACCOUNT_REP_INFO_ID", ccsFloat, "", "", $this->P_ACCOUNT_REP_INFO_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue()) and !strlen($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue())) 
            $this->cp["P_ACCOUNT_REP_INFO_ID"]->SetValue($this->P_ACCOUNT_REP_INFO_ID->GetValue(true));
        if (!strlen($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetText()) and !is_bool($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetValue(true))) 
            $this->cp["P_ACCOUNT_REP_INFO_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_ACCOUNT_REP_INFO WHERE P_ACCOUNT_REP_INFO_ID = " . $this->SQLValue($this->cp["P_ACCOUNT_REP_INFO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_account_rep_info1DataSource Class @31-FCB6E20C

//Initialize Page @1-0B60087D
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
$TemplateFileName = "p_account_rep_info.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-DEAF1837
include_once("./p_account_rep_info_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-AB3FAF72
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_ACCOUNT_REP_INFO = & new clsGridP_ACCOUNT_REP_INFO("", $MainPage);
$P_ACCOUNT_REP_INFOSearch = & new clsRecordP_ACCOUNT_REP_INFOSearch("", $MainPage);
$p_account_rep_info1 = & new clsRecordp_account_rep_info1("", $MainPage);
$MainPage->P_ACCOUNT_REP_INFO = & $P_ACCOUNT_REP_INFO;
$MainPage->P_ACCOUNT_REP_INFOSearch = & $P_ACCOUNT_REP_INFOSearch;
$MainPage->p_account_rep_info1 = & $p_account_rep_info1;
$P_ACCOUNT_REP_INFO->Initialize();
$p_account_rep_info1->Initialize();

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

//Execute Components @1-5769FF3A
$P_ACCOUNT_REP_INFOSearch->Operation();
$p_account_rep_info1->Operation();
//End Execute Components

//Go to destination page @1-5E444C8F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_ACCOUNT_REP_INFO);
    unset($P_ACCOUNT_REP_INFOSearch);
    unset($p_account_rep_info1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-AD458228
$P_ACCOUNT_REP_INFO->Show();
$P_ACCOUNT_REP_INFOSearch->Show();
$p_account_rep_info1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-B89C2D81
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_ACCOUNT_REP_INFO);
unset($P_ACCOUNT_REP_INFOSearch);
unset($p_account_rep_info1);
unset($Tpl);
//End Unload Page


?>
