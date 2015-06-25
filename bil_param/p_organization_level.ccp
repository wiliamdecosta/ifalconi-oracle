<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT *FROM P_ORGANIZATION_LEVEL
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_ORGANIZATION_LEVEL" orderBy="P_ORGANIZATION_LEVEL_ID" pageSizeLimit="100" wizardCaption=" P ORGANIZATION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions">
<Components>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ORGANIZATION_LEVELCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="24" fieldSourceType="DBColumn" dataType="Float" html="False" name="HIERARCHY_LEVEL" fieldSource="HIERARCHY_LEVEL" wizardCaption="HIERARCHY LEVEL" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ORGANIZATION_LEVELHIERARCHY_LEVEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ORGANIZATION_LEVELDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="29" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="60"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ORGANIZATION_LEVELDLink" hrefSource="p_organization_level.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="54" sourceType="DataField" name="P_ORGANIZATION_LEVEL_ID" source="P_ORGANIZATION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ORGANIZATION_LEVEL_Insert" PathID="P_ORGANIZATION_LEVELP_ORGANIZATION_LEVEL_Insert" hrefSource="p_organization_level.ccp" wizardUseTemplateBlock="False" removeParameters="P_REGION_LEVEL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="56"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="57" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ORGANIZATION_LEVEL_ID" fieldSource="P_ORGANIZATION_LEVEL_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_organization_level.ccp" wizardThemeItem="GridA" PathID="P_ORGANIZATION_LEVELP_ORGANIZATION_LEVEL_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_ORGANIZATION_LEVEL_ID" source="P_ORGANIZATION_LEVEL_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="61"/>
<Action actionName="Set Row Style" actionCategory="General" id="64" styles="Row;AltRow"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="LEVEL_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="51" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ORGANIZATION_LEVELSearch" wizardCaption=" P ORGANIZATION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_organization_level.ccp" PathID="P_ORGANIZATION_LEVELSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_ORGANIZATION_LEVELSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_ORGANIZATION_LEVELSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
</Components>
<Events/>
<TableParameters/>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters/>
<IFormElements/>
<USPParameters/>
<USQLParameters/>
<UConditions/>
<UFormElements/>
<DSPParameters/>
<DSQLParameters/>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
<Record id="30" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_ORGANIZATION_LEVEL1" dataSource="SELECT * FROM P_ORGANIZATION_LEVEL
WHERE P_ORGANIZATION_LEVEL_ID = {P_ORGANIZATION_LEVEL_ID}" errorSummator="Error" wizardCaption=" P ORGANIZATION LEVEL " wizardFormMethod="post" PathID="P_ORGANIZATION_LEVEL1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_ORGANIZATION_LEVEL (P_ORGANIZATION_LEVEL_ID, CODE, HIERARCHY_LEVEL, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_ORGANIZATION_LEVEL','P_ORGANIZATION_LEVEL_ID'),'{CODE}',{HIERARCHY_LEVEL},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_ORGANIZATION_LEVEL SET
CODE = '{CODE}',
HIERARCHY_LEVEL = {HIERARCHY_LEVEL},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_ORGANIZATION_LEVEL_ID = {P_ORGANIZATION_LEVEL_ID}" customDeleteType="SQL" customDelete="DELETE P_ORGANIZATION_LEVEL
WHERE P_ORGANIZATION_LEVEL_ID = {P_ORGANIZATION_LEVEL_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="HIERARCHY_LEVEL" fieldSource="HIERARCHY_LEVEL" required="True" caption="HIERARCHY LEVEL" wizardCaption="HIERARCHY LEVEL" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1HIERARCHY_LEVEL">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="43" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_ORGANIZATION_LEVEL1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="47" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_ORGANIZATION_LEVEL1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_ORGANIZATION_LEVEL1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_ORGANIZATION_LEVEL1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="49" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_ORGANIZATION_LEVEL1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ORGANIZATION_LEVEL_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ORGANIZATION_LEVEL1P_ORGANIZATION_LEVEL_ID" fieldSource="P_ORGANIZATION_LEVEL_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="36" conditionType="Parameter" useIsNull="False" field="P_ORGANIZATION_LEVEL_ID" parameterSource="P_ORGANIZATION_LEVEL_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="59" parameterType="URL" variable="P_ORGANIZATION_LEVEL_ID" dataType="Float" parameterSource="P_ORGANIZATION_LEVEL_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="71" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="72" variable="HIERARCHY_LEVEL" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="HIERARCHY_LEVEL"/>
<SQLParameter id="73" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="74" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="HIERARCHY_LEVEL" dataType="Float" parameterType="Control" parameterSource="HIERARCHY_LEVEL"/>
<CustomParameter id="67" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="68" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="69" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="70" field="P_ORGANIZATION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_LEVEL_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="81" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="82" variable="HIERARCHY_LEVEL" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="HIERARCHY_LEVEL"/>
<SQLParameter id="83" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="84" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="85" variable="P_ORGANIZATION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_LEVEL_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="75" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="76" field="HIERARCHY_LEVEL" dataType="Float" parameterType="Control" parameterSource="HIERARCHY_LEVEL"/>
<CustomParameter id="77" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="78" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="79" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="80" field="P_ORGANIZATION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_ORGANIZATION_LEVEL_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="86" variable="P_ORGANIZATION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ORGANIZATION_LEVEL_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_organization_level.php" forShow="True" url="p_organization_level.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_organization_level_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="62"/>
</Actions>
</Event>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="63"/>
</Actions>
</Event>
</Events>
</Page>
