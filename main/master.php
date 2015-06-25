<?php
//Include Common Files @1-950FFA6F
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "master.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsMenutrbmenu extends clsMenu { //trbmenu class @2-32848E92

//Class_Initialize Event @2-EA1CC995
    function clsMenutrbmenu($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "trbmenu";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu trbmenu";


        $this->DataSource = new clstrbmenuDataSource($this);
        $this->ds = & $this->DataSource;

        parent::clsMenu("PARENT_ID", "P_APP_MENU_ID", null);

        $this->ItemLink = & new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Class_Initialize Event

//SetControlValues Method @2-0B02AD2C
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $this->ItemLink->Page = $this->DataSource->f("FILE_NAME");
        $this->Attributes->SetValue("Target", $this->DataSource->f("FRAME"));
        $this->Attributes->SetValue("Title", "");
    }
//End SetControlValues Method

//SetParameters Method @2-7D0EB7B6
    function SetParameters() {
        $this->DataSource->Parameters["urlp_application_id"] = CCGetFromGet("p_application_id", NULL);
    }
//End SetParameters Method

//ShowAttributes @2-CEE4D9D6
    function ShowAttributes() {
        $this->Attributes->SetValue("Target", $this->DataSource->f("FRAME"));
        $this->Attributes->SetValue("Title", "");
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End trbmenu Class @2-FCB6E20C

class clstrbmenuDataSource extends clsDBTRBConn {  //trbmenuDataSource Class @2-5305EF70

//DataSource Variables @2-AFAC5931
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;

    var $FieldsList = array();

    // Datasource fields
    var $ItemLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-969D9E7B
    function clstrbmenuDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Menu trbmenu";
        $this->Initialize();
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-2F992C3F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "LISTING_NO";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-5CB91113
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_application_id", ccsFloat, "", "", $this->Parameters["urlp_application_id"], "", false);
    }
//End Prepare Method

//Open Method @2-2BE5AB1A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n" .
        "FROM V_MENU_DISPLAY\n" .
        "WHERE P_APPLICATION_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "  {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-F5C2E5FA
    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("CODE"));
    }
//End SetValues Method

} //End trbmenuDataSource Class @2-FCB6E20C

//Initialize Page @1-6A833280
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
$TemplateFileName = "master.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0155320D
$DBTRBConn = new clsDBTRBConn();
$MainPage->Connections["TRBConn"] = & $DBTRBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$trbmenu = & new clsMenutrbmenu("", $MainPage);
$MainPage->trbmenu = & $trbmenu;
$trbmenu->Initialize();

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

//Go to destination page @1-1FE93FE2
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBTRBConn->close();
    header("Location: " . $Redirect);
    unset($trbmenu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-57CA625C
$trbmenu->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-4FC9C5EB
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBTRBConn->close();
unset($trbmenu);
unset($Tpl);
//End Unload Page


?>
