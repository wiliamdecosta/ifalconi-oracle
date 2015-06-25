<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0" wizardTheme="trb" wizardThemeVersion="3.0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="DAEMONForm" dataSource="V_DAEMON" errorSummator="Error" wizardCaption=" V USER JOBS " wizardFormMethod="post" PathID="DAEMONForm" activeCollection="TableParameters" customInsert="PACK_BACKGROUND_SCHEDULER.START_DAEMON" customInsertType="Procedure" customDeleteType="Procedure" customDelete="PACK_BACKGROUND_SCHEDULER.STOP_DAEMON" pasteActions="pasteActions" customUpdateType="Procedure" customUpdate="PACK_BACKGROUND_SCHEDULER.FORCE_SCHEDULER">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Insert" PathID="DAEMONFormButton_Insert" operation="Insert">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="15" message="Start Daemon?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="4" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="DAEMONFormButton_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="5" message="Stop Daemon?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" required="False" caption="PROCEDURE NAME" wizardCaption="PROCEDURE NAME" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="DAEMONFormPROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SCHEMA_USER" fieldSource="SCHEMA_USER" required="True" caption="SCHEMA USER" wizardCaption="SCHEMA USER" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="DAEMONFormSCHEMA_USER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="LAST_DATE" fieldSource="LAST_DATE" required="False" caption="LAST DATE" wizardCaption="LAST DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="DAEMONFormLAST_DATE" format="dd-mmm-yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="NEXT_DATE" fieldSource="NEXT_DATE" required="True" caption="NEXT DATE" wizardCaption="NEXT DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="DAEMONFormNEXT_DATE" format="dd-mmm-yyyy HH:nn:ss">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="13" fieldSourceType="DBColumn" dataType="Float" name="JOB" fieldSource="JOB" required="True" caption="JOB" wizardCaption="JOB" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="DAEMONFormJOB">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="21" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Refresh" operation="Cancel" PathID="DAEMONFormButton_Refresh">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="22" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" PathID="DAEMONFormButton_Update" operation="Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="23" message="Force Proses?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="29" tableName="V_DAEMON" posLeft="10" posTop="10" posWidth="153" posHeight="168"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters>
				<SPParameter id="Key22" parameterName="RETURN_VALUE" parameterSource="RETURN_VALUE" dataType="Char" parameterType="URL" dataSize="4000" direction="ReturnValue" scale="0" precision="0"/>
			</ISPParameters>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="16" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="17" field="SCHEMA_USER" dataType="Text" parameterType="Control" parameterSource="SCHEMA_USER"/>
				<CustomParameter id="18" field="LAST_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_DATE"/>
				<CustomParameter id="19" field="NEXT_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_DATE"/>
				<CustomParameter id="20" field="JOB" dataType="Float" parameterType="Control" parameterSource="JOB"/>
			</IFormElements>
			<USPParameters>
				<SPParameter id="Key30" parameterName="RETURN_VALUE" parameterSource="RETURN_VALUE" dataType="Char" parameterType="URL" dataSize="4000" direction="ReturnValue" scale="0" precision="0"/>
			</USPParameters>
			<USQLParameters/>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="24" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="25" field="SCHEMA_USER" dataType="Text" parameterType="Control" parameterSource="SCHEMA_USER"/>
				<CustomParameter id="26" field="LAST_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_DATE" format="dd-mmm-yyyy HH:nn:ss"/>
				<CustomParameter id="27" field="NEXT_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_DATE" format="dd-mmm-yyyy HH:nn:ss"/>
				<CustomParameter id="28" field="JOB" dataType="Float" parameterType="Control" parameterSource="JOB"/>
			</UFormElements>
			<DSPParameters>
				<SPParameter id="Key22" parameterName="RETURN_VALUE" parameterSource="RETURN_VALUE" dataType="Char" parameterType="URL" dataSize="4000" direction="ReturnValue" scale="0" precision="0"/>
			</DSPParameters>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="ASPTemplates" name="v_user_job_maint.asp" comment="'" forShow="True" url="v_user_job_maint.asp"/>
		<CodeFile id="Code" language="PHPTemplates" name="daemon_manager.php" forShow="True" url="daemon_manager.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<Events/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
</Page>
