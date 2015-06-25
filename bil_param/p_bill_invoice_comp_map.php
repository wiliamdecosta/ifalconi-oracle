<?php
//Include Common Files @1-5271B01D
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_bill_invoice_comp_map.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_BILL_INVOICE_COMP_MAP { //P_BILL_INVOICE_COMP_MAP class @2-436FBC09

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

//Class_Initialize Event @2-DDA32634
    function clsGridP_BILL_INVOICE_COMP_MAP($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_BILL_INVOICE_COMP_MAP";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_BILL_INVOICE_COMP_MAP";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_BILL_INVOICE_COMP_MAPDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 7;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->P_BILL_COMPONENT_NAME = & new clsControl(ccsLabel, "P_BILL_COMPONENT_NAME", "P_BILL_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_NAME", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsLabel, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", ccsGet, NULL), $this);
        $this->P_INVOICE_COMPONENT_NAME = & new clsControl(ccsLabel, "P_INVOICE_COMPONENT_NAME", "P_INVOICE_COMPONENT_NAME", ccsText, "", CCGetRequestParam("P_INVOICE_COMPONENT_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_bill_invoice_comp_map.php";
        $this->P_BILL_INVOICE_COMP_MAP_ID = & new clsControl(ccsHidden, "P_BILL_INVOICE_COMP_MAP_ID", "P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_BILL_INVOICE_COMP_MAP_Insert = & new clsControl(ccsLink, "P_BILL_INVOICE_COMP_MAP_Insert", "P_BILL_INVOICE_COMP_MAP_Insert", ccsText, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_Insert", ccsGet, NULL), $this);
        $this->P_BILL_INVOICE_COMP_MAP_Insert->HTML = true;
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Page = "p_bill_invoice_comp_map.php";
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

//Show Method @2-2049473F
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
            $this->ControlsVisible["P_BILL_COMPONENT_NAME"] = $this->P_BILL_COMPONENT_NAME->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_NAME"] = $this->P_SERVICE_TYPE_NAME->Visible;
            $this->ControlsVisible["P_INVOICE_COMPONENT_NAME"] = $this->P_INVOICE_COMPONENT_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_BILL_INVOICE_COMP_MAP_ID"] = $this->P_BILL_INVOICE_COMP_MAP_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->P_BILL_COMPONENT_NAME->SetValue($this->DataSource->P_BILL_COMPONENT_NAME->GetValue());
                $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                $this->P_INVOICE_COMPONENT_NAME->SetValue($this->DataSource->P_INVOICE_COMPONENT_NAME->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_BILL_INVOICE_COMP_MAP_ID", $this->DataSource->f("P_BILL_INVOICE_COMP_MAP_ID"));
                $this->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->P_BILL_COMPONENT_NAME->Show();
                $this->P_SERVICE_TYPE_NAME->Show();
                $this->P_INVOICE_COMPONENT_NAME->Show();
                $this->DLink->Show();
                $this->P_BILL_INVOICE_COMP_MAP_ID->Show();
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
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCGetQueryString("QueryString", array("P_BILL_INVOICE_COMP_MAP_ID", "ccsForm"));
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters = CCAddParam($this->P_BILL_INVOICE_COMP_MAP_Insert->Parameters, "TAMBAH", 1);
        $this->Navigator->Show();
        $this->P_BILL_INVOICE_COMP_MAP_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-0A4CED53
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->P_BILL_COMPONENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_INVOICE_COMPONENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_BILL_INVOICE_COMP_MAP Class @2-FCB6E20C

class clsP_BILL_INVOICE_COMP_MAPDataSource extends clsDBConn {  //P_BILL_INVOICE_COMP_MAPDataSource Class @2-489FA621

//DataSource Variables @2-A64CF0A5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $P_BILL_COMPONENT_NAME;
    var $P_SERVICE_TYPE_NAME;
    var $P_INVOICE_COMPONENT_NAME;
    var $P_BILL_INVOICE_COMP_MAP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-AF25506F
    function clsP_BILL_INVOICE_COMP_MAPDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_BILL_INVOICE_COMP_MAP";
        $this->Initialize();
        $this->P_BILL_COMPONENT_NAME = new clsField("P_BILL_COMPONENT_NAME", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_INVOICE_COMPONENT_NAME = new clsField("P_INVOICE_COMPONENT_NAME", ccsText, "");
        
        $this->P_BILL_INVOICE_COMP_MAP_ID = new clsField("P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "");
        

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

//Open Method @2-AE0B5D08
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME,C.CODE AS P_SERVICE_TYPE_NAME,D.CODE AS P_INVOICE_COMPONENT_NAME  FROM P_BILL_INVOICE_COMP_MAP A,\n" .
        "P_BILL_COMPONENT B,\n" .
        "P_SERVICE_TYPE C,\n" .
        "P_INVOICE_COMPONENT D\n" .
        "WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID\n" .
        "AND A.P_SERVICE_TYPE_ID = C.P_SERVICE_TYPE_ID\n" .
        "AND A.P_INVOICE_COMPONENT_ID = D.P_INVOICE_COMPONENT_ID\n" .
        "AND ((UPPER(B.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))OR(UPPER(C.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))OR(UPPER(D.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')))) cnt";
        $this->SQL = "SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME,C.CODE AS P_SERVICE_TYPE_NAME,D.CODE AS P_INVOICE_COMPONENT_NAME  FROM P_BILL_INVOICE_COMP_MAP A,\n" .
        "P_BILL_COMPONENT B,\n" .
        "P_SERVICE_TYPE C,\n" .
        "P_INVOICE_COMPONENT D\n" .
        "WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID\n" .
        "AND A.P_SERVICE_TYPE_ID = C.P_SERVICE_TYPE_ID\n" .
        "AND A.P_INVOICE_COMPONENT_ID = D.P_INVOICE_COMPONENT_ID\n" .
        "AND ((UPPER(B.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))OR(UPPER(C.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'))OR(UPPER(D.CODE)LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')))";
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

//SetValues Method @2-8012AFE9
    function SetValues()
    {
        $this->P_BILL_COMPONENT_NAME->SetDBValue($this->f("P_BILL_COMPONENT_NAME"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_INVOICE_COMPONENT_NAME->SetDBValue($this->f("P_INVOICE_COMPONENT_NAME"));
        $this->P_BILL_INVOICE_COMP_MAP_ID->SetDBValue(trim($this->f("P_BILL_INVOICE_COMP_MAP_ID")));
    }
//End SetValues Method

} //End P_BILL_INVOICE_COMP_MAPDataSource Class @2-FCB6E20C

class clsRecordP_BILL_INVOICE_COMP_MAPSearch { //P_BILL_INVOICE_COMP_MAPSearch Class @3-E6F4AC87

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

//Class_Initialize Event @3-C6CC32CD
    function clsRecordP_BILL_INVOICE_COMP_MAPSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BILL_INVOICE_COMP_MAPSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BILL_INVOICE_COMP_MAPSearch";
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

//Operation Method @3-2C0DBCB9
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
        $Redirect = "p_bill_invoice_comp_map.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_bill_invoice_comp_map.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y", "FLAG", "p_application_id")));
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

} //End P_BILL_INVOICE_COMP_MAPSearch Class @3-FCB6E20C

class clsRecordP_BILL_INVOICE_COMP_MAP1 { //P_BILL_INVOICE_COMP_MAP1 Class @22-B0681DA8

//Variables @22-D6FF3E86

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

//Class_Initialize Event @22-B489BB6A
    function clsRecordP_BILL_INVOICE_COMP_MAP1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_BILL_INVOICE_COMP_MAP1/Error";
        $this->DataSource = new clsP_BILL_INVOICE_COMP_MAP1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_BILL_INVOICE_COMP_MAP1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->P_BILL_COMPONENT_ID = & new clsControl(ccsHidden, "P_BILL_COMPONENT_ID", "P BILL COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_BILL_COMPONENT_ID", $Method, NULL), $this);
            $this->P_BILL_COMPONENT_ID->Required = true;
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID->Required = true;
            $this->P_INVOICE_COMPONENT_ID = & new clsControl(ccsHidden, "P_INVOICE_COMPONENT_ID", "P INVOICE COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_INVOICE_COMPONENT_ID", $Method, NULL), $this);
            $this->P_INVOICE_COMPONENT_ID->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "P_BILL_INVOICE_COMP_MAP1", "UPDATE_DATE", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_BILL_COMPONENT_NAME = & new clsControl(ccsTextBox, "P_BILL_COMPONENT_NAME", "P BILL COMPONENT ID", ccsText, "", CCGetRequestParam("P_BILL_COMPONENT_NAME", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_NAME", "P SERVICE TYPE ID", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", $Method, NULL), $this);
            $this->P_INVOICE_COMPONENT_NAME = & new clsControl(ccsTextBox, "P_INVOICE_COMPONENT_NAME", "P INVOICE COMPONENT ID", ccsText, "", CCGetRequestParam("P_INVOICE_COMPONENT_NAME", $Method, NULL), $this);
            $this->P_BILL_INVOICE_COMP_MAP_ID = & new clsControl(ccsHidden, "P_BILL_INVOICE_COMP_MAP_ID", "P BILL COMPONENT ID", ccsFloat, "", CCGetRequestParam("P_BILL_INVOICE_COMP_MAP_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @22-2DC62E3C
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_BILL_INVOICE_COMP_MAP_ID"] = CCGetFromGet("P_BILL_INVOICE_COMP_MAP_ID", NULL);
    }
//End Initialize Method

//Validate Method @22-C9343DDB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->P_BILL_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_INVOICE_COMPONENT_ID->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_BILL_COMPONENT_NAME->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_NAME->Validate() && $Validation);
        $Validation = ($this->P_INVOICE_COMPONENT_NAME->Validate() && $Validation);
        $Validation = ($this->P_BILL_INVOICE_COMP_MAP_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_INVOICE_COMPONENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_COMPONENT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_INVOICE_COMPONENT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_INVOICE_COMP_MAP_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @22-D4DBE7BE
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->P_BILL_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_INVOICE_COMPONENT_ID->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_BILL_COMPONENT_NAME->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_NAME->Errors->Count());
        $errors = ($errors || $this->P_INVOICE_COMPONENT_NAME->Errors->Count());
        $errors = ($errors || $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @22-ED598703
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

//Operation Method @22-BD7E7B45
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

//InsertRow Method @22-E06DFF51
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_INVOICE_COMPONENT_ID->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @22-E1FAA7D6
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_BILL_COMPONENT_ID->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->P_INVOICE_COMPONENT_ID->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @22-22910357
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @22-CA662616
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
                    $this->P_BILL_COMPONENT_ID->SetValue($this->DataSource->P_BILL_COMPONENT_ID->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                    $this->P_INVOICE_COMPONENT_ID->SetValue($this->DataSource->P_INVOICE_COMPONENT_ID->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_BILL_COMPONENT_NAME->SetValue($this->DataSource->P_BILL_COMPONENT_NAME->GetValue());
                    $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                    $this->P_INVOICE_COMPONENT_NAME->SetValue($this->DataSource->P_INVOICE_COMPONENT_NAME->GetValue());
                    $this->P_BILL_INVOICE_COMP_MAP_ID->SetValue($this->DataSource->P_BILL_INVOICE_COMP_MAP_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_INVOICE_COMPONENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_COMPONENT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_INVOICE_COMPONENT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_INVOICE_COMP_MAP_ID->Errors->ToString());
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

        $this->P_BILL_COMPONENT_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->P_INVOICE_COMPONENT_ID->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_BILL_COMPONENT_NAME->Show();
        $this->P_SERVICE_TYPE_NAME->Show();
        $this->P_INVOICE_COMPONENT_NAME->Show();
        $this->P_BILL_INVOICE_COMP_MAP_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_BILL_INVOICE_COMP_MAP1 Class @22-FCB6E20C

class clsP_BILL_INVOICE_COMP_MAP1DataSource extends clsDBConn {  //P_BILL_INVOICE_COMP_MAP1DataSource Class @22-0AD6C08D

//DataSource Variables @22-4B1DB09F
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
    var $P_BILL_COMPONENT_ID;
    var $P_SERVICE_TYPE_ID;
    var $P_INVOICE_COMPONENT_ID;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $UPDATE_BY;
    var $P_BILL_COMPONENT_NAME;
    var $P_SERVICE_TYPE_NAME;
    var $P_INVOICE_COMPONENT_NAME;
    var $P_BILL_INVOICE_COMP_MAP_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @22-487D8A6E
    function clsP_BILL_INVOICE_COMP_MAP1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_BILL_INVOICE_COMP_MAP1/Error";
        $this->Initialize();
        $this->P_BILL_COMPONENT_ID = new clsField("P_BILL_COMPONENT_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->P_INVOICE_COMPONENT_ID = new clsField("P_INVOICE_COMPONENT_ID", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_BILL_COMPONENT_NAME = new clsField("P_BILL_COMPONENT_NAME", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->P_INVOICE_COMPONENT_NAME = new clsField("P_INVOICE_COMPONENT_NAME", ccsText, "");
        
        $this->P_BILL_INVOICE_COMP_MAP_ID = new clsField("P_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @22-DDE169C0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->Parameters["urlP_BILL_INVOICE_COMP_MAP_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @22-27431D2F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME,C.CODE AS P_SERVICE_TYPE_NAME,D.CODE AS P_INVOICE_COMPONENT_NAME  FROM P_BILL_INVOICE_COMP_MAP A,\n" .
        "P_BILL_COMPONENT B,\n" .
        "P_SERVICE_TYPE C,\n" .
        "P_INVOICE_COMPONENT D\n" .
        "WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID\n" .
        "AND A.P_SERVICE_TYPE_ID = C.P_SERVICE_TYPE_ID\n" .
        "AND A.P_INVOICE_COMPONENT_ID = D.P_INVOICE_COMPONENT_ID\n" .
        "AND P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @22-288EDC9C
    function SetValues()
    {
        $this->P_BILL_COMPONENT_ID->SetDBValue(trim($this->f("P_BILL_COMPONENT_ID")));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->P_INVOICE_COMPONENT_ID->SetDBValue(trim($this->f("P_INVOICE_COMPONENT_ID")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_BILL_COMPONENT_NAME->SetDBValue($this->f("P_BILL_COMPONENT_NAME"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->P_INVOICE_COMPONENT_NAME->SetDBValue($this->f("P_INVOICE_COMPONENT_NAME"));
        $this->P_BILL_INVOICE_COMP_MAP_ID->SetDBValue(trim($this->f("P_BILL_INVOICE_COMP_MAP_ID")));
    }
//End SetValues Method

//Insert Method @22-5D896156
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_INVOICE_COMPONENT_ID"] = new clsSQLParameter("ctrlP_INVOICE_COMPONENT_ID", ccsFloat, "", "", $this->P_INVOICE_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_BILL_INVOICE_COMP_MAP (P_BILL_INVOICE_COMP_MAP_ID, P_BILL_COMPONENT_ID, P_SERVICE_TYPE_ID, P_INVOICE_COMPONENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES (GENERATE_ID('BILLDB','P_BILL_INVOICE_COMP_MAP','P_BILL_INVOICE_COMP_MAP_ID')," . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_INVOICE_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',SYSDATE,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @22-9EDF666E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_COMPONENT_ID"] = new clsSQLParameter("ctrlP_BILL_COMPONENT_ID", ccsFloat, "", "", $this->P_BILL_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_INVOICE_COMPONENT_ID"] = new clsSQLParameter("ctrlP_INVOICE_COMPONENT_ID", ccsFloat, "", "", $this->P_INVOICE_COMPONENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_INVOICE_COMP_MAP_ID"] = new clsSQLParameter("ctrlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_BILL_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetValue($this->P_BILL_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_BILL_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_BILL_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue()) and !strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue())) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetValue($this->P_INVOICE_COMPONENT_ID->GetValue(true));
        if (!strlen($this->cp["P_INVOICE_COMPONENT_ID"]->GetText()) and !is_bool($this->cp["P_INVOICE_COMPONENT_ID"]->GetValue(true))) 
            $this->cp["P_INVOICE_COMPONENT_ID"]->SetText(0);
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue()) and !strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue())) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue(true))) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetText(0);
        $this->SQL = "UPDATE P_BILL_INVOICE_COMP_MAP SET\n" .
        "P_BILL_COMPONENT_ID = " . $this->SQLValue($this->cp["P_BILL_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_SERVICE_TYPE_ID = " . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_INVOICE_COMPONENT_ID = " . $this->SQLValue($this->cp["P_INVOICE_COMPONENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION = '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "UPDATE_DATE = SYSDATE,\n" .
        "UPDATE_BY = '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @22-4659F06B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_BILL_INVOICE_COMP_MAP_ID"] = new clsSQLParameter("ctrlP_BILL_INVOICE_COMP_MAP_ID", ccsFloat, "", "", $this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue()) and !strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue())) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetValue($this->P_BILL_INVOICE_COMP_MAP_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetText()) and !is_bool($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetValue(true))) 
            $this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->SetText(0);
        $this->SQL = "DELETE P_BILL_INVOICE_COMP_MAP WHERE P_BILL_INVOICE_COMP_MAP_ID = " . $this->SQLValue($this->cp["P_BILL_INVOICE_COMP_MAP_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_BILL_INVOICE_COMP_MAP1DataSource Class @22-FCB6E20C

//Initialize Page @1-D753EA84
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
$TemplateFileName = "p_bill_invoice_comp_map.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-33B30C30
include_once("./p_bill_invoice_comp_map_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-65F2CBF7
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_BILL_INVOICE_COMP_MAP = & new clsGridP_BILL_INVOICE_COMP_MAP("", $MainPage);
$P_BILL_INVOICE_COMP_MAPSearch = & new clsRecordP_BILL_INVOICE_COMP_MAPSearch("", $MainPage);
$P_BILL_INVOICE_COMP_MAP1 = & new clsRecordP_BILL_INVOICE_COMP_MAP1("", $MainPage);
$MainPage->P_BILL_INVOICE_COMP_MAP = & $P_BILL_INVOICE_COMP_MAP;
$MainPage->P_BILL_INVOICE_COMP_MAPSearch = & $P_BILL_INVOICE_COMP_MAPSearch;
$MainPage->P_BILL_INVOICE_COMP_MAP1 = & $P_BILL_INVOICE_COMP_MAP1;
$P_BILL_INVOICE_COMP_MAP->Initialize();
$P_BILL_INVOICE_COMP_MAP1->Initialize();

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

//Execute Components @1-EF1558AA
$P_BILL_INVOICE_COMP_MAPSearch->Operation();
$P_BILL_INVOICE_COMP_MAP1->Operation();
//End Execute Components

//Go to destination page @1-4B27BF6C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_BILL_INVOICE_COMP_MAP);
    unset($P_BILL_INVOICE_COMP_MAPSearch);
    unset($P_BILL_INVOICE_COMP_MAP1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-F168700B
$P_BILL_INVOICE_COMP_MAP->Show();
$P_BILL_INVOICE_COMP_MAPSearch->Show();
$P_BILL_INVOICE_COMP_MAP1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A91B8253
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_BILL_INVOICE_COMP_MAP);
unset($P_BILL_INVOICE_COMP_MAPSearch);
unset($P_BILL_INVOICE_COMP_MAP1);
unset($Tpl);
//End Unload Page


?>
