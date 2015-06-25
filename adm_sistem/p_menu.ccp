<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="101" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" resultSetType="parameter" dataSource="SELECT * 
FROM P_MENU
WHERE P_APPLICATION_ID = {P_APPLICATION_ID}
AND NVL(PARENT_ID,0) = {PARENT_ID} 
ORDER BY NVL(LISTING_NO,999)" name="P_MENUGrid" pageSizeLimit="100" wizardCaption="List of Grid1 " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Label id="106" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="O RC DATA" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_MENUGridCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="107" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="201"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="108" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_ACTIVE_CODE" PathID="P_MENUGridIS_ACTIVE_CODE" fieldSource="IS_ACTIVE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" name="FILE_NAME" PathID="P_MENUGridFILE_NAME" fieldSource="FILE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="115" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_MENUGridDLink" hrefSource="p_menu.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="369" sourceType="DataField" name="P_MENU_ID" source="P_MENU_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="222" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="MENU_Insert" PathID="P_MENUGridMENU_Insert" hrefSource="p_menu.ccp" wizardUseTemplateBlock="False" removeParameters="P_MENU_ID">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="223" sourceType="Expression" format="yyyy-mm-dd" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="109" fieldSourceType="DBColumn" dataType="Text" name="P_MENU_ID" PathID="P_MENUGridP_MENU_ID" fieldSource="P_MENU_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="144" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="381" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_APPLICATION_ID"/>
				<TableParameter id="382" conditionType="Parameter" useIsNull="True" field="PARENT_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="PARENT_ID"/>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters>
				<SPParameter id="241" parameterName="I_P_APPLICATION_ID" parameterSource="P_APPLICATION_ID" parameterType="URL" direction="Input" dataType="Double" dataSize="0" scale="0" precision="0" defaultValue="-99"/>
				<SPParameter id="242" parameterName="I_PARENT_ID" parameterSource="PARENT_ID" parameterType="URL" direction="Input" dataType="Double" dataSize="0" scale="0" precision="0" defaultValue="0"/>
				<SPParameter id="243" parameterName="I_SEARCH" parameterSource="s_CODE1" parameterType="URL" direction="Input" dataType="Char" dataSize="4000" scale="0" precision="0"/>
				<SPParameter id="244" parameterName="O_RC_DATA" parameterSource="O_RC_DATA" parameterType="URL" direction="Output" dataType="RecordSet" dataSize="4000" scale="0" precision="0"/>
			</SPParameters>
			<SQLParameters>
				<SQLParameter id="389" parameterType="URL" variable="P_APPLICATION_ID" dataType="Float" parameterSource="P_APPLICATION_ID"/>
				<SQLParameter id="390" parameterType="URL" variable="PARENT_ID" dataType="Float" parameterSource="PARENT_ID" defaultValue="0"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="252" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_MENUForm" errorSummator="Error" wizardCaption="Add/Edit P App Menu " wizardFormMethod="post" PathID="P_MENUForm" activeCollection="DSQLParameters" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_MENU(P_MENU_ID, P_APPLICATION_ID, CODE, PARENT_ID, FILE_NAME, LISTING_NO, IS_ACTIVE, DESCRIPTION, CREATED_BY, CREATION_DATE, UPDATED_BY, UPDATED_DATE) VALUES
(GENERATE_ID('','P_MENU','P_MENU_ID'), 
{P_APPLICATION_ID}, 
UPPER(TRIM('{CODE}')), 
DECODE({PARENT_ID},0,NULL,{PARENT_ID}),
TRIM('{FILE_NAME}'), 
{LISTING_NO}, 
'{IS_ACTIVE}', 
TRIM('{DESCRIPTION}'), 
'{CREATED_BY}', sysdate, 
'{UPDATED_BY}', sysdate
)" parameterTypeListName="ParameterTypeList" customDeleteType="SQL" customDelete="DELETE FROM P_MENU WHERE P_MENU_ID = {P_MENU_ID}" customUpdateType="SQL" customUpdate="UPDATE P_MENU SET  
CODE=UPPER(TRIM('{CODE}')), 
FILE_NAME=LOWER(TRIM('{FILE_NAME}')), 
LISTING_NO={LISTING_NO}, 
IS_ACTIVE='{IS_ACTIVE}', 
DESCRIPTION=TRIM('{DESCRIPTION}'), 
UPDATED_BY='{UPDATED_BY}', 
UPDATED_DATE= sysdate 
WHERE P_MENU_ID = {P_MENU_ID}" dataSource="P_MENU">
			<Components>
				<Button id="253" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_MENUFormButton_Insert" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="254" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_MENUFormButton_Update" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="255" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_MENUFormButton_Delete" removeParameters="P_MENU_ID;FLAG">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="256" message="Hapus Record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="257" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_MENUFormButton_Cancel" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="260" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="Nama Menu" wizardCaption="CODE" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="261" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormPARENT_ID" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="262" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FILE_NAME" fieldSource="FILE_NAME" required="False" caption="FILE NAME" wizardCaption="FILE NAME" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormFILE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="263" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" fieldSource="LISTING_NO" required="False" caption="LISTING NO" wizardCaption="LISTING NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormLISTING_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="264" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_ACTIVE" fieldSource="IS_ACTIVE" required="True" caption="Aktif?" wizardCaption="IS ACTIVE" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormIS_ACTIVE" sourceType="ListOfValues" _valueOfList="N" _nameOfList="TIDAK" dataSource="Y;YA;N;TIDAK">
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
				<TextArea id="265" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="268" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="False" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormCREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="266" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="False" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormCREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="271" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="False" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormUPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="269" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="False" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormUPDATED_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="259" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_APPLICATION_ID" fieldSource="P_APPLICATION_ID" required="False" caption="P APPLICATION ID" wizardCaption="P APPLICATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_MENUFormP_APPLICATION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="350" fieldSourceType="DBColumn" dataType="Text" name="P_MENU_ID" PathID="P_MENUFormP_MENU_ID" fieldSource="P_MENU_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
			</Events>
			<TableParameters>
				<TableParameter id="258" conditionType="Parameter" useIsNull="True" field="P_MENU_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" defaultValue="SELECTED_ID" parameterSource="P_MENU_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="377" parameterType="URL" variable="P_APP_MENU_ID" dataType="Float" parameterSource="P_APP_MENU_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="388" tableName="P_MENU" posLeft="10" posTop="10" posWidth="146" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="296" variable="P_APPLICATION_ID" dataType="Float" parameterType="URL" parameterSource="P_APPLICATION_ID" defaultValue="-99"/>
				<SQLParameter id="297" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="298" variable="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<SQLParameter id="299" variable="FILE_NAME" dataType="Text" parameterType="Control" parameterSource="FILE_NAME"/>
				<SQLParameter id="300" variable="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO" defaultValue="1"/>
				<SQLParameter id="301" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<SQLParameter id="302" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="303" variable="CREATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="305" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="281" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
				<CustomParameter id="282" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="283" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="284" field="FILE_NAME" dataType="Text" parameterType="Control" parameterSource="FILE_NAME"/>
				<CustomParameter id="285" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="286" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<CustomParameter id="287" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="288" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="289" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="290" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="291" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="292" field="VERIFIED_BY" dataType="Text" parameterType="Control" parameterSource="VERIFIED_BY"/>
				<CustomParameter id="293" field="VERIFICATION_DATE" dataType="Date" parameterType="Control" parameterSource="VERIFICATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="294" field="APPROVED_BY" dataType="Text" parameterType="Control" parameterSource="APPROVED_BY"/>
				<CustomParameter id="295" field="APPROVAL_DATE" dataType="Date" parameterType="Control" parameterSource="APPROVAL_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="334" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="336" variable="FILE_NAME" dataType="Text" parameterType="Control" parameterSource="FILE_NAME"/>
				<SQLParameter id="337" variable="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<SQLParameter id="338" variable="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<SQLParameter id="339" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="342" variable="UPDATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="348" variable="P_MENU_ID" parameterType="Control" dataType="Float" parameterSource="P_MENU_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="317" conditionType="Parameter" useIsNull="False" field="P_APP_MENU_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_MENU_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="318" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
				<CustomParameter id="319" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="320" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="321" field="FILE_NAME" dataType="Text" parameterType="Control" parameterSource="FILE_NAME"/>
				<CustomParameter id="322" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
				<CustomParameter id="323" field="IS_ACTIVE" dataType="Text" parameterType="Control" parameterSource="IS_ACTIVE"/>
				<CustomParameter id="324" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="325" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="326" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="327" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="328" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="329" field="VERIFIED_BY" dataType="Text" parameterType="Control" parameterSource="VERIFIED_BY"/>
				<CustomParameter id="330" field="VERIFICATION_DATE" dataType="Date" parameterType="Control" parameterSource="VERIFICATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="331" field="APPROVED_BY" dataType="Text" parameterType="Control" parameterSource="APPROVED_BY"/>
				<CustomParameter id="332" field="APPROVAL_DATE" dataType="Date" parameterType="Control" parameterSource="APPROVAL_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="316" variable="P_MENU_ID" parameterType="Control" dataType="Float" parameterSource="P_MENU_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="315" conditionType="Parameter" useIsNull="False" field="P_APP_MENU_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_MENU_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Label id="391" fieldSourceType="DBColumn" dataType="Text" html="False" name="appl_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="appl_code" defaultValue="CCGetFromGet(&quot;APPL_CODE&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="392" fieldSourceType="DBColumn" dataType="Text" html="False" name="parent_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="parent_code" defaultValue="CCGetFromGet(&quot;PARENT_CODE&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
	</Components>
	<CodeFiles>
		<CodeFile id="3" language="VB" name="p_app_menu_list.aspx" forShow="True" url="p_app_menu_list.aspx" comment="&lt;!--" commentEnd="--&gt;" codePage="windows-1252"/>
		<CodeFile id="1" language="VB" name="p_app_menu_list.aspx.vb" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="2" language="VB" name="p_menuDataProvider.vb" path="..\App_Code\.\param" forShow="False" comment="'" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_menu_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_menu.php" forShow="True" url="p_menu.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="250"/>
			</Actions>
		</Event>
	</Events>
</Page>
