<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0" wizardTheme="trb" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="V_USER_JOBS" name="BACKJOBGrid" orderBy="JOB_CONTROL_ID" pageSizeLimit="100" wizardCaption=" V USER JOBS " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="-" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" wizardCaption="PROCEDURE NAME" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="BACKJOBGridPROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="7" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Trb">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="12"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Hidden id="5" fieldSourceType="DBColumn" dataType="Float" html="False" name="JOB" fieldSource="JOB" wizardCaption="JOB" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="BACKJOBGridJOB">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="4" fieldSourceType="DBColumn" dataType="Float" html="False" name="JOB_CONTROL_ID" fieldSource="JOB_CONTROL_ID" wizardCaption="JOB CONTROL ID" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="BACKJOBGridJOB_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="BACKJOBGridDLink" hrefSource="background_job.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="10" sourceType="DataField" name="JOB_CONTROL_ID" source="JOB_CONTROL_ID"/>
						<LinkParameter id="21" sourceType="DataField" name="JOB" source="JOB"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="3" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="13" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="100" connection="Conn" dataSource="LOG_BACKGROUND_JOB" name="LOGJOBGrid" orderBy="COUNTER_NO" pageSizeLimit="100" wizardCaption=" LOG BACKGROUND JOB " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="-" activeCollection="TableParameters">
			<Components>
				<Label id="14" fieldSourceType="DBColumn" dataType="Float" html="False" name="COUNTER_NO" fieldSource="COUNTER_NO" wizardCaption="COUNTER NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="False" PathID="LOGJOBGridCOUNTER_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Date" html="False" name="LOG_DATE" fieldSource="LOG_DATE" wizardCaption="LOG DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="LOGJOBGridLOG_DATE" format="dd-mmm-yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="16" fieldSourceType="DBColumn" dataType="Text" html="False" name="LOG_MESSAGE" fieldSource="LOG_MESSAGE" wizardCaption="LOG MESSAGE" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="LOGJOBGridLOG_MESSAGE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="17" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Trb">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="20"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="JOB_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="JOB_CONTROL_ID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="18" tableName="LOG_BACKGROUND_JOB" posLeft="10" posTop="10" posWidth="122" posHeight="120"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="ForceForm" actionPage="background_job" errorSummator="Error" wizardFormMethod="post" PathID="ForceForm" pasteActions="pasteActions">
<Components>
<Button id="28" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Force" PathID="ForceFormButton_Force" operation="Cancel">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="29" message="Force Proses?" eventType="Client"/>
							</Actions>
						</Event>
						<Event name="OnClick" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="30"/>
</Actions>
</Event>
</Events>
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
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="background_job.php" forShow="True" url="background_job.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="background_job_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="11"/>
			</Actions>
		</Event>
	</Events>
	<CachingParameters/>
	<Attributes/>
	<Features/>
</Page>
