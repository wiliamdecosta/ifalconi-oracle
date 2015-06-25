<?php
//Include Common Files @1-15E7D302
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_sistem/");
define("FileName", "daemon_manager.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordDAEMONForm { //DAEMONForm Class @2-6650E0DB

//Variables @2-D6FF3E86

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

//Class_Initialize Event @2-F5B797EB
    function clsRecordDAEMONForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record DAEMONForm/Error";
        $this->DataSource = new clsDAEMONFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "DAEMONForm";
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
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->PROCEDURE_NAME = & new clsControl(ccsTextBox, "PROCEDURE_NAME", "PROCEDURE NAME", ccsText, "", CCGetRequestParam("PROCEDURE_NAME", $Method, NULL), $this);
            $this->SCHEMA_USER = & new clsControl(ccsTextBox, "SCHEMA_USER", "SCHEMA USER", ccsText, "", CCGetRequestParam("SCHEMA_USER", $Method, NULL), $this);
            $this->SCHEMA_USER->Required = true;
            $this->LAST_DATE = & new clsControl(ccsTextBox, "LAST_DATE", "LAST DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("LAST_DATE", $Method, NULL), $this);
            $this->NEXT_DATE = & new clsControl(ccsTextBox, "NEXT_DATE", "NEXT DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy", " ", "HH", ":", "nn", ":", "ss"), CCGetRequestParam("NEXT_DATE", $Method, NULL), $this);
            $this->NEXT_DATE->Required = true;
            $this->JOB = & new clsControl(ccsHidden, "JOB", "JOB", ccsFloat, "", CCGetRequestParam("JOB", $Method, NULL), $this);
            $this->JOB->Required = true;
            $this->Button_Refresh = & new clsButton("Button_Refresh", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-5D060BAC
    function Initialize()
    {

        if(!$this->Visible)
            return;

    }
//End Initialize Method

//Validate Method @2-1BD964C1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->PROCEDURE_NAME->Validate() && $Validation);
        $Validation = ($this->SCHEMA_USER->Validate() && $Validation);
        $Validation = ($this->LAST_DATE->Validate() && $Validation);
        $Validation = ($this->NEXT_DATE->Validate() && $Validation);
        $Validation = ($this->JOB->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->PROCEDURE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SCHEMA_USER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NEXT_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->JOB->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-0272FB50
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->PROCEDURE_NAME->Errors->Count());
        $errors = ($errors || $this->SCHEMA_USER->Errors->Count());
        $errors = ($errors || $this->LAST_DATE->Errors->Count());
        $errors = ($errors || $this->NEXT_DATE->Errors->Count());
        $errors = ($errors || $this->JOB->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
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

//Operation Method @2-CAC59599
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = true;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Refresh->Pressed) {
                $this->PressedButton = "Button_Refresh";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Insert") {
            if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Refresh") {
            if(!CCGetEvent($this->Button_Refresh->CCSEvents, "OnClick", $this->Button_Refresh)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Update") {
            if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @2-2B6A5BEC
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-92E06AB0
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-A3B1F2E8
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
                    $this->PROCEDURE_NAME->SetValue($this->DataSource->PROCEDURE_NAME->GetValue());
                    $this->SCHEMA_USER->SetValue($this->DataSource->SCHEMA_USER->GetValue());
                    $this->LAST_DATE->SetValue($this->DataSource->LAST_DATE->GetValue());
                    $this->NEXT_DATE->SetValue($this->DataSource->NEXT_DATE->GetValue());
                    $this->JOB->SetValue($this->DataSource->JOB->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->PROCEDURE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SCHEMA_USER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NEXT_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->JOB->Errors->ToString());
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
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Delete->Show();
        $this->PROCEDURE_NAME->Show();
        $this->SCHEMA_USER->Show();
        $this->LAST_DATE->Show();
        $this->NEXT_DATE->Show();
        $this->JOB->Show();
        $this->Button_Refresh->Show();
        $this->Button_Update->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End DAEMONForm Class @2-FCB6E20C

class clsDAEMONFormDataSource extends clsDBConn {  //DAEMONFormDataSource Class @2-1A6FFB79

//DataSource Variables @2-9A993414
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
    var $PROCEDURE_NAME;
    var $SCHEMA_USER;
    var $LAST_DATE;
    var $NEXT_DATE;
    var $JOB;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-18213B99
    function clsDAEMONFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record DAEMONForm/Error";
        $this->Initialize();
        $this->PROCEDURE_NAME = new clsField("PROCEDURE_NAME", ccsText, "");
        
        $this->SCHEMA_USER = new clsField("SCHEMA_USER", ccsText, "");
        
        $this->LAST_DATE = new clsField("LAST_DATE", ccsDate, $this->DateFormat);
        
        $this->NEXT_DATE = new clsField("NEXT_DATE", ccsDate, $this->DateFormat);
        
        $this->JOB = new clsField("JOB", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-E46A5EC7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_DAEMON {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-3A40FAE9
    function SetValues()
    {
        $this->PROCEDURE_NAME->SetDBValue($this->f("PROCEDURE_NAME"));
        $this->SCHEMA_USER->SetDBValue($this->f("SCHEMA_USER"));
        $this->LAST_DATE->SetDBValue(trim($this->f("LAST_DATE")));
        $this->NEXT_DATE->SetDBValue(trim($this->f("NEXT_DATE")));
        $this->JOB->SetDBValue(trim($this->f("JOB")));
    }
//End SetValues Method

//Insert Method @2-21F08FDB
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["RETURN_VALUE"] = new clsSQLParameter("urlRETURN_VALUE", ccsText, "", "", CCGetFromGet("RETURN_VALUE", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["RETURN_VALUE"]->GetValue()) and !strlen($this->cp["RETURN_VALUE"]->GetText()) and !is_bool($this->cp["RETURN_VALUE"]->GetValue())) 
            $this->cp["RETURN_VALUE"]->SetText(CCGetFromGet("RETURN_VALUE", NULL));
        $this->SQL = "DECLARE RetVal VARCHAR2(2000); BEGIN  RetVal := PACK_BACKGROUND_SCHEDULER.START_DAEMON;  END;";
//        $this->SQL = "BEGIN PACK_BACKGROUND_SCHEDULER.START_DAEMON (" . "); END;";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-7292FC6A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["RETURN_VALUE"] = new clsSQLParameter("urlRETURN_VALUE", ccsText, "", "", CCGetFromGet("RETURN_VALUE", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["RETURN_VALUE"]->GetValue()) and !strlen($this->cp["RETURN_VALUE"]->GetText()) and !is_bool($this->cp["RETURN_VALUE"]->GetValue())) 
            $this->cp["RETURN_VALUE"]->SetText(CCGetFromGet("RETURN_VALUE", NULL));
        $this->SQL = "DECLARE RetVal VARCHAR2(2000); BEGIN  RetVal := PACK_BACKGROUND_SCHEDULER.FORCE_SCHEDULER;  END;";
//        $this->SQL = "BEGIN PACK_BACKGROUND_SCHEDULER.FORCE_SCHEDULER (" . "); END;";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-CE32D126
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["RETURN_VALUE"] = new clsSQLParameter("urlRETURN_VALUE", ccsText, "", "", CCGetFromGet("RETURN_VALUE", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["RETURN_VALUE"]->GetValue()) and !strlen($this->cp["RETURN_VALUE"]->GetText()) and !is_bool($this->cp["RETURN_VALUE"]->GetValue())) 
            $this->cp["RETURN_VALUE"]->SetText(CCGetFromGet("RETURN_VALUE", NULL));
        $this->SQL = "DECLARE RetVal VARCHAR2(2000); BEGIN  RetVal := PACK_BACKGROUND_SCHEDULER.STOP_DAEMON;  END;";
//        $this->SQL = "BEGIN PACK_BACKGROUND_SCHEDULER.STOP_DAEMON (" . "); END;";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End DAEMONFormDataSource Class @2-FCB6E20C


//Initialize Page @1-055320FB
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
$TemplateFileName = "daemon_manager.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-14912588
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$DAEMONForm = & new clsRecordDAEMONForm("", $MainPage);
$MainPage->DAEMONForm = & $DAEMONForm;
$DAEMONForm->Initialize();

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

//Execute Components @1-23E0159C
$DAEMONForm->Operation();
//End Execute Components

//Go to destination page @1-F3C5BB03
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($DAEMONForm);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2464F32B
$DAEMONForm->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A8EF2226
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($DAEMONForm);
unset($Tpl);
//End Unload Page


?>
