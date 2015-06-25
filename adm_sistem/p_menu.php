<?php
//Include Common Files @1-423803D7
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "p_menu.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_MENUGrid { //P_MENUGrid class @101-9A5DDA69

//Variables @101-AC1EDBB9

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

//Class_Initialize Event @101-AD3A2469
    function clsGridP_MENUGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_MENUGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_MENUGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_MENUGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->IS_ACTIVE_CODE = & new clsControl(ccsLabel, "IS_ACTIVE_CODE", "IS_ACTIVE_CODE", ccsText, "", CCGetRequestParam("IS_ACTIVE_CODE", ccsGet, NULL), $this);
        $this->FILE_NAME = & new clsControl(ccsLabel, "FILE_NAME", "FILE_NAME", ccsText, "", CCGetRequestParam("FILE_NAME", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_menu.php";
        $this->P_MENU_ID = & new clsControl(ccsHidden, "P_MENU_ID", "P_MENU_ID", ccsText, "", CCGetRequestParam("P_MENU_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this,"P_MENU_ID");
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->MENU_Insert = & new clsControl(ccsLink, "MENU_Insert", "MENU_Insert", ccsText, "", CCGetRequestParam("MENU_Insert", ccsGet, NULL), $this);
        $this->MENU_Insert->HTML = true;
        $this->MENU_Insert->Page = "p_menu.php";
    }
//End Class_Initialize Event

//Initialize Method @101-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @101-54FA88E9
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlP_APPLICATION_ID"] = CCGetFromGet("P_APPLICATION_ID", NULL);
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
            $this->ControlsVisible["IS_ACTIVE_CODE"] = $this->IS_ACTIVE_CODE->Visible;
            $this->ControlsVisible["FILE_NAME"] = $this->FILE_NAME->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_MENU_ID"] = $this->P_MENU_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->IS_ACTIVE_CODE->SetValue($this->DataSource->IS_ACTIVE_CODE->GetValue());
                $this->FILE_NAME->SetValue($this->DataSource->FILE_NAME->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_MENU_ID", $this->DataSource->f("P_MENU_ID"));
                $this->P_MENU_ID->SetValue($this->DataSource->P_MENU_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->IS_ACTIVE_CODE->Show();
                $this->FILE_NAME->Show();
                $this->DLink->Show();
                $this->P_MENU_ID->Show();
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
        $this->MENU_Insert->Parameters = CCGetQueryString("QueryString", array("P_MENU_ID", "ccsForm"));
        $this->MENU_Insert->Parameters = CCAddParam($this->MENU_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->MENU_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @101-9B28F2FB
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_ACTIVE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FILE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_MENU_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_MENUGrid Class @101-FCB6E20C

class clsP_MENUGridDataSource extends clsDBConn {  //P_MENUGridDataSource Class @101-703FAA34

//DataSource Variables @101-B76750BD
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $IS_ACTIVE_CODE;
    var $FILE_NAME;
    var $P_MENU_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @101-C0E89CE7
    function clsP_MENUGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_MENUGrid";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->IS_ACTIVE_CODE = new clsField("IS_ACTIVE_CODE", ccsText, "");
        
        $this->FILE_NAME = new clsField("FILE_NAME", ccsText, "");
        
        $this->P_MENU_ID = new clsField("P_MENU_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @101-D5886042
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "NVL(LISTING_NO,999)";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @101-81E8473A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_APPLICATION_ID", ccsFloat, "", "", $this->Parameters["urlP_APPLICATION_ID"], "", false);
        $this->wp->AddParameter("2", "urlPARENT_ID", ccsFloat, "", "", $this->Parameters["urlPARENT_ID"], 0, false);
    }
//End Prepare Method

//Open Method @101-00E79395
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM P_MENU\n" .
        "WHERE P_APPLICATION_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "AND NVL(PARENT_ID,0) = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM P_MENU\n" .
        "WHERE P_APPLICATION_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "AND NVL(PARENT_ID,0) = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "  {SQL_OrderBy}";
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


//SetValues Method @101-89CE6565
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->IS_ACTIVE_CODE->SetDBValue($this->f("IS_ACTIVE"));
        $this->FILE_NAME->SetDBValue($this->f("FILE_NAME"));
        $this->P_MENU_ID->SetDBValue($this->f("P_MENU_ID"));
    }
//End SetValues Method

} //End P_MENUGridDataSource Class @101-FCB6E20C



class clsRecordP_MENUForm { //P_MENUForm Class @252-E643A688

//Variables @252-D6FF3E86

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

//Class_Initialize Event @252-9CAD78C5
    function clsRecordP_MENUForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_MENUForm/Error";
        $this->DataSource = new clsP_MENUFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_MENUForm";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "Nama Menu", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->PARENT_ID = & new clsControl(ccsTextBox, "PARENT_ID", "PARENT ID", ccsFloat, "", CCGetRequestParam("PARENT_ID", $Method, NULL), $this);
            $this->FILE_NAME = & new clsControl(ccsTextBox, "FILE_NAME", "FILE NAME", ccsText, "", CCGetRequestParam("FILE_NAME", $Method, NULL), $this);
            $this->LISTING_NO = & new clsControl(ccsTextBox, "LISTING_NO", "LISTING NO", ccsFloat, "", CCGetRequestParam("LISTING_NO", $Method, NULL), $this);
            $this->IS_ACTIVE = & new clsControl(ccsListBox, "IS_ACTIVE", "Aktif?", ccsText, "", CCGetRequestParam("IS_ACTIVE", $Method, NULL), $this);
            $this->IS_ACTIVE->DSType = dsListOfValues;
            $this->IS_ACTIVE->Values = array(array("Y", "YA"), array("N", "TIDAK"));
            $this->IS_ACTIVE->Required = true;
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->CREATED_BY = & new clsControl(ccsTextBox, "CREATED_BY", "CREATED BY", ccsText, "", CCGetRequestParam("CREATED_BY", $Method, NULL), $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->UPDATED_BY = & new clsControl(ccsTextBox, "UPDATED_BY", "UPDATED BY", ccsText, "", CCGetRequestParam("UPDATED_BY", $Method, NULL), $this);
            $this->UPDATED_DATE = & new clsControl(ccsTextBox, "UPDATED_DATE", "UPDATED DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATED_DATE", $Method, NULL), $this);
            $this->P_APPLICATION_ID = & new clsControl(ccsTextBox, "P_APPLICATION_ID", "P APPLICATION ID", ccsFloat, "", CCGetRequestParam("P_APPLICATION_ID", $Method, NULL), $this);
            $this->P_MENU_ID = & new clsControl(ccsHidden, "P_MENU_ID", "P_MENU_ID", ccsText, "", CCGetRequestParam("P_MENU_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->PARENT_ID->Value) && !strlen($this->PARENT_ID->Value) && $this->PARENT_ID->Value !== false)
                    $this->PARENT_ID->SetText(0);
                if(!is_array($this->CREATED_BY->Value) && !strlen($this->CREATED_BY->Value) && $this->CREATED_BY->Value !== false)
                    $this->CREATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetValue(time());
                if(!is_array($this->UPDATED_BY->Value) && !strlen($this->UPDATED_BY->Value) && $this->UPDATED_BY->Value !== false)
                    $this->UPDATED_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATED_DATE->Value) && !strlen($this->UPDATED_DATE->Value) && $this->UPDATED_DATE->Value !== false)
                    $this->UPDATED_DATE->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @252-9DC55BEF
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_MENU_ID"] = CCGetFromGet("P_MENU_ID", NULL);
    }
//End Initialize Method

//Validate Method @252-A6EADFD9
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->PARENT_ID->Validate() && $Validation);
        $Validation = ($this->FILE_NAME->Validate() && $Validation);
        $Validation = ($this->LISTING_NO->Validate() && $Validation);
        $Validation = ($this->IS_ACTIVE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->CREATED_BY->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATED_BY->Validate() && $Validation);
        $Validation = ($this->UPDATED_DATE->Validate() && $Validation);
        $Validation = ($this->P_APPLICATION_ID->Validate() && $Validation);
        $Validation = ($this->P_MENU_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PARENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FILE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LISTING_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IS_ACTIVE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATED_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_APPLICATION_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_MENU_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @252-62D39E6B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->PARENT_ID->Errors->Count());
        $errors = ($errors || $this->FILE_NAME->Errors->Count());
        $errors = ($errors || $this->LISTING_NO->Errors->Count());
        $errors = ($errors || $this->IS_ACTIVE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->CREATED_BY->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATED_BY->Errors->Count());
        $errors = ($errors || $this->UPDATED_DATE->Errors->Count());
        $errors = ($errors || $this->P_APPLICATION_ID->Errors->Count());
        $errors = ($errors || $this->P_MENU_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @252-ED598703
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

//Operation Method @252-5ECDAC53
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
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "P_MENU_ID", "FLAG"));
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
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
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

//InsertRow Method @252-D17C5A61
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->PARENT_ID->SetValue($this->PARENT_ID->GetValue(true));
        $this->DataSource->FILE_NAME->SetValue($this->FILE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->IS_ACTIVE->SetValue($this->IS_ACTIVE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @252-97136BC9
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->FILE_NAME->SetValue($this->FILE_NAME->GetValue(true));
        $this->DataSource->LISTING_NO->SetValue($this->LISTING_NO->GetValue(true));
        $this->DataSource->IS_ACTIVE->SetValue($this->IS_ACTIVE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_MENU_ID->SetValue($this->P_MENU_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @252-EF3A7484
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_MENU_ID->SetValue($this->P_MENU_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @252-2B80DB22
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

        $this->IS_ACTIVE->Prepare();

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
                    $this->PARENT_ID->SetValue($this->DataSource->PARENT_ID->GetValue());
                    $this->FILE_NAME->SetValue($this->DataSource->FILE_NAME->GetValue());
                    $this->LISTING_NO->SetValue($this->DataSource->LISTING_NO->GetValue());
                    $this->IS_ACTIVE->SetValue($this->DataSource->IS_ACTIVE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->CREATED_BY->SetValue($this->DataSource->CREATED_BY->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATED_BY->SetValue($this->DataSource->UPDATED_BY->GetValue());
                    $this->UPDATED_DATE->SetValue($this->DataSource->UPDATED_DATE->GetValue());
                    $this->P_APPLICATION_ID->SetValue($this->DataSource->P_APPLICATION_ID->GetValue());
                    $this->P_MENU_ID->SetValue($this->DataSource->P_MENU_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PARENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FILE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LISTING_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IS_ACTIVE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATED_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_APPLICATION_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_MENU_ID->Errors->ToString());
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

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->CODE->Show();
        $this->PARENT_ID->Show();
        $this->FILE_NAME->Show();
        $this->LISTING_NO->Show();
        $this->IS_ACTIVE->Show();
        $this->DESCRIPTION->Show();
        $this->CREATED_BY->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATED_BY->Show();
        $this->UPDATED_DATE->Show();
        $this->P_APPLICATION_ID->Show();
        $this->P_MENU_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_MENUForm Class @252-FCB6E20C

class clsP_MENUFormDataSource extends clsDBConn {  //P_MENUFormDataSource Class @252-7AA739F0

//DataSource Variables @252-79A14BF2
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
    var $PARENT_ID;
    var $FILE_NAME;
    var $LISTING_NO;
    var $IS_ACTIVE;
    var $DESCRIPTION;
    var $CREATED_BY;
    var $CREATION_DATE;
    var $UPDATED_BY;
    var $UPDATED_DATE;
    var $P_APPLICATION_ID;
    var $P_MENU_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @252-AF564301
    function clsP_MENUFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_MENUForm/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->PARENT_ID = new clsField("PARENT_ID", ccsFloat, "");
        
        $this->FILE_NAME = new clsField("FILE_NAME", ccsText, "");
        
        $this->LISTING_NO = new clsField("LISTING_NO", ccsFloat, "");
        
        $this->IS_ACTIVE = new clsField("IS_ACTIVE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->CREATED_BY = new clsField("CREATED_BY", ccsText, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATED_BY = new clsField("UPDATED_BY", ccsText, "");
        
        $this->UPDATED_DATE = new clsField("UPDATED_DATE", ccsDate, $this->DateFormat);
        
        $this->P_APPLICATION_ID = new clsField("P_APPLICATION_ID", ccsFloat, "");
        
        $this->P_MENU_ID = new clsField("P_MENU_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @252-6F8E8993
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_MENU_ID", ccsFloat, "", "", $this->Parameters["urlP_MENU_ID"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_MENU_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),true);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @252-CD4D2E3F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM P_MENU {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @252-F4E7E9AD
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->PARENT_ID->SetDBValue(trim($this->f("PARENT_ID")));
        $this->FILE_NAME->SetDBValue($this->f("FILE_NAME"));
        $this->LISTING_NO->SetDBValue(trim($this->f("LISTING_NO")));
        $this->IS_ACTIVE->SetDBValue($this->f("IS_ACTIVE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->CREATED_BY->SetDBValue($this->f("CREATED_BY"));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATED_BY->SetDBValue($this->f("UPDATED_BY"));
        $this->UPDATED_DATE->SetDBValue(trim($this->f("UPDATED_DATE")));
        $this->P_APPLICATION_ID->SetDBValue(trim($this->f("P_APPLICATION_ID")));
        $this->P_MENU_ID->SetDBValue($this->f("P_MENU_ID"));
    }
//End SetValues Method

//Insert Method @252-94F7C7C7
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_APPLICATION_ID"] = new clsSQLParameter("urlP_APPLICATION_ID", ccsFloat, "", "", CCGetFromGet("P_APPLICATION_ID", NULL), -99, false, $this->ErrorBlock);
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["PARENT_ID"] = new clsSQLParameter("ctrlPARENT_ID", ccsFloat, "", "", $this->PARENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_NAME"] = new clsSQLParameter("ctrlFILE_NAME", ccsText, "", "", $this->FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), 1, false, $this->ErrorBlock);
        $this->cp["IS_ACTIVE"] = new clsSQLParameter("ctrlIS_ACTIVE", ccsText, "", "", $this->IS_ACTIVE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_APPLICATION_ID"]->GetValue()) and !strlen($this->cp["P_APPLICATION_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ID"]->GetValue())) 
            $this->cp["P_APPLICATION_ID"]->SetText(CCGetFromGet("P_APPLICATION_ID", NULL));
        if (!strlen($this->cp["P_APPLICATION_ID"]->GetText()) and !is_bool($this->cp["P_APPLICATION_ID"]->GetValue(true))) 
            $this->cp["P_APPLICATION_ID"]->SetText(-99);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["PARENT_ID"]->GetValue()) and !strlen($this->cp["PARENT_ID"]->GetText()) and !is_bool($this->cp["PARENT_ID"]->GetValue())) 
            $this->cp["PARENT_ID"]->SetValue($this->PARENT_ID->GetValue(true));
        if (!is_null($this->cp["FILE_NAME"]->GetValue()) and !strlen($this->cp["FILE_NAME"]->GetText()) and !is_bool($this->cp["FILE_NAME"]->GetValue())) 
            $this->cp["FILE_NAME"]->SetValue($this->FILE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue(true))) 
            $this->cp["LISTING_NO"]->SetText(1);
        if (!is_null($this->cp["IS_ACTIVE"]->GetValue()) and !strlen($this->cp["IS_ACTIVE"]->GetText()) and !is_bool($this->cp["IS_ACTIVE"]->GetValue())) 
            $this->cp["IS_ACTIVE"]->SetValue($this->IS_ACTIVE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "INSERT INTO P_MENU(P_MENU_ID, P_APPLICATION_ID, CODE, PARENT_ID, FILE_NAME, LISTING_NO, IS_ACTIVE, DESCRIPTION, CREATED_BY, CREATION_DATE, UPDATED_BY, UPDATED_DATE) VALUES\n" .
        "(GENERATE_ID('','P_MENU','P_MENU_ID'), \n" .
        "" . $this->SQLValue($this->cp["P_APPLICATION_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')), \n" .
        "DECODE(" . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . ",0,NULL," . $this->SQLValue($this->cp["PARENT_ID"]->GetDBValue(), ccsFloat) . "),\n" .
        "TRIM('" . $this->SQLValue($this->cp["FILE_NAME"]->GetDBValue(), ccsText) . "'), \n" .
        "" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["IS_ACTIVE"]->GetDBValue(), ccsText) . "', \n" .
        "TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        "'" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "', sysdate, \n" .
        "'" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "', sysdate\n" .
        ")";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @252-BB6BEA32
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["FILE_NAME"] = new clsSQLParameter("ctrlFILE_NAME", ccsText, "", "", $this->FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LISTING_NO"] = new clsSQLParameter("ctrlLISTING_NO", ccsFloat, "", "", $this->LISTING_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["IS_ACTIVE"] = new clsSQLParameter("ctrlIS_ACTIVE", ccsText, "", "", $this->IS_ACTIVE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["P_MENU_ID"] = new clsSQLParameter("ctrlP_MENU_ID", ccsFloat, "", "", $this->P_MENU_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["FILE_NAME"]->GetValue()) and !strlen($this->cp["FILE_NAME"]->GetText()) and !is_bool($this->cp["FILE_NAME"]->GetValue())) 
            $this->cp["FILE_NAME"]->SetValue($this->FILE_NAME->GetValue(true));
        if (!is_null($this->cp["LISTING_NO"]->GetValue()) and !strlen($this->cp["LISTING_NO"]->GetText()) and !is_bool($this->cp["LISTING_NO"]->GetValue())) 
            $this->cp["LISTING_NO"]->SetValue($this->LISTING_NO->GetValue(true));
        if (!is_null($this->cp["IS_ACTIVE"]->GetValue()) and !strlen($this->cp["IS_ACTIVE"]->GetText()) and !is_bool($this->cp["IS_ACTIVE"]->GetValue())) 
            $this->cp["IS_ACTIVE"]->SetValue($this->IS_ACTIVE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["P_MENU_ID"]->GetValue()) and !strlen($this->cp["P_MENU_ID"]->GetText()) and !is_bool($this->cp["P_MENU_ID"]->GetValue())) 
            $this->cp["P_MENU_ID"]->SetValue($this->P_MENU_ID->GetValue(true));
        if (!strlen($this->cp["P_MENU_ID"]->GetText()) and !is_bool($this->cp["P_MENU_ID"]->GetValue(true))) 
            $this->cp["P_MENU_ID"]->SetText(0);
        $this->SQL = "UPDATE P_MENU SET  \n" .
        "CODE=UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "')), \n" .
        "FILE_NAME=LOWER(TRIM('" . $this->SQLValue($this->cp["FILE_NAME"]->GetDBValue(), ccsText) . "')), \n" .
        "LISTING_NO=" . $this->SQLValue($this->cp["LISTING_NO"]->GetDBValue(), ccsFloat) . ", \n" .
        "IS_ACTIVE='" . $this->SQLValue($this->cp["IS_ACTIVE"]->GetDBValue(), ccsText) . "', \n" .
        "DESCRIPTION=TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "'), \n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "', \n" .
        "UPDATED_DATE= sysdate \n" .
        "WHERE P_MENU_ID = " . $this->SQLValue($this->cp["P_MENU_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @252-A3B6D83D
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_MENU_ID"] = new clsSQLParameter("ctrlP_MENU_ID", ccsFloat, "", "", $this->P_MENU_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_MENU_ID"]->GetValue()) and !strlen($this->cp["P_MENU_ID"]->GetText()) and !is_bool($this->cp["P_MENU_ID"]->GetValue())) 
            $this->cp["P_MENU_ID"]->SetValue($this->P_MENU_ID->GetValue(true));
        if (!strlen($this->cp["P_MENU_ID"]->GetText()) and !is_bool($this->cp["P_MENU_ID"]->GetValue(true))) 
            $this->cp["P_MENU_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_MENU WHERE P_MENU_ID = " . $this->SQLValue($this->cp["P_MENU_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_MENUFormDataSource Class @252-FCB6E20C



//Initialize Page @1-3FE850CC
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
$TemplateFileName = "p_menu.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-A7E2EED7
include_once("./p_menu_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E7C56C25
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_MENUGrid = & new clsGridP_MENUGrid("", $MainPage);
$P_MENUForm = & new clsRecordP_MENUForm("", $MainPage);
$appl_code = & new clsControl(ccsLabel, "appl_code", "appl_code", ccsText, "", CCGetRequestParam("appl_code", ccsGet, NULL), $MainPage);
$parent_code = & new clsControl(ccsLabel, "parent_code", "parent_code", ccsText, "", CCGetRequestParam("parent_code", ccsGet, NULL), $MainPage);
$MainPage->P_MENUGrid = & $P_MENUGrid;
$MainPage->P_MENUForm = & $P_MENUForm;
$MainPage->appl_code = & $appl_code;
$MainPage->parent_code = & $parent_code;
if(!is_array($appl_code->Value) && !strlen($appl_code->Value) && $appl_code->Value !== false)
    $appl_code->SetText(CCGetFromGet("APPL_CODE", NULL));
if(!is_array($parent_code->Value) && !strlen($parent_code->Value) && $parent_code->Value !== false)
    $parent_code->SetText(CCGetFromGet("PARENT_CODE", NULL));
$P_MENUGrid->Initialize();
$P_MENUForm->Initialize();

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

//Execute Components @1-99EFF7F8
$P_MENUForm->Operation();
//End Execute Components

//Go to destination page @1-44EC0F8B
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_MENUGrid);
    unset($P_MENUForm);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B80E62FA
$P_MENUGrid->Show();
$P_MENUForm->Show();
$appl_code->Show();
$parent_code->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EF843B1C
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_MENUGrid);
unset($P_MENUForm);
unset($Tpl);
//End Unload Page


?>
