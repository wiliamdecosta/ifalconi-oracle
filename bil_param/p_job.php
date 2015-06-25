<?php
//Include Common Files @1-9D3D7AC2
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_job.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_JOB { //P_JOB class @2-4D58FF00

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

//Class_Initialize Event @2-7D0AA249
    function clsGridP_JOB($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_JOB";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_JOB";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_JOBDataSource($this);
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
        $this->PROCEDURE_NAME = & new clsControl(ccsLabel, "PROCEDURE_NAME", "PROCEDURE_NAME", ccsText, "", CCGetRequestParam("PROCEDURE_NAME", ccsGet, NULL), $this);
        $this->LISTING_NO = & new clsControl(ccsLabel, "LISTING_NO", "LISTING_NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", ccsGet, NULL), $this);
        $this->IS_PARALLEL = & new clsControl(ccsLabel, "IS_PARALLEL", "IS_PARALLEL", ccsText, "", CCGetRequestParam("IS_PARALLEL", ccsGet, NULL), $this);
        $this->PARALLEL_DEGREE = & new clsControl(ccsLabel, "PARALLEL_DEGREE", "PARALLEL_DEGREE", ccsFloat, "", CCGetRequestParam("PARALLEL_DEGREE", ccsGet, NULL), $this);
        $this->IS_FINISH = & new clsControl(ccsLabel, "IS_FINISH", "IS_FINISH", ccsText, "", CCGetRequestParam("IS_FINISH", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_job.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_job.php";
        $this->P_JOB_ID = & new clsControl(ccsHidden, "P_JOB_ID", "P_JOB_ID", ccsFloat, "", CCGetRequestParam("P_JOB_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this, "P_JOB_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_JOB_Insert = & new clsControl(ccsLink, "P_JOB_Insert", "P_JOB_Insert", ccsText, "", CCGetRequestParam("P_JOB_Insert", ccsGet, NULL), $this);
        $this->P_JOB_Insert->Page = "p_job.php";
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

//Show Method @2-EB6A4F6D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_JOB_TYPE_ID"] = CCGetFromGet("P_JOB_TYPE_ID", NULL);
        $this->DataSource->Parameters["urlPARENT_ID"] = CCGetFromGet("PARENT_ID", NULL);

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
            $this->ControlsVisible["PROCEDURE_NAME"] = $this->PROCEDURE_NAME->Visible;
            $this->ControlsVisible["LISTING_NO"] = $this->LISTING_NO->Visible;
            $this->ControlsVisible["IS_PARALLEL"] = $this->IS_PARALLEL->Visible;
            $this->ControlsVisible["PARALLEL_DEGREE"] = $this->PARALLEL_DEGREE->Visible;
            $this->ControlsVisible["IS_FINISH"] = $this->IS_FINISH->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_JOB_ID"] = $this->P_JOB_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->PROCEDURE_NAME->SetValue($this->DataSource->PROCEDURE_NAME->GetValue());
                $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                $this->IS_PARALLEL->SetValue($this->DataSource->IS_PARALLEL->GetValue());
                $this->PARALLEL_DEGREE->SetValue($this->DataSource->PARALLEL_DEGREE->GetValue());
                $this->IS_FINISH->SetValue($this->DataSource->IS_FINISH->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_JOB_ID", $this->DataSource->f("P_JOB_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_JOB_ID", $this->DataSource->f("P_JOB_ID"));
                $this->P_JOB_ID->SetValue($this->DataSource->P_JOB_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->PROCEDURE_NAME->Show();
                $this->LISTING_NO->Show();
                $this->IS_PARALLEL->Show();
                $this->PARALLEL_DEGREE->Show();
                $this->IS_FINISH->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_JOB_ID->Show();
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
        $this->P_JOB_Insert->Parameters = CCGetQueryString("QueryString", array("P_JOB_ID", "ccsForm"));
        $this->P_JOB_Insert->Parameters = CCAddParam($this->P_JOB_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_JOB_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-815FAB8E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PROCEDURE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LISTING_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_PARALLEL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PARALLEL_DEGREE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_FINISH->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_JOB_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_JOB Class @2-FCB6E20C

class clsP_JOBDataSource extends clsDBConn {  //P_JOBDataSource Class @2-AEA179DE

//DataSource Variables @2-622BA134
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $PROCEDURE_NAME;
    var $LISTING_NO;
    var $IS_PARALLEL;
    var $PARALLEL_DEGREE;
    var $IS_FINISH;
    var $DLink;
    var $ADLink;
    var $P_JOB_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-2A3F2C5C
    function clsP_JOBDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_JOB";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->PROCEDURE_NAME = new clsField("PROCEDURE_NAME", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->IS_PARALLEL = new clsField("IS_PARALLEL", ccsText, "");
        
        $this->PARALLEL_DEGREE = new clsField("PARALLEL_DEGREE", ccsFloat, "");
        
        $this->IS_FINISH = new clsField("IS_FINISH", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_JOB_ID = new clsField("P_JOB_ID", ccsFloat, "");
        

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

//Prepare Method @2-B84C0BB3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_JOB_TYPE_ID", ccsFloat, "", "", $this->Parameters["urlP_JOB_TYPE_ID"], 0, false);
        $this->wp->AddParameter("3", "urlPARENT_ID", ccsFloat, "", "", $this->Parameters["urlPARENT_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-C4612316
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from p_job\n" .
        "where P_JOB_TYPE_ID=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        "and DECODE(PARENT_ID,NULL,0,PARENT_ID) = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsFloat) . "\n" .
        "and upper(code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select * from p_job\n" .
        "where P_JOB_TYPE_ID=" . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "\n" .
        "and DECODE(PARENT_ID,NULL,0,PARENT_ID) = " . $this->SQLValue($this->wp->GetDBValue("3"), ccsFloat) . "\n" .
        "and upper(code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-A2D89EC5
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->PROCEDURE_NAME->SetDBValue($this->f("PROCEDURE_NAME"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->IS_PARALLEL->SetDBValue($this->f("IS_PARALLEL"));
        $this->PARALLEL_DEGREE->SetDBValue(trim($this->f("PARALLEL_DEGREE")));
        $this->IS_FINISH->SetDBValue($this->f("IS_FINISH"));
        $this->DLink->SetDBValue($this->f("P_JOB_ID"));
        $this->ADLink->SetDBValue($this->f("P_JOB_ID"));
        $this->P_JOB_ID->SetDBValue(trim($this->f("P_JOB_ID")));
    }
//End SetValues Method

} //End P_JOBDataSource Class @2-FCB6E20C

class clsRecordP_JOBSearch { //P_JOBSearch Class @3-E0A41B7E

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

//Class_Initialize Event @3-D3640FCB
    function clsRecordP_JOBSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_JOBSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_JOBSearch";
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

//Operation Method @3-5775EB0D
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
        $Redirect = "p_job.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_job.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_JOBSearch Class @3-FCB6E20C

class clsRecordp_job1 { //p_job1 Class @31-DD4446EE

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

//Class_Initialize Event @31-7C3BF9D2
    function clsRecordp_job1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_job1/Error";
        $this->DataSource = new clsp_job1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_job1";
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
            $this->PROCEDURE_NAME = & new clsControl(ccsTextBox, "PROCEDURE_NAME", "PROCEDURE NAME", ccsText, "", CCGetRequestParam("PROCEDURE_NAME", $Method, NULL), $this);
            $this->PROCEDURE_NAME->Required = true;
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "LISTING NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->IS_PARALLEL = & new clsControl(ccsTextBox, "IS_PARALLEL", "IS PARALLEL", ccsText, "", CCGetRequestParam("IS_PARALLEL", $Method, NULL), $this);
            $this->IS_PARALLEL->Required = true;
            $this->PARALLEL_DEGREE = & new clsControl(ccsTextBox, "PARALLEL_DEGREE", "PARALLEL DEGREE", ccsFloat, "", CCGetRequestParam("PARALLEL_DEGREE", $Method, NULL), $this);
            $this->PARALLEL_DEGREE->Required = true;
            $this->IS_FINISH = & new clsControl(ccsTextBox, "IS_FINISH", "IS FINISH", ccsText, "", CCGetRequestParam("IS_FINISH", $Method, NULL), $this);
            $this->IS_FINISH->Required = true;
            $this->P_JOB_TYPE_ID = & new clsControl(ccsHidden, "P_JOB_TYPE_ID", "TYPE ID", ccsFloat, "", CCGetRequestParam("P_JOB_TYPE_ID", $Method, NULL), $this);
            $this->P_JOB_TYPE_ID->Required = true;
            $this->IS_CANCELLED_PROCESS = & new clsControl(ccsTextBox, "IS_CANCELLED_PROCESS", "IS CANCELLED PROCESS", ccsText, "", CCGetRequestParam("IS_CANCELLED_PROCESS", $Method, NULL), $this);
            $this->IS_CANCELLED_PROCESS->Required = true;
            $this->IS_REPROCESS = & new clsControl(ccsTextBox, "IS_REPROCESS", "IS REPROCESS", ccsText, "", CCGetRequestParam("IS_REPROCESS", $Method, NULL), $this);
            $this->IS_REPROCESS->Required = true;
            $this->PARENT_ID = & new clsControl(ccsTextBox, "PARENT_ID", "PARENT ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->CANCEL_PARENT_ID = & new clsControl(ccsTextBox, "CANCEL_PARENT_ID", "CANCEL PARENT ID", ccsFloat, "", CCGetRequestParam("CANCEL_PARENT_ID", $Method, NULL), $this);
            $this->CONTROL_TABLE_NAME = & new clsControl(ccsTextBox, "CONTROL_TABLE_NAME", "CONTROL TABLE NAME", ccsText, "", CCGetRequestParam("CONTROL_TABLE_NAME", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE_BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->P_JOB_ID = & new clsControl(ccsHidden, "P_JOB_ID", "CODE", ccsFloat, "", CCGetRequestParam("P_JOB_ID", $Method, NULL), $this);
            $this->P_JOB_TYPE_NAME = & new clsControl(ccsTextBox, "P_JOB_TYPE_NAME", "P_JOB_TYPE_NAME", ccsText, "", CCGetRequestParam("P_JOB_TYPE_NAME", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @31-B032BA00
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_JOB_ID"] = CCGetFromGet("P_JOB_ID", NULL);
    }
//End Initialize Method

//Validate Method @31-8E742113
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->PROCEDURE_NAME->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->IS_PARALLEL->Validate() && $Validation);
        $Validation = ($this->PARALLEL_DEGREE->Validate() && $Validation);
        $Validation = ($this->IS_FINISH->Validate() && $Validation);
        $Validation = ($this->P_JOB_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->IS_CANCELLED_PROCESS->Validate() && $Validation);
        $Validation = ($this->IS_REPROCESS->Validate() && $Validation);
        $Validation = ($this->PARENT_ID->Validate() && $Validation);
        $Validation = ($this->CANCEL_PARENT_ID->Validate() && $Validation);
        $Validation = ($this->CONTROL_TABLE_NAME->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_JOB_ID->Validate() && $Validation);
        $Validation = ($this->P_JOB_TYPE_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PROCEDURE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_PARALLEL->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARALLEL_DEGREE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_FINISH->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_CANCELLED_PROCESS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_REPROCESS->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CANCEL_PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CONTROL_TABLE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_JOB_TYPE_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @31-8965F503
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->PROCEDURE_NAME->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->IS_PARALLEL->Errors->Count());
        $errors = ($errors || $this->PARALLEL_DEGREE->Errors->Count());
        $errors = ($errors || $this->IS_FINISH->Errors->Count());
        $errors = ($errors || $this->P_JOB_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->IS_CANCELLED_PROCESS->Errors->Count());
        $errors = ($errors || $this->IS_REPROCESS->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->CANCEL_PARENT_ID->Errors->Count());
        $errors = ($errors || $this->CONTROL_TABLE_NAME->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_JOB_ID->Errors->Count());
        $errors = ($errors || $this->P_JOB_TYPE_NAME->Errors->Count());
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

//InsertRow Method @31-FAF50541
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->IS_PARALLEL->SetValue($this->IS_PARALLEL->GetValue(true));
        $this->DataSource->PARALLEL_DEGREE->SetValue($this->PARALLEL_DEGREE->GetValue(true));
        $this->DataSource->IS_FINISH->SetValue($this->IS_FINISH->GetValue(true));
        $this->DataSource->P_JOB_TYPE_ID->SetValue($this->P_JOB_TYPE_ID->GetValue(true));
        $this->DataSource->IS_CANCELLED_PROCESS->SetValue($this->IS_CANCELLED_PROCESS->GetValue(true));
        $this->DataSource->IS_REPROCESS->SetValue($this->IS_REPROCESS->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->CANCEL_PARENT_ID->SetValue($this->CANCEL_PARENT_ID->GetValue(true));
        $this->DataSource->CONTROL_TABLE_NAME->SetValue($this->CONTROL_TABLE_NAME->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @31-5D96BE06
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->IS_PARALLEL->SetValue($this->IS_PARALLEL->GetValue(true));
        $this->DataSource->PARALLEL_DEGREE->SetValue($this->PARALLEL_DEGREE->GetValue(true));
        $this->DataSource->IS_FINISH->SetValue($this->IS_FINISH->GetValue(true));
        $this->DataSource->P_JOB_TYPE_ID->SetValue($this->P_JOB_TYPE_ID->GetValue(true));
        $this->DataSource->IS_CANCELLED_PROCESS->SetValue($this->IS_CANCELLED_PROCESS->GetValue(true));
        $this->DataSource->IS_REPROCESS->SetValue($this->IS_REPROCESS->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->CANCEL_PARENT_ID->SetValue($this->CANCEL_PARENT_ID->GetValue(true));
        $this->DataSource->CONTROL_TABLE_NAME->SetValue($this->CONTROL_TABLE_NAME->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_JOB_ID->SetValue($this->P_JOB_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @31-8E40FEC1
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_JOB_ID->SetValue($this->P_JOB_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @31-14C5011B
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
                    $this->PROCEDURE_NAME->SetValue($this->DataSource->PROCEDURE_NAME->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->IS_PARALLEL->SetValue($this->DataSource->IS_PARALLEL->GetValue());
                    $this->PARALLEL_DEGREE->SetValue($this->DataSource->PARALLEL_DEGREE->GetValue());
                    $this->IS_FINISH->SetValue($this->DataSource->IS_FINISH->GetValue());
                    $this->P_JOB_TYPE_ID->SetValue($this->DataSource->P_JOB_TYPE_ID->GetValue());
                    $this->IS_CANCELLED_PROCESS->SetValue($this->DataSource->IS_CANCELLED_PROCESS->GetValue());
                    $this->IS_REPROCESS->SetValue($this->DataSource->IS_REPROCESS->GetValue());
                    $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                    $this->CANCEL_PARENT_ID->SetValue($this->DataSource->CANCEL_PARENT_ID->GetValue());
                    $this->CONTROL_TABLE_NAME->SetValue($this->DataSource->CONTROL_TABLE_NAME->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_JOB_ID->SetValue($this->DataSource->P_JOB_ID->GetValue());
                    $this->P_JOB_TYPE_NAME->SetValue($this->DataSource->P_JOB_TYPE_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PROCEDURE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_PARALLEL->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARALLEL_DEGREE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_FINISH->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_CANCELLED_PROCESS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_REPROCESS->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CANCEL_PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CONTROL_TABLE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_JOB_TYPE_NAME->Errors->ToString());
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
        $this->PROCEDURE_NAME->Show();
        $this->LISTING_NO->Show();
        $this->IS_PARALLEL->Show();
        $this->PARALLEL_DEGREE->Show();
        $this->IS_FINISH->Show();
        $this->P_JOB_TYPE_ID->Show();
        $this->IS_CANCELLED_PROCESS->Show();
        $this->IS_REPROCESS->Show();
        $this->PARENT_ID->Show();
        $this->CANCEL_PARENT_ID->Show();
        $this->CONTROL_TABLE_NAME->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->UPDATE_DATE->Show();
        $this->P_JOB_ID->Show();
        $this->P_JOB_TYPE_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_job1 Class @31-FCB6E20C

class clsp_job1DataSource extends clsDBConn {  //p_job1DataSource Class @31-7F6168D4

//DataSource Variables @31-5D6281E8
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
    var $PROCEDURE_NAME;
    var $LISTING_NO;
    var $IS_PARALLEL;
    var $PARALLEL_DEGREE;
    var $IS_FINISH;
    var $P_JOB_TYPE_ID;
    var $IS_CANCELLED_PROCESS;
    var $IS_REPROCESS;
    var $PARENT_ID;
    var $CANCEL_PARENT_ID;
    var $CONTROL_TABLE_NAME;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $P_JOB_ID;
    var $P_JOB_TYPE_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @31-D44F5425
    function clsp_job1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_job1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->PROCEDURE_NAME = new clsField("PROCEDURE_NAME", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->IS_PARALLEL = new clsField("IS_PARALLEL", ccsText, "");
        
        $this->PARALLEL_DEGREE = new clsField("PARALLEL_DEGREE", ccsFloat, "");
        
        $this->IS_FINISH = new clsField("IS_FINISH", ccsText, "");
        
        $this->P_JOB_TYPE_ID = new clsField("P_JOB_TYPE_ID", ccsFloat, "");
        
        $this->IS_CANCELLED_PROCESS = new clsField("IS_CANCELLED_PROCESS", ccsText, "");
        
        $this->IS_REPROCESS = new clsField("IS_REPROCESS", ccsText, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        
        $this->CANCEL_PARENT_ID = new clsField("CANCEL_PARENT_ID", ccsFloat, "");
        
        $this->CONTROL_TABLE_NAME = new clsField("CONTROL_TABLE_NAME", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_JOB_ID = new clsField("P_JOB_ID", ccsFloat, "");
        
        $this->P_JOB_TYPE_NAME = new clsField("P_JOB_TYPE_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @31-77F71AEB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_JOB_ID", ccsFloat, "", "", $this->Parameters["urlP_JOB_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @31-FDCEFA8A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_job_type_name from p_job a , p_job_type b\n" .
        "where a.p_job_type_id=b.p_job_type_id(+)\n" .
        "and a.P_JOB_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @31-48C590F1
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->PROCEDURE_NAME->SetDBValue($this->f("PROCEDURE_NAME"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->IS_PARALLEL->SetDBValue($this->f("IS_PARALLEL"));
        $this->PARALLEL_DEGREE->SetDBValue(trim($this->f("PARALLEL_DEGREE")));
        $this->IS_FINISH->SetDBValue($this->f("IS_FINISH"));
        $this->P_JOB_TYPE_ID->SetDBValue(trim($this->f("P_JOB_TYPE_ID")));
        $this->IS_CANCELLED_PROCESS->SetDBValue($this->f("IS_CANCELLED_PROCESS"));
        $this->IS_REPROCESS->SetDBValue($this->f("IS_REPROCESS"));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
        $this->CANCEL_PARENT_ID->SetDBValue(trim($this->f("CANCEL_PARENT_ID")));
        $this->CONTROL_TABLE_NAME->SetDBValue($this->f("CONTROL_TABLE_NAME"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_JOB_ID->SetDBValue(trim($this->f("P_JOB_ID")));
        $this->P_JOB_TYPE_NAME->SetDBValue($this->f("P_JOB_TYPE_NAME"));
    }
//End SetValues Method

//Insert Method @31-A94EEE3F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["IS_PARALLEL"] = new clsSQLParameter("ctrlIS_PARALLEL", ccsText, "", "", $this->IS_PARALLEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARALLEL_DEGREE"] = new clsSQLParameter("ctrlPARALLEL_DEGREE", ccsFloat, "", "", $this->PARALLEL_DEGREE->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["IS_FINISH"] = new clsSQLParameter("ctrlIS_FINISH", ccsText, "", "", $this->IS_FINISH->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_TYPE_ID"] = new clsSQLParameter("ctrlP_JOB_TYPE_ID", ccsFloat, "", "", $this->P_JOB_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["IS_CANCELLED_PROCESS"] = new clsSQLParameter("ctrlIS_CANCELLED_PROCESS", ccsText, "", "", $this->IS_CANCELLED_PROCESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_REPROCESS"] = new clsSQLParameter("ctrlIS_REPROCESS", ccsText, "", "", $this->IS_REPROCESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CANCEL_PARENT_ID"] = new clsSQLParameter("ctrlCANCEL_PARENT_ID", ccsFloat, "", "", $this->CANCEL_PARENT_ID->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["CONTROL_TABLE_NAME"] = new clsSQLParameter("ctrlCONTROL_TABLE_NAME", ccsText, "", "", $this->CONTROL_TABLE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(NULL);
        if (!is_null($this->cp["IS_PARALLEL"]->GetValue()) and !strlen($this->cp["IS_PARALLEL"]->GetText()) and !is_bool($this->cp["IS_PARALLEL"]->GetValue())) 
            $this->cp["IS_PARALLEL"]->SetValue($this->IS_PARALLEL->GetValue(true));
        if (!is_null($this->cp["PARALLEL_DEGREE"]->GetValue()) and !strlen($this->cp["PARALLEL_DEGREE"]->GetText()) and !is_bool($this->cp["PARALLEL_DEGREE"]->GetValue())) 
            $this->cp["PARALLEL_DEGREE"]->SetValue($this->PARALLEL_DEGREE->GetValue(true));
        if (!strlen($this->cp["PARALLEL_DEGREE"]->GetText()) and !is_bool($this->cp["PARALLEL_DEGREE"]->GetValue(true))) 
            $this->cp["PARALLEL_DEGREE"]->SetText(NULL);
        if (!is_null($this->cp["IS_FINISH"]->GetValue()) and !strlen($this->cp["IS_FINISH"]->GetText()) and !is_bool($this->cp["IS_FINISH"]->GetValue())) 
            $this->cp["IS_FINISH"]->SetValue($this->IS_FINISH->GetValue(true));
        if (!is_null($this->cp["P_JOB_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_JOB_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_JOB_TYPE_ID"]->GetValue())) 
            $this->cp["P_JOB_TYPE_ID"]->SetValue($this->P_JOB_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_JOB_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_JOB_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["IS_CANCELLED_PROCESS"]->GetValue()) and !strlen($this->cp["IS_CANCELLED_PROCESS"]->GetText()) and !is_bool($this->cp["IS_CANCELLED_PROCESS"]->GetValue())) 
            $this->cp["IS_CANCELLED_PROCESS"]->SetValue($this->IS_CANCELLED_PROCESS->GetValue(true));
        if (!is_null($this->cp["IS_REPROCESS"]->GetValue()) and !strlen($this->cp["IS_REPROCESS"]->GetText()) and !is_bool($this->cp["IS_REPROCESS"]->GetValue())) 
            $this->cp["IS_REPROCESS"]->SetValue($this->IS_REPROCESS->GetValue(true));
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(NULL);
        if (!is_null($this->cp["CANCEL_PARENT_ID"]->GetValue()) and !strlen($this->cp["CANCEL_PARENT_ID"]->GetText()) and !is_bool($this->cp["CANCEL_PARENT_ID"]->GetValue())) 
            $this->cp["CANCEL_PARENT_ID"]->SetValue($this->CANCEL_PARENT_ID->GetValue(true));
        if (!strlen($this->cp["CANCEL_PARENT_ID"]->GetText()) and !is_bool($this->cp["CANCEL_PARENT_ID"]->GetValue(true))) 
            $this->cp["CANCEL_PARENT_ID"]->SetText(NULL);
        if (!is_null($this->cp["CONTROL_TABLE_NAME"]->GetValue()) and !strlen($this->cp["CONTROL_TABLE_NAME"]->GetText()) and !is_bool($this->cp["CONTROL_TABLE_NAME"]->GetValue())) 
            $this->cp["CONTROL_TABLE_NAME"]->SetValue($this->CONTROL_TABLE_NAME->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_JOB(P_JOB_ID, CODE, PROCEDURE_NAME, LISTING_NO, IS_PARALLEL, PARALLEL_DEGREE, IS_FINISH, P_JOB_TYPE_ID, IS_CANCELLED_PROCESS, IS_REPROCESS, PARENT_ID, CANCEL_PARENT_ID, CONTROL_TABLE_NAME, DESCRIPTION, UPDATE_DATE, UPDATE_BY) \n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_JOB','P_JOB_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["IS_PARALLEL"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["PARALLEL_DEGREE"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["IS_FINISH"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_JOB_TYPE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["IS_CANCELLED_PROCESS"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["IS_REPROCESS"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["CANCEL_PARENT_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["CONTROL_TABLE_NAME"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', sysdate, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "') ";
		$this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @31-F3FC4C29
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["IS_PARALLEL"] = new clsSQLParameter("ctrlIS_PARALLEL", ccsText, "", "", $this->IS_PARALLEL->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARALLEL_DEGREE"] = new clsSQLParameter("ctrlPARALLEL_DEGREE", ccsFloat, "", "", $this->PARALLEL_DEGREE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["IS_FINISH"] = new clsSQLParameter("ctrlIS_FINISH", ccsText, "", "", $this->IS_FINISH->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_TYPE_ID"] = new clsSQLParameter("ctrlP_JOB_TYPE_ID", ccsFloat, "", "", $this->P_JOB_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["IS_CANCELLED_PROCESS"] = new clsSQLParameter("ctrlIS_CANCELLED_PROCESS", ccsText, "", "", $this->IS_CANCELLED_PROCESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_REPROCESS"] = new clsSQLParameter("ctrlIS_REPROCESS", ccsText, "", "", $this->IS_REPROCESS->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["CANCEL_PARENT_ID"] = new clsSQLParameter("ctrlCANCEL_PARENT_ID", ccsFloat, "", "", $this->CANCEL_PARENT_ID->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["CONTROL_TABLE_NAME"] = new clsSQLParameter("ctrlCONTROL_TABLE_NAME", ccsText, "", "", $this->CONTROL_TABLE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_JOB_ID"] = new clsSQLParameter("ctrlP_JOB_ID", ccsFloat, "", "", $this->P_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(null);
        if (!is_null($this->cp["IS_PARALLEL"]->GetValue()) and !strlen($this->cp["IS_PARALLEL"]->GetText()) and !is_bool($this->cp["IS_PARALLEL"]->GetValue())) 
            $this->cp["IS_PARALLEL"]->SetValue($this->IS_PARALLEL->GetValue(true));
        if (!is_null($this->cp["PARALLEL_DEGREE"]->GetValue()) and !strlen($this->cp["PARALLEL_DEGREE"]->GetText()) and !is_bool($this->cp["PARALLEL_DEGREE"]->GetValue())) 
            $this->cp["PARALLEL_DEGREE"]->SetValue($this->PARALLEL_DEGREE->GetValue(true));
        if (!strlen($this->cp["PARALLEL_DEGREE"]->GetText()) and !is_bool($this->cp["PARALLEL_DEGREE"]->GetValue(true))) 
            $this->cp["PARALLEL_DEGREE"]->SetText(0);
        if (!is_null($this->cp["IS_FINISH"]->GetValue()) and !strlen($this->cp["IS_FINISH"]->GetText()) and !is_bool($this->cp["IS_FINISH"]->GetValue())) 
            $this->cp["IS_FINISH"]->SetValue($this->IS_FINISH->GetValue(true));
        if (!is_null($this->cp["P_JOB_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_JOB_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_JOB_TYPE_ID"]->GetValue())) 
            $this->cp["P_JOB_TYPE_ID"]->SetValue($this->P_JOB_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_JOB_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_JOB_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["IS_CANCELLED_PROCESS"]->GetValue()) and !strlen($this->cp["IS_CANCELLED_PROCESS"]->GetText()) and !is_bool($this->cp["IS_CANCELLED_PROCESS"]->GetValue())) 
            $this->cp["IS_CANCELLED_PROCESS"]->SetValue($this->IS_CANCELLED_PROCESS->GetValue(true));
        if (!is_null($this->cp["IS_REPROCESS"]->GetValue()) and !strlen($this->cp["IS_REPROCESS"]->GetText()) and !is_bool($this->cp["IS_REPROCESS"]->GetValue())) 
            $this->cp["IS_REPROCESS"]->SetValue($this->IS_REPROCESS->GetValue(true));
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue(true))) 
            $this->cp["PARENT_ID"]->SetText(null);
        if (!is_null($this->cp["CANCEL_PARENT_ID"]->GetValue()) and !strlen($this->cp["CANCEL_PARENT_ID"]->GetText()) and !is_bool($this->cp["CANCEL_PARENT_ID"]->GetValue())) 
            $this->cp["CANCEL_PARENT_ID"]->SetValue($this->CANCEL_PARENT_ID->GetValue(true));
        if (!strlen($this->cp["CANCEL_PARENT_ID"]->GetText()) and !is_bool($this->cp["CANCEL_PARENT_ID"]->GetValue(true))) 
            $this->cp["CANCEL_PARENT_ID"]->SetText(null);
        if (!is_null($this->cp["CONTROL_TABLE_NAME"]->GetValue()) and !strlen($this->cp["CONTROL_TABLE_NAME"]->GetText()) and !is_bool($this->cp["CONTROL_TABLE_NAME"]->GetValue())) 
            $this->cp["CONTROL_TABLE_NAME"]->SetValue($this->CONTROL_TABLE_NAME->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_JOB_ID"]->GetValue()) and !strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue())) 
            $this->cp["P_JOB_ID"]->SetValue($this->P_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue(true))) 
            $this->cp["P_JOB_ID"]->SetText(0);
        $this->SQL = "UPDATE P_JOB SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "PROCEDURE_NAME='" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "LISTING_NO=" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ",\n" .
        "IS_PARALLEL='" . $this->SQLValue($this->cp["IS_PARALLEL"]->GetDBValue(), ccsText) . "',\n" .
        "PARALLEL_DEGREE=" . $this->SQLValue($this->cp["PARALLEL_DEGREE"]->GetDBValue(), ccsFloat) . ",\n" .
        "IS_FINISH='" . $this->SQLValue($this->cp["IS_FINISH"]->GetDBValue(), ccsText) . "',\n" .
        "P_JOB_TYPE_ID=" . $this->SQLValue($this->cp["P_JOB_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "IS_CANCELLED_PROCESS='" . $this->SQLValue($this->cp["IS_CANCELLED_PROCESS"]->GetDBValue(), ccsText) . "',\n" .
        "IS_REPROCESS='" . $this->SQLValue($this->cp["IS_REPROCESS"]->GetDBValue(), ccsText) . "',\n" .
        "PARENT_ID=" . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "CANCEL_PARENT_ID=" . $this->SQLValue($this->cp["CANCEL_PARENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "CONTROL_TABLE_NAME='" . $this->SQLValue($this->cp["CONTROL_TABLE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATE_DATE=sysdate,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_JOB_ID = " . $this->SQLValue($this->cp["P_JOB_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @31-FB6ECDEB
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_JOB_ID"] = new clsSQLParameter("ctrlP_JOB_ID", ccsFloat, "", "", $this->P_JOB_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_JOB_ID"]->GetValue()) and !strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue())) 
            $this->cp["P_JOB_ID"]->SetValue($this->P_JOB_ID->GetValue(true));
        if (!strlen($this->cp["P_JOB_ID"]->GetText()) and !is_bool($this->cp["P_JOB_ID"]->GetValue(true))) 
            $this->cp["P_JOB_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_JOB WHERE P_JOB_ID = " . $this->SQLValue($this->cp["P_JOB_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_job1DataSource Class @31-FCB6E20C

//Initialize Page @1-A9EACFA3
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
$TemplateFileName = "p_job.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-70943769
include_once("./p_job_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A3EED32C
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_JOB = & new clsGridP_JOB("", $MainPage);
$P_JOBSearch = & new clsRecordP_JOBSearch("", $MainPage);
$p_job1 = & new clsRecordp_job1("", $MainPage);
$JOBTYPE_CODE = & new clsControl(ccsLabel, "JOBTYPE_CODE", "JOBTYPE_CODE", ccsText, "", CCGetRequestParam("JOBTYPE_CODE", ccsGet, NULL), $MainPage);
$MainPage->P_JOB = & $P_JOB;
$MainPage->P_JOBSearch = & $P_JOBSearch;
$MainPage->p_job1 = & $p_job1;
$MainPage->JOBTYPE_CODE = & $JOBTYPE_CODE;
$P_JOB->Initialize();
$p_job1->Initialize();

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

//Execute Components @1-3A4A707D
$P_JOBSearch->Operation();
$p_job1->Operation();
//End Execute Components

//Go to destination page @1-B8609438
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_JOB);
    unset($P_JOBSearch);
    unset($p_job1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8144794C
$P_JOB->Show();
$P_JOBSearch->Show();
$p_job1->Show();
$JOBTYPE_CODE->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-8FD94673
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_JOB);
unset($P_JOBSearch);
unset($p_job1);
unset($Tpl);
//End Unload Page


?>
