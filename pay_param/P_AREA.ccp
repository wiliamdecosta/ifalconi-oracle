<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\pay_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT a.*
FROM ifp.p_area a
WHERE (
upper(a.code) like upper('%{s_keyword}%') OR
upper(a.description) like upper('%{s_keyword}%')
)" name="GRID" orderBy="P_COMPANY_ID" pageSizeLimit="100" wizardCaption=" P COMPANY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="GRID_Insert" hrefSource="P_AREA.ccp" removeParameters="p_area_id" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="GRIDGRID_Insert">
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
				<Link id="119" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="GRIDDLink" hrefSource="P_AREA.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="196" sourceType="DataField" name="p_area_id" source="p_area_id"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="121" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="GRIDADLink" hrefSource="P_AREA.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="197" sourceType="DataField" name="p_area_id" source="p_area_id"/>
</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_area_id" fieldSource="p_area_id" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="P_AREA.ccp" wizardThemeItem="GridA" PathID="GRIDp_area_id">
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
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GRIDSearch" wizardCaption=" P COMPANY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="P_AREA.ccp" PathID="GRIDSearch" pasteActions="pasteActions">
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
		<Record id="61" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="FORM" errorSummator="Error" wizardCaption=" P Company " wizardFormMethod="post" PathID="FORM" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customUpdateType="SQL" customDeleteType="SQL" returnPage="P_AREA.ccp" dataSource="p_area" customDelete="DELETE FROM ifp.p_area WHERE  p_area_id = {p_area_id}" activeTableType="customDelete" customUpdate="UPDATE ifp.p_area 
SET 
code=upper('{Code}'), 
description='{Description}', 
update_by='{UPDATED_BY}',  
update_date=current_date, 
p_area_id={p_area_id} WHERE  p_area_id = {p_area_id}" customInsert="INSERT INTO ifp.p_area(code, description, create_by, update_by, create_date, update_date, p_area_id) VALUES(upper('{Code}'), '{Description}', '{CREATED_BY}', '{UPDATED_BY}', current_date, current_date, (select coalesce(nullif(max(p_area_id),0),0)+1 from ifp.p_area))">
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
				<Button id="88" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="FORMButton_Delete" removeParameters="FLAG;TAMBAH;s_keyword;p_area_id">
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
				<Hidden id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_area_id" fieldSource="p_area_id" required="False" caption="p_area_id" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMp_area_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="199" conditionType="Parameter" useIsNull="False" field="p_area_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_area_id"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="161" parameterType="URL" variable="P_COMPANY_ID" dataType="Float" parameterSource="P_COMPANY_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="198" tableName="p_area" schemaName="ifp" posLeft="10" posTop="10" posWidth="115" posHeight="168"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="224" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
<SQLParameter id="225" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
<SQLParameter id="226" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<SQLParameter id="227" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<SQLParameter id="228" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="229" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="230" variable="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="217" field="code" dataType="Text" parameterType="Control" parameterSource="Code"/>
<CustomParameter id="218" field="description" dataType="Text" parameterType="Control" parameterSource="Description"/>
<CustomParameter id="219" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="220" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="221" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="222" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="223" field="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="210" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
<SQLParameter id="211" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
<SQLParameter id="212" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<SQLParameter id="213" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<SQLParameter id="214" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="215" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="216" variable="p_area_id" dataType="Float" parameterType="URL" parameterSource="p_area_id" defaultValue="0"/>
</USQLParameters>
			<UConditions>
				<TableParameter id="202" conditionType="Parameter" useIsNull="False" field="p_area_id" dataType="Float" parameterType="URL" parameterSource="p_area_id" searchConditionType="Equal" logicOperator="And"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="203" field="code" dataType="Text" parameterType="Control" parameterSource="Code"/>
<CustomParameter id="204" field="description" dataType="Text" parameterType="Control" parameterSource="Description"/>
<CustomParameter id="205" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="206" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="207" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="208" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="209" field="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="201" variable="p_area_id" parameterType="URL" dataType="Float" parameterSource="p_area_id" defaultValue="0"/>
</DSQLParameters>
			<DConditions>
				<TableParameter id="200" conditionType="Parameter" useIsNull="False" field="p_area_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" parameterSource="p_area_id"/>
</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="P_AREA_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="P_AREA.php" forShow="True" url="P_AREA.php" comment="//" codePage="windows-1252"/>
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
