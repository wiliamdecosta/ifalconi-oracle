<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM P_CPE_TYPE
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%') OR 
UPPER(CPE_NAME) LIKE UPPER('%{s_keyword}%')" name="P_CPE_TYPE" orderBy="P_CPE_TYPE_ID" pageSizeLimit="100" wizardCaption=" P CPE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_TYPECODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CPE_NAME" fieldSource="CPE_NAME" wizardCaption="CPE NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_TYPECPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="22" fieldSourceType="DBColumn" dataType="Float" html="False" name="LISTING_NO" fieldSource="LISTING_NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CPE_TYPELISTING_NO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CPE_TYPEDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="25" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="52"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CPE_TYPE_Insert" PathID="P_CPE_TYPEP_CPE_TYPE_Insert" hrefSource="p_cpe_type.ccp" wizardUseTemplateBlock="False" removeParameters="P_CPE_TYPE_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="42" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CPE_TYPE_ID" fieldSource="P_CPE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_cpe_type.ccp" wizardThemeItem="GridA" PathID="P_CPE_TYPEP_CPE_TYPE_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="P_CPE_TYPE_ID" source="P_CPE_TYPE_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
<Link id="43" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CPE_TYPEDLink" hrefSource="p_cpe_type.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="44" sourceType="DataField" name="P_CPE_TYPE_ID" source="P_CPE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="53" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="54"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="CPE_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="83" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CPE_TYPESearch" wizardCaption=" P CPE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_cpe_type.ccp" PathID="P_CPE_TYPESearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_CPE_TYPESearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_CPE_TYPESearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
<Record id="26" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_CPE_TYPE1" dataSource="P_CPE_TYPE" errorSummator="Error" wizardCaption=" P CPE TYPE " wizardFormMethod="post" PathID="P_CPE_TYPE1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_CPE_TYPE (P_CPE_TYPE_ID, CODE, CPE_NAME, LISTING_NO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES(GENERATE_ID('BILLDB','P_CPE_TYPE','P_CPE_TYPE_ID'),UPPER('{CODE}'),UPPER('{CPE_NAME}'),{LISTING_NO},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CPE_TYPE SET
CODE = UPPER('{CODE}'),
CPE_NAME = UPPER('{CPE_NAME}'),
LISTING_NO = {LISTING_NO},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_CPE_TYPE_ID = {P_CPE_TYPE_ID}" customDeleteType="SQL" customDelete="DELETE P_CPE_TYPE WHERE P_CPE_TYPE_ID = {P_CPE_TYPE_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CPE_NAME" fieldSource="CPE_NAME" required="True" caption="CPE NAME" wizardCaption="CPE NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1CPE_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" fieldSource="LISTING_NO" required="True" caption="LISTING NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1LISTING_NO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="38" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_CPE_TYPE1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<Button id="46" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_CPE_TYPE1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="47" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_CPE_TYPE1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_CPE_TYPE1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
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
<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_CPE_TYPE1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CPE_TYPE_ID" fieldSource="P_CPE_TYPE_ID" required="False" caption="P_CPE_TYPE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CPE_TYPE1P_CPE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="P_CPE_TYPE_ID" parameterSource="P_CPE_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="64" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="65" variable="CPE_NAME" parameterType="Control" dataType="Text" parameterSource="CPE_NAME"/>
<SQLParameter id="66" variable="LISTING_NO" parameterType="Control" dataType="Float" parameterSource="LISTING_NO" defaultValue="0"/>
<SQLParameter id="67" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="68" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="57" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="58" field="CPE_NAME" dataType="Text" parameterType="Control" parameterSource="CPE_NAME"/>
<CustomParameter id="59" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<CustomParameter id="60" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="61" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="62" field="P_CPE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_CPE_TYPE_ID"/>
<CustomParameter id="63" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="76" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="77" variable="CPE_NAME" parameterType="Control" dataType="Text" parameterSource="CPE_NAME"/>
<SQLParameter id="78" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
<SQLParameter id="79" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="80" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="81" variable="P_CPE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_TYPE_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="69" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="70" field="CPE_NAME" dataType="Text" parameterType="Control" parameterSource="CPE_NAME"/>
<CustomParameter id="71" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<CustomParameter id="72" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="73" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="74" field="P_CPE_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_CPE_TYPE_ID"/>
<CustomParameter id="75" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="82" variable="P_CPE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CPE_TYPE_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_cpe_type.php" forShow="True" url="p_cpe_type.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_cpe_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="55"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="56"/>
</Actions>
</Event>
</Events>
</Page>
