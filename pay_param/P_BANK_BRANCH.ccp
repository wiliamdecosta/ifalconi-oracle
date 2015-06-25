<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\pay_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT a.*
FROM ifp.V_P_BANK_BRANCH a
WHERE (
upper(a.code) like upper('%{s_keyword}%') OR
upper(a.BANK_NAME) like upper('%{s_keyword}%') OR
upper(a.AREA_NAME) like upper('%{s_keyword}%') OR
upper(a.address) like upper('%{s_keyword}%') OR
upper(a.loket_no) like upper('%{s_keyword}%') OR
upper(a.locket_type_char) like upper('%{s_keyword}%') OR
upper(a.description) like upper('%{s_keyword}%')
)" name="GRID" orderBy="P_COMPANY_ID" pageSizeLimit="100" wizardCaption=" P COMPANY " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="code" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="loket_no" fieldSource="loket_no" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDloket_no">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="GRID_Insert" hrefSource="P_BANK_BRANCH.ccp" removeParameters="p_bank_branch_id" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="GRIDGRID_Insert">
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
				<Link id="119" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="GRIDDLink" hrefSource="P_BANK_BRANCH.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH" fieldSource="p_bank_branch_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="272" sourceType="DataField" name="p_bank_branch_id" source="p_bank_branch_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="121" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="GRIDADLink" hrefSource="P_BANK_BRANCH.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;TAMBAH" fieldSource="p_bank_branch_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="273" sourceType="DataField" name="p_bank_branch_id" source="p_bank_branch_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_bank_branch_id" fieldSource="p_bank_branch_id" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="P_BANK_BRANCH.ccp" wizardThemeItem="GridA" PathID="GRIDp_bank_branch_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="29" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="196" fieldSourceType="DBColumn" dataType="Text" html="False" name="bank_name" fieldSource="bank_name" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDbank_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="197" fieldSourceType="DBColumn" dataType="Text" html="False" name="area_name" fieldSource="area_name" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDarea_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="198" fieldSourceType="DBColumn" dataType="Text" html="False" name="address" fieldSource="address" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDaddress">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="199" fieldSourceType="DBColumn" dataType="Text" html="False" name="locket_type_char" fieldSource="locket_type_char" wizardCaption="COMPANY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="GRIDlocket_type_char">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="200" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_bank_id" fieldSource="p_bank_id" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="P_BANK_BRANCH.ccp" wizardThemeItem="GridA" PathID="GRIDp_bank_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="201" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="202" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_area_id" fieldSource="p_area_id" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="P_BANK_BRANCH.ccp" wizardThemeItem="GridA" PathID="GRIDp_area_id">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="203" sourceType="DataField" format="yyyy-mm-dd" name="P_COMPANY_ID" source="P_COMPANY_ID"/>
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
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="GRIDSearch" wizardCaption=" P COMPANY " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="P_BANK_BRANCH.ccp" PathID="GRIDSearch" pasteActions="pasteActions">
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
		<Record id="61" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="FORM" errorSummator="Error" wizardCaption=" P Company " wizardFormMethod="post" PathID="FORM" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customUpdateType="SQL" customDeleteType="SQL" returnPage="P_BANK_BRANCH.ccp" dataSource="ifp.v_p_bank_branch" customInsert="INSERT INTO ifp.p_bank_branch(code, 
description, 
create_by, 
update_by, 
create_date, 
update_date, 
p_bank_branch_id, 
p_bank_id, 
p_area_id, 
address, 
loket_no, 
loket_type,
max_user,
status) VALUES(upper('{Code}'), 
'{Description}', 
'{CREATED_BY}', 
'{UPDATED_BY}', 
current_date, 
current_date, 
(select COALESCE(NULLIF(MAX(p_bank_branch_id) ,0),0)+1 from ifp.p_bank_branch),
{p_bank_id}, 
{p_area_id}, 
'{address}', 
'{loket_no}', 
'{loket_type}',
null,
1)" customUpdate="UPDATE ifp.p_bank_branch 
SET 
code=upper('{Code}'), 
description='{Description}', 
update_by='{UPDATED_BY}',  
update_date='{UPDATED_DATE}',
p_bank_id={p_bank_id}, 
p_area_id={p_area_id}, 
address='{address}', 
loket_no='{loket_no}', 
loket_type='{loket_type}'
WHERE  p_bank_branch_id = {p_bank_branch_id}" activeTableType="customUpdate" customDelete="DELETE FROM ifp.p_bank_branch WHERE  p_bank_branch_id = {p_bank_branch_id}">
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
				<Button id="88" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="FORMButton_Delete" removeParameters="FLAG;TAMBAH;s_keyword;p_bank_branch_id">
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
				<Hidden id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_bank_branch_id" fieldSource="p_bank_branch_id" required="False" caption="p_bank_branch_id" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMp_bank_branch_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="206" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="bank_name" fieldSource="bank_name" required="False" caption="bank_name" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMbank_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="207" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_bank_id" fieldSource="p_bank_id" required="True" caption="bank_name" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMp_bank_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="208" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="area_name" fieldSource="area_name" caption="area_name" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMarea_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="209" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_area_id" fieldSource="p_area_id" required="False" caption="p_area_id" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMp_area_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="210" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="address" fieldSource="address" required="False" caption="address" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMaddress">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="211" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="loket_no" fieldSource="loket_no" required="True" caption="Locket No." wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMloket_no">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="212" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="loket_type" fieldSource="loket_type" caption="loket_type" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FORMloket_type" sourceType="ListOfValues" connection="Conn" _valueOfList="3" _nameOfList="WEB" dataSource="1;H2H;2;P2H;3;WEB">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="205" conditionType="Parameter" useIsNull="False" field="p_bank_branch_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_bank_branch_id"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="161" parameterType="URL" variable="P_COMPANY_ID" dataType="Float" parameterSource="P_COMPANY_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="204" tableName="v_p_bank_branch" schemaName="ifp" posLeft="10" posTop="10" posWidth="139" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="243" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
				<SQLParameter id="244" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
				<SQLParameter id="245" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="246" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="247" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="248" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="249" variable="p_bank_branch_id" dataType="Float" parameterType="Control" parameterSource="p_bank_branch_id"/>
				<SQLParameter id="250" variable="bank_name" dataType="Text" parameterType="Control" parameterSource="bank_name"/>
				<SQLParameter id="251" variable="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id"/>
				<SQLParameter id="252" variable="area_name" dataType="Text" parameterType="Control" parameterSource="area_name"/>
				<SQLParameter id="253" variable="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id"/>
				<SQLParameter id="254" variable="address" dataType="Text" parameterType="Control" parameterSource="address"/>
				<SQLParameter id="255" variable="loket_no" dataType="Text" parameterType="Control" parameterSource="loket_no"/>
				<SQLParameter id="256" variable="loket_type" dataType="Text" parameterType="Control" parameterSource="loket_type"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="213" field="code" dataType="Text" parameterType="Control" parameterSource="Code" omitIfEmpty="True"/>
				<CustomParameter id="214" field="description" dataType="Text" parameterType="Control" parameterSource="Description" omitIfEmpty="True"/>
				<CustomParameter id="215" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="216" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="217" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="218" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="219" field="p_bank_branch_id" dataType="Float" parameterType="Control" parameterSource="p_bank_branch_id" omitIfEmpty="True"/>
				<CustomParameter id="220" field="bank_name" dataType="Text" parameterType="Control" parameterSource="bank_name" omitIfEmpty="True"/>
				<CustomParameter id="221" field="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id" omitIfEmpty="True"/>
				<CustomParameter id="222" field="area_name" dataType="Text" parameterType="Control" parameterSource="area_name" omitIfEmpty="True"/>
				<CustomParameter id="223" field="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id" omitIfEmpty="True"/>
				<CustomParameter id="224" field="address" dataType="Text" parameterType="Control" parameterSource="address" omitIfEmpty="True"/>
				<CustomParameter id="225" field="loket_no" dataType="Text" parameterType="Control" parameterSource="loket_no" omitIfEmpty="True"/>
				<CustomParameter id="226" field="loket_type" dataType="Text" parameterType="Control" parameterSource="loket_type" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="257" variable="Code" dataType="Text" parameterType="Control" parameterSource="Code"/>
				<SQLParameter id="258" variable="Description" dataType="Text" parameterType="Control" parameterSource="Description"/>
				<SQLParameter id="259" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="260" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="261" variable="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="262" variable="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="263" variable="p_bank_branch_id" dataType="Float" parameterType="URL" parameterSource="p_bank_branch_id" defaultValue="0"/>
				<SQLParameter id="264" variable="bank_name" dataType="Text" parameterType="Control" parameterSource="bank_name"/>
				<SQLParameter id="265" variable="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id"/>
				<SQLParameter id="266" variable="area_name" dataType="Text" parameterType="Control" parameterSource="area_name"/>
				<SQLParameter id="267" variable="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id"/>
				<SQLParameter id="268" variable="address" dataType="Text" parameterType="Control" parameterSource="address"/>
				<SQLParameter id="269" variable="loket_no" dataType="Text" parameterType="Control" parameterSource="loket_no"/>
				<SQLParameter id="270" variable="loket_type" dataType="Text" parameterType="Control" parameterSource="loket_type"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="227" conditionType="Parameter" useIsNull="False" field="p_bank_branch_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" parameterSource="p_bank_branch_id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="228" field="code" dataType="Text" parameterType="Control" parameterSource="Code" omitIfEmpty="True"/>
				<CustomParameter id="229" field="description" dataType="Text" parameterType="Control" parameterSource="Description" omitIfEmpty="True"/>
				<CustomParameter id="230" field="create_by" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="231" field="update_by" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="232" field="create_date" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="233" field="update_date" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="234" field="p_bank_branch_id" dataType="Float" parameterType="Control" parameterSource="p_bank_branch_id" omitIfEmpty="True"/>
				<CustomParameter id="235" field="bank_name" dataType="Text" parameterType="Control" parameterSource="bank_name" omitIfEmpty="True"/>
				<CustomParameter id="236" field="p_bank_id" dataType="Float" parameterType="Control" parameterSource="p_bank_id" omitIfEmpty="True"/>
				<CustomParameter id="237" field="area_name" dataType="Text" parameterType="Control" parameterSource="area_name" omitIfEmpty="True"/>
				<CustomParameter id="238" field="p_area_id" dataType="Float" parameterType="Control" parameterSource="p_area_id" omitIfEmpty="True"/>
				<CustomParameter id="239" field="address" dataType="Text" parameterType="Control" parameterSource="address" omitIfEmpty="True"/>
				<CustomParameter id="240" field="loket_no" dataType="Text" parameterType="Control" parameterSource="loket_no" omitIfEmpty="True"/>
				<CustomParameter id="241" field="loket_type" dataType="Text" parameterType="Control" parameterSource="loket_type" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="271" variable="p_bank_branch_id" parameterType="Control" dataType="Float" parameterSource="p_bank_branch_id" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="242" conditionType="Parameter" useIsNull="False" field="p_bank_branch_id" dataType="Float" parameterType="URL" parameterSource="p_bank_branch_id" searchConditionType="Equal" logicOperator="And"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="P_BANK_BRANCH_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="P_BANK_BRANCH.php" forShow="True" url="P_BANK_BRANCH.php" comment="//" codePage="windows-1252"/>
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
