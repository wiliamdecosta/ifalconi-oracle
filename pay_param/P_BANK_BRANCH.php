<?php
//Include Common Files @1-BBA7E7D7
define("RelativePath", "..");
define("PathToCurrentPage", "/pay_param/");
define("FileName", "P_BANK_BRANCH.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridGRID { //GRID class @2-7BE954E8

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

//Class_Initialize Event @2-F91D4384
    function clsGridGRID($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "GRID";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid GRID";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsGRIDDataSource($this);
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
        $this->loket_no = & new clsControl(ccsLabel, "loket_no", "loket_no", ccsText, "", CCGetRequestParam("loket_no", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "P_BANK_BRANCH.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "P_BANK_BRANCH.php";
        $this->p_bank_branch_id = & new clsControl(ccsHidden, "p_bank_branch_id", "p_bank_branch_id", ccsFloat, "", CCGetRequestParam("p_bank_branch_id", ccsGet, NULL), $this);
        $this->bank_name = & new clsControl(ccsLabel, "bank_name", "bank_name", ccsText, "", CCGetRequestParam("bank_name", ccsGet, NULL), $this);
        $this->area_name = & new clsControl(ccsLabel, "area_name", "area_name", ccsText, "", CCGetRequestParam("area_name", ccsGet, NULL), $this);
        $this->address = & new clsControl(ccsLabel, "address", "address", ccsText, "", CCGetRequestParam("address", ccsGet, NULL), $this);
        $this->locket_type_char = & new clsControl(ccsLabel, "locket_type_char", "locket_type_char", ccsText, "", CCGetRequestParam("locket_type_char", ccsGet, NULL), $this);
        $this->p_bank_id = & new clsControl(ccsHidden, "p_bank_id", "p_bank_id", ccsFloat, "", CCGetRequestParam("p_bank_id", ccsGet, NULL), $this);
        $this->p_area_id = & new clsControl(ccsHidden, "p_area_id", "p_area_id", ccsFloat, "", CCGetRequestParam("p_area_id", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->GRID_Insert = & new clsControl(ccsLink, "GRID_Insert", "GRID_Insert", ccsText, "", CCGetRequestParam("GRID_Insert", ccsGet, NULL), $this);
        $this->GRID_Insert->Page = "P_BANK_BRANCH.php";
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

//Show Method @2-438A4BE8
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
            $this->ControlsVisible["loket_no"] = $this->loket_no->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["p_bank_branch_id"] = $this->p_bank_branch_id->Visible;
            $this->ControlsVisible["bank_name"] = $this->bank_name->Visible;
            $this->ControlsVisible["area_name"] = $this->area_name->Visible;
            $this->ControlsVisible["address"] = $this->address->Visible;
            $this->ControlsVisible["locket_type_char"] = $this->locket_type_char->Visible;
            $this->ControlsVisible["p_bank_id"] = $this->p_bank_id->Visible;
            $this->ControlsVisible["p_area_id"] = $this->p_area_id->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->loket_no->SetValue($this->DataSource->loket_no->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "TAMBAH", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "p_bank_branch_id", $this->DataSource->f("p_bank_branch_id"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "TAMBAH", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "p_bank_branch_id", $this->DataSource->f("p_bank_branch_id"));
                $this->p_bank_branch_id->SetValue($this->DataSource->p_bank_branch_id->GetValue());
                $this->bank_name->SetValue($this->DataSource->bank_name->GetValue());
                $this->area_name->SetValue($this->DataSource->area_name->GetValue());
                $this->address->SetValue($this->DataSource->address->GetValue());
                $this->locket_type_char->SetValue($this->DataSource->locket_type_char->GetValue());
                $this->p_bank_id->SetValue($this->DataSource->p_bank_id->GetValue());
                $this->p_area_id->SetValue($this->DataSource->p_area_id->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->loket_no->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->p_bank_branch_id->Show();
                $this->bank_name->Show();
                $this->area_name->Show();
                $this->address->Show();
                $this->locket_type_char->Show();
                $this->p_bank_id->Show();
                $this->p_area_id->Show();
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
        $this->GRID_Insert->Parameters = CCGetQueryString("QueryString", array("p_bank_branch_id", "ccsForm"));
        $this->GRID_Insert->Parameters = CCAddParam($this->GRID_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->GRID_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-FAFC36C3
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->loket_no->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->p_bank_branch_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->bank_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->area_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->address->Errors->ToString());
        $errors = ComposeStrings($errors, $this->locket_type_char->Errors->ToString());
        $errors = ComposeStrings($errors, $this->p_bank_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->p_area_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End GRID Class @2-FCB6E20C

class clsGRIDDataSource extends clsDBConn {  //GRIDDataSource Class @2-846D01C3

//DataSource Variables @2-EA86CC6E
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $loket_no;
    var $DLink;
    var $ADLink;
    var $p_bank_branch_id;
    var $bank_name;
    var $area_name;
    var $address;
    var $locket_type_char;
    var $p_bank_id;
    var $p_area_id;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E2889900
    function clsGRIDDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid GRID";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->loket_no = new clsField("loket_no", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->p_bank_branch_id = new clsField("p_bank_branch_id", ccsFloat, "");
        
        $this->bank_name = new clsField("bank_name", ccsText, "");
        
        $this->area_name = new clsField("area_name", ccsText, "");
        
        $this->address = new clsField("address", ccsText, "");
        
        $this->locket_type_char = new clsField("locket_type_char", ccsText, "");
        
        $this->p_bank_id = new clsField("p_bank_id", ccsFloat, "");
        
        $this->p_area_id = new clsField("p_area_id", ccsFloat, "");
        

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

//Open Method @2-68594786
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT a.*\n" .
        "FROM ifp.V_P_BANK_BRANCH a\n" .
        "WHERE (\n" .
        "upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.BANK_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.AREA_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.address) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.loket_no) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.locket_type_char) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.description) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")) cnt";
        $this->SQL = "SELECT a.*\n" .
        "FROM ifp.V_P_BANK_BRANCH a\n" .
        "WHERE (\n" .
        "upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.BANK_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.AREA_NAME) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.address) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.loket_no) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.locket_type_char) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') OR\n" .
        "upper(a.description) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')\n" .
        ")";
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

//SetValues Method @2-36DD5C86
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("code"));
        $this->loket_no->SetDBValue($this->f("loket_no"));
        $this->DLink->SetDBValue($this->f("p_bank_branch_id"));
        $this->ADLink->SetDBValue($this->f("p_bank_branch_id"));
        $this->p_bank_branch_id->SetDBValue(trim($this->f("p_bank_branch_id")));
        $this->bank_name->SetDBValue($this->f("bank_name"));
        $this->area_name->SetDBValue($this->f("area_name"));
        $this->address->SetDBValue($this->f("address"));
        $this->locket_type_char->SetDBValue($this->f("locket_type_char"));
        $this->p_bank_id->SetDBValue(trim($this->f("p_bank_id")));
        $this->p_area_id->SetDBValue(trim($this->f("p_area_id")));
    }
//End SetValues Method

} //End GRIDDataSource Class @2-FCB6E20C

class clsRecordGRIDSearch { //GRIDSearch Class @3-B6441615

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

//Class_Initialize Event @3-2A660810
    function clsRecordGRIDSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record GRIDSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "GRIDSearch";
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

//Operation Method @3-F5EDC54E
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
        $Redirect = "P_BANK_BRANCH.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "P_BANK_BRANCH.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End GRIDSearch Class @3-FCB6E20C

class clsRecordFORM { //FORM Class @61-A15A7BC9

//Variables @61-D6FF3E86

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

//Class_Initialize Event @61-4C429596
    function clsRecordFORM($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record FORM/Error";
        $this->DataSource = new clsFORMDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "FORM";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Code = & new clsControl(ccsTextBox, "Code", "Code", ccsText, "", CCGetRequestParam("Code", $Method, NULL), $this);
            $this->Code->Required = true;
            $this->Description = & new clsControl(ccsTextArea, "Description", "Description", ccsText, "", CCGetRequestParam("Description", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED_BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
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
            $this->p_bank_branch_id = & new clsControl(ccsHidden, "p_bank_branch_id", "p_bank_branch_id", ccsFloat, "", CCGetRequestParam("p_bank_branch_id", $Method, NULL), $this);
            $this->bank_name = & new clsControl(ccsTextBox, "bank_name", "bank_name", ccsText, "", CCGetRequestParam("bank_name", $Method, NULL), $this);
            $this->p_bank_id = & new clsControl(ccsHidden, "p_bank_id", "bank_name", ccsFloat, "", CCGetRequestParam("p_bank_id", $Method, NULL), $this);
            $this->p_bank_id->Required = true;
            $this->area_name = & new clsControl(ccsTextBox, "area_name", "area_name", ccsText, "", CCGetRequestParam("area_name", $Method, NULL), $this);
            $this->p_area_id = & new clsControl(ccsHidden, "p_area_id", "p_area_id", ccsFloat, "", CCGetRequestParam("p_area_id", $Method, NULL), $this);
            $this->address = & new clsControl(ccsTextArea, "address", "address", ccsText, "", CCGetRequestParam("address", $Method, NULL), $this);
            $this->loket_no = & new clsControl(ccsTextBox, "loket_no", "Locket No.", ccsText, "", CCGetRequestParam("loket_no", $Method, NULL), $this);
            $this->loket_no->Required = true;
            $this->loket_type = & new clsControl(ccsListBox, "loket_type", "loket_type", ccsText, "", CCGetRequestParam("loket_type", $Method, NULL), $this);
            $this->loket_type->DSType = dsListOfValues;
            $this->loket_type->Values = array(array("1", "H2H"), array("2", "P2H"), array("3", "WEB"));
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

//Initialize Method @61-BC00E31F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_bank_branch_id"] = CCGetFromGet("p_bank_branch_id", NULL);
    }
//End Initialize Method

//Validate Method @61-F697A214
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Code->Validate() && $Validation);
        $Validation = ($this->Description->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->p_bank_branch_id->Validate() && $Validation);
        $Validation = ($this->bank_name->Validate() && $Validation);
        $Validation = ($this->p_bank_id->Validate() && $Validation);
        $Validation = ($this->area_name->Validate() && $Validation);
        $Validation = ($this->p_area_id->Validate() && $Validation);
        $Validation = ($this->address->Validate() && $Validation);
        $Validation = ($this->loket_no->Validate() && $Validation);
        $Validation = ($this->loket_type->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Description->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_bank_branch_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->bank_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_bank_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->area_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_area_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->address->Errors->Count() == 0);
        $Validation =  $Validation && ($this->loket_no->Errors->Count() == 0);
        $Validation =  $Validation && ($this->loket_type->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @61-352C8B85
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Code->Errors->Count());
        $errors = ($errors || $this->Description->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->p_bank_branch_id->Errors->Count());
        $errors = ($errors || $this->bank_name->Errors->Count());
        $errors = ($errors || $this->p_bank_id->Errors->Count());
        $errors = ($errors || $this->area_name->Errors->Count());
        $errors = ($errors || $this->p_area_id->Errors->Count());
        $errors = ($errors || $this->address->Errors->Count());
        $errors = ($errors || $this->loket_no->Errors->Count());
        $errors = ($errors || $this->loket_type->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @61-ED598703
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

//Operation Method @61-2C90C5F4
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
        $Redirect = "P_BANK_BRANCH.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "P_BANK_BRANCH.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG", "TAMBAH", "s_keyword", "p_bank_branch_id"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = "P_BANK_BRANCH.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG", "TAMBAH"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = "P_BANK_BRANCH.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = "P_BANK_BRANCH.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG", "TAMBAH"));
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

//InsertRow Method @61-757B2476
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Code->SetValue($this->Code->GetValue(true));
        $this->DataSource->Description->SetValue($this->Description->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->CREATION_DATE->SetValue($this->CREATION_DATE->GetValue(true));
        $this->DataSource->UPDATED_DATE->SetValue($this->UPDATED_DATE->GetValue(true));
        $this->DataSource->p_bank_branch_id->SetValue($this->p_bank_branch_id->GetValue(true));
        $this->DataSource->bank_name->SetValue($this->bank_name->GetValue(true));
        $this->DataSource->p_bank_id->SetValue($this->p_bank_id->GetValue(true));
        $this->DataSource->area_name->SetValue($this->area_name->GetValue(true));
        $this->DataSource->p_area_id->SetValue($this->p_area_id->GetValue(true));
        $this->DataSource->address->SetValue($this->address->GetValue(true));
        $this->DataSource->loket_no->SetValue($this->loket_no->GetValue(true));
        $this->DataSource->loket_type->SetValue($this->loket_type->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @61-09D8597B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Code->SetValue($this->Code->GetValue(true));
        $this->DataSource->Description->SetValue($this->Description->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->CREATION_DATE->SetValue($this->CREATION_DATE->GetValue(true));
        $this->DataSource->UPDATED_DATE->SetValue($this->UPDATED_DATE->GetValue(true));
        $this->DataSource->bank_name->SetValue($this->bank_name->GetValue(true));
        $this->DataSource->p_bank_id->SetValue($this->p_bank_id->GetValue(true));
        $this->DataSource->area_name->SetValue($this->area_name->GetValue(true));
        $this->DataSource->p_area_id->SetValue($this->p_area_id->GetValue(true));
        $this->DataSource->address->SetValue($this->address->GetValue(true));
        $this->DataSource->loket_no->SetValue($this->loket_no->GetValue(true));
        $this->DataSource->loket_type->SetValue($this->loket_type->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @61-618EE687
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->p_bank_branch_id->SetValue($this->p_bank_branch_id->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @61-7CAE6919
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

        $this->loket_type->Prepare();

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
                    $this->Code->SetValue($this->DataSource->Code->GetValue());
                    $this->Description->SetValue($this->DataSource->Description->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->p_bank_branch_id->SetValue($this->DataSource->p_bank_branch_id->GetValue());
                    $this->bank_name->SetValue($this->DataSource->bank_name->GetValue());
                    $this->p_bank_id->SetValue($this->DataSource->p_bank_id->GetValue());
                    $this->area_name->SetValue($this->DataSource->area_name->GetValue());
                    $this->p_area_id->SetValue($this->DataSource->p_area_id->GetValue());
                    $this->address->SetValue($this->DataSource->address->GetValue());
                    $this->loket_no->SetValue($this->DataSource->loket_no->GetValue());
                    $this->loket_type->SetValue($this->DataSource->loket_type->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Description->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_bank_branch_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->bank_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_bank_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->area_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_area_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->address->Errors->ToString());
            $Error = ComposeStrings($Error, $this->loket_no->Errors->ToString());
            $Error = ComposeStrings($Error, $this->loket_type->Errors->ToString());
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

        $this->Code->Show();
        $this->Description->Show();
        $this->CREATED_BY->Show();
        $this->UPDATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_DATE->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->p_bank_branch_id->Show();
        $this->bank_name->Show();
        $this->p_bank_id->Show();
        $this->area_name->Show();
        $this->p_area_id->Show();
        $this->address->Show();
        $this->loket_no->Show();
        $this->loket_type->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End FORM Class @61-FCB6E20C

class clsFORMDataSource extends clsDBConn {  //FORMDataSource Class @61-8EF59207

//DataSource Variables @61-71493759
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
    var $Code;
    var $Description;
    var $CREATED_BY;
    var $UPDATED_BY;
    var $CREATION_DATE;
    var $UPDATED_DATE;
    var $p_bank_branch_id;
    var $bank_name;
    var $p_bank_id;
    var $area_name;
    var $p_area_id;
    var $address;
    var $loket_no;
    var $loket_type;
//End DataSource Variables

//DataSourceClass_Initialize Event @61-757D9486
    function clsFORMDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record FORM/Error";
        $this->Initialize();
        $this->Code = new clsField("Code", ccsText, "");
        
        $this->Description = new clsField("Description", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->p_bank_branch_id = new clsField("p_bank_branch_id", ccsFloat, "");
        
        $this->bank_name = new clsField("bank_name", ccsText, "");
        
        $this->p_bank_id = new clsField("p_bank_id", ccsFloat, "");
        
        $this->area_name = new clsField("area_name", ccsText, "");
        
        $this->p_area_id = new clsField("p_area_id", ccsFloat, "");
        
        $this->address = new clsField("address", ccsText, "");
        
        $this->loket_no = new clsField("loket_no", ccsText, "");
        
        $this->loket_type = new clsField("loket_type", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @61-99D16343
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_bank_branch_id", ccsFloat, "", "", $this->Parameters["urlp_bank_branch_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "p_bank_branch_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @61-242F551C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM ifp.v_p_bank_branch {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @61-6B3BBFEC
    function SetValues()
    {
        $this->Code->SetDBValue($this->f("code"));
        $this->Description->SetDBValue($this->f("description"));
        $this->CREATED_BY->SetDBValue($this->f("create_by"));
        $this->UPDATED_BY->SetDBValue($this->f("update_by"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("create_date")));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("update_date")));
        $this->p_bank_branch_id->SetDBValue(trim($this->f("p_bank_branch_id")));
        $this->bank_name->SetDBValue($this->f("bank_name"));
        $this->p_bank_id->SetDBValue(trim($this->f("p_bank_id")));
        $this->area_name->SetDBValue($this->f("area_name"));
        $this->p_area_id->SetDBValue(trim($this->f("p_area_id")));
        $this->address->SetDBValue($this->f("address"));
        $this->loket_no->SetDBValue($this->f("loket_no"));
        $this->loket_type->SetDBValue($this->f("loket_type"));
    }
//End SetValues Method

//Insert Method @61-39DB7424
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["Code"] = new clsSQLParameter("ctrlCode", ccsText, "", "", $this->Code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Description"] = new clsSQLParameter("ctrlDescription", ccsText, "", "", $this->Description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATION_DATE"] = new clsSQLParameter("ctrlCREATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->CREATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_DATE"] = new clsSQLParameter("ctrlUPDATED_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATED_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_bank_branch_id"] = new clsSQLParameter("ctrlp_bank_branch_id", ccsFloat, "", "", $this->p_bank_branch_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["bank_name"] = new clsSQLParameter("ctrlbank_name", ccsText, "", "", $this->bank_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_bank_id"] = new clsSQLParameter("ctrlp_bank_id", ccsFloat, "", "", $this->p_bank_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["area_name"] = new clsSQLParameter("ctrlarea_name", ccsText, "", "", $this->area_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_area_id"] = new clsSQLParameter("ctrlp_area_id", ccsFloat, "", "", $this->p_area_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["address"] = new clsSQLParameter("ctrladdress", ccsText, "", "", $this->address->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["loket_no"] = new clsSQLParameter("ctrlloket_no", ccsText, "", "", $this->loket_no->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["loket_type"] = new clsSQLParameter("ctrlloket_type", ccsText, "", "", $this->loket_type->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["Code"]->GetValue()) and !strlen($this->cp["Code"]->GetText()) and !is_bool($this->cp["Code"]->GetValue())) 
            $this->cp["Code"]->SetValue($this->Code->GetValue(true));
        if (!is_null($this->cp["Description"]->GetValue()) and !strlen($this->cp["Description"]->GetText()) and !is_bool($this->cp["Description"]->GetValue())) 
            $this->cp["Description"]->SetValue($this->Description->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["CREATION_DATE"]->GetValue()) and !strlen($this->cp["CREATION_DATE"]->GetText()) and !is_bool($this->cp["CREATION_DATE"]->GetValue())) 
            $this->cp["CREATION_DATE"]->SetValue($this->CREATION_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATED_DATE"]->GetValue()) and !strlen($this->cp["UPDATED_DATE"]->GetText()) and !is_bool($this->cp["UPDATED_DATE"]->GetValue())) 
            $this->cp["UPDATED_DATE"]->SetValue($this->UPDATED_DATE->GetValue(true));
        if (!is_null($this->cp["p_bank_branch_id"]->GetValue()) and !strlen($this->cp["p_bank_branch_id"]->GetText()) and !is_bool($this->cp["p_bank_branch_id"]->GetValue())) 
            $this->cp["p_bank_branch_id"]->SetValue($this->p_bank_branch_id->GetValue(true));
        if (!is_null($this->cp["bank_name"]->GetValue()) and !strlen($this->cp["bank_name"]->GetText()) and !is_bool($this->cp["bank_name"]->GetValue())) 
            $this->cp["bank_name"]->SetValue($this->bank_name->GetValue(true));
        if (!is_null($this->cp["p_bank_id"]->GetValue()) and !strlen($this->cp["p_bank_id"]->GetText()) and !is_bool($this->cp["p_bank_id"]->GetValue())) 
            $this->cp["p_bank_id"]->SetValue($this->p_bank_id->GetValue(true));
        if (!is_null($this->cp["area_name"]->GetValue()) and !strlen($this->cp["area_name"]->GetText()) and !is_bool($this->cp["area_name"]->GetValue())) 
            $this->cp["area_name"]->SetValue($this->area_name->GetValue(true));
        if (!is_null($this->cp["p_area_id"]->GetValue()) and !strlen($this->cp["p_area_id"]->GetText()) and !is_bool($this->cp["p_area_id"]->GetValue())) 
            $this->cp["p_area_id"]->SetValue($this->p_area_id->GetValue(true));
        if (!is_null($this->cp["address"]->GetValue()) and !strlen($this->cp["address"]->GetText()) and !is_bool($this->cp["address"]->GetValue())) 
            $this->cp["address"]->SetValue($this->address->GetValue(true));
        if (!is_null($this->cp["loket_no"]->GetValue()) and !strlen($this->cp["loket_no"]->GetText()) and !is_bool($this->cp["loket_no"]->GetValue())) 
            $this->cp["loket_no"]->SetValue($this->loket_no->GetValue(true));
        if (!is_null($this->cp["loket_type"]->GetValue()) and !strlen($this->cp["loket_type"]->GetText()) and !is_bool($this->cp["loket_type"]->GetValue())) 
            $this->cp["loket_type"]->SetValue($this->loket_type->GetValue(true));
        $this->SQL = "INSERT INTO ifp.p_bank_branch(code, \n" .
        "description, \n" .
        "create_by, \n" .
        "update_by, \n" .
        "create_date, \n" .
        "update_date, \n" .
        "p_bank_branch_id, \n" .
        "p_bank_id, \n" .
        "p_area_id, \n" .
        "address, \n" .
        "loket_no, \n" .
        "loket_type,\n" .
        "max_user,\n" .
        "status) VALUES(upper('" . $this->SQLValue($this->cp["Code"]->GetDBValue(), ccsText) . "'), \n" .
        "'" . $this->SQLValue($this->cp["Description"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "', \n" .
        "current_date, \n" .
        "current_date, \n" .
        "(select COALESCE(NULLIF(MAX(p_bank_branch_id) ,0),0)+1 from ifp.p_bank_branch),\n" .
        "" . $this->SQLValue($this->cp["p_bank_id"]->GetDBValue(), ccsFloat) . ", \n" .
        "" . $this->SQLValue($this->cp["p_area_id"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["address"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["loket_no"]->GetDBValue(), ccsText) . "', \n" .
        "'" . $this->SQLValue($this->cp["loket_type"]->GetDBValue(), ccsText) . "',\n" .
        "null,\n" .
        "1)";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @61-D6C8F912
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["Code"] = new clsSQLParameter("ctrlCode", ccsText, "", "", $this->Code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["Description"] = new clsSQLParameter("ctrlDescription", ccsText, "", "", $this->Description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATION_DATE"] = new clsSQLParameter("ctrlCREATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->CREATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_DATE"] = new clsSQLParameter("ctrlUPDATED_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATED_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_bank_branch_id"] = new clsSQLParameter("urlp_bank_branch_id", ccsFloat, "", "", CCGetFromGet("p_bank_branch_id", NULL), 0, false, $this->ErrorBlock);
        $this->cp["bank_name"] = new clsSQLParameter("ctrlbank_name", ccsText, "", "", $this->bank_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_bank_id"] = new clsSQLParameter("ctrlp_bank_id", ccsFloat, "", "", $this->p_bank_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["area_name"] = new clsSQLParameter("ctrlarea_name", ccsText, "", "", $this->area_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_area_id"] = new clsSQLParameter("ctrlp_area_id", ccsFloat, "", "", $this->p_area_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["address"] = new clsSQLParameter("ctrladdress", ccsText, "", "", $this->address->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["loket_no"] = new clsSQLParameter("ctrlloket_no", ccsText, "", "", $this->loket_no->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["loket_type"] = new clsSQLParameter("ctrlloket_type", ccsText, "", "", $this->loket_type->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["Code"]->GetValue()) and !strlen($this->cp["Code"]->GetText()) and !is_bool($this->cp["Code"]->GetValue())) 
            $this->cp["Code"]->SetValue($this->Code->GetValue(true));
        if (!is_null($this->cp["Description"]->GetValue()) and !strlen($this->cp["Description"]->GetText()) and !is_bool($this->cp["Description"]->GetValue())) 
            $this->cp["Description"]->SetValue($this->Description->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["CREATION_DATE"]->GetValue()) and !strlen($this->cp["CREATION_DATE"]->GetText()) and !is_bool($this->cp["CREATION_DATE"]->GetValue())) 
            $this->cp["CREATION_DATE"]->SetValue($this->CREATION_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATED_DATE"]->GetValue()) and !strlen($this->cp["UPDATED_DATE"]->GetText()) and !is_bool($this->cp["UPDATED_DATE"]->GetValue())) 
            $this->cp["UPDATED_DATE"]->SetValue($this->UPDATED_DATE->GetValue(true));
        if (!is_null($this->cp["p_bank_branch_id"]->GetValue()) and !strlen($this->cp["p_bank_branch_id"]->GetText()) and !is_bool($this->cp["p_bank_branch_id"]->GetValue())) 
            $this->cp["p_bank_branch_id"]->SetText(CCGetFromGet("p_bank_branch_id", NULL));
        if (!strlen($this->cp["p_bank_branch_id"]->GetText()) and !is_bool($this->cp["p_bank_branch_id"]->GetValue(true))) 
            $this->cp["p_bank_branch_id"]->SetText(0);
        if (!is_null($this->cp["bank_name"]->GetValue()) and !strlen($this->cp["bank_name"]->GetText()) and !is_bool($this->cp["bank_name"]->GetValue())) 
            $this->cp["bank_name"]->SetValue($this->bank_name->GetValue(true));
        if (!is_null($this->cp["p_bank_id"]->GetValue()) and !strlen($this->cp["p_bank_id"]->GetText()) and !is_bool($this->cp["p_bank_id"]->GetValue())) 
            $this->cp["p_bank_id"]->SetValue($this->p_bank_id->GetValue(true));
        if (!is_null($this->cp["area_name"]->GetValue()) and !strlen($this->cp["area_name"]->GetText()) and !is_bool($this->cp["area_name"]->GetValue())) 
            $this->cp["area_name"]->SetValue($this->area_name->GetValue(true));
        if (!is_null($this->cp["p_area_id"]->GetValue()) and !strlen($this->cp["p_area_id"]->GetText()) and !is_bool($this->cp["p_area_id"]->GetValue())) 
            $this->cp["p_area_id"]->SetValue($this->p_area_id->GetValue(true));
        if (!is_null($this->cp["address"]->GetValue()) and !strlen($this->cp["address"]->GetText()) and !is_bool($this->cp["address"]->GetValue())) 
            $this->cp["address"]->SetValue($this->address->GetValue(true));
        if (!is_null($this->cp["loket_no"]->GetValue()) and !strlen($this->cp["loket_no"]->GetText()) and !is_bool($this->cp["loket_no"]->GetValue())) 
            $this->cp["loket_no"]->SetValue($this->loket_no->GetValue(true));
        if (!is_null($this->cp["loket_type"]->GetValue()) and !strlen($this->cp["loket_type"]->GetText()) and !is_bool($this->cp["loket_type"]->GetValue())) 
            $this->cp["loket_type"]->SetValue($this->loket_type->GetValue(true));
        $this->SQL = "UPDATE ifp.p_bank_branch \n" .
        "SET \n" .
        "code=upper('" . $this->SQLValue($this->cp["Code"]->GetDBValue(), ccsText) . "'), \n" .
        "description='" . $this->SQLValue($this->cp["Description"]->GetDBValue(), ccsText) . "', \n" .
        "update_by='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "',  \n" .
        "update_date='" . $this->SQLValue($this->cp["UPDATED_DATE"]->GetDBValue(), ccsDate) . "',\n" .
        "p_bank_id=" . $this->SQLValue($this->cp["p_bank_id"]->GetDBValue(), ccsFloat) . ", \n" .
        "p_area_id=" . $this->SQLValue($this->cp["p_area_id"]->GetDBValue(), ccsFloat) . ", \n" .
        "address='" . $this->SQLValue($this->cp["address"]->GetDBValue(), ccsText) . "', \n" .
        "loket_no='" . $this->SQLValue($this->cp["loket_no"]->GetDBValue(), ccsText) . "', \n" .
        "loket_type='" . $this->SQLValue($this->cp["loket_type"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  p_bank_branch_id = " . $this->SQLValue($this->cp["p_bank_branch_id"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @61-FC5251A9
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["p_bank_branch_id"] = new clsSQLParameter("ctrlp_bank_branch_id", ccsFloat, "", "", $this->p_bank_branch_id->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["p_bank_branch_id"]->GetValue()) and !strlen($this->cp["p_bank_branch_id"]->GetText()) and !is_bool($this->cp["p_bank_branch_id"]->GetValue())) 
            $this->cp["p_bank_branch_id"]->SetValue($this->p_bank_branch_id->GetValue(true));
        if (!strlen($this->cp["p_bank_branch_id"]->GetText()) and !is_bool($this->cp["p_bank_branch_id"]->GetValue(true))) 
            $this->cp["p_bank_branch_id"]->SetText(0);
        $this->SQL = "DELETE FROM ifp.p_bank_branch WHERE  p_bank_branch_id = " . $this->SQLValue($this->cp["p_bank_branch_id"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End FORMDataSource Class @61-FCB6E20C

//Initialize Page @1-4C2DCEF0
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
$TemplateFileName = "P_BANK_BRANCH.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-1F4C461E
include_once("./P_BANK_BRANCH_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-8BFB5A9F
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$GRID = & new clsGridGRID("", $MainPage);
$GRIDSearch = & new clsRecordGRIDSearch("", $MainPage);
$FORM = & new clsRecordFORM("", $MainPage);
$MainPage->GRID = & $GRID;
$MainPage->GRIDSearch = & $GRIDSearch;
$MainPage->FORM = & $FORM;
$GRID->Initialize();
$FORM->Initialize();

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

//Execute Components @1-9AD1D635
$GRIDSearch->Operation();
$FORM->Operation();
//End Execute Components

//Go to destination page @1-8F20A767
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($GRID);
    unset($GRIDSearch);
    unset($FORM);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2B10AC35
$GRID->Show();
$GRIDSearch->Show();
$FORM->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D90D516F
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($GRID);
unset($GRIDSearch);
unset($FORM);
unset($Tpl);
//End Unload Page


?>
