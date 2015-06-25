<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*, b.code as job_code, c.code as data_type_code
from p_first_job a, p_job b, p_reference_list c
where a.p_job_id = b.p_job_id
and a.data_type_id = c.p_reference_list_id
and (upper(b.code) like upper('%{s_keyword}%') or
upper(c.code) like upper('%{s_keyword}%'))
ORDER BY a.update_date desc" name="P_FIRST_JOB" orderBy="P_CUSTOMER_TITLE_ID" pageSizeLimit="100" wizardCaption=" P CUSTOMER TITLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="JOB_CODE" fieldSource="JOB_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FIRST_JOBJOB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DATA_TYPE_CODE" fieldSource="DATA_TYPE_CODE" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FIRST_JOBDATA_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="LISTING_NO" fieldSource="LISTING_NO" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_FIRST_JOBLISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_FIRST_JOBDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="36" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FIRST_JOB_Insert" hrefSource="p_first_job.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_FIRST_JOBP_FIRST_JOB_Insert" removeParameters="P_FIRST_JOB_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="61"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_FIRST_JOBDLink" hrefSource="p_first_job.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_FIRST_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="67" sourceType="DataField" name="P_FIRST_JOB_ID" source="P_FIRST_JOB_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="68" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_FIRST_JOBADLink" hrefSource="p_first_job.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_FIRST_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="69" sourceType="DataField" format="yyyy-mm-dd" name="P_FIRST_JOB_ID" source="P_FIRST_JOB_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FIRST_JOB_ID" fieldSource="P_FIRST_JOB_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_first_job.ccp" wizardThemeItem="GridA" PathID="P_FIRST_JOBP_FIRST_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="19" sourceType="DataField" format="yyyy-mm-dd" name="P_CUSTOMER_TITLE_ID" source="P_CUSTOMER_TITLE_ID"/>
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
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="54" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_FIRST_JOBSearch" wizardCaption=" P CUSTOMER TITLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_first_job.ccp" PathID="P_FIRST_JOBSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_FIRST_JOBSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_FIRST_JOBSearchButton_DoSearch">
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
		<Record id="37" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_FIRST_JOB1" dataSource="select a.*, b.code as job_code, c.code as data_type_code
from p_first_job a, p_job b, p_reference_list c
where a.p_job_id = b.p_job_id
and a.data_type_id = c.p_reference_list_id
and a.P_FIRST_JOB_ID = {P_FIRST_JOB_ID}" errorSummator="Error" wizardCaption=" P Customer Title " wizardFormMethod="post" PathID="P_FIRST_JOB1" activeCollection="DSQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="INSERT INTO p_first_job(P_FIRST_JOB_ID, DATA_TYPE_ID, P_JOB_ID, LISTING_NO, DESCRIPTION, UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_FIRST_JOB','P_FIRST_JOB_ID'),{DATA_TYPE_ID},{P_JOB_ID},{LISTING_NO},'{DESCRIPTION}',sysdate,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_FIRST_JOB SET 
	P_JOB_ID={P_JOB_ID},
	DATA_TYPE_ID={DATA_TYPE_ID},
	LISTING_NO='{LISTING_NO}',
	DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
	UPDATE_DATE=sysdate, 
	UPDATE_BY='{UPDATE_BY}' 
	WHERE  P_FIRST_JOB_ID = {P_FIRST_JOB_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_FIRST_JOB WHERE P_FIRST_JOB = {P_FIRST_JOB_ID}" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="JOB_CODE" fieldSource="JOB_CODE" required="True" caption="JOB_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1JOB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="DATA_TYPE_ID" fieldSource="DATA_TYPE_ID" required="True" caption="DATA_TYPE_ID" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1DATA_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="P_FIRST_JOB1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_FIRST_JOB1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="P_FIRST_JOB1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="60" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_FIRST_JOB1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DATA_TYPE_CODE" fieldSource="DATA_TYPE_CODE" required="True" caption="DATA_TYPE_CODE" wizardCaption="P TITLE POSITION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1DATA_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LISTING_NO" fieldSource="LISTING_NO" required="True" caption="LISTING_NO" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1LISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FIRST_JOB_ID" fieldSource="P_FIRST_JOB_ID" required="False" caption="P_FIRST_JOB_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1P_FIRST_JOB_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_JOB_ID" fieldSource="P_JOB_ID" required="True" caption="P_JOB_ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_FIRST_JOB1P_JOB_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="P_CUSTOMER_TITLE_ID" parameterSource="P_CUSTOMER_TITLE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="55" parameterType="URL" variable="P_FIRST_JOB_ID" dataType="Float" parameterSource="P_FIRST_JOB_ID" defaultValue="-99"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="79" variable="DATA_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DATA_TYPE_ID"/>
				<SQLParameter id="80" variable="P_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_ID"/>
				<SQLParameter id="81" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="83" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="104" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="70" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="71" field="P_TITLE_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_TITLE_POSITION_ID"/>
				<CustomParameter id="72" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="73" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="74" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="75" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="76" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="77" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="92" variable="LISTING_NO" parameterType="Control" dataType="Text" parameterSource="LISTING_NO"/>
				<SQLParameter id="94" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="96" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="98" variable="P_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_ID"/>
				<SQLParameter id="99" variable="DATA_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="DATA_TYPE_ID"/>
				<SQLParameter id="100" variable="P_FIRST_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FIRST_JOB_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="84" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="85" field="P_TITLE_POSITION_ID" dataType="Float" parameterType="Control" parameterSource="P_TITLE_POSITION_ID"/>
				<CustomParameter id="86" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="87" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="88" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="89" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="90" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="91" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="101" variable="P_FIRST_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FIRST_JOB_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_first_job_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_first_job.php" forShow="True" url="p_first_job.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="64"/>
				<Action actionName="Custom Code" actionCategory="General" id="65"/>
			</Actions>
		</Event>
	</Events>
</Page>
