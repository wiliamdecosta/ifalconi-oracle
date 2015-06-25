<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\pay_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT a.*
FROM ifp.p_bank a
WHERE
upper(a.code) like upper('%{s_keyword}%') OR
upper(a.description) like upper('%{s_keyword}%')
" name="GRID" orderBy="P_COMPANY_ID" pageSizeLimit="100" wizardCaption=" P COMPANY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="code" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="description" fieldSource="description" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDdescription">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="60" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="GRID_Insert" hrefSource="P_BANK.ccp" removeParameters="p_bank_id" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="GRIDGRID_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="53" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="85" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="119" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="GRIDDLink" hrefSource="P_BANK.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="196" sourceType="DataField" name="p_bank_id" source="p_bank_id"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="121" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="GRIDADLink" hrefSource="P_BANK.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH" fieldSource="p_bank_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="197" sourceType="DataField" name="p_bank_id" source="p_bank_id"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_bank_id" fieldSource="p_bank_id" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="P_BANK.ccp" wizardThemeItem="GridA" PathID="GRIDp_bank_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="29" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="123" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="124"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="COMPANY_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="P_COMPANY_TYPE_ID" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="ZIP_CODE" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="160" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GRIDSearch" wizardCaption=" P COMPANY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="P_BANK.ccp" PathID="GRIDSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="GRIDSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="GRIDSearchButton_DoSearch">
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
		<Record id="61" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="FORM" errorSummator="Error" wizardCaption=" P Company " wizardFormMethod="post" PathID="FORM" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DConditions" customUpdateType="SQL" customDeleteType="SQL" dataSource="ifp.p_bank" returnPage="P_BANK.ccp" customInsert="INSERT into ifp.p_bank(
code, 
description, 
create_by, 
update_by,
create_date, 
update_date, 
p_bank_id
)VALUES(
upper('{Code}'), 
'{Description}', 
'{CREATED_BY}', 
'{UPDATED_BY}', 
current_date,
current_date,
(select COALESCE(NULLIF(MAX(p_bank_id) ,0),0)+1 from ifp.p_bank)
)" customUpdate="UPDATE ifp.p_bank 
SET 
code=upper('{Code}'), 
description='{Description}', 
update_by='{UPDATED_BY}',  
update_date=current_date, 
p_bank_id={p_bank_id} 
WHERE  p_bank_id = {p_bank_id}" activeTableType="customDelete" customDelete="DELETE FROM ifp.p_bank WHERE  p_bank_id = {p_bank_id}">
			<Components>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Code" fieldSource="code" required="True" caption="Code" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMCode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="78" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Description" fieldSource="description" required="False" caption="Description" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMDescription">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="create_by" required="True" caption="CREATED_BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMCREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="update_by" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMUPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="create_date" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMCREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="update_date" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMUPDATED_DATE" defaultValue="date(&quot;d-M-Y&quot;)" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="86" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="FORMButton_Insert" removeParameters="FLAG;TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="87" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="FORMButton_Update" removeParameters="FLAG;TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="88" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="FORMButton_Delete" removeParameters="FLAG;TAMBAH;s_keyword;p_bank_id">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="89"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="90" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="FORMButton_Cancel" removeParameters="FLAG;TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_bank_id" fieldSource="p_bank_id" required="False" caption="p_bank_id" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMp_bank_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="163" conditionType="Parameter" useIsNull="False" field="p_bank_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_bank_id"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="161" parameterType="URL" variable="P_COMPANY_ID" dataType="Float" parameterSource="P_COMPANY_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="198" tableName="ifp.p_bank" posLeft="10" posTop="10" posWidth="20" posHeight="40"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="180" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
				<SQLParameter id="181" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
				<SQLParameter id="182" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="183" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="184" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="185" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="186" variable="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="164" field="code" dataType="Text" parameterType="Control" parameterSource="Code" omitIfEmpty="True"/>
				<CustomParameter id="165" field="description" dataType="Text" parameterType="Control" parameterSource="Description" omitIfEmpty="True"/>
				<CustomParameter id="166" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="167" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="168" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="169" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="170" field="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="187" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
				<SQLParameter id="188" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
				<SQLParameter id="189" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="190" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="191" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="192" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="193" variable="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id"/>
				<SQLParameter id="194" variable="Expr0" parameterType="URL" dataType="Float" parameterSource="P_BANK_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="171" conditionType="Parameter" useIsNull="False" field="p_bank_id" dataType="Float" parameterType="Expression" searchConditionType="Equal" logicOperator="And" parameterSource="$keyId"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="172" field="code" dataType="Text" parameterType="Control" parameterSource="Code" omitIfEmpty="True"/>
				<CustomParameter id="173" field="description" dataType="Text" parameterType="Control" parameterSource="Description" omitIfEmpty="True"/>
				<CustomParameter id="174" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="175" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="176" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="177" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="178" field="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="199" variable="p_bank_id" parameterType="Control" dataType="Float" parameterSource="p_bank_id" defaultValue="0"/>
</DSQLParameters>
			<DConditions>
				<TableParameter id="179" conditionType="Parameter" useIsNull="False" field="p_bank_id" dataType="Float" parameterType="Control" searchConditionType="Equal" logicOperator="And" parameterSource="p_bank_id"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="P_BANK_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="P_BANK.php" forShow="True" url="P_BANK.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="125"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="126"/>
			</Actions>
		</Event>
	</Events>
</Page>
