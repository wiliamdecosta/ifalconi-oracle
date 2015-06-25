<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM P_CPE_BRAND
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(BRAND_NAME) LIKE UPPER('%{s_keyword}%')" name="P_CPE_BRAND" orderBy="P_CPE_BRAND_ID" pageSizeLimit="100" wizardCaption=" P CPE BRAND " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_BRANDCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="BRAND_NAME" fieldSource="BRAND_NAME" wizardCaption="BRAND NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_BRANDBRAND_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_BRANDDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="22" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="47"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_APPL_Insert" PathID="P_CPE_BRANDP_APPL_Insert" hrefSource="p_cpe_brand.ccp" wizardUseTemplateBlock="False" removeParameters="P_CPE_BRAND_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="37"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="38" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CPE_BRAND_ID" fieldSource="P_CPE_BRAND_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_cpe_brand.ccp" wizardThemeItem="GridA" PathID="P_CPE_BRANDP_CPE_BRAND_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_CPE_BRAND_ID" source="P_CPE_BRAND_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CPE_BRANDDLink" hrefSource="p_cpe_brand.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="46" sourceType="DataField" name="P_CPE_BRAND_ID" source="P_CPE_BRAND_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="48"/>
<Action actionName="Set Row Style" actionCategory="General" id="49" styles="Row;AltRow"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="BRAND_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="63" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CPE_BRANDSearch" wizardCaption=" P CPE BRAND " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_cpe_brand.ccp" PathID="P_CPE_BRANDSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_CPE_BRANDSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="39" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_CPE_BRANDSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
<Record id="23" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_CPE_BRAND1" dataSource="P_CPE_BRAND" errorSummator="Error" wizardCaption=" P CPE BRAND " wizardFormMethod="post" PathID="P_CPE_BRAND1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_CPE_BRAND (P_CPE_BRAND_ID, CODE, BRAND_NAME, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_CPE_BRAND','P_CPE_BRAND_ID'),UPPER('{CODE}'),UPPER('{BRAND_NAME}'),'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CPE_BRAND SET
CODE = UPPER('{CODE}'),
BRAND_NAME = UPPER('{BRAND_NAME}'),
DESCRIPTION = UPPER('{DESCRIPTION}'),
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_CPE_BRAND_ID = {P_CPE_BRAND_ID}" customDeleteType="SQL" customDelete="DELETE P_CPE_BRAND WHERE P_CPE_BRAND_ID = {P_CPE_BRAND_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BRAND_NAME" fieldSource="BRAND_NAME" required="False" caption="BRAND NAME" wizardCaption="BRAND NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1BRAND_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="34" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_CPE_BRAND1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_CPE_BRAND1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="41" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_CPE_BRAND1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_CPE_BRAND1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="43" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_CPE_BRAND1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CPE_BRAND_ID" fieldSource="P_CPE_BRAND_ID" required="False" caption="P_CPE_BRAND_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_BRAND1P_CPE_BRAND_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="P_CPE_BRAND_ID" parameterSource="P_CPE_BRAND_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="59" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="60" variable="BRAND_NAME" parameterType="Control" dataType="Text" parameterSource="BRAND_NAME"/>
<SQLParameter id="61" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="62" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="53" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="54" field="BRAND_NAME" dataType="Text" parameterType="Control" parameterSource="BRAND_NAME"/>
<CustomParameter id="55" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="56" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="57" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="58" field="P_CPE_BRAND_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_BRAND_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="70" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="71" variable="BRAND_NAME" parameterType="Control" dataType="Text" parameterSource="BRAND_NAME"/>
<SQLParameter id="72" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="73" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="74" variable="P_CPE_BRAND_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_BRAND_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="64" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="65" field="BRAND_NAME" dataType="Text" parameterType="Control" parameterSource="BRAND_NAME"/>
<CustomParameter id="66" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="67" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="68" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="69" field="P_CPE_BRAND_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_BRAND_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="75" variable="P_CPE_BRAND_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_BRAND_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_cpe_brand.php" forShow="True" url="p_cpe_brand.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_cpe_brand_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="50"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="51"/>
</Actions>
</Event>
</Events>
</Page>
