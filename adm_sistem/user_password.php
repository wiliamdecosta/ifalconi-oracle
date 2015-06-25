<?php
//Include Common Files @1-B8E483C3
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "user_password.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordp_app_user { //p_app_user Class @2-B88D6982

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

//Class_Initialize Event @2-6686E656
    function clsRecordp_app_user($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_app_user/Error";
        $this->DataSource = new clsp_app_userDataSource($this);
        $this->ds = & $this->DataSource;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_app_user";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->user_name = & new clsControl(ccsTextBox, "user_name", "User Name", ccsText, "", CCGetRequestParam("user_name", $Method, NULL), $this);
            $this->new_pwd1 = & new clsControl(ccsTextBox, "new_pwd1", "new_pwd1", ccsText, "", CCGetRequestParam("new_pwd1", $Method, NULL), $this);
            $this->new_pwd2 = & new clsControl(ccsTextBox, "new_pwd2", "new_pwd2", ccsText, "", CCGetRequestParam("new_pwd2", $Method, NULL), $this);
            $this->old_pwd = & new clsControl(ccsTextBox, "old_pwd", "old_pwd", ccsText, "", CCGetRequestParam("old_pwd", $Method, NULL), $this);
            $this->user_pwd = & new clsControl(ccsTextBox, "user_pwd", "User Pwd", ccsText, "", CCGetRequestParam("user_pwd", $Method, NULL), $this);
            $this->user_pwd->Required = true;
            $this->p_app_user_id = & new clsControl(ccsTextBox, "p_app_user_id", "p_app_user_id", ccsText, "", CCGetRequestParam("p_app_user_id", $Method, NULL), $this);
            $this->p_app_userGridPage = & new clsControl(ccsTextBox, "p_app_userGridPage", "p_app_userGridPage", ccsText, "", CCGetRequestParam("p_app_userGridPage", $Method, NULL), $this);
            $this->user_id = & new clsControl(ccsTextBox, "user_id", "user_id", ccsText, "", CCGetRequestParam("user_id", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-06ED8DF2
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_app_user_id"] = CCGetFromGet("p_app_user_id", NULL);
    }
//End Initialize Method

//Validate Method @2-5DD93DEF
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->user_name->Validate() && $Validation);
        $Validation = ($this->new_pwd1->Validate() && $Validation);
        $Validation = ($this->new_pwd2->Validate() && $Validation);
        $Validation = ($this->old_pwd->Validate() && $Validation);
        $Validation = ($this->user_pwd->Validate() && $Validation);
        $Validation = ($this->p_app_user_id->Validate() && $Validation);
        $Validation = ($this->p_app_userGridPage->Validate() && $Validation);
        $Validation = ($this->user_id->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->user_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->new_pwd1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->new_pwd2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->old_pwd->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_pwd->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_app_user_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_app_userGridPage->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_id->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-9FEC46CA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->user_name->Errors->Count());
        $errors = ($errors || $this->new_pwd1->Errors->Count());
        $errors = ($errors || $this->new_pwd2->Errors->Count());
        $errors = ($errors || $this->old_pwd->Errors->Count());
        $errors = ($errors || $this->user_pwd->Errors->Count());
        $errors = ($errors || $this->p_app_user_id->Errors->Count());
        $errors = ($errors || $this->p_app_userGridPage->Errors->Count());
        $errors = ($errors || $this->user_id->Errors->Count());
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

//Operation Method @2-517B5C36
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
            $this->PressedButton = $this->EditMode ? "Button_Update" : "";
            if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->Validate()) {
            if($this->PressedButton == "Button_Update") {
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

//UpdateRow Method @2-3FFAFC5C
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->new_pwd1->SetValue($this->new_pwd1->GetValue(true));
        $this->DataSource->old_pwd->SetValue($this->old_pwd->GetValue(true));
        $this->DataSource->user_pwd->SetValue($this->user_pwd->GetValue(true));
        $this->DataSource->p_app_user_id->SetValue($this->p_app_user_id->GetValue(true));
        $this->DataSource->new_pwd2->SetValue($this->new_pwd2->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @2-F56F7F74
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
                    $this->user_name->SetValue($this->DataSource->user_name->GetValue());
                    $this->user_pwd->SetValue($this->DataSource->user_pwd->GetValue());
                    $this->user_id->SetValue($this->DataSource->user_id->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->user_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->new_pwd1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->new_pwd2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->old_pwd->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_pwd->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_app_user_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_app_userGridPage->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_id->Errors->ToString());
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
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Update->Show();
        $this->user_name->Show();
        $this->new_pwd1->Show();
        $this->new_pwd2->Show();
        $this->old_pwd->Show();
        $this->user_pwd->Show();
        $this->p_app_user_id->Show();
        $this->p_app_userGridPage->Show();
        $this->user_id->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_app_user Class @2-FCB6E20C

class clsp_app_userDataSource extends clsDBConn {  //p_app_userDataSource Class @2-2E065567

//DataSource Variables @2-5BFAFA01
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $UpdateParameters;
    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $user_name;
    var $new_pwd1;
    var $new_pwd2;
    var $old_pwd;
    var $user_pwd;
    var $p_app_user_id;
    var $p_app_userGridPage;
    var $user_id;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-4472A5AE
    function clsp_app_userDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_app_user/Error";
        $this->Initialize();
        $this->user_name = new clsField("user_name", ccsText, "");
        
        $this->new_pwd1 = new clsField("new_pwd1", ccsText, "");
        
        $this->new_pwd2 = new clsField("new_pwd2", ccsText, "");
        
        $this->old_pwd = new clsField("old_pwd", ccsText, "");
        
        $this->user_pwd = new clsField("user_pwd", ccsText, "");
        
        $this->p_app_user_id = new clsField("p_app_user_id", ccsText, "");
        
        $this->p_app_userGridPage = new clsField("p_app_userGridPage", ccsText, "");
        
        $this->user_id = new clsField("user_id", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-076179D3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_app_user_id", ccsFloat, "", "", $this->Parameters["urlp_app_user_id"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @2-B8B35C73
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM p_app_user\n" .
        "WHERE p_app_user_id = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-2AE103DF
    function SetValues()
    {
        $this->user_name->SetDBValue($this->f("user_name"));
        $this->user_pwd->SetDBValue($this->f("user_pwd"));
        $this->user_id->SetDBValue($this->f("user_id"));
    }
//End SetValues Method

//Update Method @2-8D7D227E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["new_pwd1"] = new clsSQLParameter("ctrlnew_pwd1", ccsText, "", "", $this->new_pwd1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["old_pwd"] = new clsSQLParameter("ctrlold_pwd", ccsText, "", "", $this->old_pwd->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["user_pwd"] = new clsSQLParameter("ctrluser_pwd", ccsText, "", "", $this->user_pwd->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_app_user_id"] = new clsSQLParameter("ctrlp_app_user_id", ccsFloat, "", "", $this->p_app_user_id->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["new_pwd2"] = new clsSQLParameter("ctrlnew_pwd2", ccsText, "", "", $this->new_pwd2->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["new_pwd1"]->GetValue()) and !strlen($this->cp["new_pwd1"]->GetText()) and !is_bool($this->cp["new_pwd1"]->GetValue())) 
            $this->cp["new_pwd1"]->SetValue($this->new_pwd1->GetValue(true));
        if (!is_null($this->cp["old_pwd"]->GetValue()) and !strlen($this->cp["old_pwd"]->GetText()) and !is_bool($this->cp["old_pwd"]->GetValue())) 
            $this->cp["old_pwd"]->SetValue($this->old_pwd->GetValue(true));
        if (!is_null($this->cp["user_pwd"]->GetValue()) and !strlen($this->cp["user_pwd"]->GetText()) and !is_bool($this->cp["user_pwd"]->GetValue())) 
            $this->cp["user_pwd"]->SetValue($this->user_pwd->GetValue(true));
        if (!is_null($this->cp["p_app_user_id"]->GetValue()) and !strlen($this->cp["p_app_user_id"]->GetText()) and !is_bool($this->cp["p_app_user_id"]->GetValue())) 
            $this->cp["p_app_user_id"]->SetValue($this->p_app_user_id->GetValue(true));
        if (!strlen($this->cp["p_app_user_id"]->GetText()) and !is_bool($this->cp["p_app_user_id"]->GetValue(true))) 
            $this->cp["p_app_user_id"]->SetText(0);
        if (!is_null($this->cp["new_pwd2"]->GetValue()) and !strlen($this->cp["new_pwd2"]->GetText()) and !is_bool($this->cp["new_pwd2"]->GetValue())) 
            $this->cp["new_pwd2"]->SetValue($this->new_pwd2->GetValue(true));

		if($this->SQLValue($this->cp["new_pwd1"]->GetDBValue(), ccsText)==$this->SQLValue($this->cp["new_pwd2"]->GetDBValue(), ccsText))
		{
			$this->SQL = "update hms.p_app_user set user_pwd=md5('" . $this->SQLValue($this->cp["new_pwd1"]->GetDBValue(), ccsText) . "') where p_app_user_id = " . $this->SQLValue($this->cp["p_app_user_id"]->GetDBValue(), ccsFloat) . " ";
	        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
	        if($this->Errors->Count() == 0 && $this->CmdExecution) {
	            $this->query($this->SQL);
	            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
	        } 
		} else {$this->Errors->addError("Password Baru tidak cocok");}
        
    }
//End Update Method

} //End p_app_userDataSource Class @2-FCB6E20C

//Initialize Page @1-E8A24156
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
$TemplateFileName = "user_password.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-DCCDE8E8
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$p_app_user = & new clsRecordp_app_user("", $MainPage);
$MainPage->p_app_user = & $p_app_user;
$p_app_user->Initialize();

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

//Execute Components @1-D5826732
$p_app_user->Operation();
//End Execute Components

//Go to destination page @1-73A748D8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($p_app_user);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-491F61F2
$p_app_user->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-5E8D5088
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($p_app_user);
unset($Tpl);
//End Unload Page


?>
