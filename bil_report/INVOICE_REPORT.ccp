<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_report" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="All" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="INVOICEREPORT_SEARCH" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="INVOICE_REPORT.ccp" PathID="INVOICEREPORT_SEARCH" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" connection="Conn" dataSource="V_INPUT_DATA_CONTROL_BILL" activeCollection="TableParameters">
			<Components>
				<TextBox id="393" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="Invoice_date" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHInvoice_date" fieldSource="INVOICE_DATE" format="dd/mm/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="394" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="bill_cycle_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHbill_cycle_code" fieldSource="BILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="395" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="finance_period_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHfinance_period_code" fieldSource="FINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="396" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INPUT_DATA_CONTROL_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHINPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="INVOICEREPORT_SEARCHButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="405" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NO" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHACCOUNT_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="406" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ACCOUNT_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="INVOICEREPORT_SEARCHCUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="398" conditionType="Parameter" useIsNull="False" field="INPUT_DATA_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="INPUT_DATA_CONTROL_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="397" tableName="V_INPUT_DATA_CONTROL_BILL" schemaName="BILLDB" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
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
		<CodeFile id="Events" language="PHPTemplates" name="INVOICE_REPORT_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="INVOICE_REPORT.php" forShow="True" url="INVOICE_REPORT.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="57"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="129"/>
			</Actions>
		</Event>
	</Events>
</Page>
