<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="trb" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Label id="139" fieldSourceType="DBColumn" dataType="Text" html="False" name="role_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="role_code" defaultValue="CCGetFromGet(&quot;ROLE_CODE&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="140" fieldSourceType="DBColumn" dataType="Text" html="False" name="appl_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="appl_code" defaultValue="CCGetFromGet(&quot;APPL_CODE&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<EditableGrid id="141" urlType="Relative" secured="False" emptyRows="1" allowInsert="True" allowUpdate="False" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="50" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" dataSource="V_P_ROLE_MENU" name="P_ROLMENGrid" pageSizeLimit="100" wizardCaption=" V P ROLE MENU " wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" PathID="P_ROLMENGrid" deleteControl="CheckBox_Delete" customInsertType="Procedure" parameterTypeListName="CustomTableParameterTypeList" customInsert="PACK_ROLE_MENU.ADD_ROLE_MENU" activeCollection="TableParameters" customDeleteType="Procedure" customDelete="PACK_ROLE_MENU.DEL_ROLE_MENU" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<ListBox id="145" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Float" returnValueType="Number" name="P_MENU_ID" fieldSource="P_MENU_ID" required="False" caption="P MENU ID" wizardCaption="P MENU ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLMENGridP_MENU_ID" connection="Conn" dataSource="V_P_MENU_TREE" boundColumn="P_MENU_ID" textColumn="CODE" activeCollection="TableParameters">
					<Components/>
					<Events/>
					<TableParameters>
						<TableParameter id="155" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_APPLICATION_ID"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="162" tableName="V_P_MENU_TREE" posLeft="10" posTop="10" posWidth="126" posHeight="136"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Label id="146" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ROLMENGridCREATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="147" fieldSourceType="DBColumn" dataType="Text" html="False" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ROLMENGridCREATED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="148" visible="True" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="149" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardAddNbsp="True" PathID="P_ROLMENGridCheckBox_Delete_PanelCheckBox_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Navigator id="150" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Trb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="151" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_ROLMENGridButton_Submit">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="152" message="Submit?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="153" urlType="Relative" enableValidation="False" isDefault="False" name="Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_ROLMENGridCancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="144" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_ID" fieldSource="P_ROLE_ID" required="True" caption="P ROLE ID" wizardCaption="P ROLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLMENGridP_ROLE_ID" defaultValue="CCGetFromGet(&quot;P_ROLE_ID&quot;, NULL)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="143" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_MENU_ID" fieldSource="P_ROLE_MENU_ID" required="False" caption="P ROLE MENU ID" wizardCaption="P ROLE MENU ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLMENGridP_ROLE_MENU_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="160" conditionType="Parameter" useIsNull="False" field="P_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_ROLE_ID"/>
				<TableParameter id="161" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_APPLICATION_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="159" tableName="V_P_ROLE_MENU" posLeft="10" posTop="10" posWidth="153" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="142" tableName="V_P_ROLE_MENU" fieldName="P_ROLE_MENU_ID" dataType="Float"/>
			</PKFields>
			<ISPParameters>
				<SPParameter id="Key160" parameterName="I_ROLE_ID" parameterSource="P_ROLE_ID" dataType="Double" parameterType="Control" dataSize="0" direction="Input" scale="0" precision="0"/>
				<SPParameter id="Key161" parameterName="I_MENU_ID" parameterSource="P_MENU_ID" dataType="Double" parameterType="Control" dataSize="0" direction="Input" scale="0" precision="0"/>
				<SPParameter id="Key162" parameterName="I_USER" parameterSource="UserName" dataType="Char" parameterType="Session" dataSize="4000" direction="Input" scale="0" precision="0"/>
			</ISPParameters>
			<ISQLParameters/>
			<IFormElements>
				<CustomParameter id="156" field="P_ROLE_MENU_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_MENU_ID"/>
				<CustomParameter id="157" field="P_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
				<CustomParameter id="158" field="P_MENU_ID" dataType="Float" parameterType="Control" parameterSource="P_MENU_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters>
				<SPParameter id="Key160" parameterName="I_ROLE_MENU_ID" parameterSource="P_ROLE_MENU_ID" dataType="Double" parameterType="Control" dataSize="0" direction="Input" scale="0" precision="0"/>
			</DSPParameters>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="3" language="VB" name="p_app_role_menu.aspx" forShow="True" url="p_app_role_menu.aspx" comment="&lt;!--" commentEnd="--&gt;" codePage="windows-1252"/>
		<CodeFile id="1" language="VB" name="p_app_role_menu.aspx.vb" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="2" language="VB" name="p_role_menuDataProvider.vb" path="..\App_Code\.\Param" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_menu.php" forShow="True" url="p_role_menu.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
	</Events>
</Page>
