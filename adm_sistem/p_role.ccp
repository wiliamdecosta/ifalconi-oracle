<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="5" connection="Conn" name="P_ROLEGrid" pageSizeLimit="100" wizardCaption="List of P APP ROLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" dataSource="P_ROLE" activeCollection="TableParameters">
			<Components>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ROLEGridCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_ROLEGridDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="18" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="179"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_ROLEGridDLink" hrefSource="p_role.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="124" sourceType="DataField" name="P_ROLE_ID" source="P_ROLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_ROLE_Insert" hrefSource="p_role.ccp" removeParameters="P_ROLE_ID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_ROLEGridP_ROLE_Insert">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="176" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="180" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_ROLEGridP_ROLE_ID" fieldSource="P_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="51" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="174" conditionType="Parameter" useIsNull="False" field="CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
				<TableParameter id="175" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="173" tableName="P_ROLE" posLeft="10" posTop="10" posWidth="131" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="All" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_ROLESearch" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_role.ccp" PathID="P_ROLESearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_ROLESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_ROLESearchButton_DoSearch" removeParameters="P_APP_ROLE_ID;TAMBAH">
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
		<Record id="19" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_ROLEForm" errorSummator="Error" wizardCaption="Add/Edit P APP ROLE " wizardFormMethod="post" PathID="P_ROLEForm" activeCollection="DSQLParameters" customInsertType="SQL" customUpdateType="SQL" customDeleteType="SQL" customDelete="DELETE FROM P_ROLE WHERE P_ROLE_ID = {P_ROLE_ID}" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" customInsert="INSERT INTO P_ROLE(CODE, IS_ACTIVE, DESCRIPTION, CREATED_BY, CREATION_DATE, UPDATED_DATE, UPDATED_BY, P_ROLE_ID) 
VALUES(UPPER('{CODE}'), '{IS_ACTIVE}', '{DESCRIPTION}', '{CREATED_BY}', sysdate, sysdate, '{UPDATED_BY}', generate_id('','P_ROLE','P_ROLE_ID'))" customUpdate="UPDATE P_ROLE SET CODE=UPPER('{CODE}'), IS_ACTIVE='{IS_ACTIVE}', DESCRIPTION='{DESCRIPTION}', UPDATED_DATE=sysdate, UPDATED_BY='{UPDATED_BY}' WHERE  P_ROLE_ID = {P_ROLE_ID}" dataSource="P_ROLE">
			<Components>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_ROLEFormButton_Insert" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="21" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_ROLEFormButton_Update" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="22" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_ROLEFormButton_Delete" removeParameters="FLAG;P_APP_ROLE_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="23" message="Hapus Record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="24" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_ROLEFormButton_Cancel" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="Role" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_ACTIVE" fieldSource="IS_ACTIVE" required="True" caption="Awal Masa Berlaku" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormIS_ACTIVE" defaultValue="&quot;Y&quot;" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="TIDAK AKTIF" dataSource="Y;AKTIF;N;TIDAK AKTIF">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextArea id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormCREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="False" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormCREATION_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="False" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormUPDATED_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_ROLEFormUPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="181" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_ROLEFormP_ROLE_ID" fieldSource="P_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
			</Events>
			<TableParameters>
				<TableParameter id="178" conditionType="Parameter" useIsNull="False" field="P_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_ROLE_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="177" tableName="P_ROLE" posLeft="10" posTop="10" posWidth="131" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="150" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="151" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<SQLParameter id="152" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="153" variable="CREATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="156" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="142" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
				<CustomParameter id="143" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE" omitIfEmpty="True"/>
				<CustomParameter id="144" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="145" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="146" field="CREATION_DATE" dataType="Text" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="147" field="UPDATED_DATE" dataType="Text" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="148" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="149" field="P_APP_ROLE_ID" dataType="Text" parameterType="Control" parameterSource="P_APP_ROLE_ID" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters>
				<SPParameter id="Key132" parameterName="i_afr_task_rule_id" parameterSource="i_afr_task_rule_id" dataType="Numeric" parameterType="URL" dataSize="28" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key133" parameterName="i_detail_afr_request_id" parameterSource="i_detail_afr_request_id" dataType="Numeric" parameterType="URL" dataSize="28" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key134" parameterName="i_user" parameterSource="i_user" dataType="Char" parameterType="URL" dataSize="255" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key135" parameterName="o_result_code" parameterSource="o_result_code" dataType="Char" parameterType="URL" dataSize="255" direction="Output" scale="10" precision="6"/>
				<SPParameter id="Key136" parameterName="o_result_msg" parameterSource="o_result_msg" dataType="Char" parameterType="URL" dataSize="255" direction="Output" scale="10" precision="6"/>
			</USPParameters>
			<USQLParameters>
				<SQLParameter id="166" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="167" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<SQLParameter id="168" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="170" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="171" variable="P_ROLE_ID" parameterType="Control" dataType="Float" parameterSource="P_ROLE_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="165" conditionType="Parameter" useIsNull="False" field="P_APP_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="P_APP_ROLE_ID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="157" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
				<CustomParameter id="158" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE" omitIfEmpty="True"/>
				<CustomParameter id="159" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="162" field="UPDATED_DATE" dataType="Text" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="163" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="133" variable="P_ROLE_ID" parameterType="Control" dataType="Float" parameterSource="P_ROLE_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="P_APP_ROLE_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_ROLE_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="3" language="VB" name="p_app_role.aspx" forShow="True" url="p_app_role.aspx" comment="&lt;!--" commentEnd="--&gt;" codePage="windows-1252"/>
		<CodeFile id="1" language="VB" name="p_app_role.aspx.vb" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="2" language="VB" name="p_roleDataProvider.vb" path="..\App_Code\.\param" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_role_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role.php" forShow="True" url="p_role.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="172"/>
			</Actions>
		</Event>
	</Events>
</Page>
