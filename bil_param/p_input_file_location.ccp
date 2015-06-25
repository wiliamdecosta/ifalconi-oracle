<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.PROCEDURE_NAME from p_input_file_location a ,P_INPUT_FILE_DESC b
where a.P_INPUT_FILE_DESC_ID=b.P_INPUT_FILE_DESC_ID
and 
(
upper(a.COLUMN_NAME) like upper('%{s_keyword}%') or
upper(b.PROCEDURE_NAME) like upper('%{s_keyword}%')
)
" name="P_INPUT_FILE_LOCATION" orderBy="P_INPUT_FILE_LOCATION_ID" pageSizeLimit="100" wizardCaption=" P INPUT FILE LOCATION " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" wizardCaption="P INPUT FILE DESC ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_INPUT_FILE_LOCATIONPROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="COLUMN_NAME" fieldSource="COLUMN_NAME" wizardCaption="COLUMN NAME" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_INPUT_FILE_LOCATIONCOLUMN_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_POSITION" fieldSource="INPUT_POSITION" wizardCaption="INPUT POSITION" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_INPUT_FILE_LOCATIONINPUT_POSITION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INPUT_FILE_LOCATION_Insert" hrefSource="p_input_file_location.ccp" removeParameters="P_INPUT_FILE_LOCATION_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="P_INPUT_FILE_LOCATIONP_INPUT_FILE_LOCATION_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="47"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="48" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="49" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_INPUT_FILE_LOCATIONDLink" hrefSource="p_input_file_location.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_INPUT_FILE_LOCATION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="50" sourceType="DataField" name="P_INPUT_FILE_LOCATION_ID" source="P_INPUT_FILE_LOCATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="51" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_INPUT_FILE_LOCATIONADLink" hrefSource="p_input_file_location.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_INPUT_FILE_LOCATION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="52" sourceType="DataField" format="yyyy-mm-dd" name="P_INPUT_FILE_LOCATION_ID" source="P_INPUT_FILE_LOCATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_INPUT_FILE_LOCATION_ID" fieldSource="P_INPUT_FILE_LOCATION_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_input_file_location.ccp" wizardThemeItem="GridA" PathID="P_INPUT_FILE_LOCATIONP_INPUT_FILE_LOCATION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="P_INPUT_FILE_LOCATION_ID" source="P_INPUT_FILE_LOCATION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="53" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="54"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="COLUMN_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="89" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_INPUT_FILE_LOCATIONSearch" wizardCaption=" P INPUT FILE LOCATION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_input_file_location.ccp" PathID="P_INPUT_FILE_LOCATIONSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" PathID="P_INPUT_FILE_LOCATIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_INPUT_FILE_LOCATIONSearchButton_DoSearch">
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
		<Record id="25" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_input_file_location1" dataSource="select a.*,b.PROCEDURE_NAME from p_input_file_location a ,P_INPUT_FILE_DESC b
where a.P_INPUT_FILE_DESC_ID=b.P_INPUT_FILE_DESC_ID
and a.P_INPUT_FILE_LOCATION_ID={P_INPUT_FILE_LOCATION_ID}
" errorSummator="Error" wizardCaption=" P Input File Location " wizardFormMethod="post" PathID="p_input_file_location1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_INPUT_FILE_LOCATION(P_INPUT_FILE_LOCATION_ID, P_INPUT_FILE_DESC_ID, COLUMN_NAME, INPUT_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_INPUT_FILE_LOCATION','P_INPUT_FILE_LOCATION_ID'),{P_INPUT_FILE_DESC_ID},'{COLUMN_NAME}',{INPUT_POSITION},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_INPUT_FILE_LOCATION SET 
P_INPUT_FILE_DESC_ID={P_INPUT_FILE_DESC_ID},
COLUMN_NAME='{COLUMN_NAME}',
INPUT_POSITION={INPUT_POSITION},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_INPUT_FILE_LOCATION_ID = {P_INPUT_FILE_LOCATION_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INPUT_FILE_LOCATION WHERE P_INPUT_FILE_LOCATION_ID = {P_INPUT_FILE_LOCATION_ID}">
<Components>
<Hidden id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_INPUT_FILE_DESC_ID" fieldSource="P_INPUT_FILE_DESC_ID" required="True" caption="P INPUT FILE DESC ID" wizardCaption="P INPUT FILE DESC ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1P_INPUT_FILE_DESC_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="COLUMN_NAME" fieldSource="COLUMN_NAME" required="True" caption="COLUMN NAME" wizardCaption="COLUMN NAME" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1COLUMN_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="INPUT_POSITION" fieldSource="INPUT_POSITION" required="True" caption="INPUT POSITION" wizardCaption="INPUT POSITION" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1INPUT_POSITION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="42" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonInsertOn" PathID="p_input_file_location1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="43" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="p_input_file_location1Button_Update" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonDeleteOn" PathID="p_input_file_location1Button_Delete" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="45"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="46" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_input_file_location1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PROCEDURE_NAME" fieldSource="PROCEDURE_NAME" required="False" caption="PROCEDURE_NAME" wizardCaption="P INPUT FILE DESC ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1PROCEDURE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_INPUT_FILE_LOCATION_ID" fieldSource="P_INPUT_FILE_LOCATION_ID" required="False" caption="P_INPUT_FILE_LOCATION_ID" wizardCaption="P INPUT FILE DESC ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_input_file_location1P_INPUT_FILE_LOCATION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="P_INPUT_FILE_LOCATION_ID" parameterSource="P_INPUT_FILE_LOCATION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="90" parameterType="URL" variable="P_INPUT_FILE_LOCATION_ID" dataType="Float" parameterSource="P_INPUT_FILE_LOCATION_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="65" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
				<SQLParameter id="66" variable="COLUMN_NAME" parameterType="Control" dataType="Text" parameterSource="COLUMN_NAME"/>
				<SQLParameter id="67" variable="INPUT_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INPUT_POSITION"/>
				<SQLParameter id="68" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="69" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="70" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="57" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
				<CustomParameter id="58" field="COLUMN_NAME" dataType="Text" parameterType="Control" parameterSource="COLUMN_NAME"/>
				<CustomParameter id="59" field="INPUT_POSITION" dataType="Float" parameterType="Control" parameterSource="INPUT_POSITION"/>
				<CustomParameter id="60" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="61" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="62" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="63" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="64" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="81" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
<SQLParameter id="82" variable="COLUMN_NAME" parameterType="Control" dataType="Text" parameterSource="COLUMN_NAME"/>
<SQLParameter id="83" variable="INPUT_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INPUT_POSITION"/>
<SQLParameter id="84" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="85" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="87" variable="P_INPUT_FILE_LOCATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_LOCATION_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="72" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
<CustomParameter id="73" field="COLUMN_NAME" dataType="Text" parameterType="Control" parameterSource="COLUMN_NAME"/>
<CustomParameter id="74" field="INPUT_POSITION" dataType="Float" parameterType="Control" parameterSource="INPUT_POSITION"/>
<CustomParameter id="75" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="76" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="77" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="78" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="79" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="80" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_NAME"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="88" variable="P_INPUT_FILE_LOCATION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_LOCATION_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_input_file_location.php" forShow="True" url="p_input_file_location.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_input_file_location_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="55"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="56"/>
			</Actions>
		</Event>
	</Events>
</Page>
