<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.P_SERVICE_TYPE_ID,
a.CODE,
a.SERVICE_NAME,
a.P_SERVICE_GROUP_ID,
to_char(a.VALID_FROM,'DD-MON-YYYY') AS VALID_FROM,
to_char(a.VALID_TO,'DD-MON-YYYY') AS VALID_TO,
a.DESCRIPTION,
b.CODE AS SERVICE_GROUP_NAME
from 
p_service_type a , p_service_group b
where a.P_SERVICE_GROUP_ID = b.P_SERVICE_GROUP_ID" name="P_SERVICE_TYPE" orderBy="P_SERVICE_TYPE_ID" pageSizeLimit="100" wizardCaption=" P SERVICE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Hidden id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_service_type.ccp" wizardThemeItem="GridA" PathID="P_SERVICE_TYPEP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="22" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NAME" fieldSource="SERVICE_NAME" wizardCaption="SERVICE NAME" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPESERVICE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_GROUP_NAME" fieldSource="SERVICE_GROUP_NAME" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_TYPESERVICE_GROUP_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Text" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEVALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEVALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="43" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_TYPE_Insert" hrefSource="p_service_type.ccp" removeParameters="P_SERVICE_TYPE_ID;FLAG;s_keyword;P_SERVICE_TYPEPage;P_SERVICE_TYPEPageSize;P_SERVICE_TYPEOrder;P_SERVICE_TYPEDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_SERVICE_TYPEP_SERVICE_TYPE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="75"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_SERVICE_TYPEDLink" hrefSource="p_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_SERVICE_TYPEADLink" hrefSource="p_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="76" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="77"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="SERVICE_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="84" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SERVICE_TYPESearch" wizardCaption=" P SERVICE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_type.ccp" PathID="P_SERVICE_TYPESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_SERVICE_TYPESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_SERVICE_TYPESearchButton_DoSearch">
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
		<Record id="44" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_service_type1" dataSource="select a.P_SERVICE_TYPE_ID,
a.CODE,
a.SERVICE_NAME,
a.P_SERVICE_GROUP_ID,
to_char(a.VALID_FROM,'DD-MON-YYYY') AS VALID_FROM,
to_char(a.VALID_TO,'DD-MON-YYYY') AS VALID_TO,
a.DESCRIPTION,
to_char(a.CREATION_DATE,'DD-MON-YYYY') AS CREATION_DATE,
a.CREATED_BY,
to_char(a.UPDATED_DATE,'DD-MON-YYYY') AS UPDATED_DATE,
a.UPDATED_BY,
b.CODE AS SERVICE_GROUP_NAME
from 
ccbs.p_service_type a , ccbs.p_service_group b
where a.P_SERVICE_GROUP_ID = b.P_SERVICE_GROUP_ID
and P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID}" errorSummator="Error" wizardCaption=" P Service Type " wizardFormMethod="post" PathID="p_service_type1" pasteActions="pasteActions" customInsert="INSERT INTO P_SERVICE_TYPE
(P_SERVICE_TYPE_ID,
CODE,
SERVICE_NAME,
P_SERVICE_GROUP_ID,
VALID_FROM,
VALID_TO,
DESCRIPTION,
CREATION_DATE,
CREATED_BY,
UPDATED_DATE,
UPDATED_BY)
values
(GENERATE_ID('TRBDB','P_SERVICE_TYPE','P_SERVICE_TYPE_ID'),
'{CODE}',
'{SERVICE_NAME}',
{P_SERVICE_GROUP_ID},
to_date('{VALID_FROM}','dd/mm/yyyy'),
to_date('{VALID_TO}','dd/mm/yyyy'),
'{DESCRIPTION}',
SYSDATE,
'{CREATED_BY}',
SYSDATE,
'{CREATED_BY}'
)" customUpdate="UPDATE P_SERVICE_TYPE SET 
CODE = '{CODE}',
SERVICE_NAME = '{SERVICE_NAME}',
P_SERVICE_GROUP_ID = {P_SERVICE_GROUP_ID},
VALID_FROM=to_date('{VALID_FROM}','dd/mm/yyyy'),
VALID_TO=to_date('{VALID_TO}','dd/mm/yyyy'),
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID}" customDelete="DELETE P_SERVICE_TYPE WHERE P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID}" customDeleteType="SQL" customUpdateType="SQL" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
			<Components>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_NAME" fieldSource="SERVICE_NAME" required="True" caption="SERVICE NAME" wizardCaption="SERVICE NAME" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1SERVICE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_GROUP_ID" fieldSource="P_SERVICE_GROUP_ID" required="True" caption="P SERVICE GROUP ID" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1P_SERVICE_GROUP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="55" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/trb/Style.css" PathID="p_service_type1DatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CREATION_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_service_type1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="65" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="66" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="67" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_service_type1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="68" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="69" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="70" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_service_type1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="71" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="72" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="73" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_service_type1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="74" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_GROUP_NAME" fieldSource="SERVICE_GROUP_NAME" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1SERVICE_GROUP_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="P_SERVICE_TYPE_ID" parameterSource="P_SERVICE_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="97" parameterType="URL" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="98" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="99" variable="SERVICE_NAME" parameterType="Control" dataType="Text" parameterSource="SERVICE_NAME"/>
				<SQLParameter id="100" variable="P_SERVICE_GROUP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_GROUP_ID"/>
				<SQLParameter id="101" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="102" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
				<SQLParameter id="103" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
				<SQLParameter id="105" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="86" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="87" field="SERVICE_NAME" dataType="Text" parameterType="Control" parameterSource="SERVICE_NAME"/>
				<CustomParameter id="88" field="P_SERVICE_GROUP_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_GROUP_ID"/>
				<CustomParameter id="89" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="90" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="91" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="92" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="93" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="94" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="95" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
				<CustomParameter id="96" field="P_SERVICE_GROUP_NAME" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_GROUP_NAME"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="118" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="119" variable="SERVICE_NAME" parameterType="Control" dataType="Text" parameterSource="SERVICE_NAME"/>
				<SQLParameter id="120" variable="P_SERVICE_GROUP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_GROUP_ID"/>
				<SQLParameter id="121" variable="VALID_FROM" parameterType="Control" dataType="Text" parameterSource="VALID_FROM"/>
				<SQLParameter id="122" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
				<SQLParameter id="123" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="124" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="125" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="106" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="107" field="SERVICE_NAME" dataType="Text" parameterType="Control" parameterSource="SERVICE_NAME"/>
				<CustomParameter id="108" field="P_SERVICE_GROUP_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_GROUP_ID"/>
				<CustomParameter id="109" field="VALID_FROM" dataType="Text" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="110" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="111" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="112" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="113" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="114" field="CREATION_DATE" dataType="Text" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="115" field="UPDATED_DATE" dataType="Text" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="116" field="SERVICE_GROUP_NAME" dataType="Text" parameterType="Control" parameterSource="SERVICE_GROUP_NAME"/>
				<CustomParameter id="117" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="126" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_service_type.php" forShow="True" url="p_service_type.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_service_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="78"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="79"/>
			</Actions>
		</Event>
	</Events>
</Page>
