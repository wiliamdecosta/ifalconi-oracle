<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" dataSource="SELECT * FROM P_INVOICE_COMPONENT
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_INVOICE_COMPONENT" orderBy="P_INVOICE_COMPONENT_ID" pageSizeLimit="100" wizardCaption=" P INVOICE COMPONENT " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
<Components>
<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="18" fieldSourceType="DBColumn" dataType="Float" html="False" name="PAYMENT_PRIORITY" fieldSource="PAYMENT_PRIORITY" wizardCaption="PAYMENT PRIORITY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTPAYMENT_PRIORITY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_RETURNABLE" fieldSource="IS_RETURNABLE" wizardCaption="IS RETURNABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INVOICE_COMPONENTIS_RETURNABLE">
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
<Action actionName="Custom Code" actionCategory="General" id="58"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Navigator>
<Link id="42" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_INVOICE_COMPONENTDLink" hrefSource="p_invoice_component.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="43" sourceType="DataField" name="P_INVOICE_COMPONENT_ID" source="P_INVOICE_COMPONENT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INVOICE_COMPONENT_Insert" PathID="P_INVOICE_COMPONENTP_INVOICE_COMPONENT_Insert" hrefSource="p_invoice_component.ccp" wizardUseTemplateBlock="False" removeParameters="P_INVOICE_COMPONENT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="45"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="46" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_invoice_component.ccp" wizardThemeItem="GridA" PathID="P_INVOICE_COMPONENTP_INVOICE_COMPONENT_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_INVOICE_COMPONENT_ID" source="P_INVOICE_COMPONENT_ID"/>
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
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="64" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_INVOICE_COMPONENTSearch" wizardCaption=" P INVOICE COMPONENT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_invoice_component.ccp" PathID="P_INVOICE_COMPONENTSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_INVOICE_COMPONENTSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_INVOICE_COMPONENTSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_INVOICE_COMPONENT1" dataSource="P_INVOICE_COMPONENT" errorSummator="Error" wizardCaption=" P INVOICE COMPONENT " wizardFormMethod="post" PathID="P_INVOICE_COMPONENT1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_INVOICE_COMPONENT (P_INVOICE_COMPONENT_ID, CODE, PAYMENT_PRIORITY, IS_RETURNABLE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_INVOICE_COMPONENT','P_INVOICE_COMPONENT_ID'),'{CODE}',{PAYMENT_PRIORITY},'{IS_RETURNABLE}','{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_INVOICE_COMPONENT SET
CODE = '{CODE}',
PAYMENT_PRIORITY = {PAYMENT_PRIORITY},
IS_RETURNABLE = '{IS_RETURNABLE}',
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_INVOICE_COMPONENT_ID = {P_INVOICE_COMPONENT_ID}" customDeleteType="SQL" customDelete="DELETE P_INVOICE_COMPONENT WHERE P_INVOICE_COMPONENT_ID = {P_INVOICE_COMPONENT_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
<Components>
<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PAYMENT_PRIORITY" fieldSource="PAYMENT_PRIORITY" required="True" caption="PAYMENT PRIORITY" wizardCaption="PAYMENT PRIORITY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1PAYMENT_PRIORITY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_RETURNABLE" fieldSource="IS_RETURNABLE" required="True" caption="IS RETURNABLE" wizardCaption="IS RETURNABLE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1IS_RETURNABLE" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="N" dataSource="Y;Y;N;N">
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
<TextArea id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="34" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_INVOICE_COMPONENT1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<Button id="36" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_INVOICE_COMPONENT1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="37" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_INVOICE_COMPONENT1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="38" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_INVOICE_COMPONENT1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="39" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_INVOICE_COMPONENT1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1UPDATE_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_INVOICE_COMPONENT1P_INVOICE_COMPONENT_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_INVOICE_COMPONENT_ID" parameterSource="P_INVOICE_COMPONENT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters/>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="53" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="54" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
<SQLParameter id="55" variable="IS_RETURNABLE" parameterType="Control" dataType="Text" parameterSource="IS_RETURNABLE"/>
<SQLParameter id="56" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="57" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="47" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="48" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
<CustomParameter id="49" field="IS_RETURNABLE" dataType="Text" parameterType="Control" parameterSource="IS_RETURNABLE"/>
<CustomParameter id="50" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="51" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="52" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="72" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="73" variable="PAYMENT_PRIORITY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PAYMENT_PRIORITY"/>
<SQLParameter id="74" variable="IS_RETURNABLE" parameterType="Control" dataType="Text" parameterSource="IS_RETURNABLE"/>
<SQLParameter id="75" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="76" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="77" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="65" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="66" field="PAYMENT_PRIORITY" dataType="Float" parameterType="Control" parameterSource="PAYMENT_PRIORITY"/>
<CustomParameter id="67" field="IS_RETURNABLE" dataType="Text" parameterType="Control" parameterSource="IS_RETURNABLE"/>
<CustomParameter id="68" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="69" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="70" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="71" field="P_INVOICE_COMPONENT_ID" dataType="Text" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_ID"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="78" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_invoice_component.php" forShow="True" url="p_invoice_component.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_invoice_component_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="61"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="62"/>
</Actions>
</Event>
</Events>
</Page>
