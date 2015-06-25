<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="2" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_app_user" dataSource="SELECT * 
FROM p_app_user
WHERE p_app_user_id = {p_app_user_id} " errorSummator="Error" wizardCaption="Add/Edit P App User " wizardFormMethod="post" PathID="p_app_user" activeCollection="USQLParameters" parameterTypeListName="ParameterTypeList" customInsertType="SQL" customInsert="t" customUpdateType="SQL" customUpdate="update hms.p_app_user set user_pwd=md5('{new_pwd1}') where p_app_user_id = {p_app_user_id} " customDeleteType="SQL" customDelete="t" pasteActions="pasteActions">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_app_userButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_name" fieldSource="user_name" required="False" caption="User Name" wizardCaption="User Name" wizardSize="50" wizardMaxLength="96" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_app_useruser_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="new_pwd1" PathID="p_app_usernew_pwd1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="new_pwd2" PathID="p_app_usernew_pwd2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="old_pwd" PathID="p_app_userold_pwd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_pwd" fieldSource="user_pwd" required="True" caption="User Pwd" wizardCaption="User Pwd" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_app_useruser_pwd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="p_app_user_id" PathID="p_app_userp_app_user_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="p_app_userGridPage" PathID="p_app_userp_app_userGridPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_id" PathID="p_app_useruser_id" fieldSource="user_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="4" conditionType="Parameter" useIsNull="False" field="p_app_user_id" parameterSource="p_app_user_id" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="8" parameterType="URL" variable="p_app_user_id" dataType="Float" parameterSource="p_app_user_id" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="7" tableName="p_app_user" posLeft="10" posTop="10" posWidth="120" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="13" variable="new_pwd1" parameterType="Control" dataType="Text" parameterSource="new_pwd1"/>
				<SQLParameter id="16" variable="old_pwd" parameterType="Control" dataType="Text" parameterSource="old_pwd"/>
				<SQLParameter id="17" variable="user_pwd" parameterType="Control" dataType="Text" parameterSource="user_pwd"/>
				<SQLParameter id="18" variable="p_app_user_id" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="p_app_user_id"/>
				<SQLParameter id="19" variable="new_pwd2" parameterType="Control" dataType="Text" parameterSource="new_pwd2"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="11" field="user_name" dataType="Text" parameterType="Control" parameterSource="user_name"/>
				<CustomParameter id="12" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="user_pwd"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="user_password.php" forShow="True" url="user_password.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
