<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="P_BUSINESS_AREA" name="P_BUSINESS_AREA" orderBy="P_BUSINESS_AREA_ID" pageSizeLimit="100" wizardCaption=" P BUSINESS AREA " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_AREACODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="BUSINESS_AREA_NAME" fieldSource="BUSINESS_AREA_NAME" wizardCaption="BUSINESS AREA NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_AREABUSINESS_AREA_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_BILLING_CENTER" fieldSource="IS_BILLING_CENTER" wizardCaption="IS BILLING CENTER" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_AREAIS_BILLING_CENTER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="H2H_CODE" fieldSource="H2H_CODE" wizardCaption="H2 H CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BUSINESS_AREAH2H_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="26" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="57"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BUSINESS_AREA_Insert" PathID="P_BUSINESS_AREAP_BUSINESS_AREA_Insert" hrefSource="p_business_area.ccp" wizardUseTemplateBlock="False" removeParameters="P_REGION_LEVEL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="51"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BUSINESS_AREADLink" hrefSource="p_business_area.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="54" sourceType="DataField" name="P_BUSINESS_AREA_ID" source="P_BUSINESS_AREA_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BUSINESS_AREA_ID" fieldSource="P_BUSINESS_AREA_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_business_area.ccp" wizardThemeItem="GridA" PathID="P_BUSINESS_AREAP_BUSINESS_AREA_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_BUSINESS_AREA_ID" source="P_BUSINESS_AREA_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="55" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="56"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="BUSINESS_AREA_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="H2H_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields>
<Field id="6" tableName="P_BUSINESS_AREA" fieldName="P_BUSINESS_AREA_ID"/>
<Field id="18" tableName="P_BUSINESS_AREA" fieldName="CODE"/>
<Field id="20" tableName="P_BUSINESS_AREA" fieldName="BUSINESS_AREA_NAME"/>
<Field id="22" tableName="P_BUSINESS_AREA" fieldName="IS_BILLING_CENTER"/>
<Field id="24" tableName="P_BUSINESS_AREA" fieldName="H2H_CODE"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BUSINESS_AREASearch" wizardCaption=" P BUSINESS AREA " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_business_area.ccp" PathID="P_BUSINESS_AREASearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="P_BUSINESS_AREASearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_BUSINESS_AREASearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
<Record id="27" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_BUSINESS_AREA1" dataSource="SELECT *FROM P_BUSINESS_AREA
WHERE P_BUSINESS_AREA_ID = {P_BUSINESS_AREA_ID}" errorSummator="Error" wizardCaption=" P BUSINESS AREA " wizardFormMethod="post" PathID="P_BUSINESS_AREA1" pasteActions="pasteActions" customInsertType="SQL" customUpdateType="SQL" customUpdate="UPDATE P_BUSINESS_AREA SET
CODE = '{CODE}',
BUSINESS_AREA_NAME = '{BUSINESS_AREA_NAME}',
IS_BILLING_CENTER = '{IS_BILLING_CENTER}',
OFFICE_ADDRESS = '{OFFICE_ADDRESS}',
H2H_CODE = '{H2H_CODE}',
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_BUSINESS_AREA_ID={P_BUSINESS_AREA_ID}" customDeleteType="SQL" customDelete="DELETE P_BUSINESS_AREA
WHERE P_BUSINESS_AREA_ID = {P_BUSINESS_AREA_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_BUSINESS_AREA (P_BUSINESS_AREA_ID, CODE, BUSINESS_AREA_NAME, IS_BILLING_CENTER, OFFICE_ADDRESS, H2H_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_BUSINESS_AREA','P_BUSINESS_AREA_ID'),'{CODE}','{BUSINESS_AREA_NAME}','{IS_BILLING_CENTER}','{OFFICE_ADDRESS}','{H2H_CODE}','{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')"><Components><TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1CODE"><Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUSINESS_AREA_NAME" fieldSource="BUSINESS_AREA_NAME" required="True" caption="BUSINESS AREA NAME" wizardCaption="BUSINESS AREA NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1BUSINESS_AREA_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_BILLING_CENTER" fieldSource="IS_BILLING_CENTER" required="True" caption="IS BILLING CENTER" wizardCaption="IS BILLING CENTER" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1IS_BILLING_CENTER" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="N" dataSource="Y;Y;N;N">
<Components/>
<Events/>
<Attributes/>
<Features/>
<TableParameters/>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
</ListBox>
<TextArea id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OFFICE_ADDRESS" fieldSource="OFFICE_ADDRESS" required="False" caption="OFFICE ADDRESS" wizardCaption="OFFICE ADDRESS" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1OFFICE_ADDRESS">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="H2H_CODE" fieldSource="H2H_CODE" required="True" caption="H2 H CODE" wizardCaption="H2 H CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1H2H_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="41" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_BUSINESS_AREA1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_BUSINESS_AREA1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_BUSINESS_AREA1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="45" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_BUSINESS_AREA1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
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
<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_BUSINESS_AREA1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BUSINESS_AREA_ID" fieldSource="P_BUSINESS_AREA_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BUSINESS_AREA1P_BUSINESS_AREA_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="P_BUSINESS_AREA_ID" parameterSource="P_BUSINESS_AREA_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="60" parameterType="URL" variable="P_BUSINESS_AREA_ID" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="79" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="80" variable="BUSINESS_AREA_NAME" parameterType="Control" dataType="Text" parameterSource="BUSINESS_AREA_NAME"/>
<SQLParameter id="81" variable="IS_BILLING_CENTER" parameterType="Control" dataType="Text" parameterSource="IS_BILLING_CENTER"/>
<SQLParameter id="82" variable="OFFICE_ADDRESS" parameterType="Control" dataType="Text" parameterSource="OFFICE_ADDRESS"/>
<SQLParameter id="83" variable="H2H_CODE" parameterType="Control" dataType="Text" parameterSource="H2H_CODE"/>
<SQLParameter id="84" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="85" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="70" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="71" field="BUSINESS_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_NAME"/>
<CustomParameter id="72" field="IS_BILLING_CENTER" dataType="Text" parameterType="Control" parameterSource="IS_BILLING_CENTER"/>
<CustomParameter id="73" field="OFFICE_ADDRESS" dataType="Text" parameterType="Control" parameterSource="OFFICE_ADDRESS"/>
<CustomParameter id="74" field="H2H_CODE" dataType="Text" parameterType="Control" parameterSource="H2H_CODE"/>
<CustomParameter id="75" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="76" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="77" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="78" field="P_BUSINESS_AREA_ID" dataType="Text" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="86" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
<SQLParameter id="87" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="88" variable="BUSINESS_AREA_NAME" parameterType="Control" dataType="Text" parameterSource="BUSINESS_AREA_NAME"/>
<SQLParameter id="89" variable="IS_BILLING_CENTER" parameterType="Control" dataType="Text" parameterSource="IS_BILLING_CENTER"/>
<SQLParameter id="90" variable="OFFICE_ADDRESS" parameterType="Control" dataType="Text" parameterSource="OFFICE_ADDRESS"/>
<SQLParameter id="91" variable="H2H_CODE" parameterType="Control" dataType="Text" parameterSource="H2H_CODE"/>
<SQLParameter id="92" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="93" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="61" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="62" field="BUSINESS_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_NAME"/>
<CustomParameter id="63" field="IS_BILLING_CENTER" dataType="Text" parameterType="Control" parameterSource="IS_BILLING_CENTER"/>
<CustomParameter id="64" field="OFFICE_ADDRESS" dataType="Text" parameterType="Control" parameterSource="OFFICE_ADDRESS"/>
<CustomParameter id="65" field="H2H_CODE" dataType="Text" parameterType="Control" parameterSource="H2H_CODE"/>
<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="67" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="68" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="69" field="P_BUSINESS_AREA_ID" dataType="Text" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="94" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_business_area.php" forShow="True" url="p_business_area.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_business_area_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="58"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="59"/>
</Actions>
</Event>
</Events>
</Page>
