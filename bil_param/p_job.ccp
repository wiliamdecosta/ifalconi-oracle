<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select * from p_job
where P_JOB_TYPE_ID={P_JOB_TYPE_ID}
and DECODE(PARENT_ID,NULL,0,PARENT_ID) = {PARENT_ID}
and upper(code) like upper('%{s_keyword}%')" name="P_JOB" orderBy="P_JOB_ID" pageSizeLimit="100" wizardCaption=" P JOB " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_JOBCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" wizardCaption="PROCEDURE NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_JOBPROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Float" html="False" name="LISTING_NO" fieldSource="LISTING_NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_JOBLISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_PARALLEL" fieldSource="IS_PARALLEL" wizardCaption="IS PARALLEL" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_JOBIS_PARALLEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Float" html="False" name="PARALLEL_DEGREE" fieldSource="PARALLEL_DEGREE" wizardCaption="PARALLEL DEGREE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_JOBPARALLEL_DEGREE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_FINISH" fieldSource="IS_FINISH" wizardCaption="IS FINISH" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_JOBIS_FINISH">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_JOB_Insert" hrefSource="p_job.ccp" removeParameters="P_JOB_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_JOBP_JOB_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="62"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="63" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="64" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_JOBDLink" hrefSource="p_job.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="65" sourceType="DataField" name="P_JOB_ID" source="P_JOB_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_JOBADLink" hrefSource="p_job.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="67" sourceType="DataField" format="yyyy-mm-dd" name="P_JOB_ID" source="P_JOB_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_JOB_ID" fieldSource="P_JOB_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_job.ccp" wizardThemeItem="GridA" PathID="P_JOBP_JOB_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="17" sourceType="DataField" format="yyyy-mm-dd" name="P_JOB_ID" source="P_JOB_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="68" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="69"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="139" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="141" variable="P_JOB_TYPE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="P_JOB_TYPE_ID"/>
				<SQLParameter id="144" variable="PARENT_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_JOBSearch" wizardCaption=" P JOB " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_job.ccp" PathID="P_JOBSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_JOBSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_JOBSearchButton_DoSearch">
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
		<Record id="31" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_job1" dataSource="select a.*,b.code as p_job_type_name from p_job a , p_job_type b
where a.p_job_type_id=b.p_job_type_id(+)
and a.P_JOB_ID={P_JOB_ID}" errorSummator="Error" wizardCaption=" P Job " wizardFormMethod="post" PathID="p_job1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="ISQLParameters" customInsert="INSERT INTO P_JOB(P_JOB_ID, CODE, PROCEDURE_NAME, LISTING_NO, IS_PARALLEL, PARALLEL_DEGREE, IS_FINISH, P_JOB_TYPE_ID, IS_CANCELLED_PROCESS, IS_REPROCESS, PARENT_ID, CANCEL_PARENT_ID, CONTROL_TABLE_NAME, DESCRIPTION, UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_JOB','P_JOB_ID'),'{CODE}','{PROCEDURE_NAME}',{LISTING_NO},'{IS_PARALLEL}',{PARALLEL_DEGREE},'{IS_FINISH}',{P_JOB_TYPE_ID},'{IS_CANCELLED_PROCESS}','{IS_REPROCESS}',{PARENT_ID},{CANCEL_PARENT_ID},'{CONTROL_TABLE_NAME}','{DESCRIPTION}', sysdate, '{UPDATE_BY}') " customUpdateType="SQL" customUpdate="UPDATE P_JOB SET 
CODE='{CODE}',
PROCEDURE_NAME='{PROCEDURE_NAME}',
LISTING_NO={LISTING_NO},
IS_PARALLEL='{IS_PARALLEL}',
PARALLEL_DEGREE={PARALLEL_DEGREE},
IS_FINISH='{IS_FINISH}',
P_JOB_TYPE_ID={P_JOB_TYPE_ID},
IS_CANCELLED_PROCESS='{IS_CANCELLED_PROCESS}',
IS_REPROCESS='{IS_REPROCESS}',
PARENT_ID={PARENT_ID},
CANCEL_PARENT_ID={CANCEL_PARENT_ID},
CONTROL_TABLE_NAME='{CONTROL_TABLE_NAME}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}' 
WHERE  P_JOB_ID = {P_JOB_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_JOB WHERE P_JOB_ID = {P_JOB_ID}">
			<Components>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" required="True" caption="PROCEDURE NAME" wizardCaption="PROCEDURE NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1PROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" fieldSource="LISTING_NO" required="False" caption="LISTING NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1LISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_PARALLEL" fieldSource="IS_PARALLEL" required="True" caption="IS PARALLEL" wizardCaption="IS PARALLEL" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1IS_PARALLEL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARALLEL_DEGREE" fieldSource="PARALLEL_DEGREE" required="True" caption="PARALLEL DEGREE" wizardCaption="PARALLEL DEGREE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1PARALLEL_DEGREE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_FINISH" fieldSource="IS_FINISH" required="True" caption="IS FINISH" wizardCaption="IS FINISH" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1IS_FINISH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_JOB_TYPE_ID" fieldSource="P_JOB_TYPE_ID" required="True" caption="TYPE ID" wizardCaption="TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1P_JOB_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_CANCELLED_PROCESS" fieldSource="IS_CANCELLED_PROCESS" required="True" caption="IS CANCELLED PROCESS" wizardCaption="IS CANCELLED PROCESS" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1IS_CANCELLED_PROCESS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_REPROCESS" fieldSource="IS_REPROCESS" required="True" caption="IS REPROCESS" wizardCaption="IS REPROCESS" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1IS_REPROCESS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1PARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CANCEL_PARENT_ID" fieldSource="CANCEL_PARENT_ID" required="False" caption="CANCEL PARENT ID" wizardCaption="CANCEL PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1CANCEL_PARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CONTROL_TABLE_NAME" fieldSource="CONTROL_TABLE_NAME" required="False" caption="CONTROL TABLE NAME" wizardCaption="CONTROL TABLE NAME" wizardSize="38" wizardMaxLength="38" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1CONTROL_TABLE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_job1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_job1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="59" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_job1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="60"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="61" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_job1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_JOB_ID" fieldSource="P_JOB_ID" required="False" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1P_JOB_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_JOB_TYPE_NAME" fieldSource="P_JOB_TYPE_NAME" required="False" caption="P_JOB_TYPE_NAME" wizardCaption="TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_job1P_JOB_TYPE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="P_JOB_ID" parameterSource="P_JOB_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="140" parameterType="URL" variable="P_JOB_ID" dataType="Float" parameterSource="P_JOB_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="89" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="90" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="91" variable="LISTING_NO" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="LISTING_NO"/>
				<SQLParameter id="92" variable="IS_PARALLEL" parameterType="Control" dataType="Text" parameterSource="IS_PARALLEL"/>
				<SQLParameter id="93" variable="PARALLEL_DEGREE" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="PARALLEL_DEGREE"/>
				<SQLParameter id="94" variable="IS_FINISH" parameterType="Control" dataType="Text" parameterSource="IS_FINISH"/>
				<SQLParameter id="95" variable="P_JOB_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_TYPE_ID"/>
				<SQLParameter id="96" variable="IS_CANCELLED_PROCESS" parameterType="Control" dataType="Text" parameterSource="IS_CANCELLED_PROCESS"/>
				<SQLParameter id="97" variable="IS_REPROCESS" parameterType="Control" dataType="Text" parameterSource="IS_REPROCESS"/>
				<SQLParameter id="98" variable="PARENT_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="PARENT_ID"/>
				<SQLParameter id="99" variable="CANCEL_PARENT_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="CANCEL_PARENT_ID"/>
				<SQLParameter id="100" variable="CONTROL_TABLE_NAME" parameterType="Control" dataType="Text" parameterSource="CONTROL_TABLE_NAME"/>
				<SQLParameter id="101" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="103" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="72" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="73" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="74" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="75" field="IS_PARALLEL" dataType="Text" parameterType="Control" parameterSource="IS_PARALLEL"/>
				<CustomParameter id="76" field="PARALLEL_DEGREE" dataType="Float" parameterType="Control" parameterSource="PARALLEL_DEGREE"/>
				<CustomParameter id="77" field="IS_FINISH" dataType="Text" parameterType="Control" parameterSource="IS_FINISH"/>
				<CustomParameter id="78" field="P_JOB_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_JOB_TYPE_ID"/>
				<CustomParameter id="79" field="IS_CANCELLED_PROCESS" dataType="Text" parameterType="Control" parameterSource="IS_CANCELLED_PROCESS"/>
				<CustomParameter id="80" field="IS_REPROCESS" dataType="Text" parameterType="Control" parameterSource="IS_REPROCESS"/>
				<CustomParameter id="81" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="82" field="CANCEL_PARENT_ID" dataType="Float" parameterType="Control" parameterSource="CANCEL_PARENT_ID"/>
				<CustomParameter id="83" field="CONTROL_TABLE_NAME" dataType="Text" parameterType="Control" parameterSource="CONTROL_TABLE_NAME"/>
				<CustomParameter id="84" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="85" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="86" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="87" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="88" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="121" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="122" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="123" variable="LISTING_NO" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="LISTING_NO"/>
				<SQLParameter id="124" variable="IS_PARALLEL" parameterType="Control" dataType="Text" parameterSource="IS_PARALLEL"/>
				<SQLParameter id="125" variable="PARALLEL_DEGREE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PARALLEL_DEGREE"/>
				<SQLParameter id="126" variable="IS_FINISH" parameterType="Control" dataType="Text" parameterSource="IS_FINISH"/>
				<SQLParameter id="127" variable="P_JOB_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_TYPE_ID"/>
				<SQLParameter id="128" variable="IS_CANCELLED_PROCESS" parameterType="Control" dataType="Text" parameterSource="IS_CANCELLED_PROCESS"/>
				<SQLParameter id="129" variable="IS_REPROCESS" parameterType="Control" dataType="Text" parameterSource="IS_REPROCESS"/>
				<SQLParameter id="130" variable="PARENT_ID" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="PARENT_ID"/>
				<SQLParameter id="131" variable="CANCEL_PARENT_ID" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="CANCEL_PARENT_ID"/>
				<SQLParameter id="132" variable="CONTROL_TABLE_NAME" parameterType="Control" dataType="Text" parameterSource="CONTROL_TABLE_NAME"/>
				<SQLParameter id="133" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="134" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="136" variable="P_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="104" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="105" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="106" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="107" field="IS_PARALLEL" dataType="Text" parameterType="Control" parameterSource="IS_PARALLEL"/>
				<CustomParameter id="108" field="PARALLEL_DEGREE" dataType="Float" parameterType="Control" parameterSource="PARALLEL_DEGREE"/>
				<CustomParameter id="109" field="IS_FINISH" dataType="Text" parameterType="Control" parameterSource="IS_FINISH"/>
				<CustomParameter id="110" field="P_JOB_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_JOB_TYPE_ID"/>
				<CustomParameter id="111" field="IS_CANCELLED_PROCESS" dataType="Text" parameterType="Control" parameterSource="IS_CANCELLED_PROCESS"/>
				<CustomParameter id="112" field="IS_REPROCESS" dataType="Text" parameterType="Control" parameterSource="IS_REPROCESS"/>
				<CustomParameter id="113" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="114" field="CANCEL_PARENT_ID" dataType="Float" parameterType="Control" parameterSource="CANCEL_PARENT_ID"/>
				<CustomParameter id="115" field="CONTROL_TABLE_NAME" dataType="Text" parameterType="Control" parameterSource="CONTROL_TABLE_NAME"/>
				<CustomParameter id="116" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="117" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="118" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="119" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="120" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="137" variable="P_JOB_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_JOB_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Label id="143" fieldSourceType="DBColumn" dataType="Text" html="False" name="JOBTYPE_CODE" PathID="JOBTYPE_CODE">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_job.php" forShow="True" url="p_job.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_job_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="70"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="71"/>
			</Actions>
		</Event>
	</Events>
</Page>
