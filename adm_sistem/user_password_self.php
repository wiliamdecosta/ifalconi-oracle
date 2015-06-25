<?php
//Include Common Files @1-3650B942
define("RelativePath", "..");
define("PathToCurrentPage", "/adm_sistem/");
define("FileName", "user_password_self.php");
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

//Class_Initialize Event @2-E5264C6E
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
            $this->password1 = & new clsControl(ccsTextBox, "password1", "New Password", ccsText, "", CCGetRequestParam("password1", $Method, NULL), $this);
            $this->password1->Required = true;
            $this->password2 = & new clsControl(ccsTextBox, "password2", "Retype New Password", ccsText, "", CCGetRequestParam("password2", $Method, NULL), $this);
            $this->password2->Required = true;
            $this->old_pass = & new clsControl(ccsTextBox, "old_pass", "Old Password", ccsText, "", CCGetRequestParam("old_pass", $Method, NULL), $this);
            $this->old_pass->Required = true;
            $this->user_id = & new clsControl(ccsTextBox, "user_id", "User Id", ccsFloat, "", CCGetRequestParam("user_id", $Method, NULL), $this);
            $this->user_id->Required = true;
            $this->user_pwd = & new clsControl(ccsHidden, "user_pwd", "user_pwd", ccsText, "", CCGetRequestParam("user_pwd", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-D3026D7D
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["sesUserID"] = CCGetSession("UserID", NULL);
    }
//End Initialize Method

//Validate Method @2-22B19EA5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->user_name->Validate() && $Validation);
        $Validation = ($this->password1->Validate() && $Validation);
        $Validation = ($this->password2->Validate() && $Validation);
        $Validation = ($this->old_pass->Validate() && $Validation);
        $Validation = ($this->user_id->Validate() && $Validation);
        $Validation = ($this->user_pwd->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->user_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->password1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->password2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->old_pass->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_pwd->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-7E0EFFA8
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->user_name->Errors->Count());
        $errors = ($errors || $this->password1->Errors->Count());
        $errors = ($errors || $this->password2->Errors->Count());
        $errors = ($errors || $this->old_pass->Errors->Count());
        $errors = ($errors || $this->user_id->Errors->Count());
        $errors = ($errors || $this->user_pwd->Errors->Count());
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

//Operation Method @2-CF44F482
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
        $Redirect = "../main/module.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//UpdateRow Method @2-CACA04D5
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->password1->SetValue($this->password1->GetValue(true));
        $this->DataSource->user_id->SetValue($this->user_id->GetValue(true));
        $this->DataSource->old_pass->SetValue($this->old_pass->GetValue(true));
        $this->DataSource->password2->SetValue($this->password2->GetValue(true));
        $this->DataSource->user_pwd->SetValue($this->user_pwd->GetValue(true));
        $this->DataSource->user_id->SetValue($this->user_id->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @2-D8D2CAB7
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
                    $this->user_id->SetValue($this->DataSource->user_id->GetValue());
                    $this->user_pwd->SetValue($this->DataSource->user_pwd->GetValue());
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
            $Error = ComposeStrings($Error, $this->password1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->password2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->old_pass->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_pwd->Errors->ToString());
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
        $this->password1->Show();
        $this->password2->Show();
        $this->old_pass->Show();
        $this->user_id->Show();
        $this->user_pwd->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_app_user Class @2-FCB6E20C

class clsp_app_userDataSource extends clsDBConn {  //p_app_userDataSource Class @2-2E065567

//DataSource Variables @2-E6A4C4F3
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
    var $password1;
    var $password2;
    var $old_pass;
    var $user_id;
    var $user_pwd;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-DDA00D87
    function clsp_app_userDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_app_user/Error";
        $this->Initialize();
        $this->user_name = new clsField("user_name", ccsText, "");
        
        $this->password1 = new clsField("password1", ccsText, "");
        
        $this->password2 = new clsField("password2", ccsText, "");
        
        $this->old_pass = new clsField("old_pass", ccsText, "");
        
        $this->user_id = new clsField("user_id", ccsFloat, "");
        
        $this->user_pwd = new clsField("user_pwd", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-25C5C4F4
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sesUserID", ccsFloat, "", "", $this->Parameters["sesUserID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "P_USER_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-48F29A2B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM P_USER {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method



//SetValues Method @2-96900B12
    function SetValues()
    {
        $this->user_name->SetDBValue($this->f("USER_NAME"));
        $this->user_id->SetDBValue(trim($this->f("P_USER_ID")));
        $this->user_pwd->SetDBValue($this->f("USER_PWD"));
    }
//End SetValues Method

//Update Method @2-6F3F5CA0
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["password1"] = new clsSQLParameter("ctrlpassword1", ccsText, "", "", $this->password1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["user_id"] = new clsSQLParameter("ctrluser_id", ccsFloat, "", "", $this->user_id->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["old_pass"] = new clsSQLParameter("ctrlold_pass", ccsText, "", "", $this->old_pass->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["password2"] = new clsSQLParameter("ctrlpassword2", ccsText, "", "", $this->password2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["user_pwd"] = new clsSQLParameter("ctrluser_pwd", ccsText, "", "", $this->user_pwd->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["password1"]->GetValue()) and !strlen($this->cp["password1"]->GetText()) and !is_bool($this->cp["password1"]->GetValue())) 
            $this->cp["password1"]->SetValue($this->password1->GetValue(true));
        if (!is_null($this->cp["user_id"]->GetValue()) and !strlen($this->cp["user_id"]->GetText()) and !is_bool($this->cp["user_id"]->GetValue())) 
            $this->cp["user_id"]->SetValue($this->user_id->GetValue(true));
        if (!strlen($this->cp["user_id"]->GetText()) and !is_bool($this->cp["user_id"]->GetValue(true))) 
            $this->cp["user_id"]->SetText(0);
        if (!is_null($this->cp["old_pass"]->GetValue()) and !strlen($this->cp["old_pass"]->GetText()) and !is_bool($this->cp["old_pass"]->GetValue())) 
            $this->cp["old_pass"]->SetValue($this->old_pass->GetValue(true));
        if (!is_null($this->cp["password2"]->GetValue()) and !strlen($this->cp["password2"]->GetText()) and !is_bool($this->cp["password2"]->GetValue())) 
            $this->cp["password2"]->SetValue($this->password2->GetValue(true));
        if (!is_null($this->cp["user_pwd"]->GetValue()) and !strlen($this->cp["user_pwd"]->GetText()) and !is_bool($this->cp["user_pwd"]->GetValue())) 
            $this->cp["user_pwd"]->SetValue($this->user_pwd->GetValue(true));
		if( strtoupper(md5($this->SQLValue($this->cp["old_pass"]->GetDBValue(), ccsText))) == $this->SQLValue($this->cp["user_pwd"]->GetDBValue(), ccsText) ) {
			if($this->SQLValue($this->cp["password1"]->GetDBValue(), ccsText)==$this->SQLValue($this->cp["password2"]->GetDBValue(), ccsText)){

        $this->SQL = "UPDATE P_USER SET user_pwd=UPPER('" . md5($this->SQLValue($this->cp["password1"]->GetDBValue(), ccsText)) . "') WHERE  P_USER_ID = " . $this->SQLValue($this->cp["user_id"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }

			}else {$this->Errors->addError("Password Baru tidak cocok");}
		}else {$this->Errors->addError("Password Lama tidak cocok");}

    }
//End Update Method



} //End p_app_userDataSource Class @2-FCB6E20C

//Initialize Page @1-5B60AF34
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
$TemplateFileName = "user_password_self.html";
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
