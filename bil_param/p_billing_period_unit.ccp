<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM P_BILLING_PERIOD_UNIT
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_BILLING_PERIOD_UNIT" orderBy="P_BILLING_PERIOD_UNIT_ID" pageSizeLimit="100" wizardCaption=" P BILLING PERIOD UNIT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILLING_PERIOD_UNITCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="17" fieldSourceType="DBColumn" dataType="Float" html="False" name="DAY_AMT" fieldSource="DAY_AMT" wizardCaption="DAY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILLING_PERIOD_UNITDAY_AMT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="18" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="46"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="32" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILLING_PERIOD_UNITDLink" hrefSource="p_billing_period_unit.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="33" sourceType="DataField" name="P_BILLING_PERIOD_UNIT_ID" source="P_BILLING_PERIOD_UNIT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILLING_PERIOD_UNIT_Insert" PathID="P_BILLING_PERIOD_UNITP_BILLING_PERIOD_UNIT_Insert" hrefSource="p_billing_period_unit.ccp" wizardUseTemplateBlock="False" removeParameters="P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="35"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="36" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_billing_period_unit.ccp" wizardThemeItem="GridA" PathID="P_BILLING_PERIOD_UNITP_BILLING_PERIOD_UNIT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="13" sourceType="DataField" format="yyyy-mm-dd" name="P_BILLING_PERIOD_UNIT_ID" source="P_BILLING_PERIOD_UNIT_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="44"/>
<Action actionName="Set Row Style" actionCategory="General" id="45" styles="Row;AltRow"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="71" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILLING_PERIOD_UNITSearch" wizardCaption=" P BILLING PERIOD UNIT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_billing_period_unit.ccp" PathID="P_BILLING_PERIOD_UNITSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_BILLING_PERIOD_UNITSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_BILLING_PERIOD_UNITSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
<Record id="19" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_BILLING_PERIOD_UNIT1" dataSource="P_BILLING_PERIOD_UNIT" errorSummator="Error" wizardCaption=" P BILLING PERIOD UNIT " wizardFormMethod="post" PathID="P_BILLING_PERIOD_UNIT1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_BILLING_PERIOD_UNIT
(P_BILLING_PERIOD_UNIT_ID, CODE, DAY_AMT, UPDATE_DATE, UPDATE_BY, DESCRIPTION)
VALUES
(GENERATE_ID('BILLDB','P_BILLING_PERIOD_UNIT','P_BILLING_PERIOD_UNIT_ID'),UPPER('{CODE}'),{DAY_AMT},SYSDATE,'{UPDATE_BY}','{DESCRIPTION}')" customUpdateType="SQL" customUpdate="UPDATE P_BILLING_PERIOD_UNIT
SET CODE = UPPER('{CODE}'),
DAY_AMT = {DAY_AMT},
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}',
DESCRIPTION = '{DESCRIPTION}'
WHERE P_BILLING_PERIOD_UNIT_ID = {P_BILLING_PERIOD_UNIT_ID}" customDeleteType="SQL" customDelete="DELETE P_BILLING_PERIOD_UNIT WHERE P_BILLING_PERIOD_UNIT_ID = {P_BILLING_PERIOD_UNIT_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DAY_AMT" fieldSource="DAY_AMT" required="False" caption="DAY AMT" wizardCaption="DAY AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1DAY_AMT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="29" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_BILLING_PERIOD_UNIT1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<Hidden id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1P_BILLING_PERIOD_UNIT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_BILLING_PERIOD_UNIT1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="39" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_BILLING_PERIOD_UNIT1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_BILLING_PERIOD_UNIT1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="41" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_BILLING_PERIOD_UNIT1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILLING_PERIOD_UNIT1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="25" conditionType="Parameter" useIsNull="False" field="P_BILLING_PERIOD_UNIT_ID" parameterSource="P_BILLING_PERIOD_UNIT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="61" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="62" variable="DAY_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DAY_AMT"/>
<SQLParameter id="63" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="64" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="55" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="56" field="DAY_AMT" dataType="Float" parameterType="Control" parameterSource="DAY_AMT"/>
<CustomParameter id="57" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="58" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="59" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="60" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="65" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="66" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="67" variable="DAY_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DAY_AMT"/>
<SQLParameter id="68" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="69" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="49" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="50" field="DAY_AMT" dataType="Float" parameterType="Control" parameterSource="DAY_AMT"/>
<CustomParameter id="51" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="52" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="53" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="54" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="70" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_billing_period_unit.php" forShow="True" url="p_billing_period_unit.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_billing_period_unit_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="47"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="48"/>
</Actions>
</Event>
</Events>
</Page>
