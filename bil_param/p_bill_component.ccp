<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" dataSource="SELECT *FROM P_BILL_COMPONENT
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_BILL_COMPONENT" orderBy="P_BILL_COMPONENT_ID" pageSizeLimit="100" wizardCaption=" P BILL COMPONENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_COMPONENT_NAME" fieldSource="BILL_COMPONENT_NAME" wizardCaption="BILL COMPONENT NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTBILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Float" html="False" name="DISPLAY_ORDER" fieldSource="DISPLAY_ORDER" wizardCaption="DISPLAY ORDER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_COMPONENTDISPLAY_ORDER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="COMPONENT_TYPE" fieldSource="COMPONENT_TYPE" wizardCaption="COMPONENT TYPE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_COMPONENTCOMPONENT_TYPE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="24" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="63"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_COMPONENT_Insert" hrefSource="p_customer_title.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENTP_BILL_COMPONENT_Insert" removeParameters="P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="46"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="47" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="48" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_COMPONENTDLink" hrefSource="p_bill_component.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="49" sourceType="DataField" name="P_BILL_COMPONENT_ID" source="P_BILL_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_bill_component.ccp" wizardThemeItem="GridA" PathID="P_BILL_COMPONENTP_BILL_COMPONENT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_COMPONENT_ID" source="P_BILL_COMPONENT_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="64"/>
<Action actionName="Set Row Style" actionCategory="General" id="65" styles="Row;AltRow"/>
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
<SQLParameter id="84" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILL_COMPONENTSearch" wizardCaption=" P BILL COMPONENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bill_component.ccp" PathID="P_BILL_COMPONENTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_BILL_COMPONENTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BILL_COMPONENTSearchButton_DoSearch">
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
<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_BILL_COMPONENT1" dataSource="P_BILL_COMPONENT" errorSummator="Error" wizardCaption=" P BILL COMPONENT " wizardFormMethod="post" PathID="P_BILL_COMPONENT1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_BILL_COMPONENT (P_BILL_COMPONENT_ID, CODE, BILL_COMPONENT_NAME, DISPLAY_ORDER, COMPONENT_TYPE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_BILL_COMPONENT','P_BILL_COMPONENT_ID'),'{CODE}','{BILL_COMPONENT_NAME}',{DISPLAY_ORDER},'{COMPONENT_TYPE}','{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILL_COMPONENT SET
CODE = '{CODE}',
BILL_COMPONENT_NAME = '{BILL_COMPONENT_NAME}',
DISPLAY_ORDER = {DISPLAY_ORDER},
COMPONENT_TYPE = '{COMPONENT_TYPE}',
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID}" customDeleteType="SQL" customDelete="DELETE P_BILL_COMPONENT WHERE P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_COMPONENT_NAME" fieldSource="BILL_COMPONENT_NAME" required="True" caption="BILL COMPONENT NAME" wizardCaption="BILL COMPONENT NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1BILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DISPLAY_ORDER" fieldSource="DISPLAY_ORDER" required="True" caption="DISPLAY ORDER" wizardCaption="DISPLAY ORDER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1DISPLAY_ORDER">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="COMPONENT_TYPE" fieldSource="COMPONENT_TYPE" required="False" caption="COMPONENT TYPE" wizardCaption="COMPONENT TYPE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1COMPONENT_TYPE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextArea id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="38" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_BILL_COMPONENT1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_BILL_COMPONENT1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_BILL_COMPONENT1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_BILL_COMPONENT1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="43"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_BILL_COMPONENT1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_COMPONENT1P_BILL_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_BILL_COMPONENT_ID" parameterSource="P_BILL_COMPONENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="57" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="58" variable="BILL_COMPONENT_NAME" parameterType="Control" dataType="Text" parameterSource="BILL_COMPONENT_NAME"/>
<SQLParameter id="59" variable="DISPLAY_ORDER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DISPLAY_ORDER"/>
<SQLParameter id="60" variable="COMPONENT_TYPE" parameterType="Control" dataType="Text" parameterSource="COMPONENT_TYPE"/>
<SQLParameter id="61" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="62" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="50" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="51" field="BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_NAME"/>
<CustomParameter id="52" field="DISPLAY_ORDER" dataType="Float" parameterType="Control" parameterSource="DISPLAY_ORDER"/>
<CustomParameter id="53" field="COMPONENT_TYPE" dataType="Text" parameterType="Control" parameterSource="COMPONENT_TYPE"/>
<CustomParameter id="54" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="55" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="56" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="75" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="76" variable="BILL_COMPONENT_NAME" parameterType="Control" dataType="Text" parameterSource="BILL_COMPONENT_NAME"/>
<SQLParameter id="77" variable="DISPLAY_ORDER" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DISPLAY_ORDER"/>
<SQLParameter id="78" variable="COMPONENT_TYPE" parameterType="Control" dataType="Text" parameterSource="COMPONENT_TYPE"/>
<SQLParameter id="79" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="80" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="82" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="68" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="69" field="BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_NAME"/>
<CustomParameter id="70" field="DISPLAY_ORDER" dataType="Float" parameterType="Control" parameterSource="DISPLAY_ORDER"/>
<CustomParameter id="71" field="COMPONENT_TYPE" dataType="Text" parameterType="Control" parameterSource="COMPONENT_TYPE"/>
<CustomParameter id="72" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="73" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="74" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="83" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_component.php" forShow="True" url="p_bill_component.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_bill_component_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="66"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="67"/>
</Actions>
</Event>
</Events>
</Page>
