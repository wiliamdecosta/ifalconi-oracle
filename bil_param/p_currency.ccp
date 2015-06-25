<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM P_CURRENCY
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%') OR UPPER(CURRENCY_LABEL) LIKE UPPER('%{s_keyword}%')" name="P_CURRENCY" orderBy="P_CURRENCY_ID" pageSizeLimit="100" wizardCaption=" P CURRENCY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="ACURRENCY" fieldSource="ACURRENCY" wizardCaption="ACURRENCY" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYACURRENCY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CURRENCYP_COUNTRY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_LABEL" fieldSource="CURRENCY_LABEL" wizardCaption="CURRENCY LABEL" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CURRENCYCURRENCY_LABEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="27" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="61"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="49" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CURRENCYDLink" hrefSource="p_currency.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="50" sourceType="DataField" name="P_CURRENCY_ID" source="P_CURRENCY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CURRENCY_Insert" PathID="P_CURRENCYP_CURRENCY_Insert" hrefSource="p_currency.ccp" wizardUseTemplateBlock="False" removeParameters="P_REGION_LEVEL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="54" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_currency.ccp" wizardThemeItem="GridA" PathID="P_CURRENCYP_CURRENCY_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="P_CURRENCY_ID" source="P_CURRENCY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="59"/>
<Action actionName="Set Row Style" actionCategory="General" id="60" styles="Row;AltRow"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="48" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CURRENCYSearch" wizardCaption=" P CURRENCY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_currency.ccp" PathID="P_CURRENCYSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="P_CURRENCYSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_CURRENCYSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="28" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_CURRENCY1" dataSource="SELECT * FROM P_CURRENCY
WHERE P_CURRENCY_ID = {P_CURRENCY_ID}" errorSummator="Error" wizardCaption=" P CURRENCY " wizardFormMethod="post" PathID="P_CURRENCY1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_CURRENCY (P_CURRENCY_ID, CODE, CURRENCY_LABEL, UPDATE_DATE, UPDATE_BY, DESCRIPTION, DIGIT_POINT, ROUND_UNIT)
VALUES (GENERATE_ID('BILLDB','P_CURRENCY','P_CURRENCY_ID'),'{CODE}','{CURRENCY_LABEL}',SYSDATE,'{UPDATE_BY}','{DESCRIPTION}',{DIGIT_POINT},{ROUND_UNIT})" customUpdateType="SQL" customUpdate="UPDATE P_CURRENCY SET
CODE = '{CODE}',
CURRENCY_LABEL = '{CURRENCY_LABEL}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}',
DESCRIPTION = '{DESCRIPTION}',
DIGIT_POINT = {DIGIT_POINT},
ROUND_UNIT = {ROUND_UNIT}
WHERE P_CURRENCY_ID = {P_CURRENCY_ID}" customDeleteType="SQL" customDelete="DELETE P_CURRENCY WHERE P_CURRENCY_ID = {P_CURRENCY_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
			<Components>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_LABEL" fieldSource="CURRENCY_LABEL" required="True" caption="CURRENCY LABEL" wizardCaption="CURRENCY LABEL" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1CURRENCY_LABEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_CURRENCY1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DIGIT_POINT" fieldSource="DIGIT_POINT" required="False" caption="DIGIT POINT" wizardCaption="DIGIT POINT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1DIGIT_POINT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ROUND_UNIT" fieldSource="ROUND_UNIT" required="False" caption="ROUND UNIT" wizardCaption="ROUND UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1ROUND_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" required="False" caption="ACURRENCY" wizardCaption="ACURRENCY" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CURRENCY1P_CURRENCY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_CURRENCY1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="57" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_CURRENCY1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="45" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_CURRENCY1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="46" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_CURRENCY1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="P_CURRENCY_ID" parameterSource="P_CURRENCY_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="96" parameterType="URL" variable="P_CURRENCY_ID" dataType="Float" parameterSource="P_CURRENCY_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="74" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="75" variable="CURRENCY_LABEL" parameterType="Control" dataType="Text" parameterSource="CURRENCY_LABEL"/>
<SQLParameter id="76" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="77" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="78" variable="DIGIT_POINT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DIGIT_POINT"/>
<SQLParameter id="79" variable="ROUND_UNIT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ROUND_UNIT"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="64" field="ACURRENCY" dataType="Text" parameterType="Control" parameterSource="ACURRENCY"/>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="67" field="CURRENCY_LABEL" dataType="Text" parameterType="Control" parameterSource="CURRENCY_LABEL"/>
<CustomParameter id="68" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="69" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="70" field="DIGIT_POINT" dataType="Float" parameterType="Control" parameterSource="DIGIT_POINT"/>
<CustomParameter id="71" field="ROUND_UNIT" dataType="Float" parameterType="Control" parameterSource="ROUND_UNIT"/>
<CustomParameter id="72" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="73" field="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="88" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
<SQLParameter id="89" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="90" variable="CURRENCY_LABEL" parameterType="Control" dataType="Text" parameterSource="CURRENCY_LABEL"/>
<SQLParameter id="91" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="92" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="93" variable="DIGIT_POINT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DIGIT_POINT"/>
<SQLParameter id="94" variable="ROUND_UNIT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ROUND_UNIT"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="80" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="81" field="CURRENCY_LABEL" dataType="Text" parameterType="Control" parameterSource="CURRENCY_LABEL"/>
<CustomParameter id="82" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="83" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="84" field="DIGIT_POINT" dataType="Float" parameterType="Control" parameterSource="DIGIT_POINT"/>
<CustomParameter id="85" field="ROUND_UNIT" dataType="Float" parameterType="Control" parameterSource="ROUND_UNIT"/>
<CustomParameter id="86" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="87" field="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
</UFormElements>
			<DSPParameters/>

			<DSQLParameters>
<SQLParameter id="95" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_currency.php" forShow="True" url="p_currency.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_currency_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="62"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="63"/>
</Actions>
</Event>
</Events>
</Page>
