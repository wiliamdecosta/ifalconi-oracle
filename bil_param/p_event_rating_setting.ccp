<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,c.code as p_event_task_list_name
from p_event_rating_setting a,
p_event_service_type b,
p_event_task_list c
where
a.p_event_service_type_id=b.p_event_service_type_id
and a.p_event_task_list_id=c.p_event_task_list_id
and upper(c.code) like upper('%{s_keyword}%')

" name="P_EVENT_RATING_SETTING" orderBy="P_EVENT_RATING_SETTING_ID" pageSizeLimit="100" wizardCaption=" P EVENT RATING SETTING " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="16" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_EVENT_RATING_SETTINGP_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_EVENT_TASK_LIST_NAME" fieldSource="P_EVENT_TASK_LIST_NAME" wizardCaption="P EVENT TASK LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_EVENT_RATING_SETTINGP_EVENT_TASK_LIST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_EVENT_RATING_SETTINGDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="21" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_RATING_SETTING_Insert" hrefSource="p_event_rating_setting.ccp" removeParameters="P_EVENT_RATING_SETTING_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_EVENT_RATING_SETTINGP_EVENT_RATING_SETTING_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="43"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="44" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="45" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_EVENT_RATING_SETTINGDLink" hrefSource="p_event_rating_setting.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_RATING_SETTING_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="46" sourceType="DataField" name="P_EVENT_RATING_SETTING_ID" source="P_EVENT_RATING_SETTING_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_EVENT_RATING_SETTINGADLink" hrefSource="p_event_rating_setting.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_EVENT_RATING_SETTING_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="48" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_RATING_SETTING_ID" source="P_EVENT_RATING_SETTING_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_EVENT_RATING_SETTING_ID" fieldSource="P_EVENT_RATING_SETTING_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_event_rating_setting.ccp" wizardThemeItem="GridA" PathID="P_EVENT_RATING_SETTINGP_EVENT_RATING_SETTING_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="14" sourceType="DataField" format="yyyy-mm-dd" name="P_EVENT_RATING_SETTING_ID" source="P_EVENT_RATING_SETTING_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="49" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="50"/>
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
				<SQLParameter id="81" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_EVENT_RATING_SETTINGSearch" wizardCaption=" P EVENT RATING SETTING " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_event_rating_setting.ccp" PathID="P_EVENT_RATING_SETTINGSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" PathID="P_EVENT_RATING_SETTINGSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_EVENT_RATING_SETTINGSearchButton_DoSearch">
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
		<Record id="22" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_event_rating_setting1" dataSource="select a.*,c.code as p_event_task_list_name
from p_event_rating_setting a,
p_event_service_type b,
p_event_task_list c
where
a.p_event_service_type_id=b.p_event_service_type_id
and a.p_event_task_list_id=c.p_event_task_list_id
and a.P_EVENT_RATING_SETTING_ID={P_EVENT_RATING_SETTING_ID}" errorSummator="Error" wizardCaption=" P Event Rating Setting " wizardFormMethod="post" PathID="p_event_rating_setting1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_EVENT_RATING_SETTING(P_EVENT_RATING_SETTING_ID, P_EVENT_SERVICE_TYPE_ID, P_EVENT_TASK_LIST_ID, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_EVENT_RATING_SETTING','P_EVENT_RATING_SETTING_ID'),{P_EVENT_SERVICE_TYPE_ID},{P_EVENT_TASK_LIST_ID},'{DESCRIPTION}', sysdate, '{CREATED_BY}', sysdate, '{UPDATED_BY}') " customUpdateType="SQL" customUpdate="UPDATE P_EVENT_RATING_SETTING SET 
P_EVENT_SERVICE_TYPE_ID={P_EVENT_SERVICE_TYPE_ID},
P_EVENT_TASK_LIST_ID={P_EVENT_TASK_LIST_ID},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_EVENT_RATING_SETTING_ID = {P_EVENT_RATING_SETTING_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_EVENT_RATING_SETTING WHERE P_EVENT_RATING_SETTING_ID = {P_EVENT_RATING_SETTING_ID}">
			<Components>
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_SERVICE_TYPE_ID" fieldSource="P_EVENT_SERVICE_TYPE_ID" required="True" caption="P EVENT SERVICE TYPE ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1P_EVENT_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_TASK_LIST_ID" fieldSource="P_EVENT_TASK_LIST_ID" required="True" caption="P EVENT TASK LIST ID" wizardCaption="P EVENT TASK LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1P_EVENT_TASK_LIST_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_event_rating_setting1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="39" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_event_rating_setting1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_event_rating_setting1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="41"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_event_rating_setting1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_EVENT_RATING_SETTING_ID" fieldSource="P_EVENT_RATING_SETTING_ID" required="False" caption="P EVENT SERVICE TYPE ID" wizardCaption="P EVENT SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1P_EVENT_RATING_SETTING_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_EVENT_TASK_LIST_NAME" fieldSource="P_EVENT_TASK_LIST_NAME" required="True" caption="P_EVENT_TASK_LIST_NAME" wizardCaption="P EVENT TASK LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_event_rating_setting1P_EVENT_TASK_LIST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="P_EVENT_RATING_SETTING_ID" parameterSource="P_EVENT_RATING_SETTING_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="82" parameterType="URL" variable="P_EVENT_RATING_SETTING_ID" dataType="Float" parameterSource="P_EVENT_RATING_SETTING_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="60" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<SQLParameter id="61" variable="P_EVENT_TASK_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_TASK_LIST_ID"/>
				<SQLParameter id="62" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="63" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="64" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="53" field="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<CustomParameter id="54" field="P_EVENT_TASK_LIST_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_TASK_LIST_ID"/>
				<CustomParameter id="55" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="56" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="57" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="58" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="59" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="74" variable="P_EVENT_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<SQLParameter id="75" variable="P_EVENT_TASK_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_TASK_LIST_ID"/>
				<SQLParameter id="76" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="77" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="78" variable="P_EVENT_RATING_SETTING_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_RATING_SETTING_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="66" field="P_EVENT_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_SERVICE_TYPE_ID"/>
				<CustomParameter id="67" field="P_EVENT_TASK_LIST_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_TASK_LIST_ID"/>
				<CustomParameter id="68" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="69" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="70" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="71" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="72" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="73" field="P_EVENT_RATING_SETTING_ID" dataType="Float" parameterType="Control" parameterSource="P_EVENT_RATING_SETTING_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="79" variable="P_EVENT_RATING_SETTING_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_EVENT_RATING_SETTING_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_event_rating_setting.php" forShow="True" url="p_event_rating_setting.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_event_rating_setting_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
