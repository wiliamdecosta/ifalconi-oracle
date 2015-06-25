<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="6" connection="Conn" dataSource="select P_EVENT_SERVICE_TYPE_ID, LAYANAN, EVENT_CODE, EVENT_NAME, 
to_char(RATED_VALID_FROM,'DD-MON-YYYY') AS RATED_VALID_FROM,
to_char(RATED_VALID_TO,'DD-MON-YYYY') AS RATED_VALID_TO, 
DESCRIPTION, P_SERVICE_TYPE_ID, P_EVENT_TYPE_ID, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY
from V_P_EVENT_SERVICE_TYPE
where P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID}
and ( upper(EVENT_CODE) like upper('%{s_keyword}%') or upper(EVENT_NAME) like upper('%{s_keyword}%') )" name="P_EVENT_SERVICE_TYPE" orderBy="P_EVENT_SERVICE_TYPE_ID" pageSizeLimit="100" wizardCaption=" P EVENT SERVICE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAYANAN" fieldSource="LAYANAN" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_TYPELAYANAN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="EVENT_NAME" fieldSource="EVENT_NAME" wizardCaption="P EVENT TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_TYPEEVENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="RATED_VALID_FROM" fieldSource="RATED_VALID_FROM" wizardCaption="RATED VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_TYPERATED_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="RATED_VALID_TO" fieldSource="RATED_VALID_TO" wizardCaption="RATED VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_TYPERATED_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_SERVICE_TYPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="27" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_SERVICE_TYPE_Insert" hrefSource="p_event_service_type.ccp" removeParameters="P_EVENT_SERVICE_TYPE_ID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_EVENT_SERVICE_TYPEP_EVENT_SERVICE_TYPE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="79"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_EVENT_SERVICE_TYPEDLink" hrefSource="p_event_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="P_EVENT_SERVICE_TYPE_ID" source="P_EVENT_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_EVENT_SERVICE_TYPEADLink" hrefSource="p_event_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_SERVICE_TYPE_ID" source="P_EVENT_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_event_service_type.ccp" wizardThemeItem="GridA" PathID="P_EVENT_SERVICE_TYPEP_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_SERVICE_TYPE_ID" source="P_EVENT_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="84" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="85"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="109" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="111" variable="P_SERVICE_TYPE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_EVENT_SERVICE_TYPESearch" wizardCaption=" P EVENT SERVICE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_event_service_type.ccp" PathID="P_EVENT_SERVICE_TYPESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_EVENT_SERVICE_TYPESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_EVENT_SERVICE_TYPESearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_EVENT_SERVICE_TYPESearchP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
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
		<Record id="28" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_event_service_type1" dataSource="select P_EVENT_SERVICE_TYPE_ID, LAYANAN, EVENT_CODE, EVENT_NAME, 
to_char(RATED_VALID_FROM,'DD-MON-YYYY') AS RATED_VALID_FROM,
to_char(RATED_VALID_TO,'DD-MON-YYYY') AS RATED_VALID_TO, 
DESCRIPTION, P_SERVICE_TYPE_ID, P_EVENT_TYPE_ID, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY
FROM V_P_EVENT_SERVICE_TYPE
where P_EVENT_SERVICE_TYPE_ID = {P_EVENT_SERVICE_TYPE_ID}
" errorSummator="Error" wizardCaption=" P Event Service Type " wizardFormMethod="post" PathID="p_event_service_type1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="INSERT INTO P_EVENT_SERVICE_TYPE(
P_EVENT_SERVICE_TYPE_ID,
P_SERVICE_TYPE_ID,
P_EVENT_TYPE_ID,
RATED_VALID_FROM,
RATED_VALID_TO,
DESCRIPTION,
CREATION_DATE,
CREATED_BY,
UPDATED_DATE,
UPDATED_BY)
VALUES
(GENERATE_ID('BILLDB','P_EVENT_SERVICE_TYPE','P_EVENT_SERVICE_TYPE_ID'),
{P_SERVICE_TYPE_ID},
{P_EVENT_TYPE_ID},
to_date('{RATED_VALID_FROM}','dd/mm/yyyy'),
to_date('{RATED_VALID_TO}','dd/mm/yyyy'),
'{DESCRIPTION}',
sysdate,
'{CREATED_BY}',
sysdate,
'{UPDATED_BY}')" customDeleteType="SQL" customDelete="DELETE FROM P_EVENT_SERVICE_TYPE WHERE P_EVENT_SERVICE_TYPE_ID = {P_EVENT_SERVICE_TYPE_ID}" customUpdateType="SQL" customUpdate="UPDATE P_EVENT_SERVICE_TYPE SET 
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
P_EVENT_TYPE_ID={P_EVENT_TYPE_ID},
RATED_VALID_FROM=to_date('{RATED_VALID_FROM}','dd/mm/yyyy'),
RATED_VALID_TO=to_date('{RATED_VALID_TO}','dd/mm/yyyy'),
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_EVENT_SERVICE_TYPE_ID = {P_EVENT_SERVICE_TYPE_ID}"><Components><Hidden id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_TYPE_ID" fieldSource="P_EVENT_TYPE_ID" required="True" caption="P EVENT TYPE ID" wizardCaption="P EVENT TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1P_EVENT_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="RATED_VALID_FROM" fieldSource="RATED_VALID_FROM" required="True" caption="RATED VALID FROM" wizardCaption="RATED VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1RATED_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="38" name="DatePicker_RATED_VALID_FROM" control="RATED_VALID_FROM" wizardSatellite="True" wizardControl="RATED_VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_event_service_type1DatePicker_RATED_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="RATED_VALID_TO" fieldSource="RATED_VALID_TO" required="False" caption="RATED VALID TO" wizardCaption="RATED VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1RATED_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="40" name="DatePicker_RATED_VALID_TO" control="RATED_VALID_TO" wizardSatellite="True" wizardControl="RATED_VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_event_service_type1DatePicker_RATED_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="False" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="48" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_event_service_type1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="49" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="50" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="51" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_event_service_type1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="52" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="53" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="54" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_event_service_type1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="55" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="56" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_event_service_type1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="58" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EVENT_NAME" fieldSource="EVENT_NAME" required="False" caption="P EVENT TYPE ID" wizardCaption="P EVENT TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1EVENT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1P_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="False" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_service_type1P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="P_EVENT_SERVICE_TYPE_ID" parameterSource="P_EVENT_SERVICE_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="110" parameterType="URL" variable="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="72" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="73" variable="P_EVENT_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_TYPE_ID"/>
				<SQLParameter id="74" variable="RATED_VALID_FROM" parameterType="Control" dataType="Text" parameterSource="RATED_VALID_FROM"/>
				<SQLParameter id="75" variable="RATED_VALID_TO" parameterType="Control" dataType="Text" parameterSource="RATED_VALID_TO"/>
				<SQLParameter id="76" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="77" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="78" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="61" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="62" field="P_EVENT_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_TYPE_ID"/>
				<CustomParameter id="63" field="RATED_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="RATED_VALID_FROM"/>
				<CustomParameter id="64" field="RATED_VALID_TO" dataType="Date" parameterType="Control" parameterSource="RATED_VALID_TO"/>
				<CustomParameter id="65" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="66" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="67" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="68" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="69" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="70" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
				<CustomParameter id="71" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_EVENT_TYPE_NAME"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="102" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="103" variable="P_EVENT_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_TYPE_ID"/>
				<SQLParameter id="104" variable="RATED_VALID_FROM" parameterType="Control" dataType="Text" parameterSource="RATED_VALID_FROM"/>
				<SQLParameter id="105" variable="RATED_VALID_TO" parameterType="Control" dataType="Text" parameterSource="RATED_VALID_TO"/>
				<SQLParameter id="106" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="107" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="108" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="90" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="91" field="P_EVENT_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_TYPE_ID"/>
				<CustomParameter id="92" field="RATED_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="RATED_VALID_FROM"/>
				<CustomParameter id="93" field="RATED_VALID_TO" dataType="Date" parameterType="Control" parameterSource="RATED_VALID_TO"/>
				<CustomParameter id="94" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="95" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="96" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="97" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="98" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="99" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_NAME"/>
				<CustomParameter id="100" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_EVENT_TYPE_NAME"/>
				<CustomParameter id="101" field="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="88" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_event_service_type.php" forShow="True" url="p_event_service_type.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_event_service_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="86"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="87"/>
			</Actions>
		</Event>
	</Events>
</Page>
