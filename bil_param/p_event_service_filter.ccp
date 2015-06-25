<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_event_service_filter" name="P_EVENT_SERVICE_FILTER" orderBy="P_EVENT_SERVICE_FILTER_ID" pageSizeLimit="100" wizardCaption=" P EVENT SERVICE FILTER " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERP_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="FILTER_COLUMN_NAME" fieldSource="FILTER_COLUMN_NAME" wizardCaption="FILTER COLUMN NAME" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERFILTER_COLUMN_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="FILTER_COLUMN_VALUE" fieldSource="FILTER_COLUMN_VALUE" wizardCaption="FILTER COLUMN VALUE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERFILTER_COLUMN_VALUE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERVALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERVALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_FILTERDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="30" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_SERVICE_FILTER_Insert" hrefSource="p_event_service_filter.ccp" removeParameters="P_EVENT_SERVICE_FILTER_ID" PathID="P_EVENT_SERVICE_FILTERP_EVENT_SERVICE_FILTER_Insert" wizardUseTemplateBlock="False">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="63" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="64" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_EVENT_SERVICE_FILTERDLink" hrefSource="p_event_service_filter.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_SERVICE_FILTER_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="65" sourceType="DataField" name="P_EVENT_SERVICE_FILTER_ID" source="P_EVENT_SERVICE_FILTER_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_EVENT_SERVICE_FILTERADLink" hrefSource="p_event_service_filter.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_SERVICE_FILTER_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="67" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_SERVICE_FILTER_ID" source="P_EVENT_SERVICE_FILTER_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_SERVICE_FILTER_ID" fieldSource="P_EVENT_SERVICE_FILTER_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_event_service_filter.ccp" wizardThemeItem="GridA" PathID="P_EVENT_SERVICE_FILTERP_EVENT_SERVICE_FILTER_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_SERVICE_FILTER_ID" source="P_EVENT_SERVICE_FILTER_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="86" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="87"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="FILTER_COLUMN_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="6" tableName="P_EVENT_SERVICE_FILTER" fieldName="P_EVENT_SERVICE_FILTER_ID"/>
				<Field id="18" tableName="P_EVENT_SERVICE_FILTER" fieldName="P_EVENT_SERVICE_TYPE_ID"/>
				<Field id="20" tableName="P_EVENT_SERVICE_FILTER" fieldName="FILTER_COLUMN_NAME"/>
				<Field id="22" tableName="P_EVENT_SERVICE_FILTER" fieldName="FILTER_COLUMN_VALUE"/>
				<Field id="24" tableName="P_EVENT_SERVICE_FILTER" fieldName="VALID_FROM"/>
				<Field id="26" tableName="P_EVENT_SERVICE_FILTER" fieldName="VALID_TO"/>
				<Field id="28" tableName="P_EVENT_SERVICE_FILTER" fieldName="DESCRIPTION"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_EVENT_SERVICE_FILTERSearch" wizardCaption=" P EVENT SERVICE FILTER " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_event_service_filter.ccp" PathID="P_EVENT_SERVICE_FILTERSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="P_EVENT_SERVICE_FILTERSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_EVENT_SERVICE_FILTERSearchButton_DoSearch">
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
		<Record id="31" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_event_service_filter1" dataSource="p_event_service_filter" errorSummator="Error" wizardCaption=" P Event Service Filter " wizardFormMethod="post" PathID="p_event_service_filter1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_EVENT_SERVICE_FILTER(P_EVENT_SERVICE_FILTER_ID, P_EVENT_SERVICE_TYPE_ID, FILTER_COLUMN_NAME, FILTER_COLUMN_VALUE, VALID_FROM, VALID_TO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_EVENT_SERVICE_FILTER','P_EVENT_SERVICE_FILTER_ID'),{P_EVENT_SERVICE_TYPE_ID},'{FILTER_COLUMN_NAME}','{FILTER_COLUMN_VALUE}','{VALID_FROM}','{VALID_TO}','{DESCRIPTION}',sysdate,'{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_EVENT_SERVICE_FILTER SET 
P_EVENT_SERVICE_TYPE_ID={P_EVENT_SERVICE_TYPE_ID},
FILTER_COLUMN_NAME='{FILTER_COLUMN_NAME}',
FILTER_COLUMN_VALUE='{FILTER_COLUMN_VALUE}',
VALID_FROM='{VALID_FROM}',
VALID_TO='{VALID_TO}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_EVENT_SERVICE_FILTER_ID = {P_EVENT_SERVICE_FILTER_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_EVENT_SERVICE_FILTER WHERE P_EVENT_SERVICE_FILTER_ID = {P_EVENT_SERVICE_FILTER_ID}">
<Components>
<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" required="True" caption="P EVENT SERVICE TYPE ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1P_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FILTER_COLUMN_NAME" fieldSource="FILTER_COLUMN_NAME" required="True" caption="FILTER COLUMN NAME" wizardCaption="FILTER COLUMN NAME" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1FILTER_COLUMN_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FILTER_COLUMN_VALUE" fieldSource="FILTER_COLUMN_VALUE" required="True" caption="FILTER COLUMN VALUE" wizardCaption="FILTER COLUMN VALUE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1FILTER_COLUMN_VALUE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_event_service_filter1DatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="44" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_event_service_filter1DatePicker_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_event_service_filter1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="54" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="55" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_event_service_filter1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="56" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="57" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_event_service_filter1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="60" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="61" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_event_service_filter1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="62" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_SERVICE_FILTER_ID" fieldSource="P_EVENT_SERVICE_FILTER_ID" required="False" caption="P EVENT SERVICE TYPE ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_filter1P_EVENT_SERVICE_FILTER_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="P_EVENT_SERVICE_FILTER_ID" parameterSource="P_EVENT_SERVICE_FILTER_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="78" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<SQLParameter id="79" variable="FILTER_COLUMN_NAME" parameterType="Control" dataType="Text" parameterSource="FILTER_COLUMN_NAME"/>
				<SQLParameter id="80" variable="FILTER_COLUMN_VALUE" parameterType="Control" dataType="Text" parameterSource="FILTER_COLUMN_VALUE"/>
				<SQLParameter id="81" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
				<SQLParameter id="82" variable="VALID_TO" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_TO"/>
				<SQLParameter id="83" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="84" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="85" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="68" field="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<CustomParameter id="69" field="FILTER_COLUMN_NAME" dataType="Text" parameterType="Control" parameterSource="FILTER_COLUMN_NAME"/>
				<CustomParameter id="70" field="FILTER_COLUMN_VALUE" dataType="Text" parameterType="Control" parameterSource="FILTER_COLUMN_VALUE"/>
				<CustomParameter id="71" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="72" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="73" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="74" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="75" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="76" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="77" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="100" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
<SQLParameter id="101" variable="FILTER_COLUMN_NAME" parameterType="Control" dataType="Text" parameterSource="FILTER_COLUMN_NAME"/>
<SQLParameter id="102" variable="FILTER_COLUMN_VALUE" parameterType="Control" dataType="Text" parameterSource="FILTER_COLUMN_VALUE"/>
<SQLParameter id="103" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="104" variable="VALID_TO" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_TO"/>
<SQLParameter id="105" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="106" variable="UPDATED_BY" parameterType="Control" defaultValue="UPDATED_BY" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="107" variable="P_EVENT_SERVICE_FILTER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_FILTER_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="90" field="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
<CustomParameter id="91" field="FILTER_COLUMN_NAME" dataType="Text" parameterType="Control" parameterSource="FILTER_COLUMN_NAME"/>
<CustomParameter id="92" field="FILTER_COLUMN_VALUE" dataType="Text" parameterType="Control" parameterSource="FILTER_COLUMN_VALUE"/>
<CustomParameter id="93" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="94" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="95" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="96" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="97" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="98" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="99" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="109" variable="P_EVENT_SERVICE_FILTER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_FILTER_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_event_service_filter.php" forShow="True" url="p_event_service_filter.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_event_service_filter_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="88"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="89"/>
			</Actions>
		</Event>
	</Events>
</Page>
