<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="05" connection="Conn" resultSetType="parameter" name="P_APPLGrid" pageSizeLimit="100" wizardCaption="List of Grid1 " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" wizardAllowSorting="True" wizardTheme="sikm" wizardThemeVersion="3.0" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" dataSource="SELECT * 
FROM P_APPLICATION
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')
ORDER BY NVL(LISTING_NO,999)">
			<Components>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="O RC DATA" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_APPLGridCODE" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="7" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardTheme="sikm" wizardThemeVersion="3.0" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="175"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="85" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_APPLGridDLink" hrefSource="p_application.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="142" sourceType="DataField" name="P_APPLICATION_ID" source="P_APPLICATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="109" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_APPLICATION_ID" wizardTheme="sikm" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_APPLGridP_APPLICATION_ID" fieldSource="P_APPLICATION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="127" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" PathID="P_APPLGridDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_APPL_Insert" PathID="P_APPLGridP_APPL_Insert" hrefSource="p_application.ccp" wizardUseTemplateBlock="False" removeParameters="P_APPLICATION_ID">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="164" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="94" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="165" conditionType="Parameter" useIsNull="False" field="CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
				<TableParameter id="166" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters>
				<SPParameter id="110" parameterName="I_SEARCH" parameterSource="s_CODE" parameterType="URL" direction="Input" dataType="Char" dataSize="4000" scale="0" precision="0"/>
				<SPParameter id="111" parameterName="O_RC_DATA" parameterSource="O_RC_DATA" parameterType="URL" direction="Output" dataType="RecordSet" dataSize="4000" scale="0" precision="0"/>
			</SPParameters>
			<SQLParameters>
				<SQLParameter id="167" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="8" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_APPLSearch" wizardCaption="Search P APPLICATION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_application.ccp" PathID="P_APPLSearch" wizardTheme="sikm" wizardThemeVersion="3.0" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_APPLSearchs_keyword" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="9" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_APPLSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="37" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_APPLForm" errorSummator="Error" wizardCaption="Add/Edit P APPLICATION " wizardFormMethod="post" PathID="P_APPLForm" returnPage="p_application.ccp" customInsertType="SQL" customUpdateType="SQL" customDeleteType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customDelete="DELETE FROM P_APPLICATION WHERE P_APPLICATION_ID={P_APPLICATION_ID}" pasteActions="pasteActions" wizardTheme="sikm" wizardThemeVersion="3.0" pasteAsReplace="pasteAsReplace" dataSource="P_APPLICATION" customInsert="INSERT INTO P_APPLICATION(P_APPLICATION_ID,CODE,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE,UPDATED_BY, LISTING_NO, IS_ACTIVE)VALUES 
(generate_id('','P_APPLICATION','P_APPLICATION_ID'),TRIM(UPPER('{CODE}')),TRIM('{DESCRIPTION}'),sysdate,'{CREATED_BY}',sysdate,'{UPDATED_BY}',LISTING_NO, 'IS_ACTIVE')" activeTableType="customUpdate" customUpdate="UPDATE P_APPLICATION SET 
CODE=UPPER(TRIM('{CODE}')),
DESCRIPTION=TRIM('{DESCRIPTION}'),
LISTING_NO={LISTING_NO},
IS_ACTIVE='{IS_ACTIVE}',
UPDATED_DATE= sysdate ,
UPDATED_BY='{UPDATED_BY}'
WHERE P_APPLICATION_ID={P_APPLICATION_ID}">
			<Components>
				<Button id="38" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_APPLFormButton_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="39" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_APPLFormButton_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_APPLFormButton_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="97" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="Modul" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPLFormCODE" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPLFormDESCRIPTION" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPLFormCREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" caption="CREATED BY" fieldSource="CREATED_BY" required="True" PathID="P_APPLFormCREATED_BY" wizardTheme="sikm" wizardThemeVersion="3.0" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPLFormUPDATED_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPLFormUPDATED_BY" wizardTheme="sikm" wizardThemeVersion="3.0" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="155" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_APPLFormButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="63" visible="No" fieldSourceType="DBColumn" dataType="Float" name="P_APPLICATION_ID" PathID="P_APPLFormP_APPLICATION_ID" caption="P_APPLICATION_ID" fieldSource="P_APPLICATION_ID" unique="False" wizardTheme="sikm" wizardThemeVersion="3.0" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="168" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_APPLFormLISTING_NO" fieldSource="LISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="169" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="IS_ACTIVE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="P_APPLFormIS_ACTIVE" fieldSource="IS_ACTIVE" connection="Conn" _valueOfList="N" _nameOfList="DISABLE" dataSource="Y;ENABLE;N;DISABLE">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events>
			</Events>
			<TableParameters>
				<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" parameterSource="P_APPLICATION_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="163" tableName="P_APPLICATION" posLeft="10" posTop="10" posWidth="146" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="185" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<SQLParameter id="186" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="188" variable="CREATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="190" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="192" variable="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<SQLParameter id="193" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="176" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="177" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="178" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="179" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="180" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="181" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="182" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
<CustomParameter id="183" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<CustomParameter id="184" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="204" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<SQLParameter id="205" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="207" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="208" variable="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID" defaultValue="0"/>
<SQLParameter id="209" variable="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<SQLParameter id="210" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
</USQLParameters>
			<UConditions>
<TableParameter id="203" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="P_APPLICATION_ID"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="194" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
<CustomParameter id="195" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
<CustomParameter id="198" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="199" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
<CustomParameter id="200" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID" omitIfEmpty="True"/>
<CustomParameter id="201" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO" omitIfEmpty="True"/>
<CustomParameter id="202" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE" omitIfEmpty="True"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="76" variable="P_APPLICATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_APPLICATION_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="3" language="VB" name="p_application.aspx" forShow="True" url="p_application.aspx" comment="&lt;!--" commentEnd="--&gt;" codePage="windows-1252"/>
		<CodeFile id="1" language="VB" name="p_application.aspx.vb" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="2" language="VB" name="p_applicationDataProvider.vb" path="..\App_Code\.\param" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_application_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_application.php" forShow="True" url="p_application.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="174"/>
			</Actions>
		</Event>
	</Events>
</Page>
