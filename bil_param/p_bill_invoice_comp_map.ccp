<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="7" connection="Conn" dataSource="SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME,C.CODE AS P_SERVICE_TYPE_NAME,D.CODE AS P_INVOICE_COMPONENT_NAME  FROM P_BILL_INVOICE_COMP_MAP A,
P_BILL_COMPONENT B,
P_SERVICE_TYPE C,
P_INVOICE_COMPONENT D
WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID
AND A.P_SERVICE_TYPE_ID = C.P_SERVICE_TYPE_ID
AND A.P_INVOICE_COMPONENT_ID = D.P_INVOICE_COMPONENT_ID
AND ((UPPER(B.CODE)LIKE UPPER('%{s_keyword}%'))OR(UPPER(C.CODE)LIKE UPPER('%{s_keyword}%'))OR(UPPER(D.CODE)LIKE UPPER('%{s_keyword}%')))" name="P_BILL_INVOICE_COMP_MAP" orderBy="P_BILL_INVOICE_COMP_MAP_ID" pageSizeLimit="100" wizardCaption=" P BILL INVOICE COMP MAP " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records" pasteActions="pasteActions">
			<Components>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_COMPONENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_INVOICE_COMPONENT_NAME" fieldSource="P_INVOICE_COMPONENT_NAME" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_INVOICE_COMP_MAPP_INVOICE_COMPONENT_NAME">
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
								<Action actionName="Custom Code" actionCategory="General" id="48"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="42" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_INVOICE_COMP_MAPDLink" hrefSource="p_bill_invoice_comp_map.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="43" sourceType="DataField" name="P_BILL_INVOICE_COMP_MAP_ID" source="P_BILL_INVOICE_COMP_MAP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_INVOICE_COMP_MAP_Insert" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_INVOICE_COMP_MAP_Insert" hrefSource="p_bill_invoice_comp_map.ccp" wizardUseTemplateBlock="False" removeParameters="P_BILL_INVOICE_COMP_MAP_ID">
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
				<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_INVOICE_COMP_MAP_ID" fieldSource="P_BILL_INVOICE_COMP_MAP_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_bill_invoice_comp_map.ccp" wizardThemeItem="GridA" PathID="P_BILL_INVOICE_COMP_MAPP_BILL_INVOICE_COMP_MAP_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_INVOICE_COMP_MAP_ID" source="P_BILL_INVOICE_COMP_MAP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="49"/>
						<Action actionName="Set Row Style" actionCategory="General" id="50" styles="Row;AltRow"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="56" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILL_INVOICE_COMP_MAPSearch" wizardCaption=" P BILL INVOICE COMP MAP " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bill_invoice_comp_map.ccp" PathID="P_BILL_INVOICE_COMP_MAPSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_BILL_INVOICE_COMP_MAPSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_BILL_INVOICE_COMP_MAPSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="22" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_BILL_INVOICE_COMP_MAP1" dataSource="SELECT A.*,B.CODE AS P_BILL_COMPONENT_NAME,C.CODE AS P_SERVICE_TYPE_NAME,D.CODE AS P_INVOICE_COMPONENT_NAME  FROM P_BILL_INVOICE_COMP_MAP A,
P_BILL_COMPONENT B,
P_SERVICE_TYPE C,
P_INVOICE_COMPONENT D
WHERE A.P_BILL_COMPONENT_ID = B.P_BILL_COMPONENT_ID
AND A.P_SERVICE_TYPE_ID = C.P_SERVICE_TYPE_ID
AND A.P_INVOICE_COMPONENT_ID = D.P_INVOICE_COMPONENT_ID
AND P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID}" errorSummator="Error" wizardCaption=" P BILL INVOICE COMP MAP " wizardFormMethod="post" PathID="P_BILL_INVOICE_COMP_MAP1" pasteActions="pasteActions" activeCollection="USQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="INSERT INTO P_BILL_INVOICE_COMP_MAP (P_BILL_INVOICE_COMP_MAP_ID, P_BILL_COMPONENT_ID, P_SERVICE_TYPE_ID, P_INVOICE_COMPONENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_BILL_INVOICE_COMP_MAP','P_BILL_INVOICE_COMP_MAP_ID'),{P_BILL_COMPONENT_ID},{P_SERVICE_TYPE_ID},{P_INVOICE_COMPONENT_ID},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILL_INVOICE_COMP_MAP SET
P_BILL_COMPONENT_ID = {P_BILL_COMPONENT_ID},
P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID},
P_INVOICE_COMPONENT_ID = {P_INVOICE_COMPONENT_ID},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID}" customDeleteType="SQL" customDelete="DELETE P_BILL_INVOICE_COMP_MAP WHERE P_BILL_INVOICE_COMP_MAP_ID = {P_BILL_INVOICE_COMP_MAP_ID}">
			<Components>
				<Hidden id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_BILL_COMPONENT_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_SERVICE_TYPE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_INVOICE_COMPONENT_ID" fieldSource="P_INVOICE_COMPONENT_ID" required="True" caption="P INVOICE COMPONENT ID" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_INVOICE_COMPONENT_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextArea id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="34" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_BILL_INVOICE_COMP_MAP1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="36" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_BILL_INVOICE_COMP_MAP1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="37" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_BILL_INVOICE_COMP_MAP1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="38" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_BILL_INVOICE_COMP_MAP1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
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
				<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_BILL_INVOICE_COMP_MAP1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_COMPONENT_NAME" fieldSource="P_BILL_COMPONENT_NAME" required="False" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_BILL_COMPONENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_NAME" fieldSource="P_SERVICE_TYPE_NAME" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_SERVICE_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_INVOICE_COMPONENT_NAME" fieldSource="P_INVOICE_COMPONENT_NAME" required="False" caption="P INVOICE COMPONENT ID" wizardCaption="P INVOICE COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_INVOICE_COMPONENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Hidden id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_INVOICE_COMP_MAP_ID" fieldSource="P_BILL_INVOICE_COMP_MAP_ID" required="False" caption="P BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_BILL_INVOICE_COMP_MAP1P_BILL_INVOICE_COMP_MAP_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_BILL_INVOICE_COMP_MAP_ID" parameterSource="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="57" parameterType="URL" variable="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="68" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="69" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="70" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
<SQLParameter id="71" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="72" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="58" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="59" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="60" field="P_INVOICE_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_ID"/>
<CustomParameter id="61" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="62" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="63" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="64" field="P_BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_BILL_COMPONENT_NAME"/>
<CustomParameter id="65" field="P_SERVICE_TYPE_NAME" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="66" field="P_INVOICE_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_NAME"/>
<CustomParameter id="67" field="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="84" variable="P_BILL_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="85" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="86" variable="P_INVOICE_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INVOICE_COMPONENT_ID"/>
<SQLParameter id="87" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="88" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="89" variable="P_BILL_INVOICE_COMP_MAP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="74" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<CustomParameter id="75" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="76" field="P_INVOICE_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_ID"/>
<CustomParameter id="77" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="78" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="79" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="80" field="P_BILL_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_BILL_COMPONENT_NAME"/>
<CustomParameter id="81" field="P_SERVICE_TYPE_NAME" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
<CustomParameter id="82" field="P_INVOICE_COMPONENT_NAME" dataType="Text" parameterType="Control" parameterSource="P_INVOICE_COMPONENT_NAME"/>
<CustomParameter id="83" field="P_BILL_INVOICE_COMP_MAP_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="73" variable="P_BILL_INVOICE_COMP_MAP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_INVOICE_COMP_MAP_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_invoice_comp_map.php" forShow="True" url="p_bill_invoice_comp_map.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_bill_invoice_comp_map_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="51"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="52"/>
			</Actions>
		</Event>
	</Events>
</Page>
