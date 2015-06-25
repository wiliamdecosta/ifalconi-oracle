<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_job_position_name from p_account_rep a , p_job_position b
where a.p_job_position_id=b.p_job_position_id
and upper(a.ACCOUNT_NAME) like upper('%{s_keyword}%')" name="P_ACCOUNT_REP" orderBy="P_ACCOUNT_REP_ID" pageSizeLimit="100" wizardCaption=" P ACCOUNT REP " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="ACCOUNT_NAME" fieldSource="ACCOUNT_NAME" wizardCaption="ACCOUNT NAME" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REPACCOUNT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="EMPLOYEE_NO" fieldSource="EMPLOYEE_NO" wizardCaption="EMPLOYEE NO" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REPEMPLOYEE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_JOB_POSITION_NAME" fieldSource="P_JOB_POSITION_NAME" wizardCaption="P JOB POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_ACCOUNT_REPP_JOB_POSITION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REPVALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REPVALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ACCOUNT_REPDESCRIPTION">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ACCOUNT_REP_Insert" hrefSource="p_account_rep.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_ACCOUNT_REPP_ACCOUNT_REP_Insert" removeParameters="P_ACCOUNT_REP_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="76"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="77" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="78" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ACCOUNT_REPDLink" hrefSource="p_account_rep.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ACCOUNT_REP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="79" sourceType="DataField" name="P_ACCOUNT_REP_ID" source="P_ACCOUNT_REP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_ACCOUNT_REPADLink" hrefSource="p_account_rep.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_ACCOUNT_REP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" format="yyyy-mm-dd" name="P_ACCOUNT_REP_ID" source="P_ACCOUNT_REP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ACCOUNT_REP_ID" fieldSource="P_ACCOUNT_REP_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_account_rep.ccp" wizardThemeItem="GridA" PathID="P_ACCOUNT_REPP_ACCOUNT_REP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_ACCOUNT_REP_ID" source="P_ACCOUNT_REP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="82" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="83"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="ACCOUNT_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="107" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ACCOUNT_REPSearch" wizardCaption=" P ACCOUNT REP " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_account_rep.ccp" PathID="P_ACCOUNT_REPSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" PathID="P_ACCOUNT_REPSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_ACCOUNT_REPSearchButton_DoSearch">
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
		<Record id="31" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_account_rep1" dataSource="select a.*,b.code as p_job_position_name from p_account_rep a , p_job_position b
where a.p_job_position_id=b.p_job_position_id
and a.P_ACCOUNT_REP_ID={P_ACCOUNT_REP_ID}" errorSummator="Error" wizardCaption=" P Account Rep " wizardFormMethod="post" PathID="p_account_rep1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="INSERT INTO P_ACCOUNT_REP(P_ACCOUNT_REP_ID, ACCOUNT_NAME, EMPLOYEE_NO, P_JOB_POSITION_ID, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('TRB','P_ACCOUNT_REP','P_ACCOUNT_REP_ID'),UPPER(TRIM('{ACCOUNT_NAME}')),'{EMPLOYEE_NO}',{P_JOB_POSITION_ID},'{VALID_FROM}','{VALID_TO}','{DESCRIPTION}',sysdate, '{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_ACCOUNT_REP SET 
ACCOUNT_NAME='{ACCOUNT_NAME}',
EMPLOYEE_NO='{EMPLOYEE_NO}',
P_JOB_POSITION_ID={P_JOB_POSITION_ID},
VALID_FROM='{VALID_FROM}',
VALID_TO='{VALID_TO}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_ACCOUNT_REP_ID = {P_ACCOUNT_REP_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_ACCOUNT_REP WHERE P_ACCOUNT_REP_ID = {P_ACCOUNT_REP_ID}">
			<Components>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NAME" fieldSource="ACCOUNT_NAME" required="True" caption="ACCOUNT NAME" wizardCaption="ACCOUNT NAME" wizardSize="48" wizardMaxLength="48" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1ACCOUNT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EMPLOYEE_NO" fieldSource="EMPLOYEE_NO" required="False" caption="EMPLOYEE NO" wizardCaption="EMPLOYEE NO" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1EMPLOYEE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_JOB_POSITION_ID" fieldSource="P_JOB_POSITION_ID" required="False" caption="P JOB POSITION ID" wizardCaption="P JOB POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1P_JOB_POSITION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="False" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_account_rep1DatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="44" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="p_account_rep1DatePicker_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="52" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_account_rep1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="53" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_account_rep1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="54" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_account_rep1Button_Delete" removeParameters="TAMBAH;s_keyword">
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
				<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_account_rep1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_JOB_POSITION_NAME" fieldSource="P_JOB_POSITION_NAME" required="False" caption="P JOB POSITION ID" wizardCaption="P JOB POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1P_JOB_POSITION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ACCOUNT_REP_ID" fieldSource="P_ACCOUNT_REP_ID" required="False" caption="EMPLOYEE NO" wizardCaption="EMPLOYEE NO" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_account_rep1P_ACCOUNT_REP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="P_ACCOUNT_REP_ID" parameterSource="P_ACCOUNT_REP_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="108" parameterType="URL" variable="P_ACCOUNT_REP_ID" dataType="Float" parameterSource="P_ACCOUNT_REP_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="67" variable="ACCOUNT_NAME" parameterType="Control" dataType="Text" parameterSource="ACCOUNT_NAME"/>
				<SQLParameter id="68" variable="EMPLOYEE_NO" parameterType="Control" dataType="Text" parameterSource="EMPLOYEE_NO"/>
				<SQLParameter id="69" variable="P_JOB_POSITION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_POSITION_ID"/>
				<SQLParameter id="70" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
				<SQLParameter id="71" variable="VALID_TO" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_TO"/>
				<SQLParameter id="72" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="74" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="57" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME"/>
				<CustomParameter id="58" field="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<CustomParameter id="59" field="P_JOB_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_JOB_POSITION_ID"/>
				<CustomParameter id="60" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="61" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="62" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="63" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="64" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="65" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="66" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="97" variable="ACCOUNT_NAME" parameterType="Control" dataType="Text" parameterSource="ACCOUNT_NAME"/>
				<SQLParameter id="98" variable="EMPLOYEE_NO" parameterType="Control" dataType="Text" parameterSource="EMPLOYEE_NO"/>
				<SQLParameter id="99" variable="P_JOB_POSITION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_POSITION_ID"/>
				<SQLParameter id="100" variable="VALID_FROM" parameterType="Control" defaultValue="00-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
				<SQLParameter id="101" variable="VALID_TO" parameterType="Control" defaultValue="0" dataType="Date" parameterSource="VALID_TO"/>
				<SQLParameter id="103" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="104" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="105" variable="P_ACCOUNT_REP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="86" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME"/>
				<CustomParameter id="87" field="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<CustomParameter id="88" field="P_JOB_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_JOB_POSITION_ID"/>
				<CustomParameter id="89" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="90" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="91" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="92" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="93" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="94" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="95" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="96" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="P_JOB_POSITION_NAME"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="106" variable="P_ACCOUNT_REP_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ACCOUNT_REP_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_account_rep.php" forShow="True" url="p_account_rep.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_account_rep_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="84"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="85"/>
			</Actions>
		</Event>
	</Events>
</Page>
