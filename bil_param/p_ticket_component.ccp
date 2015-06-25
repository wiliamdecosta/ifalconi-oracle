<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME FROM P_TICKET_COMPONENT A , P_BILL_COMPONENT B
WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID AND (
UPPER(A.CODE) LIKE UPPER('%{s_keyword}%') OR
UPPER(B.CODE) LIKE UPPER('%{s_keyword}%')
)" name="P_TICKET_COMPONENT" orderBy="P_TICKET_COMPONENT_ID" pageSizeLimit="100" wizardCaption=" P TICKET COMPONENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TICKET_COMPONENTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_TICKET_COMPONENTP_BILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_TICKET_COMPONENTDESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="21" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
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
<Link id="41" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_TICKET_COMPONENTDLink" hrefSource="p_ticket_component.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="42" sourceType="DataField" name="P_TICKET_COMPONENT_ID" source="P_TICKET_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TICKET_COMPONENT_Insert" hrefSource="p_ticket_component.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENTP_TICKET_COMPONENT_Insert" removeParameters="P_TICKET_COMPONENT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="44"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="45" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_TICKET_COMPONENT_ID" fieldSource="P_TICKET_COMPONENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_ticket_component.ccp" wizardThemeItem="GridA" PathID="P_TICKET_COMPONENTP_TICKET_COMPONENT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_TICKET_COMPONENT_ID" source="P_TICKET_COMPONENT_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="47"/>
<Action actionName="Set Row Style" actionCategory="General" id="48" styles="Row;AltRow"/>
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
<SQLParameter id="74" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_TICKET_COMPONENTSearch" wizardCaption=" P TICKET COMPONENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_ticket_component.ccp" PathID="P_TICKET_COMPONENTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_TICKET_COMPONENTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_TICKET_COMPONENTSearchButton_DoSearch">
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
<Record id="22" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_TICKET_COMPONENT1" dataSource="SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME FROM P_TICKET_COMPONENT A , P_BILL_COMPONENT B
WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID AND
P_TICKET_COMPONENT_ID = {P_TICKET_COMPONENT_ID}" errorSummator="Error" wizardCaption=" P TICKET COMPONENT " wizardFormMethod="post" PathID="P_TICKET_COMPONENT1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_TICKET_COMPONENT (P_TICKET_COMPONENT_ID, CODE, P_BILL_COMPONENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_TICKET_COMPONENT','P_TICKET_COMPONENT_ID'),'{CODE}',{P_BILL_COMPONENT_ID},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_TICKET_COMPONENT SET
CODE = '{CODE}',
P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_TICKET_COMPONENT_ID = {P_TICKET_COMPONENT_ID}" customDeleteType="SQL" customDelete="DELETE P_TICKET_COMPONENT WHERE P_TICKET_COMPONENT_ID = {P_TICKET_COMPONENT_ID}" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters">
<Components>
<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1P_BILL_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="33" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_TICKET_COMPONENT1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="35" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_TICKET_COMPONENT1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="36" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_TICKET_COMPONENT1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="37" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_TICKET_COMPONENT1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="38"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="39" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_TICKET_COMPONENT1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TICKET_COMPONENT_ID" fieldSource="P_TICKET_COMPONENT_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1P_TICKET_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" required="False" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_TICKET_COMPONENT1P_BILL_COMPONENT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_TICKET_COMPONENT_ID" parameterSource="P_TICKET_COMPONENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="75" parameterType="URL" variable="P_TICKET_COMPONENT_ID" dataType="Float" parameterSource="P_TICKET_COMPONENT_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="57" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="58" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="59" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="60" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="51" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="52" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="53" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="54" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="55" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="56" field="P_TICKET_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_TICKET_COMPONENT_ID"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="67" variable="P_TICKET_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TICKET_COMPONENT_ID"/>
<SQLParameter id="68" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="69" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="70" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="71" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="61" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="62" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="63" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="64" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="65" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="66" field="P_TICKET_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_TICKET_COMPONENT_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="72" variable="P_TICKET_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TICKET_COMPONENT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_ticket_component.php" forShow="True" url="p_ticket_component.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_ticket_component_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="49"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="50"/>
</Actions>
</Event>
</Events>
</Page>
