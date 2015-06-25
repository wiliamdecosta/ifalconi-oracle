<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.ACCOUNT_NAME , c.CODE as p_reference_list_name from p_account_rep_info a ,
		p_account_rep b,
		p_reference_list c
where a.p_account_rep_id=b.p_account_rep_id
and a.p_reference_list_id=c.p_reference_list_id
and 
(
upper(a.INFO_DESC) like upper('%{s_keyword}%') or
upper(b.ACCOUNT_NAME) like upper('%{s_keyword}%') or
upper(b.ACCOUNT_NAME) like upper('%{s_keyword}%')
)

" name="P_ACCOUNT_REP_INFO" orderBy="P_ACCOUNT_REP_INFO_ID" pageSizeLimit="100" wizardCaption=" P ACCOUNT REP INFO " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
<Components>
<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="ACCOUNT_NAME" fieldSource="ACCOUNT_NAME" wizardCaption="P ACCOUNT REP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ACCOUNT_REP_INFOACCOUNT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_REFERENCE_LIST_NAME" fieldSource="P_REFERENCE_LIST_NAME" wizardCaption="P REFERENCE LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ACCOUNT_REP_INFOP_REFERENCE_LIST_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="INFO_DESC" fieldSource="INFO_DESC" wizardCaption="INFO DESC" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REP_INFOINFO_DESC">
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
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ACCOUNT_REP_INFO_Insert" hrefSource="p_account_rep_info.ccp" removeParameters="P_ACCOUNT_REP_INFO_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_ACCOUNT_REP_INFOP_ACCOUNT_REP_INFO_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="58" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="59" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ACCOUNT_REP_INFODLink" hrefSource="p_account_rep_info.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ACCOUNT_REP_INFO_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="60" sourceType="DataField" name="P_ACCOUNT_REP_INFO_ID" source="P_ACCOUNT_REP_INFO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Link id="47" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_ACCOUNT_REP_INFOADLink" hrefSource="p_account_rep_info.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ACCOUNT_REP_INFO_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="61" sourceType="DataField" format="yyyy-mm-dd" name="P_ACCOUNT_REP_INFO_ID" source="P_ACCOUNT_REP_INFO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ACCOUNT_REP_INFO_ID" fieldSource="P_ACCOUNT_REP_INFO_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_account_rep_info.ccp" wizardThemeItem="GridA" PathID="P_ACCOUNT_REP_INFOP_ACCOUNT_REP_INFO_ID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_ACCOUNT_REP_INFO_ID" source="P_ACCOUNT_REP_INFO_ID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="62" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="63"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="INFO_DESC" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="108" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ACCOUNT_REP_INFOSearch" wizardCaption=" P ACCOUNT REP INFO " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_account_rep_info.ccp" PathID="P_ACCOUNT_REP_INFOSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_ACCOUNT_REP_INFOSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_ACCOUNT_REP_INFOSearchButton_DoSearch">
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
<Record id="31" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_account_rep_info1" dataSource="select a.*,b.ACCOUNT_NAME , c.CODE as p_reference_list_name from p_account_rep_info a ,
		p_account_rep b,
		p_reference_list c
where a.p_account_rep_id=b.p_account_rep_id
and a.p_reference_list_id=c.p_reference_list_id
and a.P_ACCOUNT_REP_INFO_ID={P_ACCOUNT_REP_INFO_ID}

" errorSummator="Error" wizardCaption=" P Account Rep Info " wizardFormMethod="post" PathID="p_account_rep_info1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_ACCOUNT_REP_INFO(P_ACCOUNT_REP_INFO_ID, P_ACCOUNT_REP_ID, P_REFERENCE_LIST_ID, INFO_DESC, VALID_FROM, VALID_TO, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_ACCOUNT_REP_INFO','P_ACCOUNT_REP_INFO_ID'),{P_ACCOUNT_REP_ID},{P_REFERENCE_LIST_ID},'{INFO_DESC}','{VALID_FROM}','{VALID_TO}','{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_ACCOUNT_REP_INFO SET 
P_ACCOUNT_REP_ID={P_ACCOUNT_REP_ID},
P_REFERENCE_LIST_ID={P_REFERENCE_LIST_ID},
INFO_DESC='{INFO_DESC}',
VALID_FROM='{VALID_FROM}',
VALID_TO='{VALID_TO}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_ACCOUNT_REP_INFO_ID = {P_ACCOUNT_REP_INFO_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_ACCOUNT_REP_INFO WHERE P_ACCOUNT_REP_INFO_ID = {P_ACCOUNT_REP_INFO_ID}">
<Components>
<Hidden id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ACCOUNT_REP_ID" fieldSource="P_ACCOUNT_REP_ID" required="True" caption="P ACCOUNT REP ID" wizardCaption="P ACCOUNT REP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1P_ACCOUNT_REP_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Hidden id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REFERENCE_LIST_ID" fieldSource="P_REFERENCE_LIST_ID" required="True" caption="P REFERENCE LIST ID" wizardCaption="P REFERENCE LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1P_REFERENCE_LIST_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC" fieldSource="INFO_DESC" required="True" caption="INFO DESC" wizardCaption="INFO DESC" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1INFO_DESC">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="False" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="42" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_account_rep_info1DatePicker_VALID_FROM">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="44" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_account_rep_info1DatePicker_VALID_TO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextArea id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextArea>
<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1CREATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1UPDATED_BY" defaultValue="CCGetUserLogin()">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_account_rep_info1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="53" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_account_rep_info1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Button id="54" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_account_rep_info1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="55"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_account_rep_info1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NAME" fieldSource="ACCOUNT_NAME" required="False" caption="P ACCOUNT REP ID" wizardCaption="P ACCOUNT REP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1ACCOUNT_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REFERENCE_LIST_NAME" fieldSource="P_REFERENCE_LIST_NAME" required="False" caption="P REFERENCE LIST ID" wizardCaption="P REFERENCE LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1P_REFERENCE_LIST_NAME">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ACCOUNT_REP_INFO_ID" fieldSource="P_ACCOUNT_REP_INFO_ID" required="False" caption="P_ACCOUNT_REP_INFO_ID" wizardCaption="P ACCOUNT REP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep_info1P_ACCOUNT_REP_INFO_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
<Events/>
<TableParameters>
<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="P_ACCOUNT_REP_INFO_ID" parameterSource="P_ACCOUNT_REP_INFO_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
<SPParameters/>
<SQLParameters>
<SQLParameter id="109" parameterType="URL" variable="P_ACCOUNT_REP_INFO_ID" dataType="Float" parameterSource="P_ACCOUNT_REP_INFO_ID"/>
</SQLParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<ISPParameters/>
<ISQLParameters>
<SQLParameter id="76" variable="P_ACCOUNT_REP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_ID"/>
<SQLParameter id="77" variable="P_REFERENCE_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REFERENCE_LIST_ID"/>
<SQLParameter id="78" variable="INFO_DESC" parameterType="Control" dataType="Text" parameterSource="INFO_DESC"/>
<SQLParameter id="79" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="80" variable="VALID_TO" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_TO"/>
<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="82" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="83" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
<IFormElements>
<CustomParameter id="66" field="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
<CustomParameter id="67" field="P_REFERENCE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="P_REFERENCE_LIST_ID"/>
<CustomParameter id="68" field="INFO_DESC" dataType="Text" parameterType="Control" parameterSource="INFO_DESC"/>
<CustomParameter id="69" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="70" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="71" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="72" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="73" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="74" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="75" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
</IFormElements>
<USPParameters/>
<USQLParameters>
<SQLParameter id="98" variable="P_ACCOUNT_REP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_ID"/>
<SQLParameter id="99" variable="P_REFERENCE_LIST_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REFERENCE_LIST_ID"/>
<SQLParameter id="100" variable="INFO_DESC" parameterType="Control" dataType="Text" parameterSource="INFO_DESC"/>
<SQLParameter id="101" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="102" variable="VALID_TO" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_TO"/>
<SQLParameter id="103" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="104" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="106" variable="P_ACCOUNT_REP_INFO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_INFO_ID"/>
</USQLParameters>
<UConditions/>
<UFormElements>
<CustomParameter id="86" field="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
<CustomParameter id="87" field="P_REFERENCE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="P_REFERENCE_LIST_ID"/>
<CustomParameter id="88" field="INFO_DESC" dataType="Text" parameterType="Control" parameterSource="INFO_DESC"/>
<CustomParameter id="89" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="90" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="91" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="92" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="93" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="94" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="95" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="96" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_ACCOUNT_REP_NAME"/>
<CustomParameter id="97" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_REFERENCE_LIST_NAME"/>
</UFormElements>
<DSPParameters/>
<DSQLParameters>
<SQLParameter id="107" variable="P_ACCOUNT_REP_INFO_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_INFO_ID"/>
</DSQLParameters>
<DConditions/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_account_rep_info.php" forShow="True" url="p_account_rep_info.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="p_account_rep_info_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="64"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="65"/>
</Actions>
</Event>
</Events>
</Page>
